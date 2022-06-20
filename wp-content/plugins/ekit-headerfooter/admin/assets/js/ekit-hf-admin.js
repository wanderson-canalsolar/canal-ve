jQuery(document).ready(function ($) {

	var ehf_hide_shortcode_field = function() {

		var selected = jQuery('#ehf_template_type').val();

		if( 'custom' == selected ) {
			jQuery( '.ekit-hf-options-row.ekit-hf-shortcode' ).show();
		} else {
			jQuery( '.ekit-hf-options-row.ekit-hf-shortcode' ).hide();
		}
	}

	jQuery(document).on( 'change', '#ehf_template_type', function( e ) {
		ehf_hide_shortcode_field();
	});

	ehf_hide_shortcode_field();

    function ekit_url_replace_param(url, paramName, paramValue){
        if (paramValue == null) {
            paramValue = '';
        }
        var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
        if (url.search(pattern)>=0) {
            return url.replace(pattern,'$1' + paramValue + '$2');
        }
        url = url.replace(/[?#]$/,'');
        return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
    }

	var tab_container = $('.wp-list-table');
	var tabs = '';
	var xs_types = {
		'type_header': 'Header',
		'type_footer': 'Footer',
		'type_before_footer': 'Before footer',
		'type_section': 'Section',
	};
	var url = new URL(window.location.href);
	var c = url.searchParams.get("xs_type");
	c = (c == null) ? 'all' : c;

	$.each(xs_types, function(i, v){
		var url = ekit_url_replace_param(window.location.href, 'xs_type', i);
		var klass = (c == i) ? 'active' : ' ';
 		tabs += "\n";
	});
	tab_container.before('<div id="ekit-template-tab-holder">'+ tabs +'</div>');
});
