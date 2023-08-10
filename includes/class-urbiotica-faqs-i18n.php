<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://www.digitalgroup.es/
 * @since      1.0.0
 *
 * @package    Urbiotica_Faqs
 * @subpackage Urbiotica_Faqs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Urbiotica_Faqs
 * @subpackage Urbiotica_Faqs/includes
 * @author     Digital Group <maria.perez@digitalgroup.es>
 */
class Urbiotica_Faqs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'urbiotica-faqs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
