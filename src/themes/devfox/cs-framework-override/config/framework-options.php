<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.


// Get current theme name and vesion
$cmt_theme = wp_get_theme();
$cmt_theme_name = $cmt_theme->get( 'Name' );
$cmt_theme_ver  = $cmt_theme->get( 'Version' );


// Getting all theme options again if variable is not defined
global $devfox_theme_options;
if( empty($devfox_theme_options) || !is_array($devfox_theme_options) ){
	if( function_exists('cymolthemes_load_default_theme_options') ){
		cymolthemes_load_default_theme_options();
	} else {
		$devfox_theme_options = get_option('devfox_theme_options');
	}
}

// variables
$team_member_title          = ( !empty($devfox_theme_options['team_type_title']) ) ? esc_attr($devfox_theme_options['team_type_title']) : esc_attr__('Team Members', 'devfox') ;
$team_member_title_singular = ( !empty($devfox_theme_options['team_type_title_singular']) ) ? esc_attr($devfox_theme_options['team_type_title_singular']) : esc_attr__('Team Member', 'devfox') ;
$team_group_title           = ( !empty($devfox_theme_options['team_group_title']) ) ? esc_attr($devfox_theme_options['team_group_title']) : esc_attr__('Team Groups', 'devfox') ;
$team_group_title_singular  = ( !empty($devfox_theme_options['team_group_title_singular']) ) ? esc_attr($devfox_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'devfox') ;

$pf_title               = ( !empty($devfox_theme_options['pf_type_title']) ) ? esc_attr($devfox_theme_options['pf_type_title']) : esc_attr__('Portfolio', 'devfox') ;
$pf_title_singular      = ( !empty($devfox_theme_options['pf_type_title_singular']) ) ? esc_attr($devfox_theme_options['pf_type_title_singular']) : esc_attr__('Portfolio', 'devfox') ;
$pf_cat_title           = ( !empty($devfox_theme_options['pf_cat_title']) ) ? esc_attr($devfox_theme_options['pf_cat_title']) : esc_attr__('Portfolio Categories', 'devfox') ;
$pf_cat_title_singular  = ( !empty($devfox_theme_options['pf_cat_title_singular']) ) ? esc_attr($devfox_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'devfox') ;

$service_title           = ( !empty($devfox_theme_options['service_type_title']) ) ? esc_attr($devfox_theme_options['service_type_title']) : esc_attr__('Service', 'devfox') ;
$service_title_singular      = ( !empty($devfox_theme_options['service_type_title_singular']) ) ? esc_attr($devfox_theme_options['service_type_title_singular']) : esc_attr__('Service', 'devfox') ;
$service_cat_title           = ( !empty($devfox_theme_options['service_cat_title']) ) ? esc_attr($devfox_theme_options['service_cat_title']) : esc_attr__('Service Categories', 'devfox') ;
$service_cat_title_singular  = ( !empty($devfox_theme_options['service_cat_title_singular']) ) ? esc_attr($devfox_theme_options['service_cat_title_singular']) : esc_attr__('Service Category', 'devfox') ;




/**
 *  FRAMEWORK SETTINGS
 */
$cmt_framework_settings = array(
	'menu_title' 	  => esc_attr__('Devfox Options', 'devfox'),
	'menu_type'  	  => 'menu',
	'menu_slug'  	  => 'cymolthemes-theme-options',
	'ajax_save'  	  => true,
	'show_reset_all'  => false,
	'framework_title' => esc_attr($cmt_theme_name).'  <small>'.esc_attr($cmt_theme_ver).'</small>',
	'menu_position'   => 2, // See below comment for proper number
	/*
	Default: bottom of menu structure #Default: bottom of menu structure
	2 – Dashboard
	4 – Separator
	5 – Posts
	10 – Media
	15 – Links
	20 – Pages
	25 – Comments
	59 – Separator
	60 – Appearance
	65 – Plugins
	70 – Users
	75 – Tools
	80 – Settings
	99 – Separator
	For the Network Admin menu, the values are different: #For the Network Admin menu, the values are different:
	2 – Dashboard
	4 – Separator
	5 – Sites
	10 – Users
	15 – Themes
	20 – Plugins
	25 – Settings
	30 – Updates
	99 – Separator
	*/
);



/**
 *  FRAMEWORK OPTIONS
 */
$cmt_framework_options = array();


// Layout Settings
$cmt_framework_options[] = array(
	'name'   => 'layout_settings', // like ID
	'title'  => esc_attr__('Layout Settings', 'devfox'),
	'icon'   => 'fa fa-square-o',
	'fields' => array( // begin: fields
		
		array(
			'type'    	=> 'heading',
			'content'		=> esc_attr__('Specify theme pages layout, the skin coloring and background', 	'devfox'),
        ),
		array(
			'id'      => 'skincolor',
			'type'    => 'color_picker',
			'title'   => esc_attr__( 'Select Skin Color', 'devfox' ),
			'default' => '#ff382f',
			'rgba'    => false,
        ),
		array(
			'id'         => 'secondarycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Dark BG Color', 'devfox' ),
			'default'    => '#05255f',	
		),
		array(
			'id'         => 'secondary-greycolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Select Primary Grey BG Color', 'devfox' ),
			'default'    => '#f5f5f5',	
		),
		array(
			'id'     	=> 'cmt_one_click_demo_setup', //cymolthemes_one_click_demo_content
			'type'    	=> 'cymolthemes_one_click_demo_content',//cymolthemes_one_click_demo_content
			'title'  	=> esc_attr__('Demo Content Setup', 'devfox'),
        ),
		array(
			'id'        => 'layout',
			'type'      => 'radio',
			'title'     => esc_attr__('Pages Layout', 'devfox'), 
			'options'  	=> array(
							'wide'     => esc_attr__('Wide', 'devfox'),
							'boxed'    => esc_attr__('Boxed', 'devfox'),
							'framed'   => esc_attr__('Framed', 'devfox'),
							'rounded'  => esc_attr__('Rounded', 'devfox'),
							'fullwide' => esc_attr__('Full Wide', 'devfox'),
						),
			'default'   => 'wide',
			'after'   	=> '<small>'.esc_attr__('Specify the layout for the pages', 'devfox').'</small>',
        ),
		array(
			'id'        => 'full_wide_elements',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Elements for Full Wide View (in above option)', 'devfox'),
			'options'   => array(
					'floatingbar' => esc_attr__('Floating Bar', 'devfox'),
					'topbar'      => esc_attr__('Topbar', 'devfox'),
					'header'      => esc_attr__('Header', 'devfox'),
					'content'     => esc_attr__('Content Area', 'devfox'),
					'footer'      => esc_attr__('Footer', 'devfox'),
					),
			'default'    => array( 'header' ),
			'after'    	 => '<small>'.esc_attr__('Select elements that you want to show in full-wide view', 'devfox').'</small>',
			'dependency' => array( 'layout_fullwide', '==', 'true' ),
		),
		
		array(
			'type'      	=> 'heading',
			'content'     	=> esc_attr__('Background Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Set below background options. Background settings will be applied to Boxed layout only', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'global_background',
			'type'   		=> 'cymolthemes_background',
			'title' 		=> esc_attr__('Body Background Properties', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only.', 'devfox').'</div>',
			'default'		=> array(
			'color'			=> '#ffffff',
			),
			'output'        => 'body',
        ),
		array(
			'id'     		=> 'inner_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Content Area Background Properties', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for content area', 'devfox').'</div>',
			'default' 		=> array(
				'color' 	=> '#ffffff',
			),
			'output'        => 'body #main,.cymolthemes-sticky-footer.cymolthemes-sidebar-true #content-wrapper,.search-results.cymolthemes-sticky-footer #content-wrapper,.cymolthemes-sticky-footer .site-content-wrapper',
        ),
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Pre-loader Image', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Select pre-loader image for the site. This will work on desktop, mobile and tablet devices', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'preloader_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Pre-loader animation', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('Show or hide pre-loader animation.', 'devfox') . '</div>',
		),
		array(
			'id'          => 'loaderimg',
			'type'        => 'image_select',
			'title'       => esc_attr__('Page-loader Image', 'devfox'), 
			'options'     => array(
					''   	=> get_template_directory_uri() . '/images/loader-none.gif',
					'1'   	=> get_template_directory_uri() . '/images/loader1.gif',
					'2'   	=> get_template_directory_uri() . '/images/loader2.gif',
					'3'   	=> get_template_directory_uri() . '/images/loader3.gif',
					'4'   	=> get_template_directory_uri() . '/images/loader4.gif',
					'5'   	=> get_template_directory_uri() . '/images/loader5.gif',
					'6'   	=> get_template_directory_uri() . '/images/loader6.gif',
					'7'   	=> get_template_directory_uri() . '/images/loader7.gif',
					'8'   	=> get_template_directory_uri() . '/images/loader8.gif',
					'9'   	=> get_template_directory_uri() . '/images/loader9.gif',
					'10'   	=> get_template_directory_uri() . '/images/loader10.gif',
					'11'   	=> get_template_directory_uri() . '/images/loader11.gif',
					'12'   	=> get_template_directory_uri() . '/images/loader12.gif',
					'13'   	=> get_template_directory_uri() . '/images/loader13.gif',
					'14'   	=> get_template_directory_uri() . '/images/loader14.gif',
					'15'   	=> get_template_directory_uri() . '/images/loader15.gif',
					'16'   	=> get_template_directory_uri() . '/images/loader16.gif',
					'17'   	=> get_template_directory_uri() . '/images/loader17.gif',
					'18'   	=> get_template_directory_uri() . '/images/loader18.gif',
					'custom'=> get_template_directory_uri() . '/images/loader-custom.gif',
				),
			'radio'       => true,
			'default'     => '',
			'after'   	  => '<div class="cs-text-muted">' . esc_attr__('Please select site pre-loader image.', 'devfox') . '<br/><br/><em><strong>' . esc_attr__( 'NOTE:', 'devfox' ) . '</strong> ' . esc_attr__( 'Please note that if you uploaded pre-loader image (in below option) than this pre-defined loader image will be ignored.', 'devfox' ) . '</em></div>',
			'dependency' => array( 'preloader_show', '==', 'true' ),
        ),
		array(
			'id'       		=> 'loaderimage_custom',
			'type'      	=> 'image',
			'title'    		=> esc_attr__('Upload Page-loader Image', 'devfox'),
			'add_title' 	=> 'Select/Upload Page-loader image',
			'after'  		=> '<div class="cs-text-muted">' . esc_attr__('Custom page-loader image that you want to show. You can create animated GIF image from your logo from Animizer website.', 'devfox') . ' <a href="'. esc_url('http://animizer.net/en/animate-static-image') .'" target="_blank">' . esc_attr__('Click here to go to Anmizer website.', 'devfox') . '</a><br/><br/><em><strong>' . esc_attr__('NOTE:', 'devfox') . '</strong>' . esc_attr__('Please note that if you selected image here than the pre-defined loader image (in above option) will be ignored.', 'devfox') . '</em></div>',
			'dependency'    => array( 'loaderimg_custom', '==', 'true' ),
        ),
		array(
			'type'      => 'heading',
			'content'   => esc_attr__('One Page Website', 'devfox'),
			'after'  	=> '<small>'.esc_attr__('Options for One Page website', 'devfox').'</small>',
		),
		array(
			'id'      	=> 'one_page_site',
			'type'    	=> 'switcher',
			'title'   	=> esc_attr__('One Page Site', 'devfox'),
			'default' 	=> false,
			'label'   	=> '<br><div class="cs-text-muted">'.esc_attr__('Set this option "ON" if your site is one page website', 'devfox').' <a target="_blank" href="#">'.esc_attr__('Click here to know more about how to setup one-page site.', 'devfox').'</a></div>',
        ),
		
	),
	
);


// hide_demo_content_option
$hide_demo_content_option = false;
if( isset($devfox_theme_options['hide_demo_content_option']) ){
	$hide_demo_content_option = $devfox_theme_options['hide_demo_content_option'];
}

if( $hide_demo_content_option == true ){
	// Removing one click demo setup option
	$cmt_framework_options_inner = $cmt_framework_options[0];
	foreach( $cmt_framework_options_inner['fields'] as $index => $option ){
		if( !empty($option['type']) && $option['type'] == 'cymolthemes_one_click_demo_content' ){
			unset($cmt_framework_options[0]['fields'][$index]);
		}
	}
}










