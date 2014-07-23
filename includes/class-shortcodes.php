<?php
/**
 * This file contains the Devework_Shortcodes class.
 *
 * This class handles the registration of the shortcodes, and loading
 * of the scripts necessary for its operation.
 */
class Devework_Shortcodes {
    /**
     * Construct Method
     */
    function __construct() {
	add_action( 'wp_enqueue_scripts', array( $this , 'enqueue_css' ) );
    add_action( 'wp_dashboard_setup', array( $this, 'register_dashboard_widget' ) );
	add_action( 'init', array( $this, 'register_shortcodes' ) ) ;
	add_filter( 'widget_text', 'do_shortcode' );
    }
    /**
     * Load the necessary css, which can be overriden by creating your own file and placing it in
     * the root of your theme's folder
     *
     * @since 0.9
     */
    function enqueue_css() {
    wp_enqueue_style( 'devework-shortcodes', ACS_URL . 'includes/shortcodes.css', array(), ACS_VERSION );
    }

    /**
     * Adds a news widget to the dashboard.
     *
     * @since 1.0
     */
    function register_dashboard_widget() {
        wp_add_dashboard_widget( 'dw-shortcodes', 'S-shortcodes 更新消息', array( $this, 'dashboard_widget_output' ) );
    }

    /**
     * Output for the dashboard widget
     *
     * @since 1.0
     */
    function dashboard_widget_output() {

        echo '<div class="rss-widget">';

        wp_widget_rss_output( array(
            'url' => 'http://devework.com/tag/s-shortcodes/feed', // feed url
            'title' => 'S-shortcodes 更新消息', // feed title
            'items' => 3, //how many posts to show
            'show_summary' => 1, // 1 = display excerpt
            'show_author' => 0, // 1 = display author
            'show_date' => 1 // 1 = display post date
        )); ?>

        <div class="dws-widget-bottom">
            <ul>
                <li><img src="<?php echo ACS_URL . 'images/admin/page-16x16.png'?>"><a href="/wp-admin/themes.php?page=S_shortcode_page">短代码示例</a></li>
                <li><img src="<?php echo ACS_URL . 'images/admin/help-16x16.png'?>"><a href="http://devework.com/s-shortcodes.html">帮助与支持</a></li>
            </ul>
        </div></div>

        <?php // handle the styling
        echo '<style type="text/css">
            #dw-shortcodes .rsssummary { display: block; }
            #dw-shortcodes .dws-widget-bottom { border-top: 1px solid #ddd; padding-top: 10px; text-align: center; }
            #dw-shortcodes .dws-widget-bottom ul { list-style: none; }
            #dw-shortcodes .dws-widget-bottom ul li { display: inline; padding-right: 9%; }
            #dw-shortcodes .dws-widget-bottom img { padding-right: 3px; vertical-align: top; }
        </style>';
    }

    /**
     * Register all the shortcodes
     *
     * @since 0.9
     * @version 1.0
     */
    function register_shortcodes() {

	add_shortcode( 'box', array( $this , 'box_shortcode' ) );
 }

    /**
     * Shortcode to produce a styled box
     *
     * @param type $atts
     * @param type $content
     * @return type
     *
     * @since 0.9
     * @example [box style="comment"]my content[/box]
     */
    function box_shortcode( $atts, $content = null ) {
	/*
	Supported Attributes
	    style   =>  blue, green, grey, red, tan, yellow	-> creates boxes using only those colors
		OR
	    style   =>  alert, comment, download, info, tip	-> boxes with the corresponding icon to the left of the text
	*/
	$defaults = apply_filters( 'devework_box_shortcode_args',
	    array(
		'style' => 'grey'
	    )
	);
	extract( shortcode_atts( $defaults, $atts ) );

	return '<div class="dw-box dw-box-'. $style .'">'. self::remove_wpautop( $content ) .'</div>';
    }

    
    /******************************************************
     *  Helper Functions
     ******************************************************/

    /**
     * Remove automatic <p></p> and <br /> tags from content
     *
     * @param type $content
     * @return string
     *
     * @since 0.9
     */
    function remove_wpautop( $content ) {
	$content = do_shortcode( shortcode_unautop( $content ) );
	$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
	return $content;
    }

    /**
     * Properly clear our floats after the columns
     *
     * @param string $last
     * @return string
     *
     * @since 1.0.4
     */
    function clearfloat( $last ) {
	$return = '';

	if( $last ) $return = '<div style="clear:both;"></div>';

	return $return;
    }

}
/* quicktags */
function dw_shortcode_quicktags() {
    wp_enqueue_script(
        'dw_shortcode_quicktags',
        plugins_url('',__FILE__).'/dw_shortcode_quicktags.js',
        array('quicktags')
    );
}
add_action('admin_print_scripts', 'dw_shortcode_quicktags');

?>