<?php

namespace App;

add_filter('sage/display_sidebar', function ($display) {
    static $display;

    isset($display) || $display = in_array(true, [
        // The sidebar will be displayed if any of the following return true
        is_404(),
        is_front_page(),
        is_post_type_archive(['post']),
        is_home(),
    ]);
    return $display;
});

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});
// empty excerpt more link
add_filter('excerpt_more', function ($more) {
    return '';
}, 21);

/**
 * Custom excerpt display:
 * Show full text of excerpt if created manually
 * Add "… More" to the excerpt here so always shows up
 */
add_filter('get_the_excerpt', function ($excerpt) {
    $post = get_post();
    if ($excerpt_more = strpos($post->post_content, '<!--more-->')) {
        $excerpt = strip_tags(substr($post->post_content, 0, $excerpt_more));
    }
    $excerpt .= ' &hellip; <a href="' . get_permalink($post->ID) . '" class="more">' . __('More', 'sage') . '</a>';
    return $excerpt;
}, 21);



/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

/*
alter archive title
*/
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_post_type_archive( 'tribe_events' ) ) {
        //$title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
        if (is_tax()) {
            $title = single_term_title('', false);
        }
        else {
            $title = 'Events & Workshops';
        }
    }
    return $title;
});

/*
 * increase excerpt length
 */
//add_filter( 'excerpt_length', function($length) { return 100; }, 999 );
