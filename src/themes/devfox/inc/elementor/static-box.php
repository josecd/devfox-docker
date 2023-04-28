<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Steps Box
*/
 
class Devfox_Stepsbox_Widget extends Widget_Base{

	public function get_name() {
		return 'cmt_staticbox_element';
	}

	public function get_title() {
		return esc_attr__( 'Step Box', 'devfox' );
	}

	public function get_icon() {
		return ' eicon-menu-toggle';
	}

	public function get_categories() {
		return [ 'devfox_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'General', 'devfox' ),
			]
		);
		
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select StepBox Style', 'devfox' ),
				'description'	=> esc_attr__( 'Select StepBox style.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'style1'	=> esc_attr( 'Style 1' ),
					'style2'	=> esc_attr( 'Style 2' ),
					'style3'	=> esc_attr( 'Style 3' ),
					'style4'	=> esc_attr( 'Style 4' ),
				],
				'default' => esc_attr( 'style1' ),
			]
		);
	
		$this->end_controls_section();

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Content', 'devfox' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_attr__( 'Icon Type', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'icon'	=> esc_attr__( 'Icon', 'devfox' ),
					'image'	=> esc_attr__( 'Image', 'devfox' ),
					'text'	=> esc_attr__( 'Text', 'devfox' ),
				],
				'default' => esc_attr( 'image' ),
			]
		);
		
		$repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'devfox' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'icon_type' => 'icon',
                ]
            ]

		);
		
		 $repeater->add_control(
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
		
		$repeater->add_control(
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

		$repeater->add_control(
			'label',
			[
				'label' => esc_attr__( 'Box Title', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Box Title', 'devfox' ),
				'placeholder' => esc_attr__( 'Box Title', 'devfox' ),
				'label_block' => true,
			]
		);
		
		$repeater->add_control(
			'smalltext',
			[
				'label' => esc_attr__( 'Box Content', 'devfox' ),
				'default' => esc_attr__( 'Box Content', 'devfox' ),
				'placeholder' => esc_attr__( 'Box Content', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'process_number',
			[
				'label' => esc_attr__( 'Number', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => esc_attr__( 'Like 01, 02).', 'devfox' ),
				'placeholder' => esc_attr__( '01', 'devfox' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);
		
		$repeater->add_control(
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
		
		$repeater->add_control(
			'btn_link',
			[
				'label' => esc_attr__( 'Button Link', 'devfox' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		

        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'devfox' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'devfox' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'devfox' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'devfox' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'devfox' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		$link_html = '';
		$image_html		= '' ;

		?>

		

		<div class="cymolthemes-boxes-row-wrapper cmt-processbox-wrapper cmt-processbox-<?php echo esc_attr($style); ?>">

		<?php
			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($boxes) ){
				switch( count($boxes) ){
					case 1:
						$col_start_div	= '<div class="cmt-processbox">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="cmt-processbox">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="cmt-processbox">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="cmt-processbox">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="cmt-processbox">';
						$col_end_div	= '</div>';
						break;
				}
			} ?>

		<?php

		foreach( $settings['boxes'] as $box ){

			$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="cymolthemes-static-box-desc">'.esc_html($box['smalltext']).'</div>' : '' ;
			$label_html		= ( !empty($box['label']) ) ? '<div class="cmt-box-title"><h3>'.esc_html($box['label']).'</h3></div>' : '' ;
		
					$icon = '';
					if( !empty($box['icon_type']) ){

						if( $box['icon_type']=='text' ){
							$icon = '<div class="cmt-stepbox-main-icon"><div class="cmt-ptable-icon-wrapper cmt-ptable-icon-type-text"><span>' . $box['icon_text'] . '</span></div></div>';
							$icon_type_class = 'text';

						} else if($box['icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($box['icon_image']['url']).'" alt="'.esc_attr($box['label']).'" width="185" height="185" />';
							$icon = '<div class="cmt-process-image"><div class="cmt-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $box['icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {
							$icon       = ( !empty($box['icon']['value']) ) ? '<div class="cmt-stepbox-main-icon"><div class="cmt-ptable-icon-wrapper"><i class="' . $box['icon']['value'] . '"></i></div></div>' : '';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$box['icon']['library']);
						}
					}
					
					$process_number = '';
				if( !empty($box['process_number'])){
					$process_number = '<div class="process-num"><span class="number">' . $box['process_number'] . '</span></div>';

				}
				
				if( !empty($box['btn_title']) && !empty($box['btn_link']['url']) ){
					$button_link = $box['btn_link']['url'];
					$button_html = '<div class="cmt-iocnbox-btn">' . cmt_link_render($box['btn_link'], 'start' ) . cymolthemes_wp_kses($box['btn_title']) . cmt_link_render($box['btn_link'], 'end' ) . '</div>';
				}
			
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/stepbox/stepbox-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;

		}		
		
		echo cymolthemes_wp_kses($return);
		
		?>

		</div>

	    <?php
	}


}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Devfox_Stepsbox_Widget() );