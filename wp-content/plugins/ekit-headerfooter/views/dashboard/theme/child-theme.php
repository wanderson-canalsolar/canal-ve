<?php
/**
 * Child theme template
 */
?>
<div class="ekit-child-theme">
	<h4 class="ekit-child-theme__name"><?php _e( 'Child Theme', 'ekit-theme-core' ); ?></h4>
	<div class="ekit-child-theme__status">
		<b><?php _e( 'Status:', 'ekit-theme-core' ); ?></b>
		<span><?php echo $child_status['message']; ?></span>
	</div>
	<?php if ( 'not_installed' === $child_status['code'] ) : ?>
	<div class="ekit-child-theme__install">
		<button class="cx-button cx-button-primary-style" data-action="install-child" type="button"><?php
			_e( 'Install', 'ekit-theme-core' );
		?></button>
	</div>
	<?php endif; ?>
	<div class="ekit-child-theme__errors"></div>
</div>