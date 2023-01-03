<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://matrixinternet.ie
 * @since      1.0.0
 *
 * @package    Matrix_Helper
 * @subpackage Matrix_Helper/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Matrix_Helper
 * @subpackage Matrix_Helper/includes
 * @author     Bernard Hanna <bernard@matrixinternet.ie>
 */
class Matrix_Helper_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'matrix-helper',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
