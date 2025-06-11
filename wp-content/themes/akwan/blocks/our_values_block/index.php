<?php
$id = '';
$className = 'our_values_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_values_block/screenshot.png">';
      return;
    }
  }
}
?>
<?php
$title = get_field('title');
$description = get_field('description');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <?php if ($title) { ?>
        <h2 class="akwan-h2 title fw-700 sky-breeze"><?= $title ?></h2>
        <?php } ?>
        <div class="values-description column">
            <?php if ($description) { ?>
            <div class="paragraph-20 fw-600 sky-breeze description"><?= $description ?></div>
            <?php } ?>
            <?php if (have_rows('values')) { ?>
                <div class="values-wrapper">
                    <?php
                    $index = 1; // نبدأ من 1 بدلاً من 0
                    while (have_rows('values')) {
                        the_row();
                        $values_content = get_sub_field('values_content');
                        ?>
                        <div class="values-card">
                            <?php if ($values_content) { ?>
                            <div class="index-card">
                    <span class="akwan-h3 fw-700 sky-breeze index">
                        <?php
                        echo ($index < 10) ? '0' . $index : $index;
                        ?>
                    </span>
                                <svg class="svg-card" width="65" height="65" viewBox="0 0 65 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.2029 49.7783L-7.62939e-06 65L30.2991 64.8932L46.9752 64.8397L65 46.7898L64.9852 43.3947L64.5732 7.59208e-06L50.1172 14.4738L50.1172 49.9564L32.0213 49.8644L15.2029 49.7783Z" fill="#003964"/>
                                </svg>
                            </div>
                            <?php } ?>
                            <?php if ($values_content) { ?>
                                <div class="paragraph-17 sky-breeze"><?= $values_content ?></div>
                            <?php } ?>
                        </div>
                        <?php
                        $index++; // زيادة الرقم مع كل صف
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

