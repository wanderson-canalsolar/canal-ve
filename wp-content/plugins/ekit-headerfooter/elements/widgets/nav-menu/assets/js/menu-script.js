(function ($) {
    "use strict";

    jQuery(document).ready(function ($) {
		function togglerAppend(el) {
			$(el).each(function () {
				$(this).before("<button class='menu-toggler'><span class='menu-toggler-icon'></span></button>");
			})
		}

		$('.ekit-menu-init').smartmenus({
            mainMenuSubOffsetX: -1,
            subMenusSubOffsetX: 0,
            subMenusSubOffsetY: 0,
            collapsibleShowFunction: function ($ul, complete) { $ul.slideDown(600, 'easeOutCubic', complete); },
            collapsibleHideFunction: function ($ul, complete) { $ul.slideUp(600, 'easeOutCubic', complete); }
        });

        $('#main-menu').bind({
            'show.smapi': function (e, menu) {
                $(menu).removeClass('hide-animation').addClass('show-animation');
            },
            'hide.smapi': function (e, menu) {
                $(menu).removeClass('show-animation').addClass('hide-animation');
            }
        }).on('animationend webkitAnimationEnd oanimationend MSAnimationEnd', 'ul', function (e) {
            $(this).removeClass('show-animation hide-animation');
            e.stopPropagation();
        });

        /* ----------------------------------------------------------- */
        /*  Mobile Menu
        /* ----------------------------------------------------------- */
        $('.ekit-menu-container').each(function (__, e) {
            $(e).after('<div class="ekit-menu-overlay"></div>');
        });

        togglerAppend($('.ekit-menu-container'))

        function noScroller(el) {
            if ($(el).parents('body').hasClass('no-scroller')) {
                $(el).parents('body').removeClass('no-scroller')
            } else {
                $(el).parents('body').addClass('no-scroller')
            }
        }

        if ($('.ekit-menu-container').length > 0) {
            var parent = $('.ekit-menu-container').parent();
            $(parent).find('.menu-toggler').on('click', function (e) {
                e.preventDefault();
                if (!$(this).parent().find('.ekit-menu-container').hasClass('active')) {
                    $(this).parent().find('.ekit-menu-container').addClass('active')
                }
                if (!$(this).parent().find('.ekit-menu-overlay').hasClass('active')) {
                    $(this).parent().find('.ekit-menu-overlay').addClass('active')
                }
                noScroller($(this))
            })
            $(parent).find('.menu-close').on('click', function (e) {
                e.preventDefault();
                if ($(this).parents().find('.ekit-menu-container').hasClass('active')) {
                    $(this).parents().find('.ekit-menu-container').removeClass('active')
                }
                if ($(this).parents().find('.ekit-menu-overlay').hasClass('active')) {
                    $(this).parents().find('.ekit-menu-overlay').removeClass('active')
                }
                noScroller($(this))
            })
            $(parent).find('.ekit-menu-overlay').on('click', function () {
                if ($(this).parent().find('.ekit-menu-container').hasClass('active')) {
                    $(this).parent().find('.ekit-menu-container').removeClass('active')
                }
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active')
                }
                noScroller($(this))
            })
        }

    });

})(jQuery);