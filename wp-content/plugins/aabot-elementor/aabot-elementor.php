<?php
/**
 * Plugin Name: Aabot Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://aabot.net/plugins/aabot-elementor/
 * Version:     1.0.0
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://aabot.net
 * Text Domain: aabot-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Aabot Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class AabotElementor {

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
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var AabotElementor The single instance of the class.
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
	 * @return AabotElementor An instance of the class.
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

		load_plugin_textdomain( 'aabot-elementor' );

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

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
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
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'aabot-elementor' ),
			'<strong>' . esc_html__( 'Aabot Elementor', 'aabot-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'aabot-elementor' ) . '</strong>'
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'aabot-elementor' ),
			'<strong>' . esc_html__( 'Aabot Elementor', 'aabot-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'aabot-elementor' ) . '</strong>',
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
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'aabot-elementor' ),
			'<strong>' . esc_html__( 'Aabot Elementor', 'aabot-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'aabot-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('aabot-elementor',
	      	array(
					'title' => __( 'Aabot Elementor', 'aabot-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'aabot-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/aabot-elementor.js', array( 'jquery' ), self::VERSION );
	}

	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'aabot-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/aabot-elementor.css', self::VERSION );
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

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/hero-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/counter-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/slider-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/about-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/service-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/skills-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/cta-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/portfolio.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/testimonial-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/brands-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/faq-widget.php';
		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-info-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/experience-info-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/services-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/portfolio-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/members.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/contact-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog-post-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/subscribe-widget.php';

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotHero() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotCounter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotAbout() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotServicePost() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotSkills() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotCTA() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotWork() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotBrand() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotFAQ() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotTestimonials() );


		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotExperienceInfo() );

		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotService() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotMembers() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotBlogPost() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotPortfolio() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotContactInfo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotContact() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \AabotElementor\Widget\AabotSubscribe() );
	
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

AabotElementor::instance();