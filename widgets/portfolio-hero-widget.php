<?php
/**
 * Elementor Portfolio Hero Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Hero_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Hero widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-hero-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-hero-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-hero-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-hero-widget widget icon.
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
	 * Retrieve the list of categories the hero widget belongs to.
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
	 * Register hero widget controls.
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
		
		// Hero Title
		$this->add_control(
		    'portfolio_hero_title',
			[
			    'label' => esc_html__('Hero Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Hero Title','portfolio-elementor'),
			]
		);
		
		// Hero Sub Title Two
		$this->add_control(
		    'portfolio_hero_sub_title_one',
			[
			    'label' => esc_html__('Hero Sub Title Two','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Hero Sub Title Two','portfolio-elementor'),
			]
		);
		
		// Hero Sub Title Two
		$this->add_control(
		    'portfolio_hero_sub_title_two',
			[
			    'label' => esc_html__('Hero Sub Title Two','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Hero Sub Title Two','portfolio-elementor'),
			]
		);
		
		// Hero Description
		$this->add_control(
		    'portfolio_hero_description',
			[
			    'label' => esc_html__('Hero Description','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Hero Description','portfolio-elementor'),
			]
		);
		
		//Hero Button One Link
		$this->add_control(
		    'portfolio_hero_button_one_link',
			[
			    'label'         => esc_html__('Hero Button One Link','portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::URL,
				'label_block'   => true,
				'default'       => [
				    'url'   => '#',
				],
			]
		);
		
		// Hero Button One Text
        $this->add_control(
        	'portfolio_hero_button_one_text',
			[
				'label'         => esc_html__('Hero Button One Text', 'portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__('Enter Button One Text','portfolio-elementor'),
			]
        );
		
		//Hero Button Two Link
		$this->add_control(
		    'portfolio_hero_button_two_link',
			[
			    'label'         => esc_html__('Hero Button Two Link','portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::URL,
				'label_block'   => true,
				'default'       => [
				    'url'   => '#',
				],
			]
		);
		
		// Hero Button Two Text
        $this->add_control(
        	'portfolio_hero_button_two_text',
			[
				'label'         => esc_html__('Hero Button Two Text', 'portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__('Enter Button Two Text','portfolio-elementor'),
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

		// Hero Title Options
		$this->add_control(
			'portfolio_hero_title_options',
			[
				'label' => esc_html__( 'Hero Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Hero Title Color
		$this->add_control(
			'portfolio_hero_title_color',
			[
				'label' => esc_html__( 'Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#001418',
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_hero_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-title',
			]
		);
		
		// Hero Sub Title One Options
		$this->add_control(
			'portfolio_hero_sub_title_one_options',
			[
				'label' => esc_html__( 'Hero Sub Title One', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Hero Sub Title One Color
		$this->add_control(
			'portfolio_hero_sub_title_one_color',
			[
				'label' => esc_html__( 'Sub Title One Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#343a40',
				'selectors' => [
					'{{WRAPPER}} .hero-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Sub Title One Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_hero_sub_title_one_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-content h4',
			]
		);
		
		// Hero Sub Title Two Options
		$this->add_control(
			'portfolio_hero_sub_title_one_options',
			[
				'label' => esc_html__( 'Hero Sub Title Two', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Hero Sub Title Two Color
		$this->add_control(
			'portfolio_hero_sub_title_two_color',
			[
				'label' => esc_html__( 'Sub Title Two Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .typed' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Sub Title Two Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_hero_sub_title_two_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .typed',
			]
		);
		
		// Hero Description Options
		$this->add_control(
			'portfolio_hero_description_options',
			[
				'label' => esc_html__( 'Hero Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Hero Description Color
		$this->add_control(
			'portfolio_hero_description_color',
			[
				'label' => esc_html__( 'Description Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#343a40',
				'selectors' => [
					'{{WRAPPER}} .hero-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_hero_description_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-content p',
			]
		);
		
		// Hero Button One Options
		$this->add_control(
			'portfolio_hero_btn_one_options',
			[
				'label' => esc_html__( 'Hero Button One', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Hero Button One Color
		$this->add_control(
			'portfolio_hero_btn_one_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .btn span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button One Background Color
		$this->add_control(
			'portfolio_hero_btn_one_background_color',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button One Border
		$this->add_control(
			'portfolio_hero_btn_one_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .btn' => 'border: 1px solid {{VALUE}}',
				],
			]
		);
		
		// Hero Button Two Options
		$this->add_control(
			'portfolio_hero_btn_two_options',
			[
				'label' => esc_html__( 'Hero Button Two', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Hero Button Two Color
		$this->add_control(
			'portfolio_hero_btn_two_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button Two Background Color
		$this->add_control(
			'portfolio_hero_btn_two_background_color',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button Two Border
		$this->add_control(
			'portfolio_hero_btn_two_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'border: 1px solid {{VALUE}}',
				],
			]
		);
		
		// Hero Button Options
		$this->add_control(
			'portfolio_hero_btn_options',
			[
				'label' => esc_html__( 'Hero Button', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Hero Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_hero_btn_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .hero-content a',
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
		
		// Hero Button One Hover Options
		$this->add_control(
			'portfolio_hero_btn_one_hover_options',
			[
				'label' => esc_html__( 'Hero Button', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Hero Button One Hover Color
		$this->add_control(
			'portfolio_hero_btn_one_hover_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .btn:hover span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button Two Hover Options
		$this->add_control(
			'portfolio_hero_btn_two_hover_options',
			[
				'label' => esc_html__( 'Hero Button', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Hero Button Two Hover Color
		$this->add_control(
			'portfolio_hero_btn_two_hover_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .site-btn:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Hero Button Two Hover Background Color
		$this->add_control(
			'portfolio_hero_btn_two_hover_background_color',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .site-btn:hover' => 'background-color: {{VALUE}}',
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
	 * Render hero widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$hero_title = $settings['portfolio_hero_title'];
		$hero_sub_title_one = $settings['portfolio_hero_sub_title_one'];
		$hero_sub_title_two = $settings['portfolio_hero_sub_title_two'];
		$hero_description = $settings['portfolio_hero_description'];
		$hero_btn_one_link = $settings['portfolio_hero_button_one_link']['url'];
		$hero_btn_one_text = $settings['portfolio_hero_button_one_text'];
		$hero_btn_two_link = $settings['portfolio_hero_button_two_link']['url'];
		$hero_btn_two_text = $settings['portfolio_hero_button_two_text'];
    ?>
		<!-- Hero Output Start Here -->
		<section class="intro-section h-100 pt-110 pb-110 text-center" id="home">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-content">
						<h1 class="hero-title mb-3"><?php echo $hero_title; ?></h1>
						<h4 class="mb-0">
							<?php echo $hero_sub_title_one; ?>
							<span id="typed" class="typed"><?php echo $hero_sub_title_two; ?></span>
						</h4>
						<p class="max-width-450 mx-0 my-4 mb-3"><?php echo $hero_description; ?></p>
						<a href="<?php echo esc_url($hero_btn_one_link); ?>" class="btn mr-4 mb-2 "><span><?php echo $hero_btn_one_text; ?></span></a>
						<a href="<?php echo esc_url($hero_btn_two_link); ?>" class="site-btn btn-line mr-4 mb-2"><?php echo $hero_btn_two_text; ?></a>
					</div>
				</div>
				</div>
		</section>
		<!-- Hero End Here -->
    <?php
	}

}
