<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.1.0
 *
 * Element Description: Slcr Notifications Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Notification Popup','sc-core') ,
    'base' => 'slcr_notifications',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'notification.png',
    'class' => 'vc_icon_content_notifications',
    'as_parent' => array(
        'except' => 'slcr_notifications'
    ) ,
    // 'as_parent' => '',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Opens a custom made popup on page load.','sc-core') ,
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Notification Position','sc-core') ,
            'param_name' => 'slcr_notification_position',
            'class' => 'title-class', 
            'value' => array(
                esc_html__('Bottom Right','sc-core') => 'bottom-right',
                esc_html__('Bottom Left','sc-core') => 'bottom-left',
                esc_html__('Top Left','sc-core') => 'top-left',
                esc_html__('Top Right','sc-core') => 'top-right',
                esc_html__('Center','sc-core') => 'center',
            ) ,
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Select a position where you want to show notification.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Notification Delay','sc-core') ,
            'param_name' => 'slcr_notification_delay',
            'description' => __('Enter delay time top open notification when page is loaded.','sc-core').'<br/>'.__(' Example - 1000 for 1 sec.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Notification Dialog Width','sc-core') ,
            'param_name' => 'slcr_notification_width',
            'description' => esc_html__('Width of notification box. Example - 400px','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Notification Dialog Margin','sc-core') ,
            'param_name' => 'slcr_notification_margin',
            'description' => esc_html__('Adjust the margin around notification dialog. Example - 20px','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Close Icon Color','sc-core') ,
            'param_name' => 'slcr_notification_icon_color',
            'description' => esc_html__('Change the color of notification close icon.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
            'group'       => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
    ) ,
);