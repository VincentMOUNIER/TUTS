<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

get_header(); ?>
	
	<?php if ( have_posts() ) { ?>

		<div class="hfeed">
			<?php // THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); 
			$format = get_post_format(); 
			if( false === $format ) { $format = 'standard'; }
			if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote') { }
				get_template_part( 'inc/post-formats/content', $format ); 	
			endwhile; endif; 
			?>
		</div><!-- END .hfeed -->
		
		<div id="page-nav"> 
			<?php next_posts_link(); ?>
		</div><!-- END #page-nav -->

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.hfeed').infinitescroll({
					navSelector  : '#page-nav',
					nextSelector : '#page-nav a',
					itemSelector : 'section',
					loading: {
						msgText: '',
						finishedMsg: '',
						img: '<?php echo get_template_directory_uri(); ?>/assets/images/loading.gif',
		                finished: function() {
		                    Bean_Media.initPosts();
		                    Bean_Likes.Bean_Likes_Init();
		               }
				}
				});
			});
		</script>	

	<?php } else { ?>

		<div class="entry-content six columns centered mobile-four">
			
			<h1 class="entry-title"><?php printf( __('Nothing Found.', 'bean'), get_search_query()); ?></h1>
			<p><?php printf( __('Sorry, but we couldn&#39;t find anything for "%s".','bean'), get_search_query() ); ?></p>
			
			<form method="get" id="searchform" class="searchform search" action="<?php echo home_url(); ?>/">
				<input type="text" name="s" id="s" value="<?php _e('To search type & hit enter', 'bean') ?>" onfocus="if(this.value=='<?php _e('To search type & hit enter', 'bean') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('To search type & hit enter', 'bean') ?>';" />
			</form><!-- END #searchform -->

		</div><!-- END .entry-content -->
		
	<?php } //END else ?>
		
<?php get_footer();