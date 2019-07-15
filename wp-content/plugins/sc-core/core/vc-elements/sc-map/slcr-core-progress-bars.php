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
 * Element Description: Slcr Progress Bars Data Mapping
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Map the block with vc_map()
return array(
    'name' => esc_html__('Progress Bars','sc-core') ,
    'base' => 'slcr_progress_bars',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Insert progress bar element.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'progress.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'holder' => '',
            'class' => 'count-class',
            'heading' => esc_html__('Progress Bar Heading','sc-core') ,
            'description' => esc_html__('Enter a heading for you progress bar. (optional) Example - HTML, CSS or JAVASCRIPT','sc-core'),
            'param_name' => 'typed_text_front_text',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            
            'admin_label' => false, false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Heading Size','sc-core') ,
            'description' => esc_html__('Enter custom font size for progress bar heading. Example - 15px','sc-core') ,
            'param_name' => 'front_text_font_size',
            'value' => '' ,
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Heading Text Transform ','sc-core') ,
            'param_name' => 'front_text_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform progress bar heading text. Example - UPPERCASE or lowercase','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Heading Top and Bottom Padding',
            'class' => 'title-class',
            'heading' => esc_html__('Heading top and bottom padding','sc-core') ,
            'description' => esc_html__('Change the top and bottom padding around the heading text. Example - 10px','sc-core') ,
            'param_name' => 'front_text_padding_top',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Progress Bar text Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Heading left and right padding','sc-core') ,
            'description' => esc_html__('Change the left and right padding around the heading text. Example - 10px','sc-core') ,
            'param_name' => 'front_text_padding_left',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
         array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Heading text color','sc-core') ,
            'param_name' => 'front_text_font_color',
            'description' => esc_html__('Change the font color of heading text.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
             'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'front_text_use_theme_fonts',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'typed_text_front_text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'title-class',
            'heading' => esc_html__('Change Front text Typography','sc-core') ,
            'param_name' => 'front_text_google_font_select',
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
                'element' => 'front_text_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => '',
            'class' => 'count-class',
            'heading' => esc_html__('Progress Bar Value','sc-core') ,
            'description' => esc_html__('Enter a value for progress bar from 1 to 100. Example - 50, 60 or 70','sc-core'),
            'param_name' => 'front_progress_value',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Color Type','sc-core') ,
            'param_name' => 'slcr_progress_color_type',
            'admin_label' => false,
            'value' => array(
                esc_html__('Color','sc-core') => 'color',
                esc_html__('Gradient','sc-core') => 'gradient', 
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Progress Bar Size','sc-core') ,
            'param_name' => 'front_progress_type',
            'description' => esc_html__('Select a size of progress bar.','sc-core'),
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Extra Small','sc-core') => 'xs',
                esc_html__('Small','sc-core') => 'sm',
                esc_html__('Medium','sc-core') => 'md',
                esc_html__('Large','sc-core') => 'lg',
            ) ,
            'save_always' => true,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Select Button Fill Animation ','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Bar Gradient Color ','sc-core') ,
            'param_name' => 'front_progress_color_gradient',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'admin_label' => false,
            'value' => array(  
                esc_html__('Gradient Color 1','sc-core') => 'progress--Gradient-1',
                esc_html__('Gradient Color 2','sc-core') => 'progress--Gradient-2', 
            ) ,  
            'dependency' => array(
                'element' => 'slcr_progress_color_type',
                'value' => 'gradient',
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Progress Bar Color','sc-core'),
            'param_name' => 'front_progress_color',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Change the color of progress bar.','sc-core') ,
            'group' => esc_html__('General','sc-core'), 
            'dependency' => array(
                'element' => 'slcr_progress_color_type',
                'value' => 'color',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'admin_label' => false,
            'heading' => esc_html__('Empty Bar Color','sc-core'),
            'param_name' => 'progress_bg_color',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Change the bar color of empty area.','sc-core') ,
            'group' => esc_html__('General','sc-core'), 
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Show Counter','sc-core') ,
            'param_name' => 'show_progress_count',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Enable this option to show a number counter under progress bar.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'), 
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Counter Color','sc-core'),
            'param_name' => 'progress_count_color',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change the background color of counter.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'show_progress_count',
                'value' => 'Yes',
            ) ,
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
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,

    ) ,
);