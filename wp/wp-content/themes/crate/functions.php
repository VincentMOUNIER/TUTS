<?php
/**
 * This is the theme's functions.php file.
 * This file loads the theme's constants.
 * Please be cautious when editing this file, errors here cause big problems.
 *
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 *
 *
 * CONTENTS:
 * 1. THEME FEATURES FILTER
 * 2. LOAD FRAMEWORK
 * 3. GENERAL THEME SETUP
 * 4. ADD OUR SCRIPTS
 * 5. REGISTER WIDGET AREAS
 * 6. THEME SPECIFIC FUNCTIONS
 */

/*===================================================================*/
/* 1. THEME FEATURES FILTER
/*===================================================================*/
do_action( 'bean_pre' );

//FEATURE SETUP
if ( !function_exists( 'bean_feature_setup' ) )
{
	function bean_feature_setup()
	{
		$args = array(
			'primary' => array(
				'adminstyles'       => true,
				'customizer'        => true,
				'free'              => true,
				'fonts'             => true,
				'hideadminbar'      => false,
				'meta'              => true,
				'seo'               => true,
				'widgets'           => true,
				'widgetareas'       => true,
				'whitelabel'        => false,
				'updates'           => false,
				'license'           => false,
				),
			'plugins' => array(
				'notice'            => true,
				'portfolio'         => false,
				'shortcodes'        => true,
				'twitter'           => true,
				'instagram'         => true,
				'social'            => true,
				'pricingtables'     => true,
				'500px'     		=> true,
				),
			'comments' => array(
				'posts'             => true,
				'pages'             => false,
				),
			'debug' => array(
				'footer'            => false,
				'queries'           => false,
				),
			);

	return apply_filters( 'bean_theme_config_args', $args );
	}
add_action('bean_init', 'bean_feature_setup');
} //END if ( !function_exists( 'bean_feature_setup' ) )

//FEATURE SETUP RETURN
function bean_theme_supports( $group, $feature )
{
	$setup = bean_feature_setup();
	if( isset( $setup[$group][$feature] ) && $setup[$group][$feature] )
		return true;
	else {
	}
}




/*===================================================================*/
/* 2. LOAD FRAMEWORK
/*===================================================================*/
function bean_load_framework()
{
	do_action( 'bean_pre_framework' );

	// FRAMEWORK FUNCTIONS
	$tempdir = get_template_directory();
	require_once($tempdir .'/framework/functions/bean-admin-init.php');
	require_once($tempdir .'/inc/functions/init.php');

} //END function bean_load_framework()

add_action( 'bean_init', 'bean_load_framework' );

/* RUN THE BEAN_INIT HOOK */
do_action( 'bean_init' );

/* RUN THE BEAN_SETUP HOOK */
do_action( 'bean_setup' );




/*===================================================================*/
/* 3. GENERAL THEME SETUP
/*===================================================================*/
if ( !function_exists( 'bean_theme_setup' ) )
{
	function bean_theme_setup()
	{
		// MENUS
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Navigation', 'bean' ),
			'mobile-menu'  => __( 'Mobile Navigation', 'bean' )
			));

		// TRANSLATION
		load_theme_textdomain( 'bean', get_template_directory() . '/languages' );

		// THUMBNAILS
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 140, 140 );
		add_image_size( 'post-feat', 1400, 9999, false  );

		// FEED LINKS
		add_theme_support( 'automatic-feed-links' );

		// POST FORMATS
		add_theme_support('post-formats', array('aside', 'audio', 'image', 'gallery', 'link', 'quote', 'video'));

		// CONTENT WIDTH
		if ( ! isset( $content_width ) ) $content_width = 1280;
	}
}
add_action('after_setup_theme', 'bean_theme_setup');




