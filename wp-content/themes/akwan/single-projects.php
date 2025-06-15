<?php get_header(); ?>
<?php
$post_id = get_the_ID();
$post_title = get_the_title($post_id);

$image_id = get_field('project_image', $post_id);

$project_years = get_field('project_years', $post_id);
$project_type = get_field('project_type', $post_id);
$style = get_field('style', $post_id);
$value = get_field('value', $post_id);

$about_project = get_field('about_project', $post_id);

$prev_post = get_previous_post();
$next_post = get_next_post();
?>
    <div class="project-single">
        <div class="container">
            <?php if ($image_id) { ?>
                <div class="top-wrapper">
                    <?php if ($prev_post): ?>
                        <div class="prev">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <svg width="19" height="53" viewBox="0 0 19 53" fill="none">
                                    <path d="M19 12.6147L19 0.38623L-2.7182e-06 18.9363L-3.36949e-06 33.8361L19 52.3862L19 40.1578L4.95506 26.3862L19 12.6147Z"
                                          fill="#023568"/>
                                </svg>

                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="image-wrapper">
                        <?php
                        $picture_class = 'project-image aspect-ratio';
                        echo bis_get_attachment_picture(
                            $image_id,
                            [
                                320 => [272, 674, 1],

                            ],
                            [
                                'retina' => true, 'picture_class' => $picture_class,
                            ]
                        );
                        ?>
                    </div>
                    <?php if ($next_post): ?>
                        <div class="next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <svg width="20" height="53" viewBox="0 0 20 53" fill="none">
                                    <path d="M0.0109858 40.1578L0.0109863 52.3862L19.011 33.8361L19.011 18.9363L0.0109841 0.38623L0.0109846 12.6147L14.0559 26.3862L0.0109858 40.1578Z"
                                          fill="#023568"/>
                                </svg>

                            </a>
                        </div>
                    <?php endif; ?>

                </div>
            <?php } ?>
            <div class="bottom-wrapper">
                <div class="left-content">
                    <h3 class=" paragraph-18 title"><?= $post_title ?></h3>
                    <?php if ($project_years) { ?>
                        <div class=" paragraph-14 project-years"><?= $project_years ?></div>
                    <?php } ?>
                    <?php if ($project_type) { ?>
                        <div class="paragraph-14 project-type project-list"><span>Projcet |</span><?= $project_type ?></div>
                    <?php } ?>
                    <?php if ($style) { ?>
                        <div class="paragraph-14 project-style project-list"><span>Style |</span><?= $style ?></div>
                    <?php } ?>
                    <?php if ($value) { ?>
                        <div class="paragraph-14 project-value project-list"><span>Value |</span><?= $value ?></div>
                    <?php } ?>

                </div>
                <?php if ($about_project) { ?>
                    <div class="right-content">
                        <h4 class="about-title paragraph-18">About Project</h4>
                        <div class="about-description paragraph-14">
                            <?= $about_project ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php the_content(); ?>

<?php get_footer(); ?>