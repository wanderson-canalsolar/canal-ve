<?php
/**
 * Activate license control
 */
?>
<div class="ekit-core-license">
	<p><?php
		esc_html_e( 'Enter your license key here, to activate Crocoblock, and get feature updates, premium support and unlimited access to the template library.', 'ekit-theme-core' );
	?></p>

	<ol>
		<li><?php esc_html_e( 'Log in to your account to get your license key.', 'ekit-theme-core' ); ?></li>
		<li><?php esc_html_e( 'Copy the license key from your account and paste it below.', 'ekit-theme-core' ); ?></li>
	</ol>

	<label for="ekit_core_license"><?php esc_html_e( 'Your License Key', 'ekit-theme-core' ); ?></label>
	<div class="ekit-core-license__form">
		<input id="ekit_core_license" class="ekit-core-license__input cx-ui-text" placeholder="<?php esc_html_e( 'Please enter your license key here', 'ekit-theme-core' ); ?>">
		<button type="button" class="cx-button cx-button-primary-style" id="ekit_activate_license"><?php
			esc_html_e( 'Activate', 'ekit-theme-core' );
		?></button>
	</div>
	<div class="ekit-core-license__errors"><?php echo $error_message; ?></div>

	<?php esc_html_e( 'Your license key should look something like this:', 'ekit-theme-core' ); ?> eb845a05958893feb72E137a501f35bf
</div>