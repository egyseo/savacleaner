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
 * Element Description: VC Slcr Box
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Box')) {
    class Slcr_Box extends WPBakeryShortCode
    {
        function __construct()
        { 
            
            add_shortcode('slcr_box', array(
                $this,
                'slcr_box_callback'
            )); 

            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_box_scripts'
            ) , 11);
        }

        function slcr_box_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'box_type' => '',
                'backgrounds_type' => '',
                'backgrounds_style' => '',
                'box_bg_color' => '',
                'bgimg' => '',
                'add_overlay' => '',
                'bg_o_e' => '',
                'overlay_bg_color' => '',
                'back_backgrounds_type' => '',
                'back_backgrounds_style' => '',
                'back_box_bg_color' => '',
                'back_bgimg' => '',
                'back_add_overlay' => '',
                'back_bg_o_e' => '',
                'back_overlay_bg_color' => '',
                'text_float' => '',
                'box_shadow' => '',
                'box_shadow_style' => '',
                'tilt_effects_box' => '',
                'glare_effect' => '',
                'box_rounded' => '',
                'hover_3d' => '',
                'back_flip_type_hight'=>'',
                'hover_3d_transform' => '',
                'link' => '',
                'back_html' => '',
                'css' => '',
                'z_index' => '',
                'el_id' => '',
                'el_class' => '',
                'css_animation' => '',
                'slcr_img_link_template' => '',
                'slcr_img_link_template2' => '',
                'box_background_gradient_color' => '',
                'back_box_background_gradient_color' => '',
                /*'img_overlay_hover_effect'    => '',*/
            ) , $atts));
             
            $css_animation = $this->getCSSAnimation($css_animation); 
            $img_url = wp_get_attachment_image_src($bgimg, "full");
            $img_url2 = wp_get_attachment_image_src($back_bgimg, "full");
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            }
            if (!empty($slcr_img_link_template2) && empty($img_url2[0])) {
                if (filter_var($slcr_img_link_template2, FILTER_VALIDATE_URL)) { 
                    $img_url2[0] = $slcr_img_link_template2; 
                } 
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $uid244 = uniqid();
            $uid2443 = uniqid();
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $rimg_url = "";
            $back_rimg_url = "";
            $crhover_3d = "";
            // for  hover 3d    effects
            if ($hover_3d == "true") {
                $rhover_3d = " tilt-3d";
                if ($hover_3d_transform == "") { 
                    $crhover_3d = " data-sense ='50px'";
                }
                else {
                    $hover_3d_transform=apply_filters( 'slcr_value_parameter_filter', $hover_3d_transform);
                    $crhover_3d = " data-sense ='" . esc_attr($hover_3d_transform) . "'";
                }
            }
            else {
                $rhover_3d = "";
                $rhover_3din = "";
            }
            // for  box bg color
            if ($box_bg_color == "") {
                $rbox_bg_color = "";
            }
            else {
                $rbox_bg_color = "background: " . esc_attr($box_bg_color) . " !important;";
            }
            // for  box bg color
            if ($back_box_bg_color == "") {
                $back_rbox_bg_color = "";
            }
            else {
                $back_rbox_bg_color = "background: " . esc_attr($back_box_bg_color) . " !important;";
            }
            // for  box tilt effects
            if ($tilt_effects_box == "true") {
                $rtilt_effects_box = " tilt-effect";
            }
            else {
                $rtilt_effects_box = "";
            }
            // for  box glare effects
            if ($glare_effect == "true") {
                $rtilt_effects_box = " tilt-effect-glare";
            }
            // for  box rounded
            if ($box_rounded == "true") {
                $rbox_rounded = " box-rounded";
            }
            else {
                $rbox_rounded = "";
            }
            // for box shadow
            if ($box_shadow == "large_shadow") {
                $rbox_shadow = " box-3";
            }
            elseif ($box_shadow == "small_shadow") {
                $rbox_shadow = " box-2";
            }
            else {
                $rbox_shadow = " box-1";
            }
            // for box shadow style
            if ($box_shadow_style == "Hover_shadow") {
                $rbox_shadow_style = " shadow translate";
            }
            else {
                $rbox_shadow_style = "";
            }
            if ($add_overlay == "true") {
                $rcOverlay_transparency = " data-bg-overlay='" . esc_attr($bg_o_e) . "'  data-bg-color-" . $uid244 . "='" . esc_attr($bg_o_e) . "' ";
            }
            else {
                $rcOverlay_transparency = "";
            }
            if ($back_add_overlay == "true") {
                $back_rcOverlay_transparency = " data-bg-overlay='" . esc_attr($back_bg_o_e) . "'  data-bg-color-" . $uid2443 . "='" . esc_attr($back_bg_o_e) . "'";
            }
            else {
                $back_rcOverlay_transparency = "";
            }
            // get backgrounds type && backgrounds style
            if ($backgrounds_type == "background_Image") {
                if ($backgrounds_style == "background_solid") {
                    $rbackgrounds_style = " bg-image-default content-dark";
                }
                elseif ($backgrounds_style == "background_light") {
                    $rbackgrounds_style = " bg-image-light content-light";
                }
                else {
                    $rbackgrounds_style = " bg-image-dark content-dark";
                }
                $rimg_url = " background-image: url(" . esc_url($img_url[0]) . ");";
            }
            elseif($backgrounds_type == "background_gradient"){
                $rbox_background_gradient_color="";
                if ($box_background_gradient_color == "gradient_1"){
                    $rbox_background_gradient_color = ' bg--gradient-1';
                }elseif ($box_background_gradient_color == "gradient_2") {
                    $rbox_background_gradient_color = ' bg--gradient-2';
                }
                if ($backgrounds_style == "background_solid") {
                    $rbackgrounds_style = " bg-default".$rbox_background_gradient_color;
                }
                elseif ($backgrounds_style == "background_light") {
                    $rbackgrounds_style = " content-light".$rbox_background_gradient_color;
                }
                else {
                    $rbackgrounds_style = " content-dark".$rbox_background_gradient_color;
                }
            }else{
                if ($backgrounds_style == "background_solid") {
                    $rbackgrounds_style = " bg-default";
                }
                elseif ($backgrounds_style == "background_light") {
                    $rbackgrounds_style = " content-light";
                }
                else {
                    $rbackgrounds_style = " content-dark";
                }
            }
            // get back backgrounds type && backgrounds style
            if ($back_backgrounds_type == "background_Image") {
                if ($back_backgrounds_style == "background_solid") {
                    $rback_backgrounds_style = " content-dark";
                }
                elseif ($back_backgrounds_style == "background_light") {
                    $rback_backgrounds_style = " content-light";
                }
                else {
                    $rback_backgrounds_style = " content-dark";
                }
                $back_rimg_url = " background-image: url(" . esc_url($img_url2[0]) . "); background-size: cover;";
            }
            elseif($back_backgrounds_type == "background_gradient") {
                $rback_box_background_gradient_color="";
                if ($back_box_background_gradient_color == "gradient_1"){
                    $rback_box_background_gradient_color = ' bg--gradient-1';
                }elseif ($back_box_background_gradient_color == "gradient_2") {
                    $rback_box_background_gradient_color = ' bg--gradient-2';
                }
                if ($back_backgrounds_style == "background_solid") {
                    $rback_backgrounds_style = " content-dark".$rback_box_background_gradient_color;
                }
                elseif ($back_backgrounds_style == "background_light") {
                    $rback_backgrounds_style = " content-light".$rback_box_background_gradient_color;
                }
                else {
                    $rback_backgrounds_style = " content-dark".$rback_box_background_gradient_color;
                }
            } 
            else {
                if ($back_backgrounds_style == "background_solid") {
                    $rback_backgrounds_style = " content-dark";
                }
                elseif ($back_backgrounds_style == "background_light") {
                    $rback_backgrounds_style = " content-light";
                }
                else {
                    $rback_backgrounds_style = " content-dark";
                }
            } 
            $url = "";
            $rurl = "";
            $target = "";
            /*  link    */
            if (!empty($link)) {
                $href = vc_build_link($link);
                $rurl = $href["url"];
                $url = 'href="'.$href["url"].'"';
                $link_title = $href["title"];
                if(!empty($href["target"])){
                    $target = 'target="'.trim($href["target"]).'"';
                }
            }
            // condition for   title text color value
            if ($overlay_bg_color == "") {
            }
            else {
                $slcr_row_c = "[data-bg-color-" . $uid244 . "]:before { content: ''; position: absolute; background: " . $overlay_bg_color . "; height: 100%; width: 100%; top: 0; left: 0; z-index: 0; }"; 
                $name="inline_slcr";
                $value=$slcr_row_c;
                do_action( 'wp_enqueue_scripts',$value,$name);
            }
            if ($overlay_bg_color == "") {
            }
            else {
                $slcr_row_c = "[data-bg-color-" . $uid2443 . "]:before { content: ''; position: absolute; background-color: " . $back_overlay_bg_color . "; height: 100%; width: 100%; top: 0; left: 0; z-index: 0; }";
                $name="inline_slcr";
                $value=$slcr_row_c;
                do_action( 'wp_enqueue_scripts',$value,$name);
            }
            
            if ($box_type == "flip_box") {
                $rback_html = strip_tags($back_html);
                $rback_html = apply_filters( 'slcr_decode_content_tags_filter', $rback_html);
                $rback_html = rawurldecode($rback_html); 
                $uid2 = uniqid();
                $slcr_box_image_css = '#slcr_box_image_css_' . $uid2 . '{ ' . $rimg_url . '' . $rbox_bg_color . ' }';
                $slcr_box_image_css_back = '#slcr_box_image_css_back_' . $uid2 . '{ ' . $back_rimg_url . '' . $back_rbox_bg_color . ' }';
                $name="inline_slcr";
                $value=$slcr_box_image_css;
                do_action( 'wp_enqueue_scripts',$value,$name); 
                do_action( 'wp_enqueue_scripts',$slcr_box_image_css_back,$name); 
                // for  box bg color
                if ($back_flip_type_hight == "") {
                    $rback_flip_type_hight = "350";
                }
                else {
                    $rback_flip_type_hight =  $back_flip_type_hight;
                }
                $output = '
                <!-- FLIP BOX STARTS -->
                <div class="flip-box ' . esc_attr($rbox_shadow_style) . esc_attr($rbox_rounded) . esc_attr($rhover_3d) .' '. esc_attr($css_animation) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '  data-box-height="'.esc_attr($rback_flip_type_hight).'">
                    <!-- BOX FRONT -->
                    <div class="front'. esc_attr($rbackgrounds_style) . ' flip-cont" id="slcr_box_image_css_' . $uid2 .'"' . $rcOverlay_transparency .'>
                    <div class="inner text-' . esc_attr($text_float) . '' . esc_attr($rhover_3d) . '">';
                        $output.= do_shortcode($content);
                        $output.= '
                    </div>
                </div>
                <!-- BOX BACK -->
                <div class="back' . esc_attr($rback_backgrounds_style) . ' flip-cont" id="slcr_box_image_css_back_' . $uid2 .'"' . $back_rcOverlay_transparency . '>
                    <div class="inner text-' . esc_attr($text_float) . '' . esc_attr($rhover_3d) . '">';
                        $allowed_html = slcr_helper()->slcr_allowed_html();
                        $output.= wp_kses($rback_html, $allowed_html);
                        $output.= '</div>
                    </div>
                </div>';
            }
            else {
                $rz_index="";
            if(!empty($z_index)){  
                 $rz_index='z-index:'.$z_index.';'; 
                }
                $uid2 = uniqid();
                $slcr_box_image_css = '.slcr_box_image_css_' . $uid2 . '{ ' . $rimg_url . '' . $rbox_bg_color . ' '.esc_attr($rz_index).' }';
                $name="inline_slcr";
                $value=$slcr_box_image_css;
                do_action( 'wp_enqueue_scripts',$value,$name); 
                if (!empty($rurl)) {
                    $output = ' 
                    <a '.$url.' '.$target.' class="boxes' . esc_attr($rtilt_effects_box) . esc_attr($rbox_shadow_style) . esc_attr($rbox_shadow) . esc_attr($rbox_rounded) . esc_attr($rbackgrounds_style) . esc_attr($rhover_3d) .' '. esc_attr($css_animation) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_box_image_css_' . $uid2 .'" ' . implode(' ', $wrapper_attributes) . $rcOverlay_transparency . '>
                        <div class="inner text-' . esc_attr($text_float) . '' . esc_attr($rhover_3d) . '"' . $crhover_3d . '>';
                            $output.= do_shortcode($content);
                        $output.= '</div>
                    </a> ';
                }else {
                    $output = ' 
                    <div class="boxes' . esc_attr($rtilt_effects_box) . esc_attr($rbox_shadow_style) . esc_attr($rbox_shadow) . esc_attr($rbox_rounded) . esc_attr($rbackgrounds_style) . esc_attr($rhover_3d) .' '. esc_attr($css_animation) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class).' slcr_box_image_css_' . $uid2 .'" ' . implode(' ', $wrapper_attributes) . $rcOverlay_transparency . '>
                        <div class="inner text-' . esc_attr($text_float) . '' . esc_attr($rhover_3d) . '"' . $crhover_3d . '>';
                            $output.= do_shortcode($content);
                        $output.= '</div>
                    </div> ';
                }
                
            }
            return $output;
        }
        function slcr_box_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_box_css', plugins_url($css_path . 'content-box' . $ext . '.css', __FILE__));
            wp_register_script('slcr_box_js', plugins_url($js_path . 'content-box' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Box; 
    add_action( 'vc_before_init', array( 'Slcr_Box', 'slcr_box_init'));

    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Box extends WPBakeryShortCodesContainer
        {
        }
    }
}