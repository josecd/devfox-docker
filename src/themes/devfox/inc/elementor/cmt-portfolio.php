<?php
namespace Elementor; 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 *  Blog Box
*/

class Devfox_Portfoliobox_Widget extends Widget_Base{

	public function get_name() {
		return 'cmt_project_element';
	}

	public function get_title() {
		return esc_attr__( 'Portfolio Box Element', 'devfox' );
	}
	
	public function get_icon() {
		return 'eicon-gallery-grid';
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
				'label'			=> esc_attr__( 'Select Portfolio Style', 'devfox' ),
				'description'	=> esc_attr__( 'Select Portfolio style.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'options' => [
					'styleone'	=> esc_attr( 'PortfolioBox Style 1' ),
					'styletwo'	=> esc_attr( 'PortfolioBox Style 2' ),
					'stylethree'	=> esc_attr( 'PortfolioBox Style 3' ),
					'stylefour'	=> esc_attr( 'PortfolioBox Style 4' ),
				],
				'default' => esc_attr( 'styleone' ),
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
				'default' => esc_attr__( 'Our Projects', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text for heading text.', 'devfox' ),
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
				'default' => esc_attr__( '', 'devfox' ),
				'placeholder' => esc_attr__( 'Enter text for subheading text.', 'devfox' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'reverse_heading',
			[
				'label' => esc_attr__( 'Reverse heading order', 'devfox' ),
				'description' => esc_attr__( 'Show sub-heading before heading.', 'devfox' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'devfox' ),
				'label_off' => esc_attr__( 'No', 'devfox' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description text', 'devfox' ),
			]
		);
		
		$this->add_control(
			'heading_sep',
			[
				'label' => esc_attr__( 'Seperator', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none'	=> esc_attr( 'None' ),
					'solid'	=> esc_attr( 'Solid' ),
					'style1'	=> esc_attr( 'Style 1' ),
				],
				'default' => esc_attr( 'solid' ),
			]
		);
		
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Text Alignment', 'devfox' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'devfox' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'devfox' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'devfox' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'cmt-align-',
				'selectors' => [
					'{{WRAPPER}} .cmt-heading-subheading' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);
		
		$this->add_control(
			'heading_style',
			[
				'label'			=> esc_attr__( 'Heading Style', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'vertical'	=> esc_attr( 'Vertical (Default)' ),
					'horizontal'	=> esc_attr( 'Horizontal' ),
				],
				'default' => esc_attr( 'vertical' ),
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
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Box Design', 'devfox' ),
			]
		);
		
		$this->add_control(
			'from_category',
			[
				'label' => esc_attr__( 'From Category ?', 'devfox' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_category(),
				'multiple' => true,
				'label_block'	=> true,
				'placeholder' => esc_attr__( 'All Categories', 'devfox' ),
			]
		);
		
		$this->add_control(
			'show',
			[
				'label' => esc_attr__( 'Post to show', 'devfox' ),
				'description' => esc_attr__( 'How many item you want to show.', 'devfox' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '3',
			]
		);
		
		$this->add_control(
			'sortable',
			[
				'label' => esc_attr__( 'Show Sortable Category Links', 'devfox' ),
				'description' => esc_attr__( 'Show sortable category links above items so user can sort by just single click.', 'devfox' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'devfox' ),
				'label_off' => esc_attr__( 'No', 'devfox' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
		$this->add_control(
			'allword',
			[
				'label' => esc_attr__( 'Replace ALL word', 'devfox' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'All', 'devfox' ),
				'placeholder' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'devfox' ),
				'label_block' => true,
				'condition' => [
					'sortable' => 'yes',
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_attr__( 'Order', 'devfox' ),
				'description' => esc_attr__( 'Designates the ascending or descending order.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'devfox' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'devfox' ),
				]
			]
		);
		
		$this->add_control(
			'orderby',
			[
				'label' => esc_attr__( 'Order By', 'devfox' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'none'		=> esc_attr__( 'No order', 'devfox' ),
					'ID'		=> esc_attr__( 'ID', 'devfox' ),
					'title'		=> esc_attr__( 'Title', 'devfox' ),
					'date'		=> esc_attr__( 'Date', 'devfox' ),
					'rand'		=> esc_attr__( 'Random', 'devfox' ),
				]
			]
		);
		
		$this->add_control(
			'gap',
			[
				'label' => esc_attr__( 'Box Gap', 'devfox' ),
				'description' => esc_attr__( 'Gap between each Post box.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'default' => '30px',
				'options' => [
					'0px'		=> esc_attr__( 'No Gap (0px)', 'devfox' ),
					'5px'		=> esc_attr__( '5px', 'devfox' ),
					'10px'		=> esc_attr__( '10px', 'devfox' ),
					'15px'		=> esc_attr__( '15px', 'devfox' ),
					'20px'		=> esc_attr__( '20px', 'devfox' ),
					'25px'		=> esc_attr__( '25px', 'devfox' ),
					'30px'		=> esc_attr__( '30px', 'devfox' ),
					'35px'		=> esc_attr__( '35px', 'devfox' ),
					'40px'		=> esc_attr__( '40px', 'devfox' ),
					'45px'		=> esc_attr__( '45px', 'devfox' ),
					'50px'		=> esc_attr__( '50px', 'devfox' ),
				]
			]
		);
		$this->end_controls_section();
		
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Box Design', 'devfox' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
	
		$this->add_control(
			'column',
			[
				'label'			=> esc_attr__( 'Select Column', 'devfox' ),
				'description'	=> esc_attr__( 'Select column.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'three',
				'options'		=> [
					'one'				=> esc_attr__( 'One Column', 'devfox' ),
					'two'				=> esc_attr__( 'Two Column', 'devfox' ),
					'three'				=> esc_attr__( 'Three Column', 'devfox' ),
					'four'				=> esc_attr__( 'Four Column', 'devfox' ),
					'five'				=> esc_attr__( 'Five Column', 'devfox' ),
					'six'				=> esc_attr__( 'Six Column', 'devfox' ),
				],
			]
		);
		
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'Box View', 'devfox' ),
				'description'	=> esc_attr__( 'Select box view. Show as normal row and column or show with carousel effect.', 'devfox' ),
				'type' => Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> 'default',
				'options'		=> [
					'default'	=> esc_attr__( 'Row and Column', 'devfox' ),
					'carousel'	=> esc_attr__( 'Carousel effect', 'devfox' ),
				]
			]
		);

		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Settings', 'devfox' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);

		$this->add_control(
			'cmt-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel Effect: Slide/Fade animation speed.', 'devfox' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '4500',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'cmt-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop Item', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel Effect: Infinite loop sliding.', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'devfox' ),
					'0'				=> esc_attr__( 'No', 'devfox' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'cmt-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel Effect: Enable/disable Autoplay', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'devfox' ),
					'0'				=> esc_attr__( 'No', 'devfox' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_nav',
			[
				'label'			=> esc_attr__( 'Carousel: Next/Prev Arrows', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'devfox' ),
					'0'				=> esc_attr__( 'No', 'devfox' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		$this->add_control(
			'carousel_arrowtype',
			[
				'label'			=> esc_attr__( 'Carousel:Button Type', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel button type.', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'square'			=> esc_attr__( 'Square', 'devfox' ),
					'round'				=> esc_attr__( 'Round', 'devfox' ),
				],
				'default'		=> 'square',
				'condition'		=> [
					'view-type'		=> 'carousel',
					'carousel_nav'		=> '1',
				]
			]
		);
		
		$this->add_control(
			'carousel_dots',
			[
				'label'			=> esc_attr__( 'Carousel: dots', 'devfox' ),
				'description'	=> esc_attr__( 'Carousel Effect: Show dots navigation.', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'devfox' ),
					'0'				=> esc_attr__( 'No', 'devfox' ),
				],
				'default'		=> '0',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'carousel_slidestoscroll',
			[
				'label'			=> esc_attr__( 'Carousel: slidesToScroll', 'devfox' ),
				'description'	=> esc_attr__( '# of slides to scroll', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'options'		=> [
					'1'				=> esc_attr__( '1 Slide', 'devfox' ),
					'column'		=> esc_attr__( 'Same as column', 'devfox' ),
				],
				'default'		=> '1',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		
		$this->add_control(
			'cmt-centermode',
			[
				'label'			=> esc_attr__( 'Carousel: centerMode', 'devfox' ),
				'description'	=> esc_attr__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'devfox' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'devfox' ),
					'0'				=> esc_attr__( 'No', 'devfox' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
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
						'{{WRAPPER}} .cmt-element-content-heading' => 'color: {{VALUE}};',
						'{{WRAPPER}} .cmt-element-content-heading > a' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'heading_typography',
					'selector' => '{{WRAPPER}} .cmt-element-content-heading',
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
						'{{WRAPPER}} .cmt-element-content-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .cmt-element-subheading' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
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
						'{{WRAPPER}} .cmt-element-content-desctxt' => 'color: {{VALUE}};',
					]
				]
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'desc_typography',
					'selector' => '{{WRAPPER}} .cmt-element-content-desctxt',
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
						'{{WRAPPER}} .cmt-element-content-desctxt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$start_div = cmt_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'portfolio',
			'data'		=> $settings
		) );

		echo cymolthemes_wp_kses($start_div);

		$args = array(
			'post_type'				=> 'cmt_portfolio',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);

		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}

		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'cmt_portfolio_category',
					'field'    => 'slug',
					'terms'    => $from_category,
				),
			);
		};

		$posts = new \WP_Query( $args );
		
		$headingclass= '';
		if( empty($settings['heading']) ){
			$headingclass = 'cmt-boxwithout-heading';
		}

		if ( $posts->have_posts() ) {
			?>

			<div class="cymolthemes-box-heading-wrapper <?php echo cymolthemes_wp_kses($headingclass); ?>">
				<?php cmt_heading_subheading($settings, true); ?>
				<?php
				if( function_exists('cymolthemes_get_filterbutton') ){
					$sortable_category_html = cymolthemes_get_filterbutton( $settings, 'cmt_portfolio_category' );
					echo $sortable_category_html;
				}
				?>
			</div>

			<div class="cymolthemes-boxes-row-wrapper row multi-columns-row">

			<?php
			while ( $posts->have_posts() ) {
				$return = '';
				$posts->the_post();

				if( file_exists( locate_template( '/template-parts/portfoliobox/portfoliobox-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= cmt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'portfolio',
						'taxonomy'	=> 'cmt_portfolio_category',
						'style'		=> $style,
					) );

					ob_start();
					$r = include( locate_template( '/template-parts/portfoliobox/portfoliobox-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= cmt_element_block_container( array(
						'position'	=> 'end',
					) );

				}

				echo cymolthemes_wp_kses($return);

			}
			?>

			</div>

			<?php
		}

	    wp_reset_postdata();
		
		$end_div = cmt_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'portfolio',
			'data'		=> $settings
		) );
		echo cymolthemes_wp_kses($end_div);
	}


	protected function select_category() {
	  	$category = get_terms( array( 'taxonomy' => 'cmt_portfolio_category', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}
	
}
// Register widget
Plugin::instance()->widgets_manager->register_widget_type( new Devfox_Portfoliobox_Widget() );