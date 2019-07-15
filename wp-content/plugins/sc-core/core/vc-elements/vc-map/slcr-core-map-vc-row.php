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
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
$vc_row_new_params = array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Row stretch','sc-core') ,
        'param_name' => 'full_width',
        'admin_label' => false,
        'value' => array(
            esc_html__('Default','sc-core') => '',
            esc_html__('Stretch row','sc-core') => 'stretch_row',
            esc_html__('Stretch row and content','sc-core') => 'stretch_row_content',
            esc_html__('Stretch row and content (no paddings)','sc-core') => 'stretch_row_content_no_spaces',
        ) ,
        'description' => esc_html__('Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).','sc-core') ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Columns gap','sc-core') ,
        'param_name' => 'gap',
        'value' => array(
            '0px' => '0',
            '1px' => '1',
            '2px' => '2',
            '3px' => '3',
            '4px' => '4',
            '5px' => '5',
            '10px' => '10',
            '15px' => '15',
            '20px' => '20',
            '25px' => '25',
            '30px' => '30',
            '35px' => '35',
        ) ,
        'std' => '0',
        'admin_label' => false,
        'description' => esc_html__('Select gap between columns in row.','sc-core') ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Full height row?','sc-core') ,
        'param_name' => 'full_height',
        'admin_label' => false,
        'description' => esc_html__('If checked row will be set to full height.','sc-core') ,
        'value' => array(
            esc_html__('Yes','sc-core') => 'yes' 
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Columns position','sc-core') ,
        'param_name' => 'columns_placement',
        'value' => array(
            esc_html__('Middle','sc-core') => 'middle',
            esc_html__('Top','sc-core') => 'top',
            esc_html__('Bottom','sc-core') => 'bottom',
            esc_html__('Stretch','sc-core') => 'stretch',
        ) ,
        'description' => esc_html__('Select columns position within row.','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'full_height',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Equal height','sc-core') ,
        'param_name' => 'equal_height',
        'admin_label' => false,
        'description' => esc_html__('If checked columns will be set to equal height.','sc-core') ,
        'value' => array(
            esc_html__('Yes','sc-core') => 'yes'
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Content position','sc-core') ,
        'param_name' => 'content_placement',
        'admin_label' => false,
        'value' => array(
            esc_html__('Default','sc-core') => '',
            esc_html__('Top','sc-core') => 'top',
            esc_html__('Middle','sc-core') => 'middle',
            esc_html__('Bottom','sc-core') => 'bottom',
        ) ,
        'description' => esc_html__('Select content position within columns.','sc-core') ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Use video background?','sc-core') ,
        'param_name' => 'video_bg',
        'admin_label' => false,
        'description' => esc_html__('If checked, video will be used as row background.','sc-core') ,
        'value' => array(
            esc_html__('Yes','sc-core') => 'yes'
        ) ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('YouTube link','sc-core') ,
        'param_name' => 'video_bg_url',
        'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
        'description' => esc_html__('Add YouTube link.','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'video_bg',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Parallax','sc-core') ,
        'param_name' => 'video_bg_parallax',
        'value' => array(
            esc_html__('None','sc-core') => '',
            esc_html__('Simple','sc-core') => 'content-moving',
            esc_html__('With fade','sc-core') => 'content-moving-fade',
        ) ,
        'description' => esc_html__('Add parallax type background for row.','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'video_bg',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Parallax','sc-core') ,
        'param_name' => 'parallax',
        'value' => array(
            esc_html__('None','sc-core') => '',
            esc_html__('Simple','sc-core') => 'content-moving',
            esc_html__('With fade','sc-core') => 'content-moving-fade',
        ) ,
        'description' => esc_html__('Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'video_bg',
            'is_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'attach_image',
        'heading' => esc_html__('Image','sc-core') ,
        'param_name' => 'parallax_image',
        'value' => '',
        'description' => esc_html__('Select image from media library.','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'parallax',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Parallax speed','sc-core') ,
        'param_name' => 'parallax_speed_video',
        'value' => '1.5',
        'admin_label' => false,
        'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','sc-core') ,
        'dependency' => array(
            'element' => 'video_bg_parallax',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Parallax speed','sc-core') ,
        'param_name' => 'parallax_speed_bg',
        'value' => '1.5',
        'admin_label' => false,
        'description' => esc_html__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)','sc-core') ,
        'dependency' => array(
            'element' => 'parallax',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Background Overlay','sc-core') ,
        'description' => esc_html__('Enable color overlay for Image Backgrounds.','sc-core') ,
        'admin_label' => false,
        'param_name' => 'add_overlay',
    ) ,
    array(
        'type' => 'textfield',
        'holder' => 'Overlay Transparency',
        'class' => 'title-class',
        'heading' => esc_html__('Overlay Transparency','sc-core') ,
        'param_name' => 'bg_o_e',
        'description' => esc_html__('Enter opacity value for Background Overlay color. from - (0 to 10)','sc-core') ,
        'value' => '' ,
        'admin_label' => false,
        'weight' => 0,
        'dependency' => array(
            'element' => 'add_overlay',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'colorpicker',
        'class' => 'title-class',
        'heading' => esc_html__('Overlay Color','sc-core') ,
        'param_name' => 'overlay_bg_color',
        'description' => esc_html__('Select a color for Background Overlay and leave empty for Theme Defaults.','sc-core') ,
        'admin_label' => false,
        'dependency' => array(
            'element' => 'add_overlay',
            'not_empty' => true,
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Gradient Bg Color ','sc-core') ,
        'param_name' => 'slcr_row_main_gradient',
        'admin_label' => false,
        'value' => array(
            esc_html__('None','sc-core') => '',
            esc_html__('Gradient Color 1','sc-core') => 'gradient_1',
            esc_html__('Gradient Color 2','sc-core') => 'gradient_2', 
        ) , 
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Content Scheme','sc-core') ,
        'param_name' => 'content_style',
        'class' => 'title-class',
        'description' => esc_html__('Choose a content scheme according to light and dark background.','sc-core') ,
        'admin_label' => false,
        'value' => array(
            esc_html__('Content Light','sc-core') => 'content_dark',
            esc_html__('Content Dark','sc-core') => 'content_light',
        ) ,
        'save_always' => true,
    ) ,
    vc_map_add_css_animation(false) ,
    array(
        'type' => 'el_id',
        'heading' => esc_html__('Row ID','sc-core') ,
        'param_name' => 'el_id',
        'admin_label' => false,
        'description' => sprintf(__('Enter row ID (Note: make sure it is unique and valid according to','sc-core').' <a href="%s" target="_blank">w3c specification</a>).', 'http://www.w3schools.com/tags/att_global_id.asp') ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Disable row','sc-core') ,
        'param_name' => 'disable_element', 
        'admin_label' => false,
        'description' => esc_html__('If checked the row won\'t be visible on the public side of your website. You can switch it back any time.','sc-core') ,
        'value' => array(
            esc_html__('Yes','sc-core') => 'yes'
        ) ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('z index','sc-core') ,
        'param_name' => 'z_index',
        'admin_label' => false,
        'description' => esc_html__('Enter custom Z index.','sc-core') ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Extra class name','sc-core') ,
        'param_name' => 'el_class',
        'admin_label' => false,
        'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
    ) ,
    array(
        'type' => 'css_editor',
        'heading' => esc_html__('CSS box','sc-core') ,
        'param_name' => 'css',
        'admin_label' => false,
        'group' => esc_html__('Design Options','sc-core') ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Enable Row Curve','sc-core') ,
        'param_name' => 'slcr_enable_row_curve',
        'group' => esc_html__('Row Curve','sc-core'),
        'admin_label' => false,
        'value' => array(
            'Yes' => 'Yes',
        ) ,
    ) ,
    array(
        'type' => 'radio_image_box',
        'heading' => esc_html__('Row Curve Type','sc-core') ,
        'param_name' => 'slcr_type_row_curve',
        'options' => array( 
            'Round_left'            => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/curve-left.svg',
            'Round_right'           => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/curve-right.svg',
            'Curve_round_opposite'  => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/curve-round-opposite.svg',
            'Round'                 => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/curve-round.svg',
            'Tilt_both_round'       => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/tilt-both-round.svg',
            'Tilt_both'             => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/tilt-both.svg',
            'Tilt'                  => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/tilt-left.svg',
            'Tilt_right'            => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/tilt-right.svg',
            'Wave_sm_left'          => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-sm-left.svg',
            'Wave_sm_right'         => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-sm-right.svg',
            'Waves_lg_left'         => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-lg-left.svg',
            'Waves_lg_right'        => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-lg-right.svg',
            'Waves_md_left'         => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-md-left.svg',
            'Waves_md_right'        => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-md-right.svg',
            'Waves_multiple_left'   => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-multi-left.svg',
            'Waves_multiple_right'  => SLCR_CORE_VC_ELEMENT_ICON_URI . 'row-thumbs/waves-multi-right.svg', 
        ) , 
        'admin_label' => false,
        'description' => esc_html__('Select Row Curve Type.','sc-core') ,
        'group' => esc_html__('Row Curve','sc-core'),
        'dependency' => array(
            'element' => 'slcr_enable_row_curve',
            'value' => 'Yes',
        ) ,
    ) , 
    array(
        'type' => 'colorpicker',
        'class' => 'title-class',
        'heading' => esc_html__('Row Curve Background Color','sc-core') ,
        'param_name' => 'slcr_type_row_curve_color',
        'description' => esc_html__('Change color of Row Curve Background.','sc-core') ,
        'group' => esc_html__('Row Curve','sc-core'),
        'admin_label' => false,
        'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
        'dependency' => array(
            'element' => 'slcr_enable_row_curve',
            'value' => 'Yes',
        ) ,
    ) ,
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Row Curve Position','sc-core') ,
        'param_name' => 'slcr_type_row_curve_position',
        'value' => array(
            esc_html__('Top','sc-core') => 'Top',
            esc_html__('Bottom','sc-core') => 'Bottom', 
        ) ,
        'std' => 'Bottom',
        'admin_label' => false,
        'description' => esc_html__('Select Row Curve Position.','sc-core') ,
        'group' => esc_html__('Row Curve','sc-core'),
        'dependency' => array(
            'element' => 'slcr_enable_row_curve',
            'value' => 'Yes',
        ) ,
    ) ,
    array(
        'type' => 'textfield', 
        'class' => 'title-class',
        'heading' => esc_html__('Row Curve Height','sc-core') ,
        'description' => esc_html__('Enter Height of Row Curve . Example - 200px','sc-core') ,
        'param_name' => 'slcr_type_row_curve_height', 
        'admin_label' => false,
        'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
        'weight' => 0,
        'group' => esc_html__('Row Curve','sc-core'),
        'dependency' => array(
            'element' => 'slcr_enable_row_curve',
            'value' => 'Yes',
        ) ,
    ) ,
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Row Curve Animation','sc-core') ,
        'param_name' => 'slcr_row_curve_animation',
        'group' => esc_html__('Row Curve','sc-core'),
        'admin_label' => false,
        'value' => array(
            esc_html__('Yes','sc-core') => 'Yes',
        ) ,
        'dependency' => array(
            'element' => 'slcr_enable_row_curve',
            'value' => 'Yes',
        ) ,
    ) ,
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
        'param_name' => 'slcr_img_link_template',  
        'content_element'=>false,
    ),
);
vc_add_params('vc_row', $vc_row_new_params);