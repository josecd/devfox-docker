<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$cmt_metabox_options = array();


/************************* Common Meta Boxes *****************************/



// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'devfox');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'devfox'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'devfox'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'devfox');

$cmt_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'devfox'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'devfox').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$cmt_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'devfox'),
	'after'    	 => ( cymolthemes_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="cmt-sboxno-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'devfox') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'devfox') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'devfox').'</div>',
	'options' 	 => cymolthemes_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$cmt_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'devfox'),
	'after'    	 => ( cymolthemes_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="cmt-sboxno-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'devfox') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'devfox') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'devfox').'</div>',
	'options' 	 => cymolthemes_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$cmt_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'devfox'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or HTML code here. The output code will appear in header area.', 'devfox').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$cmt_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'devfox'),
	'info'       => esc_attr__('Select slider width.', 'devfox'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'devfox'),
		'boxed'     => esc_attr__('Boxed Slider', 'devfox'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);






// Background metabox options array
$cmt_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'devfox'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'devfox').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'cymolthemes_background',
		'title'		 => esc_attr__('Body Background Properties', 'devfox'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'devfox').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
	array(
		'id'		 => 'custom_inner_background',
		'type'		 => 'cymolthemes_background',
		'title'		 => esc_attr__('Content Area Background Properties', 'devfox'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for content area', 'devfox').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);






// Topbar metabox options array
$cmt_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Topbar', 'devfox'),
		'info'    => esc_attr__('For this page only.', 'devfox'),
		'options' => array(
			''      => esc_attr__('Global', 'devfox'),
			'yes'   => esc_attr__('Yes, show Topbar', 'devfox'),
			'no'    => esc_attr__('No, hide Topbar', 'devfox'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'devfox'),
		'info'   	 => esc_attr__('Please select color for background', 'devfox'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'devfox'),
			'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
			'grey'       => esc_attr__('Grey', 'devfox'),
			'white'      => esc_attr__('White', 'devfox'),
			'skincolor'  => esc_attr__('Skincolor', 'devfox'),
			'custom'     => esc_attr__('Custom Color', 'devfox'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'devfox'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'devfox'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'devfox'),
		'options'	 => array(
			''          => esc_attr__('Global', 'devfox'),
			'white'     => esc_attr__('White', 'devfox'),
			'dark'      => esc_attr__('Dark', 'devfox'),
			'skincolor' => esc_attr__('Skin Color', 'devfox'),
			'custom'    => esc_attr__('Custom color', 'devfox'),
		),
		'default' 	 => esc_attr__('Global', 'devfox'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'devfox' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'devfox').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Topbar Left Content (overwrite default text)', 'devfox'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for left area. This will overwrite default text set in Theme Options', 'devfox').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Topbar Right Content (overwrite default text)', 'devfox'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for right area. This will overwrite default text set in Theme Options', 'devfox').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);





// Titlebar metabox options array
$cmt_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'devfox'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'devfox' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'devfox').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'devfox'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'devfox').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'devfox'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'devfox').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'devfox'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'devfox').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'devfox'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'devfox'),
			'custom' 	=> esc_attr__('Set custom settings', 'devfox'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'devfox').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'devfox'),
		'options'  => array(
			''           => esc_attr__('Global', 'devfox'),
			'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
			'grey'       => esc_attr__('Grey', 'devfox'),
			'white'      => esc_attr__('White', 'devfox'),
			'skincolor'  => esc_attr__('Skincolor', 'devfox'),
			'custom'     => esc_attr__('Custom Color', 'devfox'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'devfox').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'cymolthemes_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'devfox' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'devfox').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'devfox'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'devfox').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'devfox'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'devfox'),
						'custom' => esc_attr__('Set custom settings', 'devfox'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'devfox').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_text_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Text Color', 'devfox'),
		'options'  => array(
						'white'  => esc_attr__('White', 'devfox'),
						'dark'   => esc_attr__('Dark', 'devfox'),
						'custom' => esc_attr__('Custom Color', 'devfox'),
					),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'devfox').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_heading_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Heading Font', 'devfox'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'devfox').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_subheading_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Sub-heading Font', 'devfox'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'devfox').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_breadcrumb_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Breadcrumb Font', 'devfox'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'devfox').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'devfox'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'devfox').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'devfox'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'devfox'),
						'default'  => esc_attr__('All Center', 'devfox'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'devfox'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'devfox'),
						'allleft'  => esc_attr__('All Left', 'devfox'),
						'allright' => esc_attr__('All Right', 'devfox'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'devfox').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'devfox' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'devfox').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'devfox'),
		'options'  => array(
						''     => esc_attr__('Global', 'devfox'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'devfox'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'devfox'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'devfox').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	
	
);


