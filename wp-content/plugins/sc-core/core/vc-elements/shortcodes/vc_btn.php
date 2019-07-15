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
 * @var $style
 * @var $shape
 * @var $color
 * @var $custom_background
 * @var $custom_text
 * @var $size
 * @var $align
 * @var $link
 * @var $title
 * @var $button_block
 * @var $el_id
 * @var $el_class
 * @var $outline_custom_color
 * @var $outline_custom_hover_background
 * @var $outline_custom_hover_text
 * @var $add_icon
 * @var $i_align
 * @var $i_type
 * @var $i_icon_fontawesome
 * @var $i_icon_openiconic
 * @var $i_icon_typicons
 * @var $i_icon_entypo
 * @var $i_icon_linecons
 * @var $i_icon_pixelicons
 * @var $icon_flaticon
 * @var $css_animation
 * @var $css
 * @var $gradient_color_1
 * @var $gradient_color_2
 * @var $gradient_custom_color_1 ;
 * @var $gradient_custom_color_2 ;
 * @var $gradient_text_color ;
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Btn
 */
global $slcr_btn_css_last;
$style = $shape = $color = $size = $custom_background = $custom_text = $align = $link = $title = $button_block = $el_class = $outline_custom_color = $outline_custom_hover_background = $outline_custom_hover_text = $add_icon = $i_align = $i_type = $i_icon_entypo = $i_icon_fontawesome = $i_icon_linecons = $i_icon_pixelicons = $icon_flaticon = $i_icon_typicons = $css = $css_animation = '';
$gradient_color_1 = $gradient_color_2 = $gradient_custom_color_1 = $gradient_custom_color_2 = $gradient_text_color = '';
$custom_onclick = $custom_onclick_code = '';
$a_href = $a_title = $a_target = $a_rel = '';
$styles = array();
$icon_wrapper = false;
$icon_html = false;
$attributes = array();
$colors = array(
    'blue' => '#5472d2',
    'turquoise' => '#00c1cf',
    'pink' => '#fe6c61',
    'violet' => '#8d6dc4',
    'peacoc' => '#4cadc9',
    'chino' => '#cec2ab',
    'mulled-wine' => '#50485b',
    'vista-blue' => '#75d69c',
    'orange' => '#f7be68',
    'sky' => '#5aa1e3',
    'green' => '#6dab3c',
    'juicy-pink' => '#f4524d',
    'sandy-brown' => '#f79468',
    'purple' => '#b97ebb',
    'black' => '#2a2a2a',
    'grey' => '#ebebeb',
    'white' => '#ffffff',
);
$atts = vc_map_get_attributes($this->getShortcode() , $atts);
extract($atts);
// parse link
$link = ('||' === $link) ? '' : $link;
$link = vc_build_link($link);
$use_link = false;
if (strlen($link['url']) > 0) {
    $use_link = true;
    $a_href = $link['url'];
    $a_title = $link['title'];
    $a_target = $link['target'];
    $a_rel = $link['rel'];
}
$wrapper_classes = array(
    'vc_btn3-container',
    $this->getExtraClass($el_class) ,
    $this->getCSSAnimation($css_animation) ,
    'vc_btn3-' . $align,
);
$button_classes = array(
    'vc_general',
    'vc_btn3',
    'vc_btn3-size-' . $size,
    'vc_btn3-shape-' . $shape,
    'vc_btn3-style-' . $style,
);
$button_html = $title;
if ('' === trim($title)) {
    $button_classes[] = 'vc_btn3-o-empty';
    $button_html = '<span class="vc_btn3-placeholder">&nbsp;</span>';
}
if ('true' === $button_block && 'inline' !== $align) {
    $button_classes[] = 'vc_btn3-block';
}
if ('true' === $add_icon) {
    $button_classes[] = 'vc_btn3-icon-' . $i_align;
    vc_icon_element_fonts_enqueue($i_type);
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
        $icon_class = 'fa fa-adjust';
    }
    if ($icon_wrapper) {
        $icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr($icon_class) . '"></span></i>';
    }
    else {
        $icon_html = '<i class="vc_btn3-icon ' . esc_attr($icon_class) . '"></i>';
    }
    if ('left' === $i_align) {
        $button_html = $icon_html . ' ' . $button_html;
    }
    else {
        $button_html.= ' ' . $icon_html;
    }
}
if ('custom' === $style) {
    if ($custom_background) {
        $styles[] = vc_get_css_color('background-color', $custom_background);
    }
    if ($custom_text) {
        $styles[] = vc_get_css_color('color', $custom_text);
    }
    if (!$custom_background && !$custom_text) {
        $button_classes[] = 'vc_btn3-color-grey';
    }
}
elseif ('outline-custom' === $style) {
    if ($outline_custom_color) {
        $styles[] = vc_get_css_color('border-color', $outline_custom_color);
        $styles[] = vc_get_css_color('color', $outline_custom_color);
        $attributes[] = 'onmouseleave="this.style.borderColor=\'' . $outline_custom_color . '\'; this.style.backgroundColor=\'transparent\'; this.style.color=\'' . $outline_custom_color . '\'"';
    }
    else {
        $attributes[] = 'onmouseleave="this.style.borderColor=\'\'; this.style.backgroundColor=\'transparent\'; this.style.color=\'\'"';
    }
    $onmouseenter = array();
    if ($outline_custom_hover_background) {
        $onmouseenter[] = 'this.style.borderColor=\'' . $outline_custom_hover_background . '\';';
        $onmouseenter[] = 'this.style.backgroundColor=\'' . $outline_custom_hover_background . '\';';
    }
    if ($outline_custom_hover_text) {
        $onmouseenter[] = 'this.style.color=\'' . $outline_custom_hover_text . '\';';
    }
    if ($onmouseenter) {
        $attributes[] = 'onmouseenter="' . implode(' ', $onmouseenter) . '"';
    }
    if (!$outline_custom_color && !$outline_custom_hover_background && !$outline_custom_hover_text) {
        $button_classes[] = 'vc_btn3-color-inverse';
        foreach($button_classes as $k => $v) {
            if ('vc_btn3-style-outline-custom' === $v) {
                unset($button_classes[$k]);
                break;
            }
        }
        $button_classes[] = 'vc_btn3-style-outline';
    }
}
elseif ('gradient' === $style || 'gradient-custom' === $style) {
    $gradient_color_1 = $colors[$gradient_color_1];
    $gradient_color_2 = $colors[$gradient_color_2];
    $button_text_color = '#fff';
    if ('gradient-custom' === $style) {
        $gradient_color_1 = $gradient_custom_color_1;
        $gradient_color_2 = $gradient_custom_color_2;
        $button_text_color = $gradient_text_color;
    }
    $gradient_css = array();
    $gradient_css[] = 'color: ' . $button_text_color;
    $gradient_css[] = 'border: none';
    $gradient_css[] = 'background-color: ' . $gradient_color_1;
    $gradient_css[] = 'background-image: -webkit-linear-gradient(left, ' . $gradient_color_1 . ' 0%, ' . $gradient_color_2 . ' 50%,' . $gradient_color_1 . ' 100%)';
    $gradient_css[] = 'background-image: linear-gradient(to right, ' . $gradient_color_1 . ' 0%, ' . $gradient_color_2 . ' 50%,' . $gradient_color_1 . ' 100%)';
    $gradient_css[] = '-webkit-transition: all .2s ease-in-out';
    $gradient_css[] = 'transition: all .2s ease-in-out';
    $gradient_css[] = 'background-size: 200% 100%';
    // hover css
    $gradient_css_hover = array();
    $gradient_css_hover[] = 'color: ' . $button_text_color;
    $gradient_css_hover[] = 'background-color: ' . $gradient_color_2;
    $gradient_css_hover[] = 'border: none';
    $gradient_css_hover[] = 'background-position: 100% 0';
    $uid = uniqid();
    echo '<style type="text/css">.vc_btn3-style-' . $style . '.vc_btn-gradient-btn-' . $uid . ':hover{' . implode(';', $gradient_css_hover) . ';' . '}</style>';
    echo '<style type="text/css">.vc_btn3-style-' . $style . '.vc_btn-gradient-btn-' . $uid . '{' . implode(';', $gradient_css) . ';' . '}</style>';
    $button_classes[] = 'vc_btn-gradient-btn-' . $uid;
    $attributes[] = 'data-vc-gradient-1="' . $gradient_color_1 . '"';
    $attributes[] = 'data-vc-gradient-2="' . $gradient_color_2 . '"';
}
else {
    $button_classes[] = 'vc_btn3-color-' . $color;
}
if ($styles) {
    $attributes[] = 'style="' . implode(' ', $styles) . '"';
}
$class_to_filter = implode(' ', array_filter($wrapper_classes));
$class_to_filter.= vc_shortcode_custom_css_class($css, ' ');
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts);
if ($button_classes) {
    $button_classes = esc_attr(apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($button_classes)) , $this->settings['base'], $atts));
    $attributes[] = 'class="' . trim($button_classes) . '"';
}
if ($use_link) {
    $attributes[] = 'href="' . trim($a_href) . '"';
    $attributes[] = 'title="' . esc_attr(trim($a_title)) . '"';
    if (!empty($a_target)) {
        $attributes[] = 'target="' . esc_attr(trim($a_target)) . '"';
    }
    if (!empty($a_rel)) {
        $attributes[] = 'rel="' . esc_attr(trim($a_rel)) . '"';
    }
}
if (!empty($custom_onclick) && $custom_onclick_code) {
    $attributes[] = 'onclick="' . esc_attr($custom_onclick_code) . '"';
}
$attributes = implode(' ', $attributes);
$wrapper_attributes = array();
if (!empty($el_id)) {
    $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}
