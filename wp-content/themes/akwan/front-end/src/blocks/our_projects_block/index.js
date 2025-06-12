import './style.scss';
import 'swiper/swiper.scss';
import Swiper from 'swiper';

import {Navigation} from 'swiper/modules';

export function our_projects_block() {
  const block = document.querySelector('.our_projects_block');
  if (!block) return;


  // Select all swiper wrappers inside the block
  const wrappers = block.querySelectorAll('.projects-wrapper');

  wrappers.forEach((wrapper) => {
    // Optional: get next/prev buttons if they exist within each wrapper
    const nextEl = wrapper.querySelector('.swiper-button-next');
    const prevEl = wrapper.querySelector('.swiper-button-prev');

    new Swiper(wrapper, {
      slidesPerView: 1.4,
      spaceBetween: 25,
      loop: true,
      breakpoints: {
        768: {
          spaceBetween: 35
        },
        1280: {
          spaceBetween: 5
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
