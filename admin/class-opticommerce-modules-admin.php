<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Opticommerce_Modules
 * @subpackage Opticommerce_Modules/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Opticommerce_Modules
 * @subpackage Opticommerce_Modules/admin
 * @author     Faisal Ramzan <faisalpak14@gmail.com>
 */
class Opticommerce_Modules_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Check which module is active then include files
		$rx_module = get_option( 'rx_module' );
		$cl_module = get_option( 'cl_module' );

		// Action - Add Admin Menu
		add_action('admin_menu', array($this, 'admin_menu'));
		
		// Load Opti Module save setting class
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/settings/class-opticommerce-settings-save.php';

		if ($rx_module == '1') {
			// Load Opti Module save setting class
			require_once plugin_dir_path(dirname(__FILE__)) . 'admin/module-rx/class-opticommerce-rx-module.php';
		}
		if ($cl_module == '1') {
			// Load Opti Module save setting class
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/module-cl/class-opticommerce-cl-module.php';
		}
	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Opticommerce_Modules_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Opticommerce_Modules_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/opticommerce-modules-admin.css', array(), rand(10, 10000000), 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Opticommerce_Modules_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Opticommerce_Modules_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/opticommerce-modules-admin.js', array( 'jquery' ), rand(10, 10000000), false );
		// For JS access
		wp_localize_script( 
			$this->plugin_name, 
			'ajax_object', 
			array( 
				'ajax_url' => site_url() . '/wp-admin/admin-ajax.php',
			)
		);
	}

	/**
	 * Register Importer Page
	 */
	public function admin_menu (){

		$rx_module = get_option( 'rx_module' );
		$cl_module = get_option( 'cl_module' );

		add_menu_page( 
			__( 'Opti Modules', 'Opticommerce_Modules' ), // text to be displayed in the title page when the menu is selected.
			'Opti Modules', // text to be used for the menu.
			'manage_options', // capability
			'opticommerce_modules', //menu slug
			array($this, 'opticommerce_modules'), // callback function
			'dashicons-welcome-widgets-menus', // menu icon
			2 // menu position
		);

		if ($rx_module == '1') {
			add_submenu_page(
				'opticommerce_modules', // parent slug
				esc_html__('Opticommerce RX Verification', 'simple-job-board'),  // text to be displayed in the title page when the menu is selected.
				esc_html__('RX Verification', 'simple-job-board'), // text to be used for the menu.
				'manage_options', // capability
				'rx-verification', // menu_slug
				array($this, 'rx_verification'), // function
				1 // menu position
			);
		}

		if ($cl_module == '1') {
			add_submenu_page(
				'opticommerce_modules', // parent slug
				esc_html__('Opticommerce CL Verification', ''),  // text to be displayed in the title page when the menu is selected.
				esc_html__('CL Verification', ''), // text to be used for the menu.
				'manage_options', // capability
				'cl-verification', // menu_slug
				array($this, 'cl_verification'), // function
				2 // menu position
			);	
		}

		add_submenu_page(
			'opticommerce_modules', // parent slug
			esc_html__('Opticommerce Modules Settings', ''),  // text to be displayed in the title page when the menu is selected.
			esc_html__('Settings', ''), // text to be used for the menu.
			'manage_options', // capability
			'opticommerce-module-settings', // menu_slug
			array($this, 'opticommerce_module_class_settings'), // function
			3 // menu position
		);

		

	}

	/**
	 * Settings class include
	 */
	public function opticommerce_module_class_settings() {
		/**
         * The class responsible for defining all the settings
         */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/settings/class-opticommerce-settings-form.php';
		
	}

	/**
	 * Settings class include
	 */
	public function opticommerce_modules() {
		$html = '';
		$html .= '
		<div class="wrap" id="opticommerce-settings">
			<h1 class="wp-heading-inline">Opticommerce Modules</h1>
		</div>
		';
		echo $html;
	}
	

}
