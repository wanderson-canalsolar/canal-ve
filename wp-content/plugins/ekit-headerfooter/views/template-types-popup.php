<?php
/**
 * Teamplte type popup
 */
?>
<div class="ekit-template-types-popup">
	<div class="ekit-template-types-popup__overlay"></div>
	<div class="ekit-template-types-popup__content">
		<h3 class="ekit-template-types-popup__heading"><?php
			esc_html_e( 'Select Template Type', 'ekit-theme-core' );
		?></h3>
		<form class="ekit-template-types-popup__form" id="templates_type_form" method="POST" action="<?php echo $action; ?>" >
			<div class="ekit-template-types-popup__form-row">
				<label for="template_type"><?php esc_html_e( 'Select Type:', 'ekit-theme-core' ); ?></label>
				<select id="template_type" name="template_type"><?php
					foreach ( $template_types as $type => $label ) {
						printf(
							'<option value="%1$s" %3$s>%2$s</option>',
							$type,
							$label,
							selected( $selected, $type, false )
						);
					}
				?></select>
			</div>
			<div class="ekit-template-types-popup__form-row">
				<label for="template_name"><?php esc_html_e( 'Template Name:', 'ekit-theme-core' ); ?></label>
				<input type="text" id="template_name" name="template_name" placeholder="<?php esc_html_e( 'Set template name', 'ekit-theme-core' ); ?>">
			</div>
			<div class="ekit-template-types-popup__form-actions">
				<button type="button" id="templates_type_submit" class="button button-primary button-hero"><?php
					esc_html_e( 'Create Template', 'ekit-theme-core' );
				?></button>
			</div>
		</form>
	</div>
</div>