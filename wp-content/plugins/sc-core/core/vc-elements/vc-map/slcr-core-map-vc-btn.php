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
// Add Params
return array(
    'name' => esc_html__( 'Button','sc-core' ),
    'base' => 'vc_btn',
    'icon' => 'icon-wpb-ui-button',
    'category' => array(
        esc_html__( 'Content','sc-core' ),
    ),
    'description' => esc_html__( 'Eye catching button','sc-core' ),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Text','sc-core' ),
            'param_name' => 'title',
            // fully compatible to btn1 and btn2
            'value' => esc_html__( 'Text on the button','sc-core' ),
        ),
        array(
            'type' => 'vc_link',
            'heading' => esc_html__('URL (Link)','sc-core') ,
            'param_name' => 'link',
            'description' => esc_html__('Add link to button.','sc-core') , 
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',  
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Type','sc-core') ,
            'description' => esc_html__('Select button display Type.','sc-core') ,
            'param_name' => 'btype',
            'admin_label' => false,
            // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
            'value' => array(
                esc_html__('Default vc','sc-core') => 'Default',
                esc_html__('SC Button','sc-core') => 'slcr',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Select Button style','sc-core') ,
            'param_name' => 'button_type',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Button Default','sc-core') => 'Button_Default',
                esc_html__('Button Ghost','sc-core') => 'Button_Ghost',
                esc_html__('Hover Icon','sc-core') => 'Hover_Icon',
                esc_html__('Button Fill','sc-core') => 'Button_Fill', 
                esc_html__('Simple Icon','sc-core') => 'Custom_Icon',
                esc_html__('Background Inverse','sc-core') => 'Background_Inverse',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select style of Button ( Other Input Fields will automatically open and close according to your selections )','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Fill Animation','sc-core') ,
            'param_name' => 'button_fill_animation',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Left to Right','sc-core') => 'l-to-r',
                esc_html__('Right to Left','sc-core') => 'r-to-l',
                esc_html__('Top to Bottom','sc-core') => 't-to-b',
                esc_html__('Bottom to Top','sc-core') => 'b-to-t',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Button Fill Animation ','sc-core') ,
            'dependency' => array(
                'element' => 'button_type',
                'value' => array(
                    'Button_Fill',
                    'Hover_Icon_Fill'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Size','sc-core') ,
            'param_name' => 'button_size',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Button X Large','sc-core') => 'btn--xl',
                esc_html__('Button Large','sc-core') => 'btn--lg',
                esc_html__('Button Medium','sc-core') => 'btn--md',
                esc_html__('Button Small','sc-core') => 'btn--sm',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Size of Button ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Shapes','sc-core') ,
            'param_name' => 'button_shapes',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Pill Shaped','sc-core') => 'btn--pill',
                esc_html__('Square Borders','sc-core') => 'btn--square',
                esc_html__('Rounded Borders','sc-core') => 'btn--rounded',
                esc_html__('Border Transform','sc-core') => 'btn--border-tr',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Shapes of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Hover Styles','sc-core') ,
            'param_name' => 'button_hover_styles',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Hover Default','sc-core') => '',
                esc_html__('Hover Translate','sc-core') => 'btn-translate',
                esc_html__('Hover Shadow','sc-core') => 'btn-shadow',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Hover Styles of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Colors','sc-core') ,
            'param_name' => 'button_colors',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('Primary Color','sc-core') => 'btn--primary',
                esc_html__('Secondary Color','sc-core') => 'btn--secondary',
                esc_html__('Dark Color','sc-core') => 'btn--dark',
                esc_html__('Color Green','sc-core') => 'btn--green',
                esc_html__('Color Orange','sc-core') => 'btn--orange',
                esc_html__('Color Blue','sc-core') => 'btn--blue',
                esc_html__('Gradient Color 1','sc-core') => 'btn--gradient btn--gradient-1',
                esc_html__('Gradient Color 2','sc-core') => 'btn--gradient btn--gradient-2',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Colors of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weights','sc-core') ,
            'param_name' => 'button_font_weights',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('font-400','sc-core') => 'font-400',
                esc_html__('font-100','sc-core') => 'font-100',
                esc_html__('font-300','sc-core') => 'font-300',
                esc_html__('font-500','sc-core') => 'font-500',
                esc_html__('font-600','sc-core') => 'font-600',
                esc_html__('font-700','sc-core') => 'font-700',
                esc_html__('font-800','sc-core') => 'font-800',
                esc_html__('font-900','sc-core') => 'font-900',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Font Weights of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Border Size','sc-core') ,
            'param_name' => 'button_border_size',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('No Border ','sc-core') => '',
                esc_html__('Border 1px','sc-core') => 'border-1',
                esc_html__('Border 2px','sc-core') => 'border-2',
                esc_html__('Border 3px','sc-core') => 'border-3',
                esc_html__('Border 4px','sc-core') => 'border-4',
                esc_html__('Border 5px','sc-core') => 'border-5',
                esc_html__('Border 6px','sc-core') => 'border-6',
                esc_html__('Border 7px','sc-core') => 'border-7',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Border Size of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Button Color','sc-core') ,
            'param_name' => 'cbutton_color',
            'admin_label' => false,
            'description' => esc_html__('Change Button color  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Button Border Color','sc-core') ,
            'param_name' => 'cbutton_border_color',
            'admin_label' => false,
            'description' => esc_html__('Change Button Border color  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Button Hover Color','sc-core') ,
            'param_name' => 'cbutton_hover_color',
            'admin_label' => false,
            'description' => esc_html__('Change Button Hover color  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Button Hover Text Color','sc-core') ,
            'param_name' => 'cbutton_hover_text_color',
            'admin_label' => false,
            'description' => esc_html__('Change Button Hover Text color  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Border Hover Color','sc-core') ,
            'param_name' => 'cbutton_border_hover_color',
            'admin_label' => false,
            'description' => esc_html__('Change Border Hover color  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core')
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Custom Button  Radius','sc-core') ,
            'description' => esc_html__('Enter border radius for button. eg(50px) ','sc-core') ,
            'param_name' => 'cbutton_border_radius',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Custom Settings','sc-core'),
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Custom Border Size','sc-core') ,
            'description' => esc_html__('Enter Border Size for button. eg(5px) ','sc-core') ,
            'param_name' => 'cbutton_border_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Custom Settings','sc-core'),
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Font Size','sc-core') ,
            'description' => esc_html__('Enter custom Font Size. eg(10px) ','sc-core') ,
            'param_name' => 'button_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Text Transform ','sc-core') ,
            'param_name' => 'button_text_transform',
            'class' => 'Title_Text_Transform',
            'description' => esc_html__('Transform text. eg( UPPERCASE, lowecase )','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'value' => array(
                esc_html__('Default ','sc-core') => 'Default',
                esc_html__('Uppercase ','sc-core') => 'uppercase',
                esc_html__('Lowercase ','sc-core') => 'lowercase',
            ) ,
            'save_always' => true,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) , 
        array(
            'type' => 'checkbox',
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__('Use custom Google font ?','sc-core') ,
            'param_name' => 'button_use_theme_fonts',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Leave this if you want to use default theme font.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Typography','sc-core'),
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'google_fonts',
            'class' => 'title-class',
            'heading' => esc_html__('Change Button Text Typography','sc-core') ,
            'param_name' => 'button_google_font_select',
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
                'element' => 'button_use_theme_fonts',
                'value' => 'Yes',
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Button Text Color','sc-core') ,
            'param_name' => 'button_font_color',
            'description' => esc_html__('Change the color of Text and Icon in the button.','sc-core') ,
            'group' => esc_html__('Typography','sc-core'),
            'admin_label' => false,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style','sc-core') ,
            'description' => esc_html__('Select button display style.','sc-core') ,
            'param_name' => 'style',
            'admin_label' => false,
            // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
            'value' => array(
                esc_html__('Modern','sc-core') => 'modern',
                esc_html__('Classic','sc-core') => 'classic',
                esc_html__('Flat','sc-core') => 'flat',
                esc_html__('Outline','sc-core') => 'outline',
                esc_html__('3d','sc-core') => '3d',
                esc_html__('Custom','sc-core') => 'custom',
                esc_html__('Outline custom','sc-core') => 'outline-custom',
                esc_html__('Gradient','sc-core') => 'gradient',
                esc_html__('Gradient Custom','sc-core') => 'gradient-custom',
            ) ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Gradient Color 1','sc-core') ,
            'param_name' => 'gradient_color_1',
            'description' => esc_html__('Select first color for gradient.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => vc_get_shared('colors-dashed') ,
            'admin_label' => false,
            'std' => 'turquoise',
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'gradient'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-6',
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Gradient Color 2','sc-core') ,
            'param_name' => 'gradient_color_2',
            'description' => esc_html__('Select second color for gradient.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => vc_get_shared('colors-dashed') ,
            'admin_label' => false,
            'std' => 'blue',
            // must have default color grey
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'gradient'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-6',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Gradient Color 1','sc-core') ,
            'param_name' => 'gradient_custom_color_1',
            'description' => esc_html__('Select first color for gradient.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => '#dd3333',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'gradient-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Gradient Color 2','sc-core') ,
            'param_name' => 'gradient_custom_color_2',
            'description' => esc_html__('Select second color for gradient.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => '#eeee22',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'gradient-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Button Text Color','sc-core') ,
            'param_name' => 'gradient_text_color',
            'description' => esc_html__('Select button text color.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'value' => '#ffffff',
            'admin_label' => false,
            // must have default color grey
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'gradient-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background','sc-core') ,
            'param_name' => 'custom_background',
            'admin_label' => false,
            'description' => esc_html__('Select custom background color for your element.','sc-core') ,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-6',
            'std' => '#ededed',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text','sc-core') ,
            'param_name' => 'custom_text',
            'admin_label' => false,
            'description' => esc_html__('Select custom text color for your element.','sc-core') ,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-6',
            'std' => '#666',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Outline and Text','sc-core') ,
            'param_name' => 'outline_custom_color',
            'admin_label' => false,
            'description' => esc_html__('Select outline and text color for your element.','sc-core') ,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'outline-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
            'std' => '#666',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Hover background','sc-core') ,
            'param_name' => 'outline_custom_hover_background',
            'admin_label' => false,
            'description' => esc_html__('Select hover background color for your element.','sc-core') ,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'outline-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
            'std' => '#666',
        ) ,
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Hover text','sc-core') ,
            'param_name' => 'outline_custom_hover_text',
            'admin_label' => false,
            'description' => esc_html__('Select hover text color for your element.','sc-core') ,
            'dependency' => array(
                'element' => 'style',
                'value' => array(
                    'outline-custom'
                ) ,
            ) ,
            'edit_field_class' => 'vc_col-sm-4',
            'std' => '#fff',
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Shape','sc-core') ,
            'description' => esc_html__('Select button shape.','sc-core') ,
            'param_name' => 'shape',
            'admin_label' => false,
            // need to be converted
            'value' => array(
                esc_html__('Rounded','sc-core') => 'rounded',
                esc_html__('Square','sc-core') => 'square',
                esc_html__('Round','sc-core') => 'round',
            ) ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Color','sc-core') ,
            'param_name' => 'color',
            'description' => esc_html__('Select button color.','sc-core') ,
            // compatible with btn2, need to be converted from btn1
            'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
            'admin_label' => false,
            'value' => array(
                // Btn1 Colors
                esc_html__('Classic Grey','sc-core') => 'default',
                esc_html__('Classic Blue','sc-core') => 'primary',
                esc_html__('Classic Turquoise','sc-core') => 'info',
                esc_html__('Classic Green','sc-core') => 'success',
                esc_html__('Classic Orange','sc-core') => 'warning',
                esc_html__('Classic Red','sc-core') => 'danger',
                esc_html__('Classic Black','sc-core') => 'inverse',
                // + Btn2 Colors (default color set)
            ) + vc_get_shared('colors-dashed') ,
            'std' => 'grey',
            // must have default color grey
            'dependency' => array(
                'element' => 'style',
                'value_not_equal_to' => array(
                    'custom',
                    'outline-custom',
                    'gradient',
                    'gradient-custom',
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size','sc-core') ,
            'param_name' => 'size',
            'description' => esc_html__('Select button display size.','sc-core') ,
            // compatible with btn2, default md, but need to be converted from btn1 to btn2
            'std' => 'md',
            'value' => vc_get_shared('sizes') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Alignment','sc-core') ,
            'param_name' => 'align',
            'description' => esc_html__('Select button alignment.','sc-core') ,
            'admin_label' => false,
            // compatible with btn2, default left to be compatible with btn1
            'value' => array(
                esc_html__('Inline','sc-core') => 'inline',
                // default as well
                esc_html__('Left','sc-core') => 'left',
                // default as well
                esc_html__('Right','sc-core') => 'right',
                esc_html__('Center','sc-core') => 'center',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Make Button Full Width','sc-core') ,
            'description' => esc_html__('Enable this option to change the width to 100% everywhere.','sc-core') ,
            'param_name' => 'button_block',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'align',
                'value_not_equal_to' => 'inline',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Full Width On Mobile','sc-core') ,
            'description' => esc_html__('Enable this option to change the width to 100% on Mobile.','sc-core') ,
            'param_name' => 'button_block_mobile',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'align',
                'value_not_equal_to' => 'inline',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Full Width On Tablet','sc-core') ,
            'description' => esc_html__('Enable this option to change the width to 100% on Tablet.','sc-core') ,
            'param_name' => 'button_block_tablet',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'align',
                'value_not_equal_to' => 'inline',
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Add icon?','sc-core') ,
            'param_name' => 'add_icon',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'button_type',
                'value_not_equal_to' => array(
                    'Button_Default',
                    'Button_Ghost',
                    'Button_Fill',
                    'Background_Inverse',
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Alignment','sc-core') ,
            'description' => esc_html__('Select icon alignment.','sc-core') ,
            'param_name' => 'i_align',
            'admin_label' => false,
            'value' => array(
                esc_html__('Left','sc-core') => 'left',
                // default as well
                esc_html__('Right','sc-core') => 'right',
            ) ,
            'dependency' => array(
                'element' => 'add_icon',
                'value' => 'true',
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
            'admin_label' => false,
            'param_name' => 'i_type',
            'description' => esc_html__('Select icon library.','sc-core') ,
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
        ) ,
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__('Icon','sc-core') ,
            'param_name' => 'i_icon_openiconic',
            'value' => 'vc-oi vc-oi-dial',
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
            'admin_label' => false,
            'description' => esc_html__('Select icon from library.','sc-core') ,
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
                'element' => 'i_type',
                'value' => 'flaticon',
            ),
            'description' => esc_html__('Select icon from library.','sc-core') ,
            'admin_label' => false, 
        ),
        array(
            'type' => 'textfield',
            'holder' => 'icon Font Size',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Font Size','sc-core') ,
            'description' => esc_html__('Enter custom icon Font Size. eg(10px) ','sc-core') ,
            'param_name' => 'icon_font_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'button_type',
                'value_not_equal_to' => array(
                    'Button_Default',
                    'Button_Ghost',
                    'Button_Fill',
                    'Background_Inverse',
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Icon  Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Padding Left ','sc-core') ,
            'description' => esc_html__('Enter custom Left  padding. eg(10px)','sc-core') ,
            'param_name' => 'icon_padding_left',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'button_type',
                'value_not_equal_to' => array(
                    'Button_Default',
                    'Button_Ghost',
                    'Button_Fill',
                    'Background_Inverse',
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'holder' => 'Icon  Padding  ',
            'class' => 'title-class',
            'heading' => esc_html__('Icon Padding  Right','sc-core') ,
            'description' => esc_html__('Enter custom  Right padding. eg(10px)','sc-core') ,
            'param_name' => 'icon_padding_right',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'dependency' => array(
                'element' => 'button_type',
                'value_not_equal_to' => array(
                    'Button_Default',
                    'Button_Ghost',
                    'Button_Fill',
                    'Background_Inverse',
                ) ,
            ) ,
        ) ,
        vc_map_add_css_animation(true) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Fade Effect on Click','sc-core') ,
            'description' => esc_html__('Enable a Fade Effect when the button is clicked.','sc-core') ,
            'param_name' => 'fade_effect',
            'admin_label' => false,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
            'dependency' => array(
                    'element' => 'btype',
                    'value' => array(
                        'Default'
                    ) ,
                ) ,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Advanced on click action','sc-core') ,
            'param_name' => 'custom_onclick',
            'description' => esc_html__('Insert inline onclick javascript action.','sc-core') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('On click code','sc-core') ,
            'param_name' => 'custom_onclick_code',
            'description' => esc_html__('Enter onclick action code.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'custom_onclick',
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
    ),
    'js_view' => 'VcButton3View',
    'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
); 