/*===================================================================*/
/* 4. ADD OUR SCRIPTS
/*===================================================================*/
if ( !function_exists( 'bean_enqueue_scripts') )
{
	function bean_enqueue_scripts()
	{
		// STYLESHEETS
		wp_enqueue_style('main', get_stylesheet_directory_uri(). '/style.css', false, '1.0', 'all');
		wp_enqueue_style('mobile', get_stylesheet_directory_uri(). '/assets/css/mobile.css',false,'1.0','all');
		
		// REGISTER SCRIPTS
		wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
		wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', 'jquery', '1.0', TRUE);
		wp_register_script('custom-libraries', get_template_directory_uri() . '/assets/js/custom-libraries.js', 'jquery', '1.0', TRUE);
		wp_register_script('infinitescroll', get_template_directory_uri() . '/assets/js/infinitescroll.min.js', 'jquery', '1.0', TRUE);
		wp_register_script('retina', get_template_directory_uri() . '/assets/js/retina.js', 'jquery', '1.0', TRUE);

		// ENQUEUE SCRIPTS
		wp_enqueue_script('jquery');
		wp_enqueue_script('custom-libraries');
		wp_enqueue_script('custom');

		// LOCALIZE THE 'WP_TEMPLATE_DIRECTORY_URI' VARIABLE FOR USE BY THE JS
		wp_localize_script( 'custom', 'WP_TEMPLATE_DIRECTORY_URI', array( 0 => get_template_directory_uri() ) );

		// CONDITIONALLY LOADED ENQUEUE SCRIPTS
		if ( is_home() OR is_archive() OR is_search() ) { 
			wp_enqueue_script('infinitescroll'); 
		}

		if( get_theme_mod( 'retina_option' ) == true) {
			wp_enqueue_script('retina');
		}  

		if ( is_page_template('template-contact.php') || is_singular('post') ) {
			wp_enqueue_script('validation');
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	} //END function bean_enqueue_scripts()

	add_action( 'wp_enqueue_scripts', 'bean_enqueue_scripts');

} //END if ( !function_exists( 'bean_enqueue_scripts') )




/*===================================================================*/
/* 5. REGISTER WIDGET AREAS	
/*===================================================================*/
if ( !function_exists( 'bean_widget_areas_init' ) ) 
{
	function bean_widget_areas_init() 
	{
		register_sidebar(array(
			'name' => __('Sliding Panel Sidebar', 'bean'),
			'description' => __('Widget area for the sliding panel.', 'bean'),
			'id' => 'slide-panel',
		 	'before_widget' 	=> '<div class="widget %2$s clearfix">',
		 	'after_widget' 	=> '</div>',
		 	'before_title' 	=> '<h6 class="widget-title">',
		 	'after_title' 	=> '</h6>',
	 	));
	} //END function bean_widget_areas_init()

	add_action( 'widgets_init', 'bean_widget_areas_init' );
	
} //END if ( !function_exists( 'bean_widget_areas_init' ) )








/*===================================================================*/
/*
/* 6. THEME SPECIFIC FUNCTIONS
/*
/*===================================================================*/


/*===================================================================*/
/*  SIDEBAR LOADER
/*===================================================================*/
if ( !function_exists( 'bean_layout_loader' ) ) 
{
	function bean_layout_loader() 
	{
		global $post, $bean_layout, $bean_content_class;

		$bean_layout = get_post_meta ($post->ID, '_bean_page_layout', true);
		$bean_content_class = "";

		if ( $bean_layout === 'std' ) {
			$bean_content_class = "six columns centered mobile-four";

		} 
	}
} //END if ( !function_exists( 'bean_layout_loader' ) )




/*===================================================================*/
/*  LOOP BY VIEWS - VIEW COUNT FUNCTION
/*===================================================================*/
function bean_getPostViews($postID)
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);

	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	return '0';
 	}

 	return $count;
}//END if ( function( 'bean_getPostViews' ) )

function bean_setPostViews($postID) 
{
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}

}//END if ( function( 'bean_setPostViews' ) )




/*===================================================================*/
/*  SEARCH FILTER
/*===================================================================*/
if ( !function_exists( 'bean_search_filter' ) ) 
{
	function bean_search_filter($query)
	{
		if ( !$query->is_admin && $query->is_search)
		{
			//UNCOMMENT BELOW TO SEARCH FOR POSTS ONLY
			//$query->set('post_type', 'post' );

			//UNCOMMENT BELOW TO SEARCH FOR PAGES ONLY
			//$query->set('post_type', 'page' );

			$query->set('post_type', array('page', 'post') );
		}
		return $query;
	}
	add_filter( 'pre_get_posts', 'bean_search_filter' );
} //END if ( !function_exists( 'bean_search_filter' ) )




