//import blocks
import {headerBlock} from "./headerBlock";
import {footerBlock} from './footerBlock';
import {hero_block} from './hero_block';
import {get_in_touch_block} from './get_in_touch_block';
import {page_not_found} from './page_not_found';
import {about_us_block} from './about_us_block';
import {our_mission_block} from './our_mission_block'
import {our_vision_block} from './our_vision_block';
import {our_values_block} from './our_values_block';
import {map_block} from './map_block';
import {our_projects_block} from './our_projects_block';

export function indexBlocks() {
  headerBlock()
  hero_block()
  footerBlock()
  get_in_touch_block()
  page_not_found()
  about_us_block()
  our_mission_block()
  our_vision_block()
  our_values_block()
  map_block()
  our_projects_block()
}

