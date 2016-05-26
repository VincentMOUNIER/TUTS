<?php 
/*===================================================================*/                							
/*  LIVE PREVIEW EDITING (JS) - GRABS THE JS		                							
/*===================================================================*/
add_action( 'customize_preview_init', 'bean_customizer_live_preview' );
function bean_customizer_live_preview() {
	wp_enqueue_script('customizer', BEAN_CUSTOMIZER_URL . '/js/customizer-preview.js', 'jquery', '1.0', true);
}



/*===================================================================*/                							
/*  THEME CUSTOMIZER FUNCTIONS		                							
/*===================================================================*/
add_theme_support( 'custom-background' );

add_action( 'customize_register', 'Bean_Customize_Register' );
function Bean_Customize_Register( $wp_customize ) 
{


//REQUIRE CUSTOM CONTROLS
require_once( BEAN_FRAMEWORK_FUNCTIONS_DIR . '/bean-admin-customizer-controls.php' );


/*===================================================================*/         	
/*  MOVE STUFF TO OTHER SECTIONS               							
/*===================================================================*/	
//SITE TITLE/DESC
$wp_customize->get_control( 'blogname' )->section='logo';
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_control( 'blogname' )->priority=1;

$wp_customize->get_control( 'blogdescription' )->section='logo';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
$wp_customize->get_control( 'blogdescription' )->priority=2;

//BACKGROUND
$wp_customize->remove_section( 'background_image');
$wp_customize->get_control( 'background_color' )->section='background';
$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
$wp_customize->get_control( 'background_color' )->priority=98;
$wp_customize->get_setting( 'background_color' )->default='#FFF';

$wp_customize->get_control( 'background_image' )->section='background';
$wp_customize->get_setting( 'background_image' )->transport = 'postMessage';
$wp_customize->get_control( 'background_image' )->priority=99;

$wp_customize->get_control( 'background_repeat' )->section='background';
$wp_customize->get_setting( 'background_repeat' )->transport = 'postMessage';
$wp_customize->get_control( 'background_repeat' )->priority=100;

$wp_customize->get_control( 'background_position_x' )->section='background';
$wp_customize->get_setting( 'background_position_x' )->transport = 'postMessage';
$wp_customize->get_control( 'background_position_x' )->priority=101;

$wp_customize->get_control( 'background_attachment' )->section='background';
$wp_customize->get_setting( 'background_attachment' )->transport = 'postMessage';
$wp_customize->get_control( 'background_attachment' )->priority=102;




/*===================================================================*/         	
/*  VARIABLES FOR FONTS			                							
/*===================================================================*/	
if( bean_theme_supports( 'primary', 'fonts' )) 
{
	//FONT VARIABLES/LOAD LISTS
	$fonts = bean_fonts();

	//SIZE RANGES
	$font_size_range = array(
		'min' => '10',
		'max' => '80',
		'step' => '1',
		);
	//LINE HEIGHT RANGES
	$font_lineheight_range = array(
		'min' => '10',
		'max' => '80',
		'step' => '1',
		);
	//LETTER SPACING RANGES
	$font_letterspacing_range = array(
		'min' => '-5',
		'max' => '20',
		'step' => '1',
		);
} else { 
	$fonts = '';
	$font_size_range = '';
	$font_lineheight_range = '';
	$font_letterspacing_range = '';
}//END if( bean_theme_supports( 'primary', 'fonts' )) 	




/*===================================================================*/         	
/*  LOGO SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'logo', array(
	'title' => __( 'Title & Tagline', 'bean' ),
	'priority' => 1,
	)
);




/*===================================================================*/         	
/*  THEME SETTINGS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'theme_settings', array(
	'title' => __( 'Site Settings', 'bean' ),
	'priority' => 2,
	)
);

$wp_customize->add_setting( 'retina_option', array( 'default' => false ) );
$wp_customize->add_control( 'retina_option',
	array(
		'type' => 'checkbox',
		'label' => __( 'Enable Retina.js', 'bean' ),
		'section' => 'theme_settings',
		'priority' => 1,
		)
	);

$wp_customize->add_setting( 'framework_seo', array( 'default' => true ) );
$wp_customize->add_control( 'framework_seo',
	array(
		'type' => 'checkbox',
		'label' => __( 'Enable Framework SEO', 'bean' ),
		'section' => 'theme_settings',
		'priority' => 2,
		)
	);

$wp_customize->add_setting( 'show_sliding_panel', array( 'default' => true, ) );
$wp_customize->add_control( 'show_sliding_panel',
	array(
		'type' => 'checkbox',
		'label' => __( 'Enable Sliding Panel', 'bean' ),
		'section' => 'theme_settings',
		'priority' => 3,
		)
	);

$wp_customize->add_setting( 'enable_totop', array( 'default' => true, ) );
$wp_customize->add_control( 'enable_totop',
	array(
		'type' => 'checkbox',
		'label' => __( 'Enable Back to Top', 'bean' ),
		'section' => 'theme_settings',
		'priority' => 3,
		)
	);




/*===================================================================*/         	
/*  GENERAL SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'general_settings', array(
	'title' => __( 'General', 'bean' ),
	'priority' => 3,
	)
);

$wp_customize->add_setting( 'img-upload-login-logo', array() );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-login-logo', array(
	'label' 	=> __( 'Login Logo', 'bean' ),
	'section' 	=> 'general_settings',
	'settings' 	=> 'img-upload-login-logo',
	'priority' 	=> 2
	) ) );

$wp_customize->add_setting( 'img-upload-logo', array() );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-logo', array(
	'label' 	=> __( 'Logo', 'bean' ),
	'section' 	=> 'general_settings',
	'settings' 	=> 'img-upload-logo',
	'priority' 	=> 1
	) ) );

$wp_customize->add_setting( 'img-upload-favicon', array() );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-favicon', array(
	'label' 	=> __( 'Favicon', 'bean' ),
	'section' 	=> 'general_settings',
	'settings' 	=> 'img-upload-favicon',
	'priority' 	=> 4
	) ) );

$wp_customize->add_setting( 'img-upload-apple_touch', array() );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-apple_touch', array(
	'label' 	=> __( 'Apple Touch Icon', 'bean' ),
	'section' 	=> 'general_settings',
	'settings' 	=> 'img-upload-apple_touch',
	'priority' 	=> 5
	) ) );

$wp_customize->add_setting( 'footer_copyright', array( 'default' => '' ) );
$wp_customize->add_control( new Bean_Customize_Textarea_Control( $wp_customize, 'footer_copyright', array(
	'label' => __( 'Footer Copyright Text', 'bean' ),
	'section' => 'general_settings',
	'settings' => 'footer_copyright',
	'priority' => 7
	) ) );

$wp_customize->add_setting( 'google_analytics', array( 'default' => '' ) );
$wp_customize->add_control( new Bean_Customize_Textarea_Control( $wp_customize, 'google_analytics', array(
	'label' => __( 'Google Analytics Script', 'bean' ),
	'section' => 'general_settings',
	'settings' => 'google_analytics',
	'priority' => 8
	) ) );	




/*===================================================================*/                							
/*  BACKGROUND SECTION			                							
/*===================================================================*/
$wp_customize->add_section( 'background', array(
	'title' => __( 'Background', 'bean' ),
	'priority' => 5,
	)
);




/*===================================================================*/                							
/*  COLORS SECTION			                							
/*===================================================================*/
$wp_customize->add_section( 'custom_styles', array(
	'title' => __( 'Styles', 'bean' ),
	'priority' => 6,
	)
);

// THEME ACCENT COLOR
$wp_customize->add_setting( 'theme_accent_color', array(
	'default' => '#007AFF',
	) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_accent_color', array(
	'label'   	=> __( 'Accent Color', 'bean' ),
	'section' 	=> 'custom_styles',
	'settings'  => 'theme_accent_color',
	'priority' 	=> 1
	) ) );