// custom btn setting
if ($btype == "Default") {
?>
<div class="<?php
    echo trim(esc_attr($css_class)) ?>" <?php
    echo implode(' ', $wrapper_attributes); ?>>
    <?php
    if ($use_link) {
        echo '<a ' . $attributes . '>' . $button_html . '</a>';
    }
    else {
        echo '<button ' . $attributes . '>' . $button_html . '</button>';
    }
?>
</div>
<?php
}
else {
     $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
     if (!empty($el_class)) {
        $el_class =  $el_class;
        } 
    // condition for   icon text size value
    if ($icon_font_size == ""){
        $ricon_font_size = "";   
    }
    else {
        $icon_font_size=apply_filters( 'slcr_value_parameter_filter', $icon_font_size);
        $ricon_font_size = ' font-size: ' . esc_attr($icon_font_size) . ' !important;';
    }
    // condition for   icon text padding left right value
    if ($icon_padding_left == ""){
        $ricon_padding_left = "";
    }
    else {
        $icon_padding_left=apply_filters( 'slcr_value_parameter_filter', $icon_padding_left);
        $ricon_padding_left = ' padding-left: ' . esc_attr($icon_padding_left) . ' !important;';
    }
    // condition for   icon text padding left right value
    if ($icon_padding_right == ""){
        $ricon_padding_right = "";
    }
    else {
        $icon_padding_right=apply_filters( 'slcr_value_parameter_filter', $icon_padding_right);
        $ricon_padding_right = ' padding-right: ' . esc_attr($icon_padding_right) . ' !important;';
    }
    $attributes2 = "";
    if ($use_link) {
        $attributes2 = 'href="' . trim($a_href) . '" ';
        $attributes2.= 'title="' . esc_attr(trim($a_title)) . '" ';
        if (!empty($a_target)) {
            $attributes2.= 'target="' . esc_attr(trim($a_target)) . '"';
        }
        if (!empty($a_rel)) {
            $attributes2.= 'rel="' . esc_attr(trim($a_rel)) . '"';
        }
    }
    else {
        $attributes2 = 'href="#" ';
    }
    if ('true' === $fade_effect) {
        $rfade_effect = "animsition-link";
    }
    else {
        $rfade_effect = "";
    }
    if ('true' === $add_icon) { 
        vc_icon_element_fonts_enqueue($i_type);
        if($i_type == "flaticon"){ 
            $icon_class = "";
        }else if (isset($ {
            'i_icon_' . $i_type
        })) {
            if ('pixelicons' === $i_type) {
                $icon_wrapper = true;
            }
            $icon_class = $ {
                'i_icon_' . esc_attr($i_type)
            };
        }
        else {
            $icon_class = 'fa fa-adjust';
        } 
        if(empty($icon_class)) {
            $icon_class=apply_filters( 'slcr_icon_class_return_filter', $icon_class, $i_type, $icon_flaticon); 
        }
        $uid22 = uniqid();
        if ($icon_wrapper) {
            $slcr_icon_html_last_css = '.slcr_icon_html_last_css_' . $uid22 . '{ ' . $ricon_font_size . '' . $ricon_padding_left . '' . $ricon_padding_right . ' }';
            $name="inline_slcr";
            $value=$slcr_icon_html_last_css;
            do_action( 'wp_enqueue_scripts',$value,$name);
            $icon_html = '<i class="vc_btn3-icon"><span class="vc_btn3-icon-inner ' . esc_attr($icon_class) . ' slcr_icon_html_last_css_' . $uid22 . '"></span></i>';
        }
        else {
            $slcr_icon_html_last_css = '.slcr_icon_html_last_css_' . $uid22 . '{ ' . $ricon_font_size . '' . $ricon_padding_left . '' . $ricon_padding_right . ' }';
            $name="inline_slcr";
            $value=$slcr_icon_html_last_css;
            do_action( 'wp_enqueue_scripts',$value,$name); 
            $icon_html = '<i class="vc_btn3-icon ' . esc_attr($icon_class) . ' slcr_icon_html_last_css_' . $uid22 . '"></i>';
        }
        if ('left' === $i_align) {
            $button_html = $icon_html . ' ' . '<span>' . esc_html($title) . '</span>';
        }
        else {
            $button_html = '<span>' . esc_html($title) . '</span>' . $icon_html;
        }
    }
    else {
        $button_html = '<span>' . esc_html($title) . '</span>';
    }
    // css & animation
    $rclass = vc_shortcode_custom_css_class($css, ' ');
    $rclass_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $rclass, $this->settings['base'], $atts);
    $button_animation = $this->getCSSAnimation($css_animation);
    $css_class = $button_animation . ' ' . $rclass_class;
    // **********************************google font for a button *****************************************
    if ($button_use_theme_fonts == "Yes") {
        // Build the data array
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();
        $fieldSettings = array();
        $button_font_data = strlen($button_google_font_select) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes($fieldSettings, $button_google_font_select) : '';
        // Build the inline style
        // Inline styles
        $fontFamily = explode(':', $button_font_data['values']['font_family']);
        $styles[] = 'font-family:' . $fontFamily[0];
        $fontStyles = explode(':', $button_font_data['values']['font_style']);
        $styles[] = 'font-weight:' . $fontStyles[1];
        $styles[] = 'font-style:' . $fontStyles[2];
        $inline_style = '';
        foreach($styles as $attribute) {
            $inline_style.= $attribute . '; ';
        }
        $button_font_inline_style = $inline_style;
        // Get extra subsets for settings (latin/cyrillic/etc)
        $settings = get_option('wpb_js_google_fonts_subsets');
        if (is_array($settings) && !empty($settings)) {
            $subsets = '&subset=' . implode(',', $settings);
        }
        else {
            $subsets = '';
        }
        // We also need to enqueue font from googleapis
        if (isset($button_font_data['values']['font_family'])) {
            wp_enqueue_style('vc_google_fonts_' . vc_build_safe_css_class($button_font_data['values']['font_family']) , '//fonts.googleapis.com/css?family=' . $button_font_data['values']['font_family'] . $subsets);
        }
    }
    else {
        $button_font_inline_style = "";
    }
    if ($button_block == "true") {
        $rbutton_block = ' width: 100%;';
    }
    else {
        $rbutton_block = '';
    }
    if ($button_block_mobile == "true") {
        $rbutton_block_mobile = ' btn--full-xs';
    }
    else {
        $rbutton_block_mobile = '';
    }
    if ($button_block_tablet == "true") {
        $rbutton_block_tablet = ' btn--full-sm';
    }
    else {
        $rbutton_block_tablet = '';
    }
    // condition for  cbutton_border_radius value
    if ($cbutton_border_radius == "") {
        $rcbutton_border_radius = "";
    }
    else {
        $cbutton_border_radius=apply_filters( 'slcr_value_parameter_filter', $cbutton_border_radius);
        $rcbutton_border_radius = ' border-radius: ' . $cbutton_border_radius . ' !important;';
    }
    // condition for  cbutton_border_size value
    if ($cbutton_border_size == "") {
    $rcbutton_border_size = "";
    }
    else {
        $cbutton_border_size=apply_filters( 'slcr_value_parameter_filter', $cbutton_border_size);
        $rcbutton_border_size = ' border-width:' . $cbutton_border_size . ' !important;';
    }
    // condition for   cbutton hover text colort color value
    if ($cbutton_hover_color == "") {
        $rcbutton_hover_color = "";
    }
    else {
        $rcbutton_hover_color = ' background: ' . $cbutton_hover_color . ' !important;';
    }
    // condition for   cbutton hover text colort color value
    if ($cbutton_hover_text_color == "") {
        $rcbutton_hover_text_color = "";
    }
    else {
        $rcbutton_hover_text_color = ' color: ' . $cbutton_hover_text_color . ' !important;';
    }
    // condition for   cbutton_border_hover_color value
    if ($cbutton_border_hover_color == "") {
        $rcbutton_border_hover_color = "";
    }
    else {
        $rcbutton_border_hover_color = ' border-color: ' . $cbutton_border_hover_color . ' !important;';
    }
    // condition for   cbutton colort color value
    if ($cbutton_color == "") {
        $rcbutton_color = "";
    }
    else {
        $rcbutton_color = ' background: ' . $cbutton_color . ' !important;';
    }
    // condition for    cbutton border  colort color value
    if ($cbutton_border_color == "") {
        $rcbutton_border_color = "";
    }
    else {
        $rcbutton_border_color = ' border-color: ' . $cbutton_border_color . ' !important;';
    }
    // condition for   tagline text color value
    if ($button_font_color == "") {
        $rbutton_font_color = "";
    }
    else {
        $rbutton_font_color = ' color: ' . $button_font_color . ' !important;';
    }
    // get   button text transform value
    if ($button_text_transform == "Default") {
        $rbutton_text_transform = "";
    }
    else {
        $rbutton_text_transform = $button_text_transform;
    }
    // condition for   button text size value
    if ($button_font_size == "") {
        $rbutton_font_size = "";
    }
    else {
        $button_font_size=apply_filters( 'slcr_value_parameter_filter', $button_font_size);
        $rbutton_font_size = ' font-size: ' . $button_font_size . ';';
    }
    // condition for   button text color value
    if ($button_font_color == "") {
        $rbutton_font_color = "";
    }
    else {
        $rbutton_font_color = ' color: ' . $button_font_color . ' !important;';
    }
    // condition for   button text  transform  value
    if ($rbutton_text_transform == "") {
        $r2button_text_transform = "";
    }
    else {
        $r2button_text_transform = ' text-transform: ' . $rbutton_text_transform . ';';
    }
    $uid2 = uniqid();
    switch ($button_type) {
    case 'Button_Ghost':
        $slcr_btn_css_last = '#btn_slcr_' . $uid2 . '{' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . ' } #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . ' }';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($rbutton_block_mobile) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' btn--ghost "  >
                        <span>' . esc_html($title) . '</span>
                    </a> ';
        break;

    case 'Hover_Icon':
        if ('left' === $i_align) {
            $button_html = '<span>' . $icon_html . ' ' . esc_html($title) . '</span>';
        }
        else {
            $button_html = '<span>' . esc_html($title) . '' . $icon_html . '</span>';
        }
        $slcr_btn_css_last = ' #btn_slcr_' . $uid2 . '{' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . ' } #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . ' } ';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($rbutton_block_mobile) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($button_colors) . '  btn--icon "> 
                        ' . $button_html . '  
                    </a> ';
        break;

    case 'Button_Fill':
        $slcr_btn_css_last = ' #btn_slcr_' . $uid2 . '{' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . '} #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . '}  #btn_slcr_' . $uid2 . ':after {' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '} #btn_slcr_' . $uid2 . ':hover span {' . esc_attr($rcbutton_hover_text_color) . '}  ';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($rbutton_block_mobile) . ' ' . esc_attr($button_fill_animation) . ' btn--fill ">
                        <span>' . esc_html($title) . '</span>
                    </a> ';
        break;
 
    case 'Custom_Icon':
        $slcr_btn_css_last = ' #btn_slcr_' . $uid2 . '{ ' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . '}  #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . ' }';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($rbutton_block_mobile) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($button_colors) . '  btn--icon-simple ">
                        ' . $button_html . '
                    </a> ';
        break;

    case 'Background_Inverse':
        $slcr_btn_css_last = ' #btn_slcr_' . $uid2 . '{' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . ' }  #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . ' }';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). '  btn--inverse ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($rbutton_block_mobile) . ' ">
                        <span>' . esc_html($title) . '</span>
                    </a> ';
        break;

    default:
        $slcr_btn_css_last = '#btn_slcr_' . $uid2 . '{' . esc_attr($rcbutton_border_color) . '' . esc_attr($rcbutton_color) . '' . esc_attr($rbutton_font_size) . '' . esc_attr($rbutton_font_color) . '' . esc_attr($rbutton_block) . '' . esc_attr($r2button_text_transform) . '' . esc_attr($button_font_inline_style) . '' . esc_attr($rcbutton_border_radius) . '' . esc_attr($rcbutton_border_size) . '}  #btn_slcr_' . $uid2 . ':hover{' . esc_attr($rcbutton_hover_color) . '' . esc_attr($rcbutton_hover_text_color) . '' . esc_attr($rcbutton_border_hover_color) . ' }';
        $html = '
                    <a ' . $attributes2 . 'id="btn_slcr_' . $uid2 . '" class="btn ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' ' . esc_attr($button_size) . ' ' . esc_attr($button_font_weights) . ' ' . esc_attr($button_shapes) . ' ' . esc_attr($button_hover_styles) . ' ' . esc_attr($button_colors) . ' ' . esc_attr($rfade_effect) . ' ' . esc_attr($rbutton_block_tablet) . ' ' . esc_attr($button_border_size) . ' ' . esc_attr($rbutton_block_mobile) . ' ">
                        <span>' . esc_html($title) . '</span>
                    </a>  ';
        break;
    } 
    $name="inline_slcr";
    $value=$slcr_btn_css_last;
    do_action( 'wp_enqueue_scripts',$value,$name); 
    echo '<div class="vc_btn3-container vc_btn3-' . esc_attr($align) . '">'.$html.'</div>';
}
?>