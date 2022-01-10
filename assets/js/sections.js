import { ajax_app } from "./ajax_app.js";
import { Glide } from "./node_modules/@glidejs/glide/dist/glide.modular.esm.js";
import { html } from "./node_modules/@glidejs/glide/src/components/html.js";

const section = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function HtmlFix(Glide, Components, Events) {
    const HtmlFix = html(Glide, Components, Events);
    Events.on("update", () => {
      HtmlFix.mount();
    });
    return HtmlFix;
  }

  function renderProducts(list, parentNode, glideSelector, options) {
    let cHtml = "";
    list.forEach((item) => {
      cHtml += `
        <li class="glide__slide ">
            <div class="product">
                <div class="thumbnail">
                    <a href="?act=product&handle=detail&id=${
                      item.idSP
                    }"  style="background-image:url(./assets/img/products/${
        item.linkAnh
      })"></a>
                </div>
                <div class="detail">
                    <div class="info">
                        <h6 class="name">${item.tenSP}</h6>
                        <div class="price">                                
                            <p>${numeral(item.donGia).format("0,0")} ₫</p>
                        </div>
                        <p class="color">+${
                          item.slMau
                        } màu</p>                                
                    </div>
                </div>
            </div>
        </li>
      `;
    });
    parentNode.innerHTML = cHtml;

    let glide = new Glide(glideSelector, options);
    glide.mount({ html: HtmlFix });
  }

  function renderProducts2(list, parentNode) {
    let cHtml = "";
    list.forEach((item) => {
      cHtml += `
        <div class="product">
            <div class="thumbnail">
                <a href="?act=product&handle=detail&id=${
                  item.idSP
                }" style="background-image:url(./assets/img/products/${
        item.linkAnh
      })"></a>
            </div>
            <div class="detail">
                <div class="info">
                    <h6 class="name">${item.tenSP}</h6>
                    <div class="price">                                
                        <p>${numeral(item.donGia).format("0,0")} ₫</p>
                    </div>  
                    <p class="color">+${
                      item.slMau
                    } màu</p>                              
                </div>
            </div>
        </div>
      `;
    });
    parentNode.innerHTML = cHtml;
  }

  function toggleGenderBtn(
    ToggleButtons,
    ParentClassName,
    glideSelector,
    options,
    handle
  ) {
    const buttons = $$(ToggleButtons);
    const parentNode = $(ParentClassName);

    buttons.forEach((button) => {
      button.onclick = async function () {
        if (!this.classList.contains("active")) {
          const data = {
            idDM: this.dataset.id,
          };
          const rs = await ajax_app.Post(
            `?act=home&handle=${handle}`,
            "data=" + JSON.stringify(data)
          );

          renderProducts(JSON.parse(rs), parentNode, glideSelector, options);
        }

        $(ToggleButtons + ".active").classList.remove("active");
        this.classList.add("active");
      };
    });
  }

  function toggleGenderBtn2(ToggleButtons, ParentClassName, handle) {
    const buttons = $$(ToggleButtons);
    const parentNode = $(ParentClassName);

    buttons.forEach((button) => {
      button.onclick = async function () {
        if (!this.classList.contains("active")) {
          const data = {
            idDM: this.dataset.id,
          };
          const rs = await ajax_app.Post(
            `?act=home&handle=${handle}`,
            "data=" + JSON.stringify(data)
          );

          renderProducts2(JSON.parse(rs), parentNode);
        }

        $(ToggleButtons + ".active").classList.remove("active");
        this.classList.add("active");
      };
    });
  }
  return {
    toggleGenderBtn,
    toggleGenderBtn2,
    renderProducts2,
  };
})();

export { section };
