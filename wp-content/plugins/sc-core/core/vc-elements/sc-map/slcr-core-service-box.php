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
 * Element Description: Slcr Service Box Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Service Box','sc-core') ,
    'base' => 'slcr_service_box',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'services.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Insert a Service Box.','sc-core') ,
    'params' => array(
        array(
            'type' => 'attach_image',
            'holder' => 'img', 
            'heading' => esc_html__('Image','sc-core') ,
            'param_name' => 'image', 
            'description' => esc_html__('Select image  .','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 padding-custom crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Title Text','sc-core') ,
            'param_name' => 'title',
            'description' => esc_html__('Enter Title text .','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textarea',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Description','sc-core') ,
            'param_name' => 'description',
            'description' => esc_html__('Enter Description .','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Price ','sc-core') ,
            'param_name' => 'price',
            'description' => esc_html__('Enter Price  .','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'type' => 'vc_link',
            'class' => 'custom_heading_element_link',
            'heading' => esc_html__('URL (Link)','sc-core') ,
            'param_name' => 'service_link',
            'description' => esc_html__('Select URL and enter text.','sc-core') ,
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
        ) ,
    ) ,
);