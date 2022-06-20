<?php
/**
 * Backups list
 */
?>
<div class="ekit-backups">
	<table>
		<thead>
			<tr>
				<th class="ekit-backups-file"><?php
					_e( 'File', 'ekit-theme-core' );
				?></th>
				<th class="ekit-backups-date"><?php
					_e( 'Created', 'ekit-theme-core' );
				?></th>
				<th class="ekit-backups-actions"><?php
					_e( 'Actions', 'ekit-theme-core' );
				?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ( $backups as $backup ) { ?>
			<tr>
				<td class="ekit-backups-file"><?php echo $backup['name']; ?></td>
				<td class="ekit-backups-date"><?php echo $backup['date']; ?></td>
				<td class="ekit-backups-actions"><?php echo $this->get_backup_actions( $backup['name'] ); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>