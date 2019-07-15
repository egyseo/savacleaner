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
 * Element Description: VC Slcr Cou Class
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
/*
Element Description: VC slcr Counter Mapping
*/
if (!defined('ABSPATH')) {
    die('-1');
}
// Map the block with vc_map()
return array(
    'name' => esc_html__('Counters','sc-core') ,
    'base' => 'slcr_counter',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Number counters along with icons.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'counters.png',
    'params' => array(
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Counter Value','sc-core') ,
            'param_name' => 'count',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Enter the value you want to count. Note - Only numbers are allowed ( eg - 10000 )','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Counter Text','sc-core') ,
            'param_name' => 'text',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Enter some text to show at the bottom of counter. Example - This is a counter','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('counter Alignment','sc-core') ,
            'description' => esc_html__('Change the alignment of of counter.','sc-core') ,
            'param_name' => 'slcr_counter_align',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'admin_label' => false,
            'value' => array(
                esc_html__('Center','sc-core') => 'center',
                esc_html__('Right','sc-core') => 'right',
                esc_html__('Left','sc-core') => 'left',
                ) , 
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'count-class',
            'heading' => esc_html__('Counter Font Size','sc-core') ,
            'description' => esc_html__('Enter custom font size for counter value. Example - 20px','sc-core') ,
            'param_name' => 'count_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'count',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'count-class',
            'heading' => esc_html__('Counter Top and Bottom Padding','sc-core') ,
            'description' => esc_html__('Enter custom padding around the counter value. Example - 10px','sc-core') ,
            'param_name' => 'count_padding_top',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'count',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'count-class',
            'heading' => esc_html__('Counter Left and Right Padding','sc-core') ,
            'description' => esc_html__('Enter custom padding around the counter value. Example - 10px','sc-core') ,
            'param_name' => 'count_padding_left',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'count',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'count_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'count',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'count-class',
            'heading' => esc_html__('Change count Typography','sc-core') ,
            'param_name' => 'count_google_font_select',
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
                'element' => 'count_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Counter Font Color','sc-core') ,
            'param_name' => 'count_font_color',
            'description' => esc_html__('Change font color of counter value.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'count',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Counter Size','sc-core') ,
            'param_name' => 'count_size',
            'class' => 'count_Text',
            'description' => esc_html__('Select the size of counter','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'value' => array(
                esc_html__('Small Size ','sc-core') => 'small',
                esc_html__('Medium Size ','sc-core') => 'medium',
                esc_html__('Large Size ','sc-core') => 'large',
            ) ,
            'save_always' => true,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Add Separator','sc-core') ,
            'param_name' => 'add_separator',
            'description' => esc_html__('Enable this option to add a "," to every thousand count. Example - 12,345','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'count-class',
            'heading' => esc_html__('Add Symbol','sc-core') ,
            'description' => esc_html__('Add a symbol in your counter value.','sc-core').'<br/>'.__(' Example - $ 12000','sc-core') ,
            'param_name' => 'symbol',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Symbol Style ','sc-core') ,
            'param_name' => 'symbol_text_style',
            'class' => 'Symbol_Text_Transform',
            'description' => esc_html__('Select Inline option to show symbol in same line of counter value or select absolute to show freely adjustable symbol.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('Inline','sc-core') => 'before',
                esc_html__('Absolute','sc-core') => 'top',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Symbol Position','sc-core') ,
            'param_name' => 'symbol_text_positon',
            'class' => 'Symbol_Text_Transform',
            'description' => esc_html__('Select the position where you want to show the symbol. ','sc-core').'<br/>'.__(' Example - Before Counter or After Counter','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'value' => array(
                esc_html__('Before','sc-core') => 'left',
                esc_html__('After','sc-core') => 'right',
            ) ,
            'dependency' => array(
                'element' => 'symbol_text_style',
                'value' => 'before',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Add icon?','sc-core') ,
            'param_name' => 'add_icon',
            'admin_label' => false,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Alignment','sc-core') ,
            'description' => esc_html__('Select icon alignment.','sc-core') ,
            'param_name' => 'i_align',
            'admin_label' => false,
            'value' => array(
                esc_html__('Left','sc-core') => 'left',
                esc_html__('Right','sc-core') => 'right',
                esc_html__('Top','sc-core') => 'top',
                esc_html__('Bottom','sc-core') => 'bottom',
            ) ,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library','sc-core') ,
            'admin_label' => false,
            'param_name' => 'citype',
            'description' => esc_html__('Select icon library.','sc-core') ,
            'value' => array(
                esc_html__('Font Awesome','sc-core') => 'fontawesome',
                esc_html__('Open Iconic','sc-core') => 'openiconic',
                esc_html__('Typicons','sc-core') => 'typicons',
                esc_html__('Entypo','sc-core') => 'entypo',
                esc_html__('Linecons','sc-core') => 'linecons',
                esc_html__('Mono Social','sc-core') => 'monosocial',
                esc_html__('Material','sc-core') => 'material',
                esc_html__('Flaticon','sc-core') => 'flaticon',
            ) ,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_fontawesome',
            'value' => 'fa fa-adjust',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'fontawesome',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_openiconic',
            'value' => 'vc-oi vc-oi-dial',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'openiconic',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_typicons',
            'admin_label' => false,
            'value' => 'typcn typcn-adjust-brightness',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'typicons',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_entypo',
            'admin_label' => false,
            'value' => 'entypo-icon entypo-icon-note',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'entypo',
            ) ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_linecons',
            'value' => 'vc_li vc_li-heart',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'linecons',
            ) ,
            'group' => esc_html__('Icon','sc-core'),
            'description' => esc_html__('Select icon from library.','sc-core') ,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_monosocial',
            'admin_label' => false,
            'value' => 'vc-mono vc-mono-fivehundredpx',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'monosocial',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_material',
            'admin_label' => false,
            'value' => 'vc-material vc-material-cake',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'material',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'material',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'sc-core' ),
            'param_name' => 'icon_flaticon',
            'value' => 'flaticon-001-wipes',
            'settings' => array(
                'emptyIcon' => false,
                'type' => 'flaticon',
                'iconsPerPage' => 4000,
            ),
            'dependency' => array(
                'element' => 'citype',
                'value' => 'flaticon',
            ),
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'admin_label' => false,
            'group' => esc_html__('Icon','sc-core'),
        ),
        array(
            'type' => 'textfield',
            'holder' => 'Icon Size',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Font Size','sc-core') ,
            'description' => esc_html__('Enter custom size for icon. Example - 10px','sc-core') ,
            'param_name' => 'icon_font_size',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Icon','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Icon Padding',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Padding Left and Right','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding for icon. Example - 10px','sc-core') ,
            'param_name' => 'icon_padding_left',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Icon','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Icon Color','sc-core') ,
            'admin_label' => false,
            'param_name' => 'count_icon_font_color',
            'description' => esc_html__('Change the color of the Icon.','sc-core') ,
            'group' => esc_html__('Icon','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        
        
        array(
            'type' => 'textfield',
            'holder' => 'css right value',
            'class' => 'symbol-class',
            'heading' => esc_html__('Adjust Position','sc-core') ,
            'description' => esc_html__('Enter a custom value to move the symbol from Right to Left side.','sc-core').'<br/>'.__(' Example - To move from Right to Left enter 20px or To move Left to Right enter -20px','sc-core') ,
            'param_name' => 'symbol_css_right_value',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'symbol_text_style',
                'value' => 'top',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'symbol-class',
            'heading' => esc_html__('Symbol Font Size','sc-core') ,
            'description' => esc_html__('Enter custom Font Size. eg(10px) ','sc-core') ,
            'param_name' => 'symbol_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'symbol-class',
            'heading' => esc_html__('Symbol Top and Bottom Padding','sc-core') ,
            'description' => esc_html__('Enter custom Top and Bottom padding for symbol. Example - 10px','sc-core') ,
            'param_name' => 'symbol_padding_top',
            'value' => '' ,
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'symbol-class',
            'heading' => esc_html__('Symbol Left and Right Padding','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding for symbol. Example - 10px','sc-core') ,
            'param_name' => 'symbol_padding_left',
            'value' => '' ,
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'symbol_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'symbol-class',
            'heading' => esc_html__('Change symbol Typography','sc-core') ,
            'param_name' => 'symbol_google_font_select',
            'admin_label' => false,
            'settings' => array(
                'fields' => array(
                    'font_family_description' => esc_html__('Select Font Family.','sc-core') ,
                    'font_style_description' => esc_html__('Select Font Style.','sc-core') ,
                ) ,
            ) ,
            'description' => esc_html__('Select Google Font from the list.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'symbol-class',
            'heading' => esc_html__('Symbol Color','sc-core') ,
            'param_name' => 'symbol_font_color',
            'admin_label' => false,
            'description' => esc_html__('Select custom color for symbol.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'symbol',
                'not_empty' => true,
            ) ,
        ) ,
        
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'text-class',
            'heading' => esc_html__('Text Font Size','sc-core') ,
            'description' => esc_html__('Enter custom font size for counter text.','sc-core') ,
            'param_name' => 'text_font_size',
            'value' => '' ,
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform','sc-core') ,
            'param_name' => 'text_text_transform',
            'class' => 'text_Text_Transform',
            'description' => esc_html__('Transform the counter text. Example - Uppercase or Lowercase','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'dependency' => array(
                'element' => 'text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'text-class',
            'heading' => esc_html__('Text Top and Bottom Padding','sc-core') ,
            'description' => esc_html__('Enter custom Top and Bottom padding for counter text. Example - 10px','sc-core') ,
            'param_name' => 'text_padding_top',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Padding  ',
            'class' => 'text-class',
            'heading' => esc_html__('Text Left and Right Padding','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding for counter text. Example - 10px','sc-core') ,
            'param_name' => 'text_padding_left',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'text_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'text',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'text-class',
            'heading' => esc_html__('Change text Typography','sc-core') ,
            'param_name' => 'text_google_font_select',
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
                'element' => 'text_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'text-class',
            'heading' => esc_html__('Text Color','sc-core') ,
            'param_name' => 'text_font_color',
            'description' => esc_html__('Change text color of counter text','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'text',
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