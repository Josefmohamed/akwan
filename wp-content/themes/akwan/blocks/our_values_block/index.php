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
        <h2 class="akwan-h2 title fw-700 sky-breeze capitalize-text animation-fade-me-up"><?= $title ?></h2>
        <?php } ?>
        <div class="values-description column animation-fade-me-up">
            <?php if ($description) { ?>
            <div class="paragraph-20 fw-600 sky-breeze description"><?= $description ?></div>
            <?php } ?>
            <?php if (have_rows('values')) { ?>
                <div class="values-wrapper">
                    <?php
                    $index = 1;
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
                        $index++;
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <svg class="site-shape" width="504" height="255" viewBox="0 0 504 255" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M229.302 37.5596L203.935 62.9619H135.972L234.159 161.189H305.543L370.612 226.327L429.954 166.965L467.383 204.524L442.016 229.927H371.08L346.011 255H341.863L368.497 228.357L304.33 164.13H237.25L328.09 255H323.925L233.23 164.274H161.84L96.7705 99.1367L37.4287 158.499L0 120.939L25.3672 95.5371H96.3027L132.42 59.4082L132.446 59.4346L191.867 0L229.302 37.5596ZM374.125 226.979H440.81L463.244 204.518L463.251 204.524L429.968 171.125L374.125 226.979ZM98.8994 97.1064L163.066 161.334H230.146L132.42 63.5752L98.8994 97.1064ZM26.5869 98.4775L4.15234 120.939L37.4287 154.339L93.2705 98.4775H26.5869ZM136.024 60.0215H202.709L225.144 37.5596L225.15 37.5527L191.867 4.16016L136.024 60.0215Z" fill="#023568"/>
        <path d="M229.289 240.04L214.35 255H210.202L225.144 240.04H225.15L191.867 206.641L143.523 255H139.359L191.86 202.48L229.289 240.04Z" fill="#023568"/>
        <path d="M504 58.4727L502.452 60.0215H504V62.9619H502.386L504 64.5762V68.7295L498.84 63.5684L465.32 97.0996L504 135.815V139.983L463.191 99.1367L403.849 158.499L366.421 120.939H366.427L391.795 95.5371H462.729L498.847 59.4082L498.873 59.4346L504 54.3057V58.4727ZM393.014 98.4775L370.579 120.939H370.572L403.855 154.339L459.698 98.4775H393.014Z" fill="#023568"/>
    </svg>

</section>

