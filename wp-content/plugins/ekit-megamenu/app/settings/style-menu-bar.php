<?php

$this->addSettingFields(
    ['style', 'style_menu_bar'],
    [
        'field_id'      => 'menu_bar_height',
        'title'         => __( 'Menubar height', 'admin-page-framework-loader' ),
        'type'          => 'text',
        'default'          => '40px',
    ],
    [
        'field_id'        => 'menu_item_alignment',
        'type'            => 'select',
        'title'           => 'Main menu alignment',
        'label'           => array(
            'left'     => __( 'Left', 'admin-page-framework-loader' ),
            'Right'     => __( 'Right', 'admin-page-framework-loader' ),
            'Center'     => __( 'Center', 'admin-page-framework-loader' ),
            'Justified'     => __( 'Justified', 'admin-page-framework-loader' ),
        )
    ],
    [
        'field_id'      => 'menu_bar_bg',
        'type'          => 'inline_mixed',
        'title'         => __( 'Menubar background', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'title' => __('From', 'ekit-megamenu'),
                'field_id'        => 'from',
                'type'            => 'color',
                'default'         => '#fff',
            ),
            array(
                'field_id'        => '_text',
                'content'         => wp_kses_post('<span class="dashicons dashicons-arrow-right-alt"></span>', 'ekit-megamenu')
            ),
            array(
                'title' => __('To', 'ekit-megamenu'),
                'field_id'        => 'to',
                'type'            => 'color',
                'default'         => '#fff',
            ),
            array(
                'field_id'      => 'angle',
                'title'         => __( 'Angle (0 - 360deg)', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0deg',
            ),
            array(
                'field_id'      => 'opacity',
                'title'         => __( 'Opacity (0.1 - 1)', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '1',
            )
        ]
    ],
    [
        'field_id'      => 'menu_bar_radius',
        'type'          => 'inline_mixed',
        'title'         => __( 'Menubar border radius', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'field_id'      => 'top_left',
                'title'         => __( 'Top left', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'top_right',
                'title'         => __( 'Top right', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'bottom_left',
                'title'         => __( 'Bottom left', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'bottom_right',
                'title'         => __( 'Bottom right', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
        ]
    ]
);