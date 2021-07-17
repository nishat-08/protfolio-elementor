<?php
/**
 * Elementor Portfolio About Skills Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_About_Skills_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio About Skills widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-about-skills-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-about-skills-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-about-skills-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-about-skills-widget widget icon.
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
	 * Register about skills widget controls.
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
		
		// About Skills Repeater
		$repeater = new \Elementor\Repeater();
		
		// About Skills Name
		$repeater->add_control(
			'portfolio_about_skills_name',
			[
				'label' => esc_html__( 'About Skills Name', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter About Skills Name' , 'portfolio-elementor' ),
			]
		);

		// About Skills Percentage
		$repeater->add_control(
			'portfolio_about_skills_percentage',
			[
				'label' => esc_html__( 'Percentage', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter About Skills Percentage' , 'portfolio-elementor' ),
			]
		);
		
		// About Skills List
		$this->add_control(
			'portfolio_about_skills_list',
			[
				'label' => esc_html__( 'Skills List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_about_skills_name }}}',
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

		// About Skills Name Options
		$this->add_control(
			'portfolio_about_skills_name_options',
			[
				'label' => esc_html__( 'About Skills Name', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Skills Name Color
		$this->add_control(
			'portfolio_about_skills_name_color',
			[
				'label' => esc_html__( 'Name Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .about-skills p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// About Skills Name Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_about_skills_name_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .about-skills p',
			]
		);
		
		// About Skills Progress Options
		$this->add_control(
			'portfolio_about_skills_progress_options',
			[
				'label' => esc_html__( 'About Skills Progress', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// About Skills Progress Background Color
		$this->add_control(
			'portfolio_about_skills_progress_background',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => 'F4F4F4',
				'selectors' => [
					'{{WRAPPER}} .about-skills .about-progress' => 'background: {{VALUE}}',
				],
			]
		);
		
		// About Skills Percentage Options
		$this->add_control(
			'portfolio_about_skills_percentage_options',
			[
				'label' => esc_html__( 'About Skills Percentage', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// About Skills Percentage Color
		$this->add_control(
			'portfolio_about_skills_percentage_color',
			[
				'label' => esc_html__( 'Percentage Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .about-progress-bar span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// About Skills Percentage Background Color
		$this->add_control(
			'portfolio_about_skills_percentage_background',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .about-progress .about-progress-bar' => 'background: {{VALUE}}',
				],
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
	 * Render about skills widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		

    ?>
		<!-- About Skills Output Start Here -->
			<div class="about-skills">
				<?php 
					foreach (  $settings['portfolio_about_skills_list'] as $item ) { 

						$about_skills_name = $item['portfolio_about_skills_name'];
						$about_skills_percentage = $item['portfolio_about_skills_percentage'];
					?>
					<p><?php echo $about_skills_name; ?></p>
					<div class="about-progress">
					   <div class="about-progress-bar" role="progressbar" style="width: <?php echo $about_skills_percentage; ?>%;"><span><?php echo $about_skills_percentage; ?>%</span></div>
					</div>
				<?php } ?>	
			</div>
		<!-- About Skills End Here -->
    <?php
	}

}
