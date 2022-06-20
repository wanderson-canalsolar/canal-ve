<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Ekit_Menu_Ajax_Api{

    protected $request = [];

    //calling the method dynamically
	public function call_method($request){
        if(isset($request['method']) && method_exists($this, $request['method'])){
            $this->request = $request;
            return $this->{$request['method']}();
        }
    }

    public function save_settings_menu_location(){
        $meta_key = 'ekit_menu_location_settings';
        $menu_id = $this->request['ekit_current_menu_id'];

        $data = (array)json_decode(get_option($meta_key));
        $data['menu_location_' . $menu_id] = [
            'is_enabled' => $this->request['is_enabled'],
            'theme' => $this->request['theme'],
        ];

        update_option($meta_key, json_encode($data), '');
        //$dataX = (array)json_decode(get_option($meta_key));
        return [
            'saved' => 1,
            'message' => esc_html__('Saved', 'ekit-megamenu'),
            //'data' => $dataX
        ];
    }

    public function save_menu_item(){
/*
            menu_id : $('#ekit-menu-modal-menu-id').val(),
            menu_has_child : $('#ekit-menu-modal-menu-has-child').val(),

            menu_enable : $('#ekit-menu-item-enable:checked').val(),
            menu_icon : $('#ekit-menu-icon-field').val(),
            menu_icon_color : $('#ekit-menu-icon-color-field').val(),
            menu_badge_text : $('#ekit-menu-badge-text-field').val(),
            menu_badge_color : $('#ekit-menu-badge-color-field').val(),
            menu_badge_background : $('#ekit-menu-badge-background-field').val(),
*/
        $meta_key = 'ekit_menu_item_settings';
        $menu_item_id = $this->request['ekit_menu']['menu_id'];
        $menu_item_settings = json_encode($this->request['ekit_menu']);
        update_post_meta( $menu_item_id, $meta_key, $menu_item_settings );

        //$dataX = get_post_meta($menu_item_id, $meta_key, true);
        return [
            'saved' => 1,
            'message' => esc_html__('Saved', 'ekit-megamenu'),
            //'data' => $dataX
        ];
    }

    public function get_menu_item(){

        $meta_key = 'ekit_menu_item_settings';
        $menu_item_id = $this->request['menu_id'];

        $data = get_post_meta($menu_item_id, $meta_key, true);
        return (array) json_decode($data);
    }

    public function get_builder_url(){
        $menu_item_id = $this->request['menu_id'];
        $builder_post_title = 'ekit-menu-item-' . $menu_item_id;
        $builder_post_id = get_page_by_title($builder_post_title, OBJECT, 'ekit_menu_item');

        if(is_null($builder_post_id)){
            $defaults = array(
                'post_content' => '',
                'post_title' => $builder_post_title,
                'post_status' => 'publish',
                'post_type' => 'ekit_menu_item',
            );
            $builder_post_id = wp_insert_post($defaults);

            update_post_meta( $builder_post_id, '_wp_page_template', 'elementor_canvas' );
        }else{
            $builder_post_id = $builder_post_id->ID;
        }


        $url = get_admin_url() . '/post.php?post='.$builder_post_id.'&action=elementor';
        wp_redirect( $url );
        exit;
    }

}

function ekit_menu_rest_api( WP_REST_Request $request ) {
    $class = new Ekit_Menu_Ajax_Api();
    return $class->call_method($request);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'ekit_menu_api/v1', '/(?P<method>\w+)/', array(
        'methods' => 'GET',
        'callback' => 'ekit_menu_rest_api',
        'permission_callback' => '__return_true',
    ));
});