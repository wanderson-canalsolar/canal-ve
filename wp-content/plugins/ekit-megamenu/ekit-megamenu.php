<?php if ( ! defined( 'ABSPATH' ) ) die( 'Forbidden' );
/*
Plugin Name: Elementskit Mega Menu
Plugin URI: #
Version: 2.4.6
Description: Mega menu for Elementskit
Author: Xpeedstudio
Author URI: http://xpeedstudio.com
Text domain: ekit-menu
*/
/**
* @classname Ekit_Mega_Menu
* @author xpeedstudio (xpeedstudio.com)
* @version 20100119
*/

define( 'EKIT_MEGAMENU_VERSION', '2.4.3' );
define( 'EKIT_MIN_VERSION', '1.0.1' );

define( 'EKIT_MEGAMENU__FILE__', __FILE__ );
define( 'EKIT_MEGAMENU_PLUGIN_BASE', plugin_basename( EKIT_MEGAMENU__FILE__ ) );
define( 'EKIT_MEGAMENU_PATH', plugin_dir_path( EKIT_MEGAMENU__FILE__ ) );

define( 'EKIT_MEGAMENU_URL', plugins_url( '', EKIT_MEGAMENU__FILE__ ) );
define( 'EKIT_MEGAMENU_ASSETS', plugins_url( 'assets', EKIT_MEGAMENU__FILE__ ) );


define( 'EKIT_MEGAMENU_ELEMENTS_URL', EKIT_MEGAMENU_URL . '/app/elements/' );
define( 'EKIT_MEGAMENU_ELEMENTS_DIR', EKIT_MEGAMENU_PATH . '/app/elements/' );
define( 'EKIT_MEGAMENU_WIDGET', EKIT_MEGAMENU_ELEMENTS_URL. 'widgets/' );
define( 'EKIT_MEGAMENU_WIDGET_ASSETS', EKIT_MEGAMENU_WIDGET. 'assets/' );


function ekit_menu_plugin_flush_rewrites() {
    ekit_menu_item();
    flush_rewrite_rules();

    $settings['style'] = Ekit_Menu_Helper::get_default_theme();
    $settings['themes']['default'] = Ekit_Menu_Helper::get_default_theme();

    update_option('Ekit_Menu_Settings', $settings);
}

function ekit_menu_plugin_fail_elementor_version() {
	$message = sprintf( esc_html__( '"Elementskit megamenu" requires Elementor version %s+, plugin is currently NOT RUNNING.', 'elementor' ), '2.2' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}

add_action( 'plugins_loaded', function(){
    if ( !defined('ELEMENTOR_VERSION') || !version_compare( ELEMENTOR_VERSION, '2.2', '>=' ) ) {
        add_action( 'admin_notices', 'ekit_menu_plugin_fail_elementor_version' );
    } else {
        include_once EKIT_MEGAMENU_PATH . '/library/scss/scss.inc.php';
        include_once EKIT_MEGAMENU_PATH . '/library/apf/admin_page_framework.php';
        include_once EKIT_MEGAMENU_PATH . '/library/xs_helpers/fn.global.php';
        include_once EKIT_MEGAMENU_PATH . '/library/xs_helpers/fn.lineawesome.php';
        include_once EKIT_MEGAMENU_PATH . '/library/tgmpa/class-tgm-plugin-activation.php';
        include_once EKIT_MEGAMENU_PATH . '/app/enqueue_admin.php';
        include_once EKIT_MEGAMENU_PATH . '/app/enqueue_frontend.php';
        include_once EKIT_MEGAMENU_PATH . '/app/settings.php';
        include_once EKIT_MEGAMENU_PATH . '/app/hooks.php';
        include_once EKIT_MEGAMENU_PATH . '/app/post_type.php';
        include_once EKIT_MEGAMENU_PATH . '/app/elements.php';
        include_once EKIT_MEGAMENU_PATH . '/app/metabox.php';
        include_once EKIT_MEGAMENU_PATH . '/app/rest_api.php';
        include_once EKIT_MEGAMENU_PATH . '/app/walker_menu.php';
        include_once EKIT_MEGAMENU_PATH . '/app/theme_css.php';

        new Ekit_Megamenu_Register_Elements();

        register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
        register_activation_hook( __FILE__, 'ekit_menu_plugin_flush_rewrites' );   
    }
});