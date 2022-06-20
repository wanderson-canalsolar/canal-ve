<?php
$this->addSettingFields(
    ['style', 'style_sub_menu'],
    [
        'field_id'      => 'menu_item_spacing',
        'type'          => 'inline_mixed',
        'title'         => __( 'Item Spacing', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'field_id'      => 'padding_top',
                'title'         => __( 'padding Top', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '15px',
            ),
            array(
                'field_id'      => 'padding_left',
                'title'         => __( 'Padding Left', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '10px',
            ),
            array(
                'field_id'      => 'padding_bottom',
                'title'         => __( 'Padding Bottom', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '15px',
            ),
            array(
                'field_id'      => 'padding_right',
                'title'         => __( 'Border Right', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '10px',
            ),
        ]
    ],
    [
        'field_id'      => 'panel_shadow',
        'type'          => 'inline_mixed',
        'title'         => __( 'Panel box shadow', 'admin-page-framework-loader' ),
        'content'       => [

            array(
                'field_id'      => 'x_offset',
                'title'         => __( 'X Offset', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'y_offset',
                'title'         => __( 'Y Offset', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'blur',
                'title'         => __( 'Blur', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'field_id'      => 'spread',
                'title'         => __( 'Spread', 'admin-page-framework-loader' ),
                'type'          => 'text',
                'default'   => '0px',
            ),
            array(
                'title' => __('Color', 'ekit-megamenu'),
                'field_id'        => 'to',
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
        'field_id'      => 'panel_menu_border',
        'type'          => 'inline_mixed',
        'title'         => __( 'Panel Menu Border', 'admin-page-framework-loader' ),
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
        'field_id'      => 'sub_menu_bg',
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
        'field_id'      => 'sub_menu_radius',
        'type'          => 'inline_mixed',
        'title'         => __( 'Conatiner border radius', 'admin-page-framework-loader' ),
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
    ],
    [
        'field_id'      => 'sub_menu_width',
        'title'         => __( 'Conatiner width', 'admin-page-framework-loader' ),
        'type'          => 'text',
        'default'   => '200px',
    ],
    [
        'field_id'        => 'sub_menu_item_text_color',
        'title' => __('Item text color', 'ekit-megamenu'),
        'type'            => 'color',
        'default'         => '#777',
    ],
    [
        'field_id'        => 'sub_menu_item_text_color_hover',
        'title' => __('Item text color (hover)', 'ekit-megamenu'),
        'type'            => 'color',
        'default'         => '#000',
    ],
    [
        'field_id'      => 'sub_menu_item_bg_hover',
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
    ]

);