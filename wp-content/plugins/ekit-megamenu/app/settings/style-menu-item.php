<?php

$this->addSettingFields(
    ['style', 'style_menu_item'],
    [
        'field_id'      => 'menu_item_font_size',
        'type'          => 'inline_mixed',
        'title'         => __( 'Item font size', 'admin-page-framework-loader' ),
        'content'       => [
            array(
                'field_id'      => 'font_size',
                'title'         => __( 'Font size', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '14px',
            )
        ]
    ],
    [
            'field_id'        => 'menu_item_text_color',
            'title' => __('Item text color', 'ekit-megamenu'),
            'type'            => 'color',
            'default'         => '#777',
    ],
    [
        'field_id'        => 'menu_item_text_color_hover',
        'title' => __('Item text color (hover)', 'ekit-megamenu'),
        'type'            => 'color',
        'default'         => '#000',
    ],
    [
        'field_id'      => 'menu_item_bg_hover',
        'type'          => 'inline_mixed',
        'title'         => __( 'Item background (hover)', 'admin-page-framework-loader' ),
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
        'field_id'        => 'menu_item_tranform',
        'type'            => 'select',
        'title'           => 'Text transform',
        'label'           => array(
            'none'     => __( 'None', 'admin-page-framework-loader' ),
            'uppercase'     => __( 'Uppercase', 'admin-page-framework-loader' ),
            'lowercase'     => __( 'Lowercase', 'admin-page-framework-loader' ),
            'capitalize'     => __( 'Capitalize', 'admin-page-framework-loader' ),
            'unset'     => __( 'Unset', 'admin-page-framework-loader' ),
            'inherit'     => __( 'Inherit', 'admin-page-framework-loader' ),
            'initial'     => __( 'Initial', 'admin-page-framework-loader' ),
        ),
        'default'         => 'normal',
    ],
    [
        'field_id'      => 'menu_item_spacing',
        'title'         => __( 'Spacing', 'admin-page-framework-loader' ),
        'type'          => 'text',
        'default'   => '10px',
    ]
);