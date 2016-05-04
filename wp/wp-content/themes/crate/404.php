<?php
/**
 * The template for displaying the 404 error page
 * This page is set automatically, not through the use of a template
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 
get_header(); ?>
	
<div class="entry-content">

	<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>

 	<p><?php _e( 'Sorry, that page does not exist', 'bean' ); ?></p>

	<p>&larr; <a href="javascript:javascript:history.go(-1)"><?php _e( 'Go Back', 'bean' ); ?></a><?php _e( ' or ', 'bean' ); ?><a href="<?php echo home_url(); ?>"><?php _e( 'Go Home', 'bean' ); ?></a> &rarr;</p>
	 
</div><!-- END .entry-content -->
	
<?php get_footer();