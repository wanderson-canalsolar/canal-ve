<?php

add_action( 'wp_enqueue_scripts', 'ekit_frontend_enqueue_js' );
function ekit_frontend_enqueue_js() {
    if(!is_admin()){
        wp_enqueue_script( 'smartmenus', EKIT_MEGAMENU_ASSETS . '/js/jquery.smartmenus.min.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'ekit-menu-script', EKIT_MEGAMENU_ASSETS . '/js/frontend-script.js', array( 'jquery' ), false, true );
        wp_enqueue_script( 'easing', EKIT_MEGAMENU_ASSETS . '/js/jquery.easing.js', array( 'jquery' ), false, true );
    }
}



add_action( 'wp_enqueue_scripts', 'ekit_frontend_enqueue_style', 99 );
function ekit_frontend_enqueue_style() {
    if(!is_admin()){
        wp_enqueue_style( 'line-awesome', EKIT_MEGAMENU_ASSETS . '/css/line-awesome.min.css', false, EKIT_MEGAMENU_VERSION );
        wp_enqueue_style( 'smartmenus', EKIT_MEGAMENU_ASSETS . '/css/smartmenus.css', false, EKIT_MEGAMENU_VERSION );
        wp_enqueue_style( 'ekit-menu-style', EKIT_MEGAMENU_ASSETS . '/css/frontend-style.css', false, EKIT_MEGAMENU_VERSION );
        
        wp_add_inline_style( 'smartmenus', Ekit_Menu_Helper::compile());        
    }
}
