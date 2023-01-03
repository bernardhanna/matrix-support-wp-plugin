<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2022-10-18 14:55:44
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2022-11-02 16:44:27
 */
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://matrixinternet.ie
 * @since             1.0.0
 * @package           Matrix_Helper
 *
 * @wordpress-plugin
 * Plugin Name:       matrix helper
 * Plugin URI:        https://github.com/bernardhanna/matrix-helper.git
 * Description:       Provides helpful functions and modifications for WordPress projects.
 * Version:           1.0.0
 * Author:            Bernard Hanna
 * Author URI:        https://matrixinternet.ie
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       matrix-helper
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
define( 'MATRIX_HELPER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-matrix-helper-activator.php
 */
function activate_matrix_helper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-matrix-helper-activator.php';
	Matrix_Helper_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-matrix-helper-deactivator.php
 */
function deactivate_matrix_helper() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-matrix-helper-deactivator.php';
	Matrix_Helper_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_matrix_helper' );
register_deactivation_hook( __FILE__, 'deactivate_matrix_helper' );

/**
 * Load our Carbon Fields dependency via Composer
 */
function load_carbonfields() {
	require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload.php';
	\Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\load_carbonfields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-matrix-helper.php';
/**
 * Load carbon fields
 */
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
require plugin_dir_path( __FILE__ ) . 'includes/class-matrix-helper-crb-loader.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_matrix_helper() {

	$plugin = new Matrix_Helper();
	$plugin->run();

}
run_matrix_helper();
