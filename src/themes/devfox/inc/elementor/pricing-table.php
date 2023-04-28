<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Cymolthemes Price Table
*/

class Devfox_Pricetable_Widget extends Widget_Base{

	public function get_name() {
		return 'cmt_ptable_element';
	}

	public function get_title() {
		return esc_attr__( 'Pricing Table', 'devfox' );
	}

	public function get_icon() {
		return 'eicon-price-table';
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
				'label'			=> esc_attr__( 'Select Pricetable Style', 'devfox' ),
				'description'	=> esc_attr__( 'Select Pricetable style.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
						'style-1' => esc_attr( 'Style 1' ),	
					],
				'default' => esc_attr( 'style-1' ),
			]
		);
	
		$this->end_controls_section();

        $this->start_controls_section(
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Featured Column', 'devfox' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Featured Column', 'devfox' ),
				'description' => esc_attr__( 'Select whith column will be with featured style.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'devfox' ),
                    '2'	=> esc_attr__( 'Second Column', 'devfox' ),
					'3'	=> esc_attr__( 'Third Column', 'devfox' ),
					'4'	=> esc_attr__( 'Fourth Column', 'devfox' ),
					'5'	=> esc_attr__( 'Fifth Column', 'devfox' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Feature Column Heading', 'devfox' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Featured', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text used as main heading for feature column. Some HTML tags are allowed.', 'devfox' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'devfox' ) , cmt_ordinal($x) ) ,
				]
			);
			
						$this->add_control(
				$x.'_icon_type',
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
				$x.'_icon',
				[
					'label' => __( 'Icon', 'devfox' ),
					'type' => \Elementor\Controls_Manager::ICONS,					
					'condition' => [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => __( 'Select Image for Icon', 'devfox' ),
					'description' => __( 'image will appear at icon position', 'devfox' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			
			$this->add_control(
				$x.'_icon_text',
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
						$x.'_icon_type' => 'text',
					]
				]
			);


			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'devfox' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);
			$this->add_control(
				$x.'_description',
				[
					'label'         => esc_attr__( 'Description', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter description text', 'devfox' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter Price.', 'devfox' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency symbol', 'devfox' ),
				]
			);
			
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'devfox' ),
					'description'	=> esc_html__( 'Select currency position.', 'devfox' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> 'after',
					'options' => [
						'after'		=> __( 'After Price', 'devfox' ),
						'before'	=> __( 'Before Price', 'devfox' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'devfox' ),
					'separator'     => 'after',
				]
			);
			
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'devfox' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'devfox' ),
				]
			);
			
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'devfox' ),
					'type'          => Controls_Manager::URL,
					'description'   => esc_attr__( 'Set link for button', 'devfox' ),
					'separator'     => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'devfox' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			
			$repeater->add_control(
				'icon',
				[
					'label'     => __( 'Icon', 'devfox' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => [
						'value'     => 'fas fa-check',
						'library'   => 'solid',
					],
				]

			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'devfox' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'devfox' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'This is label one', 'devfox' ),
						],
						[
							'text'		=> esc_attr__( 'This is label two', 'devfox' ),
						],
						[
							'text'		=> esc_attr__( 'This is label three', 'devfox' ),
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		}

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>
		<div class="cmt-ptablebox cmt-ptablebox-<?php echo esc_attr($style); ?>">

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}

			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="cmt-pricetable-column-w tm-ptable-col col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="cmt-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="cmt-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="cmt-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="cmt-pricetable-column-w">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="cymolthemes-ptables-w wpb_content_element">';

				foreach( $columns as $col => $highlight_col ){

					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="tm-ptablebox-main-icon"><div class="cmt-ptable-icon-wrapper cmt-ptable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="cmt-ptablebox-main-icon"><div class="cmt-ptable-icon-wrapper cmt-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							$icon       = ( !empty($settings[$col.'_icon']['value']) ) ? '<div class="cmt-ptablebox-main-icon"><div class="cmt-ptable-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div></div>' : '';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
						}
					}
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="cmt-ptablebox-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_text']) ) ? '<div class="ttm-featured-title">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="cmt-ptablebox-featured-col ', 'class="', $col_start_div );
					}

					$heading = ( !empty($settings[$col.'_heading']) ) ? '<div class="cmt-ptablebox-title"><h3>'.$settings[$col.'_heading'].'</h3></div>' : '' ;
					
					$description = ( !empty($settings[$col.'_description']) ) ? '<div class="cmt-ptablebox-description">'.$settings[$col.'_description'].'</div>' : '' ;

					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="cmt-ptablebox-cur-symbol-'.$settings[$col.'_cur_symbol_position'].'">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="cmt-ptablebox-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;
				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="cmt-ptablebox-price">'.$settings[$col.'_price'].'</div>' : '' ;
					
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;

					$lines_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

				
							$lines_html .= isset( $data['text'] ) ? '<li class="cmt-ptable-line">'.$data['text'].'</li>' : '';
						}
					}

					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="cmt-vc_btn3-container cmt-vc_btn3-inline"><div class="cmt-vc_general cmt-vc_btn3 cmt-vc_btn3-size-md cmt-vc_btn3-shape-square cmt-vc_btn3-style-outline cmt-vc_btn3-weight-no cmt-vc_btn3-color-grey">' . cmt_link_render($settings[$col.'_btn_link'], 'start' ) . cymolthemes_wp_kses($settings[$col.'_btn_text']) . cmt_link_render($settings[$col.'_btn_link'], 'end' ) . '</div></div>';
					}

					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/template-parts/pricingtable/pricetable-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo cymolthemes_wp_kses($return);
			?>

		</div>

		<?php

	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Devfox_Pricetable_Widget() );