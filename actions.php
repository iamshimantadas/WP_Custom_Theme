<?php 

/* disable CONTENT BOX for post types */
// add_action('init', 'remove_content_post_type_services');
function remove_content_post_type_services() {
    remove_post_type_support('services', 'editor' );
}



?>