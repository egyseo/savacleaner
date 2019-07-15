<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.0.0
 *
 * Element Description: VC Pricing Table Class
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Pricing_Table_Class extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('pricing_table', array(
            $this,
            'pricing_table_element_html'
        ));
    }

    // Element HTML Team Member
    public function pricing_table_element_html($atts, $content = null)

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
            'currency' => '',
            'price' => '',
            'price_text_float' => '',
            'price_font_size' => '',
            'price_text_transform' => '',
            'price_padding_top' => '',
            'price_padding_left' => '',
            'price_use_theme_fonts' => '',
            'price_google_font_select' => '',
            'price_font_color' => '',
            'subprice' => '',
            'subprice_text_float' => '',
            'subprice_font_size' => '',
            'subprice_text_transform' => '',
            'subprice_padding_top' => '',
            'subprice_padding_left' => '',
            'subprice_use_theme_fonts' => '',
            'subprice_google_font_select' => '',
            'subprice_font_color' => '',
            'pricing_table_type' => '',
            'button_size' => '',
            'button_font_weights' => '',
            'button_shapes' => '',
            'button_hover_styles' => '',
            'button_block' => '',
            'button_border_size' => '',
            'button_colors' => '',
            'button_type' => '',
            'button_title' => '',
            'pricing_badge_color' => '',
            'pricing_badge_title' => '',
            'use_pricing_badge' => '',
            'pricing_badge_text_color' => '',
            'pricing_header_color' => '',
            'pricing_box_link' => '',
            'make_featured' => '',
            'link' => '',
            'use_button' => '',
            'fade_effect' => '',
            'pricing_hover_translate' => '',
            'himg' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
            'slcr_img_link_template' => '',
        ) , $atts));
        // get image url
        $uid2 = uniqid();
        $name="inline_slcr";
        $uidstyle2 = uniqid(); 
 
        $img_url = wp_get_attachment_image_src($himg, "full");
        if (!empty($slcr_img_link_template) && empty($img_url[0])) {
            if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                $img_url[0] = $slcr_img_link_template; 
            } 
        }
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
        }        // condition for   title text color value
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
        // get   price text transform value
        if ($price_text_transform == "Default") {
            $rprice_text_transform = "";
        }
        else {
            $rprice_text_transform = $price_text_transform;
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
        // condition for   price text transform  value
        if ($rprice_text_transform == "") {
            $r2price_text_transform = "";
        }
        else {
            $r2price_text_transform = " text-transform: " . $rprice_text_transform . " !important;";
        }
        // **********************************google font for a subprice *****************************************
        if ($subprice_use_theme_fonts == "Yes") {
            // Build the data array
            $subprice_font_data = $this->getFontsData($subprice_google_font_select);
            // Build the inline style
            $subprice_font_inline_style = $this->googleFontsStyles($subprice_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($subprice_font_data);
        }
        else {
            $subprice_font_inline_style = "";
        }
        // get   subprice text transform value
        if ($subprice_text_transform == "Default") {
            $rsubprice_text_transform = "";
        }
        else {
            $rsubprice_text_transform = $subprice_text_transform;
        }
        // condition for  subprice text size value
        if ($subprice_font_size == "") {
            $rsubprice_font_size = "";
        }
        else {
            $subprice_font_size=apply_filters( 'slcr_value_parameter_filter', $subprice_font_size);
            $rsubprice_font_size = " font-size: " . $subprice_font_size . " !important;";
        }
        // condition for   subprice text color value
        if ($subprice_font_color == "") {
            $rsubprice_font_color = "";
        }
        else {
            $rsubprice_font_color = " color: " . $subprice_font_color . " !important;";
        }
        // condition for   subprice text padding top  bottom value
        if ($subprice_padding_top == "") {
            $rsubprice_padding_top = "";
        }
        else {
            $subprice_padding_top=apply_filters( 'slcr_value_parameter_filter', $subprice_padding_top);
            $rsubprice_padding_top = " padding-top: " . $subprice_padding_top . " !important; padding-bottom: " . $subprice_padding_top . " !important;";
        }
        // condition for   subprice text padding left right value
        if ($subprice_padding_left == "") {
            $rsubprice_padding_left = "";
        }
        else {
            $subprice_padding_left=apply_filters( 'slcr_value_parameter_filter', $subprice_padding_left);
            $rsubprice_padding_left = " padding-left: " . $subprice_padding_left . " !important; padding-right: " . $subprice_padding_left . " !important;";
        }
        // condition for   subprice text transform  value
        if ($rsubprice_text_transform == "") {
            $r2subprice_text_transform = "";
        }
        else {
            $r2subprice_text_transform = " text-transform: " . $rsubprice_text_transform . " !important;";
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
        $output = "";
        $ruse_pricing_badge = "";
        // start badge ************************
        if ($use_pricing_badge == "Yes") {
            // Build the data array
            if ($pricing_table_type == "Pricing_Table_Type_1") {
                $slcr_custom_pricing_table_badge_css = '#slcr_custom_pricing_table_badge' . $uid2 . '{ background: ' . esc_attr($pricing_badge_color) . '; color: ' . esc_attr($pricing_badge_text_color) . '; }';
                $value=$slcr_custom_pricing_table_badge_css;
                do_action( 'wp_enqueue_scripts',$value,$name);
                $ruse_pricing_badge = '<div class="pricing-badge" id="slcr_custom_pricing_table_badge' . $uid2 . '">' . esc_attr($pricing_badge_title) . '</div>';
            }
            else {
                $slcr_custom_pricing_table_badge_css = '#slcr_custom_pricing_table_badge' . $uid2 . '{ background: ' . esc_attr($pricing_badge_color) . '; color: ' . esc_attr($pricing_badge_text_color) . '; }';
                $value=$slcr_custom_pricing_table_badge_css;
                do_action( 'wp_enqueue_scripts',$value,$name);
                $ruse_pricing_badge = '<div class="price-badge" id="slcr_custom_pricing_table_badge' . $uid2 . '">' . esc_html($pricing_badge_title) . '</div>';
            }
        }
        else {
            $ruse_pricing_badge = " ";
        }
        // make  featured****************************
        if ($make_featured == "Yes") {
            // Build the data array
            $rmake_featured = 'featured';
        }
        else {
            $rmake_featured = " ";
        }
        // pricing hover translate 
        $rpricing_hover_translate = ""; 
        if ($pricing_hover_translate == "Yes") {
            // Build the data array
            $rpricing_hover_translate = 'pricing-hover-translate';
        }
        else {
            $rpricing_hover_translate = "";
        }
        // ****************pricing_header_color**********
        if ($pricing_header_color != "") {
            // Build the data array
            $rpricing_header_color = ' background: ' . $pricing_header_color . ' !important; ';
        }
        else {
            $rpricing_header_color = " ";
        }
        // get  box link 3***********************************
        if ($pricing_box_link == "") {
            $rpricing_box_link = "#";
        }
        else {
            $rpricing_box_link = $pricing_box_link;
        }
        // **************************************button css start *******************************************//
        // parse link
        $link = ('||' === $link) ? '' : $link;
        $link = vc_build_link($link);
        $use_link = false;
        if (strlen($link['url']) > 0) {
            $use_link = true;
            $a_href = $link['url'];
            $a_title = $link['title'];
            $a_target = $link['target'];
            $a_rel = $link['rel'];
        }
        $attributes2 = "";
        if ($use_link) {
            $attributes2 = 'href="' . esc_html(trim($a_href)) . '" ';
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
        if ('true' === $fade_effect) {
            $rfade_effect = "animsition-link";
        }
        else {
            $rfade_effect = "";
        }
        if ($button_block == "true") {
            $rbutton_block = '';
            $slcr_custom_pricing_table_button_css = ' .slcr_custom_pricing_table_button_css_' . $uidstyle2 . ' { width: 100%; }';
            $value=$slcr_custom_pricing_table_button_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
        }
        else {
            $rbutton_block = '';
        }
        $html = "";
        switch ($button_type) {
        case 'Button_Ghost':
            $html = '
                <a ' . $attributes2 . ' class="btn ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' btn--ghost  slcr_custom_pricing_table_button_css_' . $uidstyle2 . '"><span>' . esc_html($button_title) . '</span></a> ';
            break; 
            
        case 'Button_Fill':
            $html = '
                        <a ' . $attributes2 . ' class="btn ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($button_fill_animation) . ' btn--fill slcr_custom_pricing_table_button_css_' . $uidstyle2 . '"><span>' . esc_html($button_title) . '</span></a> ';
            break;

        case 'Arrow_Icon':
            $html = ' 
                        <a ' . $attributes2 . ' class="btn ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . '  ' . esc_attr($rfade_effect) . '  ' . esc_attr($button_hover_styles) . '  ' . esc_attr($button_border_size) . '  ' . esc_attr($button_colors) . '  btn--icon-simple  slcr_custom_pricing_table_button_css_' . $uidstyle2 . '"><span>' . esc_html($button_title) . '</span>' . '<i class="static-icon arrow_right"></i></a>';
            break;

        case 'Background_Inverse':
            $html = '
                        <a ' . $attributes2 . ' class="btn ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($rfade_effect) . ' slcr_custom_pricing_table_button_css_' . $uidstyle2 . '"><span>' . esc_html($button_title) . '</span></a> ';
            break;

        default:
            $html = '
                        <a ' . $attributes2 . ' class="btn ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($button_border_size) . ' slcr_custom_pricing_table_button_css_' . $uidstyle2 . '"><span>' . esc_html($button_title) . '</span></a>';
            break;
        } 
        if($use_button!="Yes"){
             $html = '';
        }
        
        switch ($pricing_table_type) {
        case 'Pricing_Table_Type_2':
            $slcr_custom_pricing_table_css = ' .slcr_custom_pricing_table_css_' . $uidstyle2 . ' {  ' . esc_attr($rpricing_header_color) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .price-text { ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($r2price_text_transform) . '' . esc_attr($price_font_inline_style) . ' } .slcr_custom_pricing_table_css_subprice_' . $uidstyle2 . '{ ' . esc_attr($rsubprice_font_size) . '' . esc_attr($rsubprice_font_color) . '' . esc_attr($rsubprice_padding_top) . '' . esc_attr($rsubprice_padding_left) . '' . esc_attr($r2subprice_text_transform) . '' . esc_attr($subprice_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .plan-name { ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . '' . esc_attr($title_font_inline_style) . ' } .slcr_custom_pricing_table_css_tag_' . $uidstyle2 . '{ ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . '' . esc_attr($desc_font_inline_style) . '}';
            $value=$slcr_custom_pricing_table_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output.= '
                <div class="pricing__02 ' . esc_attr($rmake_featured) . ' ' . esc_attr($rpricing_hover_translate) . '  ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="pricing-header slcr_custom_pricing_table_css_' . $uidstyle2 . '">
                        <span class="price-text">' . esc_html($currency) . '' . esc_html($price). '</span>
                        <span class="price-tag slcr_custom_pricing_table_css_subprice_' . $uidstyle2 . '">' . esc_html($subprice) . '</span>
                        <div class="plan-name">' . esc_html($title) . '</div>
                        <div class="price-tag slcr_custom_pricing_table_css_tag_' . $uidstyle2 . '">' . esc_html($desc) . '</div>
                    </div>
                    <div class="pricing-content">
                        ' . wp_kses($content, $allowed_html) . '
                        <div class="pricing-footer">
                            ' . $html . '
                        </div>
                    </div>
                </div> ';
            break;

        case 'Pricing_Table_Type_3':
            $slcr_custom_pricing_table_css = ' .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .plan-name { ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . '' . esc_attr($title_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .plan-info { ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . '' . esc_attr($desc_font_inline_style) . ' } .slcr_custom_pricing_table_span_2_css_' . $uidstyle2 . ' { ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($r2price_text_transform) . '' . esc_attr($price_font_inline_style) . ' } .slcr_custom_pricing_table_span_3_css_' . $uidstyle2 . ' { ' . esc_attr($rsubprice_font_size) . '' . esc_attr($rsubprice_font_color) . '' . esc_attr($rsubprice_padding_top) . '' . esc_attr($rsubprice_padding_left) . '' . esc_attr($r2subprice_text_transform) . '' . esc_attr($subprice_font_inline_style) . ' }';
            $value=$slcr_custom_pricing_table_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $output.= ' 
                <a href="' . esc_url($rpricing_box_link) . '" class="pricing__03 ' . esc_attr($rmake_featured) . ' ' . esc_attr($rpricing_hover_translate) . '  ' . esc_attr($css_class) . '  '. esc_attr($el_class). ' slcr_custom_pricing_table_css_' . $uidstyle2 . '" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="plan-name">' . esc_html($title) . '</div>
                    <p class="plan-info">' . esc_html($desc) . '</p>
                    <div class="plan-pricing">
                        <div class="plan-period">Starting From</div>
                        <div class="price-tag">
                            <span>' . esc_html($currency) . '</span>
                            <span class="slcr_custom_pricing_table_span_2_css_' . $uidstyle2 . '">' . esc_html($price) . '</span>
                            <span class="plan-timing slcr_custom_pricing_table_span_3_css_' . $uidstyle2 . '">' . esc_html($subprice) . '</span>
                        </div>
                    </div>
                </a>';
        break;

        case 'Pricing_Table_Type_4':
            $slcr_custom_pricing_table_css = ' .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing_plan_4 h3 { ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . '} .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .gap-10 .pricing-value .pricing-amount { ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($r2price_text_transform) . ' ' . esc_attr($price_font_inline_style) . '} .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .gap-10 .pricing-value .plan-period { ' . esc_attr($rsubprice_font_size) . '' . esc_attr($rsubprice_font_color) . '' . esc_attr($rsubprice_padding_top) . '' . esc_attr($rsubprice_padding_left) . '' . esc_attr($r2subprice_text_transform) . ' ' . esc_attr($subprice_font_inline_style) . '} .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .gap-10 .pricing-value .font-reset { ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . ' ' . esc_attr($desc_font_inline_style) . ' } ';
            $value=$slcr_custom_pricing_table_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output.= '
                <div class="pricing__04 ' . esc_attr($rmake_featured) . ' ' . esc_attr($rpricing_hover_translate) . '' . esc_attr($css_class) . '  '. esc_attr($el_class). ' slcr_custom_pricing_table_css_' . $uidstyle2 . '" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="pricing_plan_4">
                        <h3 class="gap-0">' . esc_html($title) . '</h3>
                    </div>
                    <div class="gap-10">
                        <div class="pricing-value">
                            <span class="pricing-symbol">' . esc_html($currency) . '</span>
                            <span class="pricing-amount">' . esc_html($price) . '</span>
                            <span class="plan-period">' . esc_html($subprice) . '</span>
                            <p class="font-reset">' . esc_html($desc) . '</p>
                        </div>
                    </div>
                    <div class="gap-30">
                        ' . wp_kses($content, $allowed_html) . '
                    </div>
                    <div class="gap-30">
                        ' . $html . '
                    </div>
                </div> ';
            break;

        case 'Pricing_Table_Type_5': 
            $rrimg_url ='';
            if(empty($img_url[0])){
                $rrimg_url ='';
            }else {
                $rrimg_url ='<img src="' . $img_url[0] . '" alt="'. esc_attr__('Image Icon','sc-core').'" class="image-icon" />';
            }
            $slcr_custom_pricing_table_css = ' .slcr_custom_pricing_table_css_' . $uidstyle2 . ' h4 { ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing-info .pricing-tag { ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($r2price_text_transform) . ' ' . esc_attr($price_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing-info .pricing-slug { ' . esc_attr($rsubprice_font_size) . '' . esc_attr($rsubprice_font_color) . '' . esc_attr($rsubprice_padding_top) . '' . esc_attr($rsubprice_padding_left) . '' . esc_attr($r2subprice_text_transform) . ' ' . esc_attr($subprice_font_inline_style) . ' }';
            $value=$slcr_custom_pricing_table_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output.= '
                               
                <div class="pricing__05 text-center ' . esc_attr($rmake_featured) . ' ' . esc_attr($rpricing_hover_translate) . '  ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_pricing_table_css_' . $uidstyle2 . '" ' . implode(' ', $wrapper_attributes) . '> 
                   ' . $ruse_pricing_badge . '
                   <h4 class="mb-30 gap-0 font-600">' . esc_html($title) . '</h4>
                   '.$rrimg_url.'
                   <div class="gap-30">
                       ' . wp_kses($content, $allowed_html) . '
                   </div>
                   <div class="pricing-info gap-30">
                       <span class="pricing-symbol">' . esc_html($currency) . '</span>
                       <span class="pricing-tag">' . esc_html($price) . '</span>
                       <span class="pricing-slug">' . esc_html($subprice) . '</span>
                   </div>
                   <div class="gap-30">
                       ' . $html . '
                   </div>
               </div> 
               ';
            break;

        default:
            $slcr_custom_pricing_table_css = ' .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing-info { ' . esc_attr($rtitle_font_size) . '' . esc_attr($rtitle_font_color) . '' . esc_attr($rtitle_padding_top) . '' . esc_attr($rtitle_padding_left) . '' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing-tag .pricing-period-2 { ' . esc_attr($rprice_font_size) . '' . esc_attr($rprice_font_color) . '' . esc_attr($rprice_padding_top) . '' . esc_attr($rprice_padding_left) . '' . esc_attr($r2price_text_transform) . ' ' . esc_attr($price_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' .pricing-tag .pricing-period { ' . esc_attr($rsubprice_font_size) . '' . esc_attr($rsubprice_font_color) . '' . esc_attr($rsubprice_padding_top) . '' . esc_attr($rsubprice_padding_left) . '' . esc_attr($r2subprice_text_transform) . ' ' . esc_attr($subprice_font_inline_style) . ' } .slcr_custom_pricing_table_css_' . $uidstyle2 . ' p.plan-info { ' . esc_attr($rdesc_font_size) . '' . esc_attr($rdesc_font_color) . '' . esc_attr($rdesc_padding_top) . '' . esc_attr($rdesc_padding_left) . '' . esc_attr($r2desc_text_transform) . ' ' . esc_attr($desc_font_inline_style) . ' }';
            $value=$slcr_custom_pricing_table_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $output.= '
            
               <div class="pricing__01 ' . esc_attr($rmake_featured) . ' ' . esc_attr($rpricing_hover_translate) . '' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_pricing_table_css_' . $uidstyle2 . '" ' . implode(' ', $wrapper_attributes) . '>
                   ' . $ruse_pricing_badge . '
                   <div class="pricing-info" >' . esc_html($title) . '</div>
                   <div class="pricing-tag">
                       <span class="pricing-symbol">' . esc_html($currency) . '</span>
                       <span class="pricing-period-2">' . esc_html($price) . '</span>
                       <span class="pricing-period">' . esc_html($subprice) . '</span>
                   </div>
                   <p class="plan-info">' . esc_html($desc) . '</p>
                    ' . wp_kses($content, $allowed_html) . '
                    ' . $html . '
               </div> 
               ';
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
new Pricing_Table_Class();
?>