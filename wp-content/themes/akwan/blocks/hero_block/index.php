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
$image = get_field('image');
$title = get_field('title');
$description = get_field('description');
$cta_button = get_field('cta_button');
?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">

    <div class="hero-image">
        <?php
        $picture_class = 'cover-image';
        echo bis_get_attachment_picture(
            $image,
            [
                375 => [375, 668, 1],
                1024 => [1024, 668, 1],
                1280 => [1280, 836, 1],
                1440 => [1440, 955, 1],
                1728 => [1728, 1338, 1],
                1920 => [1920, 1338, 1]
            ],
            [
                'retina' => true, 'picture_class' => $picture_class,
            ]
        );
        ?>
    </div>
    <div class="container">
        <div class="content column">

                <div class="salute-h2 fw-800 title white-color"><?= $title ?>
                    <svg class="hero-svg" width="1006" height="59" viewBox="0 0 1006 59" fill="none">
                        <path d="M737.8 58.9982C736.906 58.9982 735.985 58.9982 735.02 58.9804C731.22 58.9537 93.0001 58.7576 0 58.7576L0.000610352 41.7056C4.50642 41.7056 731.301 41.9017 735.154 41.9373C743.906 42.0087 747.947 41.7502 753.937 40.7429C773.9 37.3735 784.673 30.3941 797.145 22.3093C808.051 15.2407 819.343 7.93146 837.196 2.78823C842.328 1.31747 849.399 0.506316 860.852 0.0962844C866.797 -0.117645 927.706 0.0606295 984.01 0.283473C1032.31 0.470661 1098.05 0.684591 1101.99 0.702418L1101.91 17.7455C1075.31 17.6118 1018.86 17.4602 984.019 17.3265C924.273 17.0948 866.886 16.9343 861.477 17.1304C851.768 17.4781 845.564 18.1288 841.952 19.1717C826.54 23.6107 816.795 29.9216 806.469 36.6069C793.577 44.968 780.248 53.5965 756.798 57.5542C749.914 58.713 744.845 58.9982 737.8 58.9982Z"
                              fill="#8BCCFE"/>
                    </svg>
                </div>

            <?php if ($description): ?>
                <div class="paragraph-28 description white-color"><?= $description ?></div>
            <?php endif; ?>
                <?php if (!empty($cta_button) && is_array($cta_button)) { ?>
                    <a class="cta-button light fw-400" href="<?= $cta_button['url'] ?>" target="<?= $cta_button['target'] ?>"><?= $cta_button['title'] ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.678 15.9248H13.5872V6.21577C13.5872 4.50452 12.2582 3.11219 10.6247 3.11219H0V0.92334H10.6262C13.4119 0.92334 15.678 3.29731 15.678 6.21577V15.9248Z" fill="#011632"/>
                            <path d="M1.44336 15.9247H0V13.7343H1.44336C5.91005 13.7343 9.54368 9.92754 9.54368 5.24805H11.6345C11.6345 8.09961 10.5742 10.7801 8.64975 12.7978C6.72528 14.8139 4.16525 15.9247 1.44336 15.9247Z" fill="#011632"/>
                        </svg>
                    </a>
                <?php } ?>
        </div>
  </div>
</section>

