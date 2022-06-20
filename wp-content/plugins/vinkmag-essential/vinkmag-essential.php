<?php
/*
* Plugin Name: Vinkmag Essentials
* License - GNU/GPL V2 or Later
* Description: This is a required plugin for Vinkmag theme.
* Version: 1.4
* text domain: vinkmag-essntial
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add language
add_action( 'init', 'vinkmag_language_load' );
function vinkmag_language_load(){
    $plugin_dir = basename(dirname(__FILE__))."/languages/";
    load_plugin_textdomain( 'vinkmag-essntial', false, $plugin_dir );
}

// main class
class Vinkmag_Essentials_Includes {

    // auto load
    // ----------------------------------------------------------------------------------------
	public static function init() {
        add_action( 'widgets_init', array( __CLASS__, '_action_widgets_init' ) );
	}


    // directory name to class name, transform dynamically
    // ----------------------------------------------------------------------------------------
	private static function dirname_to_classname( $dirname ) {
		$class_name	 = explode( '-', $dirname );
		$class_name	 = array_map( 'ucfirst', $class_name );
		$class_name	 = implode( '_', $class_name );

		return $class_name;
    }

    // include and register widgets
    // ----------------------------------------------------------------------------------------
	public static function include_widget( $widget_dir ) {
        $rel_path = '/widgets';
        $path = self::get_path( $rel_path ) . '/' . $widget_dir;
        if ( file_exists( $path ) ) {
            self::include_isolated( $path . '/widget-class.php' );
        }

		register_widget( 'Vinkmag_' . self::dirname_to_classname( $widget_dir ) );
	}

    // include method
    // ----------------------------------------------------------------------------------------
	public static function include_isolated( $path ) {
        include $path;
	}

    // directory path for theme core
    // ----------------------------------------------------------------------------------------
	private static function get_path( $append = '' ) {
		$path = plugin_dir_path( __FILE__ ) . 'includes';
		return $path . $append;
    }
    
    // include widgets
    // ----------------------------------------------------------------------------------------
	public static function _action_widgets_init() {
        self::include_widget('recent-post');
        self::include_widget('author');
        self::include_widget('category-list');
        self::include_widget('recent-post-tab');
    }
}

Vinkmag_Essentials_Includes::init();