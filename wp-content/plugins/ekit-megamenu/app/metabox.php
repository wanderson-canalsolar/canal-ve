<?php 

class Ekit_menu_metabox{

    protected $current_menu_id = null;

    public function init(){
         add_action( 'admin_init', [ $this, 'add_metabox'] );
    }


    public function add_metabox() {
        add_meta_box( 'ekit-menu-metabox', __('Elementskit Megamenu'), [ $this, 'render_metabox'], 'nav-menus', 'side', 'high' );
    }

    public function render_metabox() {
        $menu_id = $this->current_menu_id();
        $data = (array)json_decode(get_option('ekit_menu_location_settings'));
        $data = (isset($data['menu_location_' . $menu_id])) ? $data['menu_location_' . $menu_id] : [];
        
        // $testdata = get_option('Ekit_Menu_Settings');

        //print_r($testdata);
        ?>
        <div id="ekit-menu-metabox">
        <?php wp_nonce_field( basename( __FILE__ ), 'ekit_menu_metabox_noce' ); ?>
        <input type="hidden" value="<?php echo $menu_id; ?>" id="ekit-menu-metabox-input-menu-id" />
        <p>
            <label><strong><?php _e( "Enable megamenu?", 'ekit-megamenu' ); ?></strong></label>
            <input type="checkbox" <?php 
                echo (isset($data->is_enabled) && $data->is_enabled == 1) ? 'checked' : '';
            ?> id="ekit-menu-metabox-input-is-enabled" class="ekit-menu-is-enabled pull-right-input" value="1">
        </p>
        <p>
        <label><?php _e( "Theme", 'ekit-megamenu' ); ?></label>

        <select class="pull-right-input" id="ekit-menu-metabox-input-theme">
        <?php 
            $options = Ekit_Menu_Helper::get_menu_theme();
            $selected_value = (isset($data->theme)) ? $data->theme : '';

            foreach($options->theme_list as $value => $text):
        ?>
            <option value="<?php echo $value; ?>" <?php selected( $value, $selected_value ); ?>><?php echo $text; ?></option>
        <?php endforeach; ?>
        </select>
        </p>
        <p>
            <?php echo get_submit_button(esc_html__('Save', 'ekit-megamenu'), 'ekit-menu-settings-save button-primary alignright','', false); ?>
            <span class='spinner'></span>
        </p>
        
        <div class="clearfix"></div>
        </div>

        <?php
    }


    public function current_menu_id() {

        if ( null !== $this->current_menu_id ) {
            return $this->current_menu_id;
        }

        $nav_menus            = wp_get_nav_menus( array('orderby' => 'name') );
        $menu_count           = count( $nav_menus );
        $nav_menu_selected_id = isset( $_REQUEST['menu'] ) ? (int) $_REQUEST['menu'] : 0;
        $add_new_screen       = ( isset( $_GET['menu'] ) && 0 == $_GET['menu'] ) ? true : false;

        $this->current_menu_id = $nav_menu_selected_id;

        // If we have one theme location, and zero menus, we take them right into editing their first menu
        $page_count = wp_count_posts( 'page' );
        $one_theme_location_no_menus = ( 1 == count( get_registered_nav_menus() ) && ! $add_new_screen && empty( $nav_menus ) && ! empty( $page_count->publish ) ) ? true : false;

        // Get recently edited nav menu
        $recently_edited = absint( get_user_option( 'nav_menu_recently_edited' ) );
        if ( empty( $recently_edited ) && is_nav_menu( $this->current_menu_id ) ) {
            $recently_edited = $this->current_menu_id;
        }

        // Use $recently_edited if none are selected
        if ( empty( $this->current_menu_id ) && ! isset( $_GET['menu'] ) && is_nav_menu( $recently_edited ) ) {
            $this->current_menu_id = $recently_edited;
        }

        // On deletion of menu, if another menu exists, show it
        if ( ! $add_new_screen && 0 < $menu_count && isset( $_GET['action'] ) && 'delete' == $_GET['action'] ) {
            $this->current_menu_id = $nav_menus[0]->term_id;
        }

        // Set $this->current_menu_id to 0 if no menus
        if ( $one_theme_location_no_menus ) {
            $this->current_menu_id = 0;
        } elseif ( empty( $this->current_menu_id ) && ! empty( $nav_menus ) && ! $add_new_screen ) {
            // if we have no selection yet, and we have menus, set to the first one in the list
            $this->current_menu_id = $nav_menus[0]->term_id;
        }

        return $this->current_menu_id;

    }

}

$meta = new Ekit_menu_metabox();
$meta->init();