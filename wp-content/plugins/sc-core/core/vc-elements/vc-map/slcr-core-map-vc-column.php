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
$vc_column_new_params = array( 
    array(
    'type' => 'dropdown',
    'heading' => esc_html__( 'Content Scheme','sc-core' ),
    'param_name' => 'content_style',
    'class' => 'title-class', 
    'description' => esc_html__( 'Choose a content scheme for dark and light backrounds.','sc-core' ), 
    'admin_label' => false, 
    'value' => array( 
        esc_html__( 'Light Content','sc-core') => 'content_dark',  
        esc_html__( 'Dark Content','sc-core' ) => 'content_light', 
    ), 
    'save_always' => true, 
    ),
     vc_map_add_css_animation( false ),
    array(
    'type' => 'textfield',
    'heading' => esc_html__('z index','sc-core') ,
    'param_name' => 'z_index',
    'admin_label' => false,
    'description' => esc_html__('Enter custom Z index.','sc-core') ,
    ) ,
    array(
        'type' => 'el_id',
        'heading' => esc_html__( 'Element ID','sc-core'),
        'param_name' => 'el_id',
        'admin_label' => false,
        'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp'),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Extra class name','sc-core' ),
        'param_name' => 'el_class',
        'admin_label' => false,
        'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core' ),
    ),
    array(
        'type' => 'css_editor',
        'heading' => esc_html__( 'CSS box','sc-core' ),
        'param_name' => 'css',
        'admin_label' => false,
        'group' => esc_html__( 'Design Options','sc-core' ),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Width','sc-core'),
        'param_name' => 'width',
        'admin_label' => false,
        'value' => array(
            esc_html__( '1 column - 1/12','sc-core' ) => '1/12',
            esc_html__( '2 columns - 1/6','sc-core' ) => '1/6',
            esc_html__( '3 columns - 1/4','sc-core' ) => '1/4',
            esc_html__( '4 columns - 1/3','sc-core') => '1/3',
            esc_html__( '5 columns - 5/12','sc-core' ) => '5/12',
            esc_html__( '6 columns - 1/2','sc-core' ) => '1/2',
            esc_html__( '7 columns - 7/12','sc-core' ) => '7/12',
            esc_html__( '8 columns - 2/3','sc-core' ) => '2/3',
            esc_html__( '9 columns - 3/4','sc-core' ) => '3/4',
            esc_html__( '10 columns - 5/6','sc-core' ) => '5/6',
            esc_html__( '11 columns - 11/12','sc-core') => '11/12',
            esc_html__( '12 columns - 1/1','sc-core' ) => '1/1',
        ),
        'group' => esc_html__( 'Responsive Options','sc-core' ),
        'description' => esc_html__( 'Select column width.','sc-core' ),
        'std' => '1/1',
    ),
    array(
        'type' => 'column_offset',
        'heading' => esc_html__( 'Responsiveness','sc-core'),
        'param_name' => 'offset',
        'admin_label' => false,
        'group' => esc_html__( 'Responsive Options','sc-core' ),
        'description' => esc_html__( 'Adjust column for different screen sizes. Control width, offset and visibility settings.','sc-core'),
    ),
);
 
vc_add_params( 'vc_column', $vc_column_new_params ); 