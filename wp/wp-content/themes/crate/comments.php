<?php
/**
 * The template for displaying comments.
 * The area of the page that contains comments and the comment form.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 ?>   



	
	<?php
	//PASSWORD PROTECTED
	if( post_password_required() )
	    return;

	//DISPLAY COMMENTS                                  
	if ( have_comments() ) : ?>

	<div class="four columns"></div>

	<div id="comments" class="eight columns mobile-four">
		
	<?php	
		

		/*===================================================================*/
		/*	COMMENTS
		/*===================================================================*/
		if ( ! empty($comments_by_type['comment']) ) { ?>
		
			<h2 class="comments-title"><?php comments_number(__('0 Comments. ', 'bean'), __('1 Comment. ', 'bean'), __('% Comments. ', 'bean')); ?></h2>
			
			<div id="comments-list" class="comments">
				                                    
				<?php 
				//PAGINATION
				$total_pages = get_comment_pages_count(); 
				if ( $total_pages > 1 ) 
				{ ?>
			        <div id="comments-nav-above" class="comments-navigation">			        	
			        	<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			        </div><!-- END #comments-nav-above -->                           
				<?php } ?>  
				            
					<ol class="commentlist block">
						<?php wp_list_comments('type=comment&callback=bean_comment'); ?>
					</ol>
	        	
				<?php
				$total_pages = get_comment_pages_count(); 
				if ( $total_pages > 1 ) 
				{ ?>                      
		        	<div id="comments-nav-below" class="comments-navigation">
		        		<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
		       		</div><!-- END #comments-nav-below -->
				<?php } ?> 
				
			</div><!-- END #comments-list.comments -->
		
		<?php } //END if ( ! empty($comments_by_type['comment']) )
		
		
		
		
		/*===================================================================*/
		/*	PINGS
		/*===================================================================*/
		if ( ! empty($comments_by_type['pings']) ) { ?>
			
			<div id="comments-list" class="comments">
				<h2 class="comments-title"><?php _e('Trackbacks.', 'bean') ?></h2>
				
				<ol class="pinglist">
					<?php wp_list_comments( 'type=pings&callback=bean_ping' ); ?>
				</ol>                    
			</div><!-- END #comments-list .comments -->   
			
		<?php } //END if ( ! empty($comments_by_type['pings']) ) ?>
		
	</div><!-- END #comments -->

	<?php  endif; //END if ( have_comments() )
	
	/*===================================================================*/
	/*	RESPOND TO COMMENTS
	/*===================================================================*/
	if ( comments_open() ) { ?>  	
		<div class="four columns"></div>

		<div id="respond" class="eight columns mobile-four">
		
			<div class="mobile-comments-title show-for-first">
				<h2 class="comments-title"><?php _e('Leave a Comment', 'bean') ?></h2>
			</div><!-- END .mobile-comments-title -->
			
			<?php comment_form(); ?>
		</div><!-- END #respond .eight.columns.mobile-four -->
	<?php }
	
	
?>