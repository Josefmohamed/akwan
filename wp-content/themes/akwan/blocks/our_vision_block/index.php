<?php
$id = '';
$className = 'our_vision_block';
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
      echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_vision_block/screenshot.png">';
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
    <svg class="site-shape" width="940" height="378" viewBox="0 0 940 378" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M574.785 75.2545H653.432L682.79 45.8559L639.474 2.38745L570.704 71.1801L570.674 71.1496L528.875 112.962H446.78L417.422 142.361L460.739 185.829L529.417 117.128L604.723 192.513H687.336L805.09 310.306L848.696 266.685L771.033 188.942H688.419L574.777 75.2622L574.785 75.2545ZM677.985 45.8483L652.021 71.8439H574.846L639.474 7.19438L677.993 45.8483H677.985ZM422.228 142.353L448.192 116.358H525.367L460.739 181L422.22 142.346L422.228 142.353ZM606.142 189.095L531.88 114.763L570.674 75.9565L683.774 189.103H606.134L606.142 189.095ZM769.629 192.338L843.891 266.67L805.097 305.476L691.997 192.338H769.637H769.629Z" fill="#023568"/>
        <path d="M269.922 191.453L383.564 305.133H304.962L275.604 334.532L318.921 378L387.66 309.238L429.458 267.433H511.553L540.911 238.034L497.595 194.566L428.917 263.267L353.611 187.882H270.997L157.355 74.2015H236.002L265.361 44.8029L222.044 1.33447L153.274 70.1271L153.244 70.0966L111.445 111.909H29.3582L0 141.3L43.3165 184.769L111.995 116.068L187.301 191.453H269.914H269.922ZM280.41 334.532L306.374 308.536H383.549L318.921 373.185L280.402 334.532H280.41ZM260.563 44.8029L234.599 70.7985H157.424L222.052 6.14904L260.57 44.8029H260.563ZM536.121 238.034L510.157 264.03H432.982L497.61 199.38L536.129 238.034H536.121ZM352.207 191.285L426.468 265.617L387.675 304.423L274.575 191.285H352.215H352.207ZM4.80532 141.3L30.7693 115.305H107.944L43.3165 179.947L4.79769 141.293L4.80532 141.3ZM188.719 188.05L114.458 113.718L153.252 74.9111L266.352 188.057H188.712L188.719 188.05Z" fill="#023568"/>
        <path d="M812.078 67.0889L850.872 28.2822L822.616 0H827.407L853.312 25.9326L879.236 0H884.067L857.386 26.6875H934.561L939.33 21.9121V26.7129L935.949 30.0986H853.854L812.056 71.9033L743.316 140.666L700 97.1973L729.358 67.7988H807.96L740.184 0H745.012L812.078 67.0889ZM704.812 97.1963L743.324 135.844L807.952 71.2012H730.777L704.812 97.1963Z" fill="#023568"/>
        <path d="M545.852 20.877L516 52.4092H432.525L390.024 97.248L320.131 171L276.086 124.377L305.938 92.8447H385.859L297.872 0H302.772L390.04 92.084L429.485 50.4609L381.693 0H386.574L431.975 47.9404L477.407 0H482.314L436.108 48.751H514.58L540.98 20.8691L540.988 20.877L521.266 0H526.129L545.852 20.877ZM307.373 96.4951L280.973 124.377L320.131 165.828L385.845 96.4951H307.373Z" fill="#023568"/>
    </svg>
    <div class="cards-wrapper">
        <div class="left-image-card animation-fade-me-up">
            <?php
            $picture_class = 'left-image aspect-ratio';
            echo bis_get_attachment_picture(
                $image,
                [
                    375 => [327, 411, 1],
                    1024 => [445, 560, 1],
                    1280 => [579, 727, 1],
                    1440 => [662, 832, 1],
                    1920 => [912, 1147, 1],
                    3840 => [1912, 2404, 1]
                ],
                [
                    'retina' => true, 'picture_class' => $picture_class,
                ],
            );
            ?>
        </div>
        <div class="right-content column animation-fade-me-up">
            <?php if ($title) { ?>
                <h2 class="akwan-h2 title sky-breeze fw-700 capitalize-text"><?= $title ?></h2>
            <?php } ?>
            <?php if ($description) { ?>
                <div class="description paragraph-14 sky-breeze"><?= $description ?></div>
            <?php } ?>
            <div class="line"></div>
        </div>
    </div>
</section>

