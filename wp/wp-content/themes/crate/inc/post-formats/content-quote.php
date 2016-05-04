<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

//POST META
$quote = get_post_meta($post->ID, '_bean_quote', true);
$quote_source = get_post_meta($post->ID, '_bean_quote_source', true);

//FEATURED IMAGE URL
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

// USE FEATURED IMAGE OR BACKGROUND COLOR
if ( $feat_image == true ) {
	$style = 'background-image: url(' . $feat_image . ');';
} else {
	$style = 'background-color: #262626;';
}?>
 
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
					
					<h1 class="entry-title">
						<?php echo stripslashes( esc_html($quote) ); ?>
					</h1><!-- END .entry-title -->
				
					<p class="sub-title"><?php echo stripslashes( esc_html($quote_source) ); ?></p>
				
				</div><!-- END .vertical-align-->

			</div><!-- END .post-inner -->

		<?php if( !is_singular() ) { echo '</a>'; } ?>

		</div><!-- END .entry-content-media -->

	</div><!-- END .twelve.columns -->	
	
	<?php get_template_part( 'content', 'post-meta' ); ?>

	<div class="eight columns mobile-four">

		<article class="entry-content">	
			<?php the_content( get_theme_mod("custom_more_tag") ); ?>
		</article><!-- END .entry-content -->
		
		<?php get_template_part( 'content', 'after-post' ); ?>

	</div><!-- END .eight.colums.mobile-four -->
	
</section><!-- END #post-<?php the_ID(); ?> -->