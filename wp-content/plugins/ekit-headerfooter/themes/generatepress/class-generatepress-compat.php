<?php
/**
 * GeneratepressCompatibility.
 *
 * @package  ekit-headerfooter
 */

/**
 * EKIT_HF_GeneratePress_Compat setup
 *
 * @since 1.0
 */
class EKIT_HF_GeneratePress_Compat {

	/**
	 * Instance of EKIT_HF_GeneratePress_Compat
	 *
	 * @var EKIT_HF_GeneratePress_Compat
	 */
	private static $instance;

	/**
	 *  Initiator
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new EKIT_HF_GeneratePress_Compat();

			add_action( 'wp', array( self::$instance, 'hooks' ) );
		}

		return self::$instance;
	}

	/**
	 * Run all the Actions / Filters.
	 */
	public function hooks() {

		if ( ekit_hf_header_enabled() ) {
			add_action( 'template_redirect', array( $this, 'generatepress_setup_header' ) );
			add_action( 'generate_header', 'ekit_hf_render_header' );
		}

		if ( ekit_hf_footer_enabled() ) {
			add_action( 'template_redirect', array( $this, 'generatepress_setup_footer' ) );
			add_action( 'generate_footer', 'ekit_hf_render_footer' );
		}

	}

	/**
	 * Disable header from the theme.
	 */
	public function generatepress_setup_header() {
		remove_action( 'generate_header', 'generate_construct_header' );
	}

	/**
	 * Disable footer from the theme.
	 */
	public function generatepress_setup_footer() {
		remove_action( 'generate_footer', 'generate_construct_footer_widgets', 5 );
		remove_action( 'generate_footer', 'generate_construct_footer' );
	}

}

EKIT_HF_GeneratePress_Compat::instance();
