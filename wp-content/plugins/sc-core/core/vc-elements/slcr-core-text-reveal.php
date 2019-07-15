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
 * Element Description: Slcr Text Reveal
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Text_Reveal')) {
    class Slcr_Text_Reveal extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_text_reveal', array(
                $this,
                'slcr_text_reveal_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_text_reveal_scripts'
            ) , 1);
        }
        function slcr_text_reveal_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'animation_delay' => '',
                'animation_duration' => '',
                'reveal_bg_color' => '',
                'title' => '',
                'title_font_size' => '',
                'title_text_transform' => '',
                'title_padding_top' => '',
                'title_padding_left' => '',
                'title_use_theme_fonts' => '',
                'title_google_font_select' => '',
                'title_font_color' => '', 
                'el_class' => '',
                'css' => '',
            ) , $atts)); 
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            // **********************************google font for a title *****************************************
            if ($title_use_theme_fonts == "Yes") {
                // Build the data array
                $title_font_data = $this->getFontsData($title_google_font_select);
                // Build the inline style
                $title_font_inline_style = $this->googleFontsStyles($title_font_data);
                // Enqueue the right font
                $this->enqueueGoogleFonts($title_font_data);
            }
            else {
                $title_font_inline_style = "";
            }
            // get   title text transform value
            if ($title_text_transform == "Default") {
                $rtitle_text_transform = "";
            }
            else {
                $rtitle_text_transform = $title_text_transform;
            }
            // condition for  title text size value
            if ($title_font_size == "") {
                $rtitle_font_size = "";
            }
            else {
                $title_font_size=apply_filters( 'slcr_value_parameter_filter', $title_font_size);
                $rtitle_font_size = " font-size: " . $title_font_size . ";";
            }
            // condition for   title text color value
            if ($title_font_color == "") {
                $rtitle_font_color = "";
            }
            else {
                $rtitle_font_color = " color: " . $title_font_color . ";";
            }
            // condition for   title text padding top  bottom value
            if ($title_padding_top == "") {
                $rtitle_padding_top = "";
            }
            else {
                $title_padding_top=apply_filters( 'slcr_value_parameter_filter', $title_padding_top);
                $rtitle_padding_top = " padding-top: " . $title_padding_top . "; padding-bottom: " . $title_padding_top . ";";
            }
            // condition for   title text padding left right value
            if ($title_padding_left == "") {
                $rtitle_padding_left = "";
            }
            else {
                $title_padding_left=apply_filters( 'slcr_value_parameter_filter', $title_padding_left);
                $rtitle_padding_left = " padding-left: " . $title_padding_left . "; padding-right: " . $title_padding_left . ";";
            }
            // condition for   title text transform  value
            if ($rtitle_text_transform == "") {
                $r2title_text_transform = "";
            }
            else {
                $r2title_text_transform = " text-transform: " . $rtitle_text_transform . ";";
            }
            // get   title text transform value
            if ($animation_delay == "") {
                $ranimation_delay = " animation-delay: 1000ms; -webkit-animation-delay: 1000ms; ";
            }
            else {
                $ranimation_delay = " -webkit-animation-delay: " . $animation_delay . "; animation-delay: " . $animation_delay . ";";
            }
            if ($animation_duration == "") {
                $ranimation_duration = " animation-duration: 1000ms; -webkit-animation-duration: 1000ms; ";
            }
            else {
                $ranimation_duration = " -webkit-animation-duration: " . $animation_duration . "; animation-duration: " . $animation_duration . ";";
            }
            if ($reveal_bg_color == "") {
                $rreveal_bg_color = "";
            }
            else {
                $rreveal_bg_color = " background-color: " . $reveal_bg_color . ";";
            }
            $output = "";
            $uid2 = uniqid();
            $slcr_reveal_css_last = ' #slcr_reveal_' . $uid2 . '.revealed, #slcr_reveal_' . $uid2 . '.revealed:after { visibility: visible; ' . esc_attr($ranimation_delay) . ' -webkit-animation-iteration-count: 1; animation-iteration-count: 1; ' . esc_attr($ranimation_duration) . ' -webkit-animation-fill-mode: both; animation-fill-mode: both; -webkit-animation-timing-function: cubic-bezier(0.0, 0.0, 0.2, 1); animation-timing-function: cubic-bezier(0.0, 0.0, 0.2, 1); } #slcr_reveal_' . $uid2 . '.revealed:after { content: ""; position: absolute; z-index: 999; top: 0; left: 0; right: 0; bottom: 0; ' . esc_attr($rreveal_bg_color) . ' -webkit-transform: scaleX(0); transform: scaleX(0); -webkit-transform-origin: 0 50%; transform-origin: 0 50%; pointer-events: none; -webkit-animation-name: background-reveal; animation-name: background-reveal; } #slcr_reveal_' . $uid2 . '.delay-1, #slcr_reveal_' . $uid2 . '.delay-1:after { ' . esc_attr($ranimation_delay) . ' ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . '' . esc_attr($title_font_inline_style) . ' }';
            $output.= '
                <div class="animated_text">
                    <h2 class="reveal_text delay-1' . esc_attr($css_class) . ' '. esc_attr($el_class). '" id="slcr_reveal_' . $uid2 . '">' . esc_html( $title ) . ' </h2>
                </div> '; 
            $name="inline_slcr";
            $value=$slcr_reveal_css_last;
            do_action( 'wp_enqueue_scripts',$value,$name);
            return $output;
        }
        // ********************************//
        // GOOGLE FONTS PRIVATE FUNCTIONS //
        // ********************************//
        // Build the string of values in an Array
        protected function getFontsData($fontsString)
        {
            // Font data Extraction
            $googleFontsParam = new Vc_Google_Fonts();
            $fieldSettings = array();
            $fontsData = strlen($fontsString) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes($fieldSettings, $fontsString) : '';
            return $fontsData;
        }
        // Build the inline style starting from the data
        protected function googleFontsStyles($fontsData)
        {
            // Inline styles
            $fontFamily = explode(':', $fontsData['values']['font_family']);
            $styles[] = 'font-family:' . $fontFamily[0];
            $fontStyles = explode(':', $fontsData['values']['font_style']);
            $styles[] = 'font-weight:' . $fontStyles[1];
            $styles[] = 'font-style:' . $fontStyles[2];
            $inline_style = '';
            foreach($styles as $attribute) {
                $inline_style.= $attribute . '; ';
            }
            return $inline_style;
        }
        // Enqueue right google font from Googleapis
        protected function enqueueGoogleFonts($fontsData)
        {
            // Get extra subsets for settings (latin/cyrillic/etc)
            $settings = get_option('wpb_js_google_fonts_subsets');
            if (is_array($settings) && !empty($settings)) {
                $subsets = '&subset=' . implode(',', $settings);
            }
            else {
                $subsets = '';
            }
            // We also need to enqueue font from googleapis
            if (isset($fontsData['values']['font_family'])) {
                wp_enqueue_style('vc_google_fonts_' . vc_build_safe_css_class($fontsData['values']['font_family']) , '//fonts.googleapis.com/css?family=' . $fontsData['values']['font_family'] . $subsets);
            }
        }
        function slcr_text_reveal_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_text_reveal_css', plugins_url($css_path . 'content-price' . $ext . '.css', __FILE__));
            wp_register_script('slcr_text_reveal_js', plugins_url($js_path . 'content-price' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Text_Reveal;
}