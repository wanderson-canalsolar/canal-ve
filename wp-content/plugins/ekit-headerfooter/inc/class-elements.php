<?php 


class Ekit_Register_Elements{

    public static $el_dir = EKIT_ELEMENTS_DIR;
    public static $el_url = EKIT_ELEMENTS_URL;
	
	function __construct() {
        include_once self::$el_dir . 'managers/control-manager.php';


		add_action('elementor/init', array($this, 'elementor_init'));
		add_action('elementor/controls/controls_registered', array( $this, 'icon_pack' ), 11 );
		add_action('elementor/controls/controls_registered', array( $this, 'image_choose' ), 11 );
		add_action('elementor/controls/controls_registered', array( $this, 'ajax_select2' ), 11 );
		
		
		add_action('elementor/widgets/widgets_registered', array($this, 'register_elements'));
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
	}

    public function elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'elementskit',
            [
                'title' =>esc_html__( 'Elementskit', 'ekit-headerfooter' ),
                'icon' => 'xsicon xsicon-plug',
            ],
            1
        );
    }
	
	
    public function icon_pack( $controls_manager ) {

        if(!class_exists('Ekit_Icon_Controler')){
            require_once self::$el_dir . 'controls/icon/control.php';

            $controls = array(
                $controls_manager::ICON => 'Ekit_Icon_Controler',
            );

            foreach ( $controls as $control_id => $class_name ) {
                $controls_manager->unregister_control( $control_id );
                $controls_manager->register_control( $control_id, new $class_name() );
            }
        }

    }

    public function image_choose( $controls_manager ) {
        if(!class_exists('Ekit_Image_Choose_Controler')){
            require_once self::$el_dir . 'controls/image-choose/control.php';

            $controls_manager->register_control( 'imagechoose', new \Ekit_Image_Choose_Controler() );
        }
    }

    public function ajax_select2( $controls_manager ) {
        if(!class_exists('Ekit_Ajax_Select2_Controler')){
            require_once self::$el_dir . 'controls/ajax-select2/control.php';

            $controls_manager->register_control( 'ajaxselect2', new \Ekit_Ajax_Select2_Controler() );
        }
    }

    public function enqueue_scripts() {
        //wp_enqueue_script( 'ekit-elementor-frontend', VINKMAG_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), VINKMAG_VERSION, true );
    }

    public function editor_enqueue_styles() {
        //wp_enqueue_style( 'ekit-elementor-panel', self::$el_url.'/panel.css',null, '1.1' );
    }

    public function preview_enqueue_scripts() {

    }

	private static function dirname_to_classname( $dirname ) {
		$class_name	 = explode( '-', $dirname );
		$class_name	 = array_map( 'ucfirst', $class_name );
		$class_name	 = implode( '_', $class_name );

		return $class_name;
    }
	public function register_elements($widgets_manager){
		$el = $this->load_elements();
		foreach($el as $e){
			include self::$el_dir . "widgets/$e/$e.php";

			$class_name = 'Elementor\Ekit_Widget_' . self::dirname_to_classname( $e );
			$widgets_manager->register_widget_type(new $class_name());
		}
	}

	public function load_elements(){
		return [
			'nav-menu',
		];
	}
}