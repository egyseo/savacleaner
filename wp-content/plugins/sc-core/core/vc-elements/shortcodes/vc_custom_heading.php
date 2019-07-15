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
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $el_id
 * @var $css
 * @var $css_animation
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */
$source = $text = $link = $google_fonts = $font_container = $el_id = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = $custom_heading_font_weights = $letter_spacing = $custom_heading_element_font_gradient = $custom_heading_element_font_color_gradient = '' ;
// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

/**
 * @var $css_class
 */
extract( $this->getStyles( $el_class . $this->getCSSAnimation( $css_animation ), $css, $google_fonts_data, $font_container_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsesubsetts = '&=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}

if ( ! empty( $styles ) ) {
	if ($letter_spacing == "") {
            $rletter_spacing = "";
        }
        else {
        	$letter_spacing=apply_filters( 'slcr_value_parameter_filter', $letter_spacing);
            $rletter_spacing = " letter-spacing: " . esc_attr($letter_spacing) . ";";
        }
	$style =  esc_attr( implode( ';', $styles ) ) . '; '.$rletter_spacing ;
} else {
	if ($letter_spacing == "") {
            $rletter_spacing = "";
            $style = '';
        }
        else {
        	$letter_spacing=apply_filters( 'slcr_value_parameter_filter', $letter_spacing);
            $rletter_spacing = " letter-spacing: " . esc_attr($letter_spacing) . ";";
            $style = $rletter_spacing;
        }
	
	
}
$rcustom_heading_element_font_color_gradient="";
if ($custom_heading_element_font_gradient == 'Yes') {
    if($custom_heading_element_font_color_gradient=="text--gradient-2"){
        $rcustom_heading_element_font_color_gradient = " ".$custom_heading_element_font_color_gradient;
    }else{
        $rcustom_heading_element_font_color_gradient = " text--gradient-1";
    }
} 

if ( 'post_title' === $source ) {
	$text = get_the_title( get_the_ID() );
}
$allowed_html = slcr_helper()->slcr_allowed_html(); 
if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . wp_kses($text, $allowed_html) . '</a>';
}else {
    $text = wp_kses($text, $allowed_html);
}
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$uid2 = uniqid();
$slcr_custom_heading_css = '#slcr_custom_heading_' . $uid2 . '{ '.$style.' }';
$name="inline_slcr";
$value=$slcr_custom_heading_css;
do_action( 'wp_enqueue_scripts',$value,$name); 
$output = '';
if ( apply_filters( 'vc_custom_heading_template_use_wrapper', false ) ) {
	echo '<div class="' . esc_attr( $css_class ) .esc_attr($rcustom_heading_element_font_color_gradient).'" ' . implode( ' ', $wrapper_attributes ) . '><' . $font_container_data['values']['tag'] . ' id="slcr_custom_heading_' . $uid2 . '" class=" ' . esc_attr($custom_heading_font_weights) . '" >'.$text.'</' . $font_container_data['values']['tag'] . '></div>';
} else {
	echo '<' . $font_container_data['values']['tag'] . ' id="slcr_custom_heading_' . $uid2 . '" class="' . esc_attr( $css_class ) . ' ' . esc_attr($custom_heading_font_weights) .esc_attr($rcustom_heading_element_font_color_gradient).'" ' . implode( ' ', $wrapper_attributes ) . '>'.$text.'</' . $font_container_data['values']['tag'] . '>';
}
 