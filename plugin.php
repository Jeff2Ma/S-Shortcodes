<?php
/**
 * Plugin Name:S-Shortcodes
 * Plugin URI: http://devework.com/s-shortcodes.html
 * Description:短代码美化框，丰富排版，提供 10 种美化框。
 * Version: 2.4.0
 * Author:Jeff
 * Author URI: http://devework.com
 * 注意：插件需要在WordPress 3.9+ 版本方可正常运行！
 */

register_activation_hook( __FILE__, 'devework_shortcodes_activation' );

function devework_shortcodes_activation() {

    if( ! class_exists( 'devework_shortcodes' ) ) {
	devework_shortcodes_init();
	global $_devework_shortcodes;
    }
}

add_action( 'after_setup_theme', 'devework_shortcodes_init' );

function devework_shortcodes_init() {
    global $_devework_shortcodes;

    define( 'ACS_URL', plugin_dir_url( __FILE__ ) );
    define( 'ACS_VERSION', '2.4.0' );

    /** Includes **/
    require_once( dirname( __FILE__ ) . '/includes/class-shortcodes.php' );
    require_once( dirname( __FILE__ ) . '/includes/show-shortcodes.php' );


    /** Instantiate **/
   $_devework_shortcodes = new devework_Shortcodes;
}
?>