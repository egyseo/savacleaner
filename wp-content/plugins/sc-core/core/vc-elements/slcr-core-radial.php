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
 * Element Description: Slcr Radial Data
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Slcr_Radial_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_radial', array(
            $this,
            'slcr_radial_element_html'
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_radial_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'radial_type' => '',
            'typed_text_front_text' => '',
            'front_text_font_size' => '',
            'front_text_text_transform' => '',
            'front_text_use_theme_fonts' => '',
            'front_text_google_font_select' => '',
            'front_text_font_color' => '',
            'front_progress_type' => '',
            'front_progress_color' => '',
            'front_progress_track_color' => '',
            'front_progress_value' => '',
            'citype' => '',
            'i_icon_fontawesome' => '',
            'i_icon_openiconic' => '',
            'i_icon_typicons' => '',
            'i_icon_entypo' => '',
            'i_icon_linecons' => '',
            'i_icon_monosocial' => '',
            'i_icon_material' => '',
            'i_icon_flaticon' => '',
            'icon_font_size' => '',
            'count_icon_font_color' => '',
            'use_scale' => '',
            'scale_color' => '',
            'scale_length' => '',
            'radial_size' => '',
            'radial_line_width' => '',
            'radial_animation' => '',
            'radial_angle' => '',
            'radial_line_cap' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
        ) , $atts));
        $icon_wrapper = false;
        $uid2 = uniqid();
        $iddata = 'slcr-radial-' . $uid2 ;
        $icon_html = "";
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
        // condition for   icon text size value
        if ($icon_font_size == "") {
            $ricon_font_size = " font-size: 35px !important;";
        }
        else {
            $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
            $ricon_font_size = " font-size: " . $icon_font_size . " !important;";
        }
        // condition for   icon setting ****************************************
        if ($count_icon_font_color == "") {
            $rcount_icon_font_color = " color: #2865de !important;";
        }
        else {
            $rcount_icon_font_color = " color: " . $count_icon_font_color . " !important;";
        }
        // vc_icon_element_fonts_enqueue( $citype );
        if (isset($ {
            'i_icon_' . $citype
        })) {
            if ('pixelicons' === $citype) {
                $icon_wrapper = true;
            }
            $icon_class = $ {
                'i_icon_' . $citype
            };
        }
        else {
            if($i_icon_fontawesome != 'fa fa-adjust'){
                $icon_class = $i_icon_fontawesome;
            } else {
                $icon_class = 'fa fa-adjust';
            }
        }
        $ricon_class = esc_attr($icon_class);
        switch ($citype) {
        case 'fontawesome':
            wp_enqueue_style('font-awesome');
            break;
        case 'openiconic':
            wp_enqueue_style('vc_openiconic');
            break;
        case 'typicons':
            wp_enqueue_style('vc_typicons');
            break;
        case 'entypo':
            wp_enqueue_style('vc_entypo');
            break;
        case 'linecons':
            wp_enqueue_style('vc_linecons');
            break;
        case 'monosocial':
            wp_enqueue_style('vc_monosocialiconsfont');
            break;
        case 'material':
            wp_enqueue_style('vc_material');
            break;
        default:
            wp_enqueue_style('font-awesome');
        }
        if(empty($ricon_class)) {
            $ricon_class = apply_filters( 'slcr_icon_class_return_filter', $ricon_class, $citype, $i_icon_flaticon); 
        }
        if ($icon_wrapper) { 
            $name="inline_slcr";
            $slcr_custom_radial_icon_css = '.slcr_custom_radial_icon_' . $uid2 . '{ ' . esc_attr($ricon_font_size) . '' . esc_attr($rcount_icon_font_color) . ' }';
            $value=$slcr_custom_radial_icon_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $icon_html = ' <i class="  ' . esc_attr($ricon_class) . ' slcr_custom_radial_icon_' . $uid2 . '"></i> ';
        }
        else {
            $name="inline_slcr";
            $slcr_custom_radial_icon_css = '.slcr_custom_radial_icon_' . $uid2 . '{ ' . esc_attr($ricon_font_size) . '' . esc_attr($rcount_icon_font_color) . ' }';
            $value=$slcr_custom_radial_icon_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $icon_html = ' <i class=" ' . esc_attr($ricon_class) . ' slcr_custom_radial_icon_' . $uid2 . '"></i> ';
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
            $rfront_text_font_color = " color: #3865de; ";
        }
        else {
            $rfront_text_font_color = " color: " . $front_text_font_color . " !important;";
        }
        // condition for   front_text text transform  value
        if ($rfront_text_text_transform == "") {
            $r2front_text_text_transform = "";
        }
        else {
            $r2front_text_text_transform = " text-transform: " . $rfront_text_text_transform . ";";
        }
        // condition for  bar & track  color value
        if ($front_progress_color == "") {
            $rfront_progress_color = "#3865de";
        }
        else {
            $rfront_progress_color = $front_progress_color;
        }
        if ($front_progress_track_color == "") {
            $rfront_progress_track_color = "#f8f8f8";
        }
        else {
            $rfront_progress_track_color = $front_progress_track_color;
        }
        $rscale_color = "";
        if ('true' === $use_scale) {
            $rscale_color = $scale_color;
        }
        else {
            $rscale_color = "false";
        }
        // condition for  front_text text size value
        if ($radial_size == "") {
            $rradial_size = "250";
        }
        else {
            $rradial_size = $radial_size;
        }
        if ($radial_line_width == "") {
            $rradial_line_width = "23";
        }
        else {
            $rradial_line_width = $radial_line_width;
        }
        if ($radial_animation == "") {
            $rradial_animation = "3000";
        }
        else {
            $rradial_animation = $radial_animation;
        }
        if ($radial_angle == "") {
            $rradial_angle = "0";
        }
        else {
            $rradial_angle = $radial_angle;
        }
        $output = "";
        switch ($radial_type) {
        case 'icon':
            $output = '
                <div class="radial-wrap text-center ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                   <span class="radial_bar" id="'.esc_attr($iddata).'" data-radialdata="'.esc_attr($iddata).'" data-percent="' . esc_attr($front_progress_value) . '" data-bar-color="' . esc_attr($rfront_progress_color) . '" data-track-color="' . esc_attr($rfront_progress_track_color) . '" data-scale-color="' . esc_attr($rscale_color) . '" data-scale-length="' . esc_attr($scale_length) . '" data-size="' . esc_attr($rradial_size) . '" data-line-width="' . esc_attr($rradial_line_width) . '" data-animate="' . esc_attr($rradial_animation) . '" data-line-cap="' . esc_attr($radial_line_cap) . '" data-rotate="' . esc_attr($rradial_angle) . '" data-easing="easeOutElastic">
                       <span class="radial_text">' . $icon_html . '</span>
                   </span>
               </div> ';
            break;

        case 'text':
            $name="inline_slcr";
            $slcr_custom_radial_type_css = '.slcr_custom_radial_type_' . $uid2 . '{ font-size: 20px;   font-weight: 500;' . esc_attr($rfront_text_font_size) . '' . esc_attr($rfront_text_font_color) . '' . esc_attr($r2front_text_text_transform) . ' ' . esc_attr($front_text_font_inline_style) . ' }';
            $value=$slcr_custom_radial_type_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $output = '     
                <div class="radial-wrap text-center ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                   <span class="radial_bar" id="'.esc_attr($iddata).'" data-radialdata="'.esc_attr($iddata).'" data-percent="' . esc_attr($front_progress_value) . '" data-bar-color="' . esc_attr($rfront_progress_color) . '" data-track-color="' . esc_attr($rfront_progress_track_color) . '" data-scale-color="' . esc_attr($rscale_color) . '" data-scale-length="' . esc_attr($scale_length) . '" data-size="' . esc_attr($rradial_size) . '" data-line-width="' . esc_attr($rradial_line_width) . '" data-animate="' . esc_attr($rradial_animation) . '" data-line-cap="' . esc_attr($radial_line_cap) . '" data-rotate="' . esc_attr($rradial_angle) . '" data-easing="easeOutElastic">
                       <span class="radial_text slcr_custom_radial_type_' . $uid2 . '">' . esc_html($typed_text_front_text) . '</span>
                   </span>
               </div> ';
            break;

        default:
            $name="inline_slcr";
            $slcr_custom_radial_type_css = '.slcr_custom_radial_type_' . $uid2 . '{ font-size: 22px; font-weight: 800;' . esc_attr($rfront_text_font_size) . '' . esc_attr($rfront_text_font_color) . '' . esc_attr($r2front_text_text_transform) . ' ' . esc_attr($front_text_font_inline_style) . ' }';
            $value=$slcr_custom_radial_type_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $output = '
                <div class="radial-wrap text-center ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                   <span class="radial_bar" id="'.esc_attr($iddata).'" data-radialdata="'.esc_attr($iddata).'" data-percent="' . esc_attr($front_progress_value) . '" data-bar-color="' . esc_attr($rfront_progress_color) . '" data-track-color="' . esc_attr($rfront_progress_track_color) . '" data-scale-color="' . esc_attr($rscale_color) . '" data-scale-length="' . esc_attr($scale_length) . '" data-size="' . esc_attr($rradial_size) . '" data-line-width="' . esc_attr($rradial_line_width) . '" data-animate="' . esc_attr($rradial_animation) . '" data-line-cap="' . esc_attr($radial_line_cap) . '" data-rotate="' . esc_attr($rradial_angle) . '" data-easing="easeOutElastic">
                       <span class="radial_value slcr_custom_radial_type_' . $uid2 . '"></span>
                   </span>
               </div>';
        }
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
new Slcr_Radial_Data();
?>