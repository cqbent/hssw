<?php
/**
 * Plugin Name:     HSSW Plugin
 * Description:     custom plugin for HSSW site
 * Author:          charles bent
 * Text Domain:     hssw-plugin
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Hssw_Plugin
 */

// Your code starts here.
function hssw_enqueue_scripts() {
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'assets/owl.carousel/owl.carousel.js', array('jquery'), FALSE, TRUE );
	wp_enqueue_script( 'hssw-js', plugin_dir_url( __FILE__ ) . 'assets/js/hssw.js', array('jquery','owl-carousel-js'), FALSE, TRUE );
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'assets/owl.carousel/assets/owl.carousel.css', array(), FALSE );
	wp_enqueue_style( 'owl-theme-css', plugin_dir_url( __FILE__ ) . 'assets/owl.carousel/assets/owl.theme.default.css', array(), FALSE );
}
add_action( 'wp_enqueue_scripts', 'hssw_enqueue_scripts' );
add_action( 'init', 'people_post_type' );

/**
 * Custom excerpt display:
 * Show full text of excerpt if created manually
 * Add "… More" to the excerpt here so always shows up
 */
add_filter('get_the_excerpt', 'hssw_excerpt');
function hssw_excerpt($excerpt, $id = null) {
	if ($id) {
		$post = get_post($id);
	}
	else {
		$post = get_post();
	}
	if ($excerpt_more = strpos($post->post_content, '<!--more-->')) {
		$excerpt = strip_tags(substr($post->post_content, 0, $excerpt_more));
	}
	$excerpt .= ' <a href="' . get_permalink($post->ID) . '" class="more">More</a>';
	return $excerpt;
}
// expand length of excerpt so to fix cutoff issues
function hssw_custom_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'hssw_custom_excerpt_length', 999 );

// empty excerpt more link
add_filter('excerpt_more', function ($more) {
	return '';
}, 21);


function people_post_type()
{
	register_post_type('people',
		array(
			'labels' => array(
				'name' => __('People'),
				'singular_name' => __('People')
			),
			'public' => TRUE,
			'has_archive' => FALSE,
			'rewrite' => array('slug' => 'about/team', 'with_front' => FALSE),
			'hierarchical' => TRUE,
			'supports' => array(
				'title',
				'author',
				'custom-fields',
				'page-attributes',
				'editor',
				'thumbnail'
			),
			'not-found' => __('Nothing was found. what to do?'),
			'menu_icon' => 'dashicons-groups'
		)
	);
}

function hssw_people_grid() {
	$args   = array(
		'post_type'      => 'people',
		'post_status'    => 'publish',
		'posts_per_page' => -1
	);
	$output = '';
	$query  = new \WP_Query( $args );
	if ( $query->have_posts() ) {
		$output = '<div class="people-grid row">';
		while ( $query->have_posts() ) {
			$query->the_post();
			$image = get_the_post_thumbnail();
			$link = get_the_permalink();
			$output .= '
				<div class="block-column col-sm-6 col-md-4">
					<a href="'. $link . '">
						' . $image . '
						<div class="name">' . get_the_title() . '</div>
						<div class="job-title">' . get_field('job_title') . '</div>
					</a>
				</div>
			';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}
add_shortcode( 'people_grid', 'hssw_people_grid' );


function features_carousel() {
	$features = get_field('features_carousel');
	$output = '<div class="owl-carousel owl-theme features-carousel">';
	foreach ($features as $feature) {
		$item_class = 'item';
		$link = $feature['feature_link'] ? $feature['feature_link'] : '#';
		$image = $feature['image'] ? wp_get_attachment_image_url($feature['image']['ID'], 'full') : '';
		$feature_title = $feature['feature_title'] ? '<h2>' . $feature['feature_title'] . '</h2>' : '';
		$feature_text = $feature['feature_text'] ? '<div class="text">' . $feature['feature_text'] . '</div>' : '';
		if ($feature_text != '' || $feature_title != '') {
			$item_class .= " overlay";
		}
		$output .= '
			<div class="'. $item_class .'" style="background-image: url(' . $image . ')">
				<div class="item-content">
					' . $feature_title . '
					' . $feature_text . '
				</div>
			</div>
		';
	}
	$output .= '</div>';
	return $output;
}

function featured_authors() {
	$args   = array(
		'post_type'      => 'tribe_events',
		'post_status'    => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field'    => 'slug',
				'terms'    => 'author-of-week',
			),
		),
		'posts_per_page' => 2,
	);
	$output = '';
	$query  = new \WP_Query( $args );
	if ( $query->have_posts() ) {
		$output = '<div class="featured-authors wp-block-columns">';
		while ($query->have_posts()) {
			$query->the_post();
			$output .= '
				<div class="row">
					<div class="image col-sm-4">' . get_the_post_thumbnail() . '</div>
					<div class="content col-sm-8">
						<h3 class="title "><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h3>
						<div class="excerpt">' . get_the_excerpt() . '</div>
					</div>
				</div>
			';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}

function featured_other_events() {
	$args   = array(
		'post_type'      => 'tribe_events',
		'post_status'    => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field'    => 'slug',
				'terms'    => array('author-of-week'),
				'operator' => 'NOT IN'
			),
		),
		'posts_per_page' => 2,

	);
	$output = '';
	$query  = new \WP_Query( $args );
	if ( $query->have_posts() ) {
		$output = '<div class="featured-events">';
		while ($query->have_posts()) {
			$query->the_post();
			$output .= '
				<div class="row flex-row-reverse">
					<div class="image col-sm-4">' . get_the_post_thumbnail() . '</div>
					<div class="content col-sm-8">
						<h3 class="title "><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h3>
						<div class="excerpt">' . get_the_excerpt() . '</div>
					</div>
				</div>
			';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}

function hssw_events($attributes) {
	$atts = shortcode_atts(array('past' => false, 'all' => false, 'posts' => -1), $attributes);
	$args['post_per_page'] = $atts['posts'];
	if ($atts['past']) {
		$args['end_date'] = 'now';
	}
	else {
		$args['start_date'] = 'now';
	}
	if (!$atts['all']) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field'    => 'slug',
				'terms'    => 'author-of-week',
			)
		);
	}
	else {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'tribe_events_cat',
				'field'    => 'slug',
				'terms'    => array('author-of-week'),
				'operator' => 'NOT IN'
			)
		);
	}
	$args['orderby'] = 'meta_value';
	$args['meta_key'] = '_EventStartDate';
	$args['order'] = 'DESC';
	$events = tribe_get_events($args);
	$output = '<div class="featured-authors wp-block-columns">';
	foreach ($events as $post) {
		$excerpt = get_the_excerpt($post->ID);
		//var_dump($excerpt);
		$output .= '
			<div class="row">
				<div class="image col-sm-3">' . get_the_post_thumbnail($post->ID) . '</div>
				<div class="content col-sm-9">
					<h3 class="title "><a href="'. get_the_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h3>
					<div class="start-date">' . tribe_get_start_date($post->ID) . '</div>
					<div class="excerpt">' . hssw_excerpt($post->post_excerpt, $post->ID) . '</div>
				</div>
			</div>
		';
	}
	$output .= '</div>';
	return $output;
}
add_shortcode('hssw_events', 'hssw_events');

