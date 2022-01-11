import { modal } from "./modal.js";
import { ajax_app } from "./ajax_app.js";
import { header } from "./header.js";
import { section } from "./sections.js";
import { product } from "./product.js";

const app = (function () {
  function Init() {
    //header
    header.HeaderHandle();

    // Home
    modal.togglePassword();
    modal.Login_Register();
    modal.Modal();

    // Ajax
    ajax_app.Register();
    ajax_app.Login();

    // Section
    const options1 = {
      type: "carousel",
      startAt: 0,
      perView: 4.35,
      autoplay: 4000,
      hoverpause: true,
      gap: 20,
      breakpoints: {
        1024: {
          perView: 4.5,
        },
        740: {
          perView: 2,
        },
      },
    };

    const options2 = {
      type: "carousel",
      startAt: 0,
      perView: 3,
      autoplay: 4000,
      hoverpause: true,
      gap: 20,
      breakpoints: {
        1024: {
          perView: 3,
        },
        740: {
          perView: 2,
        },
      },
    };

    section.toggleGenderBtn(
      ".new-products__slide .gender__toggle button",
      ".new-products__slide .glide__slides",
      ".new-products__slide .glide",
      options1,
      "newProducts"
    );
    section.toggleGenderBtn(
      ".season__slide .gender__toggle button",
      ".season__slide .glide__slides",
      ".season__slide .glide",
      options2,
      "seasonalProducts"
    );
    section.toggleGenderBtn2(
      ".featured__section .gender__toggle button",
      ".featured__section .featured__list",
      "featuredProducts"
    );

    // product
    product.ChangeSize("size__variation", ".detail-layout .sizes > ul");
    product.ChangeColor(
      ".detail-layout .color__variation",
      ".detail-layout .gallery",
      ".detail-layout .color__name",
      ".detail-layout .sizes > ul"
    );
    product.Search(
      ".search__container .search__input input",
      ".search__container .related__product-list"
    );

    // const rs = document.querySelectorAll(".product");
    // let raw =
    //   "INSERT INTO `sanpham`(`tenSP`, `donGia`, `mua`, `moTa`, `trangThai`, `idLSP`) VALUES ('','','','','','')\n";

    // rs.forEach((item) => {
    //   const name = item.querySelector("h6.name").innerText;
    //   const price = item
    //     .querySelector(".price p")
    //     .innerText.replace(".", "")
    //     .replace(" ₫", "")
    //     .replace(".", "");

    //   raw += `('${name}','${price}','','','','','')\n`;
    // });

    // console.log(raw);

    //   const rs = document.querySelectorAll(".product");
    //   let raw =
    //     "INSERT INTO `sanpham`(`tenSP`, `donGia`, `mua`, `moTa`, `trangThai`, `idLSP`) VALUES ('','','','','','')\n";

    //   rs.forEach((item) => {
    //     const name = item.querySelector("h6.name").innerText;
    //     const price = item
    //       .querySelector(".price p")
    //       .innerText.replace(".", "")
    //       .replace(" ₫", "")
    //       .replace(".", "");
    //     const img = item.querySelector(".thumbnail a").innerHTML;

    //     raw += `('${name}','${price}','','','','','${img}'),\n`;
    //   });

    //   console.log(raw);
  }
  return {
    Init,
  };
})();

window.addEventListener("DOMContentLoaded", app.Init);
