<?php
/**
 * Elementor Portfolio Testimonial Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Testimonial_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Testimonial widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-testimonial-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-testimonial-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-testimonial-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-testimonial-widget widget icon.
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
	 * Retrieve the list of categories the about skills widget belongs to.
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
	 * Register testimonial widget controls.
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
		
		// Testimonial Repeater
		$repeater = new \Elementor\Repeater();
		
		// Testimonial Image
		$repeater->add_control(
		    'portfolio_testimonial_image',
			[
			    'label' => esc_html__('Testimonial Image','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'placeholder' => esc_html__('Choose Testimonial Image','portfolio-elementor'),
			]
		);
		
		// Testimonial Description
		$repeater->add_control(
			'portfolio_testimonial_description',
			[
				'label' => esc_html__( 'Testimonial Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Testimonial Description' , 'portfolio-elementor' ),
			]
		);

		// Testimonial Client Name
		$repeater->add_control(
			'portfolio_testimonial_client_name',
			[
				'label' => esc_html__( 'Client Name', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Testimonial Client Name' , 'portfolio-elementor' ),
			]
		);
		
		// Testimonial Client Designation
		$repeater->add_control(
			'portfolio_testimonial_client_designation',
			[
				'label' => esc_html__( 'Client Designation', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Testimonial Client Designation' , 'portfolio-elementor' ),
			]
		);
		
		// Testimonial List
		$this->add_control(
			'portfolio_testimonial_list',
			[
				'label' => esc_html__( 'Skills List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_testimonial_image }}}',
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

		// Testimonial Description Options
		$this->add_control(
			'portfolio_testimonial_description_options',
			[
				'label' => esc_html__( 'Testimonial Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Testimonial Description Color
		$this->add_control(
			'portfolio_testimonial_description_color',
			[
				'label' => esc_html__( 'Description Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .clients-text p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Testimonial Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_testimonial_description_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .clients-text p',
			]
		);
		
		// Testimonial Client Name Options
		$this->add_control(
			'portfolio_testimonial_client_name_options',
			[
				'label' => esc_html__( 'Testimonial Client Name', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Testimonial Client Name Color
		$this->add_control(
			'portfolio_testimonial_client_name_color',
			[
				'label' => esc_html__( 'Client Name Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .clients-text h5' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Testimonial Client Name Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_testimonial_client_name_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .clients-text h5',
			]
		);
		
		// Testimonial Client Designation Options
		$this->add_control(
			'portfolio_testimonial_client_designation_options',
			[
				'label' => esc_html__( 'Testimonial Client Designation', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Testimonial Client Designation Color
		$this->add_control(
			'portfolio_testimonial_client_designation_color',
			[
				'label' => esc_html__( 'Client Designation Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .clients-text span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Testimonial Client Designation Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_testimonial_client_designation_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .clients-text span',
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
	 * Render testimonial widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		

    ?>
		<!-- Testimonial Output Start Here -->
			<div class="testimonial">
				<?php 
					foreach (  $settings['portfolio_testimonial_list'] as $item ) { 

						$testimonial_image = $item['portfolio_testimonial_image']['url'];
						$testimonial_description = $item['portfolio_testimonial_description'];
						$testimonial_client_name = $item['portfolio_testimonial_client_name'];
						$testimonial_client_designation = $item['portfolio_testimonial_client_designation'];
					?>
					<div class="clients-single">
						<div class="clients-wrapper">
							<div class="clients-img text-center">
								<img src="<?php echo $testimonial_image; ?>" alt="">
							</div>
							<div class="clients-text">
								<p><?php echo $testimonial_description; ?></p>
								<h5><?php echo $testimonial_client_name; ?></h5>
								<span><?php echo $testimonial_client_designation; ?></span>
							</div>
						</div>
					</div>
				<?php } ?>	
			</div>
		<!-- Testimonial End Here -->
    <?php
	}

}
