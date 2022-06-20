<?php
/**
 * User guide page heading
 */

if ( $title ) {
	?>
	<h4 class="ekit-guide-title"><?php echo $title; ?></h4>
	<?php
}

if ( $content ) {
	?>
	<p class="ekit-guide-content"><?php echo $content; ?></p>
	<?php
}