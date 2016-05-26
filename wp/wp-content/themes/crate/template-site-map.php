<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map template.
 *
 * 
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

get_header();
bean_layout_loader(); 
bean_setPostViews($post->ID); 

// META
$page_title = get_post_meta($post->ID, '_bean_page_title', true);
?>

<?php if (( function_exists('has_post_thumbnail')) && (has_post_thumbnail() )) { ?>
	
	<div class="entry-content-media">

		<div class="post-thumb">

			<?php the_post_thumbnail('post-feat'); ?>

		</div><!-- END .post-thumb -->

	</div><!-- END .entry-content-media -->
	
<?php } // END if (( function_exists('has_post_thumbnail')) ?>		

<div class="entry-content <?php echo $bean_content_class; ?>">

	<?php if ( $page_title == 'on' ) { ?>
		<h1 class="entry-title">
			<?php echo stripslashes( bean_page_title() ); ?>
		</h1>
	<?php }?>

	<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>

	<div class="archives-list">

		<ul><?php wp_list_pages('title_li='); ?></ul>

	</div><!-- END .archives-list --> 

	<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>

</div><!-- END .entry-content -->

<?php get_footer();