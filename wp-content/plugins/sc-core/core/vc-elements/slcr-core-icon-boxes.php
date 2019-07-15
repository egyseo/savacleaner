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
 * Element Description: Slcr Icon
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Icon')) {
    class Slcr_Icon extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_icon', array(
                $this,
                'slcr_icon_callback'
            )); 
        }
        function slcr_icon_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'slcr_icon' => '',
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
                'slcr_icon_font_color' => '',
                'slcr_icon_bg_color' => '',
                'slcr_icon_border_color' => '',
                'slcr_hover_icon_font_color' => '',
                'slcr_hover_icon_bg_color' => '',
                'slcr_hover_icon_border_color' => '',
                'himg' => '',
                'slcr_icon_height_width' => '',
                'slcr_icon_image_width' => '',
                'slcr_icon_image_bradius' => '',
                'slcr_icon_element_link' => '',
                'add_icon_shadow' => '', 
                'slcr_background_color_type' => '', 
                'slcr_icon_font_color_gradient' => '', 
                'el_id' => '', 
                'el_class' => '',
                'css' => '',
                'slcr_img_link_template' => '',
            ) , $atts));
            $wrapper_attributes = array();
            if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            } 
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            $radd_icon_shadow="";
            if($add_icon_shadow =="true"){
                $radd_icon_shadow=" icon--shadow ";
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $img_url = wp_get_attachment_image_src($himg, "full");
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            }
            $countdata = '';
            // condition for   slcr_icon_height_width value
            if ($slcr_icon_height_width == "") {
                $rslcr_icon_height_width = " height: 60px; width: 60px; line-height: 60px; ";
            }
            else {
                $slcr_icon_height_width=apply_filters( 'slcr_value_parameter_filter', $slcr_icon_height_width);
                $rslcr_icon_height_width = ' height: ' . $slcr_icon_height_width . '; width: ' . $slcr_icon_height_width . '; line-height: ' . $slcr_icon_height_width . ';';
            }
            // condition for   slcr_icon_image_width value
            if ($slcr_icon_image_width == "") {
                $rslcr_icon_image_width = " height: auto !important; width: 60px !important; ";
            }
            else {
                $slcr_icon_image_width=apply_filters( 'slcr_value_parameter_filter', $slcr_icon_image_width);
                $rslcr_icon_image_width = " height: auto !important;  width: " . $slcr_icon_image_width . " !important;";
            }
            // condition for   slcr_icon_image_bradius value
            if ($slcr_icon_image_bradius == "") {
                $rslcr_icon_image_bradius = " border-radius: 0px; ";
            }
            else {
                $slcr_icon_image_bradius=apply_filters( 'slcr_value_parameter_filter', $slcr_icon_image_bradius);
                $rslcr_icon_image_bradius = " border-radius: " . $slcr_icon_image_bradius . ";";
            }
            // condition for   icon text size value
            if ($icon_font_size == "") {
                $ricon_font_size = " font-size: 30px;";
            }
            else {
                $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
                $ricon_font_size = " font-size: " . $icon_font_size . ";";
            } 
            // condition for   slcr_icon_font_color setting ****************************************
            if ($slcr_icon_font_color == "") {
                $rslcr_icon_font_color = "#3964f9";
            }
            else {
                $rslcr_icon_font_color =$slcr_icon_font_color . " !important";
            }
            if ($slcr_icon_bg_color == "") {
                $rslcr_icon_bg_color = "transparent";
            }
            else {
                $rslcr_icon_bg_color = $slcr_icon_bg_color . " !important";
            }
            if ($slcr_icon_border_color == "") {
                $rslcr_icon_border_color = "#eee";
            }
            else {
                $rslcr_icon_border_color = $slcr_icon_border_color . " !important";
            }
            if ($slcr_hover_icon_font_color == "") {
                $rslcr_hover_icon_font_color = "#fff";
            }
            else {
                $rslcr_hover_icon_font_color = $slcr_hover_icon_font_color . " !important";
            }
            if ($slcr_hover_icon_bg_color == "") {
                $rslcr_hover_icon_bg_color = "#3964f9";
            }
            else {
                $rslcr_hover_icon_bg_color = $slcr_hover_icon_bg_color . " !important";
            }
            if ($slcr_hover_icon_border_color == "") {
                $rslcr_hover_icon_border_color = "#3964f9";
            }
            else {
                $rslcr_hover_icon_border_color = $slcr_hover_icon_border_color . " !important";
            }
            if ($i_align == "") {
                $ri_align = "left";
            }
            else {
                $ri_align = $i_align ;
            } 
            $dicon_html = "";
            $uid2 = uniqid();
            $slcr_icon_last = ' #slcr_icon_last' . $uid2 . '.main__icon { text-align: center; color: ' . esc_attr($rslcr_icon_font_color) . '; border-radius: 50%; border: 1px solid ' . esc_attr($rslcr_icon_border_color) . '; background: ' . esc_attr($rslcr_icon_bg_color) . '; ' . esc_attr($rslcr_icon_height_width) . '' . esc_attr($ricon_font_size) . ' transition: all ease .3s; -webkit-transition: all ease .3s; } #slcr_icon_last' . $uid2 . '.main__icon:hover { background: ' . esc_attr($rslcr_hover_icon_bg_color) . '; border-color: ' . esc_attr($rslcr_hover_icon_border_color) . '; color: ' . esc_attr($rslcr_hover_icon_font_color) . '; }';
            $name="inline_slcr";
            $value=$slcr_icon_last;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $slcr_icon_element_link = ('||' === $slcr_icon_element_link) ? '' : $slcr_icon_element_link;
            $link = vc_build_link($slcr_icon_element_link);
            $use_link = false; 
            if (strlen($link['url']) > 0) {
                $use_link = true;
                $a_href = $link['url'];
                $a_title = $link['title'];
                $a_target = $link['target'];
                $a_rel = $link['rel'];
            }
            $attributes2 = "";
            if ('Default' === $slcr_icon) {
                // vc_icon_element_fonts_enqueue( $citype );
                $icon_wrapper = "";
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
                if(empty($ricon_class)) {
                    $ricon_class=apply_filters( 'slcr_icon_class_return_filter', $ricon_class, $citype, $icon_flaticon); 
                }
                $rslcr_icon_font_color_gradient="";
                if ($slcr_background_color_type == "gradient") { 
                    if($slcr_icon_font_color_gradient=="icon--gradient-2"){
                        $rslcr_icon_font_color_gradient = " ".$slcr_icon_font_color_gradient;
                    }else{
                        $rslcr_icon_font_color_gradient = " icon--gradient-1";
                    }
                }
                if ($icon_wrapper) {
                    $icon_html = '<i class="main__icon ' . esc_attr($ricon_class).''.$rslcr_icon_font_color_gradient.'" id="slcr_icon_last' . $uid2 . '"></i>';
                }
                else {
                    $icon_html = '<i class="main__icon ' . esc_attr($ricon_class).''.$rslcr_icon_font_color_gradient.'" id="slcr_icon_last' . $uid2 . '" ></i>';
                }
                if ($use_link) {
                    $attributes2 = 'href="' . esc_url(trim($a_href)) . '" '; 
                    if (!empty($a_target)) {
                        $attributes2.= 'target="' . esc_attr(trim($a_target)) . '"';
                    }
                    if (!empty($a_rel)) {
                        $attributes2.= 'rel="' . esc_html(trim($a_rel)) . '"';
                    }
                    $icon_html ='<a '.$attributes2.' >
                    ' . $icon_html . '
                    </a>'; 
                }
                else {
                    $icon_html = $icon_html;
                }
                $dicon_html = '
                <div class="icon__container'.esc_attr($radd_icon_shadow).'' . esc_attr($css_class) . '  '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' data-icon-align="' . esc_attr($ri_align) . '"  data-hover-target="icon">
                        ' . $icon_html . '
                </div>';
            }
            else {
                $icon_html="";
                if ($use_link) {
                    $attributes2 = 'href="' . esc_url(trim($a_href)) . '" '; 
                    if (!empty($a_target)) {
                        $attributes2.= 'target="' . esc_attr(trim($a_target)) . '"';
                    }
                    if (!empty($a_rel)) {
                        $attributes2.= 'rel="' . esc_attr(trim($a_rel)) . '"';
                    }
                    $uid2 = uniqid();
                    $slcr_icon_box_icon_image_size = '.slcr_icon_box_icon_image_size_' . $uid2 . ' { ' . esc_attr($rslcr_icon_image_width) . ' ' . esc_attr($rslcr_icon_image_bradius) . ' }';
                    $name="inline_slcr";
                    $value=$slcr_icon_box_icon_image_size;
                    do_action( 'wp_enqueue_scripts',$value,$name);
                    $icon_html ='<a '.$attributes2.' >
                    <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Image Icon','sc-core').'" class="image__icon slcr_icon_box_icon_image_size_' . $uid2 . '">
                    </a>'; 
                }
                else {
                    $uid2 = uniqid();
                    $slcr_icon_box_icon_image_size = '.slcr_icon_box_icon_image_size_' . $uid2 . ' { ' . esc_attr($rslcr_icon_image_width) . ' ' . esc_attr($rslcr_icon_image_bradius) . ' }';
                    $name="inline_slcr";
                    $value=$slcr_icon_box_icon_image_size;
                    do_action( 'wp_enqueue_scripts',$value,$name);
                    $icon_html = '<img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Image Icon','sc-core').'" class="image__icon slcr_icon_box_icon_image_size_' . $uid2 . '">';
                }
                $dicon_html = '
                <div class="icon__container'.esc_attr($radd_icon_shadow).'' . esc_attr($css_class) . '  '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' data-icon-align="' . esc_attr($ri_align) . '" data-hover-target="icon">
                    ' . $icon_html . '
                </div>';
            } 
            return $output = $dicon_html;
        }
    }
    // Finally initialize code
    new Slcr_Icon;
}