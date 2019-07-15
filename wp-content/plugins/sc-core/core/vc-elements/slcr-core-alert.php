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
 * Element Description: Slcr Alert
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Alert')) {
    class Slcr_Alert extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_alert', array(
                $this,
                'slcr_alert_callback'
            )); 
        }
        function slcr_alert_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'alert_border_color' => '',
                'alert_bg_color' => '',
                'slcr_alert_bradius' => '',
                'el_id' => '',
                'el_class' => '',
                'css' => '',
            ) , $atts));
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);

            if ($slcr_alert_bradius == "") {
                $rslcr_alert_bradius = "";
            }
            else {
                $slcr_alert_bradius=apply_filters( 'slcr_value_parameter_filter', $slcr_alert_bradius);
                $rslcr_alert_bradius = ' border-radius: ' . $slcr_alert_bradius . ';';
            }
            if ($alert_bg_color == "") {
                $ralert_bg_color = "";
            }
            else {
                $ralert_bg_color = ' background: ' . $alert_bg_color . ';';
            }
            if ($alert_border_color == "") {
                $ralert_border_color = "";
            }
            else {
                $ralert_border_color = ' border-color: ' . $alert_border_color . ';';
            }
            $uid2 = uniqid();
            $slcr_custom_alert_css = '.slcr_custom_alert_css_' . $uid2 . '{ ' . esc_attr($rslcr_alert_bradius) . '' . esc_attr($ralert_bg_color) . '' . esc_attr($ralert_border_color) . ' }';
            $name="inline_slcr";
            $value=$slcr_custom_alert_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output = "";
            $output.= '
                <div class="alert ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_alert_css_' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                    ' . wp_kses($content, $allowed_html) . '
                </div>';
            return $output;
        }
    }
    // Finally initialize code
    new Slcr_Alert;
}