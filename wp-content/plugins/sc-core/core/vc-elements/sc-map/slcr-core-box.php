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
 * Element Description: VC Slcr Box Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
 
return array(
    'name' => esc_html__('Box','sc-core') ,
    'base' => 'slcr_box',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'box.png',
    'class' => 'vc_icon_content_box',
    'as_parent' => array(
        'except' => 'slcr_box'
    ) ,
    // 'as_parent' => '',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Content box with tons of options.','sc-core') ,
    'js_view' => 'VcColumnView',
    'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
    'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Box Type','sc-core') ,
            'param_name' => 'box_type',
            'admin_label' => false,
            'value' => array(
                esc_html__('Simple Box','sc-core') => 'simple',
                esc_html__('Flip Box','sc-core') => 'flip_box',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Style ','sc-core') ,
            'param_name' => 'backgrounds_type',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Select the background options you want to use.','sc-core') ,
            'value' => array(
                esc_html__('Solid Color','sc-core') => 'background_solid',
                esc_html__('Image Background','sc-core') => 'background_Image',
                esc_html__('Gradient Background','sc-core') => 'background_gradient',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'class' => 'title-class',
            'heading' => esc_html__('Gradient Background Color Selection','sc-core') ,
            'param_name' => 'box_background_gradient_color',
            'admin_label' => false,
            'description' => esc_html__('Select manual Gradient color for the background of Box.','sc-core') ,
            'value' => array(
                esc_html__('None','sc-core') => '',
                esc_html__('Gradient Color 1','sc-core') => 'gradient_1',
                esc_html__('Gradient Color 2','sc-core') => 'gradient_2', 
            ) ,
            'dependency' => array(
                'element' => 'backgrounds_type',
                'value' => array(
                    'background_gradient'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Scheme','sc-core') ,
            'param_name' => 'backgrounds_style',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Content schemes allows you to adjust Elements colors according to Dark or Light backgrounds.','sc-core') ,
            'value' => array(
                esc_html__('Theme Default','sc-core') => 'background_solid',
                esc_html__('Dark Content','sc-core') => 'background_light',
                esc_html__('Light Content','sc-core') => 'background_dark',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Background Color Selection','sc-core') ,
            'param_name' => 'box_bg_color',
            'admin_label' => false,
            'description' => esc_html__('Select manual color for the background of Box.','sc-core') ,
            'dependency' => array(
                'element' => 'backgrounds_type',
                'value' => array(
                    'background_solid'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'bg img',
            // 'class' => 'text-class',
            'heading' => esc_html__('Image','sc-core') ,
            'param_name' => 'bgimg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select Backgrounds Image  ','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'backgrounds_type',
                'value' => array(
                    'background_Image'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Background Overlay','sc-core') ,
            'admin_label' => false,
            'description' =>__('Add overlay color on Image Backgrounds.','sc-core'),
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
            'admin_label' => false,
            'description' => esc_html__('Select a color for Background Overlay and leave empty for Theme Defaults.','sc-core') ,
            'dependency' => array(
                'element' => 'add_overlay',
                'not_empty' => true,
            ) ,
        ) ,

        array(
            'type' => 'textfield',
            'heading' => esc_html__('Flip Box Height','sc-core') ,
            'param_name' => 'back_flip_type_hight',
            'admin_label' => false,
            'description' => esc_html__('Enter Flip Box Height.','sc-core') ,
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'flip_box'
                ) ,
            ),
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Background Style','sc-core') ,
            'param_name' => 'back_backgrounds_type',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Select a Background type for back side of Flip Box.','sc-core') ,
            'value' => array(
                esc_html__('Solid Color','sc-core') => 'background_solid',
                esc_html__('Image Background','sc-core') => 'background_Image',
                esc_html__('Gradient Background','sc-core') => 'background_gradient',
            ) ,
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'flip_box'
                ) ,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'dropdown',
            'class' => 'title-class',
            'heading' => esc_html__('Gradient Background Color Selection','sc-core') ,
            'param_name' => 'back_box_background_gradient_color',
            'admin_label' => false,
            'description' => esc_html__('Select manual Gradient color for the background of Box.','sc-core') ,
            'value' => array(
                esc_html__('None','sc-core') => '',
                esc_html__('Gradient Color 1','sc-core') => 'gradient_1',
                esc_html__('Gradient Color 2','sc-core') => 'gradient_2', 
            ) ,
            'dependency' => array(
                'element' => 'back_backgrounds_type',
                'value' => array(
                    'background_gradient'
                ) ,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Scheme','sc-core') ,
            'param_name' => 'back_backgrounds_style',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Content schemes allows you to adjust Elements colors according to Dark or Light backgrounds.','sc-core') ,
            'value' => array(
                esc_html__('Theme Default','sc-core') => 'background_solid',
                esc_html__('Dark Content','sc-core') => 'background_light',
                esc_html__('Light Content','sc-core') => 'background_dark',
            ) ,
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'flip_box'
                ) ,
            ) ,
            'save_always' => true,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Background Color Selection For Back Side','sc-core') ,
            'param_name' => 'back_box_bg_color',
            'admin_label' => false,
            'description' => esc_html__('Select manual color for the Background of Back Side.','sc-core') ,
            'dependency' => array(
                'element' => 'back_backgrounds_type',
                'value' => array(
                    'background_solid'
                ) ,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'bg img',
            // 'class' => 'text-class',
            'heading' => esc_html__('Back Image','sc-core') ,
            'param_name' => 'back_bgimg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select Backgrounds Image  ','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'back_backgrounds_type',
                'value' => array(
                    'background_Image'
                ) ,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Enable Background Overlay','sc-core') ,
            'param_name' => 'back_add_overlay',
            'admin_label' => false,
            'description' => esc_html__('Add overlay color on Image Backgrounds.','sc-core') ,
            'dependency' => array(
                'element' => 'back_backgrounds_type',
                'value' => array(
                    'background_Image'
                ) ,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Overlay Transparency',
            'class' => 'title-class',
            'heading' => esc_html__('Back Overlay Transparency','sc-core') ,
            'param_name' => 'back_bg_o_e',
            'description' => esc_html__('Enter opacity value for Background Overlay color. from - (0 to 10)','sc-core') ,
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'back_add_overlay',
                'not_empty' => true,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Overlay Color','sc-core') ,
            'param_name' => 'back_overlay_bg_color',
            'description' => esc_html__('Select a color for Background Overlay and leave empty for Theme Defaults.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'back_add_overlay',
                'not_empty' => true,
            ) ,
            'group' => esc_html__('Back Options','sc-core') ,
        ) ,
        array(
            'type' => 'textarea_raw_html',
            'class' => '',
            'heading' => esc_html__('Back HTML','sc-core') ,
            'param_name' => 'back_html',
            'value' => '',
            'description' => esc_html__('Enter Back html.','sc-core') ,
            'group' => esc_html__('Back Options','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'flip_box'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'vc_link',
            'class' => 'title-class',
            'heading' => esc_html__(' Link ','sc-core') ,
            'param_name' => 'link',
            'description' => esc_html__('Add link to Box  ','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'simple'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Content Align','sc-core') ,
            'param_name' => 'text_float',
            'class' => 'Text_float',
            'admin_label' => false,
            'description' => esc_html__('Adjust the alignment of the content.','sc-core') ,
            'value' => array(
                esc_html__('Align Left','sc-core') => 'left',
                esc_html__('Align Right','sc-core') => 'right',
                esc_html__('Align Center','sc-core') => 'center',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Box Shadow','sc-core') ,
            'param_name' => 'box_shadow',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Select Shadow type for box. For Simple Border selection, Select from Design Options tab. ','sc-core') ,
            'value' => array(
                esc_html__('Simple Border','sc-core') => 'without_shadow',
                esc_html__('Small Depth Shadow','sc-core') => 'small_shadow',
                esc_html__('Large Depth Shadow','sc-core') => 'large_shadow',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Hover Shadow Effect','sc-core') ,
            'param_name' => 'box_shadow_style',
            'class' => 'title-class',
            'admin_label' => false,
            'description' => esc_html__('Select the visibility options for showing the Shadow for Box.','sc-core') ,
            'value' => array(
                esc_html__('False','sc-core') => 'simple_shadow',
                esc_html__('True','sc-core') => 'Hover_shadow',
            ) ,
            'save_always' => true,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('TILT EFFECTS ON BOX HOVER','sc-core') ,
            'description' => esc_html__('Enable tilt effect on hover.','sc-core') ,
            'param_name' => 'tilt_effects_box',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'simple'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Glare Effect','sc-core') ,
            'description' => esc_html__('Enable beautiful glass effect on hover.','sc-core') ,
            'param_name' => 'glare_effect',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'simple'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Box Rounded','sc-core') ,
            'description' => esc_html__('Make the box rounded from corners.','sc-core') ,
            'param_name' => 'box_rounded',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('3D Hover','sc-core') ,
            'description' => esc_html__('Enable 3d effect on hover.','sc-core') ,
            'param_name' => 'hover_3d',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'simple'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('3D Effect Sense','sc-core') ,
            'param_name' => 'hover_3d_transform',
            'description' => esc_html__('Enter a value to increase or decrease 3D effect. Higher the value, more the effective. eg - 40px','sc-core' ) ,
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'hover_3d',
                'not_empty' => true,
            ) ,
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
        array(
            'type' => 'animation_style',
            'heading' => esc_html__('CSS Animation','sc-core') ,
            'param_name' => 'css_animation',
            'admin_label' => false,
            'value' => '',
            'settings' => array(
                'type' => 'in',
                'custom' => array(
                    'label' => 'Default',
                    'value' => array(
                        esc_html__('Top to bottom','sc-core') => 'top-to-bottom',
                        esc_html__('Bottom to top','sc-core') => 'bottom-to-top',
                        esc_html__('Left to right','sc-core') => 'left-to-right',
                        esc_html__('Right to left','sc-core') => 'right-to-left',
                        esc_html__('Appear from center','sc-core') => 'appear',
                        esc_html__('Right','sc-core') => 'right',
                    ) ,
                ) ,
            ) ,
            'description' => __('Select type of animation for element to be animated when it \"enters\" the browsers viewport (Note: works only in modern browsers).','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
        'type' => 'textfield',
        'heading' => esc_html__('z index','sc-core') ,
        'param_name' => 'z_index',
        'admin_label' => false,
        'description' => esc_html__('Enter custom Z index.','sc-core') ,
        'dependency' => array(
                'element' => 'box_type',
                'value' => array(
                    'simple'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
            'param_name' => 'slcr_img_link_template',   
            'content_element'=>false,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'External Back Image link for Template ','sc-core' ),  
            'param_name' => 'slcr_img_link_template2',   
            'content_element'=>false,
        ),
    ) ,
);