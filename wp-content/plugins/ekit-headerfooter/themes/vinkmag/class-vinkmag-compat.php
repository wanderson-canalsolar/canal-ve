<?php
/**
 * EKIT_HF_Vinkmag_Compat setup
 *

 */

/**
 * Vinkmag theme compatibility.
 */
class EKIT_HF_Vinkmag_Compat {

	/**
	 * Instance of EKIT_HF_Vinkmag_Compat.
	 *
	 * @var EKIT_HF_Vinkmag_Compat
	 */
	private static $instance;

	/**
	 * Instance of Elementor Frontend class.
	 *
	 * @var \Elementor\Frontend()
	 */
	private static $elementor_instance;

	/**
	 *  Initiator
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new EKIT_HF_Vinkmag_Compat();

			add_action( 'wp', array( self::$instance, 'hooks' ) );
		}

		if ( defined( 'ELEMENTOR_VERSION' ) && is_callable( 'Elementor\Plugin::instance' ) ) {

			self::$elementor_instance = Elementor\Plugin::instance();

		}

		return self::$instance;
	}

	/**
	 * Run all the Actions / Filters.
	 */
	public function hooks() {

		if ( ekit_hf_header_enabled() ) {
			add_action( 'template_redirect', array( $this, 'vinkmag_setup_header' ), 10 );
			add_action( 'vinkmag_header', 'ekit_hf_render_header' );
		}

		if ( ekit_hf_footer_enabled() ) {
			add_action( 'template_redirect', array( $this, 'vinkmag_setup_footer' ), 10 );
			add_action( 'vinkmag_footer', 'ekit_hf_render_footer' );
		}
	}

	/**
	 * Disable header from the theme.
	 */
	public function vinkmag_setup_header() {
		remove_action( 'vinkmag_header', 'vinkmag_header_markup' );
	}

	/**
	 * Disable footer from the theme.
	 */
	public function vinkmag_setup_footer() {
		remove_action( 'vinkmag_footer', 'vinkmag_footer_markup' );
	}
}

EKIT_HF_Vinkmag_Compat::instance();
