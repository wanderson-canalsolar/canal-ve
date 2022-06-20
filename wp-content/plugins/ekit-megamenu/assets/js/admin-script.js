jQuery(document).ready(function($) {

    $('.ekit-menu-wpcolor-picker').wpColorPicker();
    var IconPicker = $('.ekit-menu-icon-picker').fontIconPicker();

    $('.ekit-menu-settings-save').on( 'click', function(){
        var is_enabled = $('#ekit-menu-metabox-input-is-enabled:checked').length;
        var theme = $('#ekit-menu-metabox-input-theme').val();
        var ekit_current_menu_id = $('#ekit-menu-metabox-input-menu-id').val();
        var spinner = $(this).parent().find('.spinner');

        var data = {
            is_enabled : is_enabled,
            ekit_current_menu_id : ekit_current_menu_id,
            theme : theme
        }

        
        spinner.addClass('loading');

        $.get( wp_rest_api + 'ekit_menu_api/v1/save_settings_menu_location', data )
            .done(function( response ) {
                spinner.removeClass('loading');
                console.log(response);
        });
    });

    $('.ekit-menu-item-save').on( 'click', function(){
        var spinner = $(this).parent().find('.spinner');

        var data = { 
            ekit_menu: {
                menu_id : $('#ekit-menu-modal-menu-id').val(),
                menu_has_child : $('#ekit-menu-modal-menu-has-child').val(),

                menu_enable : $('#ekit-menu-item-enable:checked').val(),
                menu_icon : $('#ekit-menu-icon-field').val(),
                menu_icon_color : $('#ekit-menu-icon-color-field').val(),
                menu_badge_text : $('#ekit-menu-badge-text-field').val(),
                menu_badge_color : $('#ekit-menu-badge-color-field').val(),
                menu_badge_background : $('#ekit-menu-badge-background-field').val(),

            }
        }

        spinner.addClass('loading');

        $.get( wp_rest_api + 'ekit_menu_api/v1/save_menu_item', data )
            .done(function( response ) {
                spinner.removeClass('loading');
                //console.log(response);
                UIkit.modal('#ekit-menu-item-settings-modal').hide();
        });
    });
    

    $('#ekit-menu-builder-trigger').on( 'click', function(){
        var menu_id = $('#ekit-menu-modal-menu-id').val();
        var url = wp_rest_api + 'ekit_menu_api/v1/get_builder_url?menu_id=' + menu_id;
        
        $("#ekit-menu-builder-iframe").attr('src', url);
    });
    
    $("body").on('DOMSubtreeModified', "#menu-to-edit", function() {
        setTimeout(function(){
            $('#menu-to-edit li.menu-item').each(function() {
                var menu_item = $(this);
                if(menu_item.find('.ekit_menu_trigger').length < 1){
                    $('.item-title', menu_item).append("<a href='#ekit-menu-item-settings-modal' uk-toggle class='ekit_menu_trigger'>Mega Menu</a> ");
                    //console.log(menu_item);
                }
            });
        }, 200);
    });
    $( "#menu-to-edit" ).trigger( "DOMSubtreeModified" );


    $('#menu-to-edit').on('click', '.ekit_menu_trigger', function(e){
        e.preventDefault();
        var modal = $('#ekit-menu-item-settings-modal');
        modal.addClass('ekit-menu-modal-loading');

        var menu_item = $(this).parents('li.menu-item');
        var id = parseInt(menu_item.attr('id').match(/[0-9]+/)[0], 10);
        var title = menu_item.find('.menu-item-title').text();
        var depth = menu_item.attr('class').match(/\menu-item-depth-(\d+)\b/)[1];
        
        $('.uk-modal-tab-element li').removeClass('uk-active');

        if($(this).parent().find('.is-submenu').is(':hidden') == true){
            var has_child = 0;
            modal.removeClass('ekit-menu-has-child');
            $('.builder-tab').addClass('uk-active');
        }else{
            var has_child = 1;
            modal.addClass('ekit-menu-has-child');
            $('.icon-tab').addClass('uk-active');
        }

        
        $('#ekit-menu-modal-menu-id').val(id);
        $('#ekit-menu-modal-menu-has-child').val(has_child);

        var data = {
            menu_id : id
        }
        $.get( wp_rest_api + 'ekit_menu_api/v1/get_menu_item', data )
            .done(function( response ) {
                //console.log(response);
                $('#ekit-menu-item-enable').prop('checked', false);
                $('#ekit-menu-icon-color-field').wpColorPicker('color', response.menu_icon_color);
                $('#ekit-menu-icon-field').val(response.menu_icon);
                $('#ekit-menu-badge-text-field').val(response.menu_badge_text);
                $('#ekit-menu-badge-color-field').wpColorPicker('color', response.menu_badge_color);
                $('#ekit-menu-badge-background-field').wpColorPicker('color', response.menu_badge_background);

                if(typeof response.menu_enable !== undefined && response.menu_enable == 1){
                    $('#ekit-menu-item-enable').prop('checked', true);
                }else{
                    $('#ekit-menu-item-enable').prop('checked', false);
                }
                $( "#ekit-menu-item-enable" ).trigger( "change" );

                IconPicker.refreshPicker();
                setTimeout(function(){
                    modal.removeClass('ekit-menu-modal-loading');
                }, 500);
        });

    });

    $('#ekit-menu-item-enable').on('change', function(){
        if($(this).is(':checked')){
            $('#ekit-menu-builder-trigger').prop('disabled', false);
            $('#ekit-menu-builder-warper').addClass('is_enabled');
        }else{
            $('#ekit-menu-item-enable').prop('checked', false);
            $('#ekit-menu-builder-warper').removeClass('is_enabled');
            $('#ekit-menu-builder-trigger').prop('disabled', true);
        }
    });

    $('#ekit-menu-metabox-input-is-enabled').on('change', function(){
        if($(this).is(':checked')){
            $('body').addClass('is_mega_enabled').removeClass('is_mega_disabled');
        }else{
            $('body').removeClass('is_mega_enabled').addClass('is_mega_disabled');
        }
    });
    $( "#ekit-menu-metabox-input-is-enabled" ).trigger( "change" );

    $('.elementskit_page_ekit_menu_settings #admin-page-framework-form').on('submit', function(){
        var action = $('#footer_action__0').val();
        if(action == 'create_new_theme'){
            var url = $(this).attr('action');
                url = url.replace('action=create_new_theme', ' ');
                url = url.replace('current_theme=', 'selected_theme=');
            $(this).attr('action', url);
            $(this).find('input[name="_wp_http_referer"]').val(url);
            //return false;
        }
    });

    function ekit_menu_replace_param(url, paramName, paramValue){
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
    $('#style_style_default_theme_select_edit_container_theme_select_edit__0').on('change', function(){
        var value = $(this).find(":selected").val();
        var url = ekit_menu_replace_param(window.location.href, 'current_theme', value);
        window.location = url;
    });

});