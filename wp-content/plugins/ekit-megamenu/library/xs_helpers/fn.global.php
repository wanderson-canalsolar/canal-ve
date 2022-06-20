<?php




class Ekit_Menu_Helper{
    public static function get_menu_theme(){
        $theme_options = get_option('Ekit_Menu_Settings', []);
        $theme_options = !isset($theme_options['themes']) ? [] : $theme_options['themes'];
        $current_theme = !isset($theme_options['style']) ? [] : $theme_options['style'];

        $theme_list = [];
        foreach($theme_options as $theme){
            $theme_list[$theme['style_common']['theme_slug']] = $theme['style_common']['theme_name'];
        }

        $output = compact( 'theme_options', 'theme_list', 'current_theme');
        return (object)$output;
    }

    public static function array_flatten($array) {
        if (!is_array($array)) {
          return FALSE;
        }
        $result = array();
        foreach ($array as $key => $value) {
          if (is_array($value)) {
            $arrayList = Ekit_Menu_Helper::array_flatten($value);
            foreach ($arrayList as $listKey => $listItem) {
              $result[$key . '_' . $listKey] = $listItem;
            }
          }
         else {
          $result[$key] = empty($value) ? '-' : $value;
         }
        }
        return $result;
      }

    public static function compile() {
        $theme_options = Ekit_Menu_Helper::get_menu_theme();
        if(isset($theme_options->theme_options['default'])){
            $theme_options = $theme_options->theme_options['default'];


            try {
                $scss = new Ekit_Scssc();
                $scss->setImportPaths(EKIT_MEGAMENU_PATH . 'assets/scss/');
                $scss->setVariables(  Ekit_Menu_Helper::array_flatten($theme_options) );
                $scss->setFormatter('scss_formatter_compressed');

                return $scss->compile('

                    @import "components/_ekit-menu-sub-items-indentation.scss";
                    @import "components/_ekit-menu-simple-theme.scss";

                @import "tab-style.scss";
                ');

            }catch (\Exception $e) {
                return $e;
            }
        }
    }

    public static function get_default_theme(){
        $file = EKIT_MEGAMENU_PATH . 'app/default_settings.json';
        $data = json_decode( file_get_contents($file), true );
        $data = $data['style'];
        unset($data['style_default']);

        return $data;
    }

}