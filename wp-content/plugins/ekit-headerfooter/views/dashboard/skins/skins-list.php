<?php
/**
 * Skins list template
 */
?>
<div class="ekit-skins">
<?php foreach ( $skins as $slug => $skin ) : ?>
<div class="ekit-skin">
	<div class="ekit-skin__wrap">
		<div class="ekit-skin__thumb">
			<img src="<?php echo $skin['thumb'] ?>" alt="" class="ekit-skin__thumb-img">
		</div>
		<div class="ekit-skin__content">
			<h4 class="ekit-skin__title"><?php echo $skin['name']; ?></h4>
			<div class="ekit-skin__actions">
				<?php $this->install_skin_link( $slug ); ?>
				<a href="<?php echo $skin['demo']; ?>" class="cx-button cx-button-normal-style" target="_blank" rel="noopener"><?php
					_e( 'Live Demo', 'ekit-theme-core' );
				?></a>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
</div>