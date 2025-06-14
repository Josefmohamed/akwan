<?php
$id = '';
$className = 'hero_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/hero_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
$cta_button = get_field('cta_button');
$image = get_field('image');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <div class="cards-wrapper ">
            <div class="left-content column animation-fade-me-up">
                <?php if ($title) { ?>
                    <h1 class="akwan-h1 title white-color fw-700 capitalize-text"><?= $title ?></h1>
                <?php } ?>
                <?php if ($description) { ?>
                    <div class="description paragraph-14 white-color"><?= $description ?></div>
                <?php } ?>
                <?php if (!empty($cta_button) && is_array($cta_button)) { ?>
                    <a class="cta-button theme-cta-button cta-hero" href="<?= $cta_button['url'] ?>" target="<?= $cta_button['target'] ?>"><?= $cta_button['title'] ?></a>
                <?php } ?>
            </div>
            <div class="right-image animation-fade-me-up">
                <?php
                $picture_class = 'image aspect-ratio';
                echo bis_get_attachment_picture(
                    $image,
                    [
                        375 => [327, 376, 1],
                        1024 => [399, 458, 1],
                        1280 => [432, 496, 1],
                        1440 => [498, 573, 1],
                        1920 => [698, 802, 1],
                        3840 => [1495, 1718, 1]
                    ],
                    [
                        'retina' => true, 'picture_class' => $picture_class,
                    ],
                );
                ?>
            </div>
        </div>
    </div>
    <svg class="v-shape" width="314" height="706" viewBox="0 0 314 706" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g style="mix-blend-mode:multiply" opacity="0.15">
            <path d="M157 1H311.708V47.166L199.144 158.41L78.0479 278.142L314 513.766V706L22.6895 420.563L0 398.121V158.41L110.676 47.166L157 0.581055V1Z" fill="#003964"/>
        </g>
    </svg>
</section>

