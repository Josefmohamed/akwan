<?php get_header(); ?>
<?php
$post_id = get_the_ID();
$thumbnail_id = get_post_thumbnail_id();

$hide_sidebar = get_field('hide_sidebar', $post_id);
?>
    <section class="single_hero_block">
        <div class="container">
                <div class=" blog-card" id="post-id-<?= $post_id ?>">
                    <h3 class="salute-h3 fw-800 card-title">
                            <?php the_title(); ?>
                        </h3>
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
                    <svg class="card-svg" width="79" height="75" viewBox="0 0 79 75" fill="none">
                        <path d="M78.3821 74.9999H67.9291V26.4596C67.9291 17.9041 61.2847 10.9432 53.1184 10.9432H0V0H53.1258C67.0531 0 78.3821 11.8687 78.3821 26.4596V74.9999Z"
                              fill="#8BCCFE"/>
                        <path d="M7.21608 75.002H0V64.0511H7.21608C29.5473 64.0511 47.7137 45.0192 47.7137 21.624H58.1666C58.1666 35.8805 52.8659 49.2813 43.2445 59.3689C33.6231 69.4488 20.8242 75.002 7.21608 75.002Z"
                              fill="#8BCCFE"/>
                    </svg>
                </div>
        </div>
    </section>
    <section class="single-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>

<?php get_footer(); ?>