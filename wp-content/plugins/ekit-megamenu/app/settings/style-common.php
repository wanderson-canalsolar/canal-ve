<?php 

$this->addSettingFields(
    ['style', 'style_common'],
    [
        'field_id'      => 'theme_name',
        'title'         => __( 'Theme name', 'admin-page-framework-loader' ),
        'type'          => 'text',
        'default'   => $current_theme['name'],
    ],
    [
        'field_id'      => 'theme_slug',
        'type'          => 'hidden',
        'default'   => $current_theme['slug'],
    ],
    [
        'field_id'      => 'logo',
        'title'         => __( 'Logo', 'admin-page-framework-loader' ),
        'description'   => __('Select an logo to show on menu'),
        'type'          => 'image',
        'allow_external_source' => false,
        'attributes'    => array(
            'preview' => array(
                'style' => 'max-width:60px;' // the size of the preview image.
            ),
        )
    ],
    [
        'field_id'      => 'z_index',
        'title'         => __( 'Z Index', 'admin-page-framework-loader' ),
        'type'          => 'number',
        'default'          => '9999',
    ]    

);