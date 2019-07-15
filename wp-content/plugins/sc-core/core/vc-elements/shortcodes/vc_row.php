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
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $slcr_row_main_gradient
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = $z_index = $slcr_img_link_template = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes($this->getShortcode() , $atts);
extract($atts);
$el_class = $this->getExtraClass($el_class) . $this->getCSSAnimation($css_animation);
$uid24 = uniqid();
if ($content_style == 'content_light') {
    $ccontent_style = 'content-light';
}
elseif ($content_style == 'content_dark') {
    $ccontent_style = 'content-dark';
}
if ($bg_o_e == '') {
    $cOverlay_transparency = '';
}
else {
    $cOverlay_transparency = $bg_o_e;
}
if ($add_overlay == 'true') {
    $rcOverlay_transparency = 'data-bg-overlay="' . esc_attr($cOverlay_transparency) . '"  data-bg-color-' . $uid24 . '="' . esc_attr($cOverlay_transparency) . '" ';
}
else {
    $rcOverlay_transparency = '';
}
$css_classes = array(
    'vc_row',
    'wpb_row',
    // deprecated
    'vc_row-fluid',
    $el_class,
    $ccontent_style,
    'data-bg-color-' . $uid24,
    vc_shortcode_custom_css_class($css) ,
);
if ('yes' === $disable_element) {
    if (vc_is_page_editable()) {
        $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
    }
    else {
        return '';
    }
}
if (vc_shortcode_custom_css_has_property($css, array(
    'border',
    'background',
)) || $video_bg || $parallax) {
    $css_classes[] = 'vc_row-has-fill';
}
if (!empty($atts['gap'])) {
    $css_classes[] = 'vc_column-gap-' . esc_attr($atts['gap']);
}
$wrapper_attributes = array();
// build attributes for wrapper
if (!empty($el_id)) {
    $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}
if (!empty($full_width)) {
    $wrapper_attributes[] = 'data-vc-full-width="true"';
    $wrapper_attributes[] = 'data-vc-full-width-init="false"';
    if ('stretch_row_content' === $full_width) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
    }
    elseif ('stretch_row_content_no_spaces' === $full_width) {
        $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $css_classes[] = 'vc_row-no-padding';
    }
    $after_output.= '
<div class="vc_row-full-width vc_clearfix"></div>
';
}
if (!empty($full_height)) {
    $css_classes[] = 'vc_row-o-full-height';
    if (!empty($columns_placement)) {
        $flex_row = true;
        $css_classes[] = 'vc_row-o-columns-' . esc_attr($columns_placement);
        if ('stretch' === $columns_placement) {
            $css_classes[] = 'vc_row-o-equal-height';
        }
    }
}
if (!empty($equal_height)) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-equal-height';
}
if (!empty($content_placement)) {
    $flex_row = true;
    $css_classes[] = 'vc_row-o-content-' . esc_attr($content_placement);
}
if (!empty($flex_row)) {
    $css_classes[] = 'vc_row-flex';
}
$has_video_bg = (!empty($video_bg) && !empty($video_bg_url) && vc_extract_youtube_id($video_bg_url));
$parallax_speed = $parallax_speed_bg;
if ($has_video_bg) {
    $parallax = $video_bg_parallax;
    $parallax_speed = $parallax_speed_video;
    $parallax_image = $video_bg_url;
    $css_classes[] = 'vc_video-bg-container';
    wp_enqueue_script('vc_youtube_iframe_api_js');
}
if (!empty($parallax)) {
    wp_enqueue_script('vc_jquery_skrollr_js');
    $wrapper_attributes[] = 'data-vc-parallax="' . esc_attr($parallax_speed) . '"'; // parallax speed
    $css_classes[] = 'vc_general vc_parallax vc_parallax-' . esc_attr($parallax);
    if (false !== strpos($parallax, 'fade')) {
        $css_classes[] = 'js-vc_parallax-o-fade';
        $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
    }
    elseif (false !== strpos($parallax, 'fixed')) {
        $css_classes[] = 'js-vc_parallax-o-fixed';
    }
}
if ($slcr_row_main_gradient == "gradient_1"){
    $css_classes[] = 'bg--gradient-1';
}elseif ($slcr_row_main_gradient == "gradient_2") {
    $css_classes[] = 'bg--gradient-2';
}
if (!empty($parallax_image)) {
    if ($has_video_bg) {
        $parallax_image_src = $parallax_image;
    }
    else {
        $parallax_image_id = preg_replace('/[^\d]/', '', $parallax_image);
        $parallax_image_src = wp_get_attachment_image_src($parallax_image_id, 'full');
        if (!empty($parallax_image_src[0])) {
            $parallax_image_src = $parallax_image_src[0];
        }
    }
    $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_url($parallax_image_src) . '"';
}
if (!empty($slcr_img_link_template) && empty($parallax_image_src[0])) {
    if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
        $parallax_image_src = $slcr_img_link_template;
        $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_url($parallax_image_src) . '"';
    } 
} 
if (!$parallax && $has_video_bg) {
    $wrapper_attributes[] = 'data-vc-video-bg="' . esc_url($video_bg_url) . '"';
}
$css_class = preg_replace('/\s+/', ' ', apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter(array_unique($css_classes))) , $this->settings['base'], $atts));
if($slcr_enable_row_curve=="Yes"){
$wrapper_attributes[] = 'class="slcr_row_curve ' . esc_attr(trim($css_class)) . ' row-z-index-' . $uid24 . '"'; 
    }
