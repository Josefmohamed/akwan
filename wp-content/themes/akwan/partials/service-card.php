<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$comment = get_field('comment', $post_id);
$index = $args['index'] ?? null;

?>
<div class="accordion-panel">
    <?php if ($post_title) { ?>
        <div id="panel2-title" class="title ">
            <button class="accordion-trigger salute-h6 fw-700" aria-expanded="false" aria-controls="accordion1-content">
                <?= $post_title ?>

            </button>
        </div>
    <?php } ?>
    <?php if ($comment) { ?>
        <div class="accordion-content" role="region" aria-labelledby="panel2-title" aria-hidden="true" id="panel2-content">
            <div class="body-6 answer  white-color">
                <svg class="svg-answer" width="479" height="32" viewBox="0 0 479 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M198.261 -1.7202e-05C198.748 -1.72446e-05 199.249 -1.34737e-05 199.774 0.00965483C201.843 0.02416 1110.31 0.130482 1136 0.130482L1135.99 9.37931C1105.75 9.37931 201.799 9.27299 199.701 9.25365C194.937 9.21498 192.737 9.35518 189.476 9.90151C178.609 11.729 172.745 15.5146 165.955 19.8997C160.018 23.7337 153.871 27.6981 144.152 30.4878C141.359 31.2855 137.509 31.7255 131.275 31.9479C128.039 32.0639 94.8813 31.9672 64.2305 31.8463C37.9354 31.7448 2.15015 31.6288 0.00390622 31.6191L0.0477287 22.3751C14.5312 22.4476 45.2599 22.5298 64.2256 22.6023C96.7501 22.728 127.99 22.8151 130.934 22.7087C136.22 22.5201 139.597 22.1672 141.563 21.6015C149.954 19.1939 155.258 15.7709 160.879 12.1448C167.897 7.60985 175.154 2.92983 187.919 0.783212C191.666 0.154698 194.426 -1.68668e-05 198.261 -1.7202e-05Z" fill="#8BCCFE"/>
                </svg>
                <p class="spacer"></p>
                <?= $comment ?>
            </div>
        </div>
    <?php } ?>
    <div class="link-index">
        <div class="link learn paragraph-20"
             data-open-label="Learn more"
             data-close-label="Show less">
            <div class="svg-cards">
                <svg class="svg-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.717 15.9248H13.6262V6.21577C13.6262 4.50452 12.2972 3.11219 10.6638 3.11219H0.0390625V0.92334H10.6653C13.451 0.92334 15.717 3.29731 15.717 6.21577V15.9248Z" fill="#E9F7FE"/>
                    <path d="M1.48242 15.9249H0.0390625V13.7345H1.48242C5.94911 13.7345 9.58275 9.92778 9.58275 5.24829H11.6735C11.6735 8.09986 10.6133 10.7803 8.68882 12.798C6.76434 14.8142 4.20431 15.9249 1.48242 15.9249Z" fill="#E9F7FE"/>
                </svg>
            </div>
            <span class="label">Learn more</span>
        </div>
        <?php if ($index !== null): ?>
            <span class="paragraph-28 index-card fw-800">
        <?= str_pad($index, 2, '0', STR_PAD_LEFT); ?>
    </span>
        <?php endif; ?>
    </div>
</div>
