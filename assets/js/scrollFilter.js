import { filter } from "./filter.js";

const scrollFilter = (function () {
  let load = 1;
  function Scroll() {
    window.onscroll = function () {
      const y = window.scrollY;
      setTimeout(() => {
        if (y < window.scrollY) {
          const currentY = window.scrollY + window.innerHeight,
            docY = window.innerHeight;
          let page;
          if (load == 1 && window.innerHeight > window.innerWidth)
            page = Math.round(0.5 + currentY / docY);
          else page = Math.round(currentY / docY);

          if (page > load) {
            load = page;
            filter.productFilter(page, true);
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
