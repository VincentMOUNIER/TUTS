<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 ?>
 
<!DOCTYPE html>
<!-- BEGIN html -->
<html <?php language_attributes(); ?>>

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php bean_meta_head(); ?>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php echo get_theme_mod( 'google_analytics' ); ?>
	
	<?php bean_head(); wp_head(); ?>
</head>

<body <?php body_class(); ?>> <?php bean_body_start(); ?>

	<?php if( get_theme_mod( 'show_sliding_panel' ) == true ) {
		get_template_part( 'content', 'sliding-panel' ); 
	} ?>
	
	<div class="viewport">

		<div class="wrapper">

			<div class="mobile-controls">

				<?php if( is_singular('post') ) { // IF SINGLE ?>
			
					<div class="mobile-pagination">
						<span class="mobile-pager prev">
							<?php previous_post_link('%link', ''); ?>
						</span>
						<span class="mobile-pager next">
							<?php next_post_link('%link', ''); ?>
						</span>
					</div><!-- END .mobile-pagination -->
				
				<?php } ?>

				<a class="mobile-nav-toggle" data-role="right"><?php _e( '', 'bean' ); ?></a>
			
			</div>	

			<div class="row">

				<div class="twelve columns">

					<?php bean_header_start(); ?>

					<header id="header">

						<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>

						<div class="site-description four columns centered mobile-four">
							<?php echo get_bloginfo ( 'description' ); ?>
						</div><!-- END .site-description -->

						<nav class="hide-for-small">
							<?php if( has_nav_menu( 'primary-menu' ) ) {
							    wp_nav_menu( array( 
							    	'theme_location' => 'primary-menu', 
							    	'container' => '', 
							    	'menu_id' => 'primary-menu',
							    	'menu_class' => 'sf-menu main-menu',
							    	) ); 
							} else { echo 'Create & assign a menu: Dashboard > Appearance > Menus' ;} ?>
						</nav>

					</header><!-- END #header -->

					<?php bean_header_end();

bean_content_start();