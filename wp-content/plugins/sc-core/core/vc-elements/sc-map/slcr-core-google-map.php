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
 * Element Description: VC Slcr Google Map Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Google Maps API','sc-core') ,
    'base' => 'slcr_google_map',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'google-maps.png',
    'class' => 'vc_icon_content_box',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add a  google map with this element.','sc-core') ,
    'params' => array(
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Map Height','sc-core') ,
            'param_name' => 'slcr_google_map_height',
            'value' => '500px',
            'description' => esc_html__('Enter the Map Height (500px).','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Map Zoom','sc-core') ,
            'param_name' => 'slcr_google_map_zoom',
            'class' => 'slcr_google_map_zoom',
            'description' => esc_html__('Google map Zoom set','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'value' => array( 
                esc_html__('1','sc-core') => '1',
                esc_html__('2','sc-core') => '2',
                esc_html__('3','sc-core') => '3',
                esc_html__('4','sc-core') => '4',
                esc_html__('5','sc-core') => '5',
                esc_html__('6','sc-core') => '6',
                esc_html__('7','sc-core') => '7',
                esc_html__('8','sc-core') => '8',
                esc_html__('9','sc-core') => '9',
                esc_html__('10','sc-core') => '10',
                esc_html__('11','sc-core') => '11',
                esc_html__('12','sc-core') => '12',
                esc_html__('13','sc-core') => '13',
                esc_html__('14','sc-core') => '14',
                esc_html__('15','sc-core') => '15',
                esc_html__('16','sc-core') => '16',
                esc_html__('17','sc-core') => '17',
                esc_html__('18','sc-core') => '18',
                esc_html__('19','sc-core') => '19',
                esc_html__('20','sc-core') => '20',
            ) ,
            'std'         => '15',
            'save_always' => true,
            'admin_label' => false, 
        ) ,
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Map Center latitude','sc-core') ,
            'param_name' => 'slcr_google_map_center_lat', 
            'description' => esc_html__('Enter the Center latitude (40.793).','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'admin_label' => false,
            'type' => 'textfield',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Map Center longitude','sc-core') ,
            'param_name' => 'slcr_google_map_center_long', 
            'description' => esc_html__('Enter the Center longitude (-73.950).','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'admin_label' => false,
            'type' => 'textarea',
            'class' => 'vc_col-xs-6',
            'heading' => esc_html__('Map Marker Locations','sc-core') ,
            'param_name' => 'slcr_google_map_marker_locations',
            'description' => __('Please enter the the list of locations you would like with a latitude,longitude format. ','sc-core').'<br/>'.__('Divide values with linebreaks (|). Example: 3349.99,-7345.17|540.93,-563.94|4450.7963,-7763.9574','sc-core') ,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Custom Map  Image Icon','sc-core') ,
            'param_name' => 'slcr_google_map_custom_icon',
            'group' => esc_html__('General','sc-core'),
            'admin_label' => false, 
        ) ,
        array(
            'type' => 'attach_image',
            'holder' => 'image',
            // 'class' => 'text-class',
            'heading' => esc_html__('Icon Image','sc-core') ,
            'param_name' => 'himg',
            // 'value' => esc_html__( 'Default value' ),
            'description' => esc_html__('Select an icon from map .','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
            'dependency' => array(
                'element' => 'slcr_google_map_custom_icon',
                'value' => 'true',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Map  style','sc-core') ,
            'param_name' => 'slcr_google_map_style',
            'class' => 'slcr_google_map_style',
            'description' => esc_html__('Google map style change','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'value' => array( 
                esc_html__('Default','sc-core') => 'default',
                esc_html__('Light','sc-core') => 'light',
                esc_html__('Dark','sc-core') => 'dark', 
            ) ,
            'std'         => 'default',
            'save_always' => true,
            'admin_label' => false, 
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Water Color','sc-core') ,
            'param_name' => 'slcr_custom_water_color_map',
            'description' => esc_html__('Change the color of water in the map.','sc-core') ,
            'group' => 'Custom Map',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Landscape Color','sc-core') ,
            'param_name' => 'slcr_custom_landscape_color_map',
            'description' => esc_html__('Change the color of landscape in the map.','sc-core') ,
            'group' => 'Custom Map',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Highway Color','sc-core') ,
            'param_name' => 'slcr_custom_highway_color_map',
            'description' => esc_html__('Custom color for all the highways in the map.','sc-core') ,
            'group' => 'Custom Map',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) ,
        ) , 
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Point of Interest Color','sc-core') ,
            'param_name' => 'slcr_custom_poi_color_map',
            'description' => esc_html__('Custom color for Point on Interests in the map.','sc-core') ,
            'group' => 'Custom Map',
            'admin_label' => false,
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) ,
        ) , 
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Remove text labels','sc-core') ,
            'param_name' => 'slcr_custom_labels_text_stroke_map',
            'description' => esc_html__('Hide all the text labels.','sc-core'),
            'group' => 'Custom Map',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false, 
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) , 
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Remove Geometry','sc-core') ,
            'param_name' => 'slcr_custom_geometry_on_off_map',
            'description' => esc_html__('Remove all the geometry to make the map look smoother.','sc-core'),
            'group' => 'Custom Map',
            'edit_field_class' => 'vc_column vc_col-sm-6 crum_vc',
            'admin_label' => false,  
            'dependency' => array(
                'element' => 'slcr_google_map_style',
                'value' => array(
                    'light',
                    'dark'
                ) ,
            ) ,
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
        ),
    ) ,
);