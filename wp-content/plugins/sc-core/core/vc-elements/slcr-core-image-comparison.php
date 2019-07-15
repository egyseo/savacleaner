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
 * Element Description: VC Slcr Image Comparison Data
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Slcr_Image_Comparison_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_image_comparison', array(
            $this,
            'slcr_image_comparison_element_html'
        ));
    }
    // ************************   Team title element setting   ***************************//
    // Element HTML Team title
    public function slcr_image_comparison_element_html($atts)
    {
        // Params extraction
        extract(shortcode_atts(array(
            'himg' => '',
            'himg2' => '',
            'handle_color' => '',
            'handle_icon_color' => '',
            'css' => '',
            'el_id' => '',
            'el_class' => '',
            'slcr_img_link_template' => '',
            'slcr_img_link_template2' => '',
        ) , $atts));
        $img_url = wp_get_attachment_image_src($himg, "full");
        $img_url2 = wp_get_attachment_image_src($himg2, "full");
        if (!empty($slcr_img_link_template) && empty($img_url[0])) {
            if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                $img_url[0] = $slcr_img_link_template; 
            } 
        }
        if (!empty($slcr_img_link_template2) && empty($img_url2[0])) {
            if (filter_var($slcr_img_link_template2, FILTER_VALIDATE_URL)) { 
                $img_url2[0] = $slcr_img_link_template2; 
            } 
        }
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts); 
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // condition for   handle_color color value
        if ($handle_color == "") {
            $rhandle_color = "";
        }
        else {
            $rhandle_color = 'background: ' . esc_attr($handle_color) . ' !important;';
        }
        // condition for   handle_icon_color color value
        if ($handle_icon_color == "") {
            $rhandle_icon_color = "";
        }
        else {
            $rhandle_icon_color = ' color: ' . esc_attr($handle_icon_color) . '  !important;';
        }
        $uid2 = uniqid();
        $slcr_comparison_css_last = '#comparison_slcr_' . $uid2 . ':after{' . $rhandle_color . '' . $rhandle_icon_color . '} #comparison_slcr_' . $uid2 . '{' .$rhandle_color . '}';
        $output = ' 
        <div class="image-comparison ' . esc_attr($css_class) . '  '. esc_attr($el_class). ' " ' . implode(' ', $wrapper_attributes) . ' >
            <!-- IMAGE 1 -->
            <figure class="comp-img-one">
                <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Comparison Image 1','sc-core').'">
            </figure>
            <!-- IMAGE 2 -->
            <figure class="comp-img-two">
                <img src="' . esc_url($img_url2[0]) . '" alt="'. esc_attr__('Comparison Image 2','sc-core').'">
            </figure>
            <span class="handle"  id="comparison_slcr_' . $uid2 . '"></span>
        </div>'; 
        $name="inline_slcr";
        $value=$slcr_comparison_css_last;
        do_action( 'wp_enqueue_scripts',$value,$name);
        return $output;
    }
}
// Element Class Init
new Slcr_Image_Comparison_Data();
?>