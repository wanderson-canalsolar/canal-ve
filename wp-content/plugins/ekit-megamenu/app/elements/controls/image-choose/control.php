<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Ekit_Image_Choose_Controler extends \Elementor\Base_Data_Control {

	/**
	 * Get choose control type.
	 *
	 * Retrieve the control type, in this case `choose`.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'imagechoose';
	}

	/**
	 * Enqueue ontrol scripts and styles.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function enqueue() {
		// styles
		wp_register_style( 'css-image-choose-contrdol',  EKIT_MEGAMENU_ELEMENTS_URL . 'controls/image-choose/assets/css/style.css', [], '1.0.0' );
		wp_enqueue_style( 'css-image-choose-contrdol' );

		// script	
		wp_register_script( 'js-image-choose-control',  EKIT_MEGAMENU_ELEMENTS_URL . 'controls/image-choose/assets/js/script.js' );
		wp_enqueue_script( 'js-image-choose-control' );
	}

	/**
	 * Render choose control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function content_template() {
		$control_uid = $this->get_control_uid( '{{value}}' );
		?>
		<div class="elementor-control-field">
			<label class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<div class="elementor-image-choices">
					<# _.each( data.options, function( options, value ) { #>
					<div class="image-choose-label-block" 
					style="width:{{ options.width }}">
						<input id="<?php echo esc_attr($control_uid); ?>" type="radio" name="elementor-choose-{{ data.name }}-{{ data._cid }}" value="{{ value }}">
						<label class="elementor-image-choices-label" for="<?php echo esc_attr($control_uid); ?>" title="{{ options.title }}">
							<img class="imagesmall" src="{{ options.imagesmall }}" alt="{{ options.title }}" />
							<span class="imagelarge">
								<img src="{{ options.imagelarge }}" alt="{{ options.title }}" />
							</span>
							<span class="elementor-screen-only">{{{ options.title }}}</span>
						</label>
					</div>
					<# } ); #>
				</div>
			</div>
		</div>

		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}

	/**
	 * Get choose control default settings.
	 *
	 * Retrieve the default settings of the choose control. Used to return the
	 * default settings while initializing the choose control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'options' => []
		];
	}
}
