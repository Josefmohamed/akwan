<!doctype html>
<html <?php language_attributes(); ?> class="can-scroll">
<head>
  <meta charset="<?php bloginfo("charset"); ?>">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=5, minimum-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <!-- Third party code ACF-->
  <?php
  $header_version = get_field('page_settings', get_the_ID());
  $code_in_head_tag = get_field('code_in_head_tag', 'options');
  $code_before_body_tag_after_head_tag = get_field('code_before_body_tag_after_head_tag', 'options');
  $code_after_body_tag = get_field('code_after_body_tag', 'options');
  ?>
  <?php wp_head(); ?>
  <?= $code_in_head_tag ?>
  <?php
  $custom_body_class = isset($args['body_class']) ? $args['body_class'] : '';
  ?>
</head>
<?= $code_before_body_tag_after_head_tag ?>
<body <?php body_class($custom_body_class); ?>>
<?= $code_after_body_tag ?>
<!-- header ACF -->
<?php
$header_logo = get_field('header_logo', 'options');

?>
<header class="akwan-header <?= $header_version ?>">
  <div class="container">
      <div class="cards-wrapper">
          <!--     logo-->
          <?php if ($header_logo) { ?>
              <a href="<?= site_url() ?>" target="_self" role="img" class="header-logo" aria-labelledby=" header_logo">
                  <?= \Theme\Helpers::display_attachment($header_logo, array("width" => 103, "height" => 54)) ?>
              </a>
          <?php } ?>

          <!--     links  -->
          <nav class="navbar">
              <div class="navbar-wrapper">
                  <?php if (have_rows('menu_links', 'options')) { ?>
                      <ul class="primary-menu">
                          <?php while (have_rows('menu_links', 'options')) {
                              the_row();
                              $menu_link = get_sub_field('link');
                              ?>
                              <?php if (!empty($menu_link) && is_array($menu_link)) { ?>
                                  <li class="menu-item">
                                      <a class="header-link paragraph-16 capitalize-text fw-800 color-transition" href="<?= $menu_link['url'] ?>" target="<?= $menu_link['target'] ?>">
                                          <?= $menu_link['title'] ?></a>
                                  </li>
                              <?php } ?>
                          <?php } ?>
                      </ul>
                      <div class="site-lang-switcher menu-item mobile">
                          <?php
                          if (function_exists('pll_the_languages')) {
                              $languages = pll_the_languages(array('raw' => 1, 'hide_current' => 1));
                              foreach ($languages as $lang) {
                                  if ($lang['slug'] == 'ar') {
                                      echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="تغيير اللغة إلى العربية">AR</a>';
                                  } elseif ($lang['slug'] == 'en') {
                                      echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="Switch language to English">EN</a>';
                                  }
                              }
                          }
                          ?>
                      </div>
                  <?php } ?>
              </div>
          </nav>
          <!-- burger menu and cross-->
          <button aria-label="Open Menu Links" class="burger-menu">
              <span></span>
              <span></span>
          </button>

          <div class="site-lang-switcher menu-item desktop">
              <?php
              if (function_exists('pll_the_languages')) {
                  $languages = pll_the_languages(array('raw' => 1, 'hide_current' => 1));
                  foreach ($languages as $lang) {
                      if ($lang['slug'] == 'ar') {
                          echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="تغيير اللغة إلى العربية">AR</a>';
                      } elseif ($lang['slug'] == 'en') {
                          echo '<a href="' . esc_url($lang['url']) . '" class="wpml-ls-item  nav-item capital-text header-link paragraph-16" aria-label="Switch language to English">EN</a>';
                      }
                  }
              }
              ?>
          </div>

      </div>
  </div>
</header>
