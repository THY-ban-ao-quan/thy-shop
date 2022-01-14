import { ajax_app } from "./ajax_app.js";
import { section } from "./sections.js";
import { header } from "./header.js";

const product = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function ChangeSize(nameItem, nameParent) {
    const parentNode = $(nameParent);

    if (!parentNode) return;

    parentNode.onclick = function (event) {
      const item = event.target;

      if (item.classList.contains("disabled")) return;
      if (!item.classList.contains(nameItem)) return;

      $(nameParent + " ." + nameItem + ".active").classList.remove("active");
      item.classList.add("active");
    };
  }

  function RenderGallery(list) {
    let html = "";
    if (!list) return html;

    list.forEach((item) => {
      html += `<div
                    class="gallery__picture"
                    style="
                        background-image: url(./assets/img/products/${item.linkAnh}?>);
                    "
                ></div>`;
    });
    return html;
  }

  function DisabledAddCart(qty) {
    const button = $(".detail-layout .add-cart");
    button.disabled = qty > 0 ? false : true;
    if (qty > 0) {
      button.classList.remove("disabled");
      button.innerText = "Thêm vào giỏ hàng";
    } else {
      button.classList.add("disabled");
      button.innerText = "hết hàng";
    }
  }

  function RenderSizes(list) {
    let html = "",
      qty = 0,
      isSetActive = false,
      active,
      disable;
    if (!list) return html;
    list.forEach((item) => {
      if (!isSetActive && item.soLuong > 0) {
        active = "active";
        isSetActive = true;
      } else active = "";
      disable = item.soLuong <= 0 ? "disabled" : "";
      qty += item.soLuong * 1;
      html += `
        <li>
            <button 
                class="size__variation ${active} ${disable}" 
                data-idsm="${item.idSM}" 
                ${disable}
                >${item.size}
            </button>
        </li>`;
    });

    DisabledAddCart(qty);

    return html;
  }

  async function HandleColorPick(
    button,
    colorPickedNode,
    galleryNode,
    sizeNode
  ) {
    const data = {
      idSP: button.dataset.idsp,
      mau: button.dataset.mau,
    };

    const [images, sizes] = await Promise.all([
      ajax_app.Post(
        "?act=product&handle=images",
        "data=" + JSON.stringify(data)
      ),
      ajax_app.Post(
        "?act=product&handle=sizes",
        "data=" + JSON.stringify(data)
      ),
    ]);
    colorPickedNode.innerText = button.dataset.mau;
    galleryNode.innerHTML = RenderGallery(JSON.parse(images));
    sizeNode.innerHTML = RenderSizes(JSON.parse(sizes));
  }

  function ChangeColor(name, gallery, colorPicked, size) {
    const buttons = $$(name),
      galleryNode = $(gallery),
      colorPickedNode = $(colorPicked),
      sizeNode = $(size);

    if (!buttons) return;

    buttons.forEach((btn) => {
      btn.onclick = function () {
        $(name + ".active").classList.remove("active");
        this.classList.add("active");

        HandleColorPick(this, colorPickedNode, galleryNode, sizeNode);
      };
    });
  }

  async function AddToCart() {
    const button = $(".detail-layout .add-cart");
    if (!button) return;

    button.onclick = async function () {
      const idND = await ajax_app.Get("?act=account&handle=getUserID");
      const data = {
        idSM: $(".size__variation.active").dataset.idsm,
        idKH: idND,
      };
      const node = $(".detail-layout .add-btn-group");
      const div = document.createElement("div");
      div.className = "toast-mg";

      if (idND == -1) {
        div.innerText = "Vui lòng đăng nhập!";
        node.appendChild(div);
        setTimeout(() => {
          div.remove();
        }, 2500);
        return;
      }

      const rs = await ajax_app.Post(
        "?act=cart&handle=add",
        "data=" + JSON.stringify(data)
      );

      if (rs == 1) {
        div.innerText = "Đã thêm vào giỏ hàng!";
        node.appendChild(div);
        setTimeout(() => {
          div.remove();
        }, 2500);
      }

      header.LoadMiniCart(idND);
    };
  }

  function Search(inputName, listNodeName) {
    const input = $(inputName),
      listNode = $(listNodeName);

    if (!input || !listNode) return;

    input.onkeyup = function () {
      let keyword = this.value.trim();

      setTimeout(async () => {
        let text = this.value.trim();
        if (text == keyword) {
          if (keyword == "") {
            const rs = await ajax_app.Get("?act=product&handle=featured");
            listNode.innerHTML = section.renderProducts2(JSON.parse(rs));
            return;
          }

          const data = { keyword: keyword };
          const rs = await ajax_app.Post(
            "?act=product&handle=search",
            "data=" + JSON.stringify(data)
          );

          listNode.innerHTML = section.renderProducts2(JSON.parse(rs));

          if (JSON.parse(rs).length != 0) return;
          const h5 = document.createElement("h5");
          h5.className = "empty-msg";
          h5.innerText = "Không tìm thấy sản phẩm nào!";

          const oldMsg = $(".search__container .empty-msg");
          oldMsg && oldMsg.remove();
          listNode.parentNode.appendChild(h5);
        }
      }, 240);
    };
  }

  return {
    AddToCart,
    ChangeSize,
    ChangeColor,
    Search,
  };
})();

export { product };
