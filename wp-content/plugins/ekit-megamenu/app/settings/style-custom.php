<?php 

$this->addSettingFields(
    ['style', 'style_custom'],
    [
        'field_id'      => 'class_name',
        'title'         => __( 'Custom class', 'admin-page-framework-loader' ),
        'type'          => 'text',
    ],
    [
        'field_id'      => 'custom_css',
        'title'         => 'Custom CSS',
        'type'          => 'textarea',
        'attributes'    => array(
            'rows' => 6,
            'cols' => 60
        )
    ]
);