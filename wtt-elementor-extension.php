<?php
/**
 * Plugin Name: Pricing table addon for elementor
 * Description: Pricing table custom elementor extension which includes custom widgets.
 * Plugin URI:  https://webtoptemplate
 * Version:     1.0.0
 * Author:      Kardi
 * Author URI:  github/ikardi04
 * Text Domain: wtt-pricing-table
 * Domain Path: /languages
 */

namespace WTTPricingTable;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class Wtt_Elementor_Extension {

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
	 * @var Wtt_Elementor_Extension The single instance of the class.
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
	 * @return Wtt_Elementor_Extension An instance of the class.
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

		load_plugin_textdomain( 'wtt-pricing-table', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
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

		

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        // Category Init
		add_action( 'elementor/init', [ $this, 'elementor_common_category' ] );

	}

	function widget_scripts(){ 
	add_action('elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wtt-pricing-table' ),
			'<strong>' . esc_html__( 'Pricing table Elementor Extension', 'wtt-pricing-table' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wtt-pricing-table' ) . '</strong>'
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wtt-pricing-table' ),
			'<strong>' . esc_html__( 'Wtt Elementor Extension', 'wtt-pricing-table' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wtt-pricing-table' ) . '</strong>',
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wtt-pricing-table' ),
			'<strong>' . esc_html__( 'Wtt Elementor Extension', 'wtt-pricing-table' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'wtt-pricing-table' ) . '</strong>',
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

		
		require_once( __DIR__ . '/widgets/pricing-table-widget.php' );


	
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Wtt_Pricing_Widget() );


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

		wp_register_style( 'wtt-pricing-table-font', 'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap');
		wp_register_style( 'Wtt-font-awesome-css-cdn', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
		
		wp_register_style( 'Wtt-font-awesome-style', plugins_url( 'assets/css/font-awesome.css', __FILE__ ) );
		
		wp_register_style( 'Wtt-font-awesome-min-css', plugins_url( 'assets/css/font-awesome.min.css', __FILE__ ) );
		wp_register_style( 'wtt-pricing-table-style', plugins_url( 'assets/css/style.css', __FILE__ ) );

		wp_enqueue_style('wtt-pricing-table-font');
		wp_enqueue_style('Wtt-font-awesome-css-cdn');
		wp_enqueue_style('Wtt-font-awesome-style');
		wp_enqueue_style('Wtt-font-awesome-min-css');
		wp_enqueue_style('wtt-pricing-table-style');

	}	

    // Custom JS


    // Custom Category
    public function elementor_common_category () {

	   \Elementor\Plugin::$instance->elements_manager->add_category( 
	   	'Wtt-category',
	   	[
	   		'title' => __( 'Wtt Category', 'wtt-pricing-table' ),
	   		'icon' => 'fa fa-plug', //default icon
	   	]
	   );

	}




}

Wtt_Elementor_Extension::instance();