// Font Settings
$cmt_framework_options[] = array(
	'name'   => 'font_settings', // like ID
	'title'  => esc_attr__('Font Settings', 'devfox'),
	'icon'   => 'fa fa-text-height',
	'fields' => array( // begin: fields
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Font Settings', 'devfox'),
			'after'  	=> '<small>'.esc_attr__('General Element Fonts', 'devfox').'</small>',
        ),
		array(
			'id'             => 'general_font',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('General Font', 'devfox'),
			'chosen'         => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'backup-family'  => true, // Select a backup non-google font in addition to a google font
			'font-size'      => true,
			'color'          => true,
			'variant'        => true, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-align'     => false,  // This is still not available
			'text-transform' => true,
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => true,
			'output'         => 'body', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px - Currently not working
			'subtitle'       => esc_attr__('Select font family, size etc. for H2 heading tag.', 'devfox'),
			'default'        => array (
				'family'			=> 'Lato',
				'backup-family'		=> 'Tahoma, Geneva, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0.1',
				'color'				=> '#676b72',
				'all-varients'		=> 'on',
				'font'				=> 'google',
			),
		),
		array(
			'id'         => 'blackish_buttoncolor',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Global Dark Text Color', 'devfox' ),
			'default'    => '#05255f',	
		),
		
		array(
			'id'        => 'link-color',
			'type'      => 'radio',
			'title'     => esc_attr__('Select Link Color', 'devfox'), 
			'options'  	=> array(
				'default'   => esc_attr__('Dark color as normal color and Skin color as hover color', 'devfox'),
				'darkhover' => esc_attr__('Skin color as normal color and Dark color as hover color', 'devfox'),
				'custom'    => esc_attr__('Custom color (select below)', 'devfox'),
				
			),
			'default'   => 'custom',
			'std'       => 'default',
			'after'   	=> '<div class="cs-text-muted">' . esc_attr__('Select normal link color effect. This will change normal text link color and hover color', 'devfox') . '</div>',
        ),
		array(
			'id'         => 'link-color-regular',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Regular)', 'devfox' ),
			'default'    => '#05255f',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		array(
			'id'         => 'link-color-hover',
			'type'       => 'color_picker',
			'title'      => esc_attr__( 'Links Color Option (Hover)', 'devfox' ),
			'default'    => '#ff382f',
			'dependency' => array( 'link-color_custom', '==', 'true' ),
        ),
		
		
		
		array(
			'id'             => 'h1_heading_font',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('H1 Heading Font', 'devfox'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h1', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '43',
				'line-height'		=> '53',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H1 heading tag.', 'devfox').'</div>',
		),
		array(
			'id'          => 'h2_heading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('H2 Heading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h2', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '38',
				'line-height'		=> '46',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H2 heading tag.', 'devfox').'</div>',
		),
		array(
			'id'          => 'h3_heading_font',
			'type'        => 'cymolthemes_typography',
			'chosen'      => false,
			'title'       => esc_attr__('H3 Heading Font', 'devfox'),
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'h3', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '30',
				'line-height'		=> '42',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H3 heading tag.', 'devfox').'</div>',
		),
		array(
			'id'          => 'h4_heading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('H4 Heading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h4', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '28',
				'line-height'		=> '40',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H4 heading tag.', 'devfox').'</div>',
		),
		array(
			'id'          => 'h5_heading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('H5 Heading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h5', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '25',
				'line-height'		=> '38',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H5 heading tag.', 'devfox').'</div>',
		),
		
		array(
			'id'          => 'h6_heading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('H6 Heading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'      => 'h6', // An array of CSS selectors to apply this font style to dynamically
			'units'       => 'px', // Defaults to px
			'default'     => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '22',
				'line-height'		=> '35',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for H6 heading tag.', 'devfox').'</div>',
		),
		
		
		
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Heading and Subheading Font Settings', 'devfox'),
			'after'  	  => '<small>'.esc_attr__('Select font settings for Heading and subheading of different title elements like Blog Box, Portfolio Box etc', 'devfox').'</small>',
		),
		
		array(
			'id'          => 'heading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('Heading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.cmt-element-heading-wrapper .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header h2,.cmt-element-heading-content-wrapper .cmt-element-content-heading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '43',
				'line-height'		=> '53',
				'text-transform'	=> 'capitalize',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'devfox').'</div>',
		),
		array(
			'id'          => 'subheading_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('Subheading Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,							
			'output'         => '.cmt-element-heading-wrapper .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header h4, .cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-transparent.cmt-sboxcta3-only .cmt-vc_cta3-content .cmt-sboxvc_cta3-headers h4,.cmt-element-heading-content-wrapper .cmt-element-subheading', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '16',
				'line-height'		=> '23',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.5',
				'color'				=> '#ff382f',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading title', 'devfox').'</div>',
		),
		array(
			'id'          => 'content_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('Content Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.cmt-element-heading-wrapper .cmt-vc_general.cmt-sboxvc_cta3 .cmt-vc_cta3-content p,.elementor-element .cmt-element-content-desctxt', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '15',
				'line-height'		=> '26',
				'letter-spacing'	=> '0.5',
				'color'				=> '#676b72',
				'font'				=> 'google',
			),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for content', 'devfox').'</div>',
		),
		array(
			'type'        => 'heading',
			'content'     => esc_attr__('Specific Element Fonts', 'devfox'),
			'after'  	  => '<small>'.esc_attr__('Select Font for specific elements', 'devfox').'</small>',
		),
		array(
			'id'          => 'widget_font',
			'type'        => 'cymolthemes_typography', 
			'title'       => esc_attr__('Widget Title Font', 'devfox'),
			'chosen'      => false,
			'text-align'  => false,
			'google'      => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup' => true, // Select a backup non-google font in addition to a google font
			'subsets'     => false, // Only appears if google is true and subsets not set to false
			'line-height'    => true,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => 'body .widget .widget-title, body .widget .widgettitle, #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title, .portfolio-description h2, .cymolthemes-portfolio-details h2, .cymolthemes-portfolio-related h2', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '20',
				'line-height'		=> '28',
				'letter-spacing'	=> '0',
				'color'				=> '#05255f',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for widget title', 'devfox').'</div>',
		),
		
		
		array(
			'id'             => 'button_font',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('Button Font', 'devfox'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'font-size'      => false,
			'line-height'    => false,
			'text-transform' => true,
			'color'          => false,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => true, // Defaults to false
			'all-varients'   => false,
			'output'         => '.main-holder .site-content ul.products li.product .add_to_wishlist, .main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"], .woocommerce button.button, .woocommerce-page button.button, input, .cmt-sboxvc_btn, .cmt-vc_btn3, .woocommerce-page a.button, .button, .wpb_button, button, .woocommerce input.button, .woocommerce-page input.button, .tp-button.big, .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .cymolthemes-post-readmore a,.elementor-element.elementor-widget-button .elementor-button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .main-holder .site .woocommerce-cart-form__contents button, .main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled], .main-holder .site table.cart .coupon button, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .main-holder .site .woocommerce-cart-form__contents button, .main-holder .site .woocommerce-cart-form__contents button.button:disabled[disabled], .main-holder .site table.cart .coupon button', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'letter-spacing'	=> '0',
				'text-transform'	=> 'capitalize',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to all buttons in this site', 'devfox').'</div>',
		),
		array(
			'id'        => 'blog_readmore_shape',
			'type'      => 'radio',
			'title'     => esc_attr__('Global Buttons Shape', 'devfox'), 
			'options'  	=> array(
							'default'    => esc_attr__('Default', 'devfox'),
							'rounded'    => esc_attr__('Rounded', 'devfox'),
							'square'    => esc_attr__('Square', 'devfox'),
						),
			'default'   => 'default',
			'after'   	=> '<small>'.esc_attr__('Select the shape for Buttons', 'devfox').'</small>',
        ),
		array(
			'id'             => 'element_title',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('Element Title Font', 'devfox'),
			'chosen'         => false,
			'text-align'     => false,
			'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
			'font-backup'    => true, // Select a backup non-google font in addition to a google font
			'subsets'        => false, // Only appears if google is true and subsets not set to false
			'line-height'    => false,
			'text-transform' => true,
			'word-spacing'   => false, // Defaults to false
			'letter-spacing' => false, // Defaults to false
			'color'          => false,
			'all-varients'   => false,
			'output'         => '.wpb_tabs_nav a.ui-tabs-anchor, body .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a, .vc_progress_bar .vc_label, .vc_tta.vc_general .vc_tta-tab > a, .vc_toggle_title > h4', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'		=> 'Lato',
				'backup-family'	=> 'Arial, Helvetica, sans-serif',
				'variant'		=> '700',
				'font-size'		=> '17',
				'font'			=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This fonts will be applied to Tab title, Accordion Title and Progress Bar title text', 'devfox').'</div>',
		),	
	)
);


// Floating Bar Settings
$cmt_framework_options[] = array(
	'name'   => 'floatingbar_settings', // like ID
	'title'  => esc_attr__('Floating Bar Settings', 'devfox'),
	'icon'   => 'fa fa-arrow-circle-o-up',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Floating Bar Settings', 'devfox'),
        ),
		array(
			'id'     		=> 'fbar_show',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Floating Bar', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Floating Bar', 'devfox').'</div>',
        ),
		array(
			'id'      => 'fbar-position',
			'type'    => 'radio',
			'title'   => esc_attr__('Floating bar position', 'devfox'),
			'options' => array(
				'default' => esc_attr__('Top','devfox'),
				'right'   => esc_attr__('Right', 'devfox'),
			),
			'default'    => 'right',
			'after'      => '<div class="cs-text-muted"><br>'.esc_attr__('Position for Floating bar', 'devfox').'</div>',
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'            => 'fbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Background Color', 'devfox'),
			'options'  		=> array(
				'darkgrey'    => esc_attr__('Dark grey', 'devfox'),
				'grey'        => esc_attr__('Grey', 'devfox'),
				'white'       => esc_attr__('White', 'devfox'),
				'skincolor'   => esc_attr__('Skincolor', 'devfox'),
				'custom'      => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'skincolor',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Floating Bar background color', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'fbar_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Floating Bar Background Properties', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Floating bar. You can set color or image and also set other background related properties', 'devfox').'</div>',
			'color'			=> true,
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'left top',
				'attachment'	=> 'scroll',
				'color'			=> '#7eba03',
				'size'		  	=> 'cover',
			),
			'output' 	        => '.cymolthemes-fbar-box-w',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'fbar_bg_color',   // color dropdown to decide which color
			
        ),
		array(
			'id'            => 'fbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Text Color', 'devfox'),
			'options' 		=> array(
				'white'			=> esc_attr__('White', 'devfox'),
				'darkgrey'		=> esc_attr__('Dark', 'devfox'),
				'custom'		=> esc_attr__('Custom color', 'devfox'),
							),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'fbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Custom Color for text', 'devfox' ),
			'default'		 => '#dd3333',
			'dependency'  	 => array( 'fbar_show|fbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar', 'devfox').'</div>',
        ),
		
		array(
			'type'    	=> 'heading',
			'content'	=> esc_attr__('Floating Bar Open/Close Button Settings', 'devfox'),
			'after'		=> '<small>' . esc_attr__('Settings for Floating Bar Open/Close Button', 'devfox') . '</small>',
			
        ),
				array(
			'id'      => 'fbar_handler_icon',
			'type'    => 'textarea',
			'title'   => esc_attr__('Open Link Icon', 'devfox' ),
			'default' 		=> esc_attr__('<i class=" cmt-devfox-icon-menu"> </i>', 'devfox'),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		array(
			'id'      => 'fbar_handler_icon_close',
			'type'    => 'textarea',
			'title'   => esc_attr__('Close Link Icon', 'devfox' ),
			'default' 		=> esc_attr__('<i class="cmt-devfox-icon-close"> </i>', 'devfox'),
			'dependency' => array( 'fbar_show', '==', 'true' ),
        ),
		
		array(
			'id'            => 'fbar_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Icon Color', 'devfox'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'devfox'),
					'grey'       => esc_attr__('Grey', 'devfox'),
					'white'      => esc_attr__('White', 'devfox'),
					'skincolor'  => esc_attr__('Skincolor', 'devfox'),
			),
			'default'		=> 'white',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'devfox').'</div>',
        ),
		
		array(
			'id'            => 'fbar_btn_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Floating Bar Open/Close Button Background Color', 'devfox'),
			'options' 		=> array(
					'dark'       => esc_attr__('Dark grey', 'devfox'),
					'grey'       => esc_attr__('Grey', 'devfox'),
					'white'      => esc_attr__('White', 'devfox'),
					'skincolor'  => esc_attr__('Skincolor', 'devfox'),
					'custom'	 => esc_attr__('Custom color', 'devfox'),
			),
			'default'		=> 'skincolor',
			'dependency' 	=> array( 'fbar_show', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option.', 'devfox').'</div>',
        ),
		
		array(
			'id'     		 => 'fbar_btn_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Floating Bar Open/Close Button Custom Background Color', 'devfox' ),
			'default'		 => '#1e73be',
			'output' 	        => '.cymolthemes-fbar-btn-link',
			'dependency'  	 => array( 'fbar_show|fbar_btn_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Floating Bar Button', 'devfox').'</div>',
        ),

		array(
			'type'    	 => 'heading',
			'content'	 => esc_attr__('Floating Bar Widget Settings', 'devfox'),
			'after'		 => '<small>' . esc_attr__('Settings for Floating Bar Widgets', 'devfox') . '</small>',
			'dependency' => array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
        ),
		array(
			'id'			=> 'fbar_widget_column_layout',
			'type' 			=> 'image_select',//cymolthemes_pre_color_packages
			'title'			=> esc_attr__('Floating Bar Widget Columns', 'devfox'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '6_6',
			'dependency' 	=> array( 'fbar_show|fbar-position_default', '==|==', 'true|true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Floating Bar Column layout View for widgets.', 'devfox').'</div>',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Floating Bar in Small Devices', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Floating Bar in small devices like mobile, tablet etc.', 'devfox').'</small>',
			'dependency'     => array('fbar_show','==','true'),
		),
		array(
			'id'       => 'floatingbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Floating Bar in Responsive Mode', 'devfox'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Floating Bar.', 'devfox'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','devfox'),
				'1200'     => esc_attr__('Show only on large devices','devfox').' <small>'.esc_attr__('show only on desktops (>1200px)', 'devfox').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','devfox').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'devfox').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','devfox').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'devfox').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'devfox'),
			),
			'dependency' => array('fbar_show','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'floatingbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Floating Bar (in pixel)', 'devfox' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Floating Bar will be hidden.', 'devfox' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'fbar_show|floatingbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Topbar Settings
$cmt_framework_options[] = array(
	'name'   => 'topbar_settings', // like ID
	'title'  => esc_attr__('Topbar Settings', 'devfox'),
	'icon'   => 'fa fa-tasks',
	'fields' => array( // begin: fields
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Topbar settings', 'devfox'),
        ),
		array(
			'id'     		=> 'show_topbar',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Topbar', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Topbar', 'devfox').'</div>',
        ),
		array(
			'id'            => 'topbar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Background Color', 'devfox'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
								'grey'       => esc_attr__('Grey', 'devfox'),
								'white'      => esc_attr__('White', 'devfox'),
								'skincolor'  => esc_attr__('Skincolor', 'devfox'),
								'custom'     => esc_attr__('Custom Color', 'devfox'),
							),
			'default'       => 'skincolor',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Topbar background color', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'topbar_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(0,0,0,0)',
			'dependency'  	 => array( 'show_topbar|topbar_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Topbar', 'devfox').'</div>',
        ),
		array(
			'id'            => 'topbar_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Topbar Text Color', 'devfox'),
			'options'  => array(
							'white'     => esc_attr__('White', 'devfox'),
							'dark'      => esc_attr__('Dark', 'devfox'),
							'skincolor' => esc_attr__('Skin Color', 'devfox'),
							'custom'    => esc_attr__('Custom color', 'devfox'),
						),
			'default'       => 'white',
			'dependency' 	=> array( 'show_topbar', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'topbar_text_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Topbar Custom Color for text', 'devfox' ),
			'default'		 => 'rgba(0, 0, 255, 0.25)',
			'dependency'  	 => array( 'show_topbar|topbar_text_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for Topbar Text', 'devfox').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Topbar Content Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Content for Topbar', 'devfox').'</small>',
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
		),
		array(
			'id'       		 => 'topbar_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Left Content', 'devfox'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of Topbar area', 'devfox').'</div>',
			'default'        => '<ul class="top-contact"><li><i class="fa fa-envelope-o"></i><a href="#"> info@example.com</a></li><li><i class="fa fa-phone"></i>+1-2345-6789-101</li></ul>',
        ),
		array(
			'id'       		 => 'topbar_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Topbar Right Content', 'devfox'),
			'shortcode'		 => true,
			'dependency' 	 => array( 'show_topbar', '==', 'true' ),
			'desc'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of Topbar area', 'devfox').'</div>',
			'after'  	 	 => '<div class="cs-text-muted"><br>'.esc_attr__('HTML tags and shortcodes are allowed', 'devfox') . sprintf( esc_attr__('%1$s Click here to know more %2$s about shortcode description','devfox') , '<a href="'. esc_url('http://devfox.cymolthemesthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ).'</div>',
			'default'  => '[cmt-social-links tooltip="no"]',
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Hide Topbar Bar in Small Devices', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Hide Topbar Bar in small devices like mobile, tablet etc.', 'devfox').'</small>',
			'dependency'     => array('show_topbar','==','true'),
		),
		array(
			'id'       => 'topbar-breakpoint',
			'type'     => 'radio',
			'title'    => esc_attr__('Show/Hide Topbar Bar in Responsive Mode', 'devfox'), 
			'subtitle' => esc_attr__('Change options for responsive behaviour of Topbar Bar.', 'devfox'),
			'options'  => array(
				'all'      => esc_attr__('Show in all devices','devfox'),
				'1200'     => esc_attr__('Show only on large devices','devfox').' <small>'.esc_attr__('show only on desktops (>1200px)', 'devfox').'</small>',
				'992'      => esc_attr__('Show only on medium and large devices','devfox').' <small>'.esc_attr__('show only on desktops and Tablets (>992px)', 'devfox').'</small>',
				'768'      => esc_attr__('Show on some small, medium and large devices','devfox').' <small>'.esc_attr__('show only on mobile and Tablets (>768px)', 'devfox').'</small>',
				'custom'   => esc_attr__('Custom (select pixel below)', 'devfox'),
			),
			'dependency' => array('show_topbar','==','true'),
			'default'    => '1200'
		),
		array(
			'id'            => 'topbar-breakpoint-custom',
			'type'          => 'number',
			'title'         => esc_attr__( 'Custom screen size to hide Topbar (in pixel)', 'devfox' ),
			'subtitle'      => esc_attr__( 'Select after how many pixels the Topbar will be hidden.', 'devfox' ),
			'after'         => esc_attr(' px'),
			'default'       => '1200',
			'dependency' 	=> array( 'show_topbar|topbar-breakpoint_custom', '==|==', 'true|true' ),
		),
		
		
	)
);


