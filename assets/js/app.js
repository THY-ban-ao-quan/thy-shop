import { modal } from "./modal.js";
import { ajax_app } from "./ajax_app.js";
import { header } from "./header.js";
import { section } from "./sections.js";

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
    section.toggleGenderBtn(".new-products__slide .gender__toggle button");
    section.toggleGenderBtn(".season__slide .gender__toggle button");
    section.toggleGenderBtn(".featured__section .gender__toggle button");

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

    //     raw += `('${name}','${price}','','','','','')\n`;
    //   });

    //   console.log(raw);

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
