import { ajax_app } from "./ajax_app.js";
import { section } from "./sections.js";

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

  function RenderSizes(list) {
    let html = "",
      i = 0,
      active,
      disable;
    if (!list) return html;
    list.forEach((item) => {
      item.soLuong == 0 && i++;
      active = item == list[i] ? "active" : "";
      disable = item.soLuong == 0 ? "disabled" : "";
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
    ChangeSize,
    ChangeColor,
    Search,
  };
})();

export { product };
