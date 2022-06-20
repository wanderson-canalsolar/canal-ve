<?php
/**
 * Template item
 */
?>
<# var activeTab = window.EkitLibreryData.tabs[ type ]; #>
<div class="elementor-template-library-template-body">
	<# if ( 'ekit-local' !== source ) { #>
	<div class="elementor-template-library-template-screenshot">
		<# if ( 'ekit-local' !== source ) { #>
		<div class="elementor-template-library-template-preview">
			<i class="xsicon xsicon-search"></i>
		</div>
		<# } #>
		<img src="{{ thumbnail }}" alt="">
	</div>
	<# } #>
</div>
<div class="elementor-template-library-template-controls">
	<# if ( 'ekit-local' === source || window.EkitLibreryData.license.activated ) { #>
	<button class="elementor-template-library-template-action ekit-template-library-template-insert elementor-button elementor-button-success">
		<i class="eicon-file-download"></i>
		<span class="elementor-button-title"><?php esc_html_e( 'Insert', 'ekit-theme-core' ); ?></span>
	</button>
	<# } else if ( 'ekit-local' !== source ) { #>
		{{{ window.EkitLibreryData.license.link }}}
	<# } #>
	<# if ( 'ekit-local' !== source && window.EkitLibreryData.license.activated ) { #>
	<button class="ekit-clone-to-library">
		<i class="xsicon xsicon-file" aria-hidden="true"></i>
		<?php esc_html_e( 'Clone to Library', 'ekit-theme-core' ); ?>
	</button>
	<# } #>
</div>
<# if ( 'ekit-local' === source || true == activeTab.settings.show_title ) { #>
<div class="elementor-template-library-template-name">{{{ title }}}</div>
<# } else { #>
<div class="elementor-template-library-template-name-holder"></div>
<# } #>
<# if ( 'ekit-local' === source ) { #>
<div class="elementor-template-library-template-type">
	<?php esc_html_e( 'Type:', 'ekit-theme-core' ); ?> {{{ typeLabel }}}
</div>
<# } #>