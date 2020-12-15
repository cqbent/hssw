<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");
global $options;
foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

/* --------------[ User-Defined Adjustments from Stylesheet #2 ]-------------- */

@import 'style-2.css';

/* --------------[ Color Scheme Adjustgments ]-------------- */

<?php if ( $wp_jazz_colors == 'blue' ) { ?>

/* ------[ Style Adjustments for Blue Color Scheme ]-------- */

body {
	background-image: url(images/blue/body.gif);
	}

#header {
	background-color:#0A1F33;
	background-image: url(images/blue/head-bg.gif);
	border-bottom:1px solid #D9CAC3;
	}

#head-content {
	background-image: url(images/blue/logo2.gif);
	}

a, a:link, a:visited {
	color:#4D809A;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'red' ) { ?>

/* ------[ Style Adjustments for Red Color Scheme ]-------- */

body {
	background-image: url(images/red/body.gif);
	}

#header {
	background-color:#4D1A0F;
	background-image: url(images/red/head-bg.gif);
	border-bottom:1px solid #CCBEB8;
	}

#head-content {
	background-image: url(images/red/logo2.gif);
	}

a, a:link, a:visited {
	color:#996666;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'charcoal' ) { ?>

/* ------[ Style Adjustments for Charcoal Color Scheme ]-------- */

body {
	background-image: url(images/charc/body.gif);
	}

#header {
	background-color:#222222;
	background-image: url(images/charc/head-bg.gif);
	border-bottom:1px solid #B3B3B3;
	}

#head-content {
	background-image: url(images/charc/logo2.gif);
	}

a, a:link, a:visited {
	color:#808080;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'light-blue' ) { ?>

/* ------[ Style Adjustments for Light Blue Color Scheme ]-------- */

body {
	background-image: url(images/ltblue/body.gif);
	background-color:#ccc;
	}

#header {
	background-color:#006699;
	background-image: url(images/ltblue/head-bg.gif);
	border-bottom:1px solid #CCEEFF;
	}

#head-content {
	background-image: url(images/ltblue/logo2.gif);
	}

a, a:link, a:visited {
	color:#4D809A;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'pink' ) { ?>

/* ------[ Style Adjustments for Pink Color Scheme ]-------- */

body {
	background-image: url(images/pink/body.gif);
	}

#header {
	background-color:#803359;
	background-image: url(images/pink/head-bg.gif);
	border-bottom:1px solid #CCA3B8;
	}

#head-content {
	background-image: url(images/pink/logo2.gif);
	}

a, a:link, a:visited {
	color:#E57298;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'purple' ) { ?>

/* ------[ Style Adjustments for Purple Color Scheme ]-------- */

body {
	background-image: url(images/purple/body.gif);
	}

#header {
	background-color:#330A33;
	background-image: url(images/purple/head-bg.gif);
	border-bottom:1px solid #CCB8CC;
	}

#head-content {
	background-image: url(images/purple/logo2.gif);
	}

a, a:link, a:visited {
	color:#997A99;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'plum' ) { ?>

/* ------[ Style Adjustments for Plum Color Scheme ]-------- */

body {
	background-image: url(images/plum/body.gif);
	}

#header {
	background-color:#4D2E47;
	background-image: url(images/plum/head-bg.gif);
	border-bottom:1px solid #B3A1B0;
	}

#head-content {
	background-image: url(images/plum/logo2.gif);
	}

a, a:link, a:visited {
	color:#80737D;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'gray' ) { ?>

/* ------[ Style Adjustments for Gray Color Scheme ]-------- */

body {
	background-image: url(images/gray/body.gif);
	background-color:#ccc;
	}

#header {
	background-color:#8C8C8C;
	background-image: url(images/gray/head-bg.gif);
	border-bottom:1px solid #E5E5E5;
	}

#head-content {
	background-image: url(images/gray/logo2.gif);
	}

a, a:link, a:visited {
	color:#5C7A99;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'black' ) { ?>

/* ------[ Style Adjustments for Black Color Scheme ]-------- */

body {
	background-image: url(images/black/body.gif);
	}

#header {
	background-color:#000000;
	background-image: url(images/black/head-bg.gif);
	border-bottom:1px solid #454545;
	}

#head-content {
	background-image: url(images/black/logo2.gif);
	}

a, a:link, a:visited {
	color:#a352c5;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } elseif ( $wp_jazz_colors == 'burnt-orange' ) { ?>

/* ------[ Style Adjustments for Burnt Orange Color Scheme ]-------- */

body {
	background-image: url(images/burntorange/body.gif);
	background-color:#ccc;
	}

#header {
	background-color:#4D2600;
	background-image: url(images/burntorange/head-bg.gif);
	border-bottom:1px solid #F2E3CE;
	}

#head-content {
	background-image: url(images/burntorange/logo2.gif);
	}

a, a:link, a:visited {
	color:#99664D;
	}

a:hover, a:active {
	color:#000000;
	}

<?php } ?>

/* --------------[ User-Defined Adjustments ]-------------- */

