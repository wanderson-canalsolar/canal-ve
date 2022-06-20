<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

include('classes/walker-nav-menu.php');

class Ekit_Widget_Nav_Menu extends Widget_Base {


  public $base;

    public function get_name() {
        return 'ekit-nav-menu';
    }

    public function get_title() {

        return esc_html__( 'Nav menu', 'ekit-headerfooter' );

    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'elementskit' ];
    }

    public function get_menus(){
        $list = [];
        $menus = wp_get_nav_menus();
        foreach($menus as $menu){
            $list[$menu->slug] = $menu->name;
        }

        return $list;
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_tab',
            [
                'label' => esc_html__('Menu settings', 'ekit-headerfooter'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'nav_menu',
            [
                'label'     =>esc_html__( 'Select menu', 'ekit-headerfooter' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $this->get_menus(),
            ]
        );

        $this->add_control(
			'main_menu_position',
			[
				'label' => __( 'Horizontal main menu', 'ekit-headerfooter' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ekit-menu-po-right',
				'options' => [
					'ekit-menu-po-left'  => __( 'Left', 'ekit-headerfooter' ),
					'ekit-menu-po-center' => __( 'Center', 'ekit-headerfooter' ),
                    'ekit-menu-po-right' => __( 'Right', 'ekit-headerfooter' ),
                    'ekit-menu-po-justified'  => __( 'Justified', 'ekit-headerfooter' ),
				],
			]
		);

        $this->add_responsive_control(
			'menubar_height',
			[
				'label' => __( 'Menu height', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => __( '80px', 'ekit-headerfooter' ),
                'tablet_default' => __( '20px', 'ekit-headerfooter' ),
                'selectors' => [
                    '{{WRAPPER}} .ekit-menu' => 'height: {{VALUE}};',
                    '{{WRAPPER}} .ekit-menu-simple >li > a' => 'line-height: {{VALUE}};',
                ]
			]
        );

        $this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border radius', 'ekit-headerfooter' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet' ],
                'size_units' => [ 'px' ],
                'desktop_default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'menubar_background',
				'label' => __( 'Background', 'ekit-headerfooter' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .ekit-menu-container',
			]
        );

        $this->add_responsive_control(
            'mobile_menu_panel_background',
            [
                'label' => __( 'Item text color', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'tablet_default' => __( '#ffffff', 'ekit-headerfooter' ),
                'devices' => ['tablet'],
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-container' => 'background: linear-gradient(180deg, {{VALUE}} 0%, {{VALUE}} 100%);',
				],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_tab_menuitem',
            [
                'label' => esc_html__('Menu item style', 'ekit-headerfooter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'font_size',
			[
				'label' => __( 'Font size', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => __( '15px', 'ekit-headerfooter' ),
                'tablet_default' => __( '13px', 'ekit-headerfooter' ),
                'selectors' => [
                    '{{WRAPPER}} .ekit-menu-simple > li > a' => 'font-size: {{VALUE}};',
                ]
			]
        );

        $this->add_responsive_control(
            'menu_text_color',
            [
                'label' => __( 'Item text color', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'desktop_default' => __( '#ffffff', 'ekit-headerfooter' ),
                'tablet_default' => __( '#000000', 'ekit-headerfooter' ),
                'devices' => [ 'desktop', 'tablet'],
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple > li > a' => 'color: {{VALUE}}',
				],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'ekit-headerfooter' ),
				'selector' => '{{WRAPPER}} .ekit-menu-simple > li > a',
			]
        );

        $this->add_responsive_control(
			'menu_item_spacing',
			[
				'label' => __( 'Spacing', 'ekit-headerfooter' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => [
                    'top' => 15,
                    'right' => 15,
                    'bottom' => 15,
                    'left' => 15,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'top' => 15,
                    'right' => 15,
                    'bottom' => 15,
                    'left' => 15,
                    'unit' => 'px',
                ],
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'title_one',
			[
				'label' => __( 'Hover', 'ekit-headerfooter' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_background_hover',
				'label' => __( 'Item background', 'ekit-headerfooter' ),
				'types' => ['gradient' ],
				'selector' => '{{WRAPPER}} .ekit-menu-simple > li > a:hover',
			]
        );

        $this->add_control(
			'item_color_hover',
			[
				'label' => __( 'Item text color (hover)', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => __( '#707070', 'ekit-headerfooter' ),
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ekit-menu-simple a:focus' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ekit-menu-simple a:active' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ekit-menu-simple li:hover > a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_tab_submenu_item',
            [
                'label' => esc_html__('Submenu item style', 'ekit-headerfooter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'submenu_item_spacing',
			[
				'label' => __( 'Spacing', 'ekit-headerfooter' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => [
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'top' => 15,
                    'right' => 15,
                    'bottom' => 15,
                    'left' => 15,
                    'unit' => 'px',
                ],
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .ekit-has-submenu>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'menu_item_typography',
				'label' => __( 'Typography', 'ekit-headerfooter' ),
				'selector' => '{{WRAPPER}} .ekit-has-submenu>li>a',
			]
        );

        $this->add_control(
			'submenu_item_color',
			[
				'label' => __( 'Item text color', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => __( '#000000', 'ekit-headerfooter' ),
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu > li > a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'title_two',
			[
				'label' => __( 'Hover', 'ekit-headerfooter' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );

        $this->add_control(
			'item_text_color_hover',
			[
				'label' => __( 'Item text color (hover)', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => __( '#707070', 'ekit-headerfooter' ),
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu > li > a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'menu_item_background_hover',
                'label' => __( 'Item background (hover)', 'ekit-headerfooter' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu > li > a:hover',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_tab_submenu_panel',
            [
                'label' => esc_html__('Submenu panel style', 'ekit-headerfooter'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'panel_submenu_border',
				'label' => __( 'Panel Menu Border', 'ekit-headerfooter' ),
				'selector' => '{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu',
			]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'submenu_container_background',
                'label' => __( 'Container background', 'ekit-headerfooter' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu',
            ]
        );

        $this->add_responsive_control(
			'submenu_panel_border_radius',
			[
				'label' => __( 'Border Radius', 'ekit-headerfooter' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => 'px',
                ],
                'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .ekit-menu-simple .ekit-has-submenu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->add_responsive_control(
			'submenu_container_width',
			[
				'label' => __( 'Conatiner width', 'ekit-headerfooter' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'devices' => [ 'desktop', 'tablet' ],
                'desktop_default' => __( '220px', 'ekit-headerfooter' ),
                'tablet_default' => __( '200px', 'ekit-headerfooter' ),
                'selectors' => [
                    '{{WRAPPER}} .ekit-has-submenu' => 'min-width: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
            'panel_box_shadow_dimensions',
            [
                'label' => esc_html_x( 'Dimensions', 'Border Control', 'agmycoo' ),
                'type' => Controls_Manager::DIMENSIONS,
                'devices' => [ 'desktop', 'tablet' ],
                'selectors' => [
                    '{{WRAPPER}} .ekit-has-submenu' => 'box-shadow: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} var(--box-shadow-color);',
                ],
            ]
        );
        $this->add_control(
            'panel_box_shadow_color',
            [
                'label' =>esc_html__( 'Box Shadow Color', 'agmycoo' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ekit-has-submenu' => '--box-shadow-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $markup = '
        <div class="nav-identity-panel">
            <button class="menu-close" type="button">X</button>
        </div>
        ';
        $args = [
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' . $markup,
            'container'       => 'div',
            'container_id'    => 'ekit-megamenu-' . $settings['nav_menu'],
            'container_class' => 'ekit-menu-container ' . $settings['main_menu_position'],
            'menu_id'         => 'main-menu',
            'menu'         	  => $settings['nav_menu'],
            'menu_class'      => 'ekit-menu ekit-menu-simple ekit-menu-init',
            'depth'           => 4,
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'walker'          => new \Ekit_Simple_Menu_Walker()
        ];

        wp_nav_menu($args);
    }
    protected function content_template() { }
}