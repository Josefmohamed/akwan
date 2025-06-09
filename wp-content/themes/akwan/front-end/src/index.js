import './styles/index.scss';
import {indexBlocks} from './blocks/index-blocks';
import {activePage} from "./scripts/active-page";
import {generalPageAnimation} from './scripts/generalPageAnimation';
import {headerSticky} from "./scripts/header-sticky";

document.addEventListener('DOMContentLoaded', async () => {
  indexBlocks();
  activePage();
  headerSticky();
  generalPageAnimation();
});

