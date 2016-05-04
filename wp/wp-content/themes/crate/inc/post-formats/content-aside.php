<?php
/**
 * The default template for displaying content for the standard post.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans 
 * @since Crate 1.0
 */

//FEATURED IMAGE URL
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// USE FEATURED IMAGE OR BACKGROUND COLOR
if ( $feat_image == true ) {
	$style = 'background-image: url(' . $feat_image . ');';
} else {
	$style = 'background-color: #262626;';
} ?>
 
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
	
	<div class="twelve columns">	
	
		<div class="entry-content-media">
				
			<?php if( !is_singular() ) {
				echo '<a href="';
				echo the_permalink();
				echo '">';
			} ?>

			<div class="post-inner" style='<?php echo $style ?>'>
				
				<div class="vertical-align">
					<span class="format-icon"></span>

					<article class="entry-content">	
						<?php the_content( get_theme_mod("custom_more_tag") ); ?>
					</article><!-- END .entry-content -->

				</div><!-- END .vertical-align-->

			</div><!-- END .post-inner -->

		<?php if( !is_singular() ) { echo '</a>'; } ?>

		</div><!-- END .entry-content-media -->

	</div><!-- END .twelve.columns -->	

	<?php if( is_singular() ) { ?>
		<?php get_template_part( 'content', 'post-meta' ); ?>
	<?php } ?>
	
</section><!-- END #post-<?php the_ID(); ?> -->