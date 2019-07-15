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
 * Element Description: Slcr Testimonial
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Testimonial')) {
    class Slcr_Testimonial extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_testimonial', array(
                $this,
                'slcr_testimonial_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_testimonial_scripts'
            ) , 1);
        }
        function slcr_testimonial_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'testimonials_type' => '',
                'el_id' => '',
                'el_class' => '',
                'css' => '',
            ) , $atts));
            $output = "";
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            if (!empty($el_id)) {
                $rel_id = 'id="' . esc_attr($el_id) . '"';
            }
            else {
                $rel_id = "";
            }
            if ('' !== $el_class) {
                $rel_class = ' ' . str_replace('.', '', $el_class);
            }
            else {
                $rel_class = ' ';
            }
            switch ($testimonials_type) {
            case 'Testimonials_Type_2':
                $output.= '
                <div class="owl owl-carousel testimonial_02' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id .'>';
                    $output.= do_shortcode($content);
                    $output.= ' 
                </div> ';
                break;

            case 'Testimonials_Type_3':
                $output.= '
                <div class="owl owl-carousel testimonial_03' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>';
                    $output.= do_shortcode($content);
                    $output.= ' 
                </div> ';
                break;

            case 'Testimonials_Type_4':
                $output.= '
                <div class="owl owl-carousel testimonial_04'. esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id .'>';
                $output.= do_shortcode($content);
                $output.= ' 
                </div> ';
                break;

            case 'Testimonials_Type_5':
                $output.= '
                <div class="testimonials-container masonry'. esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '> ';
                $output.= do_shortcode($content);
                $output.= ' 
                </div> ';
                break;

            case 'Testimonials_Type_6':
                $output.= do_shortcode($content);
                break;

            default:
                $output.= '        
                <div class="owl owl-carousel testimonial_01">';
                $output.= do_shortcode($content);
                $output.= ' 
                </div> ';
                break;
            }
            return $output;
        } 
        function slcr_testimonial_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_team_css', plugins_url($css_path . 'content-testimonial' . $ext . '.css', __FILE__));
            wp_register_script('slcr_team_js', plugins_url($js_path . 'content-testimonial' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Testimonial;
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Testimonial extends WPBakeryShortCodesContainer
        {
        }
    } 
}



