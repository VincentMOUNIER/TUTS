<?php
/*===================================================================*/                						
/*  THEME CUSTOMIZER STYLES	                							
/*===================================================================*/
if ( !function_exists('Bean_Customize_Variables') ) {
	function Bean_Customize_Variables() {
	
	//COLOR VARIABLES
	$theme_accent_color = get_theme_mod('theme_accent_color', '#007AFF');

	//TYPOGRAPHY VARIABLES
	$type_select_headings = get_theme_mod('type_select_headings');
	$type_select_body = get_theme_mod('type_select_body');
?>		
	
	
	
<style><?php
/*===================================================================*/        	
/*  THEME CUSTOMIZER COLORS/STYLES                							
/*===================================================================*/	
$customizations = 
'
a { color:'.$theme_accent_color.'; }

.cats,
p a:hover,
h1 a:hover, 
.btn:hover,  
.btn:hover,
.author-tag,
input:focus,
.button:hover,
.button:hover,
textarea:focus,
.logo a h1:hover,
.tagcloud a:hover,
nav ul li a:hover,
.widget li a:hover,
.entry-meta a:hover,
.header-alt a:hover,
.pagination a:hover,
.post-after a:hover,
.entry-title a:hover,
.comment-meta a:hover,
h2.entry-title a:hover,
.comment-author a:hover,
input[type="reset"]:hover,
.btn[type="submit"]:hover,
input[type="reset"]:hover, 
.site-description a:hover,
.btn[type="submit"]:hover,
input[type="submit"]:hover,
.bean-tabs > li.active > a,
input[type="submit"]:hover,
input[type="button"]:hover,
input[type="button"]:hover, 
.bean-panel-title > a:hover,
.button[type="submit"]:hover,
.archives-list ul li a:hover,
.button[type="submit"]:hover, 
nav ul li.current-menu-item a,
.bean-tabs > li.active > a:hover,
.bean-tabs > li.active > a:focus,
#colophon .inner .subtext a:hover,
.form-submit input[type="submit"]:hover,
.bean-pricing-table .pricing-column li.info:hover,
.entry-content .wp-playlist-light .wp-playlist-playing .wp-playlist-item-title,
.entry-content .wp-playlist-dark .wp-playlist-playing .wp-playlist-item-title,
.entry-content .wp-playlist-light .wp-playlist-playing .wp-playlist-caption,
.entry-content .wp-playlist-dark .wp-playlist-playing .wp-playlist-caption { color:'.$theme_accent_color.'!important; }

.new-tag,
.bean-btn,
.tagcloud a,
nav a h1:hover, 
div.jp-play-bar,
.avatar-list li a.active,
div.jp-volume-bar-value,
.bean-direction-nav a:hover,
.bean-pricing-table .table-mast,
.fancybox-close:hover,
.entry-content .mejs-controls .mejs-time-rail span.mejs-time-current,
.post .post-slider.fade .bean-direction-nav a:hover { background-color:'.$theme_accent_color.'; }

.entry-content .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { background:'.$theme_accent_color.'; } 

.btn:hover, 
input:focus,
.button:hover,
textarea:focus, 
.btn[type="submit"]:hover,
input[type="reset"]:hover, 
input[type="submit"]:hover,
input[type="button"]:hover, 
.button[type="submit"]:hover,
.form-submit input[type="submit"]:hover { border: 2px solid '.$theme_accent_color.'!important; }

.bean-btn { border: 1px solid '.$theme_accent_color.'!important; }

.bean-quote { background-color:'.$theme_accent_color.'!important; }
';  


//PAGE TEXT ALIGNMENT
$page_text_align = get_post_meta(get_the_ID(), '_bean_page_text_align', true);
if($page_text_align) { 
     echo '.entry-content {text-align:'.$page_text_align.'!important;}';
} 


//IF PORTFOLIO CSS FILTERS
$css_filter_style = get_theme_mod( 'css_filter' );
if( $css_filter_style != '' ) {
	switch ( $css_filter_style ) {
		case 'none':
          // DO NOTHING
		break;
		case 'grayscale':
			echo 'section .entry-content-media .post-thumb img, .post-inner { -webkit-filter: grayscale(100%); }';
			echo 'section:hover .entry-content-media .post-thumb img, section:hover .post-inner { -webkit-filter: grayscale(0%); }';
			echo '.widget img { -webkit-filter: grayscale(100%); } .widget:hover img { -webkit-filter: grayscale(0%); }';
		break;
		case 'sepia':
			echo 'section .entry-content-media .post-thumb img, .post-inner  { -webkit-filter: sepia(60%); }';
			echo 'section:hover .entry-content-media .post-thumb img, section:hover .post-inner { -webkit-filter: sepia(0%); }';
			echo '.widget img { -webkit-filter: sepia(100%); } .widget:hover img { -webkit-filter: sepia(0%); }';
		break;    
	}
}


if( get_theme_mod('show_sliding_panel') ) {  echo '.row {padding: 0 50px 0 70px!important;}'; }




/*===================================================================*/         	
/*  BEAN PRICING TABLE PLUGIN, IF ACTIVATED	                							
/*===================================================================*/	
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (is_plugin_active('bean-pricingtables/bean-pricingtables.php')) { 
	echo '.bean-pricing-table .pricing-column li span {color:'.$theme_accent_color.'!important;}#powerTip,.bean-pricing-table .pricing-highlighted{background-color:'.$theme_accent_color.'!important;}#powerTip:after {border-color:'.$theme_accent_color.' transparent!important; }';
}



/*===================================================================*/              
/*  CUSTOM FONTS - ONLY IF ENABLED                                                        
/*===================================================================*/         
if( bean_theme_supports( 'primary', 'fonts' )) 
{

     if($type_select_headings != 'default') { 
          $headings_output = '
          h1, 
          h2, 
          h3, 
          h4, 
          h5, 
          .comment-author cite, 
          .bean-pricing-table .table-mast h5.title { font-family: '.$type_select_headings.'!important; }'; 
     } else { $headings_output = ''; }
     
     if($type_select_body != 'default') { 
          $body_output = 
          'p,
		body,
		.btn, 
		.button, 
		.btn[type="submit"], 
		.button[type="submit"], 
		input[type="button"], 
		input[type="reset"], 
		input[type="submit"],
		.bean-pricing-table .table-mast h5.title,
		.bean-pricing-table, .bean-pricing-table .table-mast p { font-family: '.$type_select_body.'!important; }'; 
     } else { $body_output = ''; }
          
     //COMPILE FOR OUTPUT
     $customfonts = $body_output . $headings_output;
     
} else { 
     $customfonts = ''; 
}//END if( bean_theme_supports( 'primary', 'fonts' ))




/*===================================================================*/         	
/*  CUSTOM CSS	                							
/*===================================================================*/	
$customcss = get_theme_mod( 'bean_tools_css' );




/*===================================================================*/         	
/*  FINAL OUTPUT                							
/*===================================================================*/	
//COMBINE THE VARIABLES FROM ABOVE
$customizer_final_output = $customfonts . $customizations . $customcss;

$final_output = preg_replace('#/\*.*?\*/#s', '', $customizer_final_output);
$final_output = preg_replace('/\s*([{}|:;,])\s+/', '$1', $final_output);
$final_output = preg_replace('/\s\s+(.*)/', '$1', $final_output);
echo $final_output;
?>
</style>
<?php } add_action( 'wp_head', 'Bean_Customize_Variables', 1 );
}