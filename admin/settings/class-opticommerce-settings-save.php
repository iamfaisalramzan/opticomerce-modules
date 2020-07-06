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
class Opticommerce_Modules_Setting_Save {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {
		// Ajax call ajax_opticommerce_settings() function
		add_action('wp_ajax_ajax_opticommerce_settings', array($this, 'ajax_opticommerce_settings'));
		add_action('wp_ajax_nopriv_ajax_opticommerce_settings', array($this, 'ajax_opticommerce_settings'));	
	}

	public function ajax_opticommerce_settings() {
		$rx_module = filter_input(INPUT_POST, 'rx_module');
		$cl_module = filter_input(INPUT_POST, 'cl_module');

		if (isset($rx_module) && $rx_module == 'rx-module' ) {
			update_option( 'rx_module', '1' );
		} else {
			update_option( 'rx_module', '0' );
		}

		if (isset($cl_module) && $cl_module == 'cl-module' ) {
			update_option( 'cl_module', '1' );
		} else {
			update_option( 'cl_module', '0' );
		}

		$outputArray = array('status' => true, 'message' => 'Settings saved.');
        echo json_encode($outputArray);
        wp_die();
	}

	
}
$Opticommerce_Modules_Setting_Save = new Opticommerce_Modules_Setting_Save();