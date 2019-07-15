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
return array(
	'name' => __( 'Icon', 'sc-core' ),
	'base' => 'vc_icon',
	'icon' => 'icon-wpb-vc_icon',
	'category' => __( 'Content', 'sc-core' ),
	'description' => __( 'Eye catching icons from libraries', 'sc-core' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon library', 'sc-core' ),
			'value' => array(
				__( 'Awesome', 'sc-core' ) => 'fontawesome',
				__( 'Open Iconic', 'sc-core' ) => 'openiconic',
				__( 'Typicons', 'sc-core' ) => 'typicons',
				__( 'Entypo', 'sc-core' ) => 'entypo',
				__( 'Linecons', 'sc-core' ) => 'linecons',
				__( 'Mono Social', 'sc-core' ) => 'monosocial',
				__( 'Material', 'sc-core' ) => 'material',
			),
			'admin_label' => true,
			'param_name' => 'type',
			'description' => __( 'Select icon library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-adjust',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_openiconic',
			'value' => 'vc-oi vc-oi-dial',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'openiconic',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_typicons',
			'value' => 'typcn typcn-adjust-brightness',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'typicons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_entypo',
			'value' => 'entypo-icon entypo-icon-note',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'entypo',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'entypo',
			),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_linecons',
			'value' => 'vc_li vc_li-heart',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'linecons',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_monosocial',
			'value' => 'vc-mono vc-mono-fivehundredpx',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'monosocial',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'sc-core' ),
			'param_name' => 'icon_material',
			'value' => 'vc-material vc-material-cake',
			// default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'material',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'material',
			),
			'description' => __( 'Select icon from library.', 'sc-core' ),
		),
		array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'sc-core' ),
            'param_name' => 'icon_flaticon',
            'value' => 'flaticon-001-wipes',
            'settings' => array(
                'emptyIcon' => false,
                'type' => 'flaticon',
                'iconsPerPage' => 200,
            ),
            'dependency' => array(
                'element' => 'type',
                'value' => 'flaticon',
            ),         
        ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon color', 'sc-core' ),
			'param_name' => 'color',
			'value' => array_merge( vc_get_shared( 'colors' ), array( __( 'Custom color', 'sc-core' ) => 'custom' ) ),
			'description' => __( 'Select icon color.', 'sc-core' ),
			'param_holder_class' => 'vc_colored-dropdown',
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom color', 'sc-core' ),
			'param_name' => 'custom_color',
			'description' => __( 'Select custom icon color.', 'sc-core' ),
			'dependency' => array(
				'element' => 'color',
				'value' => 'custom',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Background shape', 'sc-core' ),
			'param_name' => 'background_style',
			'value' => array(
				__( 'None', 'sc-core' ) => '',
				__( 'Circle', 'sc-core' ) => 'rounded',
				__( 'Square', 'sc-core' ) => 'boxed',
				__( 'Rounded', 'sc-core' ) => 'rounded-less',
				__( 'Outline Circle', 'sc-core' ) => 'rounded-outline',
				__( 'Outline Square', 'sc-core' ) => 'boxed-outline',
				__( 'Outline Rounded', 'sc-core' ) => 'rounded-less-outline',
			),
			'description' => __( 'Select background shape and style for icon.', 'sc-core' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Background color', 'sc-core' ),
			'param_name' => 'background_color',
			'value' => array_merge( vc_get_shared( 'colors' ), array( __( 'Custom color', 'sc-core' ) => 'custom' ) ),
			'std' => 'grey',
			'description' => __( 'Select background color for icon.', 'sc-core' ),
			'param_holder_class' => 'vc_colored-dropdown',
			'dependency' => array(
				'element' => 'background_style',
				'not_empty' => true,
			),
		),
		array(
			'type' => 'colorpicker',
			'heading' => __( 'Custom background color', 'sc-core' ),
			'param_name' => 'custom_background_color',
			'description' => __( 'Select custom icon background color.', 'sc-core' ),
			'dependency' => array(
				'element' => 'background_color',
				'value' => 'custom',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'sc-core' ),
			'param_name' => 'size',
			'value' => array_merge( vc_get_shared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
			'std' => 'md',
			'description' => __( 'Icon size.', 'sc-core' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Icon alignment', 'sc-core' ),
			'param_name' => 'align',
			'value' => array(
				__( 'Left', 'sc-core' ) => 'left',
				__( 'Right', 'sc-core' ) => 'right',
				__( 'Center', 'sc-core' ) => 'center',
			),
			'description' => __( 'Select icon alignment.', 'sc-core' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => __( 'URL (Link)', 'sc-core' ),
			'param_name' => 'link',
			'description' => __( 'Add link to icon.', 'sc-core' ),
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'el_id',
			'heading' => __( 'Element ID', 'sc-core' ),
			'param_name' => 'el_id',
			'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp'),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'sc-core' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'sc-core' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'sc-core' ),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'sc-core' ),
		),
	),
	'js_view' => 'VcIconElementView_Backend',
);