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
 * Element Description: Slcr Typed Text Data
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
// Element Class
class Slcr_Typed_Text_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_typed_text', array(
            $this,
            'slcr_typed_text_element_html'
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_typed_text_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'typed_text_speed' => '',
            'typed_text_back_speed' => '',
            'typed_text_loop' => '',
            'typed_text_loop_count' => '',
            'typed_text_start_delay' => '',
            'typed_text_cursor' => '',
            'typed_text_fade_effect' => '',
            'typed_text_front_text' => '',
            'front_text_font_size' => '',
            'front_text_text_transform' => '',
            'front_text_padding_top' => '',
            'front_text_padding_left' => '',
            'front_text_use_theme_fonts' => '',
            'front_text_google_font_select' => '',
            'front_text_font_color' => '',
            'back_text_font_size' => '',
            'back_text_text_transform' => '',
            'back_text_padding_top' => '',
            'back_text_padding_left' => '',
            'back_text_use_theme_fonts' => '',
            'back_text_google_font_select' => '',
            'back_text_font_color' => '',
            'back_content' => '',
            'typed_text_font_weights_static_text_slcr' => '',
            'typed_text_font_weights_typed_text_slcr' => '',
            'front_text_font_size_mobile' => '',
            'back_text_font_size_mobile' => '',
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
        if ($typed_text_loop == "Yes") {
            $rtyped_text_loop = "true";
        }
        else {
            $rtyped_text_loop = "false";
        }
        if ($typed_text_cursor == "Yes") {
            $rtyped_text_cursor = "true";
        }
        else {
            $rtyped_text_cursor = "false";
        }
        if ($typed_text_fade_effect == "Yes") {
            $rtyped_text_fade_effect = "true";
        }
        else {
            $rtyped_text_fade_effect = "false";
        }
        if ($typed_text_speed == "") {
            $rtyped_text_speed = "20";
        }
        else {
            $rtyped_text_speed = $typed_text_speed;
        }
        if ($typed_text_back_speed == "") {
            $rtyped_text_back_speed = "20";
        }
        else {
            $rtyped_text_back_speed = $typed_text_back_speed;
        }
        if ($typed_text_start_delay == "") {
            $rtyped_text_start_delay = "500";
        }
        else {
            $rtyped_text_start_delay = $typed_text_start_delay;
        }
        if ($typed_text_loop_count == "") {
            $rtyped_text_loop_count = "8";
        }
        else {
            $rtyped_text_loop_count = $typed_text_loop_count;
        }
        // **********************************google font for a front_text *****************************************
        if ($front_text_use_theme_fonts == "Yes") {
            // Build the data array
            $front_text_font_data = $this->getFontsData($front_text_google_font_select);
            // Build the inline style
            $front_text_font_inline_style = $this->googleFontsStyles($front_text_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($front_text_font_data);
        }
        else {
            $front_text_font_inline_style = "";
        }
        // get   front_text text transform value
        if ($front_text_text_transform == "Default") {
            $rfront_text_text_transform = "";
        }
        else {
            $rfront_text_text_transform = $front_text_text_transform;
        }
        // condition for  front_text text size value
        if ($front_text_font_size == "") {
            $rfront_text_font_size = "";
        }
        else {
            $front_text_font_size=apply_filters( 'slcr_value_parameter_filter', $front_text_font_size);
            $rfront_text_font_size = " font-size: " . $front_text_font_size . ";";
        }
        // condition for   front_text text color value
        if ($front_text_font_color == "") {
            $rfront_text_font_color = "";
        }
        else {
            $rfront_text_font_color = " color: " . $front_text_font_color . " !important;";
        }
        // condition for   front_text text padding top  bottom value
        if ($front_text_padding_top == "") {
            $rfront_text_padding_top = "";
        }
        else {
            $front_text_padding_top=apply_filters( 'slcr_value_parameter_filter', $front_text_padding_top);
            $rfront_text_padding_top = " padding-top: " . $front_text_padding_top . "; padding-bottom: " . $front_text_padding_top . ";";
        }
        // condition for   front_text text padding left right value
        if ($front_text_padding_left == "") {
            $rfront_text_padding_left = "";
        }
        else {
            $front_text_padding_left=apply_filters( 'slcr_value_parameter_filter', $front_text_padding_left);
            $rfront_text_padding_left = " padding-left: " . $front_text_padding_left . "; padding-right: " . $front_text_padding_left . ";";
        }
        // condition for   front_text text transform  value
        if ($rfront_text_text_transform == "") {
            $r2front_text_text_transform = "";
        }
        else {
            $r2front_text_text_transform = " text-transform: " . $rfront_text_text_transform . ";";
        }
        // **********************************google font for a back_text *****************************************
        if ($back_text_use_theme_fonts == "Yes") {
            // Build the data array
            $back_text_font_data = $this->getFontsData($back_text_google_font_select);
            // Build the inline style
            $back_text_font_inline_style = $this->googleFontsStyles($back_text_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($back_text_font_data);
        }
        else {
            $back_text_font_inline_style = "";
        }
        // get   back_text text transform value
        if ($back_text_text_transform == "Default") {
            $rback_text_text_transform = "";
        }
        else {
            $rback_text_text_transform = $back_text_text_transform;
        }
        // condition for  back_text text size value
        if ($back_text_font_size == "") {
            $rback_text_font_size = "";
        }
        else {
            $back_text_font_size=apply_filters( 'slcr_value_parameter_filter', $back_text_font_size);
            $rback_text_font_size = " font-size: " . $back_text_font_size . ";";
        }
        // condition for   back_text text color value
        if ($back_text_font_color == "") {
            $rback_text_font_color = "";
        }
        else {
            $rback_text_font_color = " color: " . $back_text_font_color . " !important;";
        }
        // condition for   back_text text padding top  bottom value
        if ($back_text_padding_top == "") {
            $rback_text_padding_top = "";
        }
        else {
            $back_text_padding_top=apply_filters( 'slcr_value_parameter_filter', $back_text_padding_top);
            $rback_text_padding_top = " padding-top: " . $back_text_padding_top . "; padding-bottom: " . $back_text_padding_top . ";";
        }
        // condition for   back_text text padding left right value
        if ($back_text_padding_left == "") {
            $rback_text_padding_left = "";
        }
        else {
            $back_text_padding_left=apply_filters( 'slcr_value_parameter_filter', $back_text_padding_left);
            $rback_text_padding_left = " padding-left: " . $back_text_padding_left . "; padding-right: " . $back_text_padding_left . ";";
        }
        // condition for   back_text text transform  value
        if ($rback_text_text_transform == "") {
            $r2back_text_text_transform = "";
        }
        else {
            $r2back_text_text_transform = " text-transform: " . $rback_text_text_transform . ";";
        }

        if ($front_text_font_size_mobile == "") {
            $rfront_text_font_size_mobile = "";
        }
        else {
            $front_text_font_size_mobile=apply_filters( 'slcr_value_parameter_filter', $front_text_font_size_mobile);
            $rfront_text_font_size_mobile = " font-size: " . $front_text_font_size_mobile . " !important;";
        }

        // condition for  back_text text size value
        if ($back_text_font_size_mobile == "") {
            $rback_text_font_size_mobile = "";
        }
        else {
            $back_text_font_size_mobile=apply_filters( 'slcr_value_parameter_filter', $back_text_font_size_mobile);
            $rback_text_font_size_mobile = " font-size: " . $back_text_font_size_mobile . " !important;";
        }

        $uid2 = uniqid();
        $slcr_typed_text_css_last = '  @media (max-width: 767px) { .slcr_typed_text_' . $uid2 . ' .h1.typed-stable { '.esc_attr($rfront_text_font_size_mobile).' } .slcr_typed_text_' . $uid2 . ' .typed-text.h1 { '.esc_attr($rback_text_font_size_mobile).' } } .slcr_typed_text_stable_' . $uid2 . ' { ' . esc_attr($rfront_text_font_size) . '' . esc_attr($rfront_text_font_color) . '' . esc_attr($rfront_text_padding_top) . '' . esc_attr($rfront_text_padding_left) . '' . esc_attr($r2front_text_text_transform) . ' ' . esc_attr($front_text_font_inline_style) . ' } .slcr_typed_text_text_' . $uid2 . ' { white-space:pre;' . esc_attr($rback_text_font_size) . '' . esc_attr($rback_text_font_color) . '' . esc_attr($rback_text_padding_top) . '' . esc_attr($rback_text_padding_left) . '' . esc_attr($r2back_text_text_transform) . ' ' . esc_attr($back_text_font_inline_style) . ' }';
        $name="inline_slcr";
        $value=$slcr_typed_text_css_last;
        do_action( 'wp_enqueue_scripts',$value,$name);
        $rback_html = strip_tags($back_content);
        $rback_html = apply_filters( 'slcr_decode_content_tags_filter', $rback_html);
        $rback_html = rawurldecode($rback_html);
        $allowed_html = slcr_helper()->slcr_allowed_html();
        $uid = uniqid();  
        $output = '
            <div class="typed-wrap ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_typed_text_' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                <h2 class="typed-text-1" id ="slcr_typed_265'.$uid.'" data-type-speed="' . esc_attr($rtyped_text_speed) . '" data-back-speed="' . esc_attr($rtyped_text_back_speed) . '" data-type-loop="' . esc_attr($rtyped_text_loop) . '" data-loop-count="' . esc_attr($rtyped_text_loop_count) . '" data-start-delay="' . esc_attr($rtyped_text_start_delay) . '" data-typed-cursor="' . esc_attr($rtyped_text_cursor) . '" data-fade-effect="' . esc_attr($rtyped_text_fade_effect) . '" data-typed-text="typed_text_' . $uid . '" data-typed-strings="typed_strings_' . $uid . '">
                    <span class="h1 typed-stable '.esc_attr($typed_text_font_weights_static_text_slcr).' slcr_typed_text_stable_' . $uid2 . '">' . esc_html($typed_text_front_text) . '</span>
                    <div class="typed-strings" id="typed_strings_' . $uid . '">
                               ' . wp_kses($rback_html, $allowed_html) . '

                    </div>
                    <span class="typed-text h1 '.esc_attr($typed_text_font_weights_typed_text_slcr).' slcr_typed_text_text_' . $uid2 . '" id="typed_text_' . $uid . '"></span>
                </h2> 
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
}
// Element Class Init
new Slcr_Typed_Text_Data();
?>