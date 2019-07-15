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
 * Element Description: VC Slcr Price Data
 */
if (!defined('ABSPATH')) {
    die('-1');
} 
class Slcr_Price_Data extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    {
        add_shortcode('slcr_price_item', array(
            $this,
            'slcr_price_data_element_html'
        ));
    }
    // Element HTML Team title
    public function slcr_price_data_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'title' => '',
            'title_text_float' => '',
            'title_font_size' => '',
            'title_text_transform' => '',
            'title_padding_top' => '',
            'title_padding_left' => '',
            'title_use_theme_fonts' => '',
            'title_google_font_select' => '',
            'title_font_color' => '',
            'desc' => '',
            'desc_text_float' => '',
            'desc_font_size' => '',
            'desc_text_transform' => '',
            'desc_padding_top' => '',
            'desc_padding_left' => '',
            'desc_use_theme_fonts' => '',
            'desc_google_font_select' => '',
            'desc_font_color' => '',
            'price' => '',
            'price_text_float' => '',
            'price_font_size' => '', 
            'price_padding_top' => '',
            'price_padding_left' => '',
            'price_use_theme_fonts' => '',
            'price_google_font_select' => '',
            'price_font_color' => '',
            'price_list_type' => '',
            'bottom_border_color' => '',
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
            $rtitle_font_size = " font-size: " . $title_font_size . " !important;";
        }
        // condition for   title text color value
        if ($title_font_color == "") {
            $rtitle_font_color = "";
        }
        else {
            $rtitle_font_color = " color: " . $title_font_color . " !important;";
        }
        // condition for   title text padding top  bottom value
        if ($title_padding_top == "") {
            $rtitle_padding_top = "";
        }
        else {
            $title_padding_top=apply_filters( 'slcr_value_parameter_filter', $title_padding_top);
            $rtitle_padding_top = " padding-top: " . $title_padding_top . " !important; padding-bottom: " . $title_padding_top . " !important;";
        }
        // condition for   title text padding left right value
        if ($title_padding_left == "") {
            $rtitle_padding_left = "";
        }
        else {
            $title_padding_left=apply_filters( 'slcr_value_parameter_filter', $title_padding_left);
            $rtitle_padding_left = " padding-left: " . $title_padding_left . " !important; padding-right: " . $title_padding_left . " !important;";
        }
        // condition for   title text transform  value
        if ($rtitle_text_transform == "") {
            $r2title_text_transform = "";
        }
        else {
            $r2title_text_transform = " text-transform: " . $rtitle_text_transform . " !important;";
        }
        // **********************************google font for a price *****************************************
        if ($price_use_theme_fonts == "Yes") {
            // Build the data array
            $price_font_data = $this->getFontsData($price_google_font_select);
            // Build the inline style
            $price_font_inline_style = $this->googleFontsStyles($price_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($price_font_data);
        }
        else {
            $price_font_inline_style = "";
        } 
        // condition for  price text size value
        if ($price_font_size == "") {
            $rprice_font_size = "";
        }
        else {
            $price_font_size=apply_filters( 'slcr_value_parameter_filter', $price_font_size);
            $rprice_font_size = " font-size: " . $price_font_size . " !important;";
        }
        // condition for   price text color value
        if ($price_font_color == "") {
            $rprice_font_color = "";
        }
        else {
            $rprice_font_color = " color: " . $price_font_color . " !important;";
        }
        // condition for   price text padding top  bottom value
        if ($price_padding_top == "") {
            $rprice_padding_top = "";
        }
        else {
            $price_padding_top=apply_filters( 'slcr_value_parameter_filter', $price_padding_top);
            $rprice_padding_top = " padding-top: " . $price_padding_top . " !important; padding-bottom: " . $price_padding_top . " !important;";
        }
        // condition for   price text padding left right value
        if ($price_padding_left == "") {
            $rprice_padding_left = "";
        }
        else {
            $price_padding_left=apply_filters( 'slcr_value_parameter_filter', $price_padding_left);
            $rprice_padding_left = " padding-left: " . $price_padding_left . " !important; padding-right: " . $price_padding_left . " !important;";
        }
        
        // **********************************google font for a title *****************************************
        if ($desc_use_theme_fonts == "Yes") {
            // Build the data array
            $desc_font_data = $this->getFontsData($desc_google_font_select);
            // Build the inline style
            $desc_font_inline_style = $this->googleFontsStyles($desc_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($desc_font_data);
        }
        else {
            $desc_font_inline_style = "";
        }
        // get   desc text transform value
        if ($desc_text_transform == "Default") {
            $rdesc_text_transform = "";
        }
        else {
            $rdesc_text_transform = $desc_text_transform;
        }
        // condition for  desc text size value
        if ($desc_font_size == "") {
            $rdesc_font_size = "";
        }
        else {
            $desc_font_size=apply_filters( 'slcr_value_parameter_filter', $desc_font_size);
            $rdesc_font_size = " font-size: " . $desc_font_size . " !important;";
        }
        // condition for   desc text color value
        if ($desc_font_color == "") {
            $rdesc_font_color = "";
        }
        else {
            $rdesc_font_color = " color: " . $desc_font_color . " !important;";
        }
        // condition for   desc text padding top  bottom value
        if ($desc_padding_top == "") {
            $rdesc_padding_top = "";
        }
        else {
            $desc_padding_top=apply_filters( 'slcr_value_parameter_filter', $desc_padding_top);
            $rdesc_padding_top = " padding-top: " . $desc_padding_top . " !important; padding-bottom: " . $desc_padding_top . " !important;";
        }
        // condition for   desc text padding left right value
        if ($desc_padding_left == "") {
            $rdesc_padding_left = "";
        }
        else {
            $desc_padding_left=apply_filters( 'slcr_value_parameter_filter', $desc_padding_left);
            $rdesc_padding_left = " padding-left: " . $desc_padding_left . " !important; padding-right: " . $desc_padding_left . " !important;";
        }
        // condition for   desc text transform  value
        if ($rdesc_text_transform == "") {
            $r2desc_text_transform = "";
        }
        else {
            $r2desc_text_transform = " text-transform: " . $rdesc_text_transform . " !important;";
        }
        //Bottom Border Color
        if ($bottom_border_color == "") {
            $rbottom_border_color = "";
        }
        else {
            $rbottom_border_color = 'border-color: ' . $bottom_border_color . ' !important; ';
        }
        $output = "";
        $uid2 = uniqid();
        $name="inline_slcr";
        switch ($price_list_type) {
        case 'Price_List_Type_2':
            $slcr_custom_price_list_item_css = '.slcr_custom_price_list_item_css' . $uid2 . '{ ' . esc_attr($rbottom_border_color) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' .wrap .item-name{ ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' .wrap .item-price{ ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($price_font_inline_style) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' p{ ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . ' ' . esc_attr($desc_font_inline_style) . ' }';
            $value=$slcr_custom_price_list_item_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            $output.= '
                    <div class="price-list type-2 ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_price_list_item_css' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                        <div class="wrap">
                            <h5 class="item-name">' . esc_html( $title ) . '</h5>
                            <div class="item-price">' . esc_html( $price ) . '</div>
                        </div>
                        <p class="item-description">' . esc_html( $desc ) . '</p>
                    </div>';
            break;

        default:
            $slcr_custom_price_list_item_css = '.slcr_custom_price_list_item_css' . $uid2 . '{ ' . esc_attr($rbottom_border_color) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' .wrap .item-name{ ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' .wrap .item-price{ ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($price_font_inline_style) . ' } .slcr_custom_price_list_item_css' . $uid2 . ' p{ ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . ' ' . esc_attr($desc_font_inline_style) . ' }';
            $value=$slcr_custom_price_list_item_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $output.= '
                    <div class="price-list type-1 ' . esc_attr($css_class) . ' '. $el_class. ' slcr_custom_price_list_item_css' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                        <div class="wrap">
                            <h5 class="item-name">' . esc_html( $title ) . '</h5>
                            <div class="item-price">' . esc_html( $price ) . '</div>
                        </div>
                        <p class="item-description">' . esc_html( $desc ) . '</p>
                    </div>';
            break;
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
new Slcr_Price_Data();
?>