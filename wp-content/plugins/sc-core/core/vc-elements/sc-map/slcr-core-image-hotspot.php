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
 * Element Description: VC Slcr Image Hotspot Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Image Hotspots','sc-core') ,
    'base' => 'slcr_image_hotspot',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'hotspots.png',
    'class' => 'vc_icon_content_box',
    'as_parent' => array(
        'only' => 'slcr_hotspot'
    ) ,
    // 'as_parent' => '',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Insert an image with hotspots.','sc-core') ,
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'attach_image',
            'class' => 'hotspot',
            'heading' =>  esc_html__('Image','sc-core'),
            'value' => '',
            'param_name' => 'hotspot_image',
            'admin_label' => false,
            'description' => __('Choose an image to show hotspots.','sc-core').'<br/>'.__(' To add Hotspots on the image, click on the large plus icon inside this element.','sc-core'),
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Hotspot Opening','sc-core') ,
            'param_name' => 'hotspot_open',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select a type to open Hotspot Information.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('On Hover','sc-core') => 'hover',
                esc_html__('On Click','sc-core') => 'click',
            ) ,
            'save_always' => true,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Shadow','sc-core') ,
            'param_name' => 'add_shadow',
            'admin_label' => false,
            'description' => esc_html__('Enable this option to show shadow around hotspot information block.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Animation','sc-core') ,
            'param_name' => 'add_animation',
            'admin_label' => false,
            'description' => esc_html__('Enable this option to show beautiful border animation around hotspot point.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'admin_label' => false,
            'param_name' => 'css',
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
    ) ,
    // 'default_content' => '[slcr_hotspot ][/slcr_hotspot] ',
);