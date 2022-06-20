<?php
/**
 * ekit Core template
 */

?>
<div class="ekit-plugin ekit-core">
	<img src="<?php echo $logo; ?>" alt="" class="ekit-plugin__thumb">
	<div class="ekit-plugin__content">
		<h4 class="ekit-plugin__title"><?php echo $plugin_data['Name']; ?></h4>
		<div class="ekit-plugin__version current-version">Current Version: <b><?php
			echo $latest_version;
		?></b></div>
		<div class="ekit-plugin__version user-version">Your Version: <b><?php if ( isset( $plugin_data['Version'] ) ) {
			echo $plugin_data['Version'];
		} else {
			echo '---';
		} ?></b></div>
		<div class="ekit-plugin__actions">
			<?php if ( $has_update ) : ?>
			<a href="#" data-action="update" data-plugin="<?php echo $slug; ?>" class="ekit-plugin__actions-link"><?php
				_e( 'Update', 'ekit-theme-core' );
			?></a>
			<?php endif; ?>
			<a href="<?php echo $docs; ?>" target="_blank" class="ekit-plugin__actions-link" rel="noopener"><?php
				_e( 'Documentation', 'ekit-theme-core' );
			?></a>
			<?php if ( $license_key ) : ?>
			<a href="<?php echo $this->sync_library_url(); ?>" class="ekit-plugin__actions-link"><?php
				_e( 'Synchronize Templates Library', 'ekit-theme-core' );
			?></a>
			<?php endif; ?>
		</div>
		<div class="ekit-plugin__errors">
		</div>
	</div>
</div>