// Other Options
$cmt_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'devfox' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'devfox').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'devfox') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'devfox') . '</div>',
	),
);









/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = cymolthemes_get_all_registered_sidebars();



$cmt_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'devfox'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/inc/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/inc/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/inc/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/inc/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/inc/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/inc/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/inc/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'devfox'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'devfox'),
		'options' => $all_sidebars,
		'default' => '',
	),
);



// Getting name of CPT from Theme Options
$devfox_theme_options		  = get_option('devfox_theme_options');
$pf_type_title_singular   = ( !empty($devfox_theme_options['pf_type_title_singular']) ) ? $devfox_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$service_type_title_singular   = ( !empty($devfox_theme_options['service_type_title_singular']) ) ? $devfox_theme_options['service_type_title_singular'] : 'Service' ;
$team_type_title_singular = ( !empty($devfox_theme_options['team_type_title_singular']) ) ? $devfox_theme_options['team_type_title_singular'] : 'Team Member' ;


// CPT list
$cmt_cpt_list = array(
	'page'           => esc_attr__('Page', 'devfox'),
	'post'           => esc_attr__('Post', 'devfox'),
	'cmt_portfolio'   => esc_attr($pf_type_title_singular),
	'cmt_service'   => esc_attr($service_type_title_singular),
	'cmt_team_member' => esc_attr($team_type_title_singular),
	'cmt_testimonial' => esc_attr__('Testimonials', 'devfox'),
);

// Foreach loop
foreach( $cmt_cpt_list as $cpt_id=>$cpt_name ){
	
	$cmt_metabox_options[] = array(
		'id'        => '_cymolthemes_metabox_group',
		'title'     => sprintf( esc_attr__('Devfox - %s Single view Elements Options', 'devfox'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
		
		
			array(
				'name'   => '_cymolthemes_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'devfox'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $cmt_metabox_slider_area,
			),
			
			
			array(
				'name'   => '_cymolthemes_background_options',
				'title'  => esc_attr__(' Background Options', 'devfox'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $cmt_metabox_background,
			),
			
			
			array(
				'name'   => '_cymolthemes_page_topbar_options',
				'title'  => esc_attr__('Topbar Options', 'devfox'),
				'icon'   => 'fa fa-tasks',
				'fields' => $cmt_metabox_topbar,
			),
			
			
			
			array(
				'name'   => '_cymolthemes_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'devfox'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $cmt_metabox_titlebar,
			),
			
			
			array(
				'name'   => '_cymolthemes_page_customize',
				'title'  => esc_attr__('Other Options', 'devfox'),
				'icon'   => 'fa fa-cog',
				'fields' => $cmt_other_options,
			),
			
			
		),
	);
	
	
	
	/**
	 *  CPT - Sidebar
	 */
	$cmt_metabox_options[]    = array(
		'id'        => '_cymolthemes_metabox_sidebar',
		'title'     => esc_attr__('Devfox - Sidebar Options', 'devfox'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cmt_sidebar_options',
				'fields' => $cmt_metabox_sidebar,
			),
		),
	);
	
	$cmt_metabox_options[]    = array(
		'id'        => 'cymolthemes_page_row_settings',
		'title'     => esc_attr__('Devfox - Content ROW settings', 'devfox'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cmt_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_attr__('Lower ROW Spacing', 'devfox'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'devfox').'</div>',
					)
				)
			)
		)
	);
	
	
	
	
	
} // foreach




/* Blog Post Format - Gallery meta box */
$cmt_metabox_options[] = array(
	'id'        => '_cymolthemes_metabox_gallery',
	'title'     => esc_attr__('Devfox - Gallery Images', 'devfox'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'cymolthemes_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'devfox'),
					'add_title'   => esc_attr__('Add Images', 'devfox'),
					'edit_title'  => esc_attr__('Edit Gallery', 'devfox'),
					'clear_title' => esc_attr__('Remove Gallery', 'devfox'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'devfox').'</div>',
				),
			)
		)
	),
);
