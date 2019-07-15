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
 * Element Description: VC Slcr Instagram Feed Data
 */
if (!defined('ABSPATH')) {
    die('-1');
} 
class Slcr_Instagram_Feed_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_instagram_feed', array(
            $this,
            'slcr_instagram_feed_element_html'
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_instagram_feed_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array( 
            'instagram_grid' => '',
            'instagram_grid_gap' => '',
            'instagram_post_count' => '',
            'css' => '',
            'el_id' => '',
            'el_class' => '',
            'instagram_token' => '', 
        ) , $atts));
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts); 
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        if ($instagram_grid_gap == 'Yes') {
            $rinstagram_grid_gap = 'true';
        }
        else {
            $rinstagram_grid_gap = 'false';
        }
        if ($instagram_grid == '') {
            $rinstagram_grid = '5';
        }
        else {
            $rinstagram_grid = $instagram_grid;
        }
        if ($instagram_post_count == '') {
            $rinstagram_post_count = '10';
        }
        else {
            $rinstagram_post_count = $instagram_post_count;
        } 
        $privacy_consent_class="instagram-feed";
        global $slcr_redux; 
        $output=""; 
        $get_result =apply_filters( 'slcr_cookies_verify_filter', 'insta'); 
        if($get_result=="insta"){
            $output =
            '<div class="instagram__privacy" data-bg-overlay="9">
                <div class="privacy__frame">
                    <i class="privacy__icon socicon-instagram"></i>
                    This content is blocked due to privacy reasons, you need to allow the use of cookies. 
                    <button type="button" class="slcr_cookies_verify_insta" data-privacy_consent="'.$get_result.'" data-days_ex="'.$slcr_redux['general_settings_privacy_cookie_days'].'">I Agree</button>
                </div>
            </div>'; 
        }else {
            $output ='
                <ul class="instagram-wrap '.esc_attr($privacy_consent_class).' ' . esc_attr($css_class) . '  '. esc_attr($el_class). ' " ' . implode(' ', $wrapper_attributes) . '  data-instatoken="' . esc_attr($instagram_token) . '"  data-insta-grid="' . esc_attr($rinstagram_grid) . '" data-grid-gap="' . esc_attr($rinstagram_grid_gap) . '" data-post-count="' . esc_attr($rinstagram_post_count) . '"> 
                </ul>';   
        }
        return $output;
    }
}
// Element Class Init
new Slcr_Instagram_Feed_Data();
?>