<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/hamzahabibdev/
 * @since      1.0.0
 *
 * @package    Learndash_Custom_Tabs
 * @subpackage Learndash_Custom_Tabs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Learndash_Custom_Tabs
 * @subpackage Learndash_Custom_Tabs/includes
 * @author     Hamza Habib <hamzahabib2000@gmail.com>
 */
class Learndash_Custom_Tabs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'learndash-custom-tabs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