function featured_blog_posts() {
	$args   = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'category_name' => 'blog',
		'posts_per_page' => 2
	);
	$output = '';
	$query  = new \WP_Query( $args );
	if ( $query->have_posts() ) {
		$output = '<div class="featured-blog-posts wp-block-columns">';
		while ($query->have_posts()) {
			$query->the_post();
			$output .= '
				<div class="row">
					<div class="image col-sm-4">' . hssw_thumbnail_image() . '</div>
					<div class="content col-sm-8">
						<h3 class="title "><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h3>
						<div class="excerpt">' . get_the_excerpt() . '</div>
					</div>
				</div>
			';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}

// limit search to posts
function exclude_pages_from_search($query) {
	if ( $query->is_main_query() && is_search() ) {
		$query->set( 'post_type', 'post' );
	}
	return $query;
}
//add_filter( 'pre_get_posts','exclude_pages_from_search' );

function hssw_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="'.site_url().'">
		<span class="search-toggle" aria-hidden="true" data-toggle="collapse" data-target="#search-fields" aria-expanded="true"></span>
		<div id="search-fields" class="collapse">
			<label class="screen-reader-text" for="s">Search for</label>
			<input type="search" class="search-field" placeholder="Search" value="" name="s">
			<input type="submit" class="search-submit btn" value="Go">
		</div>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'hssw_search_form' );

function hssw_event_categories() {
	$event_categories = get_terms(array('taxonomy' => Tribe__Events__Main::TAXONOMY));
	if ($event_categories) {
		$output = '<ul class="event-categories">';
		foreach ($event_categories as $category) {
			$url = esc_url( get_term_link( $category ) );
			$name = esc_html( get_term_field( 'name', $category ) );
			$output .= '<li><a href="'.$url.'">'.$name.'</a></li>';
		}
		$output .= '</ul>';
	}
	return $output;
}
add_shortcode('hssw_event_categories', 'hssw_event_categories');

function hssw_cat_posts($attributes) {
	$atts = shortcode_atts(array('cat' => 'author-of-the-week'), $attributes);
	$args   = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'category_name' => $atts['cat']
	);
	$output = '';
	$query  = new \WP_Query( $args );
	if ( $query->have_posts() ) {
		$output = '<div class="featured-blog-posts ' . $atts['cat'] . ' wp-block-columns">';
		while ($query->have_posts()) {
			$query->the_post();
			$output .= '
				<div class="row">
					<div class="image col-sm-3">' . hssw_thumbnail_image() . '</div>
					<div class="content col-sm-9">
						<h3 class="title "><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></h3>
						<div class="excerpt">' . get_the_excerpt() . '</div>
					</div>
				</div>
			';
		}
		$output .= '</div>';
		wp_reset_postdata();
	}
	return $output;
}
add_shortcode('hssw_cat_posts', 'hssw_cat_posts');

function hssw_thumbnail_image() {
	$img = get_the_post_thumbnail();
	if (!$img) {
		$img_post_thumbnail = get_post_custom_values('post_thumbnail');
		if ($img_post_thumbnail) {
			$img_path = $img_post_thumbnail[0];
		}
		else {
			$img_path = get_stylesheet_directory_uri() . '/assets/images/hssw_logo.png';
		}
		$img = '<img src="' . $img_path . '" alt="HSSW" />';
	}
	return $img;
}

/*
 * hssw_post_thumbnail() - function to get legacy thumbnail images from posts
 */
function hssw_post_thumbnail() {

}

function hssw_exclude_category_from_blog( $query ) {

	if( $query->is_main_query() && !is_admin() && ($query->is_home()) ) {
		$query->set( 'cat', ['-15','-635'] );
	}
}
add_action( 'pre_get_posts', 'hssw_exclude_category_from_blog' );

/**
 * modify get_the_archive_title filter
 */
function filter_category_title($title) {
	$pattern = '/.+?\:/';
	//return str_replace('Category: ', '', $title);
	return preg_replace($pattern, '', $title);
}
add_filter('get_the_archive_title', 'filter_category_title');

/*
 * display wp custom fields
 */
add_filter('acf/settings/remove_wp_meta_box', '__return_false');



