<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.matrixinternet.ie/
 * @since             1.0.0
 * @package           Matrix_Support
 *
 * @wordpress-plugin
 * Plugin Name:       Matrix Support Plugin
 * Plugin URI:        https://www.matrixinternet.ie/
 * Description:       Adds Plugins that need an update to a table to paste into report
 * Version:           1.0.0
 * Author:            Bernard Hanna
 * Author URI:        https://www.matrixinternet.ie/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       matrix-support
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
define( 'MATRIX_SUPPORT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-matrix-support-activator.php
 */
function activate_matrix_support() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-matrix-support-activator.php';
	Matrix_Support_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-matrix-support-deactivator.php
 */
function deactivate_matrix_support() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-matrix-support-deactivator.php';
	Matrix_Support_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_matrix_support' );
register_deactivation_hook( __FILE__, 'deactivate_matrix_support' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-matrix-support.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_matrix_support() {

	$plugin = new Matrix_Support();
	$plugin->run();

}
run_matrix_support();
