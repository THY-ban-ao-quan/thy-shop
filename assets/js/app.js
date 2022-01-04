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
  }
  return {
    Init,
  };
})();

window.addEventListener("DOMContentLoaded", app.Init);
