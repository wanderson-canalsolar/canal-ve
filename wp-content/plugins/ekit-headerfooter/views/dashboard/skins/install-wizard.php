<?php
/**
 * Install wizard message
 */

$all_plugins = get_plugins();
$wizard      = $this->wizard_data();
$slug        = sprintf( '%1$s/%1$s.php', $wizard['slug'] );

if ( array_key_exists( $slug, $all_plugins ) ) {
	$action = 'activate-wizard';
	$label  = esc_html__( 'Activate', 'ekit-theme-core' );
} else {
	$action = 'install-wizard';
	$label  = esc_html__( 'Install Plugin', 'ekit-theme-core' );
}

?>
<div class="ekit-install-wizard">
	<div class="ekit-install-wizard__content"><?php
		_e( 'You need to install and activate <b>ekitPluginsWizard</b> to manage skins', 'ekit-theme-core' );
	?></div>
	<a href="#" data-action="<?php echo $action; ?>" class="cx-button cx-button-primary-style"><?php
		echo $label;
	?></a>
	<div class="ekit-install-wizard__msg"></div>
</div>