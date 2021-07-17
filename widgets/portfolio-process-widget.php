<?php
/**
 * Elementor Portfolio Process Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Process_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Process widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-process-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-process-widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-process-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-process-widget widget icon.
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
	 * Retrieve the list of categories the process widget belongs to.
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
	 * Register process widget controls.
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
		
		// Process Repeater
		$repeater = new \Elementor\Repeater();
		
		// Process Icon
		$repeater->add_control(
			'portfolio_process_icon',
			[
				'label' => esc_html__( 'Process Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Process Icon' , 'portfolio-elementor' ),
			]
		);
		
		// Process Title
		$repeater->add_control(
			'portfolio_process_title',
			[
				'label' => esc_html__( 'Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Process Title' , 'portfolio-elementor' ),
			]
		);
		
		// Process Number
		$repeater->add_control(
			'portfolio_process_number',
			[
				'label' => esc_html__( 'Process Number', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Enter Process Number' , 'portfolio-elementor' ),
			]
		);
		
		// Process List
		$this->add_control(
			'portfolio_process_list',
			[
				'label' => esc_html__( 'Process List', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ portfolio_process_icon }}}',
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
		
		// Process Icon Options
		$this->add_control(
			'portfolio_process_icon_options',
			[
				'label' => esc_html__( 'Process Icon', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Process Icon Color
		$this->add_control(
			'portfolio_process_icon_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .process-icon' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Process Title Options
		$this->add_control(
			'portfolio_process_title_options',
			[
				'label' => esc_html__( 'Process Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Process Title Color
		$this->add_control(
			'portfolio_process_title_color',
			[
				'label' => esc_html__( 'Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .process-item h3' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Process Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_process_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .process-item h3',
			]
		);
		
		// Process Number Options
		$this->add_control(
			'portfolio_process_number_options',
			[
				'label' => esc_html__( 'Process Number', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		// Process Number Background Color
		$this->add_control(
			'portfolio_process_number_background',
			[
				'label' => esc_html__( 'Number Background-Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#e6e6e6',
				'selectors' => [
					'{{WRAPPER}} .process-number' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Process Number Color
		$this->add_control(
			'portfolio_process_number_color',
			[
				'label' => esc_html__( 'Number Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5e9e9f',
				'selectors' => [
					'{{WRAPPER}} .process-number' => 'color: {{VALUE}}',
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
	 * Render process widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		

    ?>
		<!-- Process Output Start Here -->
			<div class="row process">
				<?php 
					foreach (  $settings['portfolio_process_list'] as $key => $item ) { 

						$process_icon = $item['portfolio_process_icon'];
						$process_title = $item['portfolio_process_title'];
						$process_number = $item['portfolio_process_number'];
						
						$is_odd_even = (($key + 1) % 2) ? 'odd': 'even';

						$icon_main_class = '';
						$icon_sub_class = '';

						if ($is_odd_even === 'odd') {
							$icon_main_class = 'align-self-start';
							$icon_sub_class ='mt-auto';
						} else {
							$icon_main_class = 'align-self-end';
							$icon_sub_class ='mb-auto';
						}
					?>
					<div class="col-lg-2 process-item <?= $icon_main_class; ?>">
						<div class="<?= $icon_sub_class; ?>"> 
							<span class="process-number"><?php echo $process_number; ?></span> <span class="process-icon"><?php echo $process_icon; ?></span>
							<h3><?php echo $process_title; ?></h3>
						</div>
				    </div>
				<?php } ?>	
			</div>
		<!-- Process End Here -->
    <?php
	}

}
