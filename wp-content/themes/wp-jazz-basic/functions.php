<?php if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar - Left',
	'before_title' => '<div class="widgettitle">',
	'after_title' => '</div>',
	));
	register_sidebar(array('name'=>'Right Sidebar - Top',
	'before_title' => '<div class="widgettitle">',
	'after_title' => '</div>',
	));
	register_sidebar(array('name'=>'Right Sidebar - News Page',
	'before_title' => '<div class="widgettitle">',
	'after_title' => '</div>',
	));
	register_sidebar(array('name'=>'Right Sidebar - Bottom Left',
	'before_title' => '<div class="widgettitle">',
	'after_title' => '</div>',
	));
	register_sidebar(array('name'=>'Right Sidebar - Bottom Right',
	'before_title' => '<div class="widgettitle">',
	'after_title' => '</div>',
	));

add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if ( !function_exists('wp_list_comments') ) 
		$file = TEMPLATEPATH . '/legacy.comments.php';
	return $file;
}

add_filter('wp_list_categories','highlight_single_posts_categories');
function highlight_single_posts_categories($output) {
if(is_single()) :
$categories = wp_get_post_categories(get_the_ID());
foreach ($categories as $catid) {
$cat = get_category($catid);
$cats[] = $cat->cat_ID;
 }
if($cats) { foreach($cats as $value) {
	if(preg_match('#item-' . $value . '">#', $output)) {
	$output = str_replace('item-' . $value . '">', 'item-' . $value . ' current-cat">', $output);
	}
	}
}
endif;
return $output;
}

add_filter('jpeg_quality', function($arg){return 90;});

// Add support for WP 3.0 Menu Management
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
}

if (function_exists('register_nav_menus')) {
	function register_my_menus() {
		register_nav_menus(
			array(
			'topnav' => __( 'Top Navigation' ),
			'catnav' => __( 'Category Navigation' )
			)
		);
	}

add_action( 'init', 'register_my_menus' );

}

// This function creates a better tag cloud widget.
function wp_widget_tag_cloud2($args) {
	extract($args);
	$options = get_option('widget_tag_cloud2');
	$title = empty($options['title']) ? __('Tags') : $options['title'];

	echo $before_widget;
	echo $before_title . $title . $after_title;
	wp_tag_cloud('format=list');
	echo $after_widget;
}

// Add tag cloud widget to the Widgets panel.
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Tag Cloud'), 'wp_widget_tag_cloud2');

// Remove yucky or un-needed widgets from the Widgets panel.
function remove_yucky_widgets() {
		unregister_sidebar_widget( 'tag_cloud' );
		unregister_sidebar_widget( 'calendar' );
		unregister_sidebar_widget( 'search' );
}

add_action('widgets_init', 'remove_yucky_widgets');

function accept_decline_buttons($atts)
{
	extract(shortcode_atts(array(
			'nexturl' => 'http://visitor.r20.constantcontact.com/d.jsp?llr=pn4yp5kab&p=oi&m=1111272226223',
			'prevurl' => 'alert:Participating HSSW members must agree to Privacy Policy as a requirement of enrollment.',
			'altnexturl' => 'http://www.hsswriters.com/membership-form/'
			), $atts));

	// Go to Constant Contact Page
	$nextUrl = $nexturl;
	if (isset($_GET['paid']) && $_GET['paid'] == "true") {
		// Go to Membership Form
		$nextUrl = $altnexturl;
	}

	if (($pos = strpos($prevurl, 'alert:')) !== false)
		$alertMsg = substr($prevurl, $pos + strlen('alert:'));
	else 
		$alertMsg = "";
		
	if ($alertMsg != "") {
		$output = '<div id="acceptdecline"><button class="btn decline" type="button" onclick="alert';
		$output .= "('" . htmlspecialchars($alertMsg) . "')";
	} 
	else {
		$output = '<div id="acceptdecline"><button class="btn decline" type="button" onclick="window.open';
		$output .= "('" . htmlspecialchars($prevurl) . "', '_self')";
	}
	$output .= '">Decline</button>&nbsp; &nbsp; &nbsp;<button class="btn accept" type="button" onclick="window.open';
	$output .= "('" . htmlspecialchars($nextUrl) . "', '_self')";
	$output .= '">Accept</button></div>';
	
	return $output;
}