// Titlebar Settings
$cmt_framework_options[] = array(
	'name'   => 'titlebar_settings', // like ID
	'title'  => esc_attr__('Titlebar Settings', 'devfox'),
	'icon'   => 'fa fa-align-justify',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Background Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'devfox').'</small>',
		),
		array(
			'id'            => 'titlebar_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Background Color', 'devfox'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
							'grey'       => esc_attr__('Grey', 'devfox'),
							'white'      => esc_attr__('White', 'devfox'),
							'skincolor'  => esc_attr__('Skincolor', 'devfox'),
							'custom'     => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'titlebar_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Titlebar Background Image', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'devfox').'</div>',
			'color'			=> true,
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center bottom',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> 'rgba(17,24,30,0.01)',
			),
			'output' 	    => 'div.cmt-title-wrapper',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'titlebar_bg_color',   // color dropdown to decide which color
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Font Settings', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'devfox').'</small>',
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
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
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
			'output'         => '.cmt-titlebar h1.entry-title, .cmt-titlebar-textcolor-custom .cmt-titlebar-main .entry-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '40',
				'line-height'		=> '45',
				'letter-spacing'	=> '0',
				'text-transform'	=> 'capitalize',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'			=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'devfox').'</div>',
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
			'output'         => '.cmt-titlebar .entry-subtitle, .cmt-titlebar-textcolor-custom .cmt-titlebar-main .entry-subtitle', // An array of CSS selectors to apply this font style to dynamically
			'units'			 => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'font-size'			=> '17',
				'line-height'		=> '22',
				'letter-spacing'	=> '0',
				'color'				=> '#20292f',
				'font'				=> 'google',
			),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'devfox').'</div>',
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
			'output'         => '.cmt-titlebar .breadcrumb-wrapper, .cmt-titlebar .breadcrumb-wrapper a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> 'regular',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '14',
				'line-height'		=> '25',
				'letter-spacing'	=> '0',
				'color'				=> '#686e73',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'devfox').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Content Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'devfox').'</small>',
		),
		array(
			'id'            => 'titlebar_view',
			'type'          => 'select',
			'title'         =>  esc_attr__('Titlebar Text Align', 'devfox'),
			'options'       => array(
							'default'  => esc_attr__('All Center (default)', 'devfox'),
							'left'     => esc_attr__('Title Left / Breadcrumb Right', 'devfox'),
							'right'    => esc_attr__('Title Right / Breadcrumb Left', 'devfox'),
							'allleft'  => esc_attr__('All Left', 'devfox'),
							'allright' => esc_attr__('All Right', 'devfox'),
			),
			'default'       => 'allleft',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select text align in Titlebar', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'titlebar_height',
			'type'   		 => 'number',
			'title'          => esc_attr__( 'Titlebar Height', 'devfox' ),
			'after'  	  	 => ' px<br><div class="cs-text-muted">'.esc_attr__('Set height of the Titlebar. In pixel only', 'devfox').'</div>',
			'default'		 => '250',
        ),
		array(
			'id'        	=> 'breadcrumb_on_bottom',
			'type'      	=> 'checkbox',
			'title'     	=> esc_attr__('Show Breadcrumb on bottom of Titlebar area', 'devfox'),
			'label'     	=> esc_attr__('YES', 'devfox'),
			'default'   	=> false,
			'dependency'  	=> array( 'titlebar_view', 'any', 'default,allleft,allright' ),//Multiple dependency
			'after'    		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select this option if you like to show breadcrumbs on bottom of Titlebar area. This option will only work when Titlebar Text Align option above is set to (All Center, All Left or All Right)', 'devfox').'</div>',
		),
		array(
			'id'            => 'breadcum_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Breadcrumb Background Color', 'devfox'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
							'grey'       => esc_attr__('Grey', 'devfox'),
							'white'      => esc_attr__('White', 'devfox'),
							'skincolor'  => esc_attr__('Skincolor', 'devfox'),
							'custom'     => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'custom',
			'dependency' 	=> array( 'breadcrumb_on_bottom', '==|==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for breadcrumb background color', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'breadcrumb_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Breadcrumb Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(0,0,0,0.50)',
			'dependency'  	 => array( 'breadcrumb_on_bottom|breadcum_bg_color', '==|==', 'true|custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Breadcrumb', 'devfox').'</div>',
        ),
		array(
			'id'            => 'titlebar_hide_breadcrumb',
			'type'          => 'select',
			'title'         =>  esc_attr__('Hide Breadcrumb', 'devfox'),
			'options'  => array(
							'no'   => esc_attr__('NO, show the breadcrumb', 'devfox'),
							'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'devfox'),
			),
			'default'       => 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'devfox').'</div>',
		),
		
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Titlebar Extra Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Change settings for some extra options in Titlebar', 'devfox').'</small>',
		),
		array(
			'id'      => 'adv_tbar_catarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Category "Category Archives:" Label Text', 'devfox'),
			'default' => esc_attr__('Category Archives: ', 'devfox'),
		),
		array(
			'id'      => 'adv_tbar_tagarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Tag "Tag Archives:" Label Text', 'devfox'),
			'default' => esc_attr__('Tag Archives: ', 'devfox'),
		),
		array(
			'id'      => 'adv_tbar_postclassified',
			'type'    => 'text',
			'title'   => esc_attr__('Post Taxonomy "Posts classified under:" Label Text', 'devfox'),
			'default' => esc_attr__('Posts classified under: ', 'devfox'),
		),
		array(
			'id'      => 'adv_tbar_authorarc',
			'type'    => 'text',
			'title'   => esc_attr__('Post Author "Author Archives:" Label Text', 'devfox'),
			'default' => esc_attr__('Author Archives: ', 'devfox'),
		),

	)
);


