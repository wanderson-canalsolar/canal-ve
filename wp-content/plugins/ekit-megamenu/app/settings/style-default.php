<?php
$this->addSettingFields(
    ['style', 'style_default'],
    array(
        'field_id'      => 'theme_select_edit_container',
        'type'          => 'inline_mixed',
        // 'title'         => 'Select theme to edit',
        'content'       => array(
            array(
                'field_id'      => '_text',
                'content'       => __( 'Select theme to edit ', 'admin-page-framework-loader' ),
            ),
            array(
                'field_id'        => 'theme_select_edit',
                'type'            => 'select',
                'label_min_width' => '',
                'label'           => $this->get_menu_theme->theme_list,
                'default'         => $current_theme['slug'],
            ),
            array(
                'field_id'      => '_text',
                'content'       => sprintf(
                    wp_kses_post( 'or <a href="%s">create a new theme</a>.', 'ekit-megamenu' ), $this->menu_page_url('ekit_menu_settings', false).'&action=create_new_theme'
                ),
            ),
            // array(
            //     'field_id'      => '_text',
            //     'content'       => sprintf(
            //         wp_kses_post( 'or <a href="%s">duplicate current theme</a>.', 'ekit-megamenu' ), $this->menu_page_url('ekit_menu_settings', false).'&action=duplicate_current_theme'
            //     ),
            // ),
        ),
    ),
    array(
        'field_id'      => '_text_selected_theme',
        'title'         => 'Edit theme:',
        'content'       => sprintf( wp_kses_post('<strong>%s</strong>', 'ekit-megamenu' ), $current_theme['name']),
        )
    );       
