const select = (function () {
  function ele(selector) {
    return document.querySelector(selector);
  }
  function allEle(selector) {
    return document.querySelectorAll(selector);
  }

  return {
    ele,
    allEle,
  };
})();

export { select };
