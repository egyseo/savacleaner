<?php
/** 
 * The SlashCreative Redux Site Privacy section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Site Privacy Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Site Privacy','moppers'),
    'id'               => 'privacy-settings',
    'desc'             => esc_html__('Adanced site privacy options to allow and block cookies by third party websites and services.','moppers'),
    'customizer_width' => '400px',
    'icon'             => 'icons-padlock', 
    'fields'     => array( 
        array(
            'id' => 'general_settings_privacy_cookie_days',
            'type' => 'slider',
            'title' => esc_html__('Cookie Expiration','moppers'),
            'subtitle' => esc_html__('Set how many days the cookies should be stored for the users.','moppers'), 
            "default" => 30,
            "min" => 1,
            "step" => 1,
            "max" => 365,
            'display_value' => 'text'
        ),
        array(
            'id'       => 'general_settings_privacy_consent',
            'type'     => 'switch',
            'title'    => esc_html__('Privacy Consent','moppers'),
            'subtitle' => esc_html__('Block the media embeds and third-party scripts from loading until the user consent is given.','moppers'),
            'default'  => false, 
        ),
        array(
            'id'       => 'general_settings_privacy_consent_types',
            'type'     => 'select',
            'multi'    => true,
            'title'    => esc_html__('Privacy Consent Elements','moppers'), 
            'subtitle' => esc_html__('Select specific elements to require consent at the locations where the elements are used.','moppers'),  
            'options'  => array(
                'youtube' => 'Youtube',
                'vimeo' => 'Vimeo',
                'insta' => 'Instagram',
                'gmap' => 'Google Maps'),
            'default'  => array('insta','youtube'),
            'required' => array('general_settings_privacy_consent', '=', true),
        ),   
        array(
            'id'       => 'general_settings_privacy_bar',
            'type'     => 'switch',
            'title'    => esc_html__('Privacy Bar','moppers'),
            'subtitle' => esc_html__('Enable a privacy bar at the bottom of the page to ask users to allow the use of cookies.','moppers'),
            'default'  => false, 
        ),
        array(
            'id'       => 'general_settings_privacy_consent_types_default',
            'type'     => 'select',
            'multi'    => true,
            'title'    => esc_html__('Overall Consent Types','moppers'), 
            'subtitle' => esc_html__('Select the types of embeds which you would like to allow from the privacy bar.','moppers'),  
            'options'  => array(
                'vimeo' => 'Vimeo',
                'youtube' => 'Youtube',
                'insta' => 'Instagram',
                'gmap' => 'Google Maps'), 
            'required' => array('general_settings_privacy_bar', '=', true),
        ), 
        array(
            'id'       => 'general_settings_privacy_bar_text',
            'type'     => 'textarea',
            'title'    => esc_html__('Privacy Bar Text','moppers'),
            'subtitle' => esc_html__('The custom text you want to appear on the privacy bar.','moppers'),
            'desc'     => '',
            'default'  => 'This website needs you to allow the use of cookies as described in our',
            'required' => array('general_settings_privacy_bar', '=', true),

        ), 
        array(
            'id'=>'general_settings_privacy_bar_desc',
            'type' => 'textarea',
            'title' => esc_html__('Custom HTML','moppers'), 
            'subtitle' => esc_html__('You can also add some custom HTML to add external page links.','moppers'),
            'validate' => 'html_custom',
            'required' => array('general_settings_privacy_bar', '=', true),
            'default' => '<a href="#" target="_blank">'.__('Privacy Policy','moppers').'</a>',
        ),
        array(
            'id'       => 'general_settings_privacy_bar_button_text',
            'type'     => 'text',
            'title'    => esc_html__('Button Text','moppers'),
            'subtitle' => esc_html__('The custom text to display on the button to allow the privacy acceptance.','moppers'),
            'desc'     => '',
            'default'  => 'I Agree',
            'required' => array('general_settings_privacy_bar', '=', true),
        ),
        array(
            'id'       => 'general_settings_privacy_bar_google_analytics',
            'type'     => 'switch',
            'title'    => esc_html__('Google Analytics','moppers'),
            'subtitle' => __('If you are using Google Analytics, enable this option to put this in privacy consent with page bar. ','moppers').'</br><strong>'.__('General Settings > Custom CSS and Scripts.','moppers').'</strong>',
            'default'  => true, 
            'required' => array('general_settings_privacy_bar', '=', true),
        ),
        array(
            'id'       => 'general_settings_privacy_bar_custom_script',
            'type'     => 'switch',
            'title'    => esc_html__('Other Scripts or API','moppers'),
            'subtitle' => __('If you are using any other script which requires the use of cookies, enable this option to put this in privacy consent with page bar.','moppers').'</br><strong>'.__('General Settings > Custom CSS and Scripts.','moppers').'</strong>',
            'default'  => false, 
            'required' => array('general_settings_privacy_bar', '=', true),
        ),
        array(
            'id'       => 'general_settings_privacy_bar_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('Background Color - Privacy Bar','moppers'),
            'subtitle' => esc_html__('Change the background color of the privacy bar.','moppers'),
            'required' => array('general_settings_privacy_bar', '=', true), 
        ),
        array(
            'id'       => 'general_settings_privacy_bar_text_color',
            'type'     => 'color',
            'title'    => esc_html__('Text Color - Privacy Bar','moppers'),
            'subtitle' => esc_html__('Select a custom text color for privacy bar.','moppers'), 
            'required' => array('general_settings_privacy_bar', '=', true),
        ),
        array(
            'id'       => 'general_settings_privacy_bar_link_color',
            'type'     => 'color',
            'title'    => esc_html__('Links Color - Privacy Bar','moppers'),
            'subtitle' => esc_html__('Change the color of external links if you are using any inside custom HTML input.','moppers'), 
            'required' => array('general_settings_privacy_bar', '=', true),
        ),
        array(
            'id'       => 'general_settings_privacy_bar_button_bg_color',
            'type'     => 'color',
            'title'    => esc_html__('Button Color - Privacy Bar','moppers'),
            'subtitle' => esc_html__('Custom background color for the button inside the privacy bar.','moppers'),
            'required' => array('general_settings_privacy_bar', '=', true), 
        ),
        array(
            'id'       => 'general_settings_privacy_bar_button_text_color',
            'type'     => 'color',
            'title'    => esc_html__('Button Text Color - Privacy Bar','moppers'),
            'subtitle' => esc_html__('Custom text color on the button inside the privacy bar.','moppers'),
            'required' => array('general_settings_privacy_bar', '=', true), 
        ),    
    ),
));