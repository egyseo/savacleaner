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
 * Element Description: Slcr Text Reveal Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Text Reveal','sc-core') ,
    'base' => 'slcr_text_reveal',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'text-reveal.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add some text with revealing effect.','sc-core') ,
    'params' => array(
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Reveal Text','sc-core') ,
            'param_name' => 'title',
            'description' => esc_html__('Enter some text you want to reveal.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Animation Delay ','sc-core') ,
            'param_name' => 'animation_delay',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Increase the delay to start the animation. Example - 1000ms','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Animation Duration ','sc-core') ,
            'param_name' => 'animation_duration',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change the duration of animation. Example - 1000ms','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Reveal Strip Color','sc-core') ,
            'param_name' => 'reveal_bg_color',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change the color of text revealing strip.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Font Size','sc-core') ,
            'description' => esc_html__('Change the size of text you want to reveal. Example - 40px','sc-core') ,
            'param_name' => 'title_font_size',
            'value' => '' ,
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'weight' => 0,
            'group' => 'Typography',
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Transform Text','sc-core') ,
            'param_name' => 'title_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform reveal text. Example - UPPERCASE or lowercase.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'group' => 'Typography',
            'admin_label' => false,
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Padding Top and Bottom','sc-core') ,
            'description' => esc_html__('Enter custom padding on top and bottom around text. Example - 10px','sc-core') ,
            'param_name' => 'title_padding_top',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Typography',
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Padding Left and Right','sc-core') ,
            'description' => esc_html__('Enter custom padding on left and right around text. Example - 10px','sc-core') ,
            'param_name' => 'title_padding_left',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Typography',
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Custom Google Font?','sc-core') ,
            'param_name' => 'title_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => 'Typography',
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
            'group' => 'Typography',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Font Color','sc-core') ,
            'param_name' => 'title_font_color',
            'description' => esc_html__('Change font color for title','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
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
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
    ) ,
);