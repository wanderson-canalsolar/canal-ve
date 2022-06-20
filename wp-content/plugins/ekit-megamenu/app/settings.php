<?php

class Ekit_Menu_Settings extends AdminPageFramework {

    public $get_menu_theme = [];

    public function setUp() {

        // Create the root menu - specifies to which parent menu to add.
        // the available built-in root menu labels: Dashboard, Posts, Media, Links, Pages, Comments, Appearance, Plugins, Users, Tools, Settings, Network Admin
        $this->setRootMenuPage( 'Mega Menu' );

        // Add the sub menus and the pages
        $this->addSubMenuItems(
            array(
                'title'     => 'Mega Menu',        // the page and menu title
                'page_slug' => 'ekit_menu_settings',         // the page slug
            )
        );
    }

    public function load_menu_theme(){
        $this->get_menu_theme = Ekit_Menu_Helper::get_menu_theme(true);
    }


    public function validation_Ekit_Menu_Settings( $aInputs, $aOldInputs, $oFactory, $aSubmitInfo ) {
        $this->load_menu_theme();

        $new_theme_value = !isset($aInputs['style']) ? [] : $aInputs['style'];
        $theme_slug = !isset($new_theme_value['style_common']['theme_slug'])
                      ? $this->slugify($new_theme_value['style_common']['theme_name'])
                      : $new_theme_value['style_common']['theme_slug'];

        $aInputs['themes'] = $this->get_menu_theme->theme_options;
        $aInputs['themes'][$theme_slug] = $new_theme_value;

        return $aInputs;
    }


    public function current_theme(){
        $this->load_menu_theme();
        $settings = AdminPageFramework::getOption( 'Ekit_Menu_Settings' );
        $current_theme = [
                            'name' => (isset($settings['style']) && isset($settings['style']['theme_name'])) ? $settings['style']['theme_name'] : 'Default',
                            'slug' => (isset($settings['style']) && isset($settings['style']['theme_slug'])) ? $settings['style']['theme_slug'] : 'default',
        ];

        if(!isset($settings['style']) || !isset($settings['themes']) || empty($settings['style']) || empty($settings['themes'])){
            $settings['style'] = Ekit_Menu_Helper::get_default_theme();
            $settings['themes'][$current_theme['slug']] = Ekit_Menu_Helper::get_default_theme();
            $settings['style']['style_common']['theme_name'] = $current_theme['name'];
            $settings['style']['style_common']['theme_slug'] = $current_theme['slug'];
            update_option('Ekit_Menu_Settings', $settings);
        }

        if(isset($_GET['action']) && $_GET['action'] == 'create_new_theme'){
            $current_theme = [
                'name' => 'Custom ' . time(),
                'slug' => 'custom-' . time()
            ];
            $settings['style'] = Ekit_Menu_Helper::get_default_theme();
            $settings['style']['style_common']['theme_name'] = $current_theme['name'];
            $settings['style']['style_common']['theme_slug'] = $current_theme['slug'];
            update_option('Ekit_Menu_Settings', []);
        }
        if(
            isset($_GET['current_theme'])
            && !empty($_GET['current_theme'])
            && isset($this->get_menu_theme->theme_list[$_GET['current_theme']])
            )
        {
            $current_theme = [
                'name' => $this->get_menu_theme->theme_list[$_GET['current_theme']],
                'slug' => $_GET['current_theme']
            ];

            $settings['style'] = $this->get_menu_theme->theme_options[$_GET['theme_options']];
            update_option('Ekit_Menu_Settings', $settings);
        }

        return $current_theme;
    }

    public function menu_page_url($slug, $print = true){
        if(function_exists('menu_page_url')){
            return menu_page_url($slug, $print);
        }
    }


    public function slugify($text){
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function load_ekit_menu_settings( $oAdminPage ) {
        $this->load_menu_theme();
        $current_theme = $this->current_theme();

        $this->addSettingSections(
            array(
                'section_id'        => 'general',
                'title'             => 'General',
                'section_tab_slug'  => 'tabbed_sections_parent',
            ),
            array(
                'section_id'        => 'style',
                'title'             => 'Style manager',
                'section_tab_slug'  => 'tabbed_sections_parent',
                'content'           => array(
                    array(
                        'section_id'        => 'style_default',
                    ),
                    array(
                        'section_id'        => 'style_common',
                        'title'             => 'Common',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_menu_bar',
                        'title'             => 'Menu bar',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_menu_item',
                        'title'             => 'Menu item',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_sub_menu',
                        'title'             => 'Sub menu',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_mega_menu',
                        'title'             => 'Mega menu',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_mobile_menu',
                        'title'             => 'Mobile menu',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                    array(
                        'section_id'        => 'style_custom',
                        'title'             => 'Custom',
                        'section_tab_slug'  => 'tabbed_sections_style',
                    ),
                )
            ),



            array(
                'section_id'        => 'footer',
                'section_tab_slug'  => 'footer',
            )

        );

        require EKIT_MEGAMENU_PATH . '/app/settings/general-default.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-default.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-common.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-menu-bar.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-menu-item.php'; //
        require EKIT_MEGAMENU_PATH . '/app/settings/style-sub-menu.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-mega-menu.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-mobile-menu.php'; // done
        require EKIT_MEGAMENU_PATH . '/app/settings/style-custom.php'; // done


        $this->addSettingFields(
            'footer',
            [ // Submit button
                'field_id'      => 'action',
                'type'          => 'hidden',
                'default'       => (!isset($_GET['action'])) ? '' : $_GET['action']
            ],
            [ // Submit button
                'title' => 'Save changes',
                'field_id'      => 'submit_button',
                'type'          => 'submit',
            ],
            [ // Export button
                'title' => 'Export data',
                'field_id'      => 'export_button',
                'type'          => 'export',
                'description'   => __( 'Download the saved option data.', 'admin-page-framework-loader' )
            ],
            [ // Import button
                'title' => 'Import data',
                'field_id'      => 'import_button',
                'type'          => 'import',
                'description'   => __( 'Import previously exported data.', 'admin-page-framework-loader' )
            ]
        );

    }

    /**
     * One of the pre-defined methods which is triggered when the page contents is going to be rendered.
     * @callback        action      do_{page slug}
     */
    public function do_ekit_menu_settings() {

    }

}

new Ekit_Menu_Settings();