// Header Settings
$cmt_framework_options[] = array(
	'name'   => 'header_settings', // like ID
	'title'  => esc_attr__('Header Settings', 'devfox'),
	'icon'   => 'fa fa-arrow-up',
	'fields' => array( // begin: fields
	
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Header Settings', 'devfox'),
        ),
		array(
			'id'     		 => 'header_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Header Height (in pixel)', 'devfox' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area from here', 'devfox').'</div>',
			'default'		 => '100',
        ),
		array(
			'id'            => 'header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Background Color', 'devfox'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
							'grey'       => esc_attr__('Grey', 'devfox'),
							'white'      => esc_attr__('White', 'devfox'),
							'skincolor'  => esc_attr__('Skincolor', 'devfox'),
							'custom'     => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Header background color', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(26,34,39,0.73)',
			'dependency'  	 => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'vertical_header_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Header Background Properties', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Header. You can set color or image and also set other background related properties', 'devfox').'</div>',
			'dependency'  	=> array( 'header_style', 'any', 'one-vertical' ),
			'default'		=> array(
				'image'			=> '',
				'size'			=> 'cover',
				'color'			=> 'rgba(26,34,39,0.73)',
			),
			'output' 	    => '.header-style-one-vertical .site-header',
        ),
		array(
			'id'     		 => 'responsive_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Responsive Header Custom Background Color', 'devfox' ),
			'default'		 => '#1a2227',
			'dependency'  	 => array( 'header_bg_color|header_style', '==|any', 'custom|two,six,five,five-rtl' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header in responsive mode only. Like Mobile, tablet etc small screen devices.', 'devfox').'</div>',
        ),
		array(
			'id'            => 'header_responsive_icon_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Responsive Icon Color', 'devfox'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'devfox'),
							'white'  => esc_attr__('White', 'devfox'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for responsive menu icon, cart icon, search icon. This is becuase PHP code cannot understand if you selected dark or light color as background. Will work in responsive only.', 'devfox').'</div>',
			'dependency'    => array( 'header_bg_color', '==', 'custom' ),//Multiple dependency
        ),
		array(
          'id'      	 	 => 'logotype',
          'type'     		 => 'radio',
          'title'    		 => esc_attr__('Logo type', 'devfox'), 
          'options' 		 => array( 
								'text' => esc_attr__('Logo as Text', 'devfox'), 
								'image' => esc_attr__('Logo as Image', 'devfox') 
							),
          'default'  		 => 'image',
          'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of logo. It can Text or Image', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'logotext',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Logo Text', 'devfox'),
			'default' 		 => 'Devfox',
			'dependency'  	 => array( 'logotype_text', '==', 'true' ),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Enter the text to be used instead of the logo image', 'devfox').'</div>',
		),
		array(
			'id'             => 'logo_font',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('Logo Font', 'devfox'),
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
			'output'         => '.headerlogo a.home-link', // An array of CSS selectors to apply this font style to dynamically
			'default'        => array(
				'family'		 => 'Archivo',
				'backup-family'	 => 'Arial, Helvetica, sans-serif',
				'variant'		 => 'regular',
				'font-size'		 => '26',
				'line-height'	 => '27',
				'letter-spacing' => '0',
				'color'			 => '#202020',
				'font'			 => 'google',
			),
			'dependency'  	=> array( 'logotype_text', '==', 'true' ),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('This will be applied to logo text only. Select Logo font-style and size', 'devfox').'</div>',
		),
		
		array(
			'id'       		 => 'logoimg',
			'type'     		 => 'cymolthemes_image',
			'title'    		 => esc_attr__('Logo Image', 'devfox'),
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for the site ', 'devfox') . sprintf(__('%1$sNOTE:%2$s Upload image that will be used as logo for the site', 'devfox'),'<strong>', '</strong>').'</div>',
			'add_title'		 => esc_attr__('Upload Site Logo','devfox'),
			'default'		 => array(
					'thumb-url'	=> get_template_directory_uri() . '/images/logo.svg',
					'full-url'	=> get_template_directory_uri() . '/images/logo.svg',
			),
        ),
		array(
			'id'     		 => 'logo_max_height',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height', 'devfox' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('If you feel your logo looks small than increase this and adjust it', 'devfox').'</div>',
			'default'		 => '50',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		array(
			'id'     		 => 'logo_max_height_mobile',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height For Mobile Screen', 'devfox' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set logo height for responsive screen ', 'devfox').'</div>',
			'default'		 => '43',
			'dependency'  	 => array( 'logotype_image', '==', 'true' ),
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Sticky Header', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options for sticky header', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'sticky_header',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Enable Sticky Header', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select ON if you want the sticky header on page scroll', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'header_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Sticky Header Height (in pixel)', 'devfox' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('You can set height of header area when it becomes sticky', 'devfox').'</div>',
			'default'		 => '70',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		array(
			'id'            => 'sticky_header_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Background Color', 'devfox'),
			'options'  => array(
							'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
							'grey'       => esc_attr__('Grey', 'devfox'),
							'white'      => esc_attr__('White', 'devfox'),
							'skincolor'  => esc_attr__('Skincolor', 'devfox'),
							'custom'     => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'white',
			'dependency'    => array( 'sticky_header', '==', 'true' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Sticky Header background color', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(21,21,21,0.96)',
			'dependency'  	 => array( 'sticky_header_bg_color|sticky_header', '==|==', 'custom|true' ),//Multiple dependency
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Sticky Header', 'devfox').'</div>',
        ),
		array(
			'id'       		 => 'logoimg_sticky',
			'type'     		 => 'cymolthemes_image',
			'title'    		 => esc_attr__('Logo Image for Sticky Header', 'devfox'),
			'dependency'  	 => array( 'sticky_header|logotype_image', '==|==', 'true|true' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Upload image that will be used as logo for sticky header', 'devfox').'</div>',
			'add_title'		 => esc_attr__('Upload Sticky Logo','devfox'),
		),
		array(
			'id'     		 => 'logo_max_height_sticky',
			'type'   		 => 'number',
			'title'          => esc_attr__('Logo Max Height when Sticky Header', 'devfox' ),
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set logo when the header is sticky', 'devfox').'</div>',
			'default'		 => '37',
			'dependency'     => array( 'sticky_header', '==', 'true' ),
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Search Button in Header', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Option to show or hide search button in header area', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'header_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Button', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to show search button in header. The icon will be at the right side (after menu)', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'search_input',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Input Word', 'devfox'),
			'default' 		 => esc_attr__('Type Word Then Enter..', 'devfox'),
			'after'  			 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the search form input word here. <br> Default: "WRITE SEARCH WORD..."', 'devfox').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'id'     		 => 'searchform_title',
			'type'    		 => 'text',
			'title'   		 => esc_attr__('Search Form Title', 'devfox'),
			'default' 		 => '',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Write the title for search form. Default: "Hi, How Can We Help You?"', 'devfox').'</div>',
			'dependency'     => array( 'header_search', '==', 'true' ),
		),
		array(
			'id'      			=> 'header_search_bgall',
			'type'    			=> 'cymolthemes_background',
			'title'  			=> esc_attr__('Search Form Background', 'devfox' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Set Header Search Form background', 'devfox').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center center',
				'attachment'		=> 'fixed',
				'size'				=> 'cover',
				'color'				=> 'rgba(35,35,35,0.96)',
			),
			'output'			=> '.cmt-search-overlay',
			'dependency'     => array( 'header_search', '==', 'true' ),
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Header Style', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change header style', 'devfox').'</small>',
		),
		array(
			'id'			=> 'headerstyle',
			'type' 			=> 'image_select',//cymolthemes_pre_color_packages
			'title'			=> esc_attr__('Select Header Style', 'devfox'),
			'desc'     		=> esc_attr__('Please select header style', 'devfox'),
			'wrap_class'    => 'header-style',
			'options'      	=> array(
				'one'				=> get_template_directory_uri() . '/inc/images/header-one.png',
				'two'				=> get_template_directory_uri() . '/inc/images/header-two.png',
				'four'				=> get_template_directory_uri() . '/inc/images/header-four.png',	
				'six'				=> get_template_directory_uri() . '/inc/images/header-six.png',		
				'five'				=> get_template_directory_uri() . '/inc/images/header-five.png',	
				'seven'				=> get_template_directory_uri() . '/inc/images/header-seven.png',
			),
			'default'		=> 'one',
			'attributes' 	=> array(
			'data-depend-id' => 'header_style'
			),
			'radio' 		=> true,//This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'type'    		=> 'heading',
			'content'		=> esc_attr__('Special options for selected header', 'devfox'),
			'dependency'  	 => array( 'header_style', 'any', 'one,two,classic-box-overlay,one-rtl,two-rtl,three,three-overlay,four,seven,four-rtl,five,five-rtl,one-vertical,six' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  	  	 => '<small>'.esc_attr__('These options will appear for selected header style only.', 'devfox').'</small>',
        ),
		array(
			'id'       		 => 'header_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Text Area', 'devfox'),
			'shortcode'		 => true,
			'dependency'  	 => array( 'header_style', 'any', 'one,two,one-rtl,five,two-rtl,six' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear before Search/Cart icon in header area. This option will work for currently selected header style only', 'devfox').'</div>',
			'default'        => '',
        ),
		array(
			'id'            => 'header_menu_position',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Position', 'devfox'),
			'options'  		=> array(
								'left'		=> esc_attr__('Left Align', 'devfox'),
								'right'		=> esc_attr__('Right Align', 'devfox'),
								'center'	=> esc_attr__('Center Align', 'devfox'),
							),
			'default'       => 'right',
			'dependency'  	=> array( 'header_style', 'any', 'one,two' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Menu Position. This option will work for currently selected header style only ', 'devfox').'</div>',
        ),
		
		array(
			'id'       		 => 'infostack_column_one',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack First Column Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on first column', 'devfox').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="cmt_devfox flaticon-phone-call"></i></div></div><div class="header-content"><h3>Telephone</h3><h5>+123 795 9841</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_two',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Second Column Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on second column', 'devfox').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="cmt_devfox flaticon-envelope"></i></div></div><div class="header-content"><h3>Email Address</h3><h5>info@example.com</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_three',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Third Column Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on third column', 'devfox').'</div>',
			'default'        => '<div class="header-icon"> <div class="icon"><i class="cmt_devfox flaticon-placeholder"></i></div></div><div class="header-content"><h3>Office Address</h3><h5> 23 Belfast ave, Florida</h5></div>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_column_four',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Four Column Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on four column', 'devfox').'</div>',
			'default'        => '<div class="elementor-element cmt-btn-color-darkgrey cmt-btn-style-outline cmt-btn-style-none cmt-btn-shape-square elementor-widget elementor-widget-button">
				<div class="elementor-widget-container">
					<div class="elementor-button-wrapper">
			<a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
						<span class="elementor-button-content-wrapper">
						<span class="elementor-button-text">Request a Quote </span>
</span></a></div></div></div>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'infostack_phone_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('InfoStack Right Content', 'devfox'),
			'shortcode'		 => true,
			'desc'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear after menu', 'devfox').'</div>',
			'default'        => '<a href="#">GET QUOTE</a>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'header_left_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Left Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Left side of logo', 'devfox').'</div>',
			'default'        => esc_attr__('<p>Get A Estimate</p><h2 class="ph_no">900 145 7890</h2>', 'devfox'),
			'dependency'  	 => array( 'header_style', 'any', 'three' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		array(
			'id'       		 => 'header_right_text',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Header Right Content', 'devfox'),
			'shortcode'		 => true,
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('This content will appear on Right side of logo', 'devfox').'</div>',
			'default'        => esc_attr__('<p>Request an</p> <h2>Appointment</h2>', 'devfox'),
			'dependency'  	 => array( 'header_style', 'any', 'three' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
		),
		
		array(
			'type'    		=> 'notice',
			'class'   		=> 'info',
			'content'		=> '<p><strong>' . esc_attr__('Change widget content of the header', 'devfox') . '</strong> <br> ' . esc_attr__('You can change widgets content in the header area from Widgets section. Just go to "Appearance > Widgets" and modify widgets under "InfoStack header widgets" position.', 'devfox') . '</p>',
			'dependency'  	 => array( 'header_style', 'any', 'four,seven,four-rtl,five,five-rtl' ), // This dependency was not working normally so had to define radio to it with attributes id more on this link https://github.com/Codestar/codestar-framework/issues/52
        ),
		array(
			'id'            => 'header_widget_text_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Widget Text Color', 'devfox'),
			'options'  => array(
							'dark'   => esc_attr__('Dark', 'devfox'),
							'white'  => esc_attr__('White', 'devfox'),
			),
			'default'       => 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select color for Widgets text for Overlay header style. This is because the background is transparent so you should set it.', 'devfox').'</div>',
			'dependency'    => array( 'header_bg_color|header_style', '==|any', 'custom|four,seven,four-rtl' ),//Multiple dependency
        ),
		array(
			'id'     		 => 'header_menuarea_height',
			'type'    		 => 'number',
			'title'   		 => esc_attr__('Menu area height', 'devfox'),
			'default' 		 => '60',
			'after'          => esc_attr(' px'),
			'attributes'     => array(
			'min'       	 => 40,
			),
			'subtitle'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Height for menu area only', 'devfox').'</div>',
			'dependency'     => array( 'header_style', 'any', 'three,three-overlay,four,seven,four-rtl,five,five-rtl' ),
		),		
		array(
			'id'            => 'header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Menu Background Color', 'devfox'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
								'grey'       => esc_attr__('Grey', 'devfox'),
								'white'      => esc_attr__('White', 'devfox'),
								'skincolor'  => esc_attr__('Skincolor', 'devfox'),
								'custom'     => esc_attr__('Custom Color', 'devfox'),
							),
			'default'       => 'white',
			'dependency'	=> array( 'header_style', 'any', 'three,three-overlay,four,seven,four-rtl,five,five-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Header Menu Background Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(0,0,0,0.31)',
			'dependency'  	 => array( 'header_menu_bg_color|header_style', '==|any', 'custom|three,three-overlay,four,seven,four-rtl,five,five-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area', 'devfox').'</div>',
        ),
        array(
			'id'            => 'sticky_header_menu_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Sticky Header Menu Background Color', 'devfox'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
								'grey'       => esc_attr__('Grey', 'devfox'),
								'white'      => esc_attr__('White', 'devfox'),
								'skincolor'  => esc_attr__('Skincolor', 'devfox'),
								'custom'     => esc_attr__('Custom Color', 'devfox'),
							),
			'default'       => 'white',
			'dependency'	=> array( 'header_style', 'any', 'three,three-overlay,four,seven,four-rtl,five,five-rtl' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Menu area in header when header is sticky', 'devfox').'</div>',
        ),
		array(
			'id'     		 => 'sticky_header_menu_bg_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Sticky Header Menu Background Custom Background Color', 'devfox' ),
			'default'		 => 'rgba(129,215,66,0.7)',
			'dependency'  	 => array( 'sticky_header_menu_bg_color|header_style', '==|any', 'custom|three,three-overlay,four,seven,four-rtl,five,five-rtl' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Header Menu area when header is sticky', 'devfox').'</div>',
        ),

		array(
			'id'            => 'header_logo_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Header Logo Background Color', 'devfox'),
			'options'  		=> array(
								'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
								'grey'       => esc_attr__('Grey', 'devfox'),
								'white'      => esc_attr__('White', 'devfox'),
								'skincolor'  => esc_attr__('Skincolor', 'devfox'),
							),
			'default'       => 'darkgrey',
			'dependency'	=> array( 'header_style', 'any', 'classic-highlight' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined background color for Logo area in header', 'devfox').'</div>',
        ),
			
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Logo SEO', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options for Logo SEO', 'devfox').'</small>',
		),
		array(
			'id'      		=> 'logoseo',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Logo Tag for SEO', 'devfox'),
			'options' 		=> array(
								'h1homeonly' => esc_attr__('H1 for home, SPAN on other pages', 'devfox'),
								'allh1'      => esc_attr__('H1 tag everywhere', 'devfox'),
							),
			'default'		=> 'h1homeonly',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select logo tag for SEO purpose', 'devfox').'</div>',
        ),
	
		
	)
);


// Menu Settings
$cmt_framework_options[] = array(
	'name'   => 'menu_settings', // like ID
	'title'  => esc_attr__('Menu Settings', 'devfox'),
	'icon'   => 'fa fa-bars',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Menu Settings', 'devfox'),
			'after'  	  	=> '<small>'.esc_attr__('Responsive Menu Breakpoint: Change Options for responsive menu.', 'devfox').'</small>',
		),
		array(
			'id'      		=> 'menu_breakpoint',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Responsive Menu Breakpoint', 'devfox'),
			'options'  		=> array(
								'1200'   => esc_attr__('Large devices','devfox').' <small>'.esc_attr__('Desktops (>1200px)', 'devfox').'</small>',
								'992'    => esc_attr__('Medium devices','devfox').' <small>'.esc_attr__('Desktops and Tablets (>992px)', 'devfox').'</small>',
								'768'    => esc_attr__('Small devices','devfox').' <small>'.esc_attr__('Mobile and Tablets (>768px)', 'devfox').'</small>',
								'custom' => esc_attr__('Custom (select pixel below)', 'devfox'),
						),
			'default'		=> '1200',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Change options for responsive menu breakpoint', 'devfox').'</div>',
        ),
		
		array(
			'id'     		=> 'megamenu-override',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Override Max Mega Menu Style', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('We need to override some of the Max mega Menu plugin\'s settings to match with our theme. If you like to use the default vanilla look of Max Mega Menu than turn this option off.', 'devfox').'</div>',
        ),
		
		array(
			'id'     		 => 'menu_breakpoint-custom',
			'type'   		 => 'number',
			'title'          => esc_attr__('Custom Breakpoint for Menu (in pixel)', 'devfox' ),
			'dependency'  	 => array( 'menu_breakpoint_custom', '==', 'true' ),
			'default'		 => '1200',
			'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Select after how many pixels the menu will become responsive', 'devfox').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Main Menu Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options for main menu in header', 'devfox').'</small>',
		),
		array(
			'id'             => 'mainmenufont',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('Main Menu Font', 'devfox'),
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
			'output'         => '#site-header-menu #site-navigation div.nav-menu > ul > li > a, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.mega-menu-item > a', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'text-transform'	=> 'capitalize',
				'font-size'			=> '16',
				'line-height'		=> '25',
				'letter-spacing'	=> '0',
				'color'				=> '#002c5b',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select main menu font, color and size', 'devfox').'</div>',
		),
		
		
		
		array(
			'id'     		 => 'stickymainmenufontcolor',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Font Color for Sticky Header', 'devfox' ),
			'default'		 => '#002c5b',
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Main menu font color when the header becomes sticky', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'mainmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Main Menu Active Link Color', 'devfox'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'devfox'),
				'custom'		=> esc_attr__('Custom color (select below)', 'devfox'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>
									<strong>' . esc_attr__('Tips:', 'devfox') . '</strong>
									<ul>
										<li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'devfox') . '</li>
										<li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'devfox') . '</li>
									</ul>
								</div>',
        ),
		array(
			'id'     		 => 'mainmenu_active_link_custom_color',
			'type'   		 => 'color_picker',
			'title'  		 => esc_attr__('Main Menu Active Link Custom Color', 'devfox' ),
			'default'		 => '#ffffff',
			'dependency'  	 => array( 'mainmenu_active_link_color', '==', 'custom' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for main menu active active link', 'devfox').'</div>',
        ),
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Drop Down Menu Options', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options for drop down menu in header', 'devfox').'</small>',
		),
		array(
			'id'             => 'dropdownmenufont',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('Dropdown Menu Font', 'devfox'),
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
			'output'         => 'ul.nav-menu li ul li a, div.nav-menu > ul li ul li a, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:hover, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a:focus, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:hover, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu a.mega-menu-link:focus, .cmt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Lato',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '700',
				'font-size'			=> '14',
				'line-height'		=> '17',
				'letter-spacing'	=> '0',
				'color'				=> '#7d8791',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select dropdown menu font, color and size', 'devfox').'</div>',
		),
		
		
		array(
			'id'           	=> 'dropmenu_active_link_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Dropdown Menu Active Link Color', 'devfox'),
			'options'  		=> array(
				'skin'			=> esc_attr__('Skin color (default)', 'devfox'),
				'custom'		=> esc_attr__('Custom color (select below)', 'devfox'),
			),
			'default'      	=> 'skin',
			'after'  		=> '<div class="cs-text-muted"><br>' . '<strong>' . esc_attr__('Tips:', 'devfox') . '</strong>' . '<ul><li>' . esc_attr__('"Skin color (default):" Skin color for active link color.', 'devfox') . '</li><li>' . esc_attr__('"Custom color:" Custom color for active link color. Useful if you like to use any color for active link color.', 'devfox') . '</li></ul></div>',
        ),
		array(
			'id'     		=> 'dropmenu_active_link_custom_color',
			'type'   		=> 'color_picker',
			'title'  		=> esc_attr__('Dropdown Menu Active Link Custom Color', 'devfox' ),
			'default'		=> '#ffffff',
			'dependency'  	=> array( 'dropmenu_active_link_color', '==', 'custom' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Custom color for dropdown menu active menu text', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'dropmenu_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Dropdown Menu Background Properties (for all dropdown menus)', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for dropdown menu. This will be applied to all dropdown menus. You can set common style here.', 'devfox').'</div>',
			'default'		=> array(
				'image'			=> '',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output' 	    => '.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item ul.mega-sub-menu, #site-header-menu #site-navigation div.nav-menu > ul > li ul',
        ),
		array(
			'id'      		=> 'dropdown_menu_separator',
			'type'   		=> 'radio',
			'title'   		=> esc_attr__('Separator line between dropdown menu links', 'devfox'),
			'options'  		=> array(
								'grey'  => esc_attr__('Grey color as border color (default)', 'devfox'),
								'white' => esc_attr__('White color as border color (for dark background color)', 'devfox'),
								'no'    => esc_attr__('No separator border', 'devfox'),
							),
			'default'		=> 'grey',
			'after'  	  	=> '<div class="cs-text-muted"><br> <strong>' . esc_attr__('Tips:', 'devfox') . '</strong>
								<ul>
									<li>' . esc_attr__('"Grey color as border color (default):" This is default border view.', 'devfox') . '</li>
									<li>' . esc_attr__('"White color:" Select this option if you are going to select dark background color (for dropdown menu)', 'devfox') . '</li>
									<li>' . esc_attr__('"No separator border:" Completely remove border. This will make your menu totally flat', 'devfox') . '</li>
								</ul></div>',
        ),
		array(
			'id'             => 'megamenu_widget_title',
			'type'           => 'cymolthemes_typography', 
			'title'          => esc_attr__('MegaMenu Widget Title Font', 'devfox'),
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
			'output'         => '#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item > h4.mega-block-title', // An array of CSS selectors to apply this font style to dynamically
			'units'          => 'px', // Defaults to px
			'default'        => array(
				'family'			=> 'Archivo',
				'backup-family'		=> 'Arial, Helvetica, sans-serif',
				'variant'			=> '600',
				'font-size'			=> '15',
				'line-height'		=> '20',
				'letter-spacing'	=> '0',
				'color'				=> '#002c5b',
				'font'				=> 'google',
			),
			'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Font settings for mega menu widget title. NOTE: This will work only if you installed "Max Mega Menu" plugin and also activated in the main (primary) menu', 'devfox').'</div>',
		),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => '',
			'after'  	  	 => '<strong>'.esc_attr__('Individual Drop Down Menu Options', 'devfox').'</strong>',
		),
		array(
			'id'      		=> 'dropmenu_background_1',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('First dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for first dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(1) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(1) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_2',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Second dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for second dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(2) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(2) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_3',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Third dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for third dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(3) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(3) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_4',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Fourth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fourth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(4) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(4) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_5',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Fifth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for fifth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(5) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(5) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_6',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Sixth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for sixth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(6) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(6) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_7',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Seventh dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for seventh dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(7) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(7) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_8',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Eighth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for eighth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(8) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(8) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_9',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Ninth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for ninth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(9) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(9) ul.mega-sub-menu:before',
        ),
		array(
			'id'      		=> 'dropmenu_background_10',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Tenth dropdown menu background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>' . esc_attr__('Set background for tenth dropdown menu.', 'devfox') . '</div>',
			'output' 	    => '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu',
			'bg_layer_class'	=> '#site-header-menu #site-navigation div.nav-menu > ul > li:nth-child(10) ul:before, .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal li.mega-menu-item:nth-child(10) ul.mega-sub-menu:before',
        ),
		
	)
);





