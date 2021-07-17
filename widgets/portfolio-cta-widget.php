<?php
/**
 * Elementor Portfolio CTA Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_CTA_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio CTA widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-cta-widget';
	}

	/**
	 * Get widget cta.
	 *
	 * Retrieve portfolio-cta-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-cta-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-cta-widget widget icon.
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
	 * Retrieve the list of categories the cta widget belongs to.
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
	 * Register cta widget controls.
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
		
		// CTA Image
		$this->add_control(
		    'portfolio_cta_image',
			[
			    'label' => esc_html__('CTA Image','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Choose CTA Image','portfolio-elementor'),
			]
		);
		
		// CTA Title
		$this->add_control(
		    'portfolio_cta_title',
			[
			    'label' => esc_html__('CTA Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter CTA Title','portfolio-elementor'),
			]
		);
		
		// CTA Description
		$this->add_control(
		    'portfolio_cta_description',
			[
			    'label' => esc_html__('CTA Description','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter CTA Description','portfolio-elementor'),
			]
		);
		
		//CTA Button Link
		$this->add_control(
		    'portfolio_cta_button_link',
			[
			    'label'         => esc_html__('CTA Button Link','portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::URL,
				'label_block'   => true,
				'default'       => [
				    'url'   => '#',
				],
			]
		);
		
		// CTA Button Text
        $this->add_control(
        	'portfolio_cta_button_text',
			[
				'label'         => esc_html__('CTA Button Text', 'portfolio-elementor'),
				'type'          => \Elementor\Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__('Enter Button Text','portfolio-elementor'),
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

		// CTA Title Options
		$this->add_control(
			'portfolio_cta_title_options',
			[
				'label' => esc_html__( 'CTA Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Title Color
		$this->add_control(
			'portfolio_cta_title_color',
			[
				'label' => esc_html__( 'CTA Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cta-block-content h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		// CTA Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_cta_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cta-block-content h4',
			]
		);
		
		// CTA Description Options
		$this->add_control(
			'portfolio_cta_description_options',
			[
				'label' => esc_html__( 'CTA Description', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// CTA Description Color
		$this->add_control(
			'portfolio_cta_description_color',
			[
				'label' => esc_html__( 'CTA Description Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cta-block-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// CTA Description Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_cta_description_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cta-block-content p',
			]
		);
		
		// CTA Button Options
		$this->add_control(
			'portfolio_cta_btn_options',
			[
				'label' => esc_html__( 'CTA Button', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// CTA Button Color
		$this->add_control(
			'portfolio_cta_btn_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'color: {{VALUE}}',
				],
			]
		);
		
		// CTA Button Background Color
		$this->add_control(
			'portfolio_cta_btn_background_color',
			[
				'label' => esc_html__( 'Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		// CTA Button Border
		$this->add_control(
			'portfolio_cta_btn_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .site-btn' => 'border: 2px solid {{VALUE}}',
				],
			]
		);
		
		// CTA Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_cta_btn_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cta-block-btn a',
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
		
		// CTA Button Hover Options
		$this->add_control(
			'portfolio_cta_btn_hover_options',
			[
				'label' => esc_html__( 'CTA Button', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// CTA Button Hover Color
		$this->add_control(
			'portfolio_cta_btn_hover_color',
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
		
		// CTA Button Hover Background Color
		$this->add_control(
			'portfolio_cta_btn_hover_background_color',
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
		
		// CTA Button Hover Border
		$this->add_control(
			'portfolio_cta_btn_hover_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .site-btn:hover' => 'border: 2px solid {{VALUE}}',
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
	 * Render cta widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$cta_image = $settings['portfolio_cta_image']['url'];
		$cta_title = $settings['portfolio_cta_title'];
		$cta_description = $settings['portfolio_cta_description'];
		$cta_btn_link = $settings['portfolio_cta_button_link']['url'];
		$cta_btn_text = $settings['portfolio_cta_button_text'];

    ?>
		<!-- CTA Output Start Here -->
			<div class="row">
			   <div class="col-md-9 col-sm-8">
					<div class="cta-block-content">
						<img src="<?php echo $cta_image; ?>" alt="">
						<h4><?php echo $cta_title; ?></h4>
						<p><?php echo $cta_description; ?></p>
					</div>
				</div>
				<div class="col-md-3 col-sm-4">
					<div class="cta-block-btn">
						<a href="<?php echo esc_url($cta_btn_link); ?>" class="site-btn btn-line mr-4 mb-2"><?php echo $cta_btn_text; ?></a>
					</div>
				</div>
			</div>
	<!-- CTA End Here -->
    <?php
	}

}
