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
 * Element Description: Slcr Carousel
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_carousel')) {
    class Slcr_Carousel extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_carousel', array(
                $this,
                'slcr_carousel_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_carousel_scripts'
            ) , 1);
        }
        function slcr_carousel_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'slcr_carousel_loop' => '',
                'slcr_carousel_margin' => '', 
                'slcr_carousel_autoplay' => '',
                'slcr_carousel_stage_padding' => '',
                'slcr_carousel_css_animation_in' => '',
                'slcr_carousel_css_animation_out' => '',
                'slcr_carousel_smartspeed' => '', 
                'slcr_carousel_no_item_mob' => '',
                'slcr_carousel_nav_mob' => '',
                'slcr_carousel_dots_mob' => '',
                'slcr_carousel_no_item_tab' => '',
                'slcr_carousel_nav_tab' => '',
                'slcr_carousel_dots_tab' => '',
                'slcr_carousel_no_item_pc' => '',
                'slcr_carousel_nav_pc' => '',
                'slcr_carousel_dots_pc' => '',
                'el_id' => '',
                'el_class' => '',
                'css' => '',  
            ) , $atts)); 
            $rslcr_carousel_dots = 'true'; 
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            if ($slcr_carousel_loop == 'true') {
                $rslcr_carousel_loop = 'true';
            }
            else {
                $rslcr_carousel_loop = 'false';
            }
            if ($slcr_carousel_margin == '') {
                $rslcr_carousel_margin = '0';
            }
            else {
                $rslcr_carousel_margin = $slcr_carousel_margin;
            } 
            if ($slcr_carousel_autoplay == 'true') {
                $rslcr_carousel_autoplay = 'true';
            }
            else {
                $rslcr_carousel_autoplay = 'false';
            }
            if ($slcr_carousel_stage_padding == '') {
                $rslcr_carousel_stage_padding = '0';
            }
            else {
                $rslcr_carousel_stage_padding = $slcr_carousel_stage_padding;
            }
            if ($slcr_carousel_css_animation_in == '') {
                $rslcr_carousel_css_animation_in = '';
            }
            else {
                $rslcr_carousel_css_animation_in = $slcr_carousel_css_animation_in;
            }
            if ($slcr_carousel_css_animation_out == '') {
                $rslcr_carousel_css_animation_out = '';
            }
            else {
                $rslcr_carousel_css_animation_out = $slcr_carousel_css_animation_out;
            }
            if ($slcr_carousel_smartspeed == '') {
                $rslcr_carousel_smartspeed = '850';
            }
            else {
                $rslcr_carousel_smartspeed = $slcr_carousel_smartspeed;
            }
            if ($slcr_carousel_no_item_mob == '') {
                $rslcr_carousel_no_item_mob = '1';
            }
            else {
                $rslcr_carousel_no_item_mob = $slcr_carousel_no_item_mob;
            }
            if ($slcr_carousel_nav_mob == 'true') {
                $rslcr_carousel_nav_mob = 'true';
            }
            else {
                $rslcr_carousel_nav_mob = 'false';
            }
            if ($slcr_carousel_dots_mob == 'true') {
                $rslcr_carousel_dots_mob = 'true';
            }
            else {
                $rslcr_carousel_dots_mob = 'false';
            }           
            if ($slcr_carousel_no_item_tab == '') {
                $rslcr_carousel_no_item_tab = '1';
            }
            else {
                $rslcr_carousel_no_item_tab = $slcr_carousel_no_item_tab;
            }
            if ($slcr_carousel_nav_tab == 'true') {
                $rslcr_carousel_nav_tab = 'true';
            }
            else {
                $rslcr_carousel_nav_tab = 'false';
            }
            if ($slcr_carousel_dots_tab == 'true') {
                $rslcr_carousel_dots_tab = 'true';
            }
            else {
                $rslcr_carousel_dots_tab = 'false';
            }
            if ($slcr_carousel_no_item_pc == '') {
                $rslcr_carousel_no_item_pc = '1';
            }
            else {
                $rslcr_carousel_no_item_pc = $slcr_carousel_no_item_pc;
            }
            if ($slcr_carousel_nav_pc == 'true') {
                $rslcr_carousel_nav_pc = 'true';
            }
            else {
                $rslcr_carousel_nav_pc = 'false';
            }
            if ($slcr_carousel_dots_pc == 'true') {
                $rslcr_carousel_dots_pc = 'true';
            }
            else {
                $rslcr_carousel_dots_pc = 'false';
            }
              
                $output = ' 
                <div class="owl owl-carousel carousel-shortcode ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' data-carousel-loop="'.esc_attr($rslcr_carousel_loop).'" data-carousel-dots="'.esc_attr($rslcr_carousel_dots).'" data-carousel-margin="'.esc_attr($rslcr_carousel_margin).'" data-carousel-autoplay="'.esc_attr($rslcr_carousel_autoplay).'" data-carousel-responsiveClass="true" data-carousel-stage-padding="'.esc_attr($rslcr_carousel_stage_padding).'" data-carousel-ani-i="'.esc_attr($rslcr_carousel_css_animation_in).'" data-carousel-ani-o="'.esc_attr($rslcr_carousel_css_animation_out).'" data-carousel-animateIn="'.esc_attr($rslcr_carousel_css_animation_in).'" data-carousel-animateOut="'.esc_attr($rslcr_carousel_css_animation_out).'" data-carousel-smartspeed="'.esc_attr($rslcr_carousel_smartspeed).'" data-carousel-items-mob="'.esc_attr($rslcr_carousel_no_item_mob).'" data-carousel-items-tab="'.esc_attr($rslcr_carousel_no_item_tab).'" data-carousel-items-pc="'.esc_attr($rslcr_carousel_no_item_pc).'" data-carousel-nav-mob="'.esc_attr($rslcr_carousel_nav_mob).'" data-carousel-nav-tab="'.esc_attr($rslcr_carousel_nav_tab).'" data-carousel-nav-pc="'.esc_attr($rslcr_carousel_nav_pc).'" data-carousel-dots-mob="'.esc_attr($rslcr_carousel_dots_mob).'" data-carousel-dots-tab="'.esc_attr($rslcr_carousel_dots_tab).'" data-carousel-dots-pc="'.esc_attr($rslcr_carousel_dots_pc).'">';
                    $output.= do_shortcode($content);    
                    $output.= '
                </div>'; 
           
            return $output;
        }
        function slcr_carousel_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_carousel_css', plugins_url($css_path . 'slcr_carousel' . $ext . '.css', __FILE__));
            wp_register_script('slcr_carousel_js', plugins_url($js_path . 'slcr_carousel' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Carousel;
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Carousel extends WPBakeryShortCodesContainer
        {
        }
    } 
}