<?php
/**
 * Elementor Portfolio Section Heading Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Section_Heading_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Section Heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-section-heading-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-section-heading-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-section-heading-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-section-heading-widget widget icon.
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
	 * Retrieve the list of categories the section-heading widget belongs to.
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
	 * Register section-heading widget controls.
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
		
		// Section Heading Title
		$this->add_control(
		    'portfolio_section_heading_title',
			[
			    'label' => esc_html__('Section Heading Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Section Heading Title','portfolio-elementor'),
			]
		);
		
		// Section Heading Sub Title 
		$this->add_control(
		    'portfolio_section_heading_sub_title',
			[
			    'label' => esc_html__('Section Heading Sub Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Section Heading Sub Title','portfolio-elementor'),
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

		// Section Heading Title Options
		$this->add_control(
			'portfolio_section_heading_title_options',
			[
				'label' => esc_html__( 'Section Heading Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Section Heading Title Color
		$this->add_control(
			'portfolio_section_heading_title_color',
			[
				'label' => esc_html__( 'Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#dee3e4',
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Section Heading Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_section_heading_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title h2',
			]
		);
		
		// Section Heading Sub Title Options
		$this->add_control(
			'portfolio_section_heading_sub_title_options',
			[
				'label' => esc_html__( 'Section Heading Sub Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Section Heading Sub Title Color
		$this->add_control(
			'portfolio_section_heading_sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#343a40',
				'selectors' => [
					'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Section Heading Sub Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_section_heading_sub_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .section-title p',
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
	 * Render section-heading widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$section_heading_title = $settings['portfolio_section_heading_title'];
		$section_heading_sub_title = $settings['portfolio_section_heading_sub_title'];

    ?>
		<!-- Section Heading Output Start Here -->
			<div class="row">
				<div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
					<div class="section-title text-center">
						<h2 class="mb-0"><?php echo $section_heading_title; ?></h2>
						<p class="align-self-center mb-0"><?php echo $section_heading_sub_title; ?><span class="heading-separator-line mx-auto"></span> </p>
					</div>
				</div>
			</div>
		<!-- Section Heading End Here -->
    <?php
	}

}
