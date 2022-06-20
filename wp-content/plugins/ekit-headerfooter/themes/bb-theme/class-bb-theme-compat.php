<?php
/**
 * BB Theme Compatibility.
 *
 * @package  ekit-headerfooter
 */

/**
 * EKIT_HF_BB_Theme_Compat setup
 *
 * @since 1.0
 */
class EKIT_HF_BB_Theme_Compat {

	/**
	 * Instance of EKIT_HF_BB_Theme_Compat
	 *
	 * @var EKIT_HF_BB_Theme_Compat
	 */
	private static $instance;

	/**
	 *  Initiator
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new EKIT_HF_BB_Theme_Compat();

			add_action( 'wp', array( self::$instance, 'hooks' ) );
		}

		return self::$instance;
	}

	/**
	 * Run all the Actions / Filters.
	 */
	public function hooks() {

		if ( ekit_hf_header_enabled() ) {
			add_filter( 'fl_header_enabled', '__return_false' );
			add_action( 'fl_before_header', array( $this, 'get_header_content' ) );
		}

		if ( ekit_hf_footer_enabled() ) {
			add_filter( 'fl_footer_enabled', '__return_false' );
			add_action( 'fl_after_content', array( $this, 'get_footer_content' ) );
		}

	}

	/**
	 * Display header markup for beaver builder theme.
	 */
	public function get_header_content() {

		$header_layout = FLTheme::get_setting( 'fl-header-layout' );

		if ( 'none' == $header_layout || is_page_template( 'tpl-no-header-footer.php' ) ) {
			return;
		}

		?>
		<header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
			<p class="main-title bhf-hidden" itemprop="headline"><a href="<?php echo bloginfo( 'url' ); ?>"
																	title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
																	rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php Ekit_header_footer::get_header_content(); ?>
		</header>
		<?php
	}

	/**
	 * Display footer markup for beaver builder theme.
	 */
	public function get_footer_content() {

		if ( is_page_template( 'tpl-no-header-footer.php' ) ) {
			return;
		}

		?>
		<footer itemscope="itemscope" itemtype="https://schema.org/WPFooter">
			<?php Ekit_header_footer::get_footer_content(); ?>
		</footer>
		<?php
	}

}

EKIT_HF_BB_Theme_Compat::instance();
