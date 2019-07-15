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
 * Element Description: Slcr Accordion Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
} 
// Map the block with vc_map()
return array(
    'name' => esc_html__('Accordion Data ','sc-core') ,
    'base' => 'slcr_accordion_data',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Insert it inside VC default accordions.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'accordion-data.png',
    'params' => array(
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Title ','sc-core') ,
            'param_name' => 'title',
            'description' => esc_html__('Enter Title of Accordion ','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Title Font Size','sc-core') ,
            'description' => esc_html__('Enter custom Font Size. eg(10px) ','sc-core') ,
            'param_name' => 'title_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Title Text Transform ','sc-core') ,
            'param_name' => 'title_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform Title text. eg( UPPERCASE, lowecase )','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Title Padding Top & Bottom','sc-core') ,
            'description' => esc_html__('Enter custom Top and Bottom padding. eg(10px) ','sc-core') ,
            'param_name' => 'title_padding_top',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Title Padding Left & Right','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding. eg(10px)','sc-core') ,
            'param_name' => 'title_padding_left',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'title_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'title-class',
            'heading' => esc_html__('Change Title Typography','sc-core') ,
            'param_name' => 'title_google_font_select',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__('Select Font Family.','sc-core') ,
                    'font_style_description' => esc_html__('Select Font Style.','sc-core') ,
                ) ,
            ) ,
            'description' => esc_html__('Select Google Font from the list.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Title Font Color','sc-core') ,
            'param_name' => 'title_font_color',
            'description' => esc_html__('Change font color for title','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textarea',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Description ','sc-core') ,
            'param_name' => 'desc',
            'description' => esc_html__('Enter description of Accordion ','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'desc-class',
            'heading' => esc_html__('Description Font Size','sc-core') ,
            'description' => esc_html__('Enter custom Font Size. eg(10px) ','sc-core') ,
            'param_name' => 'desc_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Description Text Transform ','sc-core') ,
            'param_name' => 'desc_text_transform',
            'class' => 'desc_Text_Transform',
            'description' => esc_html__('Transform desc text. eg( UPPERCASE, lowecase )','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'desc-class',
            'heading' => esc_html__('Description Padding Top & Bottom','sc-core') ,
            'description' => esc_html__('Enter custom Top and Bottom padding. eg(10px) ','sc-core') ,
            'param_name' => 'desc_padding_top',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'desc-class',
            'heading' => esc_html__('Description Padding Left & Right','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding. eg(10px)','sc-core') ,
            'param_name' => 'desc_padding_left',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'desc_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'desc-class',
            'heading' => esc_html__('Change Description Typography','sc-core') ,
            'param_name' => 'desc_google_font_select',
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__('Select Font Family.','sc-core') ,
                    'font_style_description' => esc_html__('Select Font Style.','sc-core') ,
                ) ,
            ) ,
            'description' => esc_html__('Select Google Font from the list.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'desc_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'desc-class',
            'heading' => esc_html__('Description Font Color','sc-core') ,
            'param_name' => 'desc_font_color',
            'description' => esc_html__('Change font color for description','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'desc',
                'not_empty' => true,
            ) ,
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