<?php 
/** 
 * The SlashCreative Acf Page Header Settings Group
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Page Header Settings Fields Group
register_field_group(array(
    'id'         => 'acf_page_header-options',
    'key'         => 'group_acf_page_header-options',
    'title'      => esc_html__('Page Header','moppers'),
    'fields'     => array(
        array(
            'key'           => 'field_acf_page_header_options_show_87656465',
            'label'         => esc_html__('Page Header Visibility','moppers'),
            'name'          => 'acf_page_header_options_show_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Hide or show the visibility of page header for the specific page.','moppers'),
            'choices'       => array(
                'on'  => esc_html__('On','moppers'),
                'off' => esc_html__('Off','moppers'),
            ),
            'default_value' => 'on',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'field_acf_page_header_options_title_87656465',
            'label'         => esc_html__('Page Title','moppers'),
            'name'          => 'acf_page_header_options_title_87656465',
            'type'          => 'text',
            'instructions'  => esc_html__('Use custom title for the page. Default title is the name of the page.','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
        array(
            'key'           => 'field_acf_page_header_options_description_87656465',
            'label'         => esc_html__('Description','moppers'),
            'name'          => 'acf_page_header_options_description_87656465',
            'type'          => 'text',
            'instructions'  => esc_html__('Write a small description under the title of the page.','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
        array(
            'key'           => 'field_acf_page_header_options_height_87656465',
            'label'         => esc_html__('Page Header Height','moppers'),
            'name'          => 'acf_page_header_options_height_87656465',
            'type'          => 'text',
            'instructions'  => esc_html__('Change the height of the page header. "Example - 200px"','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
        array(
            'key'           => 'field_acf_page_header_options_breadcrumb_87656465',
            'label'         => esc_html__('Breadcrumbs','moppers'),
            'name'          => 'acf_page_header_options_breadcrumb_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Enable or disable breadcrumbs for the specific page.','moppers'),
            'choices'       => array(
                'inherit' => esc_html__('Inherit from Theme Options','moppers'),
                'on'      => esc_html__('On','moppers'),
                'off'     => esc_html__('Off','moppers'),
            ),
            'default_value' => 'inherit',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'field_acf_page_header_options_background_type_87656465',
            'label'         => esc_html__('Background Type','moppers'),
            'name'          => 'acf_page_header_options_background_type_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Select a background type for the page header.','moppers'),
            'choices'       => array(
                'inherit'  => esc_html__('Inherit from Theme Options','moppers'),
                'image'    => esc_html__('Image','moppers'),
                'color'    => esc_html__('Color','moppers'),
                'gradient' => esc_html__('Gradient','moppers'),
            ),
            'default_value' => 'inherit',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'               => 'field_acf_page_header_options_color_87656465',
            'label'             => esc_html__('Overlay Color','moppers'),
            'name'              => 'acf_page_header_options_color_87656465',
            'type'              => 'color_picker',
            'instructions'      => esc_html__('Use custom color as image overlay. Upload the feature image to use as background image of page header.','moppers'),
            'default_value'     => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_header_options_background_type_87656465',
                        'operator' => '==',
                        'value'    => 'image',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_header_options_overlay_87656465',
            'label'             => esc_html__('Overlay Opacity','moppers'),
            'name'              => 'acf_page_header_options_overlay_87656465',
            'type'              => 'text',
            'instructions'      => esc_html__('Adjust the overlay opacity of background overlay from 0 to 10. Higher the value, darker the shade.','moppers'),
            'column_width'      => '',
            'default_value'     => '',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'formatting'        => 'html',
            'maxlength'         => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_header_options_background_type_87656465',
                        'operator' => '==',
                        'value'    => 'image',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_header_options_backgroundcolor_87656465',
            'label'             => esc_html__('Background Color','moppers'),
            'name'              => 'acf_page_header_options_backgroundcolor_87656465',
            'type'              => 'color_picker',
            'instructions'      => esc_html__('Change the background color of page header for this specific page.','moppers'),
            'default_value'     => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_header_options_background_type_87656465',
                        'operator' => '==',
                        'value'    => 'color',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'               => 'field_acf_page_header_options_overlay_gradient_87656465',
            'label'             => esc_html__('Gradient CSS','moppers'),
            'name'              => 'acf_page_header_options_overlay_gradient_87656465',
            'type'              => 'text',
            'instructions'      => esc_html__('Enter the gradient CSS to use as page header background. Example - linear-gradient( 135deg, #F97794 10%, #623AA2 100%)','moppers'),
            'column_width'      => '',
            'default_value'     => '',
            'placeholder'       => '',
            'prepend'           => '',
            'append'            => '',
            'formatting'        => 'html',
            'maxlength'         => '',
            'conditional_logic' => array(
                'status'   => 1,
                'rules'    => array(
                    array(
                        'field'    => 'field_acf_page_header_options_background_type_87656465',
                        'operator' => '==',
                        'value'    => 'gradient',
                    ),
                ),
                'allorany' => 'all',
            ),
        ),
        array(
            'key'           => 'field_acf_page_header_options_content_87656465',
            'label'         => esc_html__('Content Scheme','moppers'),
            'name'          => 'acf_page_header_options_content_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Set the page header content scheme according to the background color selection.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Default From Theme Options','moppers'),
                'light'   => esc_html__('Dark','moppers'),
                'dark'    => esc_html__('Light','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'field_acf_page_header_options_content_vertical_87656465',
            'label'         => esc_html__('Content Alignment - Vertical','moppers'),
            'name'          => 'acf_page_header_options_content_vertical_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Align the page header content vertically.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Default From Theme Options','moppers'),
                'top'     => esc_html__('Top','moppers'),
                'bottom'  => esc_html__('Bottom','moppers'),
                'middle'  => esc_html__('Middle','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'field_acf_page_header_options_content_horizontal_87656465',
            'label'         => esc_html__('Content Alignment - Horizontal','moppers'),
            'name'          => 'acf_page_header_options_content_horizontal_87656465',
            'type'          => 'select',
            'instructions'  => esc_html__('Align the page header content horizontally.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Default From Theme Options','moppers'),
                'left'    => esc_html__('left','moppers'),
                'right'   => esc_html__('right','moppers'),
                'center'  => esc_html__('center','moppers'),
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
                'value'    => 'page',
                'order_no' => 0,
                'group_no' => 0,
            ),
        ),
    ),
    'options'    => array(
        'position'       => 'normal',
        'layout'         => 'default',
        'hide_on_screen' => array(
        ),
    ),
    'menu_order' => 1300,
));