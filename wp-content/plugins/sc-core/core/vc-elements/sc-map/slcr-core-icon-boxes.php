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
 * Element Description: Slcr Icon Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Simple Icon','sc-core') ,
    'base' => 'slcr_icon',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'simple-icon.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add simple image or font icon.','sc-core') ,
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Type','sc-core') ,
            'param_name' => 'slcr_icon',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select the type of icon you want to use.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => array(
                esc_html__('Simple Font Icon','sc-core') => 'Default',
                esc_html__('Image Icon','sc-core') => 'image_icon',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Alignment','sc-core') ,
            'description' => esc_html__('Select the position to align the icon.','sc-core') ,
            'param_name' => 'i_align',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc padding-custom',
            'admin_label' => false,
            'value' => array(
                esc_html__('Left','sc-core') => 'left',
                esc_html__('Center','sc-core') => 'center',
                esc_html__('Right','sc-core') => 'right',
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'type' => 'vc_link',
            'class' => 'slcr_icon_element_link',
            'heading' => esc_html__('URL (Link)','sc-core') ,
            'param_name' => 'slcr_icon_element_link',
            'description' => esc_html__('Select URL','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Select Icon','sc-core') ,
            'param_name' => 'add_icon',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
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
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'fontawesome',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
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
                // default true, display an 'EMPTY' icon?
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
                // default true, display an 'EMPTY' icon?
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
                // default true, display an 'EMPTY' icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'entypo',
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_linecons',
            'admin_label' => false,
            'value' => 'vc_li vc_li-heart',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'linecons',
            ) ,
            'group' => esc_html__('General','sc-core'),
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
                // default true, display an 'EMPTY' icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'monosocial',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_material',
            'value' => 'vc-material vc-material-cake',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'material',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'citype',
                'value' => 'material',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
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
            'heading' => esc_html__('Icon Font Size','sc-core') ,
            'description' => esc_html__('Enter custom font size for the icon. Example - 50px','sc-core') ,
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
            'class' => 'title-class',
            'heading' => esc_html__('Container Size','sc-core') ,
            'param_name' => 'slcr_icon_height_width',
            'description' => esc_html__('Enter custom size for icon container to adjust size. Example - 80px','sc-core') ,
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
            'type' => 'dropdown',
            'heading' => esc_html__('Background Color Type','sc-core') ,
            'param_name' => 'slcr_background_color_type',
            'admin_label' => false,
            'value' => array(
                esc_html__('Color','sc-core') => 'color',
                esc_html__('Gradient','sc-core') => 'gradient', 
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Bar Gradient Color ','sc-core') ,
            'param_name' => 'slcr_icon_font_color_gradient',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'admin_label' => false,
            'value' => array(  
                esc_html__('Gradient Color 1','sc-core') => 'icon--gradient-1',
                esc_html__('Gradient Color 2','sc-core') => 'icon--gradient-2', 
            ) ,  
            'dependency' => array(
                'element' => 'slcr_background_color_type',
                'value' => 'gradient',
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Icon Color','sc-core') ,
            'param_name' => 'slcr_icon_font_color',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Change color of the icon font.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
            'dependency' => array(
                'element' => 'slcr_background_color_type',
                'value' => 'color',
            ) ,
        ) , 
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Background Color','sc-core') ,
            'param_name' => 'slcr_icon_bg_color',
            'description' => esc_html__('Change background color of icon container','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Border Color','sc-core') ,
            'param_name' => 'slcr_icon_border_color',
            'description' => esc_html__('Change border color of icon container','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'count-class',
            'heading' => esc_html__('Hover Icon Color','sc-core') ,
            'param_name' => 'slcr_hover_icon_font_color',
            'description' => esc_html__('Change icon font color on hover.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Hover Background Color','sc-core') ,
            'param_name' => 'slcr_hover_icon_bg_color',
            'description' => esc_html__('Change background color of icon container on hover.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Hover Border Color ','sc-core') ,
            'param_name' => 'slcr_hover_icon_border_color',
            'description' => esc_html__('Change background color of icon container on hover.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
            ) , 
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'image',
            // 'class' => 'text-class',
            'heading' => esc_html__('Icon Image','sc-core') ,
            'param_name' => 'himg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select an icon from media library.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'image_icon',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Size','sc-core') ,
            'param_name' => 'slcr_icon_image_width',
            'description' => esc_html__('Enter custom icon size. Example - 60px','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'image_icon',
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Border Radius','sc-core') ,
            'param_name' => 'slcr_icon_image_bradius',
            'description' => esc_html__('Use border radius to make image rounded- Example - 100px or 50%','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'image_icon',
            ) ,
        ) , 
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Icon Shadow','sc-core') ,
            'param_name' => 'add_icon_shadow',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_icon',
                'value' => 'Default',
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
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
            'param_name' => 'slcr_img_link_template',  
            'group' => esc_html__('General','sc-core'),
            'content_element'=>false,
        ),
    ) ,
); 