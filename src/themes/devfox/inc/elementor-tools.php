<?php

/**
 * Add group in Elementor editor
 */
if( !function_exists('cmt_elements_manager') ){
function cmt_elements_manager() {
	\Elementor\Plugin::$instance->elements_manager->add_category( 
		'devfox_category',
		[
			'title' => esc_attr__( 'Devfox Special Elements', 'devfox' ),
			'icon' => 'fa fa-plug',
		],
		1 // tab position
	);
}
}
add_action( 'elementor/init', 'cmt_elements_manager' );

define( 'DEVFOX_ICON_URL',  get_template_directory( __FILE__ )  ); 

/**
 * Adding custom theme icons
 */
 
if( !function_exists('cmt_elementor_add_custom_icons_tab') ){
function cmt_elementor_add_custom_icons_tab( $icons_tabs = array() ) {

	if( defined('DEVFOX_ICON_URL') ){

		$cmt_devfox_icons_array = array(									
			'shovel',						
			'idea',	
			'support',
			'cloud',
			'cyber-security',
			'server',
			'happy',
			'award',
			'mission',
			'suitcase',
			'envelope',
			'pin',
			'left-quote',
			'project',
			'phone-call',
			'world',
			'clock',
			'layout',
			'cyber-security-1',
			'gear',
			'communities',
			'data-management',
			'leader',
			'web-coding',
			'briefing',
			'cloud-server',
							
		);
		
		$icons_tabs['kw_devfox'] = array(
			'name'          => 'kw_devfox',
			'label'         => esc_html__( 'Devfox Special Icons', 'devfox' ),
			'labelIcon'     => 'kw_devfox flaticon-workspace',
			'prefix'        => 'flaticon-',
			'displayPrefix' => 'kw_devfox',
			'url'           => wp_enqueue_style( 'cymolthemes-devfox-extra-icons', get_template_directory_uri() . '/assets/cymolthemes-devfox-extra-icons/font/flaticon.css' ),
			'icons'         => $cmt_devfox_icons_array,
			'ver'           => '1.0.0',
		);
		
	}
	
	
	return $icons_tabs;
}
}
add_filter( 'elementor/icons_manager/additional_tabs', 'cmt_elementor_add_custom_icons_tab' );


/**
 *  Add preview js for Elementor
 */
function cmt_elementor_preview_scripts(){
	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script(  'devfox-elementor-preview', get_template_directory_uri() . '/inc/elementor-preview.js' );
	}
}
add_action( 'wp_enqueue_scripts', 'cmt_elementor_preview_scripts' );

function cmt_elementor_enqueue_base_scripts(){
	wp_enqueue_script(  'devfox-main', get_template_directory_uri() . '/js/main.js' );
	wp_enqueue_script(  'devfox-elementor-main', get_template_directory_uri() . '/inc/elementor-main.js' );
}
add_action('elementor/editor/before_enqueue_scripts', 'cmt_elementor_enqueue_base_scripts');


/**
 * Creating element widgets now*/
 
add_action( 'elementor/widgets/widgets_registered', 'cmt_elementor_register_widgets',1,1 );
function cmt_elementor_register_widgets() {

    if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {

        require_once( get_template_directory() . '/inc/elementor/heading-subheading.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-testimonial.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-blog.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-team.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-client.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-portfolio.php' );
		require_once( get_template_directory() . '/inc/elementor/cmt-service.php' );
		require_once( get_template_directory() . '/inc/elementor/fid.php' );
 		require_once( get_template_directory() . '/inc/elementor/icon-heading.php' );
		require_once( get_template_directory() . '/inc/elementor/static-box.php' );
		require_once( get_template_directory() . '/inc/elementor/pricing-table.php' );
    }
}

if( !function_exists('cmt_link_render') ){
function cmt_link_render( $value=array(), $type='start' ) {
	if( !empty($value) && is_array($value) && !empty($value['url']) ){
		if( $type=='start' ){
			$target		= $value['is_external'] ? ' target="_blank"' : '';
			$nofollow	= $value['nofollow'] ? ' rel="nofollow"' : '';
			return cymolthemes_wp_kses( '<a href="' . $value['url'] . '"' . $target . $nofollow . '><span>' ); 
		} else {
			return cymolthemes_wp_kses( '</span></a>' ); 
		}
	}
}
}

/***Themetechmount Iconbox Element code***/

