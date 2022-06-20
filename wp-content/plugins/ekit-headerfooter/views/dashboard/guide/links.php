<?php
/**
 * Useful links list for user guide page
 */
?>
<div class="ekit-guide-links">
	<?php foreach ( $links as $id => $data ) { ?>
	<div class="ekit-guide-links__item">
		<div class="ekit-guide-links__item-desc">
			<span class="dashicons <?php echo $data['icon']; ?>"></span>
			<span><?php echo $data['desc']; ?></span>
		</div>
		<a href="<?php echo $data['url']; ?>" class="ekit-guide-links__item-link cx-button cx-button-normal-style" target="<?php echo $data['target']; ?>"><?php
			echo $data['label'];
		?></a>
	</div>
	<?php } ?>
</div>