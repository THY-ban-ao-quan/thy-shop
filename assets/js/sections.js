const section = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function toggleGenderBtn(ToggleButtons) {
    const buttons = $$(ToggleButtons);

    buttons.forEach((button) => {
      button.onclick = function () {
        $(ToggleButtons + ".active").classList.remove("active");

        this.classList.add("active");
      };
    });
  }
  return {
    toggleGenderBtn,
  };
})();

export { section };
