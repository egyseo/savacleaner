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
$vc_single_image_new_params = array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Widget title','sc-core' ),
        'param_name' => 'title',
        'description' => esc_html__( 'Enter text used as widget title (Note: located above content element).','sc-core' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image source','sc-core' ),
        'param_name' => 'source',
        'value' => array(
            esc_html__( 'Media library','sc-core' ) => 'media_library',
            esc_html__( 'External link','sc-core' ) => 'external_link',
            esc_html__( 'Featured Image','sc-core' ) => 'featured_image',
        ),
        'std' => 'media_library',
        'description' => esc_html__( 'Select image source.','sc-core' ),
    ),
    array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Image','sc-core' ),
        'param_name' => 'image',
        'value' => '',
        'description' => esc_html__( 'Select image from media library.','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => 'media_library',
        ),
        'admin_label' => true,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'External link','sc-core' ),
        'param_name' => 'custom_src',
        'description' => esc_html__( 'Select external link.','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => 'external_link',
        ),
        'admin_label' => true,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Image size','sc-core' ),
        'param_name' => 'img_size',
        'value' => 'thumbnail',
        'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => array(
                'media_library',
                'featured_image',
            ),
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Image size','sc-core' ),
        'param_name' => 'external_img_size',
        'value' => '',
        'description' => esc_html__( 'Enter image size in pixels. Example: 200x100 (Width x Height).','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => 'external_link',
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Caption','sc-core' ),
        'param_name' => 'caption',
        'description' => esc_html__( 'Enter text for image caption.','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => 'external_link',
        ),
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Add caption?','sc-core' ),
        'param_name' => 'add_caption',
        'description' => esc_html__( 'Add image caption.','sc-core' ),
        'value' => array( esc_html__( 'Yes','sc-core' ) => 'yes' ),
        'dependency' => array(
            'element' => 'source',
            'value' => array(
                'media_library',
                'featured_image',
            ),
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image alignment','sc-core' ),
        'param_name' => 'alignment',
        'value' => array(
            esc_html__( 'Left','sc-core' ) => 'left',
            esc_html__( 'Right','sc-core' ) => 'right',
            esc_html__( 'Center','sc-core' ) => 'center',
        ),
        'description' => esc_html__( 'Select image alignment.','sc-core' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image style','sc-core' ),
        'param_name' => 'style',
        'value' => vc_get_shared( 'single image styles' ),
        'description' => esc_html__( 'Select image display style.','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => array(
                'media_library',
                'featured_image',
            ),
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Image style','sc-core' ),
        'param_name' => 'external_style',
        'value' => vc_get_shared( 'single image external styles' ),
        'description' => esc_html__( 'Select image display style.','sc-core' ),
        'dependency' => array(
            'element' => 'source',
            'value' => 'external_link',
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Border color','sc-core' ),
        'param_name' => 'border_color',
        'value' => vc_get_shared( 'colors' ),
        'std' => 'grey',
        'dependency' => array(
            'element' => 'style',
            'value' => array(
                'vc_box_border',
                'vc_box_border_circle',
                'vc_box_outline',
                'vc_box_outline_circle',
                'vc_box_border_circle_2',
                'vc_box_outline_circle_2',
            ),
        ),
        'description' => esc_html__( 'Border color.','sc-core' ),
        'param_holder_class' => 'vc_colored-dropdown',
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Border color','sc-core' ),
        'param_name' => 'external_border_color',
        'value' => vc_get_shared( 'colors' ),
        'std' => 'grey',
        'dependency' => array(
            'element' => 'external_style',
            'value' => array(
                'vc_box_border',
                'vc_box_border_circle',
                'vc_box_outline',
                'vc_box_outline_circle',
            ),
        ),
        'description' => esc_html__( 'Border color.','sc-core' ),
        'param_holder_class' => 'vc_colored-dropdown',
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'On click action','sc-core' ),
        'param_name' => 'onclick',
        'value' => array(
            esc_html__( 'None','sc-core' ) => '',
            esc_html__( 'Link to large image','sc-core' ) => 'img_link_large',
            esc_html__( 'Open prettyPhoto','sc-core' ) => 'link_image',
            esc_html__( 'Open custom link','sc-core' ) => 'custom_link',
            esc_html__( 'Zoom','sc-core' ) => 'zoom',
        ),
        'description' => esc_html__( 'Select action for click action.','sc-core' ),
        'std' => '',
    ),
    array(
        'type' => 'href',
        'heading' => esc_html__( 'Image link','sc-core' ),
        'param_name' => 'link',
        'description' => esc_html__( 'Enter URL if you want this image to have a link (Note: parameters like "mailto:" are also accepted).','sc-core' ),
        'dependency' => array(
            'element' => 'onclick',
            'value' => 'custom_link',
        ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Link Target','sc-core' ),
        'param_name' => 'img_link_target',
        'value' => vc_target_param_list(),
        'dependency' => array(
            'element' => 'onclick',
            'value' => array(
                'custom_link',
                'img_link_large',
            ),
        ),
    ),
    vc_map_add_css_animation(),
    array(
        'type' => 'el_id',
        'heading' => esc_html__( 'Element ID','sc-core' ),
        'param_name' => 'el_id',
        'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Extra class name','sc-core' ),
        'param_name' => 'el_class',
        'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core' ),
    ),
    array(
        'type' => 'css_editor',
        'heading' => esc_html__( 'CSS box','sc-core' ),
        'param_name' => 'css',
        'group' => esc_html__( 'Design Options','sc-core' ),
    ),
    // backward compatibility. since 4.6
    array(
        'type' => 'hidden',
        'param_name' => 'img_link_large',
    ), 
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'External Image link for Template','sc-core' ),  
        'param_name' => 'slcr_img_link_template',  
        'content_element'=>false,
    ),
);
vc_add_params('vc_single_image', $vc_single_image_new_params);