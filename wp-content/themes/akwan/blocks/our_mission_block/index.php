<?php
$id = '';
$className = 'our_mission_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_mission_block/screenshot.png">';
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
        <div class="content column animation-fade-me-up">
            <?php if ($title) { ?>
                <h2 class="akwan-h2 title fw-700 capitalize-text"><?= $title ?></h2>
            <?php } ?>
            <?php if ($description) { ?>
                <div class="description paragraph-17"><?= $description ?></div>
            <?php } ?>
        </div>
    </div>
</section>

