<?php
/**
 * Elementor Portfolio Counter Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Counter_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-counter-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-counter-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-counter-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-counter-widget widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the counter widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'portfolio-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		// Counter Number
		$this->add_control(
			'portfolio_counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Counter Number' , 'portfolio-elementor' ),
			]
		);

		// Counter Title
		$this->add_control(
			'portfolio_counter_title',
			[
				'label' => esc_html__( 'Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Counter Title' , 'portfolio-elementor' ),
			]
		);
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Style tab section
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Content Style', 'portfolio-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);
		
		// start everything related to Normal state here
		$this->start_controls_tab(
			'style_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'portfolio-elementor' ),
			]
		);
		
		// Counter Box Options
		$this->add_control(
			'portfolio_counter_box_options',
			[
				'label' => esc_html__( 'Counter Box', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Counter Box Background Color
		$this->add_control(
			'portfolio_counter_box_background',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#f7f7f7',
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'background: {{VALUE}}',
				],
			]
		);
		
		// Counter Box Border
		$this->add_control(
			'portfolio_counter_box_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#eee',
				'selectors' => [
					'{{WRAPPER}} .counter-box' => 'border: 8px solid {{VALUE}}',
				],
			]
		);

		// Counter Number Options
		$this->add_control(
			'portfolio_counter_number_options',
			[
				'label' => esc_html__( 'Counter Number', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Counter Number Color
		$this->add_control(
			'portfolio_counter_number_color',
			[
				'label' => esc_html__( 'Number Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '232332',
				'selectors' => [
					'{{WRAPPER}} .counter-box h3' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Counter Number Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_counter_number_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .counter-box h3',
			]
		);
		
		// Counter Title Options
		$this->add_control(
			'portfolio_counter_title_options',
			[
				'label' => esc_html__( 'Counter Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Counter Title Color
		$this->add_control(
			'portfolio_counter_title_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#232332',
				'selectors' => [
					'{{WRAPPER}} .counter-box h6' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Counter Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_counter_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .counter-box h6',
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Normal state here

		// start everything related to Hover state here
		$this->start_controls_tab(
			'style_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'portfolio-elementor' ),
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Hover state here

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$counter_number = $settings['portfolio_counter_number'];
		$counter_title = $settings['portfolio_counter_title'];

    ?>
		<!-- Counter Output Start Here -->
			<div class="counter-box rounded py-3 text-center">
				<h3 class="counter-value"><?php echo $counter_number; ?></h3>
				<h6 class="counter-head font-weight-normal mb-0"><?php echo $counter_title; ?></h6>
			</div>
		<!-- Counter End Here -->
    <?php
	}

}
