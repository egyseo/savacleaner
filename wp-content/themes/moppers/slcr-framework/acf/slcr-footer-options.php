<?php 
/** 
 * The SlashCreative Acf Footer Options Settings Group
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Footer Options Settings Fields Group
register_field_group(array(
    'id'         => 'acf_page_page_options_footer',
    'key'         => 'group_acf_page_page_options_footer',
    'title'      => esc_html__('Footer Options','moppers'),
    'fields'     => array(
        array(
            'key'          => 'field_acf_page_footer_custom_logo',
            'label'        => esc_html__('Custom Footer Logo','moppers'),
            'name'         => 'acf_page_footer_custom_logo',
            'type'         => 'image',
            'instructions' => esc_html__('Upload a logo to use custom footer logo for the specific page.','moppers'),
            'save_format'  => 'array',
            'preview_size' => 'thumbnail',
            'library'      => 'all',
        ),
        array(
            'key'           => 'field_acf_page_footer_logo_height',
            'label'         => esc_html__('Logo Height','moppers'),
            'name'          => 'acf_page_footer_logo_height',
            'type'          => 'text',
            'instructions'  => esc_html__('Change the height of logo in footer  for this specific page. "Example - 30px"','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
        array(
            'key'           => 'field_acf_page_footer_background_type',
            'label'         => esc_html__('Background Type ','moppers'),
            'name'          => 'acf_page_footer_background_type',
            'type'          => 'select',
            'instructions'  => esc_html__('Background Type','moppers'),
            'choices'       => array(
                'default' => esc_html__('Default From Theme Options','moppers'),
                'image'   => esc_html__('Image','moppers'),
                'color'   => esc_html__('Color','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'               => 'field_acf_page_footer_background_image',
            'label'             => esc_html__('Background Image','moppers'),
            'name'              => 'acf_page_footer_background_image',
            'type'              => 'image',
            'instructions'      => esc_html__('Use custom background image for this page.','moppers'),
            'save_format'       => 'url',
            'preview_size'      => 'thumbnail',
            'library'           => 'all',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_footer_background_type',
                        'operator' => '==',
                        'value'    => 'image',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_footer_background_image_overlay_opacity',
            'label'             => esc_html__('Background Overlay Opacity','moppers'),
            'name'              => 'acf_page_footer_background_image_overlay_opacity',
            'type'              => 'text',
            'instructions'      => esc_html__('Adjust the background overlay opacity from 0 to 10. Higher the value, darker the color.','moppers'),
            'column_width'      => '',
            'default_value'     => '5',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'formatting'        => 'html',
            'maxlength'         => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_footer_background_type',
                        'operator' => '==',
                        'value'    => 'image',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_footer_background_image_overlay_opacity_color',
            'label'             => esc_html__('Overlay Color','moppers'),
            'name'              => 'acf_page_footer_background_image_overlay_opacity_color',
            'type'              => 'color_picker',
            'instructions'      => esc_html__('Use custom color for footer background overlay.','moppers'),
            'default_value'     => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_footer_background_type',
                        'operator' => '==',
                        'value'    => 'image',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_footer_background_color',
            'label'             => esc_html__('Footer Background Color - Main Footer','moppers'),
            'name'              => 'acf_page_footer_background_color',
            'type'              => 'color_picker',
            'instructions'      => esc_html__('Pick a color to use as background color for main footer.','moppers'),
            'default_value'     => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_footer_background_type',
                        'operator' => '==',
                        'value'    => 'color',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_footer_background_color_copyright',
            'label'             => esc_html__('Footer Background Color - Copyright Footer','moppers'),
            'name'              => 'acf_page_footer_background_color_copyright',
            'type'              => 'color_picker',
            'instructions'      => esc_html__('Pick a color to use as background color for copyright footer.','moppers'),
            'default_value'     => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_footer_background_type',
                        'operator' => '==',
                        'value'    => 'color',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'           => 'field_acf_page_footer_background_color_scheme',
            'label'         => esc_html__('Content Scheme','moppers'),
            'name'          => 'acf_page_footer_background_color_scheme',
            'type'          => 'select',
            'instructions'  => esc_html__('Set the page footer content scheme according to the background color selection.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Default From Theme Options','moppers'),
                'light'   => esc_html__('light','moppers'),
                'dark'    => esc_html__('dark','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ), 

    ),
    'location'   => array(
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'post',
                'order_no' => 0,
                'group_no' => 0,
            ),
        ),
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'page',
                'order_no' => 0,
                'group_no' => 1,
            ),
        ), 
    ),
    'options'    => array(
        'position'       => 'normal',
        'layout'         => 'default',
        'hide_on_screen' => array(
        ),
    ),
    'menu_order' => 1600,
));