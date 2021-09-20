<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/
 * @since             1.0.0
 * @package           Primer
 *
 * @wordpress-plugin
 * Plugin Name:       Primer
 * Plugin URI:        https://github.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ritesh
 * Author URI:        https://github.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       primer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PRIMER_VERSION', '1.0.0');
define('PRIMER_DIR_PATH',plugin_dir_path(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-primer-activator.php
 */
function activate_primer()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-primer-activator.php';
	Primer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-primer-deactivator.php
 */
function deactivate_primer()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-primer-deactivator.php';
	Primer_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_primer');
register_deactivation_hook(__FILE__, 'deactivate_primer');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-primer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_primer()
{

	$plugin = new Primer();
	$plugin->run();
}
run_primer();

// adding admin menu

include_once(constant('PRIMER_DIR_PATH').'admin/admin-menu.php');


// custome Shortcode 
include_once(constant('PRIMER_DIR_PATH').'wp-shortcode/sample-shortcode.php');


// custome widgets
include_once(constant('PRIMER_DIR_PATH').'wp-widgets/wp-rating.php');

// elementor Widgets
include_once (constant('PRIMER_DIR_PATH').'elementor/index.php');

?>