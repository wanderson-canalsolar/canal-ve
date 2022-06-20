<?php
/**
 * EKIT_HF_OceanWP_Compat setup
 *

 */

/**
 * OceanWP theme compatibility.
 */
class EKIT_HF_OceanWP_Compat {

	/**
	 * Instance of EKIT_HF_OceanWP_Compat.
	 *
	 * @var EKIT_HF_OceanWP_Compat
	 */
	private static $instance;

	/**
	 *  Initiator
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new EKIT_HF_OceanWP_Compat();

			add_action( 'wp', array( self::$instance, 'hooks' ) );
		}

		return self::$instance;
	}

	/**
	 * Run all the Actions / Filters.
	 */
	public function hooks() {

		if ( ekit_hf_header_enabled() ) {
			add_action( 'template_redirect', array( $this, 'setup_header' ), 10 );
			add_action( 'ocean_header', 'ekit_hf_render_header' );
		}

		if ( ekit_hf_footer_enabled() ) {
			add_action( 'template_redirect', array( $this, 'setup_footer' ), 10 );
			add_action( 'ocean_footer', 'ekit_hf_render_footer' );
		}

	}

	/**
	 * Disable header from the theme.
	 */
	public function setup_header() {
		remove_action( 'ocean_top_bar', 'oceanwp_top_bar_template' );
		remove_action( 'ocean_header', 'oceanwp_header_template' );
		remove_action( 'ocean_page_header', 'oceanwp_page_header_template' );
	}

	/**
	 * Disable footer from the theme.
	 */
	public function setup_footer() {
		remove_action( 'ocean_footer', 'oceanwp_footer_template' );
	}

}

EKIT_HF_OceanWP_Compat::instance();