// Footer Settings
$cmt_framework_options[] = array(
	'name'   => 'footer_settings', // like ID
	'title'  => esc_attr__('Footer Settings', 'devfox'),
	'icon'   => 'fa fa-arrow-down',
	'fields' => array( // begin: fields
		array(
			'type'			=> 'heading',
			'content'    	=> esc_attr__('Sticky Footer', 'devfox'),
			'after'  	  	=> '<small>'.esc_attr__('Make footer sticky and visible on scrolling at bottom', 'devfox').'</small>',
        ),
		array(
			'id'     		=> 'stickyfooter',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Sticky Footer', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "ON" to enable sticky footer on scrolling at bottom', 'devfox').'</div>',
        ),
		
		// Footer Call To Action Box 
				array(
					'type'       	 => 'heading',
					'content'    	 => esc_attr__('Footer Call To Action Box', 'devfox'),
					'after'  	  	 => '<small>'.esc_attr__('Modify Title, SUb Title, icon, button link, button title etc in footer Call To Action Box here.', 'devfox').'</small>',
				),
				array(
					'id'     		=> 'footer_cta_box',
					'type'   		=> 'switcher',
					'title'   		=> esc_attr__('Show Footer Call To Action', 'devfox'),
					'default' 		=> false,
					'label'  		=> '<div class="cs-text-muted cs-text-desc">'.esc_attr__('Set this option "ON" to enable call to action box in footer', 'devfox').'</div>',
				),
				array(
					'id'			=> 'footer_cta_column_layout',
					'type' 			=> 'image_select',//cymolthemes_pre_color_packages
					'title'			=> esc_attr__('Footer CTA Columns', 'devfox'),
					'options'      	=> array(
							'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
							'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
							'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
							'2_6_4'   => get_template_directory_uri() . '/inc/images/footer_col_2_6_4.png',
					),
					'default'		=> '6_6',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer CTA Column layout.', 'devfox').'</div>',
				),
				array(
					'id'     		=> 'footer_cta_box_column1',
					'type'    		=> 'textarea',
					'default' 		=> '',
					'shortcode'		=> true,
					'title'   		=> esc_attr__('CTA First Column Content', 'devfox'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on first column', 'devfox') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column2',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Second Column Content', 'devfox'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on second column', 'devfox') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'     		=> 'footer_cta_box_column3',
					'type'    		=> 'textarea',
					'shortcode'		 => true,
					'title'   		=> esc_attr__('CTA Third Column Content', 'devfox'),
					'after'  		=> '<div class="cs-text-muted cs-text-desc">' . esc_attr__('This content will appear on third column', 'devfox') . '</div>',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
				),
				array(
					'id'            => 'footer_cta_bg_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Background Color', 'devfox'),
					'options'  		=> array(
										'darkgrey'   => esc_attr__('Dark grey', 'devfox'),
										'grey'       => esc_attr__('Grey', 'devfox'),
										'white'      => esc_attr__('White', 'devfox'),
										'skincolor'  => esc_attr__('Skincolor', 'devfox'),
										'custom'     => esc_attr__('Custom Color', 'devfox'),
									),
					'default'       => 'skincolor',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer CTA background color', 'devfox').'</div>',
				),
				array(
					'id'     		 => 'footer_cta_bg_custom_color',
					'type'   		 => 'color_picker',
					'title'  		 => esc_attr__('Footer CTA Custom Background Color', 'devfox' ),
					'default'		 => 'grey',
					'dependency'  	 => array( 'footer_cta_box|footer_cta_bg_color', '==|==', 'true|custom' ),//Multiple dependency
					'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Custom background color for Footer CTA', 'devfox').'</div>',
				),
				array(
					'id'            => 'footer_cta_text_color',
					'type'          => 'select',
					'title'         =>  esc_attr__('Footer CTA Text Color', 'devfox'),
					'options'  => array(
									'white'     => esc_attr__('White', 'devfox'),
									'dark'      => esc_attr__('Dark', 'devfox'),
									'skincolor' => esc_attr__('Skin Color', 'devfox'),
								),
					'default'       => 'white',
					'dependency' 	=> array( 'footer_cta_box', '==', 'true' ),
					'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
				),
		// Footer common background
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Background (full footer elements)', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('This background property will apply to full footer area. You can add', 'devfox').'</small>',
		),
		array(
			'id'            => 'full_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color (all area)', 'devfox'),
			'options'		=> array(
				'transparent' => esc_attr__('Transparent', 'devfox'),
				'darkgrey'    => esc_attr__('Dark grey', 'devfox'),
				'grey'        => esc_attr__('Grey', 'devfox'),
				'white'       => esc_attr__('White', 'devfox'),
				'skincolor'   => esc_attr__('Skincolor', 'devfox'),
				'custom'      => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'devfox').'</div>',
        ),
		array(
			'id'      		 => 'full_footer_bg_all',
			'type'    		 => 'cymolthemes_background',
			'title'  		 => esc_attr__('Footer Background (all area)', 'devfox' ),
			'after'  		 => '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'devfox').'</div>',
			'default'		 => array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
			),
			'output' 	     => '.footer',
			'output_bglayer' => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'full_footer_bg_color',   // color dropdown to decide which color
        ),
		
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('First Footer Widget Area', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer widget area', 'devfox').'</small>',
		),
		array(
			'id'			=> 'first_footer_column_layout',
			'type' 			=> 'image_select',//cymolthemes_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'devfox'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'9_3'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'3_9'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
					'4_2_2_4' => get_template_directory_uri() . '/inc/images/footer_col_4_2_2_4.png',
			),
			'default'		=> '3_9',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'devfox').'</div>',
        ),
		
		array(
			'id'            => 'first_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'devfox'),
			'options'  => array(
				'transparent' => esc_attr__('Transparent', 'devfox'),
				'darkgrey'    => esc_attr__('Dark grey', 'devfox'),
				'grey'        => esc_attr__('Grey', 'devfox'),
				'white'       => esc_attr__('White', 'devfox'),
				'skincolor'   => esc_attr__('Skincolor', 'devfox'),
				'custom'      => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'custom',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'devfox').'</div>',
        ),
		array(
			'id'      			=> 'first_footer_bg_all',
			'type'    			=> 'cymolthemes_background',
			'title'  			=> esc_attr__('Footer Background', 'devfox' ),
			'after'  			=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'devfox').'</div>',
			'default'			=> array(
				'repeat'			=> 'no-repeat',
				'position'			=> 'center bottom',
				'attachment'		=> 'scroll',
				'size'				=> 'cover',
				'color'				=> '#003063',
			),
			'output'			=> '.first-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'first_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'first_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'devfox'),
			'options'  		=> array(
								'white'  => esc_attr__('White', 'devfox'),
								'dark'   => esc_attr__('Dark', 'devfox'),
							),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
        ),

		// Second Footer Widget Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Second Footer Widget Area', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for second footer widget area', 'devfox').'</small>',
		),
		array(
			'id'			=> 'second_footer_column_layout',
			'type' 			=> 'image_select',//cymolthemes_pre_color_packages
			'title'			=> esc_attr__('Footer Widget Columns', 'devfox'),
			'options'      	=> array(
					'12'      => get_template_directory_uri() . '/inc/images/footer_col_12.png',
					'6_6'     => get_template_directory_uri() . '/inc/images/footer_col_6_6.png',
					'4_4_4'   => get_template_directory_uri() . '/inc/images/footer_col_4_4_4.png',
					'3_3_3_3' => get_template_directory_uri() . '/inc/images/footer_col_3_3_3_3.png',
					'8_4'     => get_template_directory_uri() . '/inc/images/footer_col_8_4.png',
					'4_8'     => get_template_directory_uri() . '/inc/images/footer_col_4_8.png',
					'6_3_3'   => get_template_directory_uri() . '/inc/images/footer_col_6_3_3.png',
					'3_3_6'   => get_template_directory_uri() . '/inc/images/footer_col_3_3_6.png',
					'8_2_2'   => get_template_directory_uri() . '/inc/images/footer_col_8_2_2.png',
					'2_2_8'   => get_template_directory_uri() . '/inc/images/footer_col_2_2_8.png',
					'6_2_2_2' => get_template_directory_uri() . '/inc/images/footer_col_6_2_2_2.png',
					'2_2_2_6' => get_template_directory_uri() . '/inc/images/footer_col_2_2_2_6.png',
			),
			'default'		=> '3_3_3_3',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Footer Column layout View for widgets.', 'devfox').'</div>',
        ),
		array(
			'id'            => 'second_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'devfox'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'devfox'),
							'darkgrey'    => esc_attr__('Dark grey', 'devfox'),
							'grey'        => esc_attr__('Grey', 'devfox'),
							'white'       => esc_attr__('White', 'devfox'),
							'skincolor'   => esc_attr__('Skincolor', 'devfox'),
							'custom'      => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'transparent',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'second_footer_bg_all',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Footer Background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'devfox').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'scroll',
				'size'			=> 'auto',
				'color'			=> '#f5f8fa',
			),
			'output' 	    => '.second-footer',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'second_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'second_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'devfox'),
			'options'  		=> array(
				'white'  		=> esc_attr__('White', 'devfox'),
				'dark'   		=> esc_attr__('Dark', 'devfox'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
        ),

		// Footer Text Area
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Footer Text Area', 'devfox'),
			'after'  	  	 => '<small>'.esc_attr__('Options to change settings for footer text area. This contains copyright info', 'devfox').'</small>',
		),
		array(
			'id'            => 'bottom_footer_bg_color',
			'type'          => 'select',
			'title'         =>  esc_attr__('Footer Background Color', 'devfox'),
			'options'  => array(
							'transparent' => esc_attr__('Transparent', 'devfox'),
							'darkgrey'    => esc_attr__('Dark grey', 'devfox'),
							'grey'        => esc_attr__('Grey', 'devfox'),
							'white'       => esc_attr__('White', 'devfox'),
							'skincolor'   => esc_attr__('Skincolor', 'devfox'),
							'custom'      => esc_attr__('Custom Color', 'devfox'),
			),
			'default'       => 'darkgrey',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Footer background color', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'bottom_footer_bg_all',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Footer Background', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Footer background image', 'devfox').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'center center',
				'attachment'	=> 'fixed',
				'color'			=> '#003063',
			),
			'output' 	    => '.site-footer .bottom-footer-text',
			'output_bglayer'    => true,  // apply color to bglayer class div inside this , default: true
			'color_dropdown_id' => 'bottom_footer_bg_color',   // color dropdown to decide which color
        ),
		array(
			'id'           	=> 'bottom_footer_text_color',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Text Color', 'devfox'),
			'options'  		=> array(
				'white'			=> esc_attr__('White', 'devfox'),
				'dark'			=> esc_attr__('Dark', 'devfox'),
			),
			'default'      	=> 'white',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Dark" color if you are going to select light color in above option', 'devfox').'</div>',
        ),
		array(
          'id'      		=> 'footer_copyright_left',
          'type'    		=> 'wysiwyg',
          'title'  			=>  esc_attr__('Footer Text Left', 'devfox'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'devfox')
		  . '<br>   <code>[cmt-site-url]</code> <code>[cmt-site-title]</code> <code>[cmt-site-tagline]</code> <code>[cmt-current-year]</code> <code>[cmt-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s  about details for each shortcode.','devfox') , '<a href="'. esc_url('http://devfox.cymolthemesthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
		  'default'         => cymolthemes_wp_kses('Copyright &copy; 2022 <a href="' . site_url() . '">' . get_bloginfo('name') . '</a>. All rights reserved.'),
        ),
		array(
          'id'       		=> 'footer_copyright_right',
          'type'     		=> 'wysiwyg',
          'title'   		=>  esc_attr__('Footer Text Right', 'devfox'),
		  'after'  			=> '<div class="cs-text-muted"><br>'. esc_attr__('You can use the following shortcodes in your footer text:', 'devfox')
		  . '<br>   <code>[cmt-site-url]</code> <code>[cmt-site-title]</code> <code>[cmt-site-tagline]</code> <code>[cmt-current-year]</code> <code>[cmt-footermenu]</code> <br><br> '
		  . sprintf( esc_attr__('%1$s Click here to know more%2$s about details for each shortcode.','devfox') , '<a href="'. esc_url('http://devfox.cymolthemesthemes.com/documentation/shortcodes.html') .'" target="_blank">' , '</a>'  ) .'</div>',
        ),
		
	)
);


// Login Page Settings
$cmt_framework_options[] = array(
	'name'   => 'login_page_settings', // like ID
	'title'  => esc_attr__('Login Page Settings', 'devfox'),
	'icon'   => 'fa fa-lock',
	'fields' => array( // begin: fields
		array(
			'type'       	 => 'heading',
			'content'    	 => esc_attr__('Login Page Settings', 'devfox'),
		),
		array(
			'id'      		=> 'login_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Background Properties', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Specify the type of background object', 'devfox').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/login-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'right bottom',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#f5f5f5',
			),
			'output'   		=> '.loginpage',
        ),
	)
);


