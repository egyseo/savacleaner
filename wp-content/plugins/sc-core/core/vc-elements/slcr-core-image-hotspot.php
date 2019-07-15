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
 * Element Description: VC Slcr Image Hotspot
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Image_Hotspot')) {
    class Slcr_Image_Hotspot extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_image_hotspot', array(
                $this,
                'slcr_image_hotspot_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_image_hotspot_scripts'
            ) , 1);
        }
        function slcr_image_hotspot_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'hotspot_image' => '',
                'hotspot_open' => '',
                'add_shadow' => '',
                'add_animation' => '',
                'css' => '',
                'el_id' => '',
                'el_class' => '',
                'slcr_img_link_template' => '',
            ) , $atts));
            $output = "";
            $img_url = wp_get_attachment_image_src($hotspot_image, "full");
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            }
            if ($hotspot_open == 'hover') {
                $rhotspot_open = "hover";
            }
            else {
                $rhotspot_open = "click";
            }
            if ($add_animation == 'true') {
                $radd_animation = "true";
            }
            else {
                $radd_animation = "false";
            }
            if ($add_shadow == 'true') {
                $radd_shadow = "true";
            }
            else {
                $radd_shadow = "false";
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $output.= ' 
                <figure class="image_hotspots ' . esc_attr($rhotspot_open) . '' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' data-hotspot-animation="' . esc_attr($radd_animation) . '" data-tooltip-shadow="' . esc_attr($radd_shadow) . '">
                    <img class="" src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Hotspot','sc-core').'" />';
                                $output.= do_shortcode($content);
                    $output.= '
                </figure>';
            return $output;
        }
        function slcr_image_hotspot_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_image_hotspot_team_css', plugins_url($css_path . 'content-testimonial' . $ext . '.css', __FILE__));
            wp_register_script('slcr_image_hotspot_team_js', plugins_url($js_path . 'content-testimonial' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Image_Hotspot;
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Image_Hotspot extends WPBakeryShortCodesContainer
        {
        }
    } 
}