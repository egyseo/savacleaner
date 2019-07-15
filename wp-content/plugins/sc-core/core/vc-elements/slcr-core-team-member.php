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
 * Element Description: Slcr Team
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Team')) {
    class Slcr_Team extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_team', array(
                $this,
                'slcr_team_callback'
            )); 
            add_action('wp_enqueue_scripts', array(
                $this,
                'slcr_team_scripts'
            ) , 11);
        }

        function slcr_team_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'team_members_type' => '',
                'el_id' => '',
                'el_class' => '',
                'css' => '',
            ) , $atts));
            $output = "";

            // get custom css value

            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            if (!empty($el_id)) {
                $rel_id = 'id="' . esc_attr($el_id) . '"';
            }
            else {
                $rel_id = "";
            }

            if ('' !== $el_class) {
                $rel_class = ' ' . str_replace('.', '', $el_class);
            }
            else {
                $rel_class = ' ';
            }

            switch ($team_members_type) {
            case 'Team_Members_Type_2':
                $output.= '
                <!-- TEAM 02 LOOP -->
                <div class="vc_col-sm-12 team__loop-02' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row"> ';
                        $output.= do_shortcode($content);
                        $output.= ' 
                    </div>
                </div> ';
                break;

            case 'Team_Members_Type_3':
                $output.= ' 
                <!-- TEAM 03 LOOP -->
                <div class="vc_col-sm-12 team__loop-03' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row"> ';
                        $output.= do_shortcode($content);
                        $output.= ' 
                    </div>
                </div> ';
                break;

            case 'Team_Members_Type_4':
                $output.= ' 
                <!-- TEAM 04 LOOP -->
                <div class="vc_col-sm-12 team__loop-04' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row">
                        <div class="owl owl-carousel team_04">';
                            $output.= do_shortcode($content);
                            $output.= ' 
                        </div>
                    </div>
                </div> ';
                break;

            case 'Team_Members_Type_5':
                $output.= '
                <!-- TEAM 05 LOOP -->
                <div class="vc_col-sm-12 team__loop-05' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row"> ';
                        $output.= do_shortcode($content);
                        $output.= ' 
                    </div>
                </div> ';
                break;

            case 'Team_Members_Type_6':
                $output.= '
                <!-- TEAM 06 LOOP -->
                <div class="vc_col-sm-12 team__loop-06' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row"> ';
                        $output.= do_shortcode($content);
                        $output.= ' 
                    </div>
                </div> ';
                break;

            case 'Team_Members_Type_7':
                $output.= ' 
                <!-- TEAM 07 LOOP -->
                <div class="vc_col-sm-12' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row">
                        <div class="owl owl-carousel team_07">
                            <!-- TEAM 07 --> ';
                            $output.= do_shortcode($content);
                            $output.= ' 
                        </div>
                    </div>
                </div> ';
                break;

            default:
                $output.= '
                <!-- TEAM 01 LOOP -->
                <div class="vc_col-sm-12 team__loop-01' . esc_attr($rel_class) . '' . esc_attr($css_class) . '"' . $rel_id . '>
                    <div class="row">';
                        $output.= do_shortcode($content);
                        $output.= ' 
                    </div>
                </div>';
                break;
            }

            return $output;
        }

        function slcr_team_scripts()
        {
            $js_path = '../assets/min-js/';
            $css_path = '../assets/min-css/';
            $ext = '.min';
            wp_register_style('slcr_team_css', plugins_url($css_path . 'content-team_m' . $ext . '.css', __FILE__));
            wp_register_script('slcr_team_js', plugins_url($js_path . 'content-team_m' . $ext . '.js', __FILE__) , array(
                'jquery'
            ) , 3.3, true);
        }
    }

    // Finally initialize code
    new Slcr_Team;
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Slcr_Team extends WPBakeryShortCodesContainer
        {
        }
    } 
}