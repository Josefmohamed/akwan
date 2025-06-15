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
$title = get_field('title');
$description = get_field('description');
$form_title = get_field('form_title');
$form = get_field('form');
$email_info = get_field('email_info');
$email = get_field('email');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="content-wrapper">
        <div class="left-content column animation-fade-me-up">
            <?php if ($title) { ?>
                    <h4 class="akwan-h5 fw-600 sky-breeze"><?= $title ?></h4>
                <?php } ?>
            <?php if ($description) { ?>
                    <div class="description akwan-h4 fw-700 sky-breeze"><?= $description ?></div>
                <?php } ?>
            <div class="mail-info column">
                <?php if ($email_info) { ?>
                    <div class="description paragraph-18 fw-600 sky-breeze"><?= $email_info ?></div>
                <?php } ?>
                <?php if ($email) : ?>
                    <a href="mailto:<?= $email ?>"
                       class="email paragraph-18 twilight-steel sky-breeze fw-600 color-transition">
                        <svg class="mail-svg" width="28" height="23" viewBox="0 0 28 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M28 4.24343V16.9411C28 20.2187 25.4027 22.8701 22.1922 22.8701H5.815C2.60448 22.8701 0 20.2187 0 16.9411V4.24343C0 3.77205 0.0865756 3.33014 0.259727 2.91768L9.94177 14.1276C11.363 15.77 13.6357 16.4476 15.7856 15.6964C16.7235 15.365 17.5316 14.7389 18.1881 13.9803L27.6248 3.05762C27.6681 3.00607 27.7042 2.96188 27.7331 2.90295C27.9062 3.31541 28 3.77205 28 4.25079V4.24343Z" fill="#023568"/>
                                <path d="M25.5396 0.987961C25.5396 0.987961 25.4602 1.05425 25.4314 1.09107L15.872 12.1684C15.3886 12.7208 14.7176 13.0375 13.9962 13.0375C13.2747 13.0375 12.6037 12.7282 12.1204 12.1684L2.45996 0.980596C2.71969 0.906943 3.00827 0.870117 3.29686 0.870117H24.6883C24.9841 0.870117 25.2654 0.914309 25.5396 0.987961Z" fill="#023568"/>
                        </svg>
                        <?= $email ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($form) {?>
            <div class="contact-us-form-wrapper column contact-details animation-fade-me-up">
                <?php if ($form_title) { ?>
                <div class="paragraph-18 sky-breeze text-center fw-500 form-title"><?= $form_title ?></div>
                <?php } ?>
                <?php echo do_shortcode('[gravityform id="' . $form . '" ajax="true" title="false" description="false"]'); ?>
            </div>
        <?php } ?>
    </div>
</section>
