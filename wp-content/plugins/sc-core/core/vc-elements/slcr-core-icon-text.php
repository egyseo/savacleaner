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
 * Element Description: Slcr Icon Text
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
if (!class_exists('Slcr_Icon_Text')) {
    class Slcr_Icon_Text extends WPBakeryShortCode
    {
        function __construct()
        {
            add_shortcode('slcr_icon_text', array(
                $this,
                'slcr_icon_text_callback'
            )); 
        }
        function slcr_icon_text_callback($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'slcr_icon' => '',
                'add_icon' => '',
                'i_align' => '',
                'slcr_vertical_align' => '',
                'slcr_hover_target' => '',
                'add_responsive' => '',
                'citype' => '',
                'add_icon_shadow' => '',
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
                'content_font_size' => '',
                'content_text_transform' => '',
                'content_padding_top' => '',
                'content_padding_left' => '',
                'content_use_theme_fonts' => '',
                'content_google_font_select' => '',
                'content_font_color' => '',
                'slcr_background_color_type' => '', 
                'slcr_icon_font_color_gradient' => '', 
                'el_id' => '',
                'el_class' => '',
                'css' => '',
                'slcr_img_link_template' => '',
            ) , $atts)); 
            $content = apply_filters( 'slcr_force_balance_tags_filter', $content);
            $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
            $content = preg_replace( '~\s?<p>(\s| )+</p>\s?~', '', $content );
            $content = $content; 
            $wrapper_attributes = array();
            if (!empty($el_id)) {
                $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
            }
            if (!empty($el_class)) {
            $el_class =  $el_class;
            } 
            $radd_icon_shadow="";
            if(isset($add_icon_shadow) && $add_icon_shadow == "true"){
                $radd_icon_shadow=" icon--shadow";
            }
            // get custom css value
            $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
            $img_url = wp_get_attachment_image_src($himg, "full");
            if (!empty($slcr_img_link_template) && empty($img_url[0])) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            }
             // **********************************google font for a client name  *****************************************
                if ($content_use_theme_fonts == "Yes") {
                    // Build the data array
                    $content_font_data = $this->getFontsData($content_google_font_select);
                    // Build the inline style
                    $content_font_inline_style = $this->googleFontsStyles($content_font_data);
                    // Enqueue the right font
                    $this->enqueueGoogleFonts($content_font_data);
                }
                else {
                    $content_font_inline_style = "";
                }
                // get   client name  text transform value
                if ($content_text_transform == "Default") {
                    $rcontent_text_transform = "";
                }
                else {
                    $rcontent_text_transform = $content_text_transform;
                }
                // condition for  content text size value
                if ($content_font_size == "") {
                    $rcontent_font_size = "";
                }
                else {
                    $content_font_size=apply_filters( 'slcr_value_parameter_filter', $content_font_size);
                    $rcontent_font_size = " font-size: " . $content_font_size . ";";
                }
                // condition for   content text color value
                if ($content_font_color == "") {
                    $rcontent_font_color = "";
                }
                else {
                    $rcontent_font_color = " color: " . $content_font_color . " !important;";
                }
                // condition for   content text padding top  bottom value
                if ($content_padding_top == "") {
                    $rcontent_padding_top = "";
                }
                else {
                    $content_padding_top=apply_filters( 'slcr_value_parameter_filter', $content_padding_top);
                    $rcontent_padding_top = " padding-top: " . $content_padding_top . "; padding-bottom: " . $content_padding_top . ";";
                }
                // condition for   content text padding left right value
                if ($content_padding_left == "") {
                    $rcontent_padding_left = "";
                }
                else {
                    $content_padding_left=apply_filters( 'slcr_value_parameter_filter', $content_padding_left);
                    $rcontent_padding_left = " padding-left: " . $content_padding_left . "; padding-right: " . $content_padding_left . ";";
                }
                // condition for   content text transform  value
                if ($rcontent_text_transform == "") {
                    $r2content_text_transform = "";
                }
                else {
                    $r2content_text_transform = " text-transform: " . $rcontent_text_transform . ";";
                }

            $countdata = '';
            if ($add_responsive == 'true') {
                $radd_responsive = "true";
            }
            else {
                $radd_responsive = "false";
            }
            if ($slcr_vertical_align == 'bottom') {
                $rslcr_vertical_align = "bottom";
            }
            elseif ($slcr_vertical_align == 'center') {
                $rslcr_vertical_align = "center";
            }
            else {
                $rslcr_vertical_align = "top";
            }
            if ($slcr_hover_target == 'icon') {
                $rslcr_hover_target = "icon";
            }
            else {
                $rslcr_hover_target = "box";
            }
            // condition for   slcr_icon_height_width value
            if ($slcr_icon_height_width == "") {
                $rslcr_icon_height_width = " height: 60px; width: 60px; line-height: 60px; ";
            }
            else {
                $slcr_icon_height_width=apply_filters( 'slcr_value_parameter_filter', $slcr_icon_height_width);
                $rslcr_icon_height_width = " height: " . $slcr_icon_height_width . "; width: " . $slcr_icon_height_width . "; line-height: " . $slcr_icon_height_width . ";";
            }
            // condition for   slcr_icon_image_width value
            if ($slcr_icon_image_width == "") {
                $rslcr_icon_image_width = " height: auto; width: 60px; ";
            }
            else {
                $slcr_icon_image_width=apply_filters( 'slcr_value_parameter_filter', $slcr_icon_image_width);
                $rslcr_icon_image_width = " height: auto;  width: " . $slcr_icon_image_width . ";";
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
                $ricon_font_size = "font-size: 20px;";
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
                $rslcr_icon_font_color = $slcr_icon_font_color . " !important";
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
            $slcr_icon_text_last = '#slcr_icon_text_last' . $uid2 . '.main__icon { display: block; text-align: center; color: ' . esc_attr($rslcr_icon_font_color) . '; border-radius: 50%; border: 1px solid ' . esc_attr($rslcr_icon_border_color) . '; background: ' . esc_attr($rslcr_icon_bg_color) . '; ' . esc_attr($rslcr_icon_height_width) . '' . esc_attr($ricon_font_size) . ' transition: all ease .3s; -webkit-transition: all ease .3s; } [data-hover-target="box"]:hover #slcr_icon_text_last' . $uid2 . '.main__icon, [data-hover-target="icon"] #slcr_icon_text_last' . $uid2 . '.main__icon:hover { background: ' . esc_attr($rslcr_hover_icon_bg_color) . '; border-color: ' . esc_attr($rslcr_hover_icon_border_color) . '; color: ' . esc_attr($rslcr_hover_icon_font_color) . '; } #slcr_icon_text_content' . $uid2 . '{ ' . esc_attr($rcontent_font_size) . '' . esc_attr($rcontent_font_color) . '' . esc_attr($rcontent_padding_top) . '' . esc_attr($rcontent_padding_left) . '' . esc_attr($r2content_text_transform) . '' . esc_attr($content_font_inline_style) . ' } #slcr_icon_text_img' . $uid2 . '{ ' . esc_attr($rslcr_icon_image_width) . ' ' . esc_attr($rslcr_icon_image_bradius) . ' }';
            if ('true' === $add_icon) {
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
                    $icon_html = '<i class="main__icon ' . esc_attr($ricon_class) .$rslcr_icon_font_color_gradient.'" id="slcr_icon_text_last' . $uid2 . '"></i>';
                }
                else {
                    $icon_html = '<i class="main__icon ' . esc_attr($ricon_class) .$rslcr_icon_font_color_gradient.'" id="slcr_icon_text_last' . $uid2 . '" ></i>';
                }
                $allowed_html = slcr_helper()->slcr_allowed_html();
                $dicon_html = '
                <div class="icons__text ' . esc_attr($css_class) . '  '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '  data-icon-align="' . esc_attr($ri_align) . '" data-reset-responsive="' . esc_attr($radd_responsive) . '" data-hover-target="' . esc_attr($rslcr_hover_target) . '" data-vertical-align="' . esc_attr($rslcr_vertical_align) . '">
                    <div class="icons_wrap">
                        <div class="icon__container'.esc_attr($radd_icon_shadow).'">
                            ' . $icon_html . '
                        </div>
                    </div>
                    <div class="text__content" id="slcr_icon_text_content' . $uid2 . '">
                        ' . wp_kses($content, $allowed_html) . '
                    </div>
                </div>';
            }
            else {
                $allowed_html = slcr_helper()->slcr_allowed_html();
                $dicon_html = '
                <div class="icons__text ' . esc_attr($css_class) . '  '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' data-icon-align="' . esc_attr($ri_align) . '"  data-hover-target="' . esc_attr($rslcr_hover_target) . '" data-vertical-align="' . esc_attr($rslcr_vertical_align) . '" data-reset-responsive="' . esc_attr($radd_responsive) . '">
                    <div class="icons_wrap">
                        <div class="icon__container'.esc_attr($radd_icon_shadow).'">
                            <img src="' . esc_attr($img_url[0]) . '" alt="'. esc_attr__('Image Icon','sc-core').'" class="image__icon" id="slcr_icon_text_img' . $uid2 . '">
                        </div>
                    </div>
                    <div class="text__content" id="slcr_icon_text_content' . $uid2 . '">
                        ' . wp_kses($content, $allowed_html) . '
                    </div>
                </div>';
            } 
            $name="inline_slcr";
            $value=$slcr_icon_text_last;
            do_action( 'wp_enqueue_scripts',$value,$name);
            return $output = $dicon_html;
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
    }
    // Finally initialize code
    new Slcr_Icon_Text;
}