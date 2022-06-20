;
(function($) {
	$.fn.tab = function(options) {
		var opts = $.extend({}, $.fn.tab.defaults, options);
		return this.each(function() {
			var obj = $(this);
			$(obj).find('.tabHeader > .tab__list > .tab__list__item').on(opts.trigger_event_type, function() {
				$(obj).find('.tabHeader > .tab__list > .tab__list__item').removeClass('active');
				$(this).addClass('active');
				$('.tabContent > .tabItem').removeClass('active');
				$(obj).find('.tabContent > .tabItem').eq($(this).index()).addClass('active');
				$(obj).find('.tabContent > .tabItem').hide();
				$(obj).find('.tabContent > .tabItem').eq($(this).index()).show();
			})
		});
	}
	$.fn.tab.defaults = {
		trigger_event_type: 'click', //mouseover | click 默认是click
	};

})(jQuery);

"use strict";
jQuery(document).ready(function($) {
	$('.hover--active').tab({
		trigger_event_type : 'mouseover'
	});
});
