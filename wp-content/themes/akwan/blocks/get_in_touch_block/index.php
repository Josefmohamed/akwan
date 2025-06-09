<?php
$id = '';
$className = 'get_in_touch_block';
if (isset($block)) {
  $id = $block['id'];
  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }
  if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
  }
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  if (function_exists('is_admin') && is_admin()) {
    if (wp_is_json_request() || (defined('REST_REQUEST') && REST_REQUEST) || (function_exists('get_current_screen') && get_current_screen()->is_block_editor())) {
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/get_in_touch_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title_form = get_field('title_form');
$description_form = get_field('description_form');
$title = get_field('title');
$description = get_field('description');
$follow_us = get_field('follow_us');
$form = get_field('form');
$phone_number = get_field('phone_number');
$email = get_field('email');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <svg class="get-in-touch-svg" width="1728" height="56" viewBox="0 0 1728 56" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M161.48 0.000143684C162.333 0.000143609 163.211 0.000147347 164.132 0.0170693C167.757 0.0424519 1760 0.228516 1805.03 0.228516L1805 16.4139C1752 16.4139 167.681 16.2279 164.004 16.194C155.654 16.1263 151.798 16.3717 146.083 17.3278C127.036 20.5259 116.758 27.1507 104.859 34.8246C94.4525 41.5339 83.6794 48.4718 66.6455 53.3536C61.7494 54.7496 55.0023 55.5196 44.0757 55.9088C38.4033 56.1118 -19.7101 55.9426 -73.4307 55.7311C-119.517 55.5534 -182.237 55.3504 -185.998 55.3335L-185.921 39.1565C-160.537 39.2834 -106.68 39.4272 -73.4392 39.5541C-16.4347 39.7741 38.318 39.9264 43.4785 39.7403C52.7418 39.4103 58.6616 38.7927 62.1077 37.8028C76.813 33.5893 86.1105 27.5991 95.9624 21.2535C108.262 13.3174 120.98 5.12736 143.354 1.37079C149.922 0.270893 154.758 0.000144271 161.48 0.000143684Z" fill="#8BCCFE"/>
    </svg>
    <div class="container">
    <div class="content-wrapper">
        <div class="left-content">
            <div class="top-content">
                <?php if ($title) { ?>
                    <h4 class="salute-h4 title uppercase-text fw-800"><?= $title ?></h4>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="description salute-h6"><?= $description ?></div>
                <?php } ?>
            </div>
            <div class="contact-social-links">
                <div class="tel-and-mail">
                    <?php if ($phone_number) : ?>
                        <a href="tel:<?= $phone_number ?>" class="phone-number paragraph-20 twilight-steel">
                            <svg class="same-svg" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_17_1489)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.74702 6.17406C8.38509 5.53099 8.38253 4.48043 7.74088 3.84044L4.37196 0.478327C3.73031 -0.16166 2.6834 -0.159094 2.04533 0.483973C-2.64834 5.21588 1.69585 11.7707 5.48385 15.5511C9.27184 19.3315 15.8291 23.6554 20.5232 18.9235C21.1613 18.2799 21.1588 17.2299 20.5171 16.5899L17.1482 13.2278C16.5065 12.5878 15.4596 12.5904 14.8216 13.2339C13.2399 14.8285 13.5224 15.2807 11.5299 14.1285C9.60853 13.0174 7.98854 11.4007 6.87102 9.47921C5.71206 7.48688 6.16439 7.76813 7.74651 6.17355L7.74702 6.17406Z" fill="#182A3B"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_17_1489">
                                        <rect width="21" height="21" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <?= $phone_number ?></a>
                    <?php endif; ?>
                    <?php if ($email) : ?>
                        <a href="mailto:<?= $email ?>"
                           class="email paragraph-20 twilight-steel">
                            <svg class="same-svg" width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.47018 0H21.5298C21.9436 0 22.3192 0.177999 22.5873 0.46348L11.5 8.18966L0.412693 0.46348C0.680804 0.177999 1.05583 0 1.47018 0ZM22.9983 1.43878L14.3202 7.48619L22.9729 14.779C22.9906 14.6858 23 14.5891 23 14.4907V1.50929C23 1.48541 22.9994 1.46209 22.9983 1.43878ZM22.435 15.6776L13.4421 8.09753L11.7936 9.24628C11.7698 9.26334 11.7448 9.27869 11.7188 9.2912L11.6994 9.3003C11.6385 9.32703 11.5742 9.34068 11.5105 9.34239H11.4878C11.4241 9.34125 11.3598 9.32703 11.2989 9.3003L11.2795 9.2912C11.2535 9.27869 11.2286 9.26334 11.2047 9.24628L9.55619 8.09753L0.564475 15.6776C0.814306 15.8794 1.12895 16 1.47018 16H21.5298C21.8705 16 22.1851 15.8794 22.4355 15.6776H22.435ZM0.0271435 14.779L8.67984 7.48619L0.00166185 1.43878C0.00055395 1.46209 0 1.48598 0 1.50929V14.4907C0 14.5891 0.00941715 14.6858 0.0271435 14.779Z" fill="#182A3B"/>
                            </svg>
                            <?= $email ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="social-links-follow column">
                    <?php if ($follow_us) { ?>
                        <div class="paragraph-26 fw-700 follow-us"><?= $follow_us ?></div>
                    <?php } ?>
                    <?php if (have_rows('social_links')) { ?>
                        <div class="social-links-wrapper">
                            <?php while (have_rows('social_links')) {
                                the_row();
                                $url = get_sub_field('url');
                                $icon = get_sub_field('icon');
                                ?>
                                <a href="<?= $url ?>" target="_blank" class="social-link" aria-label=" (opens in a new tab)">
                                    <?php if (!empty($icon) && is_array($icon)) { ?>
                                        <picture class="icon-wrapper cover-image">
                                            <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                        </picture>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($form) {?>
            <div class="contact-us-form-wrapper iv-st-from-bottom contact-details">
                <div class="column form-info">
                    <?php if ($title_form) { ?>
                        <h6 class="salute-h6 fw-800 uppercase-text form-title"><?= $title_form ?></h6>
                    <?php } ?>
                    <?php if ($description_form) { ?>
                        <div class="paragraph-22"><?= $description_form ?></div>
                    <?php } ?>
                </div>
                <?php echo do_shortcode('[gravityform id="' . $form . '" ajax="true" title="false" description="false"]'); ?>
            </div>
        <?php } ?>
    </div>
  </div>
</section>
