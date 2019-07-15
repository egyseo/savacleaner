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
 * Element Description: VC Slcr Hotspot Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Hotspot','sc-core') ,
    'base' => 'slcr_hotspot',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'image-spot.png',
    'class' => 'vc_icon_content_box',
    'as_child' => array(
        'only' => 'slcr_image_hotspot'
    ) ,
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add Hotspot Points on Image.','sc-core') ,
    'params' => array(
         array(
            'type' => 'text',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Mark Hotspot Position','sc-core') ,
            'param_name' => 'simple_heading',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_hotspot vc_col-sm-12 crum_vc',
            'description' => esc_html__('Select the positions "Top" & "Left", where you want to show the hostpot point.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Top to Bottom','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'param_name' => 'hotspot_top',
            'admin_label' => false,
            'description' => __('Enter a value in % where you want to show the point.','sc-core').'<br/>'.__(' Example - 60% ("The point will be marked at 60% away from the top side of the Image.")','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Left to Right','sc-core') ,
            'param_name' => 'hotspot_left',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'description' => __('Enter a value in % where you want to show the point.','sc-core').'<br/>'.__(' Example - 45% ("The point will be marked at 45% away from the left side of the Image.")','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Box position','sc-core') ,
            'param_name' => 'hotspot_post',
            'class' => 'Title_Text_Transform',
            'admin_label' => false,
            'description' => esc_html__('Select a position where you want to open the Information block.','sc-core') ,
            'group' => esc_html__('Information Box','sc-core'),
            'value' => array(
                esc_html__('Top ','sc-core') => 'top',
                esc_html__('Bottom ','sc-core') => 'bottom',
                esc_html__('Right ','sc-core') => 'right',
                esc_html__('Left ','sc-core') => 'left',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon or Text?','sc-core') ,
            'param_name' => 'add_icon',
            'admin_label' => false,
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select Icon if you want to show an icon inside hotspot point or select Text to show a letter or number.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'value' => array(
                esc_html__('Icon ','sc-core') => 'true',
                esc_html__('Text ','sc-core') => 'text',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Enter Hotspot point Text',
            'class' => 'title-class',
            'heading' => esc_html__('Hotspot Point Text','sc-core') ,
            'param_name' => 'hotspot_point_text',
            'description' => esc_html__('Enter a single Alphabet or Number. Example - 1 or 2 or 3','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-12 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'text',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon library','sc-core') ,
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
            'param_name' => 'i_type',
            'admin_label' => false,
            'description' => esc_html__('Select icon library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
            ) ,
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
                'element' => 'i_type',
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
                'element' => 'i_type',
                'value' => 'openiconic',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_typicons',
            'value' => 'typcn typcn-adjust-brightness',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'typicons',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_entypo',
            'value' => 'entypo-icon entypo-icon-note',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'entypo',
            ) ,
            'group' => esc_html__('General','sc-core'),
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
                // default true, display an 'EMPTY' icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'i_type',
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
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'monosocial',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_material',
            'value' => 'vc-material vc-material-cake',
            'admin_label' => false,
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an 'EMPTY' icon?
                'type' => 'material',
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display
            ) ,
            'dependency' => array(
                'element' => 'i_type',
                'value' => 'material',
            ) ,
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
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
                'element' => 'i_type',
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
            'description' => esc_html__('Enter custom size for icon. Example - 20px','sc-core') ,
            'param_name' => 'icon_font_size',
            'value' => '' ,
            'edit_field_class' => 'vc_column vc_col-sm-12 crum_vc',
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
            'class' => 'title-class',
            'admin_label' => false,
            'heading' => esc_html__('Hotspot icon or text color','sc-core') ,
            'param_name' => 'hotspot_icon_text_color',
            'description' => esc_html__('Use custom color for Hotspot Point Icon and Hotspot Point Text','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'admin_label' => false,
            'heading' => esc_html__('Hotspot Point Background','sc-core') ,
            'param_name' => 'hotspot_point_color',
            'description' => esc_html__('Change the background color of Hotspot Point.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Enter Box Title',
            'class' => 'title-class',
            'heading' => esc_html__('Heading','sc-core') ,
            'param_name' => 'title',
            'edit_field_class' => 'vc_column vc_col-sm-12 crum_vc',
            'value' => '' ,
            'description' => esc_html__( 'Enter Heading to display in the information box.','sc-core'),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Information Box','sc-core'),
        ) ,
        array(
            'type' => 'textarea',
            'holder' => 'Enter Box disc',
            'class' => 'text-class',
            'heading' => esc_html__('Description','sc-core') ,
            'param_name' => 'desc',
            'edit_field_class' => 'vc_column vc_col-sm-12 crum_vc',
            'value' => '' ,
            'description' => esc_html__( 'Enter description to display in the information box.','sc-core'),
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Information Box','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Heading Text color','sc-core') ,
            'param_name' => 'title_text_color',
            'description' => esc_html__('Use the custom color for heading.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('Information Box','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Desc Text Color','sc-core') ,
            'param_name' => 'desc_text_color',
            'admin_label' => false,
            'description' => esc_html__('Use the custom color for description.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('Information Box','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Box Background Color','sc-core') ,
            'param_name' => 'hotspot_box_bg_color',
            'admin_label' => false,
            'description' => esc_html__('Change the background color of box.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('Information Box','sc-core'),
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
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
            'description' =>esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
            'group'       => esc_html__('General','sc-core'),
        ) ,
    ) ,
);