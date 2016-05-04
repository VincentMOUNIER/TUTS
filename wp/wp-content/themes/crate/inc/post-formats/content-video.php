<?php
/**
 * The template for displaying posts in the Video post format.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 
//META 
$embed = get_post_meta($post->ID, '_bean_video_embed', true);
?>
 
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>        
	
	
	
	<div class="entry-content-media">
		<?php 
		if( !empty($embed) ) {
		echo "<div class='video-frame fadein'>";
		    echo stripslashes(htmlspecialchars_decode($embed));
		echo "</div>";
		} else {
		bean_video($post->ID);
		} ?>
	</div><!-- END .entry-content-media -->

	<?php get_template_part( 'content', 'post-meta' ); ?>

	<div class="eight columns mobile-four">

		<h1 class="entry-title">
			<?php
			if( is_singular() ) { the_title(); } else { // IF SINGLE ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>				
			<?php } ?>
		</h1><!-- END .entry-title -->
						
		<article class="entry-content">	
			<?php the_content( get_theme_mod("custom_more_tag") ); ?>
		</article><!-- END .entry-content -->
		
		<?php get_template_part( 'content', 'after-post' ); ?>
	
	</div><!-- END .eight.colums.mobile-four -->

</section><!-- END #post-<?php the_ID(); ?> -->