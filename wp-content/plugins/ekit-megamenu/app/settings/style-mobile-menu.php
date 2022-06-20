<?php
$this->addSettingFields(
    ['style', 'style_mobile_menu'],
    [
        'field_id'          => 'responsive_breakpoint',
        'title'             => esc_html__( 'Responsive breakpoint', 'ekit-megamenu' ),
        'type'              => 'text',
        'default'           => '767px',
    ],
    [
        'field_id'      => 'moblie_menu_item_spacing',
        'title'         => __( 'Spacing', 'admin-page-framework-loader' ),
        'type'          => 'text',
        'default'   => '10px',
    ],
    [
        'field_id'      => 'mobile_menu_bg',
        'type'          => 'inline_mixed',
        'title'         => __( 'Container background', 'admin-page-framework-loader' ),
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
        'field_id'        => 'mobile_menu_item_text_color',
        'title' => __('Item text color', 'ekit-megamenu'),
        'type'            => 'color',
        'default'         => '#777',
    ],
    [
        'field_id'      => 'mobile_menu_item_bg',
        'type'          => 'inline_mixed',
        'title'         => __( 'Item background', 'admin-page-framework-loader' ),
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
        'field_id'        => 'mobile_menu_item_text_color_active',
        'title' => __('Item text color (active)', 'ekit-megamenu'),
        'type'            => 'color',
        'default'         => '#000',
    ],
    [
        'field_id'      => 'mobile_menu_item_bg_active',
        'type'          => 'inline_mixed',
        'title'         => __( 'Item background (active)', 'admin-page-framework-loader' ),
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
        'field_id'      => 'mega_menu_border',
        'type'          => 'inline_mixed',
        'title'         => __( 'Mega Menu Border', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'field_id'      => 'border_top',
                'title'         => __( 'Border Top', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_left',
                'title'         => __( 'Border Left', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_bottom',
                'title'         => __( 'Border Bottom', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_right',
                'title'         => __( 'Border Right', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'title' => __('Color', 'ekit-megamenu'),
                'field_id'        => 'border_color',
                'type'            => 'color',
                'default'         => '#fff',
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
        'field_id'      => 'sub_menu_border',
        'type'          => 'inline_mixed',
        'title'         => __( 'Sub Menu Border', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'field_id'      => 'border_top',
                'title'         => __( 'Border Top', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_left',
                'title'         => __( 'Border Left', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_bottom',
                'title'         => __( 'Border Bottom', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'border_right',
                'title'         => __( 'Border Right', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'title' => __('Color', 'ekit-megamenu'),
                'field_id'        => 'border_color',
                'type'            => 'color',
                'default'         => '#fff',
            ),
            array(
                'field_id'      => 'opacity',
                'title'         => __( 'Opacity (0.1 - 1)', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '1',
            )
        ]
    ]
);