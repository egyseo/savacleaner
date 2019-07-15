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
    'name' => esc_html__( 'Custom Heading','sc-core' ),
    'base' => 'vc_custom_heading',
    'icon' => 'icon-wpb-ui-custom_heading',
    'show_settings_on_create' => true,
    'category' => esc_html__( 'Content','sc-core' ),
    'description' => esc_html__( 'Text with Google fonts','sc-core' ),
    'params' =>  array(
        array(
            'type' => 'dropdown', 
            'class' => 'custom_heading_element_source',
            'heading' => esc_html__( 'Text source','sc-core' ),
            'param_name' => 'source', 
            'description' => esc_html__( 'Select text source.','sc-core' ),
            'admin_label' => false,
            'value' => array( 
                        esc_html__( 'Custom text','sc-core') => '',
                        esc_html__( 'Post or Page Title','sc-core' ), 'post_title',
                        ), 
            'dependency' => '',
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'textarea', 
            'class' => 'custom_heading_element_text',
            'heading' => esc_html__( 'Text','sc-core'),
            'param_name' => 'text',
            'description' => esc_html__( 'Note: If you are using non-latin characters be sure to activate them under Settings\/Visual Composer\/General Settings.','sc-core' ),
            'value' => '',
            'dependency' => array(
                            "element" =>'source',
                            "is_empty" => true,
                        ), 
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ),
        array(
            'type' => 'vc_link', 
            'class' => 'custom_heading_element_link',
            'heading' => esc_html__( 'URL (Link)','sc-core' ),
            'param_name' => 'link', 
            'description' => esc_html__( 'Add link to custom heading.','sc-core' ),
            'admin_label' => false, 
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ),
        array(
            'type' => 'font_container', 
            'class' => 'custom_heading_element_font_container',
            'heading' => esc_html__( ' ','sc-core' ),
            'param_name' => 'font_container',
            'value' => array(
                            "tag" =>'h2',
                            "text_align" => 'left',
                        ),  
            'settings' => array(
                            "fields" =>array(
                            "tag" =>'h2',
                            "0" =>'text_align',
                            "1" =>'font_size',
                            "2" =>'line_height',
                            "3" =>'color',
                            "tag_description" =>'Select element tag.',
                            "text_align_description" =>'Select text alignment.',
                            "font_size_description" =>'Enter font size Example - 10px.',
                            "line_height_description" =>'Enter line heightExample - 10px.',
                            "color_description" =>'Select heading color.', 
                        ) 
                        ),  
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Gradient Color ','sc-core') ,
            'param_name' => 'custom_heading_element_font_gradient',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'value' => array(
                            "Yes" =>'Yes', 
                        ),  
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Gradient Text Color ','sc-core') ,
            'param_name' => 'custom_heading_element_font_color_gradient',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,
            'value' => array(  
                esc_html__('Gradient Color 1','sc-core') => 'text--gradient-1',
                esc_html__('Gradient Color 2','sc-core') => 'text--gradient-2', 
            ) ,  
            'dependency' => array(
                'element' => 'custom_heading_element_font_gradient',
                'value' => array(
                    'Yes'
                ) ,
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'checkbox', 
            'class' => 'custom_heading_element_use_theme_fonts',
            'heading' => esc_html__( 'Use google font family?','sc-core'),
            'param_name' => 'use_theme_fonts',
            'value' => array(
                            "Yes" =>'Yes', 
                        ),  
            'description' => esc_html__( 'Use font family from the theme.','sc-core'),
            'admin_label' => false, 
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'google_fonts', 
            'class' => 'custom_heading_element_google_fonts',
            'heading' => '',
            'param_name' => 'google_fonts', 
            'description' => esc_html__( 'Select font styling.','sc-core'),
            'settings' => array(
                            "fields" =>array( 
                            "font_family_description" =>esc_html__('Select font family.','sc-core'),
                            "font_style_description" =>esc_html__('Select font styling.','sc-core'),
                        ) 
                        ),
            'dependency' => array(
                            "element" =>'use_theme_fonts',
                            "value" => "Yes",
                        ),
            'admin_label' => false, 
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'heading' => esc_html__('Letter Spacing','sc-core') ,
            'param_name' => 'letter_spacing',
            'description' => esc_html__('Enter a value to put custom spacing between letters. Example - 1px','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Font Weights','sc-core') ,
            'param_name' => 'custom_heading_font_weights',
            'class' => 'title-class',
            'admin_label' => false,
            'value' => array(
                esc_html__('400 - Regular','sc-core') => 'font-400',
                esc_html__('100 - Ultra Thin','sc-core') => 'font-100',
                esc_html__('300 - Thin','sc-core') => 'font-300',
                esc_html__('500 - Medium','sc-core') => 'font-500',
                esc_html__('600 - Semi Bold','sc-core') => 'font-600',
                esc_html__('700 - Bold','sc-core') => 'font-700',
                esc_html__('800 - Extra Bold','sc-core') => 'font-800',
                esc_html__('900 - Black','sc-core') => 'font-900',
            ) ,
            'save_always' => true,
            'description' => esc_html__('Select Font Weights of Button  ','sc-core') ,
            'dependency' => array(
                'element' => 'btype',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'animation_style', 
            'class' => 'custom_heading_element_css_animation',
            'heading' => esc_html__( 'CSS Animation','sc-core' ),
            'param_name' => 'css_animation', 
            'description' => __( 'Select type of animation for element to be animated when it \"enters\" the browsers viewport (Note: works only in modern browsers).','sc-core'),
            'admin_label' => false, 
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'textfield', 
            'class' => 'element_id_class',
            'heading' => esc_html__( 'Element ID','sc-core'),
            'param_name' => 'el_id', 
            'description' => esc_html__( 'Enter element ID (Note: make sure it is unique  ).','sc-core' ),
            'admin_label' => false,
            'dependency' => '',
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ),
        array(
            'type' => 'textfield', 
            'class' => 'element_extra_class',
            'heading' => esc_html__( 'Extra class name','sc-core'),
            'param_name' => 'el_class', 
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core'),
            'admin_label' => false,
            'dependency' => '',
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ), 
        array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css','sc-core'),
            'param_name' => 'css',
            'group' => esc_html__( 'Design options','sc-core'),
        ),     
    ),      
);