<?php


add_action( 'admin_head', 'ekit_admin_enqueue_js_restapi' ); // Write our JS below here

function ekit_admin_enqueue_js_restapi() { ?>
	<script type="text/javascript" >
	var wp_rest_api = '<?php echo get_rest_url(); ?>';
	</script> <?php
}


add_action( 'admin_enqueue_scripts', 'ekit_admin_enqueue_js' );
function ekit_admin_enqueue_js( $hook_suffix ) {
    $screen = get_current_screen();
    // print_r($screen);
    if($screen->base == 'nav-menus' || $screen->base == 'elementskit_page_ekit_menu_settings'){
        wp_enqueue_script( 'uikit-icons', EKIT_MEGAMENU_ASSETS . '/js/uikit-icons.min.js', array( 'jquery'), false, true );
        wp_enqueue_script( 'uikit', EKIT_MEGAMENU_ASSETS . '/js/uikit.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'fonticonpicker', EKIT_MEGAMENU_ASSETS . '/js/jquery.fonticonpicker.min.js', array( 'jquery'), false, true );

        wp_enqueue_script( 'ekit-menu-admin-script', EKIT_MEGAMENU_ASSETS . '/js/admin-script.js', array( 'jquery', 'wp-color-picker' ), false, true );
    }
}



add_action( 'admin_enqueue_scripts', 'ekit_admin_enqueue_style' );
function ekit_admin_enqueue_style() {
    $screen = get_current_screen();
    if($screen->base == 'nav-menus' || $screen->base == 'elementskit_page_ekit_menu_settings'){
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'uikit', EKIT_MEGAMENU_ASSETS . '/css/uikit.css', false, EKIT_MEGAMENU_VERSION );
        wp_enqueue_style( 'fonticonpicker', EKIT_MEGAMENU_ASSETS . '/css/jquery.fonticonpicker.css', false, EKIT_MEGAMENU_VERSION );
        wp_enqueue_style( 'line-awesome', EKIT_MEGAMENU_ASSETS . '/css/line-awesome.min.css', false, EKIT_MEGAMENU_VERSION );
        wp_enqueue_style( 'ekit-menu-admin-style', EKIT_MEGAMENU_ASSETS . '/css/admin-style.css', false, EKIT_MEGAMENU_VERSION );
    }
}