else {
$wrapper_attributes[] = 'class="' . esc_attr(trim($css_class)) . ' row-z-index-' . $uid24 . '"';    
}
// condition for   title text color value
$oz_index=1;
$rz_index="";

if(!empty($z_index)){ 
$rz_index='.row-z-index-' . $uid24 . '{
    z-index:'.esc_attr($z_index).';
}'; 
$name="inline_slcr";
$value=$rz_index;
do_action( 'wp_enqueue_scripts',$value,$name);
$oz_index=1+$z_index;
}

if ($overlay_bg_color == "") {
}
else {
    $slcr_row_c = '[data-bg-color-' . $uid24 . ']:before { content: ""; position: absolute; background-color: ' . esc_attr($overlay_bg_color) . '; height: 100%; width: 100%; top: 0; left: 0; z-index: '.esc_attr($oz_index).'; } .data-bg-color-' . $uid24 . '.vc_row.vc_row-flex::after, .vc_row.vc_row-flex::before { display: inherit; } .data-bg-color-' . $uid24 . '.vc_row:after, .vc_row:before { content: " "; display: inherit; }'; 
    $name="inline_slcr";
    $value=$slcr_row_c;
    do_action( 'wp_enqueue_scripts',$value,$name);
} 
$row_curve="";
$rslcr_type_row_curve="";
if ($slcr_type_row_curve=="Round") {
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,17v214h1366V17C1366,17,739,411,0,17z"/>';
} elseif ($slcr_type_row_curve=="Round_left") {
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1366,18v213.44H0.2L0,93.56c156.26,39.38,310.97,59.07,464.11,59.07 c153.69,0,454.33-44.27,901.89-132.8V18L1366,18z"/>';
}elseif($slcr_type_row_curve=="Round_right"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,18v213.44h1365.8l0.2-137.87c-156.26,39.38-310.97,59.07-464.11,59.07 C748.2,152.63,447.57,108.37,0,19.84V18L0,18z"/>';
}elseif($slcr_type_row_curve=="Tilt_right"){
    $rslcr_type_row_curve='<polygon fill="'.esc_attr($slcr_type_row_curve_color).'" points="0,16.8 1366,209.76 1366,231 0,231 "/>';
}elseif($slcr_type_row_curve=="Curve_round_opposite"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1366,231H0C0,231,627-163,1366,231z"/>';
}elseif($slcr_type_row_curve=="Tilt_both_round"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,0v231h1366V0L782,197l-43,13c0,0-40,14-56,13c-19,2-56-12-56-12l-44-14L0,0z"/>';
}elseif($slcr_type_row_curve=="Tilt_both"){
    $rslcr_type_row_curve='<polygon fill="'.esc_attr($slcr_type_row_curve_color).'" class="st1" points="0,17 0,231 1366,231 1366,17 683,192 "/>';
}elseif($slcr_type_row_curve=="Wave_sm_left"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,44v187h1366V96c0,0-49.72-4.82-305.56,46.38c-73.92,11.1-167.04,53.82-341.76,3.7 C475.32,85.02,300,0,103.32,19.63C3.12,32.43,0,37.75,0,37.75V44z"/>';
}elseif($slcr_type_row_curve=="Wave_sm_right"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1366,44v187H0V96c0,0,49.72-4.82,305.56,46.38c73.92,11.1,167.04,53.82,341.76,3.7
    C890.68,85.02,1066,0,1262.68,19.63C1362.88,32.43,1366,37.75,1366,37.75V44z"/>';
}elseif($slcr_type_row_curve=="Waves_lg_left"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,23.04v209.6h1366v-66.01c0,0-179.7,85.69-325.62,0S855.27,53.15,698.54,85.58
    c-123.63,22-234.42-63.69-312.79-67.16C275.41,7.8,209.88,44.08,165.06,49.1C120.25,53.92,52.69,76.89,0,23.04z"/>';
}elseif($slcr_type_row_curve=="Waves_lg_right"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1366,22.04v209.6H0v-66.01c0,0,179.7,85.69,325.62,0S510.73,52.15,667.46,84.58
    c123.63,22,234.42-63.69,312.79-67.16c110.34-10.61,175.87,25.67,220.69,30.69C1245.75,52.92,1313.31,75.89,1366,22.04z"/>';
}elseif($slcr_type_row_curve=="Waves_md_left"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,54c0,0,106,134,307,101c246-63,285-39,368-22c106,33,225,90,292,62c109-39,255-191,399-178 c0,128,0,214,0,214H0V54z"/>
    <path fill="'.esc_attr($slcr_type_row_curve_color).'" style="opacity: 0.45" d="M-1,231h188h1178c0,0,2-104,0-214c-297,10-383,309-632,143c-39,0-122,51-325-17C172,216-1,31-1,31"/>
    <path fill="'.esc_attr($slcr_type_row_curve_color).'" style="opacity: 0.45" d="M1366,227c0,0,0-71.03,0-203c-198-44-439,252-559,156c-13,1,0.7-9.44-53-20c-116.23-22.86-254.55-23.5-371-17 C157,121-4,172.01-4,172.01"/>';
}elseif($slcr_type_row_curve=="Waves_md_right"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1367,54c0,0-106.08,134-307.22,101c-246.18-63-285.21-39-368.27-22c-106.08,33-225.16,90-292.21,62 C290.21,156,144.11,4,0,17c0,128,0,214,0,214h1367V54z"/>
    <path style="opacity: 0.45" fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1368,231h-188.14H1c0,0-2-104,0-214c297.22,10,383.28,309,632.46,143c39.03,0,122.09,51,325.24-17
        C1194.87,216,1368,31,1368,31"/>
    <path style="opacity: 0.45" fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,227c0,0,0-71.03,0-203c198.14-44,439.32,252,559.41,156c13.01,1-0.71-9.44,53.04-20 c116.31-22.86,254.73-23.5,371.27-17c226.16-22,387.28,29.01,387.28,29.01"/>';
}elseif($slcr_type_row_curve=="Waves_multiple_left"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" style="opacity: 0.55" d="M1366,137.1v95.54H0V43.87c0,0,121.56,94.39,421.04,37.73c108.48-12,199.96,6.24,244.6,15.6
    c145.2,38.16,177.84,90.48,287.04,65.88C1043.88,140.4,1165.8,25.92,1366,137.1z"/>
    <path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M0,73.44v159.2h1366v-44c0,0-150.52-86.4-416.44,25.92c0,0-67.27,21.23-134.95-9.01
    C759,186.72,654.84,81.6,475.12,78.55c-125.08,4.01-243.16,30.41-281.56,33.77C99,120.96,0,73.44,0,73.44z"/>';
}elseif($slcr_type_row_curve=="Waves_multiple_right"){
    $rslcr_type_row_curve='<path fill="'.esc_attr($slcr_type_row_curve_color).'" style="opacity: 0.55" d="M0,137.1l0,95.54h1366V43.87c0,0-121.56,94.39-421.04,37.73c-108.48-12-199.96,6.24-244.6,15.6
    c-145.2,38.16-177.84,90.48-287.04,65.88C322.12,140.4,200.2,25.92,0,137.1z"/>
    <path fill="'.esc_attr($slcr_type_row_curve_color).'" d="M1366,73.44v159.2H0l0-44c0,0,150.52-86.4,416.44,25.92c0,0,67.27,21.23,134.95-9.01
    C607,186.72,711.16,81.6,890.88,78.55c125.08,4.01,243.16,30.41,281.56,33.77C1267,120.96,1366,73.44,1366,73.44z"/>';
}else {
    $rslcr_type_row_curve='<polygon fill="'.esc_attr($slcr_type_row_curve_color).'" points="1366,16.8 0,209.76 0,231 1366,231 "/>';
}

