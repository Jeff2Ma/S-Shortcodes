<?php

class Devework_Shortcodes {
    /**
     * 全局配置
     */
    function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this , 'enqueue_css' ) );
    add_action( 'admin_enqueue_scripts', array( $this , 'enqueue_css' ) );
    add_action( 'wp_dashboard_setup', array( $this, 'register_dashboard_widget' ) );
    add_action( 'init', array( $this, 'register_shortcodes' ) ) ;
    add_filter( 'widget_text', 'do_shortcode' );
    }
    /**
     * 添加样式
     */
    function enqueue_css() {
    wp_enqueue_style( 'devework-shortcodes', ACS_URL . 'includes/shortcodes.css', array(), ACS_VERSION );
    wp_enqueue_style( 'devework-shortcodes-fontello', ACS_URL . 'includes/css/fontello.css', array(), ACS_VERSION );
    }

    /**
     * 添加一个小工具到WordPress后台的dashboard
     */
    function register_dashboard_widget() {
        wp_add_dashboard_widget( 'dw-shortcodes', 'S-shortcodes 更新消息', array( $this, 'dashboard_widget_output' ) );
    }

    /**
     * dashboard小工具的输出样式
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
     * 注册短代码
     */
    function register_shortcodes() {

    add_shortcode( 'box', array( $this , 'box_shortcode' ) );
 }

    /**
     * box短代码
     * 使用例子：[box style="comment"]文本内容[/box]
     */
    function box_shortcode( $atts, $content = null ) {
    $defaults = apply_filters( 'devework_box_shortcode_args',
        array(
        'style' => 'grey'
        )
    );
    extract( shortcode_atts( $defaults, $atts ) );
    return '<div class="dw-box dw-box-'. $style .'"><i class="icon-'. $style .'"></i>'.  self::remove_wpautop( $content ) .'</div>';
    }

    /**
     * 自动过滤 <p></p> 、 <br /> 这些html标签
     */
    function remove_wpautop( $content ) {
    $content = do_shortcode( shortcode_unautop( $content ) );
    $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
    return $content;
    }

    /**
     * 清楚浮动
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


// 短代码可视化插入按钮 since v.2.3
function dw_add_mce_button() {
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
    }
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', 'dw_add_tinymce_plugin' );
        add_filter( 'mce_buttons', 'dw_register_mce_button' );
    }
}
add_action('admin_head', 'dw_add_mce_button');

function dw_add_tinymce_plugin( $plugin_array ) {
    $plugin_array['my_mce_button'] = plugins_url('',__FILE__).'/mce-button.js';
    return $plugin_array;
}
function dw_register_mce_button( $buttons ) {
    array_push( $buttons, 'my_mce_button' );
    return $buttons;
}

?>