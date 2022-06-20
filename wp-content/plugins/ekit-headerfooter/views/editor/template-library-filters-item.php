<?php
/**
 * Template Library Header Template
 */
?>
<label class="ekit-template-library-filter-label">
	<input type="radio" value="{{ slug }}" <# if ( '' === slug ) { #> checked<# } #> name="ekit-library-filter">
	<span>{{ title }}</span>
</label>