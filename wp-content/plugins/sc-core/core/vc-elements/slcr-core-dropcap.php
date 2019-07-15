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
 * Element Description: Slcr Dropcap
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Dropcap')) {
    class Slcr_Dropcap extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_dropcap', array(
                $this,
                'slcr_dropcap_callback'
            )); 
        }
        function slcr_dropcap_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'title' => '',
                'title_font_size' => '',
                'title_padding_left' => '',
                'title_use_theme_fonts' => '',
                'title_google_font_select' => '',
                'title_font_color' => '',
                'title_dropcap_bg_color' => '',
                'slcr_dropcap_bradius' => '',
                'slcr_dropcap_height_width' => '',
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
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            // get custom css value
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
            // condition for  title text size value
            if ($title_font_size == "") {
                $rtitle_font_size = "";
            }
            else {
                $title_font_size=apply_filters( 'slcr_value_parameter_filter', $title_font_size);
                $rtitle_font_size = ' font-size: ' . $title_font_size . ' !important;';
            }
            // condition for   title text color value
            if ($title_font_color == "") {
                $rtitle_font_color = "";
            }
            else {
                $rtitle_font_color = ' color: ' . $title_font_color . ' !important;';
            }
            if ($slcr_dropcap_bradius == "") {
                $rslcr_dropcap_bradius = "";
            }
            else {
                $slcr_dropcap_bradius=apply_filters( 'slcr_value_parameter_filter', $slcr_dropcap_bradius);
                $rslcr_dropcap_bradius = ' border-radius: ' . $slcr_dropcap_bradius . ' !important;';
            }
            if ($title_dropcap_bg_color == "") {
                $rtitle_dropcap_bg_color = "";
            }
            else {
                $rtitle_dropcap_bg_color = ' background: ' . $title_dropcap_bg_color . ' !important;';
            } 
            if ($slcr_dropcap_height_width == "") {
                $rslcr_dropcap_height_width = "";
            }
            else {
                $slcr_dropcap_height_width=apply_filters( 'slcr_value_parameter_filter', $slcr_dropcap_height_width);
                $rslcr_dropcap_height_width = " height: " . $slcr_dropcap_height_width . " !important; width: " . $slcr_dropcap_height_width . " !important; line-height: " . $slcr_dropcap_height_width . " !important;";
            }
            $uid2 = uniqid();
            $slcr_custom_dropcap_css = '.slcr_custom_dropcap_css' . $uid2 . '{ ' . esc_attr($rslcr_dropcap_height_width) . ' ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_dropcap_bg_color) . '' . esc_attr($rslcr_dropcap_bradius) . ' '.esc_attr($title_font_inline_style).' }';
            $name="inline_slcr";
            $value=$slcr_custom_dropcap_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output = "";
            $output.= '
                <span class="dropcap__main with-background ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_dropcap_css' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>' . esc_html( $title ) . '</span> <p>' . wp_kses($content, $allowed_html) . '</p>';
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
    }
    // Finally initialize code
    new Slcr_Dropcap;
}