<?php
/**
 * The file is for creating the page post type meta. 
 * Meta output is defined on the page editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 *  
 * @package WordPress
 * @subpackage Crate
 * @author ThemeBeans
 * @since Crate 1.0
 */
 
add_action('add_meta_boxes', 'bean_metabox_page');
function bean_metabox_page(){

$prefix = '_bean_';




/*===================================================================*/
/*  PAGE META SETTINGS							   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'page-meta',
	'title' =>  __('Page Meta Settings', 'bean'),
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name'     	=> __('Display Page Title:', 'bean'),
			'id' 		=> $prefix.'page_title',
			'type' 		=> 'checkbox',
			'desc' 		=> __('Display your page title.', 'bean'),
			'std' 		=> true 
			),
		array( 
			'name' 		=> __('Content Layout:', 'bean'),
			'desc' 		=> __('Select your page layout.', 'bean'),
			'id' 		=> $prefix.'page_layout',
			'type' 		=> 'radio',
			'std' 		=> 'std',
			'options' 	=> array(
				'std' 	=> __('Standard Layout', 'bean'),
		    		'fullwidth' 	=> __('Fullwidth Layout', 'bean'),
		    		)
			),
		array( 
			'name' 		=> __('Text Alignment:', 'bean'),
			'desc' 		=> __('Select the text alignment style for this page.', 'bean'),
			'id' 		=> $prefix.'page_text_align',
			'type' 		=> 'radio',
			'std' 		=> '',
			'options' 	=> array(
		    		'left' 	=> __('Left', 'bean'),
		    		'center' 	=> __('Center', 'bean'),
		    		'right' 	=> __('Right', 'bean'),
		    		)
			),	
	)
);
bean_add_meta_box( $meta_box );

} // END function bean_metabox_page()