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
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $css = $offset = $css_animation = $z_index ='';
$output = '';
$uid24 = uniqid();
$atts = vc_map_get_attributes($this->getShortcode() , $atts);
extract($atts);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
if ($content_style == 'content_light') {
    $ccontent_style = 'content-light';
}
elseif ($content_style == 'content_dark') {
    $ccontent_style = 'content-dark';
}
$css_classes = array(
    $this->getExtraClass($el_class) . $this->getCSSAnimation($css_animation) ,
    'wpb_column',
    'vc_column_container',
    $ccontent_style,
    $width,
);
if (vc_shortcode_custom_css_has_property($css, array(
    'border',
    'background',
))) {
    $css_classes[] = 'vc_col-has-fill';
}
$wrapper_attributes = array();
$css_class = preg_replace('/\s+/', ' ', apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($css_classes)) , $this->settings['base'], $atts));

if(!empty($z_index)){  
 $rz_index='.column-z-index-' . $uid24 . '{
    z-index:'.esc_attr($z_index).';
}'; 
$name="inline_slcr";
$value=$rz_index;
do_action( 'wp_enqueue_scripts',$value,$name);
}
$wrapper_attributes[] = 'class="' . esc_attr(trim($css_class)) . ' column-z-index-' . $uid24 . '"';
if (!empty($el_id)) {
    $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}
echo '<div ' . implode(' ', $wrapper_attributes) . '> 
        <div class="vc_column-inner ' . esc_attr(trim(vc_shortcode_custom_css_class($css))) . '"> 
            <div class="wpb_wrapper">'.wpb_js_remove_wpautop($content).' 
            </div> 
        </div>
    </div>'; 