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
 * Element Description: Slcr Progress Bars Data
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Slcr_Progress_Bars_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_progress_bars', array(
            $this,
            'slcr_progress_bars_element_html'
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_progress_bars_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'typed_text_front_text' => '',
            'front_text_font_size' => '',
            'front_text_text_transform' => '',
            'front_text_padding_top' => '',
            'front_text_padding_left' => '',
            'front_text_use_theme_fonts' => '',
            'front_text_google_font_select' => '',
            'front_text_font_color' => '',
            'front_progress_type' => '',
            'front_progress_color' => '',
            'front_progress_value' => '',
            'show_progress_count' => '',
            'progress_count_color' => '',
            'progress_bg_color' => '',
            'slcr_progress_color_type' => '',
            'front_progress_color_gradient' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
        ) , $atts)); 
        $uid2 = uniqid();
        $iddata = 'slcr-progress-' . $uid2 ;
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
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
        $rfront_progress_color_gradient="";
        $rfront_progress_color = "";
        // condition for   front_text text color value
        if ($slcr_progress_color_type == "gradient") {
            if($front_progress_color_gradient=="progress--Gradient-2"){
                $rfront_progress_color_gradient = " ".$front_progress_color_gradient;
            }else{
                $rfront_progress_color_gradient = " progress--Gradient-1";
            }
        }
        else {
             // condition for   front_text text color value
            if ($front_progress_color == "") {
                $rfront_progress_color = "";
            }
            else {
                $rfront_progress_color = " background: " . $front_progress_color . " !important;";
            }
        }
        
         // condition for   show_progress_count  value
        if ($show_progress_count == "Yes") {
            $rshow_progress_count = '';
        }
        else {
            $rshow_progress_count = ' display: none;';
            
        } 
        if ($progress_count_color == "") {
            $rprogress_count_color = '';
            $irprogress_count_color = "rgba(255, 255, 255, 0)";
            }
            else {
            $rprogress_count_color = '  background: ' . $progress_count_color . ' !important;';
            $irprogress_count_color = $progress_count_color;
            }

        
        if ($progress_bg_color == "") {
            $rprogress_bg_color = ' background-color: #f5f5f5;';
            
        }
        else {
            $rprogress_bg_color = ' background: ' . $progress_bg_color . ' !important;';
            
        }
        $uid2 = uniqid();
        $slcr_progress_bar_css_last = '#slcr_progress_bar' . $uid2 . ' .progress-bar span:after { bottom: 100%; left: 50%; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; border-color: rgba(255, 255, 255, 0); border-bottom-color:'.esc_attr($irprogress_count_color).'; border-width: 5px; margin-left: -5px; } #slcr_progress_bar' . $uid2 . ' { '.esc_attr($rprogress_bg_color).' } #slcr_progress_bar' . $uid2 . ' .progress-bar { ' . esc_attr($rfront_progress_color) . ' } #slcr_progress_bar' . $uid2 . ' .progress-bar .progress-count { ' . esc_attr($rshow_progress_count) . ''.esc_attr($rprogress_count_color).' } #slcr_progress_bar_progressText_' . $uid2 . ' { ' . esc_attr($rfront_text_font_size) . '' . esc_attr($rfront_text_font_color) . '' . esc_attr($rfront_text_padding_top) . '' . esc_attr($rfront_text_padding_left) . '' . esc_attr($r2front_text_text_transform) . ' ' . esc_attr($front_text_font_inline_style) . ' }'; 
        $output = '
            <div class="progress_container ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' >
                <span class="progressText" id="slcr_progress_bar_progressText_' . $uid2 .'">' . esc_html($typed_text_front_text) . '</span>
                <div class="progress progress-' . esc_attr($front_progress_type) . '" id="slcr_progress_bar' . $uid2 .'">
                    <div class="progress-bar main-theme'. esc_attr($rfront_progress_color_gradient) .'" role="progressbar" id="'.esc_attr($iddata).'" data-progressdata="'.esc_attr($iddata).'" aria-valuenow="' . esc_attr($front_progress_value) . '" aria-valuemin="0" aria-valuemax="100">
                        <span class="progress-count">' . esc_html($front_progress_value) . '%</span>
                    </div>
                </div>
            </div>'; 
        $name="inline_slcr";
        $value=$slcr_progress_bar_css_last;
        do_action( 'wp_enqueue_scripts',$value,$name);
        return $output;
    }
    // ********************************//
    // GOOGLE FONTS PRIVATE FUNCTIONS //
    // ********************************//
    // Build the string of values in an Array
    public function getFontsData($fontsString)
    {
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();
        $fieldSettings = array();
        $fontsData = strlen($fontsString) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes($fieldSettings, $fontsString) : '';
        return $fontsData;
    }
    // Build the inline style starting from the data
    public function googleFontsStyles($fontsData)
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
    public function enqueueGoogleFonts($fontsData)
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
new Slcr_Progress_Bars_Data();
?>