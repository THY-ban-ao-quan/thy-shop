import { section } from "./sections.js";
import { ajax_app } from "./ajax_app.js";

const header = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function FeaturedProduct() {
    setTimeout(() => {
      const rs = ajax_app.Get("?act=product&handle=featured");
      rs.then((result) => {
        section.renderProducts2(
          JSON.parse(result),
          $(".search__container .related__product-list")
        );
      });
    }, 400);
  }

  function ToggleSearch() {
    const searchContainer = $(".search__container");
    searchContainer.classList.toggle("active");

    if (!searchContainer.classList.contains("active")) return;
    FeaturedProduct();
  }

  // Open/close search container
  function SearchHandle() {
    $("#search-btn").addEventListener("click", ToggleSearch);
    $("#close-search-btn").addEventListener("click", ToggleSearch);
  }

  // Open/close user container
  function UserHandle() {
    $("#user-btn").addEventListener("click", () => {
      const userContainer = $(".user__container");
      userContainer.classList.toggle("active");
    });
  }

  //  Open/close mini cart
  function ToggleMiniCart() {
    const miniCart = $(".cart__container");
    miniCart.classList.toggle("active");
  }

  function MiniCartHandle() {
    $("#cart-btn").addEventListener("click", ToggleMiniCart);
    $("#close-mini-cart").addEventListener("click", ToggleMiniCart);
  }

  // Open/close side nav
  function ToggleSideNav() {
    const sideNav = document.querySelector(".side__nav");
    sideNav.classList.toggle("active");
  }

  function SideNavHandle() {
    $("#side__toggle-btn").addEventListener("click", ToggleSideNav);
    $(".side__nav-close").addEventListener("click", ToggleSideNav);
  }

  function HeaderHandle() {
    SearchHandle();
    UserHandle();
    MiniCartHandle();
    SideNavHandle();
  }

  return {
    HeaderHandle,
  };
})();

export { header };
