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
 * Element Description: Slcr Video Modal
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Video_Modal')) {
    class Slcr_Video_Modal extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_video_modal', array(
                $this,
                'slcr_video_modal_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_video_modal_scripts'
            ) , 1);
        }

        function slcr_video_modal_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'slcr_video_modal_type' => '',
                'slcr_video_url' => '',
                'slcr_video_url_type' => '',
                'himg' => '',
                'slcr_video_icon_animation' => '',
                'slcr_video_icon_color' => '',
                'slcr_video_icon_bg_color' => '',
                'slcr_video_icon_border_color' => '',
                'slcr_video_icon_animation_color' => '',
                'slcr_video_hover_shadow' => '',
                'slcr_video_image_effect' => '',
                'title' => '',
                'title_font_size' => '',
                'title_text_transform' => '',
                'title_padding_top' => '',
                'title_padding_left' => '',
                'title_use_theme_fonts' => '',
                'title_google_font_select' => '',
                'title_font_color' => '',
                'slcr_video_button_animation' => '', 
                'video_button_padding' => '',
                'el_class' => '',
                'css' => '',
                'slcr_img_link_template' => '',
            ) , $atts));

            // get custom css value 
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $img_url = wp_get_attachment_image_src($himg, "full");  
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template;
                } 
            } 

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
                $rtitle_font_size = ' font-size: ' . $title_font_size . ';';
            }

            // condition for   title text color value

            if ($title_font_color == "") {
                $rtitle_font_color = "";
            }
            else {
                $rtitle_font_color = ' color: ' . $title_font_color . ';';
            }

            // condition for   title text padding top  bottom value

            if ($title_padding_top == "") {
                $rtitle_padding_top = "";
            }
            else {
                $title_padding_top=apply_filters( 'slcr_value_parameter_filter', $title_padding_top);
                $rtitle_padding_top = ' padding-top: ' . $title_padding_top . '; padding-bottom: ' . $title_padding_top . ';';
            }

            // condition for   title text padding left right value

            if ($title_padding_left == "") {
                $rtitle_padding_left = "";
            }
            else {
                $title_padding_left=apply_filters( 'slcr_value_parameter_filter', $title_padding_left);
                $rtitle_padding_left = ' padding-left: ' . $title_padding_left . '; padding-right: ' . $title_padding_left . ';';
            }

            if ($video_button_padding == "") {
                $rvideo_button_padding = "";
            }
            else {
                $video_button_padding=apply_filters( 'slcr_value_parameter_filter', $video_button_padding);
                $rvideo_button_padding = ' padding: ' . $video_button_padding . ' !important;';
            }
            
            // condition for   title text transform  value

            if ($rtitle_text_transform == "") {
                $r2title_text_transform = "";
            }
            else {
                $r2title_text_transform = ' text-transform: ' . $rtitle_text_transform . ';';
            }

            if ($slcr_video_hover_shadow == 'true') {
                $rslcr_video_hover_shadow = "true";
            }
            else {
                $rslcr_video_hover_shadow = "false";
            }

            if ($slcr_video_image_effect == 'true') {
                $rslcr_video_image_effect = "true";
            }
            else {
                $rslcr_video_image_effect = "false";
            }

            if ($slcr_video_icon_color == "") {
                $rslcr_video_icon_color = ' color: #000;';
            }
            else {
                $rslcr_video_icon_color = ' color: ' . $slcr_video_icon_color . ';';
            }

            if ($slcr_video_icon_bg_color == "") {
                $rslcr_video_icon_bg_color = ' background: #fff;';
            }
            else {
                $rslcr_video_icon_bg_color = ' background: ' . $slcr_video_icon_bg_color . ';';
            }

            if ($slcr_video_icon_border_color == "") {
                $rslcr_video_icon_border_color = ' border: 1px solid #fff;';
            }
            else {
                $rslcr_video_icon_border_color = ' border: 1px solid ' . $slcr_video_icon_border_color . ';';
            }

            if ($slcr_video_icon_animation_color == "") {
                $rslcr_video_icon_animation_color = ' border: 1px solid #fff;';
            }
            else {
                $rslcr_video_icon_animation_color = ' border: 1px solid ' . $slcr_video_icon_animation_color . ';';
            }
            if ($slcr_video_button_animation == 'true') {
                 $rslcr_video_button_animation = "true";
            }
            else {
                $rslcr_video_button_animation = "false";
            }
            $uid2 = uniqid();
            $slcr_video_modals_last = ' #slcr_video_play_inner' . $uid2 . '.video_btn_inner:before, #slcr_video_play_' . $uid2 . '.video_play_button:before {  display: block; position: absolute; top: 50%; left: 50%; width: 100%; height: 100%; margin: -50% auto auto -50%; -webkit-transform-origin: 50% 50%; transform-origin: 50% 50%; border-radius: 50%; background-color: transparent; ' . esc_attr($rslcr_video_icon_animation_color) . ' opacity: 1; } #slcr_video_modals_' . $uid2 . '.video_box_01 .video_play_icon { display: block; border-radius: 300px; ' . esc_attr($rslcr_video_icon_border_color) . ' ' . esc_attr($rslcr_video_icon_bg_color) . ' padding: 30px; -webkit-transition: all ease .3s; transition: all ease .3s; } #slcr_video_modals_' . $uid2 . '.video_box_01 .video_play_button i { font-size: 30px; ' . esc_attr($rslcr_video_icon_color) . '  } #slcr_video_modals_padding_' . $uid2 . ' { ' . esc_attr($rvideo_button_padding) . '  }  #slcr_video_modals_btn_' . $uid2 . ' { ' . esc_attr($rvideo_button_padding) . '  } #slcr_video_play_inner' . $uid2 . ' { ' . esc_attr($rslcr_video_icon_color) . ' ' . esc_attr($rslcr_video_icon_bg_color) . ' ' . esc_attr($rslcr_video_icon_border_color) . ' ' . esc_attr($rvideo_button_padding) . ' } #slcr_video_play_text_text' . $uid2 . ' {  ' . esc_attr($rtitle_font_size) . ' ' . esc_attr($rtitle_font_color) . ' ' . esc_attr($rtitle_padding_top) . ' ' . esc_attr($rtitle_padding_left) . ' ' . esc_attr($r2title_text_transform) . ' ' . esc_attr($title_font_inline_style) . ' }';
        
            $output = "";
            $privacy_consent=""; 
            global $slcr_redux; 
            if($slcr_video_url_type=="youtube"){
                $get_result =apply_filters( 'slcr_cookies_verify_filter', 'youtube');
                if($get_result=="youtube"){
                    $privacy_consent="1"; 

                }
            }else {
                $get_result =apply_filters( 'slcr_cookies_verify_filter', 'vimeo');  
                if($get_result=="vimeo"){
                    $privacy_consent="2"; 

                }         
            }
            if(empty($img_url[0])){
                $img_url[0]=SLCR_THEME_IMAGE_URI . 'video-placeholder.png';
            }
            if($privacy_consent==""){
                if ($slcr_video_modal_type == "Default") {
                    $output.=' 
                    <div class="video_box_01 slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" id="slcr_video_modals_' . $uid2 . '" data-button-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-image-effect="' . esc_attr($rslcr_video_image_effect) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <a href="' . esc_url($slcr_video_url) . '" class="popup-' . esc_attr($slcr_video_url_type) . ' link_full"></a>
                        <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('image','sc-core').'" />
                        <div class="video_play_button" id="slcr_video_play_' . $uid2 . '">
                            <a href="' . esc_url($slcr_video_url) . '" class="video_play_icon popup-' . esc_attr($slcr_video_url_type) . '" id="slcr_video_modals_padding_' . $uid2 . '"><i class="arrow_triangle-right"></i></a> 
                        </div>
                    </div>';
                }
                else {
                    $output.='
                    <div class="video_modal_simple slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) .' '. esc_attr($el_class). '">
                        <a href="' . esc_url($slcr_video_url) . '" class="popup-' . esc_attr($slcr_video_url_type) . ' video_modal_btn" id="slcr_video_modals_btn_' . $uid2 . '" data-hover-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <span class="video_btn_inner" id="slcr_video_play_inner' . $uid2 . '"><i class="arrow_triangle-right"></i></span>
                        <span class="video_btn_text" id="slcr_video_play_text_text' . $uid2 . '">' . esc_html($title) . ' </span>
                        </a>
                    </div>';
                }
            }elseif($privacy_consent=="1"){
                if ($slcr_video_modal_type == "Default") {
                    $output.=' 
                    <div class="video_box_01 slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" id="slcr_video_modals_' . $uid2 . '" data-button-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-image-effect="' . esc_attr($rslcr_video_image_effect) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <a href="#privacy-popup-youtube" class="popup-modal link_full"></a>
                        <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('image','sc-core').'" />
                        <div class="video_play_button" id="slcr_video_play_' . $uid2 . '">
                            <a href="' . esc_url($slcr_video_url) . '" class="video_play_icon popup-modal" id="slcr_video_modals_padding_' . $uid2 . '"><i class="arrow_triangle-right"></i></a> 
                        </div>
                    </div>';
                }
                else {
                    $output.='
                    <div class="video_modal_simple slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) .' '. esc_attr($el_class). '">
                        <a href="#privacy-popup-youtube" class="popup-modal video_modal_btn" id="slcr_video_modals_btn_' . $uid2 . '" data-hover-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <span class="video_btn_inner" id="slcr_video_play_inner' . $uid2 . '"><i class="arrow_triangle-right"></i></span>
                        <span class="video_btn_text" id="slcr_video_play_text_text' . $uid2 . '">' . esc_html($title) . ' </span>
                        </a>
                    </div>';
                }
            }else {
                if ($slcr_video_modal_type == "Default") {
                    $output.=' 
                    <div class="video_box_01 slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" id="slcr_video_modals_' . $uid2 . '" data-button-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-image-effect="' . esc_attr($rslcr_video_image_effect) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <a href="#privacy-popup-vimeo" class="popup-modal link_full"></a>
                        <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('image','sc-core').'" />
                        <div class="video_play_button" id="slcr_video_play_' . $uid2 . '">
                            <a href="' . esc_url($slcr_video_url) . '" class="video_play_icon popup-modal" id="slcr_video_modals_padding_' . $uid2 . '"><i class="arrow_triangle-right"></i></a> 
                        </div>
                    </div>';
                }
                else {
                    $output.='
                    <div class="video_modal_simple slcr_cookies_verify_video_' . esc_attr($slcr_video_url_type) . ' ' . esc_attr($css_class) .' '. esc_attr($el_class). '">
                        <a href="#privacy-popup-vimeo" class="popup-modal video_modal_btn" id="slcr_video_modals_btn_' . $uid2 . '" data-hover-effect="' . esc_attr($slcr_video_icon_animation) . '" data-hover-shadow="' . esc_attr($rslcr_video_hover_shadow) . '" data-btn-animation="'.esc_attr($rslcr_video_button_animation).'">
                        <span class="video_btn_inner" id="slcr_video_play_inner' . $uid2 . '"><i class="arrow_triangle-right"></i></span>
                        <span class="video_btn_text" id="slcr_video_play_text_text' . $uid2 . '">' . esc_html($title) . ' </span>
                        </a>
                    </div>';
                }
            }
            $name="inline_slcr";
            $value=$slcr_video_modals_last;
            do_action( 'wp_enqueue_scripts',$value,$name);
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

        function slcr_video_modal_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_video_modal_css', plugins_url($css_path . 'content-price' . $ext . '.css', __FILE__));
            wp_register_script('slcr_video_modal_js', plugins_url($js_path . 'content-price' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }

    // Finally initialize code
    new Slcr_Video_Modal;
}