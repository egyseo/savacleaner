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
 * Element Description: Slcr Radial Data Mapping
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Map the block with vc_map()
return array(
    'name' => esc_html__('Radial Progress','sc-core') ,
    'base' => 'slcr_radial',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Insert radial progress bars.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'radial.png',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Select Type','sc-core') ,
            'param_name' => 'radial_type',
            'class' => 'title-class',
            'value' => array(
                esc_html__('Percentage inside radial','sc-core') => 'percentage',
                esc_html__('Text inside radial','sc-core') => 'text',
                esc_html__('Icon inside radial','sc-core') => 'icon',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'description' => esc_html__('Select Percentage to shoe %, Text to show or Icon to show icon inside radial bar.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => '',
            'class' => 'count-class',
            'heading' => esc_html__('Radial Text','sc-core') ,
            'description' => esc_html__('Enter the text you want to show inside the radial bar.','sc-core') ,
            'param_name' => 'typed_text_front_text',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'radial_type',
                'value' => array( 
                    'text'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => '',
            'class' => 'count-class',
            'heading' => esc_html__('Radial value','sc-core') ,
            'description' => esc_html__('Enter the value to fill radial bar. Example - 50, 80 or 90 ','sc-core') ,
            'param_name' => 'front_progress_value',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'), 
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Radial Text Size','sc-core') ,
            'description' => esc_html__('Change the font size for radial text. Example - 10px','sc-core') ,
            'param_name' => 'front_text_font_size',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'radial_type',
                'value' => array(
                    'percentage',
                    'text'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Radial Text Transform','sc-core') ,
            'param_name' => 'front_text_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform the Radial Text. Example - UPPERCASE or lowercase','sc-core') ,
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
                'element' => 'radial_type',
                'value' => array(
                    'percentage',
                    'text'
                ) ,
            ) ,
        ) ,
        
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Radial Text Color','sc-core') ,
            'param_name' => 'front_text_font_color',
            'description' => esc_html__('Change the font color of radial text','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'radial_type',
                'value' => array(
                    'percentage',
                    'text'
                ) ,
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
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'radial_type',
                'value' => array(
                    'percentage',
                    'text'
                ) ,
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
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Radial Bar Color','sc-core') ,
            'param_name' => 'front_progress_color',
            'description' => esc_html__('Change the fill color for radial bar.','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Radial Track Color','sc-core') ,
            'param_name' => 'front_progress_track_color',
            'description' => esc_html__('Change the empty track color for radial bar.','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('cIcon library','sc-core') ,
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
                'element' => 'radial_type',
                'value' => 'icon',
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_fontawesome',
            'value' => 'fa fa-adjust',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_openiconic',
            'value' => 'vc-oi vc-oi-dial',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_typicons',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_entypo',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_linecons',
            'value' => 'vc_li vc_li-heart',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'description' => esc_html__('Select icon from library.','sc-core') ,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_monosocial',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_material',
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
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'sc-core' ),
            'param_name' => 'i_icon_flaticon',
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
            'group' => esc_html__('General','sc-core'),
        ),
        array(
            'type' => 'textfield',
            'holder' => 'icon Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Size','sc-core') ,
            'description' => esc_html__('Change the size of icon. Example - 20px ','sc-core') ,
            'param_name' => 'icon_font_size',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'radial_type',
                'value' => 'icon',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('icon Font Color','sc-core') ,
            'param_name' => 'count_icon_font_color',
            'description' => esc_html__('Change font color for count icon ','sc-core'),
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'radial_type',
                'value' => 'icon',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Use Scale','sc-core') ,
            'param_name' => 'use_scale',
            'description' => esc_html__('Enable this option to show scales around radial bar.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Scale Color','sc-core') ,
            'param_name' => 'scale_color',
            'description' => esc_html__('Change the color of scales.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'use_scale',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Scale Size','sc-core') ,
            'description' => esc_html__('Change the length of scales.','sc-core') ,
            'param_name' => 'scale_length',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'dependency' => array(
                'element' => 'use_scale',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Radial Size','sc-core') ,
            'description' => esc_html__('Enter size value to change height and width of radial. Example - 100 ( Do not add "px" )','sc-core') ,
            'param_name' => 'radial_size',
            'value' => '',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Bar Width','sc-core') ,
            'description' => esc_html__('Change the width of bar and track. Example - 15 ( Do not add "px" )','sc-core') ,
            'param_name' => 'radial_line_width',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Bar Edge Shape','sc-core') ,
            'param_name' => 'radial_line_cap',
            'description' => esc_html__('Change the shape of both edges of filling bar.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'class' => 'title-class',
            'value' => array(
                esc_html__('Round','sc-core') => 'round',
                esc_html__('Square','sc-core') => 'square',
            ) ,
            'save_always' => true,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Fill Speed','sc-core') ,
            'description' => esc_html__('Enter a duration to run fill animation. Example - 2000 ( for 2 seconds )','sc-core') ,
            'param_name' => 'radial_animation',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Rotate Radial','sc-core') ,
            'description' => esc_html__('Rotate the whole radial bar from 0 to 360 deg. Example - 90','sc-core') ,
            'param_name' => 'radial_angle',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
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