<?php
/**
 *The template for displaying posts in the standard post format.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans 
 * @since Crate 1.0
 */
 ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
		
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="twelve columns">	
			<div class="entry-content-media">
				<div class="post-thumb">
					<?php
					if( is_singular() ) 
						{ the_post_thumbnail('post-feat'); }			
					else { ?><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-feat'); ?></a>	
						<?php 
					} ?>
				</div><!-- END .post-thumb -->
			</div><!-- END .entry-content-media -->
		</div><!-- END .twelve.columns -->	
	<?php } //END if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) ?>
	
	<?php get_template_part( 'content', 'post-meta' ); ?>

	<div class="eight columns mobile-four">

		<h1 class="entry-title">
			<?php if( is_singular() ) { the_title(); } else { // IF SINGLE ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>				
			<?php } ?>
		</h1><!-- END .entry-title -->
						
		<article class="entry-content">	
			<?php the_content( get_theme_mod("custom_more_tag") ); ?>
		</article><!-- END .entry-content -->
		
		<?php get_template_part( 'content', 'after-post' ); ?>
	
	</div><!-- END .eight.colums.mobile-four -->
	
</section><!-- END #post-<?php the_ID(); ?> -->