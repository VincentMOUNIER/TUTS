<?php
/**
 * The template for displaying all single posts.
 *
 * 
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

get_header();
bean_setPostViews($post->ID);

//LOOP
if (have_posts()) : while (have_posts()) : the_post(); 

	$format = get_post_format(); 
	if( false === $format ) { $format = 'standard'; }
	get_template_part( 'inc/post-formats/content', $format ); 	
	endwhile;

	//PAGE LINK
	wp_link_pages( array(
		'before' => '<p><strong>'.__('Pages:', 'bean').'</strong> ', 
		'after' => '</p>', 
		'next_or_number' => 'number')
	);	

	//COMMENTS
	if( bean_theme_supports( 'comments', 'posts' )) 
	{
		bean_comments_start();
		comments_template('', true);
		bean_comments_end();
	}

endif; ?>

<script type="text/javascript">
	jQuery(window).load(function(){ 		
		if(jQuery().validate) { jQuery("#commentform").validate(); }		
		});
</script>
		
<?php get_footer();