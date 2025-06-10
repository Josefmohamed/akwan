//import blocks
import {headerBlock} from "./headerBlock";
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {get_in_touch_block} from './get_in_touch_block';
import {page_not_found} from './page_not_found';
import {about_us_block} from './about_us_block';
import {our_mission_block} from './our_mission_block';
export function indexBlocks() {
  headerBlock()
  hero_block()
  footerBlock()
  get_in_touch_block()
  page_not_found()
  about_us_block()
  our_mission_block()
}

