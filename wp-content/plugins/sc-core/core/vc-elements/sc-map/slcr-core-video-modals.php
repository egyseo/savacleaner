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
 * Element Description: Slcr Video Modal Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Video Modals','sc-core') ,
    'base' => 'slcr_video_modal',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'video-modal.png',
    'class' => 'vc_icon_content_box',

    // /'content_element' => true,

    'controls' => 'full',
    'show_settings_on_create' => true,

    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Create a video modal with this elememt.','sc-core') ,
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Video Modal Type','sc-core') ,
            'param_name' => 'slcr_video_modal_type',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select a modal trigger type you want to use.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('Play Icon with Thumbnail','sc-core') => 'Default',
                esc_html__('Play Icon with Text','sc-core') => 'onlyicon',
            ) ,
            'save_always' => true,
        ) ,
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('url Type','sc-core') ,
            'param_name' => 'slcr_video_url_type',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select the type of video URL you want to use.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('Youtube Video','sc-core') => 'youtube',
                esc_html__('Vimeo Video','sc-core') => 'vimeo',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Enter video url',
            'class' => 'title-class',
            'heading' => esc_html__('Enter video url','sc-core') ,
            'param_name' => 'slcr_video_url',
            'description' => esc_html__('Enter the URL of your video.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'admin_label' =>false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Button Text','sc-core') ,
            'param_name' => 'title',
            'description' => esc_html__('Enter the text you want to show with play icon.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'slcr_video_modal_type',
                'value' => 'onlyicon',
            ) ,
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'image',
            // 'class' => 'text-class',
            'heading' => esc_html__('Video Thumbnail','sc-core') ,
            'param_name' => 'himg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select a thumbnail image you want to use.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'slcr_video_modal_type',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Effect on Hover','sc-core') ,
            'param_name' => 'slcr_video_icon_animation',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Select an effect on mouseover icon.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('None','sc-core') => 'none',
                esc_html__('Translate','sc-core') => 'translate',
                esc_html__('Enlarge','sc-core') => 'scale',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Color','sc-core') ,
            'param_name' => 'slcr_video_icon_color',
            'description' => esc_html__('Change color of icon.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Background Color','sc-core') ,
            'param_name' => 'slcr_video_icon_bg_color',
            'description' => esc_html__('Change background color of icon button.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Border Color ','sc-core') ,
            'param_name' => 'slcr_video_icon_border_color',
            'description' => esc_html__('Change border color of icon button.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Shadow on hover','sc-core') ,
            'param_name' => 'slcr_video_hover_shadow',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Enables a show on hover play icon.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Image zoom Effect','sc-core') ,
            'param_name' => 'slcr_video_image_effect',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Enable a zoom effect on hover image.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_video_modal_type',
                'value' => 'Default',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Wave Animation','sc-core') ,
            'param_name' => 'slcr_video_button_animation',
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'description' => esc_html__('Enable a animated wave effect around video icon.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Animation Color ','sc-core') ,
            'param_name' => 'slcr_video_icon_animation_color',
            'description' => esc_html__('Change the color of wave.','sc-core') ,
            'edit_field_class' => 'vc_column vc_col-sm-4 crum_vc',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'slcr_video_button_animation',
                'value' => 'true',
            ) ,
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
            'description' => esc_html__('Transform text text. eg( UPPERCASE, lowecase )','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
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
            'heading' => esc_html__('text Padding Top & Bottom','sc-core') ,
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
            'heading' => esc_html__('text Padding Left & Right','sc-core') ,
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
            'heading' => esc_html__('Change text Typography','sc-core') ,
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
            'heading' => esc_html__('text Font Color','sc-core') ,
            'param_name' => 'title_font_color',
            'description' => esc_html__('Change font color for text','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'title',
                'not_empty' => true,
            ) ,
        ) , 
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Play Button Padding','sc-core') ,
            'param_name' => 'video_button_padding',
            'description' => esc_html__('Enter custom padding to change the size of play button.','sc-core') ,
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
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
            'param_name' => 'slcr_img_link_template', 
            'group' => esc_html__('General','sc-core'), 
            'content_element'=>false,
            'admin_label' => false,
        ),
    ) ,
);