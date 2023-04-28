<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Fact & Digit Widget.
*/
 
class Devfox_Fidbox_Widget extends Widget_Base{

	public function get_name() {
		return 'cmt_fid_element';
	}

	public function get_title() {
		return esc_attr__( 'Facts in digits', 'devfox' );
	}

	public function get_icon() {
		return 'eicon-counter';
	}

	public function get_categories() {
		return [ 'devfox_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
	}  
	
	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content', 'devfox' ),
			]
        );
		
		
		$this->add_control(
			'view',
			[
				'label'			=> esc_attr__( 'Design', 'devfox' ),
				'description'	=> esc_attr__( 'Select box design.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'topicon',
				'options' => [
					'topicon'	=> esc_attr( 'Top Center icon' ),
					'lefticon'	=> esc_attr( 'Left Icon' ),
					'lefticonstyle1'	=> esc_attr( 'Left icon style1' ),
					'righticon'	=> esc_attr( 'Right Icon' ),
					'roundbox'	=> esc_attr( 'Round Box Style' ),
					'topcentericon'	=> esc_attr( 'Top Center icon' ),
					'style7'	=> esc_attr( 'style7 ' ),
				],
			]
		);
		
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'devfox' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
                ],
            ]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Header ', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Title Text. ', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text for the title. ', 'devfox' ),
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
				'label_block' => true,
				
			]
		);

		$this->add_control(
			'digit',
			[
				'label' => esc_attr__( 'Rotating Number', 'devfox' ),
				'description' => esc_attr__( 'Enter rotating number digit here.', 'devfox' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '50',
			]
		);

		$this->add_control(
			'interval',
			[
				'label' => esc_attr__( 'Rotating digit Interval', 'devfox' ),
				'description' => esc_attr__( 'Enter rotating interval number here.', 'devfox' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number', 'devfox' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers.', 'devfox' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'devfox' ),
				'description' => esc_attr__('Select text style for the before text.', 'devfox'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'devfox' ),
					'sub'		=> esc_attr__( 'Subscript', 'devfox' ),
					'span'		=> esc_attr__( 'Normal', 'devfox' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number', 'devfox' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'devfox' ),
				'description' => esc_attr__('Select text style for the after text.', 'devfox'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'devfox' ),
					'sub'		=> esc_attr__( 'Subscript', 'devfox' ),
					'span'		=> esc_attr__( 'Normal', 'devfox' ),
				]
			]
		);
		
		$this->add_control(
			'circle_fill_color',
			[
				'label' => esc_attr__( 'Circle fill color', 'devfox' ),
				'description'	=> esc_attr__( 'Select circle fill color..', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'skincolor',
				'options' => [
					'skincolor'		=> esc_attr__( 'Skincolor', 'devfox' ),
					'20292f'		=> esc_attr__( 'Dark Grey', 'devfox' ),
					'#fff'			=> esc_attr__( 'White', 'devfox' ),
				],
				'condition' => [
					'view' => 'roundbox',
				],
			]
		);
		$this->add_control(
			'circle_empty_color',
			[
				'label' => esc_attr__( 'Circle empty color', 'devfox' ),
				'description'	=> esc_attr__( 'Select circle empty color..', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'default' => '20292f',
				'options' => [
					'skincolor'		=> esc_attr__( 'Skincolor', 'devfox' ),
					'20292f'		=> esc_attr__( 'Dark Grey', 'devfox' ),
					'#fff'		=> esc_attr__( 'White', 'devfox' ),
				],
				'condition' => [
					'view' => 'roundbox',
				],
			]
		);
		

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		
		global $cmt_global_fid_element_values;
		$cmt_global_fid_element_values = array();
		
		$cmt_global_fid_element_values['circle_fill_color']  = $circle_fill_color;
		$cmt_global_fid_element_values['circle_empty_color']  = $circle_empty_color;

		$return = $icon = '';

		$lefticoncode  = '';
		$righticoncode = '';
		if( !empty($settings['icon']['value']) ){ 
			$lefticoncode = '<div class="cmt-fid-icon-wrapper"><i class="' . esc_attr($settings['icon']['value']) . '"></i></div>';
		} 
		$class         = array();
		$class_icon         = 'cmt-fid-without-icon';
		if( !empty($settings['icon']['value']) ){ 
			$class_icon = 'cmt-fid-with-icon';	
			
		}  // if( $add_icon=='true' )
		
		// icon exists class
		$class[] = $class_icon;
		
		if( !empty($view) ){
			$class[] = 'cmt-fid-view-'.$view;
		}
			
		$before_text = '';
		$after_text  = '';
		
		if( trim($before)!='' ){
			if( $beforetextstyle=='sup' || $beforetextstyle=='sub' || $beforetextstyle=='span' ){
				$before_text = '<'.$beforetextstyle.'>'.trim($before).'</'.$beforetextstyle.'>';
			}
		}
		
		if( trim($after)!='' ){
			if( $aftertextstyle=='sup' || $aftertextstyle=='sub' || $aftertextstyle=='span' ){
				$after_text = '<'.$aftertextstyle.'>'.trim($after).'</'.$aftertextstyle.'>';
			}
		}
			$view_class=implode(' ', $class);

		if( file_exists( locate_template( '/template-parts/fidbox2/fidbox-'.esc_attr($view).'.php', false, false ) ) ){

			ob_start();
			include( locate_template( '/template-parts/fidbox2/fidbox-'.esc_attr($view).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

		}
		
		echo cymolthemes_wp_kses($return);

	}


}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Devfox_Fidbox_Widget() );