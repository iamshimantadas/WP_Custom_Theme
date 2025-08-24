<?php 

/** enqueue css, js, icons scripts */
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');
function my_theme_enqueue_assets() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), null, 'all');
    wp_enqueue_style('custom-css', get_template_directory_uri().'/assets/css/custom.css',);
    wp_enqueue_script('jquery');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array('jquery'), '1.11.3', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array('jquery'), '6.7.2', 'all');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
    wp_enqueue_script('custom-js', get_template_directory_uri().'/assets/js/custom.js', array(), time(), true);
}

/** including post-types */
// include_once(get_template_directory().'/post-types/'.'Services.php');


/** theme support */
add_theme_support('post-thumbnails');


/** SVG support */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');


/** theme support for woocommerce */
// add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
// function mytheme_add_woocommerce_support()
// {
//     add_theme_support('woocommerce');
//      add_theme_support( 'wc-product-gallery-zoom' );
//      add_theme_support( 'wc-product-gallery-lightbox' );
//      add_theme_support( 'wc-product-gallery-slider' );
// }



?>