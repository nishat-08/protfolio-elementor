<?php
/**
 * Elementor Portfolio My Offer Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_My_offer_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio My Offer widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-my-offer-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-my-offer-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-my-offer-widget', 'portfolio-elementor' );
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
	 * Retrieve the list of categories the my offer widget belongs to.
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
	 * Register my offer widget controls.
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

        // My offer Heading
		$this->add_control(
		    'ewa_my_offer_heading',
			[
			    'label' => esc_html__('Heading','ewa-elementor-rosie'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('Enter My offer Heading','ewa-elementor-rosie'),
			]
		);
        
		// My offer Description
		$this->add_control(
		    'ewa_my_offer_des',
			[
			    'label' => esc_html__('Description','ewa-elementor-rosie'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('Enter My offer Description','ewa-elementor-rosie'),
			]
		);
		
		// My offer Title
		$this->add_control(
		    'ewa_my_offer_title',
			[
			    'label' => esc_html__('Title','ewa-elementor-rosie'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__('Enter My offer Title','ewa-elementor-rosie'),
			]
		);
		
		
		// My offer image
		$this->add_control(
		    'ewa_my_offer_image',
			[
			    'label' => esc_html__('Choose My offer Image','ewa-elementor-rosie'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				    'url' => \Elementor\Utils::get_placeholder_image_src(),          
				],
			]
		);
		
		//My offer Icon Code
		$this->add_control(
		    'ewa_my_offer_icon_code',
			[
			    'label' => esc_html__('Icon','ewa-elementor-rosie'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__('Enter Icon Code','ewa-elementor-rosie'),
			]
		);
		
		// My offer repeater
		$repeater = new \Elementor\Repeater();

		// Repeater for Accordion Title
		$repeater->add_control(
			'ewa_my_offer_accordion_title',
			[
				'label' => esc_html__( 'Accordion Title', 'ewa-elementor-rosie' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Add New Accordion' , 'ewa-elementor-rosie' ),
			]
		);
		
		// Repeater for Accordion Inner
		$repeater->add_control(
			'ewa_my_offer_accordion_inner',
			[
				'label' => esc_html__( 'Accordion Inner', 'ewa-elementor-rosie' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'label_block' => true,
				'default' => esc_html__( 'Add New Accordion Inner' , 'ewa-elementor-rosie' ),
			]
		);
		
		// Accordion List
		$this->add_control(
			'ewa_my_offer_accordion_list',
			[
				'label' => esc_html__( 'Accordion List', 'ewa-elementor-rosie' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ ewa_my_offer_accordion_title }}}',
			]
		);
		

		$this->end_controls_section();

	}

	/**
	 * Render my offer widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		$my_offer_heading = $settings['ewa_my_offer_heading'];
		$my_offer_description = $settings['ewa_my_offer_des'];
		$my_offer_image = $settings['ewa_my_offer_image']['url'];
		$my_offer_title = $settings['ewa_my_offer_title'];
		$my_offer_icon = $settings['ewa_my_offer_icon_code'];
	
    ?>
		<!-- My Offer Output Start Here -->
		<div class="my-offer">
			<div class="my-offer__heading">
				<span><?php echo $my_offer_heading; ?></span>
				<div class="my-offer__des"><?php echo $my_offer_description; ?></div>
			</div> <!-- end of .my-offer__heading -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 padding-right-0">
					<div class="my-offer__image" style="background-image: url('<?php echo $my_offer_image; ?>');">
						<div class="my-offer__icon"><?php echo $my_offer_icon; ?></div>
					</div>   <!-- .end of .my-offer__image -->
				</div> <!-- end of .col-lg-3 -->
				<div class="col-lg-6 col-md-6 col-sm-12 padding-left-0">
					<div class="my-offer__contents">
						<h5 class="my-offer__title"><?php echo $my_offer_title; ?></h5>							
						<!-- offer list -->
						<ul class="rosie-accordion">
							<?php 

							$count = 0;
							// we will define which one needs to be opened initially, in this case we will define 1st accordion as current faq
							$open_faq_class = '';
							$open_faq_inner = '';

							foreach (  $settings['ewa_my_offer_accordion_list'] as $item ) { 
								$my_offer_accordion_title = $item['ewa_my_offer_accordion_title'];
								$my_offer_accordion_inner = $item['ewa_my_offer_accordion_inner'];

								// define 1st element as initial open element (DO NOT REMOVE THIS, THIS NEED SOME FIX)
								if ($count == 0) {
									//$open_faq_class = ' current';
									//$open_faq_inner = ' show';
								} else{
									$open_faq_class = '';
									$open_faq_inner = '';
								}
							?>								
								<li>									
									<a class="accordion-toggle<?php echo esc_attr($open_faq_class); ?>" href="javascript:void(0);">
										<?php echo $my_offer_accordion_title; ?>
									</a> <!-- .end of .accordion-toggle -->
									<div class="accordion-inner<?php echo esc_attr($open_faq_inner); ?>">
										<?php echo $my_offer_accordion_inner; ?>
									</div> <!-- .end of .accordion-inner -->
								</li>
							<?php 
							$count++;
							} 
							?>
						</ul><!-- .end of .rosie-accordion -->	
					</div> <!-- end of .my-offer__content -->							
				</div> <!-- end of .col-lg-9 -->
			</div> <!-- .grid end here -->							
		</div> 
		<!-- My Offer End Here -->
    <?php
	}

}
