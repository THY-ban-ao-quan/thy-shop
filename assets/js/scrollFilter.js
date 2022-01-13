import { filter } from "./filter.js";

const scrollFilter = (function () {
  let load = 1;
  function Scroll() {
    window.onscroll = function () {
      const y = window.scrollY;
      setTimeout(() => {
        if (y < window.scrollY) {
          const currentY =
              window.scrollY + document.documentElement.clientHeight,
            docY = document.documentElement.clientHeight,
            page = Math.floor(currentY / docY);

          if (page > load) {
            load = page;
            filter.productFilter(page, true);
            console.log(page);
          }
        }
      }, 500);
    };
  }

  return {
    Scroll,
  };
})();

export { scrollFilter };