$wp_customize->add_setting( 'css_filter', array( 'default' => 'grayscale' ) );
$wp_customize->add_control( 'css_filter',
    array(
        'type' => 'select',
        'label' => __( 'CSS3 Filter', 'bean' ),
        'section' => 'custom_styles',
        'priority' => 10,
        'choices' => array(
        	'none' => 'None',
            'grayscale' => 'Black & White',
            'sepia' => 'Sepia Tone',
        ),
    )
);




/*===================================================================*/                							
/*  TYPOGRAPHY SECTION			                							
/*===================================================================*/
if( bean_theme_supports( 'primary', 'fonts' )) 
{				
	//HEADING TYPOGRAPHY
	$wp_customize->add_section( 'custom_typography', array(
	        'title' => __( 'Type', 'bean' ),
	        'priority' => 8,
	    )
	);
	
	$wp_customize->add_setting( 'type_select_headings', array( 'default' => 'helvetica') );
	$wp_customize->add_control( 'type_select_headings',
	    array(
	        'type' => 'select',
	        'label' => __( 'Header Font', 'bean' ),
	        'section' => 'custom_typography',
	        'priority' => 1,
	        'choices' => $fonts
	    )
	);

	$wp_customize->add_setting( 'type_select_body', array( 'default' => 'helvetica') );
	$wp_customize->add_control( 'type_select_body',
	    array(
	        'type' => 'select',
	        'label' => __( 'Body Font', 'bean' ),
	        'section' => 'custom_typography',
	        'priority' => 2,
	        'choices' => $fonts
	    )
	);

} //if( bean_theme_supports( 'primary', 'fonts' )) 




