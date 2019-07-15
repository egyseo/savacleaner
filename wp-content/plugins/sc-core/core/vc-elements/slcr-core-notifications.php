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
 * Element Description: Slcr Notifications
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Notifications')) {
    class Slcr_Notifications extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_notifications', array(
                $this,
                'slcr_notifications_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_notifications_scripts'
            ) , 1);
        }
        function slcr_notifications_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'slcr_notification_position' => '',
                'slcr_notification_delay' => '',
                'slcr_notification_width' => '',
                'slcr_notification_margin' => '',
                'slcr_notification_icon_color' => '',
                'el_id' => '',
                'el_class' => '',
                'css' => '',
            ) , $atts));
            $output = "";
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            if ('' !== $el_class) {
                $rel_class = ' ' . str_replace('.', '', $el_class);
            }
            else {
                $rel_class = ' ';
            }
            if ($slcr_notification_position == "bottom-left") {
                $rslcr_notification_position = "bottom-left";
            }
            elseif ($slcr_notification_position == "top-left") {
                $rslcr_notification_position = "top-left";
            }
            elseif ($slcr_notification_position == "top-right") {
                $rslcr_notification_position = "top-right";
            }
            elseif ($slcr_notification_position == "center") {
                $rslcr_notification_position = "center";
            }
            else {
                $rslcr_notification_position = "bottom-right";
            }
            if ($slcr_notification_delay == "") {
                $rslcr_notification_delay = "2000";
            }
            else {
                $rslcr_notification_delay = $slcr_notification_delay;
            }
            if ($slcr_notification_width == "") {
                $rslcr_notification_width = "350px";
            }
            else {
                $slcr_notification_width=apply_filters( 'slcr_value_parameter_filter', $slcr_notification_width);
                $rslcr_notification_width = $slcr_notification_width;
            }
            if ($slcr_notification_margin == "") {
                $slcr_notification_margin = "20px";
            }
            else {
                $slcr_notification_margin=apply_filters( 'slcr_value_parameter_filter', $slcr_notification_margin);
                $slcr_notification_margin = $slcr_notification_margin;
            }
            if ($slcr_notification_icon_color == "") {
                $rslcr_notification_icon_color = "#000";
            }
            else {
                $rslcr_notification_icon_color = $slcr_notification_icon_color;
            }
            $uid2 = uniqid();
            $slcr_custom_notification_css = '.slcr_custom_notification_css' . $uid2 . ' {  width: ' . esc_attr($rslcr_notification_width) . '; margin: ' . esc_attr($slcr_notification_margin) . '; } .slcr_custom_notification_css' . $uid2 . ' .notification-close {  color: ' . esc_attr($rslcr_notification_icon_color) . '; }';
            $name="inline_slcr";
            $value=$slcr_custom_notification_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            $output.= '
                <div class="notification ' . esc_attr($rel_class) . '' . esc_attr($css_class) . ' slcr_custom_notification_css' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '  data-notification-pos="' . esc_attr($rslcr_notification_position) . '" data-notification-delay="' . esc_attr($rslcr_notification_delay) . '">
                    <div class="notification-close" >x</div>';
                        $output.= do_shortcode($content);
                        $output.= '
                </div>';
            return $output;
        }
        function slcr_notifications_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_notifications_css', plugins_url($css_path . 'content-box' . $ext . '.css', __FILE__));
            wp_register_script('slcr_notifications_js', plugins_url($js_path . 'content-box' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Notifications;
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Notifications extends WPBakeryShortCodesContainer
        {
        }
    } 
}