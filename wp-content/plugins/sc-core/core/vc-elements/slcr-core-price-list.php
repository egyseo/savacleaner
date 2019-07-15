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
 * Element Description: VC Slcr Price
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Price')) {
    class Slcr_Price extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_price', array(
                $this,
                'slcr_price_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_price_scripts'
            ) , 1);
        }
        function slcr_price_callback($atts, $content = null)
        {
            extract(shortcode_atts(array( 
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
            
             
                $output.= '
                <div class="slcr_price_list' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>';
                    $output.= do_shortcode($content);
                    $output.= '
                </div>'; 
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
        function slcr_price_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_team_css', plugins_url($css_path . 'content-price' . $ext . '.css', __FILE__));
            wp_register_script('slcr_team_js', plugins_url($js_path . 'content-price' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Price; 
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Price extends WPBakeryShortCodesContainer
        {
        }
    }
}