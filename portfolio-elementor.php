<?php
/**
 * Plugin Name: Portfolio Elementor
 * Description: Custom Elementor extension for creating custom widgets.
 * Version:     1.0.0
 * Author:      Nishat Sharmin Chowdhury
 * Text Domain: portfolio-elementor
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Elementor Test Extension Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Elementor_Portfolio_Extension {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Portfolio_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Portfolio_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'portfolio-elementor', FALSE, basename( dirname( __FILE__) ) . '/languages' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {
	
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}
		
		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		
		 // Category Init
		//add_action( 'elementor/init', [ $this, 'elementor_common_category' ] );

	}
	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'portfolio-elementor' ),
			'<strong>' . esc_html__( 'Elementor Portfolio Extension', 'portfolio-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'portfolio-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'portfolio-elementor' ),
			'<strong>' . esc_html__( 'Elementor Portfolio Extension', 'portfolio-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'portfolio-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'portfolio-elementor' ),
			'<strong>' . esc_html__( 'Elementor Portfolio Extension', 'portfolio-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'portfolio-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// added by Portfolio - holding all widgets file key
		$widgets_file_key = ['portfolio-hero', 'portfolio-section-heading', 'portfolio-about-title', 'portfolio-about-skills', 'portfolio-about-edu-and-exp', 'portfolio-services', 'portfolio-counter', 'portfolio-projects', 'portfolio-testimonial', 'portfolio-post-grid', 'portfolio-process', 'portfolio-cta', 'portfolio-contact', 'portfolio-my-offer'];
		
		// added by Portfolio - Portfolio own widgets files, loading all widget files
		foreach ($widgets_file_key as $widget_file_name) {
			require_once( __DIR__ . '/widgets/' . $widget_file_name . '-widget.php' );
		}

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Hero_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Section_Heading_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_About_Title_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_About_Skills_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_About_Edu_And_Exp_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Services_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Counter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Projects_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Testimonial_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Post_Grid_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Process_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_CTA_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_Contact_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Portfolio_My_Offer_Widget() );

	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls() {

		/*
		* Todo: this block needs to be commented out when the custom control is ready
		*
		*
		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );
		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );
		*/

	}

	// Custom CSS
	public function widget_styles() {

		wp_register_style( 'portfolio-extension-font', plugins_url( 'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap', __FILE__ ) );

		wp_register_style( 'portfolio-slick-slider', plugins_url( 'css/slick.css', __FILE__ ) );
		wp_register_style( 'portfolio-slick-theme-slider', plugins_url( 'css/slick-theme.css', __FILE__ ) );
		wp_register_style( 'portfolio-extension-style', plugins_url( 'css/style.css', __FILE__ ) );
		
		wp_enqueue_style('portfolio-extension-font');
		wp_enqueue_style('portfolio-slick-slider');
		wp_enqueue_style('portfolio-slick-theme-slider');
		wp_enqueue_style('portfolio-extension-style');

	}	

    // Custom JS
	public function widget_scripts() {
		wp_register_script( 'portfolio-extension-typed', plugins_url( 'js/typed.min.js', __FILE__ ) );
		wp_register_script( 'portfolio-extension-waypoints', plugins_url( 'js/waypoints.min.js', __FILE__ ) );
		wp_register_script( 'portfolio-extension-counterup', plugins_url( 'js/counterup.min.js', __FILE__ ) );
		wp_register_script( 'portfolio-extension-slick-slider', plugins_url( 'js/slick.min.js', __FILE__ ) );
		wp_register_script( 'portfolio-extension-onepagenav', plugins_url( 'js/onepagenav.js', __FILE__ ) );
		wp_register_script( 'portfolio-extension-script', plugins_url( 'js/script.js', __FILE__ ) );
		
		wp_enqueue_script('portfolio-extension-typed');
		wp_enqueue_script('portfolio-extension-waypoints');
		wp_enqueue_script('portfolio-extension-counterup');
		wp_enqueue_script('portfolio-extension-slick-slider');
		wp_enqueue_script('portfolio-extension-onepagenav');
		wp_enqueue_script('portfolio-extension-script');
	}

    // Custom Category
    public function portfolio_elementor_category () {

	   \Elementor\Plugin::$instance->elements_manager->add_category( 
	  	'portfolio-category',
	    	[
    		    'title' => __( 'Elementor Portfolio Category', 'portfolio-elementor' ),
	    		'icon' => 'fa fa-plug', //default icon
	    	],
	    );

	}


}

Elementor_Portfolio_Extension::instance();