<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://www.digitalgroup.es/
 * @since             1.0.0
 * @package           Urbiotica_Faqs
 *
 * @wordpress-plugin
 * Plugin Name:       Urbiotica FAQs
 * Plugin URI:        https://https://https://www.digitalgroup.es/
 * Description:       Permite agregar un bloque de preguntas frecuentes en las distintas páginas del sitio.
 * Version:           1.0.0
 * Author:            Digital Group
 * Author URI:        https://https://www.digitalgroup.es/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       urbiotica-faqs
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
define( 'URBIOTICA_FAQS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-urbiotica-faqs-activator.php
 */
function activate_urbiotica_faqs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-urbiotica-faqs-activator.php';
	Urbiotica_Faqs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-urbiotica-faqs-deactivator.php
 */
function deactivate_urbiotica_faqs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-urbiotica-faqs-deactivator.php';
	Urbiotica_Faqs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_urbiotica_faqs' );
register_deactivation_hook( __FILE__, 'deactivate_urbiotica_faqs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-urbiotica-faqs.php';

// Add custom fields to ACF
require plugin_dir_path( __FILE__ ) . 'includes/acf/fields.php';

// Add funtions to plugin
require plugin_dir_path( __FILE__ ) . 'includes/functions.php';


// Add custom assets
function custom_assets() {
    wp_enqueue_style( 'add-faqs', plugins_url( 'assets/css/faqs.css', __FILE__ ) );
}

// Hook the custom assets function
add_action('wp_enqueue_scripts', 'custom_assets');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_urbiotica_faqs() {

	$plugin = new Urbiotica_Faqs();
	$plugin->run();

}
run_urbiotica_faqs();
