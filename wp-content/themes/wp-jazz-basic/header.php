<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<link href='http://fonts.googleapis.com/css?family=UnifrakturMaguntia' rel='stylesheet' type='text/css'>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<meta name="description" content="Harvard Square Script Writers is a script writing group that meets in Newton, MA." />
<meta name="keywords" content="Harvard Square Script Writers, scriptwriters, HSSW, hssw.com, Genine Tillotson, oldest script writing group, Laura Bernieri, 1986, Scott Anderson, creative people, Newton, Massachusetts, east coast, development, refinement, promotion, screen plays, stage plays, film, television series, cable TV, the internet, on-demand video streaming, venues, entertainment writing, production, film-making world, Hollywood feature, films, TV pilots, video short, film shorts, webisodes, indie films, stage productions, meet weekly, critique, work, workshops, log line" />
<meta name="classification" content="Script Writers, group">
<meta name="allow-search" content="yes">
<meta name="audience" content="all">
<meta name="robots" content="all, index, follow">
<meta name="Rating" content="General">
<meta name="Language" content="en">
<meta name="distribution" content="Global">
<meta name="identifier-URL" content="http://www.hsswriters.com">
<meta name="copyright" content="Copyright &copy; 1986 Harvard Square Script Writers">
<meta name="author" content="hsswriters.com">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/suckerfish.js"></script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37916020-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

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

		<?php if ( 'yes' === $wp_jazz_ad468head ) { ?>
		<div id="head-banner468">
			<?php echo stripslashes($wp_jazz_ad468head_code); ?>
		</div>
		<?php } ?>

	</div>

</div>

<div id="wrap">

	<div id="page" class="clearfix">

		<?php if ( $wp_jazz_hide_cats == 'no' ) { ?>
			<ul id="nav">
			<?php if (function_exists('wp_nav_menu')) { ?>
			<?php wp_nav_menu( array( 'theme_location' => 'catnav' ) ); ?>
			<?php } else { ?>
			<ul class="clearfix">
				<?php wp_list_categories('title_li='); ?>
			</ul>
			<?php } ?>
		</ul>
		<?php } ?>