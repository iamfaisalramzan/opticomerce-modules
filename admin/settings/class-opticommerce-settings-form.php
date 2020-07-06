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
class Opticommerce_Modules_Setting_Form {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		// load settings function
		$this->opticommerce_module_settings();
	}

	/**
	 * Checkboxes for CL & RX modiles
	 *
	 * @since    1.0.0
	 * @return      string
	 */
	public function opticommerce_module_settings() {
		$rx_module = get_option( 'rx_module' );
		if ($rx_module == '1') {
			$rx_checked = 'checked';
		} else {
			$rx_checked = '';
		}
		$cl_module = get_option( 'cl_module' );
		if ($cl_module == '1') {
			$cl_checked = 'checked';
		} else {
			$cl_checked = '';
		}

		$html = '
		<div class="wrap" id="opticommerce-settings">
			<h1 class="wp-heading-inline">Opticommerce Modules Settings</h1>
			<div id="message" class="notice notice-success is-dismissible">
				<p></p>
			</div>
			<form action="">
				<fieldset>
					<input type="checkbox" id="rx-module" name="rx-module" value="rx-module" '.$rx_checked.'>
					<label for="rx-module"> Activate RX Module</label>
				</fieldset>
				<fieldset>
					<input type="checkbox" id="cl-module" name="cl-module" value="cl-module" '.$cl_checked.'>
					<label for="cl-module"> Activate CL Module</label>
				</fieldset>
				<fieldset>
					<button type="submit" class="button button-primary" id="opticommerce-module-settings-btn">
						Submit
						<div class="spinner-btn"></div>
					</button>
				</fieldset>
			</form>
		</div>
		';
		echo $html;
	}	
}
$Opticommerce_Modules_Setting_Form = new Opticommerce_Modules_Setting_Form();