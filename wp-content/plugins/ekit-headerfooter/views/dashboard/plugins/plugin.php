<?php
/**
 * ekit Plugin item template
 */

?>
<div class="ekit-plugin">
	<img src="<?php echo $thumb; ?>" alt="" class="ekit-plugin__thumb">
	<div class="ekit-plugin__content">
		<h4 class="ekit-plugin__title"><?php echo $name; ?></h4>
		<div class="ekit-plugin__version current-version">Current Version: <b><?php
			echo $this->get_latest_version( $plugin );
		?></b></div>
		<div class="ekit-plugin__version user-version">Your Version: <b><?php if ( isset( $plugin_data['Version'] ) ) {
			echo $plugin_data['Version'];
		} else {
			echo '---';
		} ?></b></div>
		<div class="ekit-plugin__actions">
			<?php if ( empty( $plugin_data ) ) : ?>
			<?php $this->install_plugin_link( $slug ); ?>
			<?php elseif ( $this->is_update_available( $plugin, $plugin_data ) ) : ?>
			<a href="#" data-action="update" data-plugin="<?php echo $slug; ?>" class="ekit-plugin__actions-link"><?php
				_e( 'Update', 'ekit-theme-core' );
			?></a>
			<?php endif; ?>
			<a href="<?php echo $docs; ?>" target="_blank" class="ekit-plugin__actions-link" rel="noopener"><?php
				_e( 'Documentation', 'ekit-theme-core' );
			?></a>
		</div>
		<div class="ekit-plugin__errors">
		</div>
	</div>
</div>