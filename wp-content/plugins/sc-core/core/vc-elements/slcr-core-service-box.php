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
 * Element Description: Slcr Service Box
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Service_Box')) {
    class Slcr_Service_Box extends WPBakeryShortCode
    {
        /**
         * Constructor.
         *
         * @access public 
         */
        public function __construct()
        {
            add_shortcode('slcr_service_box', array(
                $this,
                'slcr_service_box_callback'
            )); 
        }
        function slcr_service_box_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'service_link' => '', 
                'image' => '', 
                'title' => '',  
                'price' => '',  
                'description' => '',  
                'el_id' => '',
                'el_class' => '',
                'css' => '',
            ) , $atts));
            $wrapper_attributes = array();
            // parse link
            $service_link = ('||' === $service_link) ? '' : $service_link;
            $link = vc_build_link($service_link);
            $use_link = false; 
            $a_href = "";
            $a_title = "";
            $a_target = "";
            $a_rel = "";
            if (strlen($link['url']) > 0) {
                $use_link = true;
                $a_href = $link['url'];
                $a_title = $link['title'];
                $a_target = $link['target'];
                $a_rel = $link['rel'];
            }
            $attributes2 = "";
            if ($use_link) {
                $attributes2 = 'href="' . esc_url(trim($a_href)) . '" ';
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

            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts); 
            $img_url = wp_get_attachment_image_src($image, "large");
            $output = "";
            $output.= '
                <a '.$attributes2.' class="service__box ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_custom_alert_css_" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="service__image lazy" data-bg="url('.esc_url($img_url[0]).')"></div>
                     <div class="service__info">
                        <h5>' . esc_html( $title ) . '</h5>
                        <p>' . esc_html( $description ) . ' <strong>' . esc_html( $price ) . '</strong></p>
                        <span class="service__arrow">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="408px" height="408px" viewBox="0 0 408 408" style="enable-background:new 0 0 408 408;" xml:space="preserve">
                                <polygon points="204,0 168.3,35.7 311.1,178.5 0,178.5 0,229.5 311.1,229.5 168.3,372.3 204,408 408,204"/>
                            </svg>
                        </span>
                     </div>
                </a>';

            return $output;
        }
    }
    // Finally initialize code
    new Slcr_Service_Box;
}