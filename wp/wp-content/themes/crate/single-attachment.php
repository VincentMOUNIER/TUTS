<?php
/**
 * The template for displaying the singular attachment page.
 *
 * 
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

get_header(); ?>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<div class="entry-content">
		<h1 class="entry-title"><?php the_title(); ?></h1>		
		<p class="subtext"><?php _e( 'Uploaded ', 'bean' ); ?><?php the_time(get_option('date_format')); ?></p>
	</div><!-- END .entry-content-->	

	<div class="entry-content-media">	
		<?php $image_info = getimagesize($post->guid); ?>
		<img src="<?php echo $post->guid; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" <?php echo $image_info[3]; ?> />
	</div><!-- END .entry-content-media-->
			
<?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer();