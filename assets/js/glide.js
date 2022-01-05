new Glide(".glide.home-banner", {
  autoplay: 3000,
  hoverpause: true,
}).mount();

console.log(document.querySelector(".new-products__slide .glide"));

new Glide(".new-products__slide .glide", {
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
}).mount();

new Glide(".season__slide .glide", {
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
}).mount();
