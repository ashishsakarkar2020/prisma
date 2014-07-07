<?php
/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.0.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.min.css', false, 'bf6d0b87f9e0c2a25325178fb7ada16f');

  wp_enqueue_style('prisma', get_template_directory_uri() . '/assets/css/prisma.css', false, null);
  wp_enqueue_style('navigation', get_template_directory_uri() . '/assets/css/navigation.css', false, null);
  wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', false, null);
  wp_enqueue_style('slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.css', false, null);

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, true);
    add_filter('script_loader_src', 'roots_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', array(), null, false);
   wp_register_script('superfish', get_template_directory_uri() . '/bower_components/superfish/dist/js/superfish.min.js', array(), null, true);
  wp_register_script('slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.min.js', array(), null, true);
  wp_register_script('sectionscroller', get_template_directory_uri() . '/assets/js/plugins/jquery.pagescroller.lite.js', array(), null, true);
  wp_register_script('roots_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), 'bc834a4e4087304d671711b054aeebee', true);
  wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('superfish');
  wp_enqueue_script('slick');
  wp_enqueue_script('sectionscroller');
  wp_enqueue_script('roots_scripts');
  wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function roots_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.11.0.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'roots_jquery_local_fallback');

function roots_google_analytics() { ?>
<script>
  (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
  function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
  e=o.createElement(i);r=o.getElementsByTagName(i)[0];
  e.src='//www.google-analytics.com/analytics.js';
  r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
</script>

<?php }
if (GOOGLE_ANALYTICS_ID && !current_user_can('manage_options')) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
