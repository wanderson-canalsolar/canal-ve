<?php
/**
 * Class Ekit_header_footer
 */
class Ekit_header_footer {

	/**
	 * get current template
	 */
	public $template;

	/**
	 * Instance of Elemenntor Frontend class.
	 */
	private static $elementor_instance;

	/**
	 * begin my class
	 */
	function __construct() {

		$this->template = get_template();

		if ( defined( 'ELEMENTOR_VERSION' ) && is_callable( 'Elementor\Plugin::instance' ) ) {

			self::$elementor_instance = Elementor\Plugin::instance();

			$this->includes();

			// all following classes
			if ( 'genesis' == $this->template ) {
				require EKIT_HF_DIR . 'themes/genesis/class-genesis-compat.php';
			} elseif ( 'astra' == $this->template ) {

				require EKIT_HF_DIR . 'themes/astra/class-astra-compat.php';
			} elseif ( 'bb-theme' == $this->template || 'beaver-builder-theme' == $this->template ) {
				$this->template = 'beaver-builder-theme';
				require EKIT_HF_DIR . 'themes/bb-theme/class-bb-theme-compat.php';
			} elseif ( 'generatepress' == $this->template ) {

				require EKIT_HF_DIR . 'themes/generatepress/class-generatepress-compat.php';
			} elseif ( 'vinkmag' == $this->template || 'vinazine' == $this->template ) {

				require EKIT_HF_DIR . 'themes/vinkmag/class-vinkmag-compat.php';
			} elseif ( 'oceanwp' == $this->template ) {

				require EKIT_HF_DIR . 'themes/oceanwp/class-oceanwp-compat.php';
			} else {
				add_action( 'init', array( $this, 'setup_unsupported_theme_notice' ) );
			}

			// Scripts and styles.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

			add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'editor_scripts' ),10);


			add_filter( 'body_class', array( $this, 'body_class' ) );
			add_action( 'switch_theme', array( $this, 'reset_unsupported_theme_notice' ) );

			add_shortcode( 'ekit_template', array( $this, 'render_template' ) );


			add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_styles' ) );
			add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_styles' ) );

