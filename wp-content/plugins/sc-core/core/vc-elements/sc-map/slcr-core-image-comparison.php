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
 * Element Description: VC Slcr Image Comparison Data Mapping
 */
if (!defined('ABSPATH')) {
    die('-1');
}
return array(
    'name' => esc_html__('Comparison Images','sc-core') ,
    'base' => 'slcr_image_comparison',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Compare two different images.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'comparison.png',
    'params' => array(
        array(
            'type' => 'attach_image',
            'holder' => 'img',
            // 'class' => 'text-class',
            'heading' => esc_html__('First Image','sc-core') ,
            'param_name' => 'himg2',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select first image to compare. Resolution of both images must be same.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 padding-custom crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'img',
            // 'class' => 'text-class',
            'heading' => esc_html__('Second Image','sc-core') ,
            'param_name' => 'himg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select second image to compare.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Handle Color','sc-core') ,
            'param_name' => 'handle_color',
            'admin_label' => false,
            'description' => esc_html__('Change color of handle.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Color','sc-core') ,
            'param_name' => 'handle_icon_color',
            'admin_label' => false,
            'description' => esc_html__('Change color of icon','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
            'param_name' => 'slcr_img_link_template',  
            'group' => esc_html__('General','sc-core'),
            'content_element'=>false,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
            'param_name' => 'slcr_img_link_template2',  
            'group' => esc_html__('General','sc-core'),
            'content_element'=>false,
        ),
    ) ,
);