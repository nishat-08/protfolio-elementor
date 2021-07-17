<?php
/**
 * Elementor Portfolio Projects Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Projects_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Projects widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-projects-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-projects-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-projects-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-projects-widget widget icon.
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
	 * Retrieve the list of categories the projects widget belongs to.
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
	 * Register projects widget controls.
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
		
		// Projects Repeater
		$repeater = new \Elementor\Repeater();
		
		// Projects Image
		$repeater->add_control(
		    'portfolio_projects_image',
			[
			    'label' => esc_html__('Projects Image','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'placeholder' => esc_html__('Choose Projects Image','portfolio-elementor'),
			]
		);
		
		// Projects Icon
		$repeater->add_control(
			'portfolio_projects_icon',
			[
				'label' => esc_html__( 'Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Projects Icon' , 'portfolio-elementor' ),
			]
		);
		
		// Projects Title
		$repeater->add_control(
			'portfolio_projects_title',
			[
				'label' => esc_html__( 'Projects Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Projects Title' , 'portfolio-elementor' ),
			]
		);
		
		// Projects Sub Title
		$repeater->add_control(
			'portfolio_projects_sub_title',
			[
				'label' => esc_html__( 'Projects Sub Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Projects Sub Title' , 'portfolio-elementor' ),
			]
		);
		
		// Projects List
		$this->add_control(
			'portfolio_projects_list',
			[
				'label' => esc_html__( 'Projects List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_projects_image }}}',
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
		
		// Projects Icon Options
		$this->add_control(
			'portfolio_projects_icon_options',
			[
				'label' => esc_html__( 'Projects Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Projects Icon Color
		$this->add_control(
			'portfolio_projects_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .my-work-content a' => 'color: {{VALUE}}',
				],
			]
		);

		// Projects Title Options
		$this->add_control(
			'portfolio_projects_title_options',
			[
				'label' => esc_html__( 'Projects Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Projects Title Color
		$this->add_control(
			'portfolio_projects_title_color',
			[
				'label' => esc_html__( 'Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .my-work-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Projects Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_projects_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .my-work-content h4',
			]
		);
		
		// Projects Sub Title Options
		$this->add_control(
			'portfolio_projects_sub_title_options',
			[
				'label' => esc_html__( 'Projects Sub Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Projects Sub Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_projects_sub_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .my-work-content h4 span',
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
	 * Render projects widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		

    ?>
		<!-- Projects Output Start Here -->
			<div class="row my-workContainer isotope">
				<?php 
					foreach (  $settings['portfolio_projects_list'] as $item ) { 

						$projects_image = $item['portfolio_projects_image']['url'];
						$projects_icon = $item['portfolio_projects_icon'];
						$projects_title = $item['portfolio_projects_title'];
						$projects_sub_title = $item['portfolio_projects_sub_title'];
					?>
					<div class="col-lg-4 col-sm-6 col-md-4 isotope-item">
						<div class="my-work-item">
							<img src="<?php echo $projects_image; ?>" alt="image" class="img-fluid w-100">
							<div class="my-work-overlay">
								<div class="my-work-content">
									<a href="<?php echo $projects_image; ?>" class="my-work-popup"><?php echo $projects_icon; ?></a>
									<h4><?php echo $projects_title; ?> <span><?php echo $projects_sub_title; ?></span></h4>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>	
			</div>
		<!-- Projects End Here -->
    <?php
	}

}