// Blog Settings
$cmt_framework_options[] = array(
	'name'   => 'blog_settings', // like ID
	'title'  => esc_attr__('Blog Settings', 'devfox'),
	'icon'   => 'fa fa-pencil',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blog section', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'blog_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blog Excerpt Limit (in words)', 'devfox' ),
			'default'		=> '0',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'devfox') . '<br><strong>' . esc_attr__('TIP:', 'devfox') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'devfox') . '</div>',
        ),
		array(
			'id'     		=> 'blogclassic_show_comment_number',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show "Total Comment" with icon', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide Total Comment with icon. You can hide it if you don\'t want to show it.', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'blog_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"Read More" Link Text', 'devfox'),
			'default' 		=> esc_attr__('Read More', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Text for the Read More link on the Blog page', 'devfox').'</div>',
		),
		
		array(
			'id'           	=> 'blog_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog view', 'devfox'),
			'options'  		=> array(
				'classic'			=> get_template_directory_uri() . '/inc/images/blog-view-style1.png',
				'box'				=> get_template_directory_uri() . '/inc/images/blog-view-style4.png',
			),
			'default'      	=> 'classic',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. Also we have total three differnt look for classic view. Select them in this option and see your BLOG page. For "Box view", you can select two, three or four columns box view too.', 'devfox').'</div>',
			
        ),
		
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Blog box style view settings. This is because you selected "BOX VIEW" in above option.', 'devfox').'</small>',
		),
		array(
			'id'           	=> 'blogbox_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Blog box column', 'devfox'),
			'options'  		=> array(
				'one'			=> esc_attr__('One Column View', 'devfox'),
				'two'			=> esc_attr__('Two Column view', 'devfox'),
				'three'			=> esc_attr__('Three Column view (default)', 'devfox'),
				'four'			=> esc_attr__('Four Column view', 'devfox'),
			),
			'default'      	=> 'one',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'devfox').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'           	=> 'blogbox_view',
			'type'         	=> 'image_select',
			'title'        	=>  esc_attr__('Blog box template', 'devfox'),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/blogbox-style-one.png',
				'styletwo'		=> get_template_directory_uri() . '/inc/images/blogbox-style-two.png',
				'stylethree'		=> get_template_directory_uri() . '/inc/images/blogbox-style-three.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select blog view. The default view is classic list view. You can select two, three or four column blog view from here', 'devfox').'</div>',
			'dependency'    => array( 'blog_view_box', '==', 'true' ),
        ),
		array(
			'id'     		=> 'blogbox_text_limit',
			'type'   		=> 'number',
			'title'         => esc_attr__('Blogbox Excerpt Limit (in words)', 'devfox' ),
			'default'		=> '70',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . esc_attr__('Set limit for small description. Select how many words you like to show.', 'devfox') . '<br><strong>' . esc_attr__('TIP:', 'devfox') . '</strong> ' . esc_attr__('Select "0" (zero) to show excerpt or content before READ MORE break.', 'devfox') . '</div>',
        ),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Single Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Settings for single view of blog post.', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'post_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'devfox'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'devfox').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'post_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'devfox'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'devfox'),
					'twitter'     => esc_attr__('Twitter', 'devfox'),
					'gplus'       => esc_attr__('Google Plus', 'devfox'),
					'pinterest'   => esc_attr__('Pinterest', 'devfox'),
					'linkedin'    => esc_attr__('LinkedIn', 'devfox'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'devfox'),
					'tumblr'      => esc_attr__('Tumblr', 'devfox'),
					'reddit'      => esc_attr__('Reddit', 'devfox'),
					'digg'        => esc_attr__('Digg', 'devfox'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>'.esc_attr__('The selected social service icon will be visible on single Post so user can share on social sites.', 'devfox').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blog Classic Meta Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Settings for meta data for Blog classic view.', 'devfox').'</small>',
		),
		array(
			'id'      => 'blogclassic_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','devfox'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'devfox').'</div>',
			'default' => array(
				'enabled' => array(
					'author'	=> esc_attr__('Author', 'devfox'),						
					'date'		=> esc_attr__('Date', 'devfox'),
					'comment'   => esc_attr__('Comments', 'devfox'),
				),
				'disabled' => array(	
					'tag'		=> esc_attr__('Tags', 'devfox'),
					'cat'       => esc_attr__('Categories', 'devfox'),					
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'devfox'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'devfox'),
		),
		array(
			'id'     		=> 'blogclassic_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'devfox'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'devfox'). ' <a href="' . esc_url('https://codex.wordpress.org/Formatting_Date_and_Time') . '" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'devfox') . '</a></div>',
		),
		array(
			'id'     		=> 'blogclassic_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'blogclassic_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'devfox').'</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Blogbox Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Settings for Blogbox (Visual Composer element)', 'devfox').'</small>',
		),
		array(
			'id'      => 'blogbox_meta_list',
			'type'    => 'sorter',
			'title'   => esc_attr__('Classic Blog - Meta Details','devfox'),
			'after'   => '<div class="cs-text-muted"><br>'.esc_attr__('Select which data you like to show in post meta details', 'devfox').'</div>',
			'default' => array(
				'enabled' => array(	
					'comment' 	=> esc_attr__('Comments', 'devfox'),	
					'author'	=> esc_attr__('Author', 'devfox'),		
				),
				'disabled' => array(	
					'date'    	=> esc_attr__('Date', 'devfox'),
					'tag'  		=> esc_attr__('Tags', 'devfox'),	
					'cat'    	=> esc_attr__('Categories', 'devfox'),			
				),
			),
			'enabled_title'  => esc_attr__('Active Meta Details', 'devfox'),
			'disabled_title' => esc_attr__('Hidden Meta Details', 'devfox'),
		),
		array(
			'id'     		=> 'blogbox_meta_dateformat',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Date Meta - format', 'devfox'),
			'default' 		=> '',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set date format.', 'devfox'). ' <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . esc_attr__('Documentation on date and time formatting.', 'devfox') . '</a></div>',
		),
		array(
			'id'     		=> 'blogbox_meta_taglink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Tag list - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in tags', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_catlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Category list - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in categories', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'blogbox_meta_authorlink',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Author Name - Add link?', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Add link in author name', 'devfox').'</div>',
        ),
		
	)
);



// Portfolio Settings
$cmt_framework_options[] = array(
	'name'   => 'portfolio_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'devfox'), $pf_title_singular ),
	'icon'   => 'fa fa-th-large',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'devfox'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'devfox'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_project_details',
			'type'    		=> 'text',
			'default' 		=> esc_attr__('Gallery Info', 'devfox'),
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'devfox'), $pf_title_singular ),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the list styled "%1$s Details" area. (For single %1$s only)', 'devfox'), $pf_title_singular ) . '</div>',
		),
		array(
			'id'      		=> 'portfolio_viewstyle',
			'type'   		=> 'radio',
			'title'   		=> sprintf( esc_attr__('Single %s View Style', 'devfox'), $pf_title_singular ),
			'options' 		=> array( 
				'left'			=> esc_attr__('Left image and right content (default)', 'devfox'),
				'top'			=> esc_attr__('Top image and bottom content', 'devfox'),
				'full'			=> esc_attr__('No image and full-width content (without details box)', 'devfox'),
				'full-withimg'  => esc_attr__('Top image and full-width content (without details box)', 'devfox'),
			),
			'default'		=> 'left',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'devfox'), $pf_title_singular ) . '</div>',
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Related %1$s (on single %2$s) Settings', 'devfox'), $pf_title, $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for related %1$s section on single %2$s page.', 'devfox'), $pf_title, $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_related',
			'type'   		=> 'switcher',
			'title'   		=> sprintf( esc_attr__('Show Related %s', 'devfox'), $pf_title ),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select ON to show related %1$s on single %2$s page', 'devfox'), $pf_title, $pf_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'portfolio_related_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Related %s Title', 'devfox'), $pf_title ),
			'default' 		=> esc_attr__('Related Projects', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Releated %1$s area. (For single %2$s only)', 'devfox'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
		),
		array(
			'id'           	=> 'portfolio_related_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('Related %s Boxes template', 'devfox'), $pf_title ),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/portfolio-style2.png',
				'styletwo'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'devfox'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'portfolio_related_column',
			'type'         	=> 'select',
			'title'        	=> esc_attr__('Select column', 'devfox'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'devfox'),
					'three'   => esc_attr__('Three column', 'devfox'),
					'four'    => esc_attr__('Four column', 'devfox'),
					'five'    => esc_attr__('Five column', 'devfox'),
					'six'     => esc_attr__('Six column', 'devfox'),
				),
			//'class'        	=> 'chosen',
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show in Related %s area.', 'devfox'), $pf_title ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'portfolio_related_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('Show %s', 'devfox'), $pf_title ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %2$s Boxes you like to show in Related %1$s area.', 'devfox'), $pf_title, $pf_title_singular ) . '</div>',
			'dependency'    => array( 'portfolio_show_related', '==', 'true' ),
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s List Details Settings', 'devfox'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change each line of list details for single %1$s. Here you can select how many lines will be appear in the details of a single %1$s', 'devfox'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'              => 'pf_details_line',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'devfox'),
			'info'            => sprintf( esc_attr__('This will be added a new line in DETAILS box on single %s view.', 'devfox'), $pf_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'devfox'),
			'accordion_title' => esc_attr__('Details for the line', 'devfox'),
			
			'default'		 =>  array (
				array (
					'pf_details_line_title' => 'Project',
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => ' Category',
					'data' => 'custom',
				),
				array (
					'pf_details_line_title' => '  Clients',
					'data' => 'custom',
				),				
			),



			'fields'          => array(
				array(
					'id'     		=> 'pf_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'devfox'),
					'default' 		=> esc_attr__('Location', 'devfox'),
					'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the first line of the details in single %s', 'devfox'), $pf_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'devfox').'</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'select',
					'title'   		=> esc_attr__('Line Input Type', 'devfox'),
					'options' 		=> array(
							'custom'        => esc_attr__('Custom text (single line)', 'devfox'),
							'multiline'     => esc_attr__('Custom text with multiline', 'devfox'),
							'date'          => sprintf( esc_attr__('Show date of the %s', 'devfox'), $pf_title_singular ),
							'category'      => sprintf( esc_attr__('Show Category (without link) of the %s', 'devfox'), $pf_title_singular ),
							'category_link' => sprintf( esc_attr__('Show Category (with link) of the %s', 'devfox'), $pf_title_singular ),
							'tag'           => sprintf( esc_attr__('Show Tags (without link) of the %s', 'devfox'), $pf_title_singular ),
							'tag_link'      => sprintf( esc_attr__('Show Tags (with link) of the %s', 'devfox'), $pf_title_singular ),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select view for single %s', 'devfox'), $pf_title_singular ) . '</div>',
				),
			)
        ),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Select social sharing service for single %s', 'devfox'), $pf_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Select social service so site visitors can share the single %s on different social services', 'devfox'), $pf_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'portfolio_show_social_share',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Social Share box', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Show or hide social share box.', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'portfolio_social_share_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Social Share Title', 'devfox'),
			'default' 		=> esc_attr__('Share', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This text will appear in the social share box as title', 'devfox').'</div>',
			'dependency'    => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'        => 'portfolio_social_share_services',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select Social Share Service', 'devfox'),
			'options'   => array(
					'facebook'    => esc_attr__('Facebook', 'devfox'),
					'twitter'     => esc_attr__('Twitter', 'devfox'),
					'gplus'       => esc_attr__('Google Plus', 'devfox'),
					'pinterest'   => esc_attr__('Pinterest', 'devfox'),
					'linkedin'    => esc_attr__('LinkedIn', 'devfox'),
					'stumbleupon' => esc_attr__('Stumbleupon', 'devfox'),
					'tumblr'      => esc_attr__('Tumblr', 'devfox'),
					'reddit'      => esc_attr__('Reddit', 'devfox'),
					'digg'        => esc_attr__('Digg', 'devfox'),
			),
			'after'    	 => '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('The selected social service icon will be visible on single %s so user can share on social sites.', 'devfox'), $pf_title_singular ) . '</div>',
			'dependency' => array( 'portfolio_show_social_share', '==', 'true' ),
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Title', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This button will appear after the social share links.', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'portfolio_single_top_btn_link',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Button Link', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('This button will appear after the social share links.', 'devfox').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'devfox'), $pf_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'devfox'), $pf_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'pfcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'devfox'), $pf_title_singular ),
			'options'       => cymolthemes_global_portfolio_template_list(),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/portfolio-style1.png',
				'styletwo'			=> get_template_directory_uri() . '/inc/images/portfolio-style2.png',
				'stylethree'			=> get_template_directory_uri() . '/inc/images/portfolio-style3.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'devfox'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'pfcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'devfox'),
			'options'  => array(
					'two'     => esc_attr__('Two column', 'devfox'),
					'three'   => esc_attr__('Three column', 'devfox'),
					'four'    => esc_attr__('Four column', 'devfox'),
					'five'    => esc_attr__('Five column', 'devfox'),
					'six'     => esc_attr__('Six column', 'devfox'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'devfox'), $pf_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'pfcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'devfox' ), $pf_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'devfox'), $pf_title_singular, $pf_cat_title_singular ) . '</div>',
        ),
	)
);


// Team Member Settings
$cmt_framework_options[] = array(
	'name'   => 'team_member_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'devfox'), $team_member_title_singular ),
	'icon'   => 'fa fa-users',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr_x('%s\'s Extra Details Settings', 'Team Member', 'devfox'), $team_member_title_singular ),
			'after'  		=> '<small>'.sprintf( esc_attr_x('You can fill this extra details and the details will be available on single %s page only. This will be shown as LIST with title and value design.', 'Team Member', 'devfox'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'              => 'team_extra_details_lines',
			'type'            => 'group',
			'title'           => esc_attr__('Line Details', 'devfox'),
			'info'            => sprintf( esc_attr_x('This will be added a new line in DETAILS box on single %s.', 'Team Member', 'devfox'), $team_member_title_singular ),
			'button_title'    => esc_attr__('Add New Line', 'devfox'),
			'accordion_title' => esc_attr__('Details for the line', 'devfox'),
			'fields'          => array(
				array(
					'id'     		=> 'team_extra_details_line_title',
					'type'    		=> 'text',
					'title'   		=> esc_attr__('Line Title', 'devfox'),
					'default' 		=> esc_attr__('Experiance', 'devfox'),
					'after'  		=> '<div class="cs-text-muted"><br>'. sprintf( esc_attr_x('Title for the first line in the DETAILS box in single %s', 'Team Member', 'devfox'), $team_member_title_singular ) . '<br> ' . esc_attr__('Leave this field empty to remove the line.', 'devfox').'</div>',
				),
				
				array(
					'id'      		=> 'data',
					'type'   		=> 'radio',
					'title'   		=> esc_attr__('Line Data Type', 'devfox'),
					'options' 		=> array(
							'custom'  => esc_attr__('Custom text (add anything)', 'devfox'),
							'url'     => esc_attr__('URL link', 'devfox'),
							'email'   => esc_attr__('Email address', 'devfox'),
							'phone'   => esc_attr__('Phone number', 'devfox'),
					),
					'default'		=> 'custom',
					'after'  	  	=> '<div class="cs-text-muted"><br>'.sprintf( esc_attr_x('Select view for single %s', 'Team Member', 'devfox'), $team_member_title_singular ).'</div>',
				),
			),
				'default' =>   array (
					array (
						'team_extra_details_line_title' => 'Age ',
						'data' => 'custom',
					),
					array (
						'team_extra_details_line_title' => 'Experience ',
						'data' => 'custom',
					),
				),
			
        ),
		
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'devfox'), $team_group_title_singular),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s page', 'devfox'), $team_group_title_singular) . '</small>',
		),
		array(
			'id'           	=> 'teamcat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'devfox'), $team_member_title_singular ),
			'options'  		=> array(
				'styleone'			=> get_template_directory_uri() . '/inc/images/teambox-style1.png',
			),
			'default'      	=> 'styleone',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select %1$s\'s Box view on %2$s page.', 'devfox'), $team_member_title_singular, $team_group_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'teamcat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'devfox'),
			'options'  => array(
					'two'   => esc_attr__('Two column', 'devfox'),
					'three' => esc_attr__('Three column', 'devfox'),
					'four'  => esc_attr__('Four column', 'devfox'),
				),
			'default'      	=> 'three',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf(esc_attr__('Select column to show %s', 'devfox'), $team_member_title ) . '</div>',
        ),
		array(
			'id'     		=> 'teamcat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to Show', 'devfox' ), $team_member_title  ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('How many %s you like to show on category page', 'devfox'), $team_member_title  ) . '</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Single %s Settings', 'devfox'), $team_member_title_singular ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Options to change settings for single %s', 'devfox'), $team_member_title_singular ) . '</small>',
		),
		array(
			'id'     		=> 'teammember_detailsbox_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('%s Details Box Title', 'devfox'), $team_member_title_singular ),
			'default' 		=> esc_attr__('Personal Information', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Title for the Member "%1$s Details" area. (For single %1$s only)', 'devfox'), $team_member_title_singular ) . '</div>',
		),
		
	)
);


