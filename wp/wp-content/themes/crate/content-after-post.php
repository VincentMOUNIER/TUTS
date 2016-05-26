<?php
/**
 * The file is for displaying the blog post after content.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *  
 *   
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */

//READING TIME CALCULATIONS	
$mycontent = $post->post_content; 
$words = str_word_count(strip_tags($mycontent));
$reading_time = floor($words / 100);
 
//IF LESS THAN A MINUTE - DISPLAY 1 MINUTE
if ($reading_time == 0 )  { $reading_time = '1'; }
?>

<ul class="post-after">
	<?php if( get_theme_mod('show_post_author') == true ) { // DISPLAY AUTHOR ?>
		<li><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name');?></a></li>
	<?php } ?>

	<?php if( get_theme_mod('show_comments') == true ) {  // DISPLAY COMMENTS ?>
		<li><a href="<?php comments_link(); ?>"><?php comments_number(__('0 Responses', 'bean'), __('1 Response', 'bean'), __('% Responses', 'bean')); ?></a></li>
	<?php } ?>

	<?php if( get_theme_mod('show_reading_time') == true ) { // DISPLAY READING TIME ?>
		<li><?php echo $reading_time; _e( ' Minute Read', 'bean' ); ?></li>
	<?php } ?>	

	<?php if ( get_theme_mod('show_post_views') == true ) { // DISPLAY POST VIEWS ?> 
		<li><?php echo bean_getPostViews(get_the_ID());  _e( ' Views', 'bean' ); ?></li>
	<?php } ?>

	<?php if( get_theme_mod('show_blog_likes') == true ) { // DISPLAY LIKES ?>
		<li><?php Bean_PrintLikes($post->ID); ?></li>
	<?php } ?>
</ul><!-- END .post-after -->
