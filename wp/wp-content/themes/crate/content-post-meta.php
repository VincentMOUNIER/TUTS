<?php
/**
 * The file is for displaying the blog post meta.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *  
 *   
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 
?>

<div class="four columns hide-for-small">

	<ul class="entry-meta">
			
			<li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><span><?php _e( 'Date:', 'bean' );?></span> <?php the_time(get_option('date_format')); ?></a></li>	

		<?php if( get_theme_mod( 'show_category' ) == true ) { ?>
			<li><span><?php _e( 'Posted in:', 'bean' );?></span><?php the_category(', ');  ?></li>
		<?php } ?>

		<?php if( get_theme_mod( 'show_tags' ) == true && has_tag() && is_singular() ) { ?>
			<li><?php echo the_tags( '#', '&nbsp;#', '' ); ?> </li>
		<?php } ?>

		<?php if ( is_single() ) { ?>
			<li>
				<span><?php _e( 'More:', 'bean' );?>
				<div class="pagination" role="navigation">
					<div class="page-next"><?php previous_post_link(__('%link', 'bean'), __('&larr;&nbsp;', 'bean')) ?></div>
					<div class="page-prev"><?php next_post_link(__('%link', 'bean'), __('&rarr;', 'bean')) ?></div>
	   			</div><!-- END .pagination -->
			</li>
		<?php } ?>

		<?php if ( !is_single() ) { ?>
			<li><?php edit_post_link( __( '[Edit]', 'bean' ), '<span class="subtext">', '</span>'); ?></li>
		<?php } ?>

	</ul><!-- END .entry-meta -->

</div><!-- END .four-columns.hide-for-small-->