// Service CPT Settings
$cmt_framework_options[] = array(
	'name'   => 'service_settings', // like ID
	'title'  => sprintf( esc_attr__('%s Settings', 'devfox'), $service_title_singular ),
	'icon'   => 'fa fa-gear',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('%s Settings', 'devfox'), $service_cat_title ),
			'after'  		=> '<small>' . sprintf( esc_attr__('Settings for %s', 'devfox'), $service_cat_title ) . '</small>',
		),
		array(
			'id'           	=> 'services_cat_view',
			'type'         	=> 'image_select',
			'title'        	=> sprintf( esc_attr__('%s Boxes template', 'devfox'), $service_title_singular ),
			'options'  		=> array(
				'styletwo'			=> get_template_directory_uri() . '/inc/images/service-view-style2.png',
			),
			'default'      	=> 'styletwo',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select %1$s Box view on single %2$s page.', 'devfox'), $service_title_singular, $service_cat_title_singular ) . '</div>',
			'radio'      	=> true,
        ),
		array(
			'id'           	=> 'services_cat_column',
			'type'         	=> 'select',
			'title'        	=>  esc_attr__('Select column', 'devfox'),
			'options'  => array(
				'two'     => esc_attr__('Two column', 'devfox'),
				'three'   => esc_attr__('Three column', 'devfox'),
				'four'    => esc_attr__('Four column', 'devfox'),
				'five'    => esc_attr__('Five column', 'devfox'),
				'six'     => esc_attr__('Six column', 'devfox'),
			),
			'default'      	=> 'two',
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('Select column to show on %s page.', 'devfox'), $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'services_cat_show',
			'type'   		=> 'number',
			'title'         => sprintf( esc_attr__('%s to show', 'devfox' ), $service_title_singular ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted cs-text-desc"><br>' . sprintf( esc_attr__('How many %1$s you like to show on %2$s page', 'devfox'), $service_title_singular, $service_cat_title_singular ) . '</div>',
        ),
		array(
			'id'     		=> 'service_readmore_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('"MORE DETAILS" Link Text', 'devfox'),
			'default' 		=> esc_attr__('Learn More', 'devfox'),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Text for the More Details link on the Servicebox', 'devfox').'</div>',
		),
	)
);



// Creating Client Groups array 
$client_groups = array();
if( isset($devfox_theme_options['client_groups']) && is_array($devfox_theme_options['client_groups']) ){

foreach( $devfox_theme_options['client_groups'] as $key => $val ){

	$name = $val['client_group_name'];
	$slug = str_replace(' ', '_', strtolower($name));
	$client_groups[$slug] = $name;
}

}




// Error 404 Page Settings
$cmt_framework_options[] = array(
	'name'   => 'error404_page_settings', // like ID
	'title'  => esc_attr__('Error 404 Page Settings', 'devfox'),
	'icon'   => 'fa fa-exclamation-triangle',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Error 404 Page Settings', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Settings that determine how the error page will be looking', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'error404_iamgebox_text',
			'type'    		=> 'textarea',
			'title'   		=> esc_attr__('Top Description text', 'devfox'),
			'shortcode'		 => true,
			'default' 		=> '<img class="img-responsive" src="'. get_template_directory_uri() .'/images/404.png">',
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown top of Big heading.', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'error404_big_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Big heading text', 'devfox'),
			'default' 		=> esc_attr__('404 Error', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This text will be shown with big font size below icon', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'error404_medium_text',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Description text', 'devfox'),
			'default' 		=> esc_attr__('This page may have been moved or deleted. Be sure to check your spelling.', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This file may have been moved or deleted. Be sure to check your spelling', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'error404_search',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Search Form', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Set this option "YES" to show search form on the 404 page', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'error404_page_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Content area background for 404 page only', 'devfox' ),
			'after'  		=> '<div class="cs-text-muted cs-text-desc"><br>'.esc_attr__('Set background for 404 page content area only.', 'devfox').'</div>',
			'default'		=> array(
				'repeat'		=> 'no-repeat',
				'position'		=> 'right bottom',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output' 	    => '.error404 .site-content-wrapper',
		),	
		
	)
);


// Search Page Settings
$cmt_framework_options[] = array(
	'name'   => 'search_page_settings', // like ID
	'title'  => esc_attr__('Search Page Settings', 'devfox'),
	'icon'   => 'fa fa-search',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Search Page Settings', 'devfox'),
		),
		array(
			'id'       		 => 'searchnoresult',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Content of the search page if no results found', 'devfox'),
			'shortcode'		 => true,
			'after'  	     => '<div class="cs-text-muted"><br>'. esc_attr__('Specify the content of the page that will be displayed if while search no results found', 'devfox') . '<br> ' . esc_attr__('HTML tags and shortcodes are allowed', 'devfox').'</div>',
			'default'  		 => cymolthemes_wp_kses( urldecode('%3Ch3%3ENothing+found%3C%2Fh3%3E%3Cp%3ESorry%2C+but+nothing+matched+your+search+terms.+Please+try+again+with+some+different+keywords.%3C%2Fp%3E') ),
        ),
		
	)
);


// Sidebar Settings
$cmt_framework_options[] = array(
	'name'   => 'sidebar_settings', // like ID
	'title'  => esc_attr__('Sidebar Settings', 'devfox'),
	'icon'   => 'fa fa-pause',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Settings', 'devfox'),
		),
		array(
			'id'              => 'custom_sidebars',
			'type'            => 'group',
			'title'           => esc_attr__('Custom Sidebars', 'devfox'),
			'info'            => esc_attr__('Specify the custom sidebars that can be used in the pages for a widgets', 'devfox'),
			'button_title'    => esc_attr__('Add New Sidebar', 'devfox'),
			'accordion_title' => esc_attr__('Custom Sidebar Properties', 'devfox'),
			'fields'          => array(
					array(
						'id'     		=> 'custom_sidebar',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Custom Sidebar Name', 'devfox'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write custom sidebar name here', 'devfox').'</div>',
					),

			)
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Sidebar Position', 'devfox'),
			'after'  		=> '<small>'.esc_attr__('Select sidebar position for different sections', 'devfox').'</small>',
		),
		array(
			'id'           	=> 'sidebar_post',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Blog Post/Category Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for blog post. Also for Category, Tag and Archive view too. Technically, related to all blog post view.', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_page',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Standard Pages Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for standard pages', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_team_member_group',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Team member Group Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for Team Member single and Team Member Group.', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'devfox'), $pf_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'devfox'), $pf_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_portfolio_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'devfox'), $pf_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'devfox'), $pf_cat_title_singular ) . '</div>',
        ),
				array(
			'id'           	=> 'sidebar_service',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'devfox'), $service_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s single pages.', 'devfox'), $service_title_singular ) . '</div>',
        ),
		array(
			'id'           	=> 'sidebar_service_category',
			'type'        	=> 'image_select',
			'title'       	=> sprintf( esc_attr__('%s Sidebar', 'devfox'), $service_cat_title_singular ),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'left',
			'after'  		=> '<div class="cs-text-muted"><br>' . sprintf( esc_attr__('Select one of layouts for %s view.', 'devfox'), $service_cat_title_singular ) . '</div>',
        ),
		
		array(
			'id'           	=> 'sidebar_search',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Search Page Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'no',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select one of layouts for search page', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_woocommerce',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('WooCommerce Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for WooCommerce Shop and Single Product page', 'devfox').'</div>',
        ),
		array(
			'id'           	=> 'sidebar_events',
			'type'        	=> 'image_select',
			'title'       	=> esc_attr__('Events Sidebar', 'devfox'),
			'options'     	=> array(
				'no'          => get_template_directory_uri() . '/inc/images/layout_no_side.png',
				'left'        => get_template_directory_uri() . '/inc/images/layout_left.png',
				'right'       => get_template_directory_uri() . '/inc/images/layout_right.png',
				'both'        => get_template_directory_uri() . '/inc/images/layout_both.png',
				'bothleft'    => get_template_directory_uri() . '/inc/images/layout_left_both.png',
				'bothright'   => get_template_directory_uri() . '/inc/images/layout_right_both.png',
			),
			'radio'       	=> true,
			'default'      	=> 'right',
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select sidebar position for Events pages.', 'devfox') . ' ' . sprintf( esc_attr__('This is valid for %s plugin only','devfox') , '<a href="'. esc_url('https://wordpress.org/plugins/the-events-calendar/') .'" target="_blank">' . esc_attr__('The Events Calendar', 'devfox').'</a>' ).'</div>',
        ),
	)
);


// Getting social list
$global_social_list = cymolthemes_shared_social_list();
	
// social service list
$sociallist = array_merge(
	$global_social_list,
	array('rss'     => 'Rss Feed')
);

// Social Links
$cmt_framework_options[] = array(
	'name'   => 'social_links', // like ID
	'title'  => esc_attr__('Social Links', 'devfox'),
	'icon'   => 'fa fa-share-square-o',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Social Links', 'devfox'),
			'after'			=> '<small>' . sprintf(__('You can use %1$s[cmt-social-links]%2$s shortcode to show social links.', 'devfox'), '<code>' , '</code>' ) . '</small>',
		),
		array(
			'id'              => 'social_icons_list',
			'type'            => 'group',
			'title'           => esc_attr__('Social Links', 'devfox'),
			'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder as per your choice', 'devfox'),
			'button_title'    => esc_attr__('Add New Social Service', 'devfox'),
			'accordion_title' => esc_attr__('Social Service Properties', 'devfox'),
			'fields'          => array(
					array(
						'id'            => 'social_service_name',
						'type'          => 'select',
						'title'         =>  esc_attr__('Social Service', 'devfox'),
						'options'  		=> $sociallist,
						'default'       => 'twitter',
						'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select Social icon from here', 'devfox').'</div>',
					),
					array(
						'id'     		=> 'social_service_link',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Link to Social icon selected above', 'devfox'),
						'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'devfox').'</div>',
						'dependency' 	=> array( 'social_service_name', '!=', 'rss' ),
					),

			),
			'default' => array (
				
				array (
					'social_service_name' => 'facebook',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'twitter',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'flickr',
					'social_service_link' => '#',
				),
				array (
					'social_service_name' => 'linkedin',
					'social_service_link' => '',
				),
				
			),
        ),
		
		
		
	),	
);

// WooCommerce Settings
$cmt_framework_options[] = array(
	'name'   => 'woocommerce_settings', // like ID
	'title'  => esc_attr__('WooCommerce Settings', 'devfox'),
	'icon'   => 'fa fa-shopping-cart',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('WooCommerce Settings', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Setup for WooCommerce shop section. Please make sure you installed WooCommerce plugin', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'wc-header-icon',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Cart Icon in Header', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "On" to show the cart icon in header. Select "OFF" to hide the cart icon.', 'devfox') . ' <br><br> ' . '<strong>' . esc_attr__('NOTE:','devfox') . '</strong> ' . esc_attr__('Please note that if you haven\'t installed "WooCommerce" plugin than the icon will not appear even if you selected "ON" in this option.', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('WooCommerce Product List Column', 'devfox'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'devfox'),
								'2' => esc_attr__('Two Columns', 'devfox'),
								'3' => esc_attr__('Three Columns', 'devfox'),
								'4' => esc_attr__('Four Columns', 'devfox'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list view', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'woocommerce-product-per-page',
			'type'   		=> 'number',
			'title'         => esc_attr__('Products Per Page', 'devfox' ),
			'default'		=> '9',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many product you want to show on SHOP page', 'devfox').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Single Product Page Settings', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Options for Single product page', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'wc-single-show-related',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Related Products', 'devfox'),
			'default' 		=> true,
			'label'  		=> '<div class="cs-text-muted">'.esc_attr__('Select "ON" to show Related Products below the product description on single page', 'devfox').'</div>',
        ),
		array(
			'id'     		=> 'wc-single-related-column', 
			'type'   		=> 'radio',
			'title'  		=> esc_attr__('Column for Related Products', 'devfox'),
			'options'  		=> array(
								'1' => esc_attr__('One Column', 'devfox'),
								'2' => esc_attr__('Two Columns', 'devfox'),
								'3' => esc_attr__('Three Columns', 'devfox'),
								'4' => esc_attr__('Four Columns', 'devfox'),
							),
			'default'  		 => '3',
			'after'   		 => '<div class="cs-text-muted">'.esc_attr__('Select how many column you want to show for product list of related products', 'devfox').'</div>',
			'dependency'     => array( 'wc-single-show-related', '==', 'true' ),
        ),
		array(
			'id'     		=> 'wc-single-related-count',
			'type'   		=> 'number',
			'title'         => esc_attr__('Related Products Show', 'devfox' ),
			'default'		=> '3',
			'after'  	  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select how many products you want to show in the Related prodcuts area on single product page', 'devfox').'</div>',
			'dependency'    => array( 'wc-single-show-related', '==', 'true' ),
        ),
	)
);


