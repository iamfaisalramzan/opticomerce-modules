<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Opticommerce_Modules
 *
 * @wordpress-plugin
 * Plugin Name:       Opticommerce Modules
 * Plugin URI:        #
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Faisal Ramzan
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       opticommerce-modules
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OPTICOMMERCE_MODULES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-opticommerce-modules-activator.php
 */
function activate_opticommerce_modules() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-opticommerce-modules-activator.php';
	Opticommerce_Modules_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-opticommerce-modules-deactivator.php
 */
function deactivate_opticommerce_modules() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-opticommerce-modules-deactivator.php';
	Opticommerce_Modules_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_opticommerce_modules' );
register_deactivation_hook( __FILE__, 'deactivate_opticommerce_modules' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-opticommerce-modules.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_opticommerce_modules() {

	$plugin = new Opticommerce_Modules();
	$plugin->run();

}
run_opticommerce_modules();
