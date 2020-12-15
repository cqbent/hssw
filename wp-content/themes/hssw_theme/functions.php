<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

// register secondary menu
register_nav_menus(
    array(
        'secondary' => __( 'Secondary Menu', 'generatepress' ),
    )
);

// update post meta info (no author)
add_filter( 'generate_header_entry_meta_items', function() {
    return array(
        'date',
    );
} );

// display featured posts
add_action('generate_before_main_content', 'home_features_carousel');

function home_features_carousel() {
    if (is_front_page()) {
        $output = features_carousel();
        print $output;
    }
}
//add_action('generate_after_content', 'home_featured_content');
function home_featured_content() {
    if (is_front_page()) {
        //$authors = featured_authors();
        $featured_posts = featured_blog_posts();
        print $featured_posts;
    }
}



