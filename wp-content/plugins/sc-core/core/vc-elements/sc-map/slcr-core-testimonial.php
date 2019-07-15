<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.0.0
 *
 * Element Description: Slcr Testimonial
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
 
return array(
    'name' => esc_html__('Testimonials Loop','sc-core') ,
    'base' => 'slcr_testimonial',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'testimonials.png',
    'class' => 'vc_icon_content_box',
    'as_parent' => array(
        'only' => 'testimonials'
    ) ,
    // 'as_parent' => '',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Multiple testimonials in loop.','sc-core') ,
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Select Testimonials Type','sc-core') ,
            'param_name' => 'testimonials_type',
            'class' => 'title-class', 
            'value' => array(
                esc_html__('Testimonials Type 1','sc-core') => 'Testimonials_Type_1',
                esc_html__('Testimonials Type 2','sc-core') => 'Testimonials_Type_2',
                esc_html__('Testimonials Type 3','sc-core') => 'Testimonials_Type_3',
                esc_html__('Testimonials Type 4','sc-core') => 'Testimonials_Type_4',
                esc_html__('Testimonials Type 5','sc-core') => 'Testimonials_Type_5',
                esc_html__('Testimonials Type 6','sc-core') => 'Testimonials_Type_6',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'description' => esc_html__('Select Testimonials Type . the blow input filed open accord to that selected type  ).','sc-core')
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'admin_label' => false,
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'admin_label' => false,
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','sc-core') ,
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
    ) ,
    'default_content' => '[testimonials title="' . sprintf('%s %d', '' , 1) . '"][/testimonials] ',
); 