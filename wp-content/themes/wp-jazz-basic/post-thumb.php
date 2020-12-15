<?php
$defthumb = get_bloginfo('stylesheet_directory') . '/images/def-thumb.gif';
if ( function_exists('get_the_image') && $wp_jazz_default_thumbs == 'yes' ) { ?>

	<?php get_the_image('custom_key=post_thumbnail&default_size=thumbnail&default_image=' .$defthumb. '&image_class=thumbnail'); ?>

<?php } elseif ( function_exists('get_the_image') && $wp_jazz_default_thumbs == 'no' ) { ?>	
	
	<?php get_the_image('custom_key=post_thumbnail&default_size=thumbnail&image_class=thumbnail'); ?>

<?php } elseif ( $wp_jazz_default_thumbs == 'yes' ) { ?>

	<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>

		<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="<?php _e("post thumbnail"); ?>" /></a>

	<?php } else { ?>

		<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif"  class="post-thum" alt="<?php _e("post thumbnail"); ?>" /></a>

	<?php }  ?>

<?php } elseif ( $wp_jazz_default_thumbs == 'no' ) { ?>

	<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>

		<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="<?php _e("post thumbnail"); ?>" /></a>

	<?php }  ?>

<?php } ?>