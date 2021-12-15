import { modal } from "./modal.js";
import { ajax_app } from "./ajax_app.js";
import { header } from "./header.js";

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
  }
  return {
    Init,
  };
})();

window.addEventListener("DOMContentLoaded", app.Init);
