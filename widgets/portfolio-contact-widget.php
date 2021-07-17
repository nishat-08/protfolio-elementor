<?php
/**
 * Elementor Portfolio Contact Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Contact_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Contact widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-contact-widget';
	}

	/**
	 * Get widget contact.
	 *
	 * Retrieve portfolio-contact-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-contact-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-contact-widget widget icon.
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
	 * Retrieve the list of categories the contact widget belongs to.
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
	 * Register contact widget controls.
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
		
		// Contact Repeater
		$repeater = new \Elementor\Repeater();
		
		// Contact Icon
		$repeater->add_control(
		    'portfolio_contact_icon',
			[
			    'label' => esc_html__('Contact Icon','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Contact Icon','portfolio-elementor'),
			]
		);
		
		// Contact Title
		$repeater->add_control(
		    'portfolio_contact_title',
			[
			    'label' => esc_html__('Contact Title','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Contact Title','portfolio-elementor'),
			]
		);
		
		// Contact Text
		$repeater->add_control(
		    'portfolio_contact_text',
			[
			    'label' => esc_html__('Contact Text','portfolio-elementor'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'separator' => 'before',
				'placeholder' => esc_html__('Enter Contact Text','portfolio-elementor'),
			]
		);
		
		// Contact List
		$this->add_control(
			'portfolio_contact_list',
			[
				'label' => esc_html__( 'Contact List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_contact_icon }}}',
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
		
		// Contact Icon Options
		$this->add_control(
			'portfolio_contact_icon_options',
			[
				'label' => esc_html__( 'Contact Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Icon Color
		$this->add_control(
			'portfolio_contact_icon_color',
			[
				'label' => esc_html__( 'Contact Icon Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .contact-info span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Contact Icon Border
		$this->add_control(
			'portfolio_contact_icon_border',
			[
				'label' => esc_html__( 'Border', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#d1d1d1',
				'selectors' => [
					'{{WRAPPER}} .contact-info span' => 'border-right: 1px solid {{VALUE}}',
				],
			]
		);

		// Contact Title Options
		$this->add_control(
			'portfolio_contact_title_options',
			[
				'label' => esc_html__( 'Contact Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Title Color
		$this->add_control(
			'portfolio_contact_title_color',
			[
				'label' => esc_html__( 'Contact Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#343a40',
				'selectors' => [
					'{{WRAPPER}} .contact-info .info h4' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Contact Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_contact_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .contact-info .info h4',
			]
		);
		
		// Contact Text Options
		$this->add_control(
			'portfolio_contact_text_options',
			[
				'label' => esc_html__( 'Contact Text', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Contact Text Color
		$this->add_control(
			'portfolio_contact_text_color',
			[
				'label' => esc_html__( 'Contact Text Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#333',
				'selectors' => [
					'{{WRAPPER}} .contact-info .info p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Contact Text Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_contact_text_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .contact-info .info p',
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
	 * Render contact widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

    ?>
		<!-- Contact Output Start Here -->
			<div class="contact">
				<?php 
					foreach (  $settings['portfolio_contact_list'] as $item ) { 

						$contact_icon = $item['portfolio_contact_icon'];
						$contact_title = $item['portfolio_contact_title'];
						$contact_text = $item['portfolio_contact_text'];
					?>
					<div class="contact-info">
						<span><?php echo $contact_icon; ?></span>
						<div class="info">
							<h4><?php echo $contact_title; ?> : </h4>
							<p><?php echo $contact_text; ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		<!-- Contact End Here -->
    <?php
	}

}
