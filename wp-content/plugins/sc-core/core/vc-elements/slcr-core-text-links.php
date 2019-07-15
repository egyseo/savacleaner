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
 * Element Description: Slcr Text Links Data
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
// Element Class
class Slcr_Text_Links_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    {
        add_shortcode('slcr_text_links', array(
            $this,
            'slcr_text_links_element_html'
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_text_links_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'typed_text_front_text' => '',
            'typed_text_front_text_link_align' => '',
            'front_text_font_size' => '',
            'front_text_text_transform' => '',
            'front_text_padding_top' => '',
            'front_text_padding_left' => '',
            'front_text_use_theme_fonts' => '',
            'front_text_google_font_select' => '',
            'front_text_font_color' => '',
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
            'icon_flaticon' => '',
            'icon_font_size' => '',
            'icon_padding_left' => '',
            'count_icon_font_color' => '',
            'fade_effect' => '',
            'hover_effect' => '',
            'front_text_on_hover' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
        ) , $atts));
        $icon_wrapper = false;
        $uid2 = uniqid();
        $name_inline="inline_slcr";
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
            $rfront_text_font_size = " font-size: " . $front_text_font_size . " !important;";
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
            $rfront_text_padding_top = " padding-top: " . $front_text_padding_top . " !important; padding-bottom: " . $front_text_padding_top . " !important;";
        }
        // condition for   front_text text padding left right value
        if ($front_text_padding_left == "") {
            $rfront_text_padding_left = "";
        }
        else {
            $front_text_padding_left=apply_filters( 'slcr_value_parameter_filter', $front_text_padding_left);
            $rfront_text_padding_left = " padding-left: " . $front_text_padding_left . " !important; padding-right: " . $front_text_padding_left . " !important;";
        }
        // condition for   front_text text transform  value
        if ($rfront_text_text_transform == "") {
            $r2front_text_text_transform = "";
        }
        else {
            $r2front_text_text_transform = " text-transform: " . $rfront_text_text_transform . " !important;";
        }
        // condition for   icon text size value
        if ($icon_font_size == "") {
            $ricon_font_size = "";
        }
        else {
            $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
            $ricon_font_size = " font-size: " . $icon_font_size . " !important;";
        }
        // condition for   icon text padding left right value
        if ($icon_padding_left == "") {
            $ricon_padding_left = "";
        }
        else {
            $icon_padding_left=apply_filters( 'slcr_value_parameter_filter', $icon_padding_left);
            $ricon_padding_left = " padding-left: " . $icon_padding_left . " !important; padding-right: " . $icon_padding_left . " !important;";
        }
        // condition for   icon setting ****************************************
        if ($count_icon_font_color == "") {
            $rcount_icon_font_color = "";
        }
        else {
            $rcount_icon_font_color = " color: " . $count_icon_font_color . " !important;";
        }
        $data_icon_style = "";
        $dicon_html = "";
        // **************************************button css start *******************************************//
        // parse link
        $typed_text_front_text = ('||' === $typed_text_front_text) ? '' : $typed_text_front_text;
        $link = vc_build_link($typed_text_front_text);
        $use_link = false; 
        $a_href = "";
        $a_title = "";
        $a_target = "";
        $a_rel = "";
        if (strlen($link['url']) > 0) {
            $use_link = true;
            $a_href = $link['url'];
            $a_title = $link['title'];
            $a_target = $link['target'];
            $a_rel = $link['rel'];
        }
        $attributes2 = "";
        if ($use_link) {
            $attributes2 = 'href="' . esc_url(trim($a_href)) . '" ';
            $attributes2.= ' title="' . esc_attr(trim($a_title)) . '" ';
            if (!empty($a_target)) {
                $attributes2.= 'target="' . esc_attr(trim($a_target)) . '"';
            }
            if (!empty($a_rel)) {
                $attributes2.= 'rel="' . esc_html(trim($a_rel)) . '"';
            }
        }
        else {
            $attributes2 = 'href="#" ';
        } 

        $slcr_custom_textlink_css = '.slcr_custom_textlink_inner_' . $uid2 . '{ ' . esc_attr($rfront_text_font_size) . '' . esc_attr($rfront_text_font_color) . '' . esc_attr($rfront_text_padding_top) . '' . esc_attr($rfront_text_padding_left) . '' . esc_attr($r2front_text_text_transform) . '' . esc_attr($front_text_font_inline_style) . ' }';
        $value=$slcr_custom_textlink_css;
        do_action( 'wp_enqueue_scripts',$value,$name_inline); 
        $countdata = '<span class="inner-link slcr_custom_textlink_inner_' . $uid2 . '"> ' . esc_html($a_title) . '</span>';
        $rhover_effect = "";
         if($citype==""){
            $citype='fontawesome';
         }  
        if ('true' === $add_icon) {
            if ('true' === $hover_effect) {
                $rhover_effect = "true";
            }
            else {
                $rhover_effect = "false";
            }
            $icon_class = ''; 
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
                    $ricon_class=apply_filters( 'slcr_icon_class_return_filter', $ricon_class, $citype, $icon_flaticon); 
                }
            if ($icon_wrapper) {
                $slcr_custom_textlink_css = '.slcr_custom_textlink_' . $uid2 . '{ ' . esc_attr($ricon_font_size) . ' ' . esc_attr($rcount_icon_font_color) . '  ' . esc_attr($ricon_padding_left) . ' }';
                $value=$slcr_custom_textlink_css;
                do_action( 'wp_enqueue_scripts',$value,$name_inline); 
                $icon_html = '<span class="inner-icon"> <i class="' . esc_attr($ricon_class) . ' slcr_custom_textlink_' . $uid2 . '"></i></span>';
            }
            else {
                $slcr_custom_textlink_css = '.slcr_custom_textlink_' . $uid2 . '{ ' . esc_attr($ricon_font_size) . ' ' . esc_attr($rcount_icon_font_color) . '  ' . esc_attr($ricon_padding_left) . ' }';
                $value=$slcr_custom_textlink_css;
                do_action( 'wp_enqueue_scripts',$value,$name_inline); 
                $icon_html = ' <span class="inner-icon"> <i class="' . esc_attr($ricon_class) . ' slcr_custom_textlink_' . $uid2 . '"></i></span>';
            }
            if ('right' == $i_align) {
                $data_icon_style = "inline";
                $dicon_html = '
                    <span>' . $countdata . '</span>' . $icon_html;
            }
            else {
                $data_icon_style = "inline";
                $dicon_html = $icon_html . ' ' . '
                    <span>' . $countdata . '</span>';
            }
        }
        else {
            $dicon_html = $countdata;
        }
        if($typed_text_front_text_link_align==""){
            $typed_text_front_text_link_align="inline";
        }
         $output = '
        <div class="text_link_wrap ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '  data-display-type="'.esc_attr($typed_text_front_text_link_align).'" >
            <a '.$attributes2.' class="text_link"  data-link-hover="' . esc_attr($front_text_on_hover) . '" data-icon-effect="' . esc_attr($rhover_effect) . '">
                ' . $dicon_html . '
            </a>
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
new Slcr_Text_Links_Data();
?>