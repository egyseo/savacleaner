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
 * Element Description: Slcr Alert mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Alert Box','sc-core') ,
    'base' => 'slcr_alert',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'alert-box.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Insert a simple alert box.','sc-core') ,
    'params' => array(
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'admin_label' => false,
            'class' => '',
            'heading' => esc_html__('Alert Content','sc-core') ,
            'param_name' => 'content', // Important: Only one textarea_html param per content element allowed and it should have 'content' as a 'param_name'
            'value' => '<p>'.__('I am test text block. Click edit button to change this text.','sc-core').'</p>',
            'description' => esc_html__('Enter content you want to show in the alert box.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Border Color','sc-core') ,
            'param_name' => 'alert_border_color',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change border color of the alert box.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Background Color','sc-core') ,
            'param_name' => 'alert_bg_color',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change background color of the alert box.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Border Radius','sc-core') ,
            'param_name' => 'slcr_alert_bradius',
            'value' => '',
            'description' => esc_html__('Change border radius of the alert box.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
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
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
            'group'       => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) 
    ) 
);