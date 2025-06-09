//import blocks
import {headerBlock} from "./headerBlock";
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {get_in_touch_block} from './get_in_touch_block';
import {page_not_found} from './page_not_found';
export function indexBlocks() {
  headerBlock()
  hero_block()
  footerBlock()
  get_in_touch_block()
  page_not_found()
}

