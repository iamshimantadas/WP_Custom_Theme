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
// include_once(get_template_directory().'/post-types/'.'Faq.php');


/** theme support */
add_theme_support('post-thumbnails');


/** SVG support */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');

// Disable WordPress JPEG compression (set to 100%)
add_filter('jpeg_quality', function($arg){ return 100; });
add_filter('wp_editor_set_quality', function($arg){ return 100; });

// enable menus for themes.
register_nav_menus(
array(
'first-menu'=>'Header Menu',
'second-menu'=>'Copyright Menu',
)
);


/*** Auto-create ACF Options Page & Fields for Global Settings */
add_action('acf/init', 'my_acf_global_settings');
function my_acf_global_settings() {
    // Only run if ACF exists
    if( function_exists('acf_add_options_page') ) {
        
        // Create Global Settings Page
        acf_add_options_page(array(
            'page_title'  => 'Global Settings',
            'menu_title'  => 'Global Settings',
            'menu_slug'   => 'global-settings',
            'capability'  => 'edit_posts',
            'redirect'    => false
        ));

        // Add Field Group
        acf_add_local_field_group(array(
            'key' => 'group_global_settings',
            'title' => 'Global Settings',
            'fields' => array(

                // Header Tab
                array(
                    'key' => 'tab_header',
                    'label' => 'Header',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'brand_logo',
                    'label' => 'Brand Logo',
                    'name' => 'brand_logo',
                    'type' => 'image',
                    'return_format' => 'url', // always return URL
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'header_button_title',
                    'label' => 'Header Button Title',
                    'name' => 'header_button_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'header_button_url',
                    'label' => 'Header Button URL',
                    'name' => 'header_button_url',
                    'type' => 'url',
                    'return_format' => 'url',
                ),

                // Footer Tab
                array(
                    'key' => 'tab_footer',
                    'label' => 'Footer',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'footer_logo',
                    'label' => 'Footer Logo',
                    'name' => 'footer_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'footer_brand_desc',
                    'label' => 'Footer Brand Description',
                    'name' => 'footer_brand_desc',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'copyright_text',
                    'label' => 'Copyright Text',
                    'name' => 'copyright_text',
                    'type' => 'text',
                ),

                // Social Media Tab
                array(
                    'key' => 'tab_social',
                    'label' => 'Social Medias',
                    'type' => 'tab',
                ),

                // Facebook
                array(
                    'key' => 'facebook_icon',
                    'label' => 'Facebook Icon (i tag)',
                    'name' => 'facebook_icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'facebook_logo',
                    'label' => 'Facebook Logo',
                    'name' => 'facebook_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'facebook_url',
                    'label' => 'Facebook URL',
                    'name' => 'facebook_url',
                    'type' => 'url',
                ),

                // Instagram
                array(
                    'key' => 'instagram_icon',
                    'label' => 'Instagram Icon (i tag)',
                    'name' => 'instagram_icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'instagram_logo',
                    'label' => 'Instagram Logo',
                    'name' => 'instagram_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'instagram_url',
                    'label' => 'Instagram URL',
                    'name' => 'instagram_url',
                    'type' => 'url',
                ),

                // Twitter
                array(
                    'key' => 'twitter_icon',
                    'label' => 'Twitter Icon (i tag)',
                    'name' => 'twitter_icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'twitter_logo',
                    'label' => 'Twitter Logo',
                    'name' => 'twitter_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'twitter_url',
                    'label' => 'Twitter URL',
                    'name' => 'twitter_url',
                    'type' => 'url',
                ),

                // LinkedIn
                array(
                    'key' => 'linkedin_icon',
                    'label' => 'LinkedIn Icon (i tag)',
                    'name' => 'linkedin_icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'linkedin_logo',
                    'label' => 'LinkedIn Logo',
                    'name' => 'linkedin_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'linkedin_url',
                    'label' => 'LinkedIn URL',
                    'name' => 'linkedin_url',
                    'type' => 'url',
                ),

                // WhatsApp
                array(
                    'key' => 'whatsapp_icon',
                    'label' => 'WhatsApp Icon (i tag)',
                    'name' => 'whatsapp_icon',
                    'type' => 'text',
                ),
                array(
                    'key' => 'whatsapp_logo',
                    'label' => 'WhatsApp Logo',
                    'name' => 'whatsapp_logo',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
                array(
                    'key' => 'whatsapp_url',
                    'label' => 'WhatsApp URL',
                    'name' => 'whatsapp_url',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'global-settings',
                    ),
                ),
            ),
        ));
    }
}


?>