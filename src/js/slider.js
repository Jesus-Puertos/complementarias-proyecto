import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/swiper-bundle.css";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".slider")) {
    const opciones = {
      slidesPerView: 1,
      spaceBetween: 15,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    };
    Swiper.use([Navigation, Pagination]);
    new Swiper(".slider", opciones);
  }
});
