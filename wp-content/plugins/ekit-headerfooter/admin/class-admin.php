<?php

defined( 'ABSPATH' ) or exit;

/**
 * EKIT_HF_Admin setup after plugin activated
 */
class EKIT_HF_Admin {

	private static $_instance = null;

	public static function instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	private function __construct() {
		add_action( 'init', array( $this, 'header_footer_posttype' ) );
		add_action( 'admin_menu', array( $this, 'register_admin_menu' ), 50 );
		add_action( 'add_meta_boxes', array( $this, 'ehf_register_metabox' ) );
		add_action( 'save_post', array( $this, 'ehf_save_meta' ) );
		add_action( 'admin_notices', array( $this, 'location_notice' ) );
		add_action( 'template_redirect', array( $this, 'block_template_frontend' ) );
		add_filter( 'single_template', array( $this, 'load_canvas_template' ) );

		add_filter( 'manage_elementor-hf_posts_columns', array( $this, 'set_shortcode_columns' ) );

		add_action( 'manage_elementor-hf_posts_custom_column', array( $this, 'render_shortcode_column' ), 10, 2 );

	}

	public function header_footer_posttype() {

		$labels = array(
			'name'               => __( 'Header Footers', 'ekit-headerfooter' ),
			'singular_name'      => __( 'Header Footer', 'ekit-headerfooter' ),
			'menu_name'          => __( 'HeaderFooter Builder', 'ekit-headerfooter' ),
			'name_admin_bar'     => __( 'Header Footers', 'ekit-headerfooter' ),
			'add_new'            => __( 'Add New', 'ekit-headerfooter' ),
			'add_new_item'       => __( 'Add New Template', 'ekit-headerfooter' ),
			'new_item'           => __( 'New Template', 'ekit-headerfooter' ),
			'edit_item'          => __( 'Edit Template', 'ekit-headerfooter' ),
			'view_item'          => __( 'View Template', 'ekit-headerfooter' ),
			'all_items'          => __( 'All Templates', 'ekit-headerfooter' ),
			'search_items'       => __( 'Search Templates', 'ekit-headerfooter' ),
			'parent_item_colon'  => __( 'Parent Templates:', 'ekit-headerfooter' ),
			'not_found'          => __( 'No Templates found.', 'ekit-headerfooter' ),
			'not_found_in_trash' => __( 'No Templates found in Trash.', 'ekit-headerfooter' ),
		);

		$args = array(
			'labels'              => $labels,
			'public'              => true,
			'rewrite'             => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => false,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'hierarchical'        => false,
			'menu_icon'           => 'dashicons-editor-kitchensink',
			'supports'            => array( 'title', 'thumbnail', 'elementor' ),
		);

		register_post_type( 'elementor-hf', $args );
	}

	public function register_admin_menu() {
		add_submenu_page(
			'ekit_menu_settings',
			__( 'Header Footer', 'ekit-headerfooter' ),
			__( 'Header Footer', 'ekit-headerfooter' ),
			'edit_pages',
			'edit.php?post_type=elementor-hf'
		);
	}

	function ehf_register_metabox() {
		add_meta_box(
			'ekit-hf-meta-box',
			__( 'Elementskit options', 'ekit-headerfooter' ),
			array(
				$this,
				'efh_metabox_render',
			),
			'elementor-hf',
			'normal',
			'high'
		);
	}

	function efh_metabox_render( $post ) {
		$values            = get_post_custom( $post->ID );
		$template_type     = isset( $values['ehf_template_type'] ) ? esc_attr( $values['ehf_template_type'][0] ) : '';
		$display_on_canvas = isset( $values['display-on-canvas-template'] ) ? true : false;

		wp_nonce_field( 'ehf_meta_nounce', 'ehf_meta_nounce' );
		?>
		<table class="ekit-hf-options-table widefat">
			<tbody>
				<tr class="ekit-hf-options-row">
					<td class="ekit-hf-options-row-heading">
						<label for="ehf_template_type"><?php _e( 'Activate for', 'ekit-headerfooter' ); ?></label>
					</td>
					<td class="ekit-hf-options-row-content">
						<select name="ehf_template_type" id="ehf_template_type">
							<option value="" <?php selected( $template_type, '' ); ?>><?php _e( 'None', 'ekit-headerfooter' ); ?></option>
							<option value="type_header" <?php selected( $template_type, 'type_header' ); ?>><?php _e( 'Header', 'ekit-headerfooter' ); ?></option>
							<?php if ( 'astra' == get_template() ) { ?>
								<option value="type_before_footer" <?php selected( $template_type, 'type_before_footer' ); ?>><?php _e( 'Before Footer', 'ekit-headerfooter' ); ?></option>
							<?php } ?>
							<option value="type_footer" <?php selected( $template_type, 'type_footer' ); ?>><?php _e( 'Footer', 'ekit-headerfooter' ); ?></option>
						</select>
					</td>
				</tr>
				<tr class="ekit-hf-options-row ekit-hf-shortcode">
					<td class="ekit-hf-options-row-heading">
						<label for="ehf_template_type"><?php _e( 'Shortcode', 'ekit-headerfooter' ); ?></label>
						<i class="ekit-hf-options-row-heading-help dashicons dashicons-editor-help" title="<?php _e( 'Copy this shortcode and paste it into your post, page, or text widget content.', 'ekit-headerfooter' ); ?>">
						</i>
					</td>
					<td class="ekit-hf-options-row-content">
						<span class="ekit-hf-shortcode-col-wrap">
							<input type="text" onfocus="this.select();" readonly="readonly" value="[ekit_template id='<?php echo esc_attr( $post->ID ); ?>']" class="ekit-hf-large-text code">
						</span>
					</td>
				</tr>
				<tr class="ekit-hf-options-row">
					<td class="ekit-hf-options-row-heading">
						<label for="display-on-canvas-template">
							<?php _e( 'Enable Layout for Elementor Canvas Template?', 'ekit-headerfooter' ); ?>
						</label>
						<i class="ekit-hf-options-row-heading-help dashicons dashicons-editor-help" title="<?php _e( 'Enabling this option will display this layout on pages using Elementor Canvas Template.', 'ekit-headerfooter' ); ?>"></i>
					</td>
					<td class="ekit-hf-options-row-content">
						<input type="checkbox" id="display-on-canvas-template" name="display-on-canvas-template" value="1" <?php checked( $display_on_canvas, true ); ?> />
					</td>
				</tr>
			</tbody>
		</table>
		<?php
	}