if( !function_exists('cymolthemes_iconbox_ele') ){
function cymolthemes_iconbox_ele( $settings, $echo=false ){
	$return = '';
	
	if( !empty($settings['icon_type']) ){

		switch( $settings['icon_type'] ){

			case 'icon':
				if( !empty($tcmt_data['icon']['value']) ){
					$return = '<i class="'.esc_attr( $settings['icon']['value'] ).'"></i>';

				}
				break;

			case 'image':
				if( !empty($settings['icon_image']['url']) ){
					$return = '<img src="'.esc_attr( $settings['icon_image']['url'] ).'" />';
				}
			break;

			case 'text':
				if( !empty($settings['icon_text']) ){
					$return = '<div class="cmt-iheading-icontext">'.esc_attr($settings['icon_text']).'</div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = cymolthemes_wp_kses('<div class="cmt-iheading-icon cmt-iheading-icon-type-'.esc_attr($settings['icon_type']).'">'.$return.'</div>');
	}

	if( $echo == true ){
		echo cymolthemes_wp_kses($return);
	} else {
		return cymolthemes_wp_kses($return);
	}

}
}

/**
 *  Heading Sub Heading Element.
 */

if( !function_exists('cmt_heading_subheading') ){
function cmt_heading_subheading( $settings = array(), $echo = false ){

	// Reverse heading class
	$reverse_class = '';
	if( !empty($settings['reverse_heading']) && $settings['reverse_heading']=='yes' ){
		$reverse_class = 'cmt-reverse-heading-yes';
	}
	
	// desc heading class
	$desc = '';
	if( !empty($settings['desc'] )){
		$desc = 'cmt-content-with-desc';
	}
	
	$heading_style = '';
	
	$return = '<div class="cmt-element-heading-content-wrapper ' . cymolthemes_wp_kses($settings['text_align']) . '-align '.esc_attr($reverse_class).' cmt-seperator-'. cymolthemes_wp_kses($settings['heading_sep']) .' '.esc_attr($desc).' cmt-heading-style-'. cymolthemes_wp_kses($settings['heading_style']) .' ">';
	
	$heading = '';
	
	// icon
	$return .= cymolthemes_iconbox_ele($settings);
	
	$return .= cymolthemes_wp_kses('<div class="cmt-content-header">');
	
	// Heading
	if( !empty($settings['heading']) ) {
		$heading_tag = ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;

		$heading .= '<'. cymolthemes_wp_kses($heading_tag) . ' class="cmt-element-content-heading cmt-custom-heading ">
				'.cymolthemes_wp_kses($settings['heading']).'
			</'. cymolthemes_wp_kses($heading_tag) . '>
		';
	}

	// reverse before heading
	if( empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= cymolthemes_wp_kses($heading);
	}
	

	// subheading
	if( !empty($settings['subheading']) ) {
		$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h4' ;
		$subheading		= '<div class="cmt-subheading-wrapper"><'. cymolthemes_wp_kses($subheading_tag) . ' class="cmt-element-subheading cmt-custom-heading ">
				'.cymolthemes_wp_kses($settings['subheading']).'
			</'. cymolthemes_wp_kses($subheading_tag) . '> </div>
		';
		$return .= cymolthemes_wp_kses($subheading);
	}

	// Heading after sub-title
	if( !empty($settings['reverse_heading']) && !empty($heading) ){
		$return .= cymolthemes_wp_kses($heading);
	}

	$return .= cymolthemes_wp_kses('<div class="heading-seperator"><span></span></div></div>');
	if( !empty($settings['desc']) ){
		$desc = '<div class="cmt-element-content-desctxt">'.cymolthemes_wp_kses($settings['desc']).'</div>';
		$return .= cymolthemes_wp_kses($desc);
	}
	// closing div
	$return .= cymolthemes_wp_kses('</div>');

	// final output
	if( $echo == true ){
		echo cymolthemes_wp_kses($return);
	} else {
		return cymolthemes_wp_kses($return);
	}

}
}

add_action('elementor/element/section/section_layout/before_section_start', 'cmt_elementor_section_options', 10);
if( !function_exists('cmt_elementor_section_options') ){
function cmt_elementor_section_options( $element ){

	$element->start_controls_section(
		'cmt_element_section_title',
		[
			'label' => __('Devfox Special Options', 'devfox'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);
	
	$element->add_control(
		'cmt_break_col',
		[
			'label'			=> esc_html__( 'Break Column in Ipad Screen', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Break Column', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'no',
			'prefix_class'	=> 'cmt-column-break-ipad-',
			'options' => [
				'no' 			=> __( 'No', 'devfox' ),
				'yes'		=> __( 'Yes', 'devfox' ),
			],
		]
	);

	$element->add_control(
		'cmt-extended-column',
		[
			'label'			=> esc_attr__( 'Exapand Column Background', 'devfox' ),
			'description'	=> esc_attr__( 'Exapand Column BG to left or right. This will expand the Background image/color visibility to border of the browser border.', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'hide_in_inner' => true,
			'default'		=> 'none',
			'prefix_class'	=> 'cmt-col-stretched-',
			'options'		=> [
				'none' 		=> __( 'No expand (default)', 'devfox' ),
				'left'		=> __( 'Exapand Column background to left', 'devfox' ),
				'right'		=> __( 'Exapand Column background to right', 'devfox' ),	
				'both'		=> __( 'Exapand Column background to both', 'devfox' ),				
			],
		]
	);


	$element->add_control(
		'cmt-strech-content-left',
		[
			'label'			=> esc_attr__( 'Also stretch left content too?', 'devfox' ),
			'description'	=> esc_attr__( 'Also stretch left content too?', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'cmt-left-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'devfox' ),
			'label_off'		=> esc_attr__( 'No', 'devfox' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'cmt-extended-column' => array('left', 'both'),
			]
		]
	);
	$element->add_control(
		'cmt-strech-content-right',
		[
			'label'			=> esc_attr__( 'Also stretch right content too?', 'devfox' ),
			'description'	=> esc_attr__( 'Also stretch right content too?', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SWITCHER,
			'prefix_class'	=> 'cmt-right-col-stretched-content-',
			'hide_in_inner' => true,
			'label_on'		=> esc_attr__( 'Yes', 'devfox' ),
			'label_off'		=> esc_attr__( 'No', 'devfox' ),
			'return_value'	=> 'yes',
			'default'		=> '',
			'condition'		=> [
				'cmt-extended-column' => array('right', 'both'),
			]
		]
	);
	
	
	$element->add_control(
		'cmt-left-margin',
		[
			'label'			=> esc_html__( 'Left Content Area Margin', 'devfox' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'separator'		=> 'before',
			'selectors' => [
				'{{WRAPPER}} .cmt-stretched-div.cmt-stretched-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'cmt-right-margin',
		[
			'label'			=> esc_html__( 'Right Content Area Margin', 'devfox' ),
			'description'	=> esc_html__( 'This is useful if you like to overlap columns on each other.', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::DIMENSIONS,
			'selectors' => [
				'{{WRAPPER}} .cmt-stretched-div.cmt-stretched-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			],
		]
	);

	$element->add_control(
		'cmt_bg_color',
		[
			'label'			=> esc_html__( 'Background Color', 'devfox' ),
			'description'	=> esc_html__( 'Select Background Color. If you select color and also select background Video or background Image than the color will be overlay with some opacity', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'separator'		=> 'before',
			'prefix_class'	=> 'cmt-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 		=> esc_attr__( 'Transparent (From Design Options tab)', 'devfox' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'devfox' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'devfox' ),
				'white'	        => esc_attr__( 'White color as background color', 'devfox' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'devfox' ),				
			],
		]
	);

	$element->add_control(
		'cmt_text_color',
		[
			'label'			=> esc_html__( 'Section Text Color', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Section (ROW)', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'cmt-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'devfox' ),
				'white'		=> __( 'White Color', 'devfox' ),
				'dark'		=> __( 'Dark Color', 'devfox' ),
				'skincolor'	=> __( 'Skin Color', 'devfox' ),
			],
		]
	);

	$element->end_controls_section();
}
}


/**
 * Elementor column options
 */
add_action('elementor/element/column/layout/before_section_start', 'cmt_elementor_column_options', 10);
if( !function_exists('cmt_elementor_column_options') ){
function cmt_elementor_column_options( $element ){

	$element->start_controls_section(
		'cmt_element_section_title',
		[
			'label' => __('Devfox Special Options', 'devfox'),
			'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
		]
	);

	$element->add_control(
		'cmt_bg_color',
		[
			'label'			=> esc_html__( 'Column Background Color', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Background Color for this Column', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'cmt-bgcolor-yes cmt-col-bgcolor-',
			"weight"      => 1,
			'options'		=> [
				'' 			=> esc_attr__( 'Transparent (From Design Options tab)', 'devfox' ),
				'darkgrey'		=> esc_attr__( 'Dark grey color as background color', 'devfox' ),
				'grey'			=> esc_attr__( 'Grey color as background color', 'devfox' ),
				'white'	        => esc_attr__( 'White color as background color', 'devfox' ),
				'skincolor'  	=> esc_attr__( 'Skincolor color as background color', 'devfox' ),				
			],
		]
	);

	$element->add_control(
		'cmt_text_color',
		[
			'label'			=> esc_html__( 'Column Text Color', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Text Color in this Column', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> '',
			'prefix_class'	=> 'cmt-textcolor-',
			'options' => [
				'' 			=> __( 'Default', 'devfox' ),
				'white'		=> __( 'White Color', 'devfox' ),
				'dark'		=> __( 'Dark Color', 'devfox' ),
				'skincolor'	=> __( 'Skin Color', 'devfox' ),
			],
		]
	);

	$element->end_controls_section();
}
}



/**
 * Elementor button options
 */
add_action('elementor/element/button/section_button/before_section_start', 'cmt_elementor_button_options', 10);
if( !function_exists('cmt_elementor_button_options') ){
function cmt_elementor_button_options( $element ){

	$element->start_controls_section(
		'cmt_element_section_title',
		[
			'label' => __('Devfox Special Options', 'devfox'),
			'tab' => Elementor\Controls_Manager::TAB_CONTENT,
		]
	);
	$element->add_control(
		'btnstyle',
		[
			'label'			=> esc_html__( 'Button Design Style', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Style for Button', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'none',
			'label_block'	=> true,
			'prefix_class'	=> 'cmt-btn-style-',
			'options' => [
				'none'		=> esc_attr__( 'Default', 'devfox' ),
				'one'			=> esc_attr__( 'Button Style 1', 'devfox' ),
				'two'			=> esc_attr__( 'Button Style 2', 'devfox' ),
				
			],
		]
	);	
	
	$element->add_control(
		'color',
		[
			'label'			=> esc_html__( 'Button Color', 'devfox' ),
			'description'	=> esc_html__( 'Pre-defined Color for Button', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'skincolor',
			'label_block'	=> true,
			'prefix_class'	=> 'cmt-btn-color-',
			'options' => [
				'darkgrey'		=> esc_attr__( 'Dark Grey', 'devfox' ),
				'grey'			=> esc_attr__( 'Grey Color', 'devfox' ),
				'white'	        => esc_attr__( 'White Color', 'devfox' ),
				'skincolor'  	=> esc_attr__( 'Skin Color', 'devfox' ),
				
			],
		]
	);
	$element->add_control(
		'style',
		[
			'label'			=> esc_html__( 'Select Button Style', 'devfox' ),
			'description'	=> esc_html__( 'Button style', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'default'		=> 'flat',
			'label_block'	=> true,
			'prefix_class'	=> 'cmt-btn-style-',
			'options' => [
				'flat' 			=> esc_attr__( 'Flat', 'devfox' ),
				'outline'		=> esc_attr__( 'Outline', 'devfox' ),
				'text'			=> esc_attr__( 'Simple text', 'devfox' ),
			],
		]
	);
	
	$element->add_control(
		'shape',
		[
			'label'			=> esc_attr__( 'Select button shape.', 'devfox' ),
			'description'	=> esc_attr__( 'Select button shape.', 'devfox' ),
			'type'			=> Elementor\Controls_Manager::SELECT,
			'label_block'	=> true,
			'prefix_class'	=> 'cmt-btn-shape-',
			'default'		=> 'square',
			'options' => [
				'square' 		=> esc_attr__( 'Square', 'devfox' ),
				'rounded'		=> esc_attr__( 'Rounded', 'devfox' ),
				'round'			=> esc_attr__( 'Round', 'devfox' ),
			],
		]

	);
	
	$element->add_control(
			'icon-pos',
			[
				'label' => __( 'Icon Position', 'devfox' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'label_block'	=> true,
				'prefix_class'	=> 'cmt-icon-align-',
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'devfox' ),
					'right' => __( 'After', 'devfox' ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);
		
		
	$element->end_controls_section();
}
}
	
/* enable builder for custom cpt */

if( !function_exists('cmt_elementor_enable_cpt_support') ){
function cmt_elementor_enable_cpt_support() {

	$cpt_support  = array( 'page', 'post', 'cmt_portfolio', 'cmt_service', 'cmt_team_member' );
	update_option( 'elementor_cpt_support', $cpt_support  );

}
}
add_action( 'after_switch_theme', 'cmt_elementor_enable_cpt_support' );