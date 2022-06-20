<?php 
if ( ! function_exists('ekit_menu_item') ) {

    // Register Custom Post Type
    function ekit_menu_item() {
    
        $labels = array(
            'name'                  => _x( 'Megamenu items', 'Post Type General Name', 'ekit-megamenu' ),
            'singular_name'         => _x( 'Megamenu item', 'Post Type Singular Name', 'ekit-megamenu' ),
            'menu_name'             => __( 'Megamenu item', 'ekit-megamenu' ),
            'name_admin_bar'        => __( 'Megamenu item', 'ekit-megamenu' ),
            'archives'              => __( 'Item Archives', 'ekit-megamenu' ),
            'attributes'            => __( 'Item Attributes', 'ekit-megamenu' ),
            'parent_item_colon'     => __( 'Parent Item:', 'ekit-megamenu' ),
            'all_items'             => __( 'All Items', 'ekit-megamenu' ),
            'add_new_item'          => __( 'Add New Item', 'ekit-megamenu' ),
            'add_new'               => __( 'Add New', 'ekit-megamenu' ),
            'new_item'              => __( 'New Item', 'ekit-megamenu' ),
            'edit_item'             => __( 'Edit Item', 'ekit-megamenu' ),
            'update_item'           => __( 'Update Item', 'ekit-megamenu' ),
            'view_item'             => __( 'View Item', 'ekit-megamenu' ),
            'view_items'            => __( 'View Items', 'ekit-megamenu' ),
            'search_items'          => __( 'Search Item', 'ekit-megamenu' ),
            'not_found'             => __( 'Not found', 'ekit-megamenu' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'ekit-megamenu' ),
            'featured_image'        => __( 'Featured Image', 'ekit-megamenu' ),
            'set_featured_image'    => __( 'Set featured image', 'ekit-megamenu' ),
            'remove_featured_image' => __( 'Remove featured image', 'ekit-megamenu' ),
            'use_featured_image'    => __( 'Use as featured image', 'ekit-megamenu' ),
            'insert_into_item'      => __( 'Insert into item', 'ekit-megamenu' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'ekit-megamenu' ),
            'items_list'            => __( 'Items list', 'ekit-megamenu' ),
            'items_list_navigation' => __( 'Items list navigation', 'ekit-megamenu' ),
            'filter_items_list'     => __( 'Filter items list', 'ekit-megamenu' ),
        );
        $rewrite = array(
            'slug'                  => 'ekit-megamenu',
            'with_front'            => true,
            'pages'                 => false,
            'feeds'                 => false,
        );
        $args = array(
            'label'                 => __( 'Megamenu item', 'ekit-megamenu' ),
            'description'           => __( 'ekit_menu_item', 'ekit-megamenu' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'elementor', 'permalink' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => false,
            'menu_position'         => 5,
            'show_in_admin_bar'     => false,
            'show_in_nav_menus'     => false,
            'can_export'            => true,
            'has_archive'           => false,
            'publicly_queryable' => true,
            'rewrite'               => $rewrite,
            'query_var' => true,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
            'rest_base'             => 'ekit-menu-item',
        );
        register_post_type( 'ekit_menu_item', $args );
    
    }
    add_action( 'init', 'ekit_menu_item', 0 );
    
    }
// need to check for flush rewrite
// https://wordpress.stackexchange.com/questions/156978/custom-post-type-single-page-returns-404-error