	public function ehf_save_meta( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['ehf_meta_nounce'] ) || ! wp_verify_nonce( $_POST['ehf_meta_nounce'], 'ehf_meta_nounce' ) ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( isset( $_POST['ehf_template_type'] ) ) {
			update_post_meta( $post_id, 'ehf_template_type', esc_attr( $_POST['ehf_template_type'] ) );
		}

		if ( isset( $_POST['display-on-canvas-template'] ) ) {
			update_post_meta( $post_id, 'display-on-canvas-template', esc_attr( $_POST['display-on-canvas-template'] ) );
		} else {
			delete_post_meta( $post_id, 'display-on-canvas-template' );
		}

	}

	public function location_notice() {

		global $pagenow;
		global $post;

		if ( 'post.php' != $pagenow || ! is_object( $post ) || 'elementor-hf' != $post->post_type ) {
			return;
		}

		$template_type = get_post_meta( $post->ID, 'ehf_template_type', true );

		if ( '' !== $template_type ) {
			$templates = Ekit_header_footer::get_template_id( $template_type );

			if ( is_array( $templates ) && isset( $templates[1] ) && $post->ID != $templates[0] ) {

				$post_title        = '<strong>' . get_the_title( $templates[0] ) . '</strong>';
				$template_location = '<strong>' . $this->template_location( $template_type ) . '</strong>';
				$message = sprintf( __( 'Template %1$s is already assigned to the location %2$s', 'ekit-headerfooter' ), $post_title, $template_location );

				echo '<div class="error"><p>';
				echo $message;
				echo '</p></div>';
			}
		}

	}

	/**
	 * Convert the Template name to be added in the notice.
	 */
	public function template_location( $template_type ) {
		$template_type = ucfirst( str_replace( 'type_', '', $template_type ) );

		return $template_type;
	}

	public function block_template_frontend() {
		if ( is_singular( 'elementor-hf' ) && ! current_user_can( 'edit_posts' ) ) {
			wp_redirect( site_url(), 301 );
			die;
		}
	}

	function load_canvas_template( $single_template ) {

		global $post;

		if ( 'elementor-hf' == $post->post_type ) {

			$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

			if ( file_exists( $elementor_2_0_canvas ) ) {
				return $elementor_2_0_canvas;
			} else {
				return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
			}
		}

		return $single_template;
	}

	/**
	 * Set custom column for template list.
	 */
	function set_shortcode_columns( $columns ) {

		$date_column = $columns['date'];

		unset( $columns['date'] );

		$columns['type'] = __( 'Type', 'ekit-headerfooter' );
		$columns['shortcode'] = __( 'Shortcode', 'ekit-headerfooter' );
		$columns['date']      = $date_column;

		return $columns;
	}

	/**
	 * Display custom column in template list column.
	 */
	function render_shortcode_column( $column, $post_id ) {

		switch ( $column ) {
			case 'shortcode':
				?>
				<span class="ekit-hf-shortcode-col-wrap">
					<input type="text" onfocus="this.select();" readonly="readonly" value="[ekit_template id='<?php echo esc_attr( $post_id ); ?>']" class="ekit-hf-large-text code">
				</span>

				<?php

				break;

			case 'type':
				$type = get_post_meta( $post_id, 'ehf_template_type', true );
				echo str_replace('type_', '', $type);
				break;
		}
	}
}

EKIT_HF_Admin::instance();