body {
	<?php if ( $wp_jazz_body_backgroundcolor ) { ?>
	background-color: <?php echo $wp_jazz_body_backgroundcolor; ?>;
	background-image:none;
	<?php } ?>
	font-size: <?php echo $wp_jazz_body_font_size; ?>;
	font-family: <?php echo $wp_jazz_body_font_family; ?>;
	<?php if ( $wp_jazz_body_font_color ) { ?>
	color: <?php echo $wp_jazz_body_font_color; ?>;
	<?php } ?>
	<?php if ( $wp_jazz_hide_cats == 'yes' ) { ?>
	background-position: 0 88px;
	<?php } ?>
	}

<?php if ( $wp_jazz_body_backgroundimage ) { ?>
body {
	background-image: url(<?php echo $wp_jazz_body_backgroundimage; ?>);
	background-repeat: <?php echo $wp_jazz_body_backgroundimage_repeat; ?>;
	background-position: <?php echo $wp_jazz_body_backgroundimage_position; ?>;
	background-attachment: fixed;
	}
<?php } ?>

h1, h2, h3, h4, h5, h6, h7, .sitetitle {
	font-family: <?php echo $wp_jazz_post_title_font; ?>;
	font-weight: <?php echo $wp_jazz_post_title_weight; ?>;
	}


/* -------------------[ Site Title Adjustments ]------------------- */

#sitetitle h1, #sitetitle .title {
	font-size: <?php echo $wp_jazz_site_title_size; ?>;
	color: <?php echo $wp_jazz_site_title_color; ?>;
	text-align: <?php echo $wp_jazz_site_title_alignment; ?>;
	font-weight: <?php echo $wp_jazz_site_title_weight; ?>;
	font-family: <?php echo $wp_jazz_site_title_font_family; ?>;
	}

#sitetitle .description { 
	color:<?php echo $wp_jazz_site_title_color; ?>;
	text-align:<?php echo $wp_jazz_site_title_alignment; ?>;
	}

<?php if ( $wp_jazz_site_title_option == 'Basic Text-Type Title' ) { ?>
#head-content {
	background-image: none;
	}
<?php } ?>

<?php if ( $wp_jazz_site_title_option == 'Image/Logo-Type Title' ) { ?>
#sitetitle {
	float:none;
	text-indent:-10000em;
	position:absolute;
	display:none;
	}
<?php } ?>

<?php if ( $wp_jazz_ad468head == 'no' ) { ?>
#sitetitle {
	width:980px;
	}
<?php } ?>

<?php if ( $wp_jazz_site_title_option == 'Image/Logo-Type Title' && $wp_jazz_site_logo_url ) { ?>
#head-content {
	background: transparent;
	background-image: url(<?php echo $wp_jazz_site_logo_url; ?>);
	background-position: <?php echo $wp_jazz_site_logo_position; ?>;
	background-repeat: no-repeat;
	}
<?php } ?>

/* ----------[ Header Background Color Adjustments ]---------- */

<?php if ( $wp_jazz_header_bg_color ) { ?>
#header {
	background-color: <?php echo $wp_jazz_header_bg_color; ?>;
	background-image:none;
	}
<?php } ?>

/* ----------[ Left Sidebar Float Adjustments ]----------- */

<?php if ( $wp_jazz_side_left_loc == 'Left of Content' ) { ?>
#content .col-3 { float:right; }
#sidebarleft { float:left; }
<?php } else { ?>
#content .col-3 { float:left; }
#sidebarleft { float:right; }
<?php } ?>

/* --------------[ Top Navigation Adjustments ]-------------- */

#topnav {
	<?php if ( $wp_jazz_topnav_bg_color ) { ?>
	background: <?php echo $wp_jazz_topnav_bg_color; ?>;
	<?php } ?>
	font-size: <?php echo $wp_jazz_topnav_size; ?>; 
	font-weight: <?php echo $wp_jazz_topnav_weight; ?>;	
	}

#topnav li a, #topnav li a:link, #topnav li a:visited {
	<?php if ( $wp_jazz_topnav_link_color ) { ?>
	color: <?php echo $wp_jazz_topnav_link_color; ?>;
	<?php } ?>
	}

#topnav li a:hover, #topnav li a:active  {
	<?php if ( $wp_jazz_topnav_link_hover_color ) { ?>
	color: <?php echo $wp_jazz_topnav_link_hover_color; ?>;
	<?php } ?>
	<?php if ( $wp_jazz_topnav_link_hover_bg_color ) { ?>
	background: <?php echo $wp_jazz_topnav_link_hover_bg_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_jazz_topnav_bg_color ) { ?>
#topnav li ul {
	background: <?php echo $wp_jazz_topnav_bg_color; ?>;
	}
<?php } ?>

/* --------------[ Category Navigation Adjustments ]-------------- */

#nav {
	<?php if ( $wp_jazz_catnav_bg_color ) { ?>
	background: <?php echo $wp_jazz_catnav_bg_color; ?>;
	<?php } ?>
	font-size: <?php echo $wp_jazz_catnav_size; ?>; 
	font-weight: <?php echo $wp_jazz_catnav_weight; ?>;	
	}

