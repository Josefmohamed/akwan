<?php
$id = '';
$className = 'map_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/map_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$sub_title = get_field('sub_title');
$mab = get_field('mab');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <div class="content column">
            <?php if ($title) { ?>
            <div class="akwan-h6 title fw-400 sky-breeze"><?= $title ?></div>
            <?php } ?>
            <?php if ($sub_title) { ?>
                <h6 class="akwan-h3 sub-title fw-700 sky-breeze">
                    <?= $sub_title ?></h6>
            <?php } ?>

        </div>
        <?php if ($mab) { ?>
        <div class="mab">
            <?= $mab ?>
        </div>
        <?php } ?>
    </div>
</section>