// Under Construction
$cmt_framework_options[] = array(
	'name'   => 'under_construction', // like ID
	'title'  => esc_attr__('Under Construction', 'devfox'),
	'icon'   => 'fa fa-send',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Under Construction', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('You can set your site in Under Construciton mode during development of your site. Please note that only logged in users like admin can view the site when this mode is activated', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'uconstruction',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Show Under Construciton Message', 'devfox'),
			'default' 		=> false,
			'label'  		=> esc_attr__('You can acitvate this during development of your site. So site visitor will see Under Construction message.', 'devfox'). '<br>' . esc_attr__('Please note that admin (when logged in) can view live site and not Under Construction message.', 'devfox'),
        ),
		array(
			'id'     		=> 'uconstruction_title',
			'type'    		=> 'text',
			'title'   		=> esc_attr__('Title for Under Construction page', 'devfox'),
			'default'  		=> esc_attr__('This site is Under Construction', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Write TITLE for the Under Construction page', 'devfox').'</div>',
			'dependency'	=> array('uconstruction','==','true'),
		),
		array(
			'id'       		 => 'uconstruction_html',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('Page Content', 'devfox'),
			'shortcode'		 => true,
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => cymolthemes_wp_kses( urldecode('%3Cdiv+class%3D%22un-main-page-content%22%3E%0D%0A%3Cdiv+class%3D%22un-page-content%22%3E%0D%0A%3Cdiv%3E%5Bcmt-sboxlogo%5D%3C%2Fdiv%3E%0D%0A%3Cdiv+class%3D%22sepline%22%3E%3C%2Fdiv%3E%0D%0A%3Ch1+class%3D%22heading%22%3EUNDER+CONSTRUCTION%3C%2Fh1%3E%0D%0A%3Ch4+class%3D%22subheading%22%3ESomething+awesome+this+way+comes.+Stay+tuned%21%3C%2Fh4%3E%0D%0A%3C%2Fdiv%3E%0D%0A%3C%2Fdiv%3E') ),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your HTML code for Under Construction page body content', 'devfox').'</div>',
        ),
		array(
			'id'      		=> 'uconstruction_background',
			'type'    		=> 'cymolthemes_background',
			'title'  		=> esc_attr__('Background Properties', 'devfox' ),
			'dependency'	 => array('uconstruction','==','true'),
			'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background options. This is for main body background', 'devfox').'</div>',
			'default'		=> array(
				'image'			=> get_template_directory_uri() . '/images/uconstruction-bg.jpg',
				'repeat'		=> 'no-repeat',
				'position'		=> 'center top',
				'attachment'	=> 'scroll',
				'size'			=> 'cover',
				'color'			=> '#ffffff',
			),
			'output'      	=> '.uconstruction_background',
        ),
		array(
			'id'       		 => 'uconstruction_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Under Construction page', 'devfox'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'devfox').'</div>',
			'dependency'	 => array('uconstruction','==','true'),
			'default' 		 => urldecode('%40import+url%28%22https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DOpen%2BSans%3A300%2C300i%2C400%2C400i%2C600%2C600i%2C700%2C700i%22%29%3B%0D%0Abody%7B%0D%0Apadding%3A+0%3B%0D%0Amargin%3A+0%3B%0D%0A%7D+%0D%0A.heading%2C+.subheading%7B+%0D%0Afont-family%3A+%22%22Open+Sans%22%2C+Arial%2C+Helvetica%2C+sans-serif%3B%0D%0A%7D+%0D%0A.heading%7B%0D%0Afont-size%3A+60px%3B%0D%0Aline-height%3A+65px%3B+%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Amargin-bottom%3A%0D%0A0px%3B+margin-bottom%3A+18px%3B%0D%0Afont-weight%3A+600%3B%0D%0Aletter-spacing%3A+2px%3B%0D%0Acolor%3A+%23283d58%3B%0D%0A+%7D+%0D%0A.subheading%7B%0D%0Afont-size%3A+23px%3B%0D%0Aline-height%3A+30px%3B%0D%0Acolor%3A+%23828c96%3B%0D%0Aletter-spacing%3A+1px%3B%0D%0Amargin%3A+0%3B%0D%0Afont-weight%3A+normal%3B%0D%0A%7D+%0D%0A.un-main-page-content%7B+%0D%0Aposition%3A+absolute%3B%0D%0Aleft%3A+50%25%3B%0D%0Atop%3A+45%25%3B%0D%0A-khtml-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-moz-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B+%0D%0A-ms-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A-o-transform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0Atransform%3A+translateX%28-50%25%29+translateY%28-50%25%29%3B%0D%0A+%7D%0D%0A.cmt-sboxsc-logo%7B+%0D%0Amargin-bottom%3A+40px%3B%0D%0Adisplay%3A+inline-block%3B%0D%0A%7D'),
        ),
		
		
	)
);




// Seperator
$cmt_framework_options[] = array(
	'name'   => 'cmt_seperator_1',
	'title'  => esc_attr__('Advanced', 'devfox'),
	'icon'   => 'fa fa-ellipsis-h'
);

$cssfile = (is_multisite()) ? 'php' : 'css' ;



// Advanced Settings
$cmt_framework_options[] = array(
	'name'   => 'advanced_settings', // like ID
	'title'  => esc_attr__('Advanced Settings', 'devfox'),
	'icon'   => 'fa fa-wrench',
	'fields' => array( // begin: fields
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Portfolio) Settings', 'devfox'), $pf_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Portfolio custom post type', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'pf_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio) Post Type', 'devfox'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'pf_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Portfolio) Post Type', 'devfox'), $pf_title_singular ),
			'default'  		=> esc_attr__('Portfolio', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Portfolio post type section. Only for singular title.', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'pf_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio) Post Type', 'devfox'), $pf_title_singular ),
			'default'  		=> esc_attr('portfolio'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Portfolio Category) List', 'devfox'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Categories', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Portfolio Category) List', 'devfox'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('Portfolio Category', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Portfolio Category list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'pf_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Portfolio Category) Link', 'devfox'), $pf_cat_title_singular ),
			'default'  		=> esc_attr__('portfolio-category', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Portfolio Category link', 'devfox').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Service) Settings', 'devfox'), $service_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Service custom post type', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'service_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service) Post Type', 'devfox'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'service_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Service) Post Type', 'devfox'), $service_title_singular ),
			'default'  		=> esc_attr__('Service', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Service post type section. Only for singular title.', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'service_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service) Post Type', 'devfox'), $service_title_singular ),
			'default'  		=> esc_attr('service'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Service Category) List', 'devfox'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Categories', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'service_cat_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Service Category) List', 'devfox'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('Service Category', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Service Category list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'service_cat_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Service Category) Link', 'devfox'), $service_cat_title_singular ),
			'default'  		=> esc_attr__('service-category', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Service Category link', 'devfox').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> sprintf( esc_attr__('Custom Post Type : %s (Team member) Settings', 'devfox'), $team_member_title_singular ),
			'after'  		=> '<small>'. esc_attr__('Advanced settings for Team Member custom post type', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'team_type_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Member) Post Type', 'devfox'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Members', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'team_type_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular title for %s (Team Member) Post Type', 'devfox'), $team_member_title_singular ),
			'default'  		=> esc_attr__('Team Member', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the Title for Team Member post type section. Only for singular title.', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'team_type_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Member) Post Type', 'devfox'), $team_member_title_singular ),
			'default'  		=> esc_attr__('team-member', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Member post type section', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'team_group_title',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Title for %s (Team Group) List', 'devfox'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Groups', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'team_group_title_singular',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('Singular Title for %s (Team Group) List', 'devfox'), $team_group_title_singular ),
			'default'  		=> esc_attr__('Team Group', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Title for Team Group list for group page. This will appear at left sidebar', 'devfox').'</div>',
		),
		array(
			'id'     		=> 'team_group_slug',
			'type'    		=> 'text',
			'title'   		=> sprintf( esc_attr__('URL Slug for %s (Team Group) Link', 'devfox'), $team_group_title_singular ),
			'default'  		=> esc_attr__('team-group', 'devfox'),
			'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will change the URL slug for Team Group link', 'devfox').'</div>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Minify Options', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Options to minify HTML/JS/CSS files', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'minify',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Minify JS and CSS files', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('This will generate MIN version of all CSS and JS files. This will help you to lower the page load time. You can use this if the Theme Options are not working', 'devfox').'</div>',
        ),
		
		// Thumb Image Size Options
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Box Image Size Options', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Set Image size for Portfolio, Team Member and Blog boxes.', 'devfox').'</small>',
		),
		array(
			'id'     	=> 'img-size-blog',
			'type'    	=> 'cymolthemes_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size', 'devfox' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'devfox' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'devfox') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'devfox') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'devfox') . '</a></p>',
			'default' 	=> array(
				'width'		=> '1200',
				'height'	=> '800',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-left',
			'type'    	=> 'cymolthemes_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Left Image and Right Content Only)', 'devfox' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'devfox' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'devfox') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'devfox') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'devfox') . '</a></p>',
			'default' 	=> array(
				'width'		=> '600',
				'height'	=> '650',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-blog-top',
			'type'    	=> 'cymolthemes_dimensions',
			'title'  	=> esc_attr__( 'Blog Box - Thumb image size  (For Top Image Bottom Content Content Only)', 'devfox' ),
			'desc'      => esc_attr__( 'Set width and height of the Blog Box image in Visual Composer element (on frontend site)', 'devfox' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'devfox') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'devfox') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'devfox') . '</a></p>',
			'default' 	=> array(
				'width'		=> '672',
				'height'	=> '448',
				'crop'		=> 'yes',
			),
        ),
		
		array(
			'id'     	=> 'img-size-portfolio',
			'type'    	=> 'cymolthemes_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Portfolio) Box - Thumb image size', 'devfox' ), $pf_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'devfox' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'devfox') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'devfox') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'devfox') . '</a></p>',
			'default' 	=> array(
				'width'		=> '700',
				'height'	=> '900',
				'crop'		=> 'yes',
			),
        ),
		array(
			'id'     	=> 'img-size-team-member',
			'type'    	=> 'cymolthemes_dimensions',
			'title'  	=> sprintf( esc_attr__( '%s (Team Member) Box - Thumb image size', 'devfox' ), $team_member_title_singular ),
			'desc'      => esc_attr__( 'Set width and height of the Portfolio Box image in Visual Composer element (on frontend site)', 'devfox' ),
			'after'     => '<p><a href="'. esc_url('http://www.davidtan.org/wordpress-hard-crop-vs-soft-crop-difference-comparison-example/') .'" target="_blank">'. esc_attr__('Click here to know more about hard crop.', 'devfox') . '</a></p><p>' . esc_attr__('After changing these settings you may need to %1$s regenerate your thumbnails %2$s.', 'devfox') . ' <a href="'. esc_url('http://wordpress.org/extend/plugins/regenerate-thumbnails/') .'" target="_blank">' . esc_attr__('You can use "Regenerate Thumbnails" plugin.', 'devfox') . '</a></p>',
			'default' 	=> array(
				'width'		=> '535',
				'height'	=> '500',
				'crop'		=> 'yes',
			),
        ),
		
		/* Icon library selector - Only selected libraries will be loaded in VC element */
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Enabled Icon Library', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Select icon library that you like to load in Visual Composer elements like "CymolThemes Icon", "CymolThemes Call to Action", "CymolThemes Service Box" etc.', 'devfox').'</small>',
		),
		array(
			'id'        => 'icon_library',
			'type'      => 'checkbox',
			'title'     => esc_attr__('Select icon library to load', 'devfox'),
			'options'   => array(
					'linecons'       => esc_attr__( 'Linecons', 'devfox' ),
					'themify'        => esc_attr__( 'Themify icons', 'devfox' ),
					'cmt_devfox'    => esc_attr__( 'Devfox icons', 'devfox' ),
			),
			'default'   => array( 'linecons', 'themify', 'cmt_devfox' ),
			'after'    	=> '<small>'.esc_attr__('Select icon library that you want to load. This will reduce load time of Visual Composer elements. But you can see only selected libraries in the icon dropdown.', 'devfox').'</small>',
		),
		
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Show or hide Demo Content Setup option', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'devfox').'</small>',
		),
		array(
			'id'     		=> 'hide_demo_content_option',
			'type'   		=> 'switcher',
			'title'   		=> esc_attr__('Hide "Demo Content Setup" option', 'devfox'),
			'default' 		=> false,
			'label'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Show or hide "Demo Content Setup" option under "Layout Settings" tab', 'devfox').'</div>',
        ),
		
		
	)
);


// Custom Code
$cmt_framework_options[] = array(
	'name'   => 'custom_code', // like ID
	'title'  => esc_attr__('Custom Code', 'devfox'),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array( // begin: fields
		
		// Custom Code
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Add custom JS and CSS code', 'devfox').'</small>',
		),
		array(
			'id'       		 => 'custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code', 'devfox'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at bottom of the dynamic css file so you can override any existing style', 'devfox').'</div>',
        ),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('JS Code', 'devfox'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('Paste your JS code here', 'devfox').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom HTML Code', 'devfox'),
			'after'  		=> '<small>'. sprintf(__('Custom HTML Code for different areas. You can paste <strong>Google Analytics</strong> or any tracking code here', 'devfox'),'<strong>', '</strong>').'</small>',
		),
		array(
			'id'       => 'customhtml_head',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code for &lt;head&gt; tag', 'devfox'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear in &lt;head&gt; tag. You can add your custom tracking code here', 'devfox').'</div>',
		),
		array(
			'id'       => 'customhtml_bodystart',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code after &lt;body&gt; tag', 'devfox'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear after &lt;body&gt; tag. You can add your custom tracking code here', 'devfox').'</div>',
		),
		array(
			'id'       => 'customhtml_bodyend',
			'type'     => 'wysiwyg',
			'title'    => esc_attr__('Custom Code before &lt;/body&gt; tag', 'devfox'),
			'settings' => array(
				'textarea_rows' => 5,
				'tinymce'       => false,
				'media_buttons' => false,
				'quicktags'     => false,
			),
			'after'    => '<div class="cs-text-muted"><br>'. esc_attr__('This code will appear before &lt;/body&gt; tag. You can add your custom tracking code here', 'devfox').'</div>',
		),
		
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Custom Code for Login page', 'devfox'),
			'after'  		=> '<small>'. esc_attr__('Custom Code for Login pLogin page only. This will effect only login page and not effect any other pages or admin section', 'devfox').'</small>',
		),
		array(
			'id'       		 => 'login_custom_css_code',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code for Login Page', 'devfox'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Write your custom CSS code here', 'devfox').'</div>',
        ),
		array(
			'type'       	=> 'heading',
			'content'    	=> esc_attr__('Advanced Custom CSS Code Option', 'devfox'),
		),
		array(
			'id'       		 => 'custom_css_code_top',
			'type'     		 => 'textarea',
			'title'    		 =>  esc_attr__('CSS Code (at top of the file)', 'devfox'),
			'after'  		 => '<div class="cs-text-muted"><br>'. esc_attr__('Add custom CSS code here. This code will be appear at top of the css code. specially for "@import" style tag.', 'devfox').'</div>',
        ),
		
		
	)
);


// Backup
$cmt_framework_options[]   = array(
	'name'     => 'backup_section',
	'title'    => esc_attr__('Backup / Restore', 'devfox'),
	'icon'     => 'fa fa-shield',
	'fields'   => array(
		array(
			'type'    => 'notice',
			'class'   => 'warning',
			'content' => esc_attr__('You can save your current options. Download a Backup and Import', 'devfox'),
		),
		array(
			'type'    => 'backup',
		),
	)
);