#nav li a, #nav li a:link, #nav li a:visited {
	<?php if ( $wp_jazz_catnav_link_color ) { ?>
	color: <?php echo $wp_jazz_catnav_link_color; ?>;
	<?php } ?>
	}

#nav li a:hover, #nav li a:active  {
	<?php if ( $wp_jazz_catnav_link_hover_color ) { ?>
	color: <?php echo $wp_jazz_catnav_link_hover_color; ?>;
	<?php } ?>
	<?php if ( $wp_jazz_catnav_link_hover_bg_color ) { ?>
	background: <?php echo $wp_jazz_catnav_link_hover_bg_color; ?>;
	<?php } ?>
	}

<?php if ( $wp_jazz_catnav_bg_color ) { ?>
#nav li ul {
	background: <?php echo $wp_jazz_catnav_bg_color; ?>;
	}
<?php } ?>

/* --------------[ Features Adjustments ]-------------- */

#my-glider {
<?php if ( $wp_jazz_featured_content_bg_color ) { ?>
	background-color: <?php echo $wp_jazz_featured_content_bg_color; ?>;
	background-image: none;
	background-repeat: no-repeat;
	background-position: 0 0;
<?php } ?>
	color: <?php echo $wp_jazz_featured_font_color; ?>;
	font-size: <?php echo $wp_jazz_featured_size; ?>;
	}

<?php if ( $wp_jazz_featured_controls_bg ) { ?>
#my-glider .controls {
	background-color: <?php echo $wp_jazz_featured_controls_bg_color; ?>;
	}
<?php } ?>

<?php if ( $wp_jazz_featured_link_color ) { ?>
#my-glider a, #my-glider a:link, #my-glider a:visited, #my-glider .controls li.feat-head {
	color: <?php echo $wp_jazz_featured_link_color; ?>;
	}
<?php } ?>

<?php if ( $wp_jazz_featured_link_color ) { ?>
#my-glider a:hover, #my-glider a:active, #my-glider .controls a.active {
	color:<?php echo $wp_jazz_featured_link_hover_color; ?> !important;
	}
<?php } ?>

<?php if ( $wp_jazz_featured_controls_border_color ) { ?>
#my-glider .controls li {
	border-color:<?php echo $wp_jazz_featured_controls_border_color; ?>;
	}
<?php } ?>

/* --------------[ Main Content Adjustments ]-------------- */

.maincontent {
	font-size: <?php echo $wp_jazz_content_size; ?>;
	}

.maincontent a, .maincontent a:link, .maincontent a:visited { 
	<?php if ( $wp_jazz_content_link_color ) { ?>
	color: <?php echo $wp_jazz_content_link_color; ?>;
	<?php } ?>
	}

.maincontent a:hover, .maincontent a:active, .post h1 a:active, .post h1 a:hover, .post h2 a:active, .post h2 a:hover { 
	<?php if ( $wp_jazz_content_link_hover_color ) { ?>
	color: <?php echo $wp_jazz_content_link_hover_color; ?>;
	<?php } ?>
	}

/* --------------[ Sidebar-Left Adjustments ]-------------- */

#sidebarleft {
	font-size: <?php echo $wp_jazz_left_sidebar_size; ?>;
	}

#sidebarleft a, #sidebar-left a:link, #sidebar-left a:visited { 
	<?php if ( $wp_jazz_left_sidebar_link_color ) { ?>
	color: <?php echo $wp_jazz_left_sidebar_link_color; ?>;
	<?php } ?>
	}

#sidebarleft a:hover, #sidebar-left a:active { 
	<?php if ( $wp_jazz_left_sidebar_link_hover_color ) { ?>
	color: <?php echo $wp_jazz_left_sidebar_link_hover_color; ?>;
	<?php } ?>
	}

/* --------------[ Sidebar-Right Adjustments ]-------------- */

#sidebar {
	font-size: <?php echo $wp_jazz_right_sidebar_size; ?>;
	}

<?php if ( $wp_jazz_right_sidebar_link_color ) { ?>
#sidebar a, #sidebar a:link, #sidebar a:visited { 
	color: <?php echo $wp_jazz_right_sidebar_link_color; ?>;
	}
	<?php } ?>

<?php if ( $wp_jazz_right_sidebar_hover_link_color ) { ?>
#sidebar a:hover, #sidebar a:active { 
	color: <?php echo $wp_jazz_right_sidebar_hover_link_color; ?>;
	}
<?php } ?>

/* --------------[ Footer Adjustments ]-------------- */

#footer {
	font-size:<?php echo $wp_jazz_footer_font_size; ?>;
	color:<?php echo $wp_jazz_footer_font_color; ?>;
	}

#footer a, #footer a:link, #footer a:visited { 
	<?php if ( $wp_jazz_footer_link_color ) { ?>
	color: <?php echo $wp_jazz_footer_link_color; ?>;
	<?php } ?>
	}

#footer a:hover, #footer a:active { 
	<?php if ( $wp_jazz_footer_hover_link_color ) { ?>
	color: <?php echo $wp_jazz_footer_hover_link_color; ?>;
	<?php } ?>
	}