add_shortcode('acceptdeclinebuttons', 'accept_decline_buttons');
include 'CCFormFunction.php';

// WP-Jazz Options Panel
$themename = "WP-Jazz";
$shortname = "wp_jazz";
$options = array (

// Basic Site Settings

	array(    "name" => "Basic Site Settings",
		"id" => $shortname."_basic_settings",
		"type" => "header"),

	array(    "name" => "Color Scheme",
		"id" => $shortname."_colors",
		"type" => "select",
		"std" => "green-default",
		"options" => array("green-default", "black", "blue", "burnt-orange", "charcoal", "gray", "light-blue", "pink", "plum", "purple", "red" ),
		"help" => "You have 11 different color schemes from which to select."),

	array(    "name" => "Home Page Layout",
		"id" => $shortname."_home_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Single Post Layout",
		"id" => $shortname."_single_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Archive Page Layout",
		"id" => $shortname."_archive_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Page Layout",
		"id" => $shortname."_page_layout",
		"type" => "select",
		"std" => "3-column",
		"options" => array("3-column", "2-column"),
		"help" => ""),

	array(    "name" => "Small Sidebar Location",
		"id" => $shortname."_side_left_loc",
		"type" => "select",
		"std" => "Left of Content",
		"options" => array("Left of Content", "Right of Content"),
		"help" => ""),

	array(    "name" => "Hide Category Navigation",
		"id" => $shortname."_hide_cats",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "By selecting yes, you will remove the category navigation bar."),

	array(    "name" => "Featured Articles on Home Page",
		"id" => $shortname."_features_on",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "By selecting no, you will remove the Featured Articles section from the home page."),

	array(    "name" => "How Many Featured Articles",
		"id" => $shortname."_features_number",
		"type" => "select",
		"std" => "5",
		"options" => array("5", "10", "9", "8", "7", "6", "4", "3", "2", "1"),
		"help" => "How many featured articles should be shown in the Featured Articles section."),

// Site Title Settings

		array(    "name" => "Site Title Settings",
		"id" => $shortname."_site_title_settings",
		"type" => "header"),

		array(    "name" => "Site Title Option",
		"id" => $shortname."_site_title_option",
		"type" => "select",
		"std" => "Basic Text-Type Title",
		"options" => array("Basic Text-Type Title", "Image/Logo-Type Title"),
		"help" => "You can use simple text as your site title or you can use an image. If you have a Custom Image/Logo you'd like to use, you can enter the URL below."),

	array(    "name" => "Site Title Font Family",
		"id" => $shortname."_site_title_font_family",
		"type" => "select",
		"std" => "georgia,times,serif",
		"options" => array("georgia,times,serif", "arial,helvetica,sans-serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif", "rockwell,georgia,serif"),
		"help" => "Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Color",
		"id" => $shortname."_site_title_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "Example: #ffffff. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>. Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Size",
		"id" => $shortname."_site_title_size",
		"type" => "text",
		"std" => "30px",
		"help" => "Enter the size of your Site Title in px (e.g. 30px). Applies only to Basic Text-Type Title option."),

	array(    "name" => "Site Title Weight",
		"id" => $shortname."_site_title_weight",
		"type" => "select",
		"std" => "normal",
		"options" => array("normal", "bold"),
		"help" => "Applies only to Basic Text-Type Title option."),

		array(    "name" => "Site Title Alignment",
		"id" => $shortname."_site_title_alignment",
		"type" => "select",
		"std" => "Left",
		"options" => array("Left", "Center", "Right"),
		"help" => "Applies only to Basic Text-Type Title option."),

	array(    "name" => "Site Title Background Color",
		"id" => $shortname."_header_bg_color",
		"std" => "",
		"type" => "text",
		"help" => "Example: #000000. Leave blank to use default background. This is the entire header area behind the site title. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Custom Image/Logo URL",
		"id" => $shortname."_site_logo_url",
		"std" => "",
		"type" => "textarea",
		"help" => "Upload your logo file (logo width should not exceed 980px; height should not exceed 110px;), and enter the URL for the file location (e.g. http://www.mysite.com/images/logo.gif)."),

	array(    "name" => "Custom Image/Logo Position",
		"id" => $shortname."_site_logo_position",
		"std" => "0px 0px",
		"type" => "text",
		"help" => "The first digit is the number of pixels to move the logo from the left. Second digit is the number of pixels to move the logo from the top of the header area. If unsure, leave the default values."),

// Basic Post Settings

		array(    "name" => "Basic Post Settings",
		"id" => $shortname."_basic_post_settings",
		"type" => "header"),

	array(    "name" => "Post Excerpts or Content",
		"id" => $shortname."_post_content",
		"type" => "select",
		"std" => "Excerpts",
		"options" => array("Excerpts", "Content"),
		"help" => "On your home page and archive/category pages, you can display post excerpts or the full post content. See <a href='http://codex.wordpress.org/Glossary#Excerpt'>here</a> for more info."),

	array(    "name" => "Add Default Post Thumbnail",
		"id" => $shortname."_default_thumbs",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "If you don't add your own thumbnail image to a post, WP-Jazz can add a default, generic thumbnail image for you. To change the default thumbnail, select an image, rename it to def-thumb.gif, and upload it to your wp-content/images/ folder."),

	array(    "name" => "Size of Author Profile Gravatar",
		"id" => $shortname."_grav_size",
		"type" => "select",
		"std" => "36",
		"options" => array("36", "48", "60", "72", "84", "96"),
		"help" => "This is the pixel size of the Gravatar that will be used in the author profile section found at the top of the single post page."),

	array(    "name" => "Hide Author Bio on Single Post",
		"id" => $shortname."_hide_auth_bio",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "If you'd like to hide the author bio found at the top of the single post page, select yes above."),

// Subscription Form Settings

		array(    "name" => "Subscription Form Settings",
		"id" => $shortname."_subscription_form_settings",
		"type" => "header"),

	array(    "name" => "Use Feedburner Email",
		"id" => $shortname."_fb_email",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Feedburner Email allows publishers to deliver their content to subscribers via email. See <a href='http://www.feedburner.com/fb/a/publishers/fbemail'>here</a> for more info. Select no to use an alternate email list provider, and enter your form code below."),

	array(    "name" => "Feedburner Feed ID",
		"id" => $shortname."_fb_feed_id",
		"std" => "",
		"type" => "text",
		"help" => "See <a href='http://www.netprofitstoday.com/blog/how-to-find-your-feedburner-id/'>here</a> to find your Feedburner Feed Id ... allow people to subscribe to your site via email."),

	array(    "name" => "Alternate Email List Form Code",
		"id" => $shortname."_alt_email_code",
		"std" => "",
		"type" => "textarea",
		"help" => "If using an alternate email list provider, enter your subscription form code here."),

// Advertisement Settings

	array(    "name" => "Advertisment Settings",
		"id" => $shortname."_ad_settings",
		"type" => "header"),

	array(    "name" => "Display 468x60 Ad in Header",
		"id" => $shortname."_ad468head",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Select no to remove the 468x60 banner advertisement in the site header next to the site title. Enter your own ad code below."),

	array(    "name" => "Header 468x60 Ad Code",
		"id" => $shortname."_ad468head_code",
		"std" => "<a href='http://www.istockphoto.com/mdp8593'><img src='http://istockphoto.com/images/referral_badges/languages/english/486x60_olive.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => "Replace the above code with your own advertising code."),

	array(    "name" => "Display 468x60 Ad Above Posts",
		"id" => $shortname."_ad468",
		"type" => "select",
		"std" => "yes",
		"options" => array("yes", "no"),
		"help" => "Select no to remove the 468x60 banner advertisement just above your posts. Enter your own ad code below."),

	array(    "name" => "468x60 Ad Code",
		"id" => $shortname."_ad468_code",
		"std" => "<a href='http://www.istockphoto.com/mdp8593'><img src='http://istockphoto.com/images/referral_badges/languages/english/486x60_olive.gif' alt='banner ad' /></a>",
		"type" => "textarea",
		"help" => "Replace the above code with your own advertising code."),

	array(    "name" => "Display 300x250 Ad Top Right Sidebar",
		"id" => $shortname."_ad300",
		"type" => "select",
		"std" => "no",
		"options" => array("no", "yes"),
		"help" => "Select yes to place a 300x250 banner ad at the top of the right sidebar. Enter your own ad code below."),

	array(    "name" => "Top Right Sidebar 300x250 Ad Code",
		"id" => $shortname."_ad300_code",
		"std" => "",
		"type" => "textarea",
		"help" => "Enter your ad code here."),

// Basic Style Settings

		array(    "name" => "Basic Style Settings",
		"id" => $shortname."_basic_style_settings",
		"type" => "header"),

	array(    "name" => "Body Background Color",
		"id" => $shortname."_body_backgroundcolor",
		"std" => "",
		"type" => "text",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Body Background Image URL",
		"id" => $shortname."_body_backgroundimage",
		"std" => "",
		"type" => "textarea",
		"help" => "If you'd like to use an image as your body background, enter the URL for its location here (e.g. http://www.mysite.com/images/background.gif)"),

	array(    "name" => "Repeat Body Background Image",
		"id" => $shortname."_body_backgroundimage_repeat",
		"type" => "select",
		"std" => "repeat",
		"options" => array("repeat", "no-repeat", "repeat-x", "repeat-y"),
		"help" => "For info on this property, see <a href='http://www.w3schools.com/css/pr_background-repeat.asp'>here</a>."),

	array(    "name" => "Body Background Image Position",
		"id" => $shortname."_body_backgroundimage_position",
		"type" => "text",
		"std" => "top left",
		"help" => "For info on this property, see <a href='http://www.w3schools.com/css/pr_background-position.asp'>here</a>."),

	array(    "name" => "Page Font Color",
		"id" => $shortname."_body_font_color",
		"std" => "#000000",
		"type" => "text",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Page Font Family",
		"id" => $shortname."_body_font_family",
		"type" => "select",
		"std" => "arial,helvetica,sans-serif",
		"options" => array("arial,helvetica,sans-serif", "georgia,times,serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif"),
		"help" => ""),

	array(    "name" => "Page Font Size",
		"id" => $shortname."_body_font_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Post Title Font Family",
		"id" => $shortname."_post_title_font",
		"type" => "select",
		"std" => "georgia,times,serif",
		"options" => array("georgia,times,serif", "arial,helvetica,sans-serif", "verdana,lucida,sans-serif","tahoma,geneva,sans-serif","rockwell,georgia,serif"),
		"help" => ""),

	array(    "name" => "Post Title Weight",
		"id" => $shortname."_post_title_weight",
		"type" => "select",
		"std" => "normal",
		"options" => array("normal", "bold"),
		"help" => ""),

// Top Nav Style Settings

	array(    "name" => "Top Navigation Style Settings",
		"id" => $shortname."_top_nav_style_settings",
		"type" => "header"),

	array(    "name" => "Top Navigation Background Color",
		"id" => $shortname."_topnav_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Top Navigation Font Size",
		"id" => $shortname."_topnav_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Top Navigation Font Weight",
		"id" => $shortname."_topnav_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold", "normal"),
		"help" => ""),

	array(    "name" => "Top Navigation Link Color",
		"id" => $shortname."_topnav_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Top Navigation Hover Link Color",
		"id" => $shortname."_topnav_link_hover_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Top Navigation Hover Background Color",
		"id" => $shortname."_topnav_link_hover_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Category Style Settings

	array(    "name" => "Category Navigation Style Settings",
		"id" => $shortname."_cat_nav_style_settings",
		"type" => "header"),

	array(    "name" => "Category Navigation Background Color",
		"id" => $shortname."_catnav_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Font Size",
		"id" => $shortname."_catnav_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Category Navigation Font Weight",
		"id" => $shortname."_catnav_weight",
		"type" => "select",
		"std" => "bold",
		"options" => array("bold", "normal"),
		"help" => ""),

	array(    "name" => "Category Navigation Link Color",
		"id" => $shortname."_catnav_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Hover Link Color",
		"id" => $shortname."_catnav_link_hover_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Category Navigation Hover Background Color",
		"id" => $shortname."_catnav_link_hover_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Featured Style Settings

	array(    "name" => "Featured Articles Style Settings",
		"id" => $shortname."_featured_style_settings",
		"type" => "header"),

	array(    "name" => "Featured Articles Content Background Color",
		"id" => $shortname."_featured_content_bg_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Leave blank to use default image. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Controls Background Color",
		"id" => $shortname."_featured_controls_bg_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Font Color",
		"id" => $shortname."_featured_font_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Font Size",
		"id" => $shortname."_featured_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Featured Articles Link Color",
		"id" => $shortname."_featured_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Featured Articles Hover Link Color",
		"id" => $shortname."_featured_link_hover_color",
		"type" => "text",
		"std" => "#ffffff",
		"help" => "#ffffff is the HTML color code for white. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Left Sidebar Style Settings

	array(    "name" => "Left Sidebar Style Settings",
		"id" => $shortname."_left_sidebar_style_settings",
		"type" => "header"),

	array(    "name" => "Left Sidebar Font Size",
		"id" => $shortname."_left_sidebar_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Left Sidebar Link Color",
		"id" => $shortname."_left_sidebar_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Left Sidebar Hover Link Color",
		"id" => $shortname."_left_sidebar_link_hover_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Main Content Style Settings

	array(    "name" => "Main Content Style Settings",
		"id" => $shortname."_content_style_settings",
		"type" => "header"),

	array(    "name" => "Main Content Font Size",
		"id" => $shortname."_content_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Main Content Link Color",
		"id" => $shortname."_content_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Main Content Hover Link Color",
		"id" => $shortname."_content_link_hover_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Right Sidebar Style Settings

	array(    "name" => "Right Sidebar Style Settings",
		"id" => $shortname."_right_sidebar_style_settings",
		"type" => "header"),

	array(    "name" => "Right Sidebar Font Size",
		"id" => $shortname."_right_sidebar_size",
		"type" => "select",
		"std" => "9pt",
		"options" => array("9pt", "8pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Right Sidebar Link Color",
		"id" => $shortname."_right_sidebar_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Right Sidebar Hover Link Color",
		"id" => $shortname."_right_sidebar_hover_link_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

// Footer Style Settings

	array(    "name" => "Footer Style Settings",
		"id" => $shortname."_footer_style_settings",
		"type" => "header"),

	array(    "name" => "Footer Font Size",
		"id" => $shortname."_footer_font_size",
		"type" => "select",
		"std" => "8pt",
		"options" => array("8pt", "9pt", "10pt", "11pt", "12pt"),
		"help" => ""),

	array(    "name" => "Footer Font Color",
		"id" => $shortname."_footer_font_color",
		"type" => "text",
		"std" => "#000000",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Footer Link Color",
		"id" => $shortname."_footer_link_color",
		"type" => "text",
		"std" => "",
		"help" => "Example: #000000. Find color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),

	array(    "name" => "Footer Hover Link Color",
		"id" => $shortname."_footer_hover_link_color",
		"type" => "text",
		"std" => "",
		"help" => "#000000 is the HTML color code for black. More color codes <a href='http://www.htmlcolorcodes.org'>here</a>."),
);

function jazz_register_options_as_vars() {
	global $options;

	foreach( $options as $option ) {
		$option_name = $option['id'];
		global $$option_name;
		$$option_name = get_option( $option['id'] );
	} 	
}

add_action( 'init', 'jazz_register_options_as_vars' );

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "WP-Jazz Theme Settings", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap" id="backtotop">
<h2><?php echo $themename; ?> Theme Settings</h2>

<p style="width:70%;"><strong>Thanks so much for your purchase of WP-Jazz!</strong> A great deal of time, energy and brain power went into making this theme as simple and flexible as possible (within reason, of course).</p>

<p style="width:70%;"><strong>Below, you'll find oodles of optional settings for the theme</strong>. If you're in a hurry, WP-Jazz will function just fine without changing any of the default values below (although you may want to go ahead and fill in your <a href="#<?php echo $shortname; ?>_subscription_form_settings">Subscription Form Settings</a>).</p>

<p style="width:70%;"><strong>On the other hand, if you're in the mood to tinker</strong>, go ahead and change some of the settings just to see what sort of site you can create for yourself.</p>

<p style="width:70%;"><strong>Wherever you see 'Save Changes' it will save changes for ALL theme settings.</strong></p>

<ol>
	<li><a target="blank" href="http://www.solostream.com/members/"><?php _e("Solostream Members Area", "wp-jazz"); ?></a> - <?php _e("Login here for theme tutorials, Photoshop PSD files and access to Solostream Help Desk", "wp-jazz"); ?></li>
	<li><a href="#<?php echo $shortname; ?>_basic_settings">Basic Site Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_site_title_settings">Site Title Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_basic_post_settings">Basic Post Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_subscription_form_settings">Subscription Form Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_ad_settings">Advertisement Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_basic_style_settings">Basic Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_top_nav_style_settings">Top Navigation Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_cat_nav_style_settings">Category Navigation Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_featured_style_settings">Featured Articles Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_left_sidebar_style_settings">Left Sidebar Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_content_style_settings">Main Content Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_right_sidebar_style_settings">Right Sidebar Style Settings</a></li>
	<li><a href="#<?php echo $shortname; ?>_footer_style_settings">Footer Style Settings</a></li>
</ol>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) {

if ($value['type'] == "text") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "header") { ?>
<tr colspan=2><td>
<p class="submit">
	<input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</td></tr>
<tr colspan=2><td><a href="#backtotop"><?php _e("Go to Top"); ?></a></td></tr>
<tr>
	<td colspan=2><h3 id="<?php echo $value['id']; ?>" style="text-align:left;padding-bottom:5px;border-bottom:1px solid #ccc;font-family:georgia,times,serif;margin-bottom:10px;font-size:16pt;color:#666;font-weight:normal;"><?php echo $value['name']; ?></h3></td>
</tr>


<?php } elseif ($value['type'] == "textarea") { ?>

<tr valign="top">
    <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
    <td>
		<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="3" cols="90"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std'] ); } ?></textarea>
		<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top">
        <th scope="row" style="text-align:left;"><?php echo $value['name']; ?>:</th>
        <td>
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
		<div style="font-size:8pt;padding-bottom:10px;"><?php echo $value['help']; ?></div>
        </td>
    </tr>

<?php
}
}
?>

</table>

<p class="submit">
	<input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
	<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
	<p class="submit" style="float:right;">
		<input name="reset" type="submit" value="<?php _e('Delete all Data and Reset to Default Settings'); ?>" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>

<?php
}

function mytheme_wp_head() { ?>
<link href="<?php bloginfo('template_directory'); ?>/style.php" rel="stylesheet" type="text/css" />
<?php }

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');
?>