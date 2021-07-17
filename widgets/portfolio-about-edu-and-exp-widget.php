<?php
/**
 * Elementor Portfolio About Edu and Exp Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_About_Edu_And_Exp_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio About Edu and Exp widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-about-edu-and-exp-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-about-edu-and-exp-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-about-edu-and-exp-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-about-edu-and-exp-widget widget icon.
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
	 * Retrieve the list of categories the about edu and exp widget belongs to.
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
	 * Register about edu and exp widget controls.
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
		
		// About Edu and Exp Repeater
		$repeater = new \Elementor\Repeater();
		
		// About Edu and Exp Organization
		$repeater->add_control(
			'portfolio_about_edu_and_exp_organization',
			[
				'label' => esc_html__( 'About Edu and Exp Organization', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter About Edu and Exp Organization' , 'portfolio-elementor' ),
			]
		);
		
		// About Edu and Exp Position
		$repeater->add_control(
			'portfolio_about_edu_and_exp_position',
			[
				'label' => esc_html__( 'About Edu and Exp Position', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter About Edu and Exp Position' , 'portfolio-elementor' ),
			]
		);

		// About Edu and Exp Description
		$repeater->add_control(
		    'portfolio_about_edu_and_exp_description',
			[
			    'label' => esc_html__('About Edu and Exp Description','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter About Edu and Exp Description','portfolio-elementor'),
			]
		);;
		
		// About Edu and Exp List
		$this->add_control(
			'portfolio_about_edu_and_exp_list',
			[
				'label' => esc_html__( 'Edu and Exp List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_about_edu_and_exp_organization }}}',
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

		// About Edu and Exp Organization Options
		$this->add_control(
			'portfolio_about_edu_and_exp_organization_options',
			[
				'label' => esc_html__( 'About Edu and Exp Organization', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Edu and Exp Organization Color
		$this->add_control(
			'portfolio_about_edu_and_exp_organization_color',
			[
				'label' => esc_html__( 'Organization Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .about-education-experience ul li h3' => 'color: {{VALUE}}',
				],
			]
		);
		
		// About Edu and Exp Organization Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_about_edu_and_exp_organization_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .about-education-experience ul li h3',
			]
		);
		
		// About Edu and Exp Position Options
		$this->add_control(
			'portfolio_about_edu_and_exp_position_options',
			[
				'label' => esc_html__( 'About Edu and Exp Position', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// About Edu and Exp Position Color
		$this->add_control(
			'portfolio_about_edu_and_exp_position_color',
			[
				'label' => esc_html__( 'Position Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#7a7a7a',
				'selectors' => [
					'{{WRAPPER}} .about-education-experience ul li h5' => 'color: {{VALUE}}',
				],
			]
		);
		
		// About Edu and Exp Position Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_about_edu_and_exp_position_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .about-education-experience ul li h5',
			]
		);
		
		// About Edu and Exp Description Options
		$this->add_control(
			'portfolio_about_edu_and_exp_description_options',
			[
				'label' => esc_html__( 'About Edu and Exp Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// About Edu and Exp Description Color
		$this->add_control(
			'portfolio_about_edu_and_exp_description_color',
			[
				'label' => esc_html__( 'Description Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#676767',
				'selectors' => [
					'{{WRAPPER}} .about-education-experience ul li p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// About Edu and Exp Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_about_edu_and_exp_description_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .about-education-experience ul li p',
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
	 * Render about edu and exp widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		

    ?>
		<!-- About Edu and Exp Output Start Here -->
			<div class="about-education-experience">
				<ul>
					<?php 
						foreach (  $settings['portfolio_about_edu_and_exp_list'] as $item ) { 

							$about_edu_and_exp_organization = $item['portfolio_about_edu_and_exp_organization'];
							$about_edu_and_exp_position = $item['portfolio_about_edu_and_exp_position'];
							$about_edu_and_exp_description = $item['portfolio_about_edu_and_exp_description'];
						?>
						<li>
					
							<h3><?php echo $about_edu_and_exp_organization; ?></h3>
							<h5><?php echo $about_edu_and_exp_position; ?></h5>
							<p><?php echo $about_edu_and_exp_description; ?></p>
						
						</li>
					<?php } ?>
				</ul>	
				<!-- end ul -->
			</div>
		<!-- About Edu and Exp End Here -->
    <?php
	}

}
