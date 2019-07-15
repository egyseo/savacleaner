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
 * Element Description: Slcr Text Links Data Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
// Map the block with vc_map()
return array(
    'name' => esc_html__('Text Links','sc-core') ,
    'base' => 'slcr_text_links',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Simple text link with custom options.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'text-link.png',
    'params' => array(
        array(
            'type' => 'vc_link',
            'class' => 'custom_heading_element_link',
            'heading' => esc_html__('URL (Link)','sc-core') ,
            'param_name' => 'typed_text_front_text',
            'description' => esc_html__('Select URL and enter text.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('link Align','sc-core') ,
            'param_name' => 'typed_text_front_text_link_align',
            'class' => 'title-class',
            'description' => esc_html__('Adjust link Align','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('Inline','sc-core') => 'inline',
                esc_html__('Left','sc-core') => 'left',
                esc_html__('Right','sc-core') => 'right',
                esc_html__('Center','sc-core') => 'center',
            ) , 
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Link Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Font Size','sc-core') ,
            'description' => esc_html__('Enter custom for the link title. Example - 15px','sc-core') ,
            'param_name' => 'front_text_font_size',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform ','sc-core') ,
            'param_name' => 'front_text_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform the link title. Example - UPPERCASE or lowercase','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Link  text Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Padding Top and Bottom','sc-core') ,
            'description' => esc_html__('Enter custom Top and Bottom padding around text. Example - 10px','sc-core') ,
            'param_name' => 'front_text_padding_top',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Link text Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Padding Left and Right','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding around the text. Example - 10px','sc-core') ,
            'param_name' => 'front_text_padding_left',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Text Color','sc-core') ,
            'param_name' => 'front_text_font_color',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change font color for  Link text','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
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
            'type' => 'checkbox',
            'heading' => esc_html__('Add icon?','sc-core') ,
            'param_name' => 'add_icon',
            'description' => esc_html__('Add an Icon before or afte the link.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
        ) , 
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('On Hover ','sc-core') ,
            'param_name' => 'front_text_on_hover',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select what you want to do on mouseover link.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'value' => array(
                esc_html__('Nothing','sc-core') => 'none',
                esc_html__('Simple Border','sc-core') => 'border',
                esc_html__('Underline','sc-core') => 'underline',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Alignment','sc-core') ,
            'description' => esc_html__('Select an option where you want to show the icon.','sc-core') ,
            'param_name' => 'i_align',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => array(
                esc_html__('Before Link','sc-core') => 'left',
                esc_html__('After Link','sc-core') => 'right',
            ) ,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('cIcon library','sc-core') ,
            'admin_label' => false,
            'param_name' => 'citype',
            'description' => esc_html__('Select icon library.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
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
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'textfield',
            'holder' => 'icon Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Size','sc-core') ,
            'description' => esc_html__('Change the size of the icon. Example - 20px','sc-core') ,
            'param_name' => 'icon_font_size',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Icon  Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Padding Left and Right','sc-core') ,
            'description' => esc_html__('Enter custom Left and Right padding around the icon. Example - 10px','sc-core') ,
            'param_name' => 'icon_padding_left',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Icon Color','sc-core') ,
            'param_name' => 'count_icon_font_color',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Change the color of the icon.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Hover Movement','sc-core') ,
            'param_name' => 'hover_effect',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => esc_html__('Enable the movement of icon on mouseover the link.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
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