$rslcr_type_row_curve_height="";
$rslcr_row_curve_animation="";
if($slcr_row_curve_animation=="Yes"){
    $rslcr_row_curve_animation="yes";
        $rslcr_type_row_curve_height="";
    if($slcr_type_row_curve_height!=""){
        $rslcr_type_row_curve_height='height:0px;';
    }
}else {
    $rslcr_row_curve_animation="no";
        $rslcr_type_row_curve_height="";
if($slcr_type_row_curve_height!=""){
    $slcr_type_row_curve_height=apply_filters( 'slcr_value_parameter_filter', esc_attr($slcr_type_row_curve_height));
    $rslcr_type_row_curve_height='height:'.$slcr_type_row_curve_height.';';
}
else {
    $rslcr_type_row_curve_height='height:150px;';
}
}
$uid2 = uniqid();
if($slcr_enable_row_curve=="Yes"){
    $slcr_row_height__css = '#slcr_row_height_' . $uid2 . '{ '.esc_attr($rslcr_type_row_curve_height).' }';
    $name="inline_slcr";
    $value=$slcr_row_height__css;
    do_action( 'wp_enqueue_scripts',$value,$name);
$slcr_type_row_curve_height=apply_filters( 'slcr_value_parameter_filter', $slcr_type_row_curve_height);
$row_curve.='<div class="row__shape" data-shape-type="'.esc_attr($slcr_type_row_curve).'" data-curve-height="'.esc_attr($slcr_type_row_curve_height).'" data-curve-animation="'.esc_attr($rslcr_row_curve_animation).'" data-shape-direction="'.esc_attr($slcr_type_row_curve_position).'" id="slcr_row_height_' . $uid2 . '" > 
    <svg version="1.1" class="shape__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1366 231" preserveAspectRatio="none" style="enable-background:new 0 0 1366 231;" xml:space="preserve">';
$row_curve.=$rslcr_type_row_curve;
$row_curve.='</svg>
   </div>';    
}
echo '<div ' . implode(' ', $wrapper_attributes) . ' ' . $rcOverlay_transparency . '>'.wpb_js_remove_wpautop($content).$row_curve.'</div>'.$after_output; 