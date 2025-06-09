<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package map
 * @since 1.0.0
 */

/**
 * Enqueue the CSS files.
 *
 * @return void
 * @since 1.0.0
 *
 */

function map_styles()
{
  wp_enqueue_style(
      'map-style',
      get_stylesheet_uri(),
      [],
      wp_get_theme()->get('Version')
  );
}

add_action('wp_enqueue_scripts', 'map_styles');

function enqueue_jquery()
{
  if (!is_admin()) {
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'enqueue_jquery');

function mapCustomStyles()
{
  wp_enqueue_style('custom-css', get_stylesheet_directory_uri() . '/assets/index.css', '', '1.0', 'all');
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/index.js', '', null, true);
}

add_action('wp_enqueue_scripts', 'mapCustomStyles');

add_theme_support('editor-styles');

require_once "helpers/helpers.php";


//region register blocks
include "blocks/blocks-related-functions.php";
//endregion register blocks


add_theme_support('post-thumbnails');


function my_custom_admin_editor_inline_styles()
{ ?>
  <style>
    body .editor-styles-wrapper {
      padding: 0 4vw;
    }
    
    .acf-block-component.acf-block-body {
      margin-bottom: 80px;
    }
  </style>
<?php }

add_action('admin_head', 'my_custom_admin_editor_inline_styles');

// Allow SVG uploads
function add_svg_to_upload_mimes($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes');

// Sanitize SVG uploads
function sanitize_svg($file)
{
  $wp_filetype = wp_check_filetype_and_ext($file['tmp_name'], $file['name']);
  if ($wp_filetype['ext'] !== 'svg') {
    return $file;
  }
  $svg = simplexml_load_file($file['tmp_name']);
  if (!$svg) {
    $file['error'] = __('Sorry, this file could not be sanitized and is therefore not allowed.', 'my-theme');
    return $file;
  }
  // Sanitize SVG content here if needed
  return $file;
}

add_filter('wp_handle_upload_prefilter', 'sanitize_svg');

//region gravity form hooks
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form)
{
  return '<button class="cta-button large bg-orange cta-form" id="gform_submit_button_' . $form['id'] . '" aria-label="Submit">
        Send message
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" aria-hidden="true">
            <path d="M12.2955 7.63456H0V6.61662H12.2955L6.39929 0.720448L7.12559 0L14.2512 7.12559L7.12559 14.2512L6.39929 13.5307L12.2955 7.63456Z" fill="#FBFAF6"></path>
        </svg>
    </button>';
}

// region add colors in color picker
function my_acf_admin_footer()
{
  ?>
  <script type="text/javascript">
    (function ($) {
      acf.add_filter('color_picker_args', function (args, field) {
        // ألوانك الجاهزة من theme.json
        args.palettes = [
          '#FFF500', '#555555', '#000000', '#F5F5F5', '#FC3A3A',
          '#FFD623', '#20C641', '#CCF2FF', '#0563DE', '#1F1F1F',
          '#E4DCFF', '#3782E5', '#4DD167', '#FFDE4F', '#FFA941',
          '#FD6161', '#FFEAD0', '#FF9412', '#FED8D8', '#D2F4D9',
          '#00BFFF', '#7A4FFF', '#D135ED', '#F6D7FB', '#01C6D9',
          '#CCF4F7', '#FF4CB4'
        ];
        return args;
      });
    })(jQuery);
  </script>
  <?php
}

add_action('acf/input/admin_footer', 'my_acf_admin_footer');


function custom_acf_color_picker_styles()
{
  echo '<style>

    .iris-border .iris-palette-container {
        left: 260px;
        bottom: 10px;
        width: 120px;
     }
      
      .wp-picker-container .iris-palette {
        width: 20px !important;
        height: 20px !important;
        margin: 2px !important;
        border-radius: 50% !important;
        border: 1px solid #ccc;
        box-shadow: 0 0 1px rgba(0,0,0,0.3);
      }
    </style>';
}

add_action('acf/input/admin_footer', 'custom_acf_color_picker_styles');
// endregion add colors in color picker



