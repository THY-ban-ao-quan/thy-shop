import { ajax_app } from "./ajax_app.js";
import { section } from "./sections.js";
import { select } from "./selector.js";

const filter = (function () {
  function toggleFilterM(toggleName, containerName) {
    const button = select.ele(toggleName);
    const container = select.ele(containerName);

    button.onclick = function () {
      container.classList.toggle("active");
    };
  }

  function toggleItemFilterPC(selector) {
    const listNode = select.allEle(selector);
    listNode.forEach((item) => {
      item.onclick = function () {
        const filter = item.nextElementSibling;
        filter.classList.toggle("active");
      };
    });
  }

  function getValuePicked(selector) {
    const list = [...select.allEle(selector)];
    return list.reduce((rs, item) => {
      return rs.concat(item.dataset.value.trim().split(" "));
    }, []);
  }

  async function productFilter(page = 1, isScroll = false) {
    const data = {
      colors: getValuePicked(".color-list .color.active"),
      sizes: getValuePicked(".size-list .size.active"),
      price1: $("#slider-range").slider("values", 0),
      price2: $("#slider-range").slider("values", 1),
      sort: select.ele(".sort-list .sort-item.active").dataset.value,
      page: page,
    };

    const idDM = select.ele(".categories__info").dataset.iddm;
    const idLSP = select.ele(".categories__info").dataset.idlsp;
    const productsNode = select.ele(".categories__products");

    const rs = await ajax_app.Post(
      `?act=product&handle=filter&idLSP=${idLSP}&idDM=${idDM}`,
      "data=" + JSON.stringify(data)
    );

    if (JSON.parse(rs).length == 0) {
      productsNode.innerHTML = `<h5 class="empty-msg">Không tìm thấy sản phẩm nào!</h5>`;
      return;
    }

    if (isScroll)
      productsNode.innerHTML += section.renderProducts2(JSON.parse(rs));
    else {
      productsNode.innerHTML = section.renderProducts2(JSON.parse(rs));
      window.screenTop = 0;
    }
  }

  function toggleSort() {
    const list = select.allEle(".sort-list .sort-item");
    list.forEach((item) => {
      item.onclick = function () {
        select.ele(".sort-list .sort-item.active").classList.remove("active");
        item.classList.add("active");
        productFilter();
      };
    });
  }

  function valuePick(selector) {
    const list = select.allEle(selector);
    list.forEach((item) => {
      item.onclick = function () {
        item.classList.toggle("active");
        productFilter();
      };
    });
  }

  return {
    toggleFilterM,
    toggleItemFilterPC,
    valuePick,
    toggleSort,
    productFilter,
  };
})();

export { filter };
