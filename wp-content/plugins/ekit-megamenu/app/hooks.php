<?php

add_action( 'admin_footer', 'ekit_menu_footer_content' ); // Write our JS below here

function ekit_menu_footer_content() {
    $screen = get_current_screen();
    if($screen->base != 'nav-menus'){
        return;
    }
    ?>
<div id="ekit-menu-item-settings-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <div id="ekit-menu-item-settings-modal-content">
            <div class="uk-position-relative  uk-margin-medium">
                <ul uk-tab="" class="uk-tab uk-modal-tab-element uk-flex-center">
                    <li aria-expanded="true" class="uk-active builder-tab"><a href="#"><?php esc_html_e('Content', 'ekit-megamenu'); ?></a></li>
                    <li aria-expanded="false" class="icon-tab"><a href="#"><?php esc_html_e('Icon', 'ekit-megamenu'); ?></a></li>
                    <li aria-expanded="false" class="badge-tab"><a href="#"><?php esc_html_e('Badge', 'ekit-megamenu'); ?></a></li>
                </ul>

                <ul class="uk-switcher uk-modal-tab-element uk-margin">
                    <li class="uk-active builder-tab">
                    <?php if(defined( 'ELEMENTOR_VERSION' )): ?>
                        <div class="switch-wrapper">
                            <input type="checkbox" value="1" id="ekit-menu-item-enable"/>
                            <label for="ekit-menu-item-enable"><span><em></em></span></label>
                        </div>
                        <div id="ekit-menu-builder-warper">
                            <small class="ekit-menu-mega-submenu enabled_item"><?php esc_html_e('Mega submenu enabled'); ?></small>
                            <small class="ekit-menu-mega-submenu disabled_item"><?php esc_html_e('Mega submenu disabled'); ?></small>
                        
                            <button disabled id="ekit-menu-builder-trigger" class="ekit-menu-elementor-button button" type="button" uk-toggle="target: #ekit-menu-builder-modal">
                                <img src="<?php echo EKIT_MEGAMENU_ASSETS; ?>/img/elementor-icon.png" alt="elementskit mega menu" />
                                <?php esc_html_e('Edit mega menu content'); ?>
                            </button>
                        </div>
                        <?php else: ?>
                            <p class="no-elementor-notice"><?php esc_html_e( 'This plugin requires Elementor page builder to edt Mega Menu items content', 'ekit-megamenu' ); ?></p>
                        <?php endif; ?>
                    </li>
                    <li class="icon-tab">
                        <table class="option-table">
                            <tbody>
                                <tr>
                                    <td><strong><?php esc_html_e('Choose icon color', 'ekit-megamenu'); ?></strong></td>
                                    <td class="alignright">
                                        <input type="text" value="#bada55" class="ekit-menu-wpcolor-picker" id="ekit-menu-icon-color-field" />
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong><?php esc_html_e('Select icon', 'ekit-megamenu'); ?></strong></td>
                                    <td class="alignright">
                                    <select id="ekit-menu-icon-field" class="ekit-menu-icon-picker" >
                                        <option value=""><?php esc_html_e('No icon', 'ekit-megamenu'); ?></option>
                                        <?php ekit_menu_line_icon_options(); ?>
                                    </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li class="badge-tab">
                        <table class="option-table">
                            <tbody>
                                <tr>
                                    <td><strong><?php esc_html_e('Badge text', 'ekit-megamenu'); ?></strong></td>
                                    <td class="alignright">
                                        <input type="text" placeholder="<?php esc_html_e('Badge Text', 'ekit-megamenu'); ?>" id="ekit-menu-badge-text-field" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong><?php esc_html_e('Choose badge color', 'ekit-megamenu'); ?></strong></td>
                                    <td class="alignright">
                                        <input type="text" class="ekit-menu-wpcolor-picker" value="#bada55" id="ekit-menu-badge-color-field" />
                                    </td>
                                </tr>

                                <tr>
                                    <td><strong><?php esc_html_e('Choose badge background', 'ekit-megamenu'); ?></strong></td>
                                    <td class="alignright">
                                        <input type="text" class="ekit-menu-wpcolor-picker" value="#bada55" id="ekit-menu-badge-background-field" />
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>


            <input type="hidden" id="ekit-menu-modal-menu-id">
            <input type="hidden" id="ekit-menu-modal-menu-has-child">
            <div class="clearfix controls">
                <div class="left-content">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                </div>
                <div class="right-content">
                    <span class='spinner'></span>
                    <?php echo get_submit_button(esc_html__('Save', 'ekit-megamenu'), 'ekit-menu-item-save button-primary alignright','', false); ?>
                </div>
            </div>

        </div>


        <div id="ekit-menu-builder-modal" class="uk-modal-container" uk-modal>
            <div class="uk-modal-dialog">
                <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                <iframe id="ekit-menu-builder-iframe" src="" frameborder="0"></iframe>
            </div>
        </div>



        <span id="ekit-menu-modal-spinner" class='spinner'></span>

    </div>
</div>
<?php
}




/**
 * Register required plugins
 *
 * @return void
 */
add_action( 'tgmpa_register', 'ekit_menu_register_required_plugins' );
function ekit_menu_register_required_plugins() {

    $plugins = array(
        array(
            'name'     => 'Elementor', 
            'slug'     => 'elementor',
            'required' => true,
        ),
    );

    $config = array(
        'id'           => 'ekit-megamenu',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'plugins.php',
        'capability'   => 'manage_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'strings'      => array(
            'notice_can_install_required'     => _n_noop(
                'Elementskit Mega Menu requires the following plugin: %1$s.',
                'Elementskit Mega Menu requires the following plugins: %1$s.',
                'ekit-megamenu'
            ),
            'notice_can_install_recommended'  => _n_noop(
                'Elementskit Mega Menu recommends the following plugin: %1$s.',
                'Elementskit Mega Menu recommends the following plugins: %1$s.',
                'ekit-megamenu'
            ),
        ),
    );

    tgmpa( $plugins, $config );

}