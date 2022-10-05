<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.matrixinternet.ie/
 * @since      1.0.0
 *
 * @package    Matrix_Support
 * @subpackage Matrix_Support/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Matrix_Support
 * @subpackage Matrix_Support/includes
 * @author     Bernard Hanna <bernard@matriixntenrte.ie>
 */
class Matrix_Support_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'matrix-support',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
