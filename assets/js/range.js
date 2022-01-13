import { filter } from "./filter.js";

// Init range slider
function filterAmount(event, ui) {}

function handleSlider(price) {
  if (price >= 1000000) {
    price /= 1000000;
    return (price += "tr");
  }
  price /= 1000;
  return (price += "k");
}

$(function () {
  $("#slider-range").slider({
    step: 10000,
    range: true,
    min: 0,
    max: $("#slider-range").data("max") * 1 + 10000,
    values: [0, $("#slider-range").data("max") * 1 + 10000],
    slide: function (event, ui) {
      const min = ui.values[0],
        max = ui.values[1];
      setTimeout(() => {
        const min2 = $("#slider-range").slider("values", 0),
          max2 = $("#slider-range").slider("values", 1);
        if (min == min2 && max === max2) filter.productFilter();
      }, 240);

      $("#amount").val(handleSlider(min) + " - " + handleSlider(max));
    },
  });
  $("#amount").val(
    handleSlider($("#slider-range").slider("values", 0)) +
      " - " +
      handleSlider($("#slider-range").slider("values", 1))
  );
});
