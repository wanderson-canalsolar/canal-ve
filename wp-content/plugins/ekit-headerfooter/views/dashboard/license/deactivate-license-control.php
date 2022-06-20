<?php
/**
 * Activate license control
 */
?>
<div class="ekit-core-license">
	<div class="ekit-core-license__errors"><?php echo $error_message; ?></div>
	<label for="ekit_core_license"><?php esc_html_e( 'Your License Key', 'ekit-theme-core' ); ?></label>
	<div class="ekit-core-license__form">
		<input id="ekit_core_license" class="ekit-core-license__input cx-ui-text" value="<?php echo $formated_license; ?>">
		<button type="button" class="cx-button cx-button-normal-style" id="ekit_deactivate_license"><?php
			esc_html_e( 'Deactivate', 'ekit-theme-core' );
		?></button>
	</div>
	<?php esc_html_e( 'Status:', 'ekit-theme-core' ); ?>&nbsp;
	<?php
		$status = ekit_theme_core()->api->license_status( $license );
		printf(
			'<span class="ekit-core-license__status status-%1$s">%2$s</span>',
			( true === $status['success'] ? 'success' : 'error' ),
			$status['message']
		);
	?>
</div>