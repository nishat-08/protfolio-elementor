<?php
/**
 * Elementor Portfolio Post Grid Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Portfolio_Post_Grid_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Portfolio Post Grid widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'portfolio-post-grid-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve portfolio-post-grid-widget widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'portfolio-post-grid-widget', 'portfolio-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve portfolio-post-grid-widget widget icon.
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
	 * Retrieve the list of categories the post-grid widget belongs to.
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
	 * Register post-grid widget controls.
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
		
		$this->end_controls_section();
		// end of the Content tab section
		
		// Source of the posts
		$this->start_controls_section(
			'source_section',
			[
				'label' => esc_html__( 'Posts Source', 'portfolio-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'portfolio_posts_from_categories_by_slugs',
			[
				'label' => esc_html__( 'Post from Categories (Enter Category slugs separated by comma)', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'category-slug1, category-slug2', 'portfolio-elementor' ),
			]
		);
		
		$this->end_controls_section();
		// end of the source of the posts
		
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
		
		// Post Grid Meta Options
		$this->add_control(
			'portfolio_post_grid_meta_options',
			[
				'label' => esc_html__( 'Post Grid Meta', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Grid Meta Color
		$this->add_control(
			'portfolio_post_grid_meta_color',
			[
				'label' => esc_html__( 'Meta Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .blog-meta a, .blog-meta span' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Post Grid Meta Box Shadow
		$this->add_control(
			'portfolio_post_grid_box_shadow',
			[
				'label' => esc_html__( 'Meta Box Shadow', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .blog-meta' => 'box-shadow: 0 15px 40px {{VALUE}}',
				],
			]
		);
		
		// Post Grid Meta Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_post_grid_meta_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-meta',
			]
		);

		// Post Grid Title Options
		$this->add_control(
			'portfolio_post_grid_title_options',
			[
				'label' => esc_html__( 'Post Grid Title', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Grid Title Color
		$this->add_control(
			'portfolio_post_grid_title_color',
			[
				'label' => esc_html__( 'Title Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .blog-content h4 a' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Post Grid Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_post_grid_title_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-content h4 a',
			]
		);
		
		// Post Grid Text Options
		$this->add_control(
			'portfolio_post_grid_text_options',
			[
				'label' => esc_html__( 'Post Grid Text', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Grid Text Color
		$this->add_control(
			'portfolio_post_grid_text_color',
			[
				'label' => esc_html__( 'Text Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .blog-content p' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Post Grid Text Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_post_grid_text_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-content p',
			]
		);
		
		// Post Grid Read More Options
		$this->add_control(
			'portfolio_post_grid_read_more_options',
			[
				'label' => esc_html__( 'Post Grid Read More', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Grid Read More Color
		$this->add_control(
			'portfolio_post_grid_read_more_color',
			[
				'label' => esc_html__( 'Read More Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#1a1a1a',
				'selectors' => [
					'{{WRAPPER}} .blog-content a' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Post Grid Read More Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_post_grid_read_more_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .blog-content a',
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
		
		// Post Grid Read More Hover Options
		$this->add_control(
			'portfolio_post_grid_read_more_hover_options',
			[
				'label' => esc_html__( 'Post Grid Read More Hover', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Post Grid Read More Hover Color
		$this->add_control(
			'portfolio_post_grid_read_more_hover_color',
			[
				'label' => esc_html__( 'Read More Hover Color', 'portfolio-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default' => '#5E9E9F',
				'selectors' => [
					'{{WRAPPER}} .read-more:hover a' => 'color: {{VALUE}}',
				],
			]
		);
		
		// Post Grid Read More Hover Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'portfolio_post_grid_read_more_hover_typography',
				'label' => esc_html__( 'Typography', 'portfolio-elementor' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .read-more:hover a',
			]
		);

		
		$this->end_controls_tab();
		// end everything related to Hover state here
		
		
		$this->end_controls_tabs();

		$this->end_controls_section();
		// end of the Style tab section

	}

	/**
	 * Render post-grid widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		
		// Post from categories getting category Slug's
		$cat_slugs = $settings['portfolio_posts_from_categories_by_slugs'];

        $args = array(
          'posts_per_page' => 3,
          'post_type' => 'post',
          'post_status' => 'publish',
          'ignore_sticky_posts' => 1,
          'category_name' => $cat_slugs,
        );
        $query = new WP_Query($args);

    ?>
		<!-- Post Grid Output Start Here -->
			<div class="single-blog">
				<?php 
			    if ($query->have_posts()) :

	                while ($query->have_posts()) : $query->the_post(); 

					// get the featured image url
					$image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					// get the post date
					$post_date = get_the_date('M j, Y');


					// get the category name and link
					$term_list = wp_get_post_terms(get_the_ID(), 'category', ['fields' => 'all']);

					$cat_name = '';
					$cat_link = '';

					foreach ($term_list as $term) {
					  if (get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true) == $term->term_id) {
						$cat_name = $term->name;
						$cat_link = get_term_link($term->term_id);
					   break;
					  }
					  else {
					   $cat_name = $term->name;
					   $cat_link = get_term_link($term->term_id);
					  }
					}
	            ?>
					<div class="single-blog-items">
						<div class="blog-image">
							<img src="<?php echo esc_url($image_url); ?>" alt="">
						</div>
						<div class="blog-meta">
							<a href=""><i class="far fa-user"></i> <?php echo the_author(); ?></a>
							<span><i class="far fa-clock"></i> <?php echo $post_date; ?></span>
						</div>
						<div class="blog-content">
							<h4><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<div class="read-more"><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'portfolio-elementor'); ?> <i class="fas fa-long-arrow-alt-right"></i></a></div>
						</div>
					</div>
				<?php
	  		        endwhile;
	                endif; 
				?>
			</div>
		<!-- Post Grid End Here -->
    <?php
	}

}
