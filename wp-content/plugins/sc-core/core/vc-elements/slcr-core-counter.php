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
 * Element Description: VC Slcr Cou Class
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
/*
Element Description: VC slcr Counter
*/
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Slcr_Cou_Class extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('slcr_counter', array(
            $this,
            'slcr_counter_element_html'
        ));
    }
    // Element HTML Team Member
    public function slcr_counter_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'count' => '',
            'slcr_counter_align' => '',
            'count_font_size' => '',
            'count_padding_top' => '',
            'count_padding_left' => '',
            'count_use_theme_fonts' => '',
            'count_google_font_select' => '',
            'count_font_color' => '',
            'count_size' => '',
            'add_separator' => '',
            'add_icon' => '',
            'i_align' => '',
            'citype' => '',
            'i_icon_fontawesome' => '',
            'i_icon_openiconic' => '',
            'i_icon_typicons' => '',
            'i_icon_entypo' => '',
            'i_icon_linecons' => '',
            'i_icon_monosocial' => '',
            'i_icon_material' => '',
            'i_icon_material' => '',
            'icon_flaticon' => '',
            'icon_font_size' => '',
            'icon_padding_left' => '',
            'count_icon_font_color' => '',
            'symbol' => '',
            'symbol_text_positon' => '',
            'symbol_text_style' => '',
            'symbol_font_size' => '',
            'symbol_padding_top' => '',
            'symbol_padding_left' => '',
            'symbol_use_theme_fonts' => '',
            'symbol_google_font_select' => '',
            'symbol_css_right_value' => '',
            'symbol_font_color' => '',
            'text' => '',
            'text_font_size' => '',
            'text_text_transform' => '',
            'text_padding_top' => '',
            'text_padding_left' => '',
            'text_use_theme_fonts' => '',
            'text_google_font_select' => '',
            'text_font_color' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
        ) , $atts));
        $icon_wrapper = false; 
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
        $uid2 = uniqid();
        $iddata = 'slcr-counter-' . $uid2 ; 
        if ('left' == $slcr_counter_align) {
            $rslcr_counter_align = "left"; 
        }
        elseif ('right' == $slcr_counter_align) {
            $rslcr_counter_align = "right"; 
        } 
        else {
            $rslcr_counter_align = "center"; 
        }
        if ('true' === $add_separator) {
            $radd_separator = 'true';
        }
        else {
            $radd_separator = 'false';
        }
        // **********************************google font for a count *****************************************
        if ($count_use_theme_fonts == "Yes") {
            // Build the data array
            $count_font_data = $this->getFontsData($count_google_font_select);
            // Build the inline style
            $count_font_inline_style = $this->googleFontsStyles($count_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($count_font_data);
        }
        else {
            $count_font_inline_style = "";
        }
        if ($count_font_size == "") {
            $rcount_font_size = "";
        }
        else {
            $count_font_size=apply_filters( 'slcr_value_parameter_filter', $count_font_size);
            $rcount_font_size = ' font-size: ' . esc_attr($count_font_size) . ';';
        }

        // condition for   count text color value
        if ($count_font_color == "") {
            $rcount_font_color = "";
        }
        else {
            $rcount_font_color = ' color: ' . esc_attr($count_font_color) . ' !important;';
        }
        // condition for   count text padding top  bottom value
        if ($count_padding_top == "") {
            $rcount_padding_top = "";
        }
        else {
            $count_padding_top=apply_filters( 'slcr_value_parameter_filter', $count_padding_top);
            $rcount_padding_top = ' padding-top: ' . esc_attr($count_padding_top) . '; padding-bottom: ' . esc_attr($count_padding_top) . ';';
        }
        // condition for   count text padding left right value
        if ($count_padding_left == "") {
            $rcount_padding_left = "";
        }
        else {
            $count_padding_left=apply_filters( 'slcr_value_parameter_filter', $count_padding_left);
            $rcount_padding_left = ' padding-left: ' . esc_attr($count_padding_left) . '; padding-right: ' . esc_attr($count_padding_left) . ';';
        }
        $uid2 = uniqid();
        $slcr_counter_countdata_css = '#'.$iddata.'{ ' . $rcount_font_size . '' . $rcount_font_color . '' . $rcount_padding_top . '' . $rcount_padding_left . '' . $count_font_inline_style . ' }';
        $name="inline_slcr";
        $value=$slcr_counter_countdata_css;
        do_action( 'wp_enqueue_scripts',$value,$name); 
        $countdata = '<span class="counter-value color-primary gap-0 " id="'.$iddata.'" >' . esc_html($count) . '</span> ';
        // condition for   icon text size value
        if ($icon_font_size == "") {
            $ricon_font_size = "";
        }
        else {
            $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
            $ricon_font_size = ' font-size: ' . esc_attr($icon_font_size) . ';';
        }
        // condition for   icon text padding left right value
        if ($icon_padding_left == "") {
            $ricon_padding_left = "";
        }
        else {
            $icon_padding_left=apply_filters( 'slcr_value_parameter_filter', $icon_padding_left);
            $ricon_padding_left = ' padding-left: ' . esc_attr($icon_padding_left) . '; padding-right: ' . esc_attr($icon_padding_left) . ';';
        }
        // condition for   icon setting ****************************************
        if ($count_icon_font_color == "") {
            $rcount_icon_font_color = "";
        }
        else {
            $rcount_icon_font_color = ' color: ' . esc_attr($count_icon_font_color) . ' !important;';
        }
        $data_icon_style = "";
        $dicon_html = "";
                // **********************************google font for a symbol *****************************************
        if ($symbol_use_theme_fonts == "Yes") {
            // Build the data array
            $symbol_font_data = $this->getFontsData($symbol_google_font_select);
            // Build the inline style
            $symbol_font_inline_style = $this->googleFontsStyles($symbol_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($symbol_font_data);
        }
        else {
            $symbol_font_inline_style = "";
        }
        // condition for  symbol text size value
        if ($symbol_font_size == "") {
            $rsymbol_font_size = "";
        }
        else {
            $symbol_font_size=apply_filters( 'slcr_value_parameter_filter', $symbol_font_size);
            $rsymbol_font_size = ' font-size: ' . esc_attr($symbol_font_size) . ';';
        }
        // condition for   symbol text color value
        if ($symbol_font_color == "") {
            $rsymbol_font_color = "";
        }
        else {
            $rsymbol_font_color = ' color: ' . esc_attr($symbol_font_color) . ' !important;';
        }
        // condition for   symbol text padding top  bottom value
        if ($symbol_padding_top == "") {
            $rsymbol_padding_top = "";
        }
        else {
            $symbol_padding_top=apply_filters( 'slcr_value_parameter_filter', $symbol_padding_top);
            $rsymbol_padding_top = ' padding-top: ' . esc_attr($symbol_padding_top) . '; padding-bottom: ' . esc_attr($symbol_padding_top) . ';';
        }
        // condition for   symbol text padding left right value
        if ($symbol_padding_left == "") {
            $rsymbol_padding_left = "";
        }
        else {
            $symbol_padding_left=apply_filters( 'slcr_value_parameter_filter', $symbol_padding_left);
            $rsymbol_padding_left = ' padding-left: ' . esc_attr($symbol_padding_left) . '; padding-right: ' . esc_attr($symbol_padding_left) . ';';
        }
        $rsymbol_css_right_value = "";
        if ('top' == $symbol_text_style) {
            $symbol_css_right_value=apply_filters( 'slcr_value_parameter_filter', $symbol_css_right_value);
            $rsymbol_css_right_value = 'right: ' . esc_attr($symbol_css_right_value) . ' !important;';
        } 
        $slcr_counter_countdata_symbol_css = '#slcr_counter_countdata_symbol_' . $uid2 . '{ ' . $rsymbol_css_right_value . '' . $rsymbol_font_color . '' . $rsymbol_font_size . '' . $rsymbol_padding_top . '' . $rsymbol_padding_left . '' . $symbol_font_inline_style . ' }';
        $name="inline_slcr";
        $value=$slcr_counter_countdata_symbol_css;
        
        $rsymbol = '<span class="counter-symbol color-primary" id="slcr_counter_countdata_symbol_' . $uid2 . '" >' . esc_html($symbol) . '</span>
                    ';
        if ('' != $symbol) {
            if ('right' == $symbol_text_positon) {
                $dicon_html = '<span>' . $countdata . '
                    </span>'. $rsymbol;
            }
            else {
                $dicon_html = $rsymbol . '<span>' . $countdata . '
                    </span>';
            }
            if ('top' == $symbol_text_style) {
                $dicon_html = $rsymbol . '<span>' . $countdata . '
                    </span>';
            }
            do_action( 'wp_enqueue_scripts',$value,$name); 
        }
        else {
            $dicon_html = '<span>' . $countdata . '</span>';
        }
        if ('true' === $add_icon) {
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
                    }else {
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
            $ricon_class=apply_filters( 'slcr_icon_class_return_filter', $ricon_class, $citype, $icon_flaticon); 
            
            $slcr_counter_countdata_icon_css = '#slcr_counter_countdata_icon_css_' . $uid2 . '{ '. $ricon_font_size . '' . $ricon_padding_left . '' . $rcount_icon_font_color . ' }';
            $name="inline_slcr";
            $value=$slcr_counter_countdata_icon_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            if ($icon_wrapper) {
                $icon_html = '<i class="counter-icon ' . esc_attr($ricon_class) . '" id="slcr_counter_countdata_icon_css_' . $uid2 . '" ></i>';
            }
            else {
                $icon_html = '<i class="counter-icon ' . esc_attr($ricon_class) . '" id="slcr_counter_countdata_icon_css_' . $uid2 . '" ></i>';
            }
            if ('top' == $i_align) {
                $data_icon_style = "bottom";
                $finaldata = $icon_html . ' '. $dicon_html ;
            }
            elseif ('bottom' == $i_align) {
                $data_icon_style = "bottom";
                $finaldata = $dicon_html . ' ' . $icon_html;
            }
            elseif ('right' == $i_align) {
                $data_icon_style = "inline";
                $finaldata = $dicon_html . ' ' . $icon_html;
            }
            else {
                $data_icon_style = "inline";
                $finaldata = $icon_html . ' ' . $dicon_html;
            }
        }
        else {
            $finaldata = $dicon_html;
        }

        // **********************************google font for a text *****************************************
        if ($text_use_theme_fonts == "Yes") {
            // Build the data array
            $text_font_data = $this->getFontsData($text_google_font_select);
            // Build the inline style
            $text_font_inline_style = $this->googleFontsStyles($text_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($text_font_data);
        }
        else {
            $text_font_inline_style = "";
        }
        // get   text text transform value
        if ($text_text_transform == "Default") {
            $rtext_text_transform = "";
        }
        else {
            $rtext_text_transform = esc_attr($text_text_transform);
        }
        // condition for  text text size value
        if ($text_font_size == "") {
            $rtext_font_size = "";
        }
        else {
            $text_font_size=apply_filters( 'slcr_value_parameter_filter', $text_font_size);
            $rtext_font_size = ' font-size: ' . esc_attr($text_font_size) . ';';
        }
        // condition for   text text color value
        if ($text_font_color == "") {
            $rtext_font_color = "";
        }
        else {
            $rtext_font_color = ' color: ' . esc_attr($text_font_color) . ';';
        }
        // condition for   text text padding top  bottom value
        if ($text_padding_top == "") {
            $rtext_padding_top = "";
        }
        else {
            $text_padding_top=apply_filters( 'slcr_value_parameter_filter', $text_padding_top);
            $rtext_padding_top = ' padding-top: ' . esc_attr($text_padding_top) . '; padding-bottom: ' . esc_attr($text_padding_top) . ';';
        }
        // condition for   text text padding left right value
        if ($text_padding_left == "") {
            $rtext_padding_left = "";
        }
        else {
            $text_padding_left=apply_filters( 'slcr_value_parameter_filter', $text_padding_left);
            $rtext_padding_left = ' padding-left: ' . esc_attr($text_padding_left) . '; padding-right: ' . esc_attr($text_padding_left) . ';';
        }
        // condition for   text text transform  value
        if ($rtext_text_transform == "") {
            $r2text_text_transform = "";
        }
        else {
            $r2text_text_transform = ' text-transform: ' . $rtext_text_transform . ';';
        }
        $slcr_counter_countdata_p_text_css = '#slcr_counter_countdata_p_text_css' . $uid2 . '{' . $rtext_font_size . '' . $rtext_font_color . '' . $rtext_padding_top . '' . $rtext_padding_left . '' . $r2text_text_transform . '' . $text_font_inline_style . '}';
        $name="inline_slcr";
        $value=$slcr_counter_countdata_p_text_css;
        do_action( 'wp_enqueue_scripts',$value,$name); 
        $textdata = '<p class="font-reset color-theme-main" id="slcr_counter_countdata_p_text_css' . $uid2 . '"> ' . esc_html($text) . '</p>';
        $output = '
                <div class="counter__01 ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '    data-iddata="'.esc_attr($iddata).'" data-symbol-style="' . esc_attr($symbol_text_style) . '" data-icon-style="' . esc_attr($data_icon_style) . '" data-count-size="' . esc_attr($count_size) . '" data-count-separator="' . esc_attr($radd_separator) . '" data-count-position="'.esc_attr($rslcr_counter_align).'">
                   <div class="counter-cont">
                     ' . $finaldata . ' 
                   </div> 
                   ' . $textdata . ' 
               </div>';
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
        if(!empty($fontStyles[1])){
            $styles[] = 'font-weight:' . $fontStyles[1];
        }
        if(!empty($fontStyles[2])){
            $styles[] = 'font-style:' . $fontStyles[2];    
        }
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
new Slcr_Cou_Class();
?>