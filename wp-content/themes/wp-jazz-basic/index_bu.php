<?php get_header(); ?>

<?php global $options; foreach ($options as $value) { if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } } ?>

		<div id="contentleft">

<?php if ( is_home() && $paged < 2 && $wp_jazz_features_on == 'yes') { ?>
<?php include (TEMPLATEPATH . '/features.php'); ?>
<?php } ?>

			<div id="content">

			<?php if ( $wp_jazz_home_layout == '3-column' ) { ?>
			<div class="col-3">
			<?php } ?>

				<div class="maincontent">

				<?php include (TEMPLATEPATH . '/banner468.php'); ?>


<?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; ?>

				<div class="post clearfix" id="post-<?php the_ID(); ?>">

					<?php include (TEMPLATEPATH . '/post-thumb.php'); ?>

					<div class="entry clearfix">
						<h2><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark"); ?>" title="<?php _e("Permanent Link to"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php if ( $wp_jazz_post_content == 'Excerpts' ) { ?>
						<?php the_excerpt(); ?>
						<?php } else { ?>
						<?php the_content(''); ?>
						<?php } ?>
					</div>

					<?php include (TEMPLATEPATH . "/postinfo.php"); ?>

				</div>

<?php endwhile; endif; ?>

				<?php include (TEMPLATEPATH . "/bot-nav.php"); ?>

				</div>

			</div>

			<?php if ( $wp_jazz_home_layout == '3-column' ) { ?>
<?php include (TEMPLATEPATH . "/sidebar-left.php"); ?>

			</div>
			<?php } ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>