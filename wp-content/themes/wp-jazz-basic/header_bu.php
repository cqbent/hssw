<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<link href='http://fonts.googleapis.com/css?family=UnifrakturMaguntia' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<meta name="description" content="<?php bloginfo('description'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />


<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/suckerfish.js"></script>

</head>

<body>

<div id="topnav" class="clearfix">
	<div class="limit clearfix">
		<?php if (function_exists('wp_nav_menu')) { ?>
		<?php wp_nav_menu( array( 'theme_location' => 'topnav' ) ); ?>
		<?php } else { ?>
		<ul class="clearfix">
			<li class="first"><a rel="<?php _e("bookmark"); ?>" title="<?php _e("Home"); ?>" href="<?php bloginfo('url'); ?>"><?php _e("Home"); ?></a></li>
			<?php wp_list_pages('title_li='); ?>
		</ul>
		<?php } ?>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
</div>

<div id="header" class="clearfix">

	<div id="head-content" class="clearfix">

		<div id="sitetitle">
			<?php if (is_home()) {  ?>
			<h1><?php bloginfo('name'); ?></h1> 
			<?php } else { ?> 
			<div class="title"><?php bloginfo('name'); ?></div> 
			<?php } ?>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>

		<?php if ( $wp_jazz_ad468head == yes ) { ?>
		<div id="head-banner468">
			<?php echo stripslashes($wp_jazz_ad468head_code); ?>
		</div>
		<?php } ?>

	</div>

</div>

<div id="wrap">

	<div id="page" class="clearfix">

		<?php if ( $wp_jazz_hide_cats == 'no' ) { ?>
		<div id="nav" class="clearfix">
			<?php if (function_exists('wp_nav_menu')) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'catnav' ) ); ?>
			<?php } else { ?>
			<ul class="clearfix">
				<?php wp_list_categories('title_li='); ?>
			</ul>
			<?php } ?>
		</div>
		<?php } ?>