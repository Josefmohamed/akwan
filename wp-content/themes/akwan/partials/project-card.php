<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$image_id = get_field('project_image', $post_id);
$about_project = get_field('about_project', $post_id);

?>


<div class="swiper-slide project-card" id="post-id-<?= $post_id ?>">

    <?php if ($post_title) { ?>
        <a class="title-wrapper" href="<?= get_permalink($post_id); ?>">
            <span class="akwan-h6  card-title">
                <?= $post_title ?>
            </span>
            <?php if ($about_project) { ?>
                <span class="about_project paragraph-11">
                    <?= $about_project ?>
                </span>
            <?php } ?>
            <svg class="arrow-svg" width="32" height="12" viewBox="0 0 32 12" fill="none">
                <path d="M7.37 0H0L11.18 11.35H20.16L31.34 0H23.97L15.67 8.39L7.37 0Z" fill="#023568"/>
            </svg>

        </a>
    <?php } ?>
    <?php if ($image_id) { ?>
        <?php
        $picture_class = 'project-image aspect-ratio';
        echo bis_get_attachment_picture(
            $image_id,
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
