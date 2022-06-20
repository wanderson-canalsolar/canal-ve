<?php
/**
 * Plugin Name:     Elementskit header footer
 * Plugin URI:      #
 * Description:     Create Header and Footer for your site using Elementor Page Builder.
 * Author:          Xpeedstudio
 * Author URI:      #
 * Text Domain:     ekit-headerfooter
 * Version:         1.4.8
 */

define( 'EKIT_HF_VER', '1.4.5');
define( 'EKIT_HF_DIR', plugin_dir_path( __FILE__ ) );
define( 'EKIT_HF_URL', plugins_url( '/', __FILE__ ) );
define( 'EKIT_HF_PATH', plugin_basename( __FILE__ ) );

define( 'EKIT_ELEMENTS_URL', EKIT_HF_URL . 'elements/' );
define( 'EKIT_ELEMENTS_DIR', EKIT_HF_DIR . 'elements/' );

function ekit_headerfooter_fail_elementor_version() {
	$message = sprintf( esc_html__( '"Elementskit header footer" requires Elementor version %s+, plugin is currently NOT RUNNING.', 'elementor' ), '2.2' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}



add_action( 'plugins_loaded', function(){
	if ( !defined('ELEMENTOR_VERSION') || !version_compare( ELEMENTOR_VERSION, '2.2', '>=' ) ) {
		add_action( 'admin_notices', 'ekit_headerfooter_fail_elementor_version' );
	} else {
	
		require_once EKIT_HF_DIR . '/inc/class-ekit-headerfooter.php';
		require_once EKIT_HF_DIR . '/inc/class-elements.php';
	
		new Ekit_header_footer();
		new Ekit_Register_Elements();
	}
} );