<?php

$this->addSettingFields(
    'general',
    [
        'field_id'      => 'load_fontawesome',
        'title'         => esc_html__( 'Load Font-awesome css?', 'ekit-megamenu' ),
        'type'          => 'checkbox',
        'label'         => esc_html__( 'If your theme already supports Font-awesome icons, then don\'t load this here.', 'ekit-megamenu' ),
        'default'   => true,
    ],
    [
        'field_id'      => 'load_lineawesome',
        'title'         => esc_html__( 'Load Line-awesome css?', 'ekit-megamenu' ),
        'type'          => 'checkbox',
        'label'         => esc_html__( 'If your theme already supports Line-aweseome icons, then don\'t load this here.', 'ekit-megamenu' ),
        'default'   => true,
    ],
    [
        'field_id'      => 'css_output_location',
        'title'         => esc_html__( 'CSS output location', 'ekit-megamenu' ),
        'type'          => 'radio',
        'label'         => [
            'header' => 'in &lt;head&gt;',
            'footer' => 'in &lt;footer&gt;',
        ],
        'default'       => 'header',
    ]
);