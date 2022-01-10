const banner = $(".glide.home-banner")[0],
  newProductSlide = $(".new-products__slide .glide")[0],
  seasonalProductSlide = $(".season__slide .glide")[0];

banner &&
  new Glide(banner, {
    autoplay: 3000,
    hoverpause: true,
  }).mount();

newProductSlide &&
  new Glide(newProductSlide, {
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

seasonalProductSlide &&
  new Glide(seasonalProductSlide, {
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
