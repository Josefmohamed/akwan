<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$post_image = get_the_post_thumbnail($post_id);
$thumbnail_id = get_post_thumbnail_id($post_id);
?>
<div class="swiper-slide blog-card" id="post-id-<?= $post_id ?>">

    <?php if ($post_title) { ?>
        <a class="salute-h3 fw-800 card-title" href="<?= get_permalink($post_id); ?>">
            <?= $post_title ?>
        </a>
    <?php } ?>
    <?php if ($thumbnail_id) { ?>
            <?php
            $picture_class = 'cover-image';
            echo bis_get_attachment_picture(
                $thumbnail_id,
                [
                    320 => [272, 674, 1],
                    375 => [327, 617, 1],
                    600 => [552, 544, 1],
                    768 => [704, 610, 1],
                    992 => [928, 568, 1],
                    1024 => [960, 526, 1],
                    1280 => [1192, 738, 1],
                    1440 => [1352, 770, 1],
                    1728 => [1640, 770, 1]
                ],
                [
                    'retina' => true, 'picture_class' => $picture_class,
                ]
            );
            ?>
    <?php } ?>
</div>
