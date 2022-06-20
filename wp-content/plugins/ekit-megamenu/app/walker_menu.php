<?php
/**
 * Class Name: bs4Navwalker
 * GitHub URI: https://github.com/dupkey/bs4navwalker
 * Description: A custom WordPress nav walker class for Bootstrap 4 nav menus in a custom theme using the WordPress built in menu manager.
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class Ekit_Menu_Walker extends Walker_Nav_Menu
{
    // custom methods
    public function get_item_meta($menu_item_id){
        $meta_key = 'ekit_menu_item_settings';
        $data = get_post_meta($menu_item_id, $meta_key, true);
        $data = (array) json_decode($data);

        $format = [
            "menu_id" => null,
            "menu_has_child" => '',
            "menu_enable" => 0,
            "menu_icon" => '',
            "menu_icon_color" => '',
            "menu_badge_text" => '',
            "menu_badge_color" => '',
            "menu_badge_background" => ''
        ];
        return array_merge($format, $data);
    }




    // ends



    /**
     * Starts the list before the elements are added.
     *
     * @see Walker::start_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"ekit-has-submenu\">\n";
    }
    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $item_meta = $this->get_item_meta($item->ID);

        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        // New
        $class_names .= ' nav-item';

        if (in_array('menu-item-has-children', $classes)) {
            $class_names .= ' ekit-menu-dropdown';
        }
        if (in_array('current-menu-item', $classes)) {
            $class_names .= ' active';
        }
        if ($item_meta['menu_enable'] == 1) {
            $class_names .= ' ekit-menu-has-megamenu';
        }
        //
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        // print_r($class_names);
        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item    The current menu item.
         * @param array  $args    An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth   Depth of menu item. Used for padding.
         */
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
        // New

        //
        $output .= $indent . '<li' . $id . $class_names .'>';
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';



        // New
        if ($depth === 0) {
            $atts['class'] = 'ekit-menu-nav-link';
        }
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $atts['class']       .= ' ekit-menu-dropdown-toggle';
        }
        if ($depth > 0) {
            $manual_class = array_values($classes)[0] .' '. 'dropdown-item';
            $atts ['class']= $manual_class;
        }
        if (in_array('current-menu-item', $item->classes)) {
            $atts['class'] .= ' active';
        }
        // print_r($item);
        //
        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         *     @type string $title  Title attribute.
         *     @type string $target Target attribute.
         *     @type string $rel    The rel attribute.
         *     @type string $href   The href attribute.
         * }
         * @param object $item  The current menu item.
         * @param array  $args  An array of {@see wp_nav_menu()} arguments.
         * @param int    $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        // New
        /*
        if ($depth === 0 && in_array('menu-item-has-children', $classes)) {
            $item_output .= '<a class="nav-link dropdown-toggle"' . $attributes .'data-toggle="dropdown">';
        } elseif ($depth === 0) {
            $item_output .= '<a class="nav-link"' . $attributes .'>';
        } else {
            $item_output .= '<a class="dropdown-item"' . $attributes .'>';
        }
        */
        //
        $item_output .= '<a'. $attributes .'>';
       // add badge text
        //print_r($item_meta);
        if($item_meta['menu_badge_text'] != ''){
            $badge_style = 'background:' . $item_meta['menu_badge_background'] . '; color:' . $item_meta['menu_badge_color'];
            $item_output .= '<span style="'.$badge_style.'" class="ekit-menu-badge">'.$item_meta['menu_badge_text'].'<i class="ekit-menu-badge-arrow"></i></span>';
        }

        // add menu icon & style
        if($item_meta['menu_icon'] != ''){
            $icon_style = 'color:'.$item_meta['menu_icon_color'];
            $item_output .= '<i class="ekit-menu-icon '.$item_meta['menu_icon'].'" style="'.$icon_style.'" ></i>';
        }


        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item        Menu item data object.
         * @param int    $depth       Depth of menu item. Used for padding.
         * @param array  $args        An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Page data object. Not used.
     * @param int    $depth  Depth of page. Not Used.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $item_meta = $this->get_item_meta($item->ID);

        $builder_post_title = 'ekit-menu-item-' . $item->ID;
        $builder_post = get_page_by_title($builder_post_title, OBJECT, 'ekit_menu_item');
        //print_r($builder_post);

        if ($depth === 0) {
            if($item_meta['menu_enable'] == 1 && class_exists( 'Elementor\Plugin' ) ){
                $output .= '<ul class="ekit-menu-megamenu-container mega-menu">';

                if($builder_post != null){
                    $elementor = Elementor\Plugin::instance();
                    $output .= $elementor->frontend->get_builder_content_for_display( $builder_post->ID );
                }else{
                    $output .= esc_html__('No content found', 'ekit-megamenu');
                }

                $output .= '</ul>';
            }
            $output .= "</li>\n";
        }
    }
}


add_filter('wp_nav_menu_args', '_filter_ekit_menu_walker', 9999);

function _filter_ekit_menu_walker($args){
    $theme_locations = get_nav_menu_locations();

    if (empty($args['theme_location']) || !isset($theme_locations[$args['theme_location']])) {
		return $args;
    }
    $menu_id = $theme_locations[$args['theme_location']];

    $meta_key = 'ekit_menu_location_settings';
    $menu_settings = (array)json_decode(get_option($meta_key));

    if(!isset($menu_settings['menu_location_' . $menu_id])){
        return $args;
    }

    $menu_settings = $menu_settings['menu_location_' . $menu_id];
    if($menu_settings->is_enabled != '1'){
        return $args;
    }


    $theme_options = Ekit_Menu_Helper::get_menu_theme();
    $theme_options = $theme_options->theme_options['default'];
    $logo = '';
    if(isset($theme_options['style_common']['logo']) && $theme_options['style_common']['logo'] != ''){
        $logo = '
        <div class="header-brand">
            <h1 class="site-title navbar-brand">
                <a href="'.get_site_url().'" class="nav-logo">
                    <img src="'.esc_url($theme_options['style_common']['logo']).'" class="megamenu-logo" alt="'.get_bloginfo('name').'" />
                </a>
            </h1>
        </div>';
    }

    $markup = $logo.'
    <div class="nav-identity-panel">
        '.$logo.'
        <button class="menu-close" type="button">X</button>
    </div>
    ';
    $menu_arg = [
        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' . $markup,
        'container'       => 'div',
        'container_id'    => 'ekit-megamenu-' . $args['theme_location'],
        'container_class' => 'ekit-megamenu-holder',
        'menu_id'         => 'main-menu',
        'menu_class'      => 'ekit-menu ekit-menu-simple ekit-menu-init',
        'depth'           => 4,
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'walker'          => new Ekit_Menu_Walker()
    ];

    return array_merge($args, $menu_arg);
}

function add_ekit_megamenu($menu_id){
    wp_nav_menu([
        'menu'            => 'primary',
        'theme_location'  => 'primary',
        'menu_id'         => 'main-menu',
        'manual'          => true

      ]);
}