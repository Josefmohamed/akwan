<?php wp_footer(); ?>
<?php
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$footer_logo = get_field('footer_logo', 'options');
$privacy_policy = get_field('privacy_policy', 'options');
$footer_info = get_field('footer_info', 'options');
$copy_right_text = get_field('copy_right_text', 'options');
?>
<footer>
  <div class="container">
      <div class="horizontal-card column">
          <div class="footer-wrapper">
              <div class="footer-logo-info column">
                  <?php if ($footer_logo) { ?>
                      <a href="<?= site_url() ?>" target="_self" role="img" class="header-logo" aria-labelledby=" header_logo">
                          <?= \Theme\Helpers::display_attachment($footer_logo, array("width" => 115, "height" => 60)) ?>
                      </a>
                  <?php } ?>
                  <?php if ($footer_info) { ?>
                      <h4 class="footer-info paragraph-12 skybolt-blue"><?= $footer_info ?></h4>
                  <?php } ?>
              </div>
              <div class="right-content">
                  <?php
                  if (have_rows('first_column', 'options')) :
                      while (have_rows('first_column', 'options')) :
                          the_row();
                          ?>
                          <?php if (have_rows('footer_link')) : ?>
                          <div class="links-wrapper column">
                              <?php while (have_rows('footer_link')) : the_row();
                                  $link = get_sub_field('link');
                                  ?>
                                  <?php if ($link) { ?>
                                      <div class="link-wrapper">
                                          <a class="paragraph-14 fw-600 link skybolt-blue color-transition somar"  href="<?= $link['url'] ?>" target="<?= $link['target'] ?>">
                                              <?= $link['title'] ?>
                                          </a>
                                      </div>
                                  <?php } ?>
                              <?php endwhile; ?>
                          </div>
                      <?php endif; ?>
                      <?php endwhile;
                  endif; ?>
                  <?php
                  if (have_rows('second_column', 'options')) :
                      while (have_rows('second_column', 'options')) :
                          the_row();
                          ?>
                          <?php if (have_rows('footer_link')) : ?>
                          <div class="links-wrapper column">
                              <?php while (have_rows('footer_link')) : the_row();
                                  $link = get_sub_field('link');
                                  ?>
                                  <?php if ($link) { ?>
                                      <div class="link-wrapper">
                                          <a class="paragraph-14 fw-600 link skybolt-blue color-transition somar" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>">
                                              <?= $link['title'] ?></a>
                                      </div>
                                  <?php } ?>
                              <?php endwhile; ?>
                          </div>
                      <?php endif; ?>
                      <?php endwhile;
                  endif; ?>

              </div>
          </div>
          <div class="copy-right-social-links">
              <?php if ($privacy_policy) { ?>
                  <div class="paragraph-12 privacy-policy skybolt-blue"><?= $privacy_policy ?></div>
              <?php } ?>
              <?php if (have_rows('social_links', 'options')) { ?>
                  <div class="social-links-wrapper">
                      <?php while (have_rows('social_links', 'options')) {
                          the_row();
                          $url = get_sub_field('url');
                          $icon = get_sub_field('icon');
                          ?>
                          <a href="<?= $url ?>" target="_blank" class="social-link" aria-label=" (opens in a new tab)">
                              <?php if (!empty($icon) && is_array($icon)) { ?>
                                  <picture class="icon-wrapper cover-image">
                                      <img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                                  </picture>
                              <?php } ?>
                          </a>
                      <?php } ?>
                  </div>
              <?php } ?>
          </div>
      </div>
  </div>
</footer>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
