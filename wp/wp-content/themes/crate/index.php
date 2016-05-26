<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

get_header(); ?>

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

<?php get_footer();