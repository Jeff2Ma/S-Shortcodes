<?php
/**
 * Plugin Name:S-Shortcodes
 * Plugin URI: http://devework.com/s-shortcodes.html
 * Description:短代码美化框，丰富排版，提供 10 种美化框。
 * Version: 2.1.0
 * Author:Jeff
 * Author URI: http://devework.com
 */

/* plugin-update */
require 'plugin-updates/plugin-update-checker.php';
$MyUpdateChecker = new PluginUpdateChecker(
    'http://devework.com/update/plugin/S-Shortcodes/info.json',
    __FILE__,
    'S-Shortcodes'
);


register_activation_hook( __FILE__, 'devework_shortcodes_activation' );
/**
 * This function runs on plugin activation. It checks for the existence of the class
 * and starts its creation
 *
 * @since 1.0
 */
function devework_shortcodes_activation() {

    if( ! class_exists( 'devework_shortcodes' ) ) {
	devework_shortcodes_init();
	global $_devework_shortcodes;
    }
}

add_action( 'after_setup_theme', 'devework_shortcodes_init' );
/**
 * Initializes the plugin
 * Includes the libraries, defines global variables, instantiates the class
 *
 * @since 1.0
 */
function devework_shortcodes_init() {
    global $_devework_shortcodes;

    define( 'ACS_URL', plugin_dir_url( __FILE__ ) );
    define( 'ACS_VERSION', '2.0.0' );

    /** Includes **/
    require_once( dirname( __FILE__ ) . '/includes/class-shortcodes.php' );
    require_once( dirname( __FILE__ ) . '/includes/show-shortcodes.php' );


    /** Instantiate **/
    $_devework_shortcodes = new devework_Shortcodes;

}
?>