/*===================================================================*/
/* GENERAL PAGE TITLE FUNCTION
/*===================================================================*/
if( !function_exists( 'bean_page_title' ) ) 
{
	function bean_page_title() 
	{

	    $page_title = '';

	    $author_avatar = '
	    <div class="author-avatar">
			'.get_avatar( get_the_author_meta("user_email"), "100", "" ).'
		</div>';

	    if( is_singular() ) 
	    {
	        if( is_page() ) {
	            $page_title = get_the_title();
	        } elseif( is_single() ) {
	            $page_title = get_the_title();
	        }
	    } //END if( is_singular() ) 

	    else 

	    {
	        if( is_archive() ) {
	            if( is_category() ) {
	                $page_title = sprintf( __( 'All posts in: %s', 'bean' ), single_cat_title('', false) );
	            } elseif( is_tag() ) {
	                $page_title = sprintf( __( 'All posts in: %s', 'bean' ), single_tag_title('', false) );
	            } elseif( is_date() ) {
	                if( is_month() ) {
	                    $page_title = sprintf( __( 'Archive for: %s', 'bean' ), get_the_time( 'F, Y' ) );
	                } elseif( is_year() ) {
	                    $page_title = sprintf( __( 'Archive for: %s', 'bean' ), get_the_time( 'Y' ) );
	                } elseif( is_day() ) {
	                    $page_title = sprintf( __('Archive for: %s', 'bean' ), get_the_time( get_option('date_format') ) );
	                } else {
	                    $page_title = __('Archives', 'bean');
	                }
	            } elseif( is_author() ) {
	                if(get_query_var('author_name')) {
	                    $curauth = get_user_by( 'login', get_query_var('author_name') );
	                } else {
	                    $curauth = get_userdata(get_query_var('author'));
	                }
	                $author_name = $curauth->display_name;
	                $title = sprintf( __( 'All posts by %s', 'bean' ), $author_name );
	                $page_title = $author_avatar . $title;
	            } else {
	                $page_title = single_term_title('', false);
	            }

	        } elseif( is_search() ) 
	        {
	            $page_title = sprintf( __( 'Search Results for &#8220;%s&#8221;', 'bean' ), get_search_query() );
	        } //END elseif( is_search() ) 

	    } //END else
	    return  $page_title;

	} //END function bean_page_title() 
} //END if( !function_exists( 'bean_page_title' ) ) 




/*===================================================================*/
/*  CUSTOM COMMENT OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_comment' ) )
{
	function bean_comment($comment, $args, $depth)
	{
		$isByAuthor = false;
		$hasURL = false;
		if($comment->comment_author_email == get_the_author_meta('email')) {
			$isByAuthor = true;
	 	}

	 	if($comment->comment_author_url == get_the_author_meta('url')) {
			$hasURL = true;
	 	}

	 $GLOBALS['comment'] = $comment; ?>
	 <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">

			<div class="avatar-wrap one column">
				<?php echo get_avatar($comment,$size='60'); ?>
			</div>

			<div class="comment-wrap">

				<div class="comment-author vcard">
				   <?php printf(__('<cite class="fn">%s</cite> ', 'bean'), get_comment_author_link()) ?> <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)', 'bean') ?></span><?php } ?>
				   <?php if($hasURL) { ?><span class="url-tag"></span><?php } ?>
				</div><!-- END .comment-author.vcard -->

				<div class="comment-meta commentmetadata subtext">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'bean'), get_comment_date(),  get_comment_time()) ?></a> &middot; <?php edit_comment_link(__('Edit', 'bean'),'',' &middot; ') ?>  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div><!-- END .comment-meta.commentmetadata.subtext -->

				<div class="comment-body">
					<?php comment_text() ?>
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'bean') ?></em><br />
					<?php endif; ?>
				</div><!-- END .comment-body -->

			</div><!-- END .comment-wrap -->

		</div><!-- END #comment-<?php comment_ID(); ?> -->
	</li>
	<?php
	} //END function bean_comment($comment, $args, $depth)
} //END if ( !function_exists( 'bean_comment' ) )




/*===================================================================*/
/*  CUSTOM PING OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_ping' ) )
{
	function bean_ping($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment; ?>

		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>

		<?php
	} //END //function bean_ping($comment, $args, $depth)
}//END if ( !function_exists( 'bean_ping' ) )


/*===================================================================*/
/*  COMMENTS FORM
/*===================================================================*/
if ( !function_exists( 'bean_custom_form_filters' ) )
{
	function bean_custom_form_filters( $args = array(), $post_id = null )
	{
		global $id;

		if ( null === $post_id )
			$post_id = $id;
		else
			$id = $post_id;

		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		$fields =  array(
			'author' => '
			<p class="comment-form-author">
				<label for="author">' . __( 'Name', 'bean' ) . ('<span class="required"> *</span>') . '</label>
				<input class="eight" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required/>
			</p>',

			'email'  => '
			<p class="comment-form-email">
				<label for="email">' . __( 'Email', 'bean' ) . ('<span class="required"> *</span>') . '</label>
				<input class="eight" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" required/>
			</p>',

			'url'    => '
			<p class="comment-form-url">
				<label for="url">' . __( 'Website', 'bean') . '</label>
				<input class="eight" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"/>
			</p>',
			);

	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<p class="comment-form-message"><textarea id="comment" name="comment" cols="45" rows="8"  required></textarea></p>','',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bean' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Currently logged in as <a href="%1$s">%2$s</a> / <a href="%3$s" title="Log out of this account">Logout</a>', 'bean' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</a>',
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'title_reply'          => sprintf( __( '', 'bean' )),
		'title_reply_to'       => __( 'Leave a Reply to %s', 'bean' ),
		'cancel_reply_link'    => __( 'Cancel', 'bean' ),
		'label_submit'         => __( 'Submit Comment', 'bean' ),
		);

	return $defaults;
	}
	add_filter( 'comment_form_defaults', 'bean_custom_form_filters' );
}

