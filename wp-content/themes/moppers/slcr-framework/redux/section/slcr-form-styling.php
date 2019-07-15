<?php 
/** 
 * The SlashCreative Redux Form Styling Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Form Styling Settings Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Form Styling','moppers'),
    'id'               => 'form-styling',
    'desc'             => esc_html__('All Form Styling related options are listed here.','moppers'),
    'customizer_width' => '400px',
    'icon'             => 'icons-at',
    'fields'           => array(
        array(
            'id'       => 'form_styling_settings_height',
            'type'     => 'text',
            'title'    => esc_html__('Input Fields Height','moppers'),
            'subtitle' => esc_html__('Change the height of all input field types','moppers'),
            'desc'     => '',
            'default'  => '48',
        ),
        array(
            'id'       => 'form_styling_settings_text_margin_top',
            'type'     => 'text',
            'title'    => esc_html__('Input Fields Margin - Top and Bottom','moppers'),
            'subtitle' => esc_html__('Change top and bottom margin on input fields.','moppers'),
            'desc'     => '',
            'default'  => '5',
        ),
        array(
            'id'       => 'form_styling_settings_text_border_radius',
            'type'     => 'text',
            'title'    => esc_html__('Input Fields Border Radius','moppers'),
            'subtitle' => esc_html__('Change the border radius of input fields.','moppers'),
            'desc'     => '',
            'default'  => '5',
        ),
        array(
            'id'       => 'form_styling_settings_text_size',
            'type'     => 'text',
            'title'    => esc_html__('Input Fields Font Size','moppers'),
            'subtitle' => esc_html__('Change the font size of input fields.','moppers'),
            'desc'     => '',
            'default'  => '14',
        ),
        array(
            'id'       => 'form_styling_settings_background_color',
            'type'     => 'color',
            'title'    => esc_html__('Input Fields Background Color','moppers'),
            'subtitle' => esc_html__('Pick a color for  back ground color .','moppers'),
            'default'  => '#f7f7f7',
        ),
        array(
            'id'       => 'form_styling_settings_border_color',
            'type'     => 'color',
            'title'    => esc_html__('Input Fields Border Color','moppers'),
            'subtitle' => esc_html__('Change the border color of input fields.','moppers'),
            'default'  => '#eeeeee',
        ),
        array(
            'id'       => 'form_styling_settings_border_color_focuse',
            'type'     => 'color',
            'title'    => esc_html__('Input Fields Border Color - Focus','moppers'),
            'subtitle' => esc_html__('Change the border color of input fields on focus.','moppers'),
            'default'  => '#6382f7',
        ),
        array(
            'id'       => 'form_styling_settings_text_color',
            'type'     => 'color',
            'title'    => esc_html__('Input Fields Text Color','moppers'),
            'subtitle' => esc_html__('Change the text color of input fields.','moppers'),
            'default'  => '#001837',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_padding_top',
            'type'     => 'text',
            'title'    => esc_html__('Submit Button Padding - Top and Bottom','moppers'),
            'subtitle' => esc_html__('Change submit button padding from top and bottom. Example - 10','moppers'),
            'desc'     => '',
            'default'  => '12',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_padding_left',
            'type'     => 'text',
            'title'    => esc_html__('Submit Button Padding - Left and Right','moppers'),
            'subtitle' => esc_html__('Change submit button padding from left and right. Example - 10','moppers'),
            'desc'     => '',
            'default'  => '20',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_border_radius',
            'type'     => 'text',
            'title'    => esc_html__('Button Border Radius','moppers'),
            'subtitle' => esc_html__('Change the border radius of submit button.','moppers'),
            'desc'     => '',
            'default'  => '4',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_border_width',
            'type'     => 'text',
            'title'    => esc_html__('Button Border Width','moppers'),
            'subtitle' => esc_html__('Change the border width of submit button.','moppers'),
            'desc'     => '',
            'default'  => '0',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_color',
            'type'     => 'color',
            'title'    => esc_html__('Button Background Color','moppers'),
            'subtitle' => esc_html__('Pick a color for the background of submit button.','moppers'),
            'default'  => '#6382f7',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('Button Background Color - Hover','moppers'),
            'subtitle' => esc_html__('Pick a color for the background of submit button on hover.','moppers'),
            'default'  => '#6382f7',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_text_color',
            'type'     => 'color',
            'title'    => esc_html__('Button Text Color','moppers'),
            'subtitle' => esc_html__('Change the text color of submit button.','moppers'),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_text_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('Button Text Color - Hover','moppers'),
            'subtitle' => esc_html__('Change the text color of submit button on hover.','moppers'),
            'default'  => '#ffffff',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_border_color',
            'type'     => 'color',
            'title'    => esc_html__('Button Border Color','moppers'),
            'subtitle' => esc_html__('Change the border color of submit button.','moppers'),
            'default'  => '#6382f7',
        ),
        array(
            'id'       => 'form_styling_settings_submit_button_border_color_hover',
            'type'     => 'color',
            'title'    => esc_html__('Button Border Color - Hover','moppers'),
            'subtitle' => esc_html__('Change the border color of submit button on hover.','moppers'),
            'default'  => '#6382f7',
        ),
        array(
            'id'       => 'form_styling_settings_label_typography',
            'type'     => 'typography',
            'title'    => esc_html__('Label Typography','moppers'),
            'subtitle' => esc_html__('Specify font properties for the Input Fields Label.','moppers'),
            'google'   => true,
        ),

    ),
));