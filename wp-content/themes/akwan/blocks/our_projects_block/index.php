<?php
$id = '';
$className = 'our_projects_block';
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
            echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/our_projects_block/screenshot.png">';
            return;
        }
    }
}
?>
<?php

$main_title = get_field('main_title');

?>
<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($className) ?>">
    <div class="container">
        <?php if ($main_title) { ?>
            <h2 class="main-title">
                <?= $main_title ?>
            </h2>
        <?php } ?>
        <div class="content-wrapper">

            <?php if (have_rows('projects')) {
                $index = 1;
                while (have_rows('projects')) {
                    the_row();
                    $title = get_sub_field("title");
                    $programmatic_or_manual = get_sub_field("manual_or_programmatic");


                    if ($programmatic_or_manual === 'programmatic') {
                        $query_options = get_sub_field("query_options") ?: [];
                        $number_of_posts = isset($query_options['number_of_posts']) ? (int)$query_options['number_of_posts'] : -1;
                        $order = isset($query_options['order']) && in_array($query_options['order'], ['asc', 'desc']) ? $query_options['order'] : 'DESC';
                        $args = [
                            "post_type" => "projects",
                            "posts_per_page" => $number_of_posts,
                            "order" => $order,
                            "post_status" => "publish",
                            "paged" => 1,
                            'orderby' => 'date',
                        ];
                        $the_query = new WP_Query($args);
                    }

                    ?>
                    <div class="projects-wrapper">
                        <h5 class="projects-title">
                            <span><?= $index ?></span>)
                            <?= $title ?>
                        </h5>

                        <?php if ($programmatic_or_manual === 'manual') {
                            ?>
                            <div class="swiper projects-swiper">
                                <div class="swiper-wrapper cards-wrapper">
                                    <?php
                                    $cards = get_sub_field("project_card");
                                    if (is_array($cards)) {
                                        foreach ($cards as $card) {
                                            get_template_part("partials/project-card", "", ["post_id" => $card->ID]);
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="swiper-button-prev">
                                    <svg width="19" height="52" viewBox="0 0 19 52" fill="none">
                                        <g clip-path="url(#clip0_49_1405)">
                                            <path d="M19 12.2285L19 0L-2.7182e-06 18.5501L-3.36949e-06 33.4499L19 52L19 39.7715L4.95506 26L19 12.2285Z"
                                                  fill="#EFEBE2"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_49_1405">
                                                <rect width="52" height="19" fill="white"
                                                      transform="translate(19) rotate(90)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                                <div class="swiper-button-next">
                                    <svg width="19" height="52" viewBox="0 0 19 52" fill="none">
                                        <g clip-path="url(#clip0_49_1401)">
                                            <path d="M-5.34523e-07 39.7715L0 52L19 33.4499L19 18.5501L-2.27299e-06 0L-1.73847e-06 12.2285L14.0449 26L-5.34523e-07 39.7715Z"
                                                  fill="#EFEBE2"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_49_1401">
                                                <rect width="52" height="19" fill="white"
                                                      transform="translate(0 52) rotate(-90)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                            </div>

                        <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>

                            <div class="swiper projects-swiper">
                                <div class="swiper-wrapper cards-wrapper">
                                    <?php while ($the_query->have_posts()) {
                                        $the_query->the_post();
                                        get_template_part("partials/project-card", "", ["post_id" => get_the_ID()]);
                                    } ?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                                <div class="swiper-button-prev">
                                    <svg width="19" height="52" viewBox="0 0 19 52" fill="none">
                                        <g clip-path="url(#clip0_49_1405)">
                                            <path d="M19 12.2285L19 0L-2.7182e-06 18.5501L-3.36949e-06 33.4499L19 52L19 39.7715L4.95506 26L19 12.2285Z"
                                                  fill="#EFEBE2"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_49_1405">
                                                <rect width="52" height="19" fill="white"
                                                      transform="translate(19) rotate(90)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                                <div class="swiper-button-next">
                                    <svg width="19" height="52" viewBox="0 0 19 52" fill="none">
                                        <g clip-path="url(#clip0_49_1401)">
                                            <path d="M-5.34523e-07 39.7715L0 52L19 33.4499L19 18.5501L-2.27299e-06 0L-1.73847e-06 12.2285L14.0449 26L-5.34523e-07 39.7715Z"
                                                  fill="#EFEBE2"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_49_1401">
                                                <rect width="52" height="19" fill="white"
                                                      transform="translate(0 52) rotate(-90)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                            </div>
                        <?php } ?>


                    </div>
                    <?php
                    $index++;
                }
            } ?>
        </div>
    </div>
</section>