/*===================================================================*/         	
/*  BLOG SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'blog_settings', array(
	'title' => __( 'Blog', 'bean' ),
	'priority' => 11,
	)
);	


$wp_customize->add_setting( 'show_category', array( 'default' => true, ) );
$wp_customize->add_control( 'show_category',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Post Category', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 1,
		)
	);

$wp_customize->add_setting( 'show_tags', array( 'default' => false, ) );
$wp_customize->add_control( 'show_tags',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Post Tags', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 2,
		)
	);

$wp_customize->add_setting( 'show_post_author', array( 'default' => true, ) );
$wp_customize->add_control( 'show_post_author',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Post Author', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 3,
		)
	);

$wp_customize->add_setting( 'show_comments', array( 'default' => true, ) );
$wp_customize->add_control( 'show_comments',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Comment Count', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 4,
		)
	);

$wp_customize->add_setting( 'show_blog_likes', array( 'default' => true, ) );
$wp_customize->add_control( 'show_blog_likes',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Post Likes', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 5,
		)
	);

$wp_customize->add_setting( 'show_reading_time', array( 'default' => true, ) );
$wp_customize->add_control( 'show_reading_time',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Reading Time', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 6,
		)
	);

$wp_customize->add_setting( 'show_post_views', array( 'default' => true, ) );
$wp_customize->add_control( 'show_post_views',
	array(
		'type' => 'checkbox',
		'label' => __( 'Display Post Views', 'bean' ),
		'section' => 'blog_settings',
		'priority' => 7,
		)
	);


$wp_customize->add_setting( 'custom_more_tag', array('default' => 'Continue Reading &rarr;'));
$wp_customize->add_control( 'custom_more_tag',
	array(
		'label' => __( 'Read More Text', 'bean' ),
		'section' => 'blog_settings',
		'type' => 'text',
		'priority' => 8
		)
	);




/*===================================================================*/                						
/*  CONTACT TEMPLATE SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'contact_settings', array(
	'title' => __( 'Contact', 'bean' ),
	'priority' => 12,
	)
);

$wp_customize->add_setting( 'admin_custom_email',array( 'default' => '',));
$wp_customize->add_control( 'admin_custom_email',
	array(
		'label' => __( 'Contact Form Email', 'bean' ),
		'section' => 'contact_settings',
		'type' => 'text',
		'priority' => 4,
		)
	);

$wp_customize->add_setting('contact_button_text',array( 'default' => 'Send Message',));
$wp_customize->add_control('contact_button_text',
	array(
		'label' => __( 'Contact Button Text', 'bean' ),
		'section' => 'contact_settings',
		'type' => 'text',
		'priority' => 5,
		)
	);




/*===================================================================*/                						
/*  CUSTOM CSS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'tools', array(
	'title' => __( 'Tools CSS', 'bean' ),
	'priority' => 200,
	)
);

$default_css =
'/*
List your Custom CSS in this textarea. All your styles will be 
minimized and printed in the theme header. 
You are free to remove this note. Enjoy! 

CSS for Beginners: http://www.w3schools.com/css/
*/
';		

$wp_customize->add_setting( 'bean_tools_css', array( 'default' => $default_css ) );
$wp_customize->add_control( new Bean_Customize_Textarea_Control( $wp_customize, 'bean_tools_css', array(
	'label' => __( 'Custom CSS Editor', 'bean' ),
	'section' => 'tools',
	'settings' => 'bean_tools_css',
	'priority' => 8
	) ) );




/*===================================================================*/                							
/*  TRANSPORTS FOR LIVE PREVIEW EDITING		                							
/*===================================================================*/
	//LIVE HTML
$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
$wp_customize->get_setting( 'footer_copyright' )->transport = 'postMessage';
$wp_customize->get_setting( 'contact_button_text' )->transport = 'postMessage';
}