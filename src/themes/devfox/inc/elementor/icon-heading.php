<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Icon Heading Box
*/
class Devfox_IconHeadingbox_Widget  extends Widget_Base{
	
	public function get_name() {
		return 'cmt_icon_heading';
	}
	
	public function get_title() {
		return esc_attr__( 'Icon Box', 'devfox' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'devfox_category' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Content', 'devfox' ),
			]
		);
		
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Box Design', 'devfox' ),
				'description'	=> esc_attr__( 'Select IconBox style.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'styleone',
				'prefix'		=> 'cymolthemes-iconbox cymolthemes-iconbox-',
				'options' => [
					'styleone'	=> esc_attr( 'Style 1' ),
					'styletwo'	=> esc_attr( 'Style 2' ),
					'stylethree'=> esc_attr( 'Style 3' ),
					'stylefour'	=> esc_attr( 'Style 4' ),
					'stylefive'	=> esc_attr( 'Style 5' ),
					'stylesix'	=> esc_attr( 'Style 6' ),
					'styleseven'	=> esc_attr( 'Style 7' ),
					'styleeight'	=> esc_attr( 'Style 8' ),
					'stylenine'	=> esc_attr( 'Style 9' ),
					'styleten'	=> esc_attr( 'Style 10' ),
					'styleeleven'	=> esc_attr( 'Style 11' ),
					'styletwelve'	=> esc_attr( 'Style 12' ),
					'stylethirteen'	=> esc_attr( 'Style 13' ),
				],
			]
		);
		
        $this->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'devfox' ),
					'image'	=> esc_attr__( 'Image', 'devfox' ),
					'text'	=> esc_attr__( 'Text', 'devfox' ),
				],
				'default' => esc_attr( 'icon' ),
			]
		);
		
        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'devfox' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);

        $this->add_control(
			'icon_image',
			[
				'label' => __( 'Select Image for Icon', 'devfox' ),
				'description' => __( 'image will appear at icon position', 'devfox' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'icon_type' => 'image',
                ]
			]
		);
		
        $this->add_control(
			'icon_text',
			[
				'label' => esc_attr__( 'Text for Icon', 'devfox' ),
				'description' => esc_attr__( 'Text will appear at icon position', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text here', 'devfox' ),
                'label_block' => true,
                'condition' => [
                    'icon_type' => 'text',
                ]
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => esc_attr__( 'Icon Color', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skincolor'	=> esc_attr( 'Skin color' ),
					'darkgrey'	=> esc_attr( 'Dark Color' ),
					'grey'		=> esc_attr( 'Grey Color' ),	
					'white'		=> esc_attr( 'White Color' ),
					'default'	=> esc_attr( 'Default Color' ),	
				],
				'default' => esc_attr( 'skincolor' ),
			]
		);
		
		$this->add_control(
			'icon_shape',
			[
				'label' => esc_attr__( 'Icon Background shape', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none'	=> esc_attr( 'None' ),	
					'boxed'	=> esc_attr( 'Square' ),
					'rounded-less'	=> esc_attr( 'Rounded' ),
					'rounded'		=> esc_attr( 'Round' ),		
					'outline-boxed'	=> esc_attr( 'Outline Square' ),
					'outline-rounded-less'	=> esc_attr( 'Outline Rounded' ),
					'outline-rounded'		=> esc_attr( 'Outline Round' ),			
				],
				'default' => esc_attr( 'none' ),
				'condition' => [
					'view' => [ 'styletwo', 'stylethree',  'stylefour', 'styleten', 'styleeleven', 'styletwelve' ]
				],
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_attr__( 'Background color', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'skincolor'	=> esc_attr( 'Skin color' ),
					'darkgrey'	=> esc_attr( 'Dark Color' ),
					'grey'		=> esc_attr( 'Grey Color' ),	
					'white'		=> esc_attr( 'White Color' ),
					'none'		=> esc_attr( 'None' ),	
				],
				'default' => esc_attr( 'none' ),
				'condition' => [
					'view' => [ 'styletwo', 'stylethree', 'stylefour', 'styleten', 'styleeleven' ,'styletwelve']
				],
			]
		);
		
		$this->add_control(
			'icon_size',
			[
				'label' => esc_attr__( 'Icon Size', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'small'		=> esc_attr( 'Small' ),
					'default'	=> esc_attr( 'Default' ),
					'large'		=> esc_attr( 'Large' ),	
				],
				'default' => esc_attr( 'default' ),
				'condition' => [
					'view' => [ 'styleone', 'styletwo', 'stylefour', 'styleten', 'styleeleven','styletwelve' ]
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => esc_attr__( 'Heading', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text for heading line.', 'devfox' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading_link',
			[
				'label' => esc_attr__( 'Heading Link', 'devfox' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading',
			[
				'label' => esc_attr__( 'Subheading', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is Subtitle', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text for subheading line.', 'devfox' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'devfox' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description Text', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Enter description text', 'devfox' ),
			]
		);
		$this->add_control(
			'iconbox_bg_number',
			[
				'label' => esc_attr__( 'Number Text', 'devfox' ),
				'description' => esc_attr__( 'Text will appear as number', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( '01', 'devfox' ),
                'label_block' => true,
				'condition' => [
					'view' => 'styleseven',
				],
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label' => esc_attr__( 'Button Title', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Read More', 'devfox' ),
				'separator'		=> 'before',
				'placeholder' => esc_attr__( 'Enter button title text', 'devfox' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'devfox' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);

		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'devfox' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'heading_tag',
			[
				'label' => esc_attr__( 'Heading Tag', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'p'		=> esc_attr( 'p' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subheading_tag',
			[
				'label' => esc_attr__( 'Subheading Tag', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'p'		=> esc_attr( 'p' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);
		
		$this->add_control(
			'smallicon_link',
			[
				'label' => esc_attr__( 'URL (Link)', 'devfox' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
				'description' => esc_attr__( 'Add link to Bottom icon.', 'devfox' ),
				'condition' => [
					'view' => 'stylethree',
				],
			]
		);

		$this->end_controls_section();

	$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Typo Settings', 'devfox' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
			$this->add_control(
				'heading_title',
				[
					'label' => esc_attr__( 'Heading', 'devfox' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'heading_color',
				[
					'label' => esc_attr__( 'Color', 'devfox' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .cymolthemes-iconbox-heading .cmt-custom-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .cymolthemes-iconbox-heading .cmt-custom-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .cmt-custom-heading',
				]
			);
			$this->add_responsive_control(
				'heading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'devfox' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .cmt-custom-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_subheading',
				[
					'label' => esc_attr__( 'Sub Heading', 'devfox' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_control(
				'stitle_color',
				[
					'label' => esc_attr__( 'Color', 'devfox' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .cmt-element-subheading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .cmt-element-subheading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'subheading_typography',
					'selector' => '{{WRAPPER}} .cmt-element-subheading',
				]
			);
			$this->add_responsive_control(
				'subheading_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'devfox' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .cmt-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_desc',
				[
					'label' => esc_attr__( 'Description', 'devfox' ),
					'type' => Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'desc_color',
				[
					'label' => esc_attr__( 'Color', 'devfox' ),
					'type' => Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .cymolthemes-iconbox .cmt-cta3-content-wrapper' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .cymolthemes-iconbox .cmt-cta3-content-wrapper',
				]
			);
			$this->add_responsive_control(
				'desc_bottom_space',
				[
					'label' => esc_attr__( 'Spacing', 'devfox' ),
					'type' => Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .cymolthemes-iconbox .cmt-cta3-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		extract($settings);


		global $cmt_global_iconbox_element_values;
		$cmt_global_iconbox_element_values = array();
		
		$icon_html = $heading_html = $subheading_html = $content_html = $nav_html = $button_html = $icon_color_html = $iconbox_bg_number = $button_link = '';
		
		
		if( file_exists( locate_template( '/template-parts/iconbox/iconbox-'.esc_attr($view).'.php', false, false ) ) ){
			$icon_type_class = '';

			if( !empty($settings['icon_type']) ){

				if( $settings['icon_type']=='text' ){
					$icon_html = '<div class="cmt-icon-type-text">' . $settings['icon_text'] . '</div>';
					$icon_type_class = 'text';

				} else if( $settings['icon_type']=='image' ){
					$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'devfox') ;
					
					if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
					$button_link = $settings['btn_link']['url'];					
						$icon_image = '<a href="'.esc_url($button_link).'"><img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" /></a>';
					}
					else {
						$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
					}
					
					$icon_html	= '<div class="cmt-icon-type-image">' . $icon_image . '</div>';
					$icon_type_class = 'image';
				} else if( $settings['icon_type']=='none' ){
					$icon_html = '';
					$icon_type_class = 'none';
				} else {

					$icon_html       = '<div class="cmt-box-icon"><i class="' . $settings['icon']['value'] . '"></i></div>';
					$icon_type_class = 'icon';

					wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
				}
			}

			if( !empty($settings['heading']) ) {
				$heading_tag	= ( !empty($settings['heading_tag']) ) ? $settings['heading_tag'] : 'h2' ;
				$heading_html	= '<'. cymolthemes_wp_kses($heading_tag) . ' class="cmt-custom-heading">
					'.cmt_link_render($settings['heading_link'], 'start' ).'
						'.cymolthemes_wp_kses($settings['heading']).'
					'.cmt_link_render($settings['heading_link'], 'end' ).'
					</'. cymolthemes_wp_kses($heading_tag) . '>
				';
			}

			if( !empty($settings['subheading']) ) {
				$subheading_tag	= ( !empty($settings['subheading_tag']) ) ? $settings['subheading_tag'] : 'h5' ;
				$subheading_html	= '<'. cymolthemes_wp_kses($subheading_tag) . ' class="cmt-element-subheading">
					'.cmt_link_render($settings['subheading_link'], 'start' ).'
						'.cymolthemes_wp_kses($settings['subheading']).'
					'.cmt_link_render($settings['subheading_link'], 'end' ).'
					</'. cymolthemes_wp_kses($subheading_tag) . '>
				';
			}

			if( !empty($settings['desc']) ){
				$content_html = '<div class="cmt-cta3-content-wrapper">'.cymolthemes_wp_kses($settings['desc']).'</div>';
			}
			
			if( !empty($settings['iconbox_bg_number']) ){
				$iconbox_bg_number = '<div class="cmt-number-wrapper">'.cymolthemes_wp_kses($settings['iconbox_bg_number']).'</div>';
			}
			
			if( !empty($icon_color) ){
				$icon_color_html = esc_attr($icon_color);
			}
			if( !empty($icon_size) ){
				$icon_size_html = esc_attr($icon_size);
			}
			if( !empty($icon_shape) ){
				$icon_shape_html = esc_attr($icon_shape);
			}
						
			if( !empty($icon_bg_color) ){
				$icon_bg_color_html = esc_attr($icon_bg_color);
			}
			

			$boxstyle	= $view;
			$mainclass	= '';

			if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
				$button_link = $settings['btn_link']['url'];
				$button_html = '<div class="cmt-iocnbox-btn">' . cmt_link_render($settings['btn_link'], 'start' ) . cymolthemes_wp_kses($settings['btn_title']) . cmt_link_render($settings['btn_link'], 'end' ) . '</div>';
			}
				 include( locate_template( '/template-parts/iconbox/iconbox-'.esc_attr($view).'.php', false, false ) ); 							
		}

	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Devfox_IconHeadingbox_Widget() );