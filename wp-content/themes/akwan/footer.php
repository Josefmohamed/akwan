<?php wp_footer(); ?>
<?php
$code_before_end_of_body_tag = get_field('code_before_end_of_body_tag', 'options');
$footer_logo = get_field('footer_logo', 'options');
$footer_text = get_field('footer_text', 'options');
$privacy_policy = get_field('privacy_policy', 'options');

?>
<footer>
  <div class="container">
      <div class="footer-cards">
          <div class="top-content">
                  <?php if ($footer_logo) { ?>
                      <a href="<?= site_url() ?>" target="_self" role="img" class="footer-logo" aria-labelledby=" header_logo">
                          <?= \Theme\Helpers::display_attachment($footer_logo, array("width" => 278, "height" => 69)) ?>
                      </a>
                  <?php } ?>
                  <?php if (have_rows('footer_links', 'options')) { ?>
                      <ul class="footer-links">
                          <?php while (have_rows('footer_links', 'options')) {
                              the_row();
                              $link = get_sub_field('link');
                              ?>
                              <?php if (!empty($link) && is_array($link)) { ?>
                                  <li class="link-item">
                                      <a class="footer-link maxima uppercase-text white-color" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>"><?= $link['title'] ?></a>
                                  </li>
                              <?php } ?>
                          <?php } ?>
                      </ul>
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
          <div class="center-line"></div>
          <div class="bottom-content">
              <?php if ($footer_text): ?>
                  <h5 class="captions paragraph-18  white-color"><?= $footer_text ?></h5>
              <?php endif; ?>
              <?php if ($privacy_policy): ?>
                  <div class="privacy-policy paragraph-18"><?= $privacy_policy ?></div>
              <?php endif; ?>
          </div>
      </div>
  </div>
</footer>
<?= $code_before_end_of_body_tag ?>
</body>
</html>
