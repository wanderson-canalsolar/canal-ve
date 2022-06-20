jQuery(document).ready(function ($) {

	jQuery( '.ekit-hf-notice.is-dismissible .notice-dismiss' ).on( 'click', function() {
		_this 		= jQuery( this ).parents( '.ekit-hf-active-notice' );
		var $id 	= _this.attr( 'id' ) || '';
		var $time 	= _this.attr( 'dismissible-time' ) || '';
		var $meta 	= _this.attr( 'dismissible-meta' ) || '';

		jQuery.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action 	: 'ekit-hf-notices',
				id 		: $id,
				meta 	: $meta,
				time 	: $time,
			},
		});

	});

});