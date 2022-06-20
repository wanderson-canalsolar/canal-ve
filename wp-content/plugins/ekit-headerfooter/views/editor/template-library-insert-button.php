<# if ( window.EkitLibreryData.license.activated ) { #>
<button class="elementor-template-library-template-action ekit-template-library-template-insert elementor-button elementor-button-success">
	<i class="eicon-file-download"></i><span class="elementor-button-title"><?php
		esc_html_e( 'Insert', 'ekit-theme-core' );
	?></span>
</button>
<# } else { #>
{{{ window.EkitLibreryData.license.link }}}
<# } #>