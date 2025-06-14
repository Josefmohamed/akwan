import './style.scss';
import 'swiper/swiper.scss';
import Swiper from 'swiper';

import {Navigation} from 'swiper/modules';

export function our_projects_block() {
  const block = document.querySelector('.our_projects_block');
  if (!block) return;


  // Select all swiper wrappers inside the block
  const wrappers = block?.querySelectorAll('.projects-swiper');


  wrappers.forEach((wrapper) => {
    const nextEl = wrapper?.querySelector('.swiper-button-next');
    const prevEl = wrapper?.querySelector('.swiper-button-prev');

    new Swiper(wrapper, {
      slidesPerView: 1.4,
      spaceBetween: 25,
      centeredSlides: true,
      loop: true,
      speed: 600,
      breakpoints: {
        768: {
          spaceBetween: 25,
          slidesPerView: 2.4,
        },
        992: {
          spaceBetween: 15,
          slidesPerView: 3.4,
        },
        1280: {
          slidesPerView: 3.73,
          spaceBetween: 43
        },
      },
      modules: [Navigation],
      navigation: {
        nextEl: nextEl,
        prevEl: prevEl,
      },
    });
  });


}
