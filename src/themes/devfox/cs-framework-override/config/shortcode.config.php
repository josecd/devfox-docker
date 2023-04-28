<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => 'CymolThemes Special Shortcodes',
  'shortcodes' => array(
	
	//Site Tagline
	array(
		'name'      => 'cmt-site-tagline',
		'title'     => esc_attr__('Site Tagline', 'devfox'),
		'fields'    => array(
			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Tagline. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode. ', 'devfox'),
			),
      ),
    ),
	// Site Title
	array(
		'name'      => 'cmt-site-title',
		'title'     => esc_attr__('Site Title', 'devfox'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Title. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'devfox'),
			),

      ),
    ),
	// Site URL
	array(
		'name'      => 'cmt-site-url',
		'title'     => esc_attr__('Site URL', 'devfox'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site URL. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'devfox'),
			),

      ),
    ),
	// Site LOGO
	array(
		'name'      => 'cmt-sboxlogo',
		'title'     => esc_attr__('Site Logo', 'devfox'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Site Logo. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'devfox'),
			),

      ),
    ),
	// Current Year
	array(
		'name'      => 'cmt-current-year',
		'title'     => esc_attr__('Current Year', 'devfox'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Current Year. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'devfox'),
			),

      ),
    ),
	// Footer Menu
	array(
		'name'      => 'cmt-footermenu',
		'title'     => esc_attr__('Footer Menu', 'devfox'),
		'fields'    => array(

			array(
				'type'    => 'content',
				'content' => esc_attr__('This shortcode will show the Footer Menu. There are no options for this shortcode. So just click Insert Shortcode button below to add this shortcode.', 'devfox'),
			),

      ),
    ),
	// Skin Color
	array(
		'name'      => 'cmt-skincolor',
		'title'     => esc_attr__('Skin Color', 'devfox'),
		'fields'    => array(

			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This shortcode will show the Text in Skin Color', 'devfox'),
			),
			 array(
				'id'         => 'content',
				'type'       => 'text',
				'title'      => esc_attr__('Skin Color Text', 'devfox'),
				'after'   	 => '<div class="cs-text-muted"><br>'.esc_attr__('The content is this box will be shown in Skin Color', 'devfox').'</div>', 
			),

      ),
    ),
	// Dropcaps
	array(
		'name'      => 'cmt-sboxdropcap',
		'title'     => esc_attr__('Dropcap', 'devfox'),
		'fields'    => array(
			array(
				'type'   	 => 'content',
				'content'	 => esc_attr__('This will show text in dropcap style.', 'devfox'),
			),
			array(
				'id'        	=> 'style',
				'title'     	=> esc_attr__('Style', 'devfox'),
				'type'      	=> 'image_select',
				'options'    	=> array(
									''        => get_template_directory_uri() .'/inc/images/dropcap1.png',
									'square'  => get_template_directory_uri() .'/inc/images/dropcap2.png',
									'rounded' => get_template_directory_uri() .'/inc/images/dropcap3.png',
									'round'   => get_template_directory_uri() .'/inc/images/dropcap4.png',
								),
				'default'     	=> ''
			),
			array(
				'id'         	=> 'bgcolor',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Background Color', 'devfox'),
				'options'    	=> array(
									'white' 	    => esc_attr__('White', 'devfox'),
									'skincolor'     => esc_attr__('Skin Color', 'devfox'),
									'grey' 			=> esc_attr__('Grey', 'devfox'),
									'dark' 		    => esc_attr__('Dark', 'devfox'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			array(
				'id'         	=> 'color',
				'type'       	=> 'select',
				'title'     	=> esc_attr__('Color', 'devfox'),
				'options'    	=> array(
									'skincolor'     => esc_attr__('Skin Color', 'devfox'),
									'white' 	    => esc_attr__('White', 'devfox'),
									'grey' 			=> esc_attr__('Grey', 'devfox'),
									'dark' 		    => esc_attr__('Dark', 'devfox'),
								),
				'class'         => 'chosen',
				'default'     	=> 'skincolor'
			),
			 array(
				'id'         	=> 'content',
				'type'      	=> 'text',
				'title'     	=> esc_attr__('Text', 'devfox'),
				'after'   	 	=> '<div class="cs-text-muted"><br>'.esc_attr__('The Letter in this box will be shown Dropcapped', 'devfox').'</div>', 
			),

      ),
    ),
	
	
 
  ),
);



CSFramework_Shortcode_Manager::instance( $options );
