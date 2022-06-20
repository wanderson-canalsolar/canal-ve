<?php
/**
 * Main Crocoblock theme template
 */
?>
<div class="ekit-theme">
	<img src="<?php echo $remote_data['theme_thumb']; ?>" class="ekit-theme__thumb">
	<div class="ekit-theme__content">
		<h4 class="ekit-theme__name"><?php echo $remote_data['theme_name']; ?></h4>
		<div class="ekit-theme__status"><?php echo $theme_status['message']; ?></div>
		<div class="ekit-theme__version"><?php

			echo '<span class="ekit-theme__version-val">';
			echo $theme_status['version'];
			echo '</span>';

			if ( $has_update ) {

				$update_link = sprintf(
					'<a href="#" class="ekit-theme__update-link" data-action="update-theme">%1$s</a>',
					__( 'Update now', 'ekit-theme-core' )
				);

				printf(
					'<span class="ekit-theme__update-notice">%1$s - %2$s - %3$s</span>',
					__( 'New version available', 'ekit-theme-core' ),
					$remote_data['theme_version'],
					$update_link
				);
			} elseif ( $installed ) {
				printf(
					'<a href="%1$s" class="ekit-theme__check-updates">%2$s</a>',
					$this->get_check_updates_url(),
					__( 'Check Updates', 'ekit-theme-core' )
				);
			}
		?></div>
	</div>
	<div class="ekit-theme__errors"></div>
</div>