			add_action( 'wp_enqueue_scripts', array($this, 'ekit_frontend_enqueue_js') );
			add_action( 'wp_enqueue_scripts', array($this, 'ekit_frontend_enqueue_style'), 99 );

		} else {

			add_action( 'admin_notices', array( $this, 'elementor_not_available' ) );
			add_action( 'network_admin_notices', array( $this, 'elementor_not_available' ) );
		}
	}

	/**
	 * roll back to main header for Unsupported theme
	 */
	public function reset_unsupported_theme_notice() {
		delete_user_meta( get_current_user_id(), 'ekit-hf-sites-notices-id-unsupported-theme' );
	}

	function ekit_frontend_enqueue_js() {
		if(!is_admin()){
			wp_enqueue_script( 'easing', EKIT_HF_URL . 'elements/widgets/nav-menu/assets/js/jquery.easing.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smartmenus', EKIT_HF_URL . 'elements/widgets/nav-menu/assets/js/jquery.smartmenus.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'smartmenus-script', EKIT_HF_URL . 'elements/widgets/nav-menu/assets/js/menu-script.js', array( 'jquery' ), false, true );
		}
	}


	function ekit_frontend_enqueue_style() {
		if(!is_admin()){
			wp_enqueue_style( 'smartmenus-ekit', EKIT_HF_URL . 'elements/widgets/nav-menu/assets/css/smartmenus.css', false, '1.0' );
		}
	}


	public function elementor_not_available() {

		if ( file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) ) {
			$url = network_admin_url() . 'plugins.php?s=elementor';
		} else {
			$url = network_admin_url() . 'plugin-install.php?s=elementor';
		}

		echo '<div class="notice notice-error">';
		echo '<p>' . sprintf( __( 'The <strong>Elementskit Template</strong> plugin requires <strong><a href="%s">Elementor</strong></a> plugin installed & activated.', 'ekit-headerfooter' ) . '</p>', $url );
		echo '</div>';
	}

	/**
	 * Loads the globally required files for the plugin.
	 */
	public function includes() {
		require_once EKIT_HF_DIR . 'admin/class-admin.php';

		require_once EKIT_HF_DIR . 'inc/functions.php';

		// Load Elementor Canvas Compatibility. // force to change the canvas page template
		require_once EKIT_HF_DIR . 'inc/class-elementor-canvas-compat.php';

		// Load the Admin Notice Class.
		require_once EKIT_HF_DIR . 'inc/class-notices.php';
	}

	public function editor_scripts(){
		wp_enqueue_script(
			'ekit-hf-editor-script',
			EKIT_HF_URL . 'admin/assets/js/ekit-hf-editor.js',
			array('jquery', 'underscore', 'backbone-marionette'),
			EKIT_HF_VER,
			true
		);
	}
	public function enqueue_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_style( 'ekit-hf-style', EKIT_HF_URL . 'assets/css/ekit-headerfooter.css', array(), EKIT_HF_VER );

		if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {

			if ( class_exists( '\Elementor\Plugin' ) ) {
				$elementor = \Elementor\Plugin::instance();
				$elementor->frontend->enqueue_styles();
			}

			if ( class_exists( '\ElementorPro\Plugin' ) ) {
				$elementor_pro = \ElementorPro\Plugin::instance();
				$elementor_pro->enqueue_styles();
			}

			if ( ekit_hf_header_enabled() ) {
				$css_file = new \Elementor\Core\Files\CSS\Post( get_ekit_hf_header_id() );
				$css_file->enqueue();
			}

			if ( ekit_hf_footer_enabled() ) {
				$css_file = new \Elementor\Core\Files\CSS\Post( get_ekit_hf_footer_id() );
				$css_file->enqueue();
			}
		}
	}

	/**
	 * Load admin styles on Elementskit Template edit screen.
	 */
	public function enqueue_admin_scripts() {
		global $pagenow;
		$screen = get_current_screen();

		if ( ( 'elementor-hf' == $screen->id && ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) ) || ( 'edit.php' == $pagenow && 'edit-elementor-hf' == $screen->id ) ) {
			wp_enqueue_style( 'ekit-hf-admin-style', EKIT_HF_URL . 'admin/assets/css/ekit-headerfooter.css', array(), EKIT_HF_VER );
			wp_enqueue_script( 'ekit-hf-admin-script', EKIT_HF_URL . 'admin/assets/js/ekit-hf-admin.js', array(), EKIT_HF_VER );
		}
	}

	public function editor_styles(){
		wp_enqueue_style( 'ekit-hf-editor-style', EKIT_HF_URL . 'admin/assets/css/editor.css', array(), EKIT_HF_VER );
	}

	public function preview_styles(){
		wp_enqueue_style( 'ekit-hf-preview-style', EKIT_HF_URL . 'admin/assets/css/preview.css', array(), EKIT_HF_VER );
	}

	/**
	 * Adds classes to the body tag conditionally for custom css
	 */
	public function body_class( $classes ) {

		if ( ekit_hf_header_enabled() ) {
			$classes[] = 'ekit-hf-header';
		}

		if ( ekit_hf_footer_enabled() ) {
			$classes[] = 'ekit-hf-footer';
		}

		$classes[] = 'ekit-hf-template-' . $this->template;
		$classes[] = 'ekit-hf-stylesheet-' . get_stylesheet();

		return $classes;
	}

	/**
	 * Display Unsupported theme notice
	 */
	public function setup_unsupported_theme_notice() {

		if ( ! current_theme_supports( 'ekit-headerfooter' ) ) {
			EKIT_HF_Notices::add_notice(
				array(
					'id'          => 'unsupported-theme',
					'type'        => 'error',
					'dismissible' => true,
					'message'     => __( 'Your current theme is not supported by Elementskit Template', 'ekit-headerfooter' ),
				)
			);
		}

	}

	/**
	 * Prints the Header content.
	 */
	public static function get_header_content() {
		echo self::$elementor_instance->frontend->get_builder_content_for_display( get_ekit_hf_header_id() );
	}

	/**
	 * Prints the Footer content.
	 */
	public static function get_footer_content() {

		echo "<div class='footer-width-fixer'>";
		echo self::$elementor_instance->frontend->get_builder_content_for_display( get_ekit_hf_footer_id() );
		echo '</div>';
	}

	/**
	 * Get option for the plugin settings
	 *
	 * @param  mixed $setting Option name.
	 * @param  mixed $default Default value to be received if the option value is not stored in the option.
	 *
	 * @return mixed.
	 */
	public static function get_settings( $setting = '', $default = '' ) {
		if ( 'type_header' == $setting || 'type_footer' == $setting || 'type_before_footer' == $setting ) {
			$templates = self::get_template_id( $setting );

			$template = is_array( $templates ) ? $templates[0] : '';
			$template = apply_filters( "ekit_hf_get_settings_{$setting}", $template );

			return $template;
		}
	}

	/**
	 * Get header or footer template id based on the meta query.
	 *
	 * @param  String $type Type of the template header/footer.
	 *
	 * @return Mixed       Returns the header or footer template id if found, else returns string ''.
	 */
	public static function get_template_id( $type ) {

		$cached = wp_cache_get( $type );

		if ( false !== $cached ) {
			return $cached;
		}

		$args = array(
			'post_type'    => 'elementor-hf',
			'meta_key'     => 'ehf_template_type',
			'meta_value'   => $type,
			'meta_type'    => 'post',
			'meta_compare' => '>=',
			'orderby'      => 'meta_value',
			'order'        => 'ASC',
			'meta_query'   => array(
				'relation' => 'OR',
				array(
					'key'     => 'ehf_template_type',
					'value'   => $type,
					'compare' => '==',
					'type'    => 'post',
				),
			),
		);

		$args = apply_filters( 'ekit_hf_get_template_id_args', $args );

		$template = new WP_Query(
			$args
		);

		if ( $template->have_posts() ) {
			$posts = wp_list_pluck( $template->posts, 'ID' );
			wp_cache_set( $type, $posts );

			return $posts;
		}

		return '';
	}

	/**
	 * shrtcode added
	 */
	public function render_template( $atts ) {

		$atts = shortcode_atts(
			array(
				'id' => '',
			),
			$atts,
			'ekit_template'
		);

		$id = ! empty( $atts['id'] ) ? intval( $atts['id'] ) : '';

		if ( empty( $id ) ) {
			return '';
		}

		if ( class_exists( '\Elementor\Core\Files\CSS\Post' ) ) {

			// Load elementor styles.
			$css_file = new \Elementor\Core\Files\CSS\Post( $id );
			$css_file->enqueue();
		}

		return self::$elementor_instance->frontend->get_builder_content_for_display( $id );

	}

}
