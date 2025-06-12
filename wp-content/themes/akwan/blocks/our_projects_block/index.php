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

                    <h5 class="projects-title">
                        <span><?= $index ?></span>)
                        <?= $title ?>
                    </h5>

                    <?php if ($programmatic_or_manual === 'manual') {
                        ?>
                        <div class="swiper projects-wrapper">
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
                            <div class="swiper-button-prev">^^</div>
                            <div class="swiper-button-next">^^</div>
                        </div>

                    <?php } elseif (isset($the_query) && $the_query->have_posts()) { ?>

                        <div class="swiper projects-wrapper">
                            <div class="swiper-wrapper cards-wrapper">
                                <?php while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    get_template_part("partials/project-card", "", ["post_id" => get_the_ID()]);
                                } ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="swiper-button-prev">^^</div>
                            <div class="swiper-button-next">^^</div>
                        </div>
                    <?php } ?>

                    <?php
                    $index++;
                }
            } ?>
        </div>
    </div>
</section>

