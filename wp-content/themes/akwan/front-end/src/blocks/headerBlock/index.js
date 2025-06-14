import './style.scss';
import {gsap} from "gsap";

export function headerBlock() {
    const header = document.querySelector('header');
    if (!header) return;

    const burgerMenu = header.querySelector('.burger-menu');
    const menuLinks = header.querySelector('.navbar');

    if (!burgerMenu) return;

    burgerMenu.addEventListener('click', function () {
        if (burgerMenu.classList.contains('burger-menu-active')) {
            // region allow page scroll
            document.documentElement.classList.remove('modal-opened');
            // endregion allow page scroll
            burgerMenu.classList.remove('burger-menu-active');
            menuLinks.classList.remove('header-links-active');
            header.classList.remove('header-active');
        } else {
            burgerMenu.classList.add('burger-menu-active');
            menuLinks.classList.add('header-links-active');
            header.classList.add('header-active');
            // region prevent page scroll
            document.documentElement.classList.add('modal-opened');
            // endregion prevent page scroll
            gsap.fromTo(menuLinks.querySelectorAll('.menu-item , .cta-wrappers'), {
                y: 30,
                autoAlpha: 0,
            }, {
                y: 0,
                autoAlpha: 1,
                stagger: .05,
                duration: .4,
                delay: .5,
            });
        }
    });

    // region open sub menu in responsive
    const menuItems = header.querySelectorAll('.menu-item-has-children');
    const mobileMedia = window.matchMedia('(max-width: 992px)');
    menuItems.forEach((menuItem) => {
        const menuItemBody = menuItem.querySelector('.sub-menu');
        menuItem?.addEventListener('click', (e) => {

            if (!mobileMedia.matches || !menuItemBody || e.target.classList.contains('header-link') || e.target.closest('.sub-menu,.menu-item-in-sub-menu a')) return;
            const isOpened = menuItem?.classList.toggle('menu-item-active');
            if (!isOpened) {
                gsap.to(menuItemBody, {height: 0});
            } else {
                gsap.to(Array.from(menuItems).map(otherMenuItem => {
                    const otherMenuItemBody = otherMenuItem.querySelector('.sub-menu');
                    if (otherMenuItemBody && menuItem !== otherMenuItem) {
                        otherMenuItem?.classList.remove('menu-item-active');
                        gsap.set(otherMenuItem, {zIndex: 1});
                    }
                    return otherMenuItemBody;
                }), {height: 0});
                gsap.set(menuItem, {zIndex: 2});
                gsap.to(menuItemBody, {height: 'auto'});
            }
        });
    });


    // endregion open sub menu in responsive

    header.querySelectorAll('a').forEach(anchor => {
        anchor.addEventListener('click', event => {
            if ((anchor.href === window.location.href || anchor.href === window.location.href + '#' || anchor.href === window.location.href.slice(0, -1))) {
                event.stopPropagation();
            }
        });
    });

}

