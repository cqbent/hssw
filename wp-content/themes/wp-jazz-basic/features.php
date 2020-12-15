<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/effects.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/glider.js"></script>

		<div id="my-glider" class="clearfix">

			<div class="scroller">

				<div class="content">

<?php $count = 1 ?>
<?php $featurecount = $wp_jazz_features_number; ?>
<?php $my_query = new WP_Query("category_name=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[$post->ID] = $post->ID; ?>

					<div class="section" id="section<?php the_ID(); ?>">

<?php if ( function_exists('get_the_image') ) { ?>
	<?php get_the_image('custom_key=home_feature_photo&default_size=medium&image_class=home_feature_photo'); ?>
<?php } else { ?>
	<?php if (get_post_meta($post->ID, home_feature_photo)) { ?>
		<a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, home_feature_photo, true); ?>" class="feature-photo" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>" alt="<?php _e("feature photo"); ?>" /></a>
	<?php } ?>
<?php } ?>

						<div class="feature-entry" id="post-<?php the_ID(); ?>">

							<h2><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php if ( $wp_jazz_post_content == 'Excerpts' ) { ?>
							<?php the_excerpt(); ?>
							<?php } else { ?>
							<?php the_content(''); ?>
							<?php } ?>

							<div class="postinfo">
<!--EB 12/29/12-->
<!--								<?php the_time('M d, Y') ?>&nbsp; | &nbsp;<a href="<?php comments_link(); ?>"><?php _e('Comments'); ?> <?php comments_number('0','1','%'); ?></a>&nbsp; | &nbsp;<a class="more-link" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to "); ?><?php the_title(); ?>"><?php _e("Read More"); ?></a>-->
								<?php the_time('M d, Y') ?>&nbsp; | &nbsp;<a class="more-link" href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to "); ?><?php the_title(); ?>"><?php _e("Read More"); ?></a>
							</div>

						</div>

					</div>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

				</div>

			</div>


			<div class="controls clearfix">

				<ul class="clearfix">

					<li class="feat-head">Featured Articles</li>



<?php $count = 1 ?>

<?php $featurecount = $wp_jazz_features_number; ?>
<?php $my_query = new WP_Query("category_name=featured&showposts=$featurecount");
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate[$post->ID] = $post->ID; ?>

<?php if ( $count == 1 ) { ?>

					<li class="clearfix"><a class="active" title="<?php the_title(); ?>" href="#section<?php the_ID(); ?>"><?php echo $count; ?></a></li>
<?php } else { ?>
					<li class="clearfix"><a title="<?php the_title(); ?>" href="#section<?php the_ID(); ?>"><?php echo $count; ?></a></li>
<?php } ?>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

				</ul>

			</div>

		</div>

		<script type="text/javascript" charset="utf-8">
			var my_glider = new Glider('my-glider', {duration:0.5});
		</script>