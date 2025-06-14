<?php
$id = '';
$className = 'about_us_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/about_us_block/screenshot.png">';
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
    <div class="hero-image animation-fade-me-up">
        <?php
        $picture_class = 'cover-image aspect-ratio';
        echo bis_get_attachment_picture(
            $image,
            [
                375 => [375, 211, 1],
                1024 => [1024, 576, 1],
                1280 => [1280, 720, 1],
                1440 => [1440, 810, 1],
                1920 => [1920, 1080, 1]
            ],
            [
                'retina' => true, 'picture_class' => $picture_class,
            ]
        );
        ?>
        <div class="internal-content column large-media animation-fade-me-up">
            <?php if ($title) { ?>
                <h2 class="akwan-h2 title sky-breeze fw-700 capitalize-text"><?= $title ?></h2>
            <?php } ?>
            <?php if ($description) { ?>
                <div class="description paragraph-14 sky-breeze"><?= $description ?></div>
            <?php } ?>
        </div>
    </div>
    <div class="internal-content column small-media animation-fade-me-up">
        <?php if ($title) { ?>
            <h2 class="akwan-h2 title sky-breeze fw-700 capitalize-text"><?= $title ?></h2>
        <?php } ?>
        <?php if ($description) { ?>
            <div class="description paragraph-14 sky-breeze"><?= $description ?></div>
        <?php } ?>
    </div>
</section>

