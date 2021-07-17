<?php
/**
 * Elementor Portfolio Services Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Services_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Services widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-services-widget';
	}

	/**
	 * Get widget services.
	 *
	 * Retrieve portfolio-services-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-services-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-services-widget widget icon.
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
	 * Retrieve the list of categories the services widget belongs to.
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
	 * Register services widget controls.
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
		
		// About services Icon
		$this->add_control(
		    'portfolio_services_icon',
			[
			    'label' => esc_html__('Services Icon','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Services Icon','portfolio-elementor'),
			]
		);
		
		// Services Title
		$this->add_control(
		    'portfolio_services_title',
			[
			    'label' => esc_html__('Services Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Services Title','portfolio-elementor'),
			]
		);
		
		// Services Description
		$this->add_control(
		    'portfolio_services_description',
			[
			    'label' => esc_html__('Services Description','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Services Description','portfolio-elementor'),
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
		
		// Services Box Options
		$this->add_control(
			'portfolio_services_box_options',
			[
				'label' => esc_html__( 'Services Box', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Services Box Background Color
		$this->add_control(
			'portfolio_services_box_background',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .service-box' => 'background: {{VALUE}}',
				],
			]
		);
		
		// Services Icon Options
		$this->add_control(
			'portfolio_services_icon_options',
			[
				'label' => esc_html__( 'Services Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Services Icon Color
		$this->add_control(
			'portfolio_services_icon_color',
			[
				'label' => esc_html__( 'Services Icon Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .service-icon span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Services Icon Background Color
		$this->add_control(
			'portfolio_services_icon_background',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#e6e6e6',
				'selectors' => [
					'{{WRAPPER}} .service-icon span' => 'background: {{VALUE}}',
				],
			]
		);

		// Services Title Options
		$this->add_control(
			'portfolio_services_title_options',
			[
				'label' => esc_html__( 'Services Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Services Title Color
		$this->add_control(
			'portfolio_services_title_color',
			[
				'label' => esc_html__( 'Services Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#232332',
				'selectors' => [
					'{{WRAPPER}} .service-content h3' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Services Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_services_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .service-content h3',
			]
		);
		
		// Services Description Options
		$this->add_control(
			'portfolio_services_description_options',
			[
				'label' => esc_html__( 'Services Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Services Description Color
		$this->add_control(
			'portfolio_services_description_color',
			[
				'label' => esc_html__( 'Services Description Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#555',
				'selectors' => [
					'{{WRAPPER}} .service-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Services Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_services_description_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .service-content p',
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
		
		// Services Icon Hover Options
		$this->add_control(
			'portfolio_services_icon_hover_options',
			[
				'label' => esc_html__( 'Services Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Services Icon Hover Color
		$this->add_control(
			'portfolio_services_icon_hover_color',
			[
				'label' => esc_html__( 'Services Icon Hover Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .service-box:hover .service-icon span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Services Icon Hover Background Color
		$this->add_control(
			'portfolio_services_icon_hover_background',
			[
				'label' => esc_html__( 'Hover Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .service-box:hover .service-icon span' => 'background: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_tab();
		// end everything related to Hover state here

		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render services widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$services_icon = $settings['portfolio_services_icon'];
		$services_title = $settings['portfolio_services_title'];
		$services_description = $settings['portfolio_services_description'];

    ?>
		<!-- Services Output Start Here -->
			<div class="service-box">
				<div class="service-icon">
					<span><?php echo $services_icon; ?></span>
				</div>
				<div class="service-content">
					<h3><?php echo $services_title; ?></h3>
					<p><?php echo $services_description; ?></p>
				</div>
			</div>
		<!-- Services End Here -->
    <?php
	}

}
