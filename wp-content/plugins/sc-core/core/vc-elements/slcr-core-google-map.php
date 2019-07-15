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
 * Element Description: VC Slcr Google Map
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Google_Map')) {
    class Slcr_Google_Map extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_google_map', array(
                $this,
                'slcr_google_map_callback'
            )); 
        }
        function slcr_google_map_callback($atts)
        {
             extract(shortcode_atts(array( 
                'slcr_google_map_height' => '',
                'slcr_google_map_zoom' => '',
                'slcr_google_map_marker_locations' => '',
                'slcr_google_map_center_lat' => '',
                'slcr_google_map_center_long' => '',
                'slcr_google_map_custom_icon' => '',
                'slcr_google_map_style' => '',
                'slcr_custom_water_color_map' => '',
                'slcr_custom_landscape_color_map' => '',
                'slcr_custom_highway_color_map' => '',
                'slcr_custom_poi_color_map' => '',
                'slcr_custom_labels_text_stroke_map' => '',
                'slcr_custom_geometry_on_off_map' => '', 
                'himg' => '', 
                'el_class' => '',
                'css' => '',
                'slcr_img_link_template' => '',
            ) , $atts)); 
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $rslcr_google_map_height="";
            if ($slcr_google_map_height == "") {
                $rslcr_google_map_height = "500px";
            }else {
                $slcr_google_map_height=apply_filters( 'slcr_value_parameter_filter', $slcr_google_map_height);
                $rslcr_google_map_height = $slcr_google_map_height;
            }
            $rslcr_google_map_center_lat="";
            if ($slcr_google_map_center_lat == "") {
                $rslcr_google_map_center_lat = "40.793";
            }else {
                $rslcr_google_map_center_lat = $slcr_google_map_center_lat;
            }
            $rslcr_google_map_center_long="";
            if ($slcr_google_map_center_long == "") {
                $rslcr_google_map_center_long = "-73.950";
            }else {
                $rslcr_google_map_center_long = $slcr_google_map_center_long;
            }
            $img_url = wp_get_attachment_image_src($himg, "full");
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            }
            $rimg_url='data-custom-marker="false"'; 
            if($slcr_google_map_custom_icon==true){
                  if($img_url[0] != ""){
                    $rimg_url = 'data-custom-marker="'.esc_url($img_url[0]).'"';  
                }else {
                    $rimg_url = 'data-custom-marker="http://slashcreative.co/main/wp-content/uploads/2018/04/slcr-map-marker.png"';
                }  
            }
 
            if($slcr_custom_water_color_map==""){
                $rslcr_custom_water_color_map="null";
            }else {
                $rslcr_custom_water_color_map=$slcr_custom_water_color_map;
            }
            if($slcr_custom_landscape_color_map==""){
                $rslcr_custom_landscape_color_map="null";
            }else {
                $rslcr_custom_landscape_color_map=$slcr_custom_landscape_color_map;
            }
            if($slcr_custom_highway_color_map==""){
                $rslcr_custom_highway_color_map="null";
            }else {
                $rslcr_custom_highway_color_map=$slcr_custom_highway_color_map;
            }
            if($slcr_custom_poi_color_map==""){
                $rslcr_custom_poi_color_map="null";
            }else {
                $rslcr_custom_poi_color_map=$slcr_custom_poi_color_map;
            }
            if($slcr_custom_labels_text_stroke_map==""){
                $rslcr_custom_labels_text_stroke_map="on";
            }else {
                $rslcr_custom_labels_text_stroke_map="off";
            }
            if($slcr_custom_geometry_on_off_map==""){
                $rslcr_custom_geometry_on_off_map="on";
            }else {
                $rslcr_custom_geometry_on_off_map="off";
            } 
            $output = ""; 
            $uid = uniqid(); 
            $slcr_custom_gmap_css = '.slcr-map-'.$uid.'{ height: '.$rslcr_google_map_height.'; }';
            $name="inline_slcr";
            $value=$slcr_custom_gmap_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            add_action( 'wp_footer', array( $this, 'slcr_custom_gmap_hook' ) , 100 ); 
            $privacy_consent="";
            $privacy_consent_css="";
            global $slcr_redux;  
            $get_result =apply_filters( 'slcr_cookies_verify_filter', 'gmap');
            if($get_result=="gmap"){
                $img = SLCR_THEME_IMAGE_URI . 'map-privacy.jpg';
                $output.=
                '<div class="map__privacy" data-bg-overlay="9">
                    <img src="'.$img.'" class="privacy__image" alt="'.esc_attr__( 'Content Blocked', 'sc-core' ).'">
                    <div class="privacy__frame">
                        <i class="privacy__icon icon_map"></i>
                        '.esc_html__("This content is blocked due to privacy reasons, you need to allow the use of cookies.", "sc-core").' 
                        <button type="button" class="slcr_cookies_verify_gmap" data-privacy_consent="'.esc_attr($get_result).'" data-days_ex="'.esc_attr($slcr_redux['general_settings_privacy_cookie_days']).'">'.esc_html__("I Agree","sc-core").'</button>
                    </div>
                </div>'; 

            }else {
                $output.= '<div class="slcr-google-map  ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr-map-'.$uid.' " id="slcr-map-'.$uid.'" data-map-id="slcr-map-'.$uid.'" data-map-zoom="'.esc_attr($slcr_google_map_zoom).'" data-map-marker-locations="'.esc_attr($slcr_google_map_marker_locations).'" data-center-lat="'.esc_attr($rslcr_google_map_center_lat).'" data-center-long="'.esc_attr($rslcr_google_map_center_long).'" data-slcr-google-map-style="'.esc_attr($slcr_google_map_style).'" data-slcr-custom-water-color="'.esc_attr($rslcr_custom_water_color_map).'" data-slcr-custom-landscape-color="'.esc_attr($rslcr_custom_landscape_color_map).'" data-slcr-custom-highway-color="'.esc_attr($rslcr_custom_highway_color_map).'" data-slcr-custom-poi-color="'.esc_attr($rslcr_custom_poi_color_map).'" data-slcr-custom-labels-text-stroke="'.esc_attr($rslcr_custom_labels_text_stroke_map).'" data-slcr-custom-geometry-on-off="'.esc_attr($rslcr_custom_geometry_on_off_map).'" '.$rimg_url.'></div>';   
            }
            return $output;
        }
        
        public function slcr_custom_gmap_hook() {
            global $slcr_redux;
            global $check_slcr_google_map_js;
            if($check_slcr_google_map_js!=1){
                if(!empty($slcr_redux["general_settings_functionality_map_api"])){
                    echo '<script async defer src="https://maps.googleapis.com/maps/api/js?key='.esc_attr($slcr_redux["general_settings_functionality_map_api"]).'&callback=initMap"></script>'; 
                }
                $check_slcr_google_map_js=1;
            }
        }
    }
    // Finally initialize code
    new Slcr_Google_Map;
}