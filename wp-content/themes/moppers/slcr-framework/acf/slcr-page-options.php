<?php 
/** 
 * The SlashCreative Acf Page Options Settings Group
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Page Options Settings Fields Group
register_field_group(array(
    'id'         => 'acf_page_page_options',
    'key'        => 'group_acf_page_page_options',
    'title'      => esc_html__('Page Options','moppers'),
    'fields'     => array(
        array(
            'key'           => 'field_acf_page_options_heading_main_content_padding_top',
            'label'         => esc_html__('Main Content Padding - Top','moppers'),
            'name'          => 'acf_page_options_heading_main_content_padding_top',
            'type'          => 'text',
            'instructions'  => esc_html__('Change padding of the main content "between header and footer" from the top. "Example - 20px"','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
        array(
            'key'           => 'field_acf_page_options_heading_main_content_padding_bottom',
            'label'         => esc_html__('Main Content Padding - Bottom','moppers'),
            'name'          => 'acf_page_options_heading_main_content_padding_bottom',
            'type'          => 'text',
            'instructions'  => esc_html__('Change padding of the main content "between header and footer" from the bottom. "Example - 20px"','moppers'),
            'column_width'  => '',
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
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
    'menu_order' => 1400,
));