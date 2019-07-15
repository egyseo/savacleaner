<?php 
/** 
 * The SlashCreative Redux Social Media Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Social Media Settings Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Social Media','moppers'),
    'id'               => 'social_media',
    'desc'             => __('Enter your social URLs here and manage from Header and Footer tabs. ','moppers').'<br/> <strong>'.__('Remember to include the "http://" in every URL','moppers').'</strong>',
    'customizer_width' => '400px',
    'icon'             => 'icons-share',
    'fields'           => array(
        array(
            'id'       => 'social-media-facebook-url',
            'type'     => 'text',
            'title'    => esc_html__('Facebook URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Facebook URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-twitter-url',
            'type'     => 'text',
            'title'    => esc_html__('Twitter URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Twitter URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-google-plus-url',
            'type'     => 'text',
            'title'    => esc_html__('Google+ URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Google+ URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-vimeo-url',
            'type'     => 'text',
            'title'    => esc_html__('Vimeo URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Vimeo URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-dribbble-url',
            'type'     => 'text',
            'title'    => esc_html__('Dribbble URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Dribbble URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-pinterest-url',
            'type'     => 'text',
            'title'    => esc_html__('Pinterest URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Pinterest URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-youtube-url',
            'type'     => 'text',
            'title'    => esc_html__('Youtube URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Youtube URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-tumblr-url',
            'type'     => 'text',
            'title'    => esc_html__('Tumblr URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Tumblr URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-linkedin-url',
            'type'     => 'text',
            'title'    => esc_html__('LinkedIn URL','moppers'),
            'subtitle' => esc_html__('Please enter in your LinkedIn URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-rss-url',
            'type'     => 'text',
            'title'    => esc_html__('RSS URL','moppers'),
            'subtitle' => esc_html__('If you have an external RSS feed such as Feedburner, please enter it here. Will use built in WordPress feed if left blank.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-behance-url',
            'type'     => 'text',
            'title'    => esc_html__('Behance URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Behance URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-flickr-url',
            'type'     => 'text',
            'title'    => esc_html__('Flickr URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Flickr URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-spotify-url',
            'type'     => 'text',
            'title'    => esc_html__('Spotify URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Spotify URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-instagram-url',
            'type'     => 'text',
            'title'    => esc_html__('Instagram URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Instagram URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-github-url',
            'type'     => 'text',
            'title'    => esc_html__('GitHub URL','moppers'),
            'subtitle' => esc_html__('Please enter in your GitHub URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-stackexchange-url',
            'type'     => 'text',
            'title'    => esc_html__('StackExchange URL','moppers'),
            'subtitle' => esc_html__('Please enter in your StackExchange URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-soundcloud-url',
            'type'     => 'text',
            'title'    => esc_html__('SoundCloud URL','moppers'),
            'subtitle' => esc_html__('Please enter in your SoundCloud URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-vk-url',
            'type'     => 'text',
            'title'    => esc_html__('VK URL','moppers'),
            'subtitle' => esc_html__('Please enter in your VK URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-vine-url',
            'type'     => 'text',
            'title'    => esc_html__('Vine URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Vine URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-houzz-url',
            'type'     => 'text',
            'title'    => esc_html__('Houzz URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Houzz URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-yelp-url',
            'type'     => 'text',
            'title'    => esc_html__('Yelp URL','moppers'),
            'subtitle' => esc_html__('Please enter in your Yelp URL.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-email-url',
            'type'     => 'text',
            'title'    => esc_html__('Email link','moppers'),
            'subtitle' => esc_html__('Please enter in your URL link.','moppers'),
            'desc'     => '',
        ),
        array(
            'id'       => 'social-media-phone-url',
            'type'     => 'text',
            'title'    => esc_html__('Phone Link','moppers'),
            'subtitle' => esc_html__('Please enter in your Phone link.','moppers'),
            'desc'     => '',
        ),

    ),
));