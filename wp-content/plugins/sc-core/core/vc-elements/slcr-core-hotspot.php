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
 * Element Description: VC Slcr Hotspot
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Hotspot')) {
    class Slcr_Hotspot extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_hotspot', array(
                $this,
                'slcr_Hotspot_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_Hotspot_scripts'
            ) , 1);
        }
        function slcr_Hotspot_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'title' => '',
                'desc' => '',
                'hotspot_top' => '',
                'hotspot_left' => '',
                'hotspot_post' => '',
                'add_icon' => '',
                'hotspot_point_text' => '',
                'i_type' => '',
                'hotspot_icon_text_color' => '',
                'i_icon_fontawesome' => '',
                'i_icon_openiconic' => '',
                'i_icon_typicons' => '',
                'i_icon_entypo' => '',
                'i_icon_linecons' => '',
                'i_icon_monosocial' => '',
                'i_icon_material' => '',
                'i_icon_flaticon' => '',
                'icon_font_size' => '', 
                'title_text_color' => '',
                'desc_text_color' => '',
                'hotspot_point_color' => '',
                'hotspot_box_bg_color' => '',
                'css' => '',
                'el_id' => '',
                'el_class' => '',
            ) , $atts));
            $output = "";
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            } 
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            // condition for   icon text size value
            if ($icon_font_size == "") {
                $ricon_font_size = "";
            }
            else {
                $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
                $ricon_font_size = ' font-size: ' . esc_attr($icon_font_size) . ' !important;';
            }
            $i_icon_fontawesome;
            if ('true' === $add_icon) {
                // vc_icon_element_fonts_enqueue( $i_type );
                $icon_wrapper = "";
                if (isset($ {
                    'i_icon_' . $i_type
                })) {
                    if ('pixelicons' === $i_type) {
                        $icon_wrapper = true;
                    }
                    $icon_class = $ {
                        'i_icon_' . $i_type
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
                switch ($i_type) {
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
                    $ricon_class = apply_filters( 'slcr_icon_class_return_filter', $ricon_class, $i_type, $i_icon_flaticon); 
                }
                $uid2 = uniqid();
                $slcr_hotspot_icon_font_size = '.slcr_hotspot_icon_font_size_' . $uid2 . ' { ' . $ricon_font_size . '}';
                $name="inline_slcr";
                $value=$slcr_hotspot_icon_font_size;
                do_action( 'wp_enqueue_scripts',$value,$name);
                if ($icon_wrapper) {

                    $icon_html = '<i class="counter-icon ' . esc_attr($ricon_class) . ' slcr_hotspot_icon_font_size_' . $uid2 . '"></i>';
                }
                else {
                    $icon_html = '<i class="counter-icon ' . esc_attr($ricon_class) . ' slcr_hotspot_icon_font_size_' . $uid2 . '"></i>';
                }
            }
            else {
                if ($hotspot_point_text == "") {
                    $icon_html = '<i class="icon_circle-slelected"></i>';
                }
                else {
                    $icon_html = $hotspot_point_text;
                }
            }
            // condition for hotspot_icon_text_color color value
            if ($hotspot_icon_text_color == "") {
                $rhotspot_icon_text_color = "";
            }
            else {
                $rhotspot_icon_text_color = 'color: '. $hotspot_icon_text_color .';';
            }
            // condition for hotspot_point_color color value
            if ($hotspot_point_color == "") {
                $rhotspot_point_color = "";
            }
            else {
                $rhotspot_point_color = 'background: '.$hotspot_point_color.';';
            }
            if ($hotspot_box_bg_color == "") {
                $rhotspot_box_bg_color = "";
            }
            else {
                $rhotspot_box_bg_color = ' background: '.$hotspot_box_bg_color.';';
            }
            if ($desc_text_color == "") {
                $rdesc_text_color = "";
            }
            else {
                $rdesc_text_color = ' color: '. $desc_text_color .';';
            }
            if ($title_text_color == "") {
                $rtitle_text_color = "";
            }
            else {
                $rtitle_text_color = ' color: '.$title_text_color.';';
            }
            $uid2 = uniqid();
            $slcr_hotspot_css_last = '.slcr_hotspot_' . $uid2 . ' .hotspot_point { background-color: ' . esc_attr($hotspot_point_color) . '; } .slcr_hotspot_' . $uid2 . ' .hotspot_point:before { border-color: ' . esc_attr($hotspot_point_color) . '; } .slcr_hotspot_' . $uid2 . '.hotspot_cont { top: ' . esc_attr($hotspot_top) . '; left: ' . esc_attr($hotspot_left) . '; } .slcr_hotspot_' . $uid2 . ' .hotspot_tooltip .hotspot-content .hotspot-heading-color h5{ ' . esc_attr($rtitle_text_color) . ' } .slcr_hotspot_' . $uid2 . ' .hotspot_tooltip .hotspot-content .hotspot-heading-color { ' . esc_attr($rdesc_text_color) . ' } .slcr_hotspot_' . $uid2 . ' .hotspot_tooltip .hotspot-content { ' . esc_attr($rhotspot_box_bg_color) . ' } .slcr_hotspot_' . $uid2 . ' .hotspot_point span { ' . esc_attr($rhotspot_icon_text_color) . ' }';
            $output.= '
            <!-- Hotspot Point -->
            <div class="hotspot_cont' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_hotspot_' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                <div class="hotspot_point">
                    <span>' . $icon_html . '</span>
                </div>
                <div class="hotspot_tooltip" data-tooltip-location="' . esc_attr($hotspot_post) . '">
                    <div class="hotspot-content">
                        <div class="hotspot-heading-color">
                            <h5 class="gap-0 font-600">' . esc_html( $title) . '</h5>
                            ' . esc_html( $desc) . '
                        </div>
                        <span class="close_hotspot">x</span>
                    </div>
                </div>
            </div>';
             
            $name="inline_slcr";
            $value=$slcr_hotspot_css_last;
            do_action( 'wp_enqueue_scripts',$value,$name);
            return $output;
        }
        function slcr_Hotspot_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_hotspot_css', plugins_url($css_path . 'content-price' . $ext . '.css', __FILE__));
            wp_register_script('slcr_hotspot_js', plugins_url($js_path . 'content-price' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }
    // Finally initialize code
    new Slcr_Hotspot;
}