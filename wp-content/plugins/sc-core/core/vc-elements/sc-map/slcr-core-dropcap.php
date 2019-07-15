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
 * Element Description: Slcr Dropcap Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Dropcaps','sc-core') ,
    'base' => 'slcr_dropcap',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'dropcaps.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add a dropcap with this element.','sc-core') ,
    'params' => array(
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Dropcap Letter','sc-core') ,
            'param_name' => 'title',
            'description' => esc_html__('Enter the first letter you want to make dropcap.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Dropcap Font Size','sc-core') ,
            'description' => esc_html__('Enter custom font size for dropcap letter. Example - 20px','sc-core'),
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
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Enter dropcap height and width','sc-core') ,
            'param_name' => 'slcr_dropcap_height_width',
            'description' => esc_html__('Enter custom Height and Width for dropcap. Example - 80px','sc-core'),
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
            'heading' => esc_html__('Change Dropcap Typography','sc-core') ,
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
            'heading' => esc_html__('Dropcap Font Color','sc-core') ,
            'param_name' => 'title_font_color',
            'description' => esc_html__('Custom color for dropcap text.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Dropcap Background Color','sc-core') ,
            'param_name' => 'title_dropcap_bg_color',
            'description' => esc_html__('Change background color of dropcap.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Border Radius','sc-core'),
            'param_name' => 'slcr_dropcap_bradius',
            'value' => '',
            'description' => esc_html__('Use custom border radius for dropcap.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textarea_html',
            'holder' => 'div',
            'class' => '',
            'admin_label' => false,
            'heading' => esc_html__('Content','sc-core') ,
            'param_name' => 'content', // Important: Only one textarea_html param per content element allowed and it should have 'content' as a 'param_name'
            'value' => '<p>'.__('I am test text block. Click edit button to change this text.','sc-core').'</p>',
            'description' => esc_html__('Enter your content.','sc-core') ,
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
        ),
    ),
); 