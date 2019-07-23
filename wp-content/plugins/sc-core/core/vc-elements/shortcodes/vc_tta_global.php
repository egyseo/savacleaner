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
 * @var $content - shortcode content
 * @var $el_class
 * @var $el_id
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */
// menual extract shortcode atts
extract(shortcode_atts(array(
    'accordion_type' => '',
) , $atts));
// condition to customize content if the loop selected
$content;
if ($accordion_type == "slcr") {
    $parts = explode('"]', $content);
    array_pop($parts);
    $size = count($parts);
    $result = array();
    for ($i = 0; $i < $size; $i++) {
        if ($i % 2 != 0) {
            $result[] = $parts[$i];
        }
    }
    $content = implode('"]', $result);
    $content.= '"]';
    $element_count = substr_count($content, 'slcr_accordion_data');
    if($element_count==""){
        $content=str_replace('[/vc_tta_section]','',$content);
    }
}
$el_class = $css = $css_animation = '';
$atts = vc_map_get_attributes($this->getShortcode() , $atts);
$this->resetVariables($atts, $content);
extract($atts);
$this->setGlobalTtaInfo();
$this->enqueueTtaStyles();
$this->enqueueTtaScript();
// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable('content');
$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter.= vc_shortcode_custom_css_class($css, ' ') . $this->getExtraClass($el_class) . $this->getCSSAnimation($css_animation);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts);
if ($accordion_type == "slcr") {
    $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $atts);
    if ('true' === $multitab) {
        $rmultitab = "";
    }
    else {
        $rmultitab = "one-tab";
    }
    if ($cheader_border_radius == ""){
        $rcheader_border_radius = "";   
    } 
    else {
        $cheader_border_radius=apply_filters( 'slcr_value_parameter_filter', $cheader_border_radius);
        $rcheader_border_radius = ' border-radius: ' . $cheader_border_radius . ' !important;';
    }
    if ($cheader_border_size == "") {
        $rcheader_border_size = "";
    }
    else {
        $cheader_border_size=apply_filters( 'slcr_value_parameter_filter', $cheader_border_size); 
        $rcheader_border_size = 'border-width:' . $cheader_border_size . ' !important;';
    }
    if ($cheader_bg_color == ""){ 
        $rcheader_bg_color = "";
    }
    else {
        $rcheader_bg_color = 'background: ' . $cheader_bg_color . ' !important;   border-color: ' . $cheader_bg_color . ' !important;';
    } 
    if ($cheader_hover_color == ""){ 
        $rcheader_hover_color = "";
    }
    else {
        $rcheader_hover_color = 'color: ' . $cheader_hover_color . ' !important;';
    }
    if ($cheader_border_color == ""){ 
        $rcheader_border_color = "";
    }
    else {
        $rcheader_border_color = 'border-color: ' . $cheader_border_color . ' !important;';
    }
    $uid2 = uniqid();
    $slcr_acco_css_last = ' .m_accordion' . $uid2 . ' .accordion-header {  ' . esc_attr($rcheader_border_radius) . ' ' . esc_attr($rcheader_border_size) . ' ' . esc_attr($rcheader_border_color) . ' } .m_accordion' . $uid2 . '.accordion__02 li.active .accordion-header { ' . esc_attr($rcheader_bg_color) . ' }   .m_accordion' . $uid2 . '.accordion__02 li.active .accordion-header::before {  ' . esc_attr($rcheader_hover_color) . ' } .m_accordion' . $uid2 . '.accordion__02 li.active .accordion-header h5 { ' . esc_attr($rcheader_hover_color) . ' } .m_accordion' . $uid2 . ' .accordion-header::before {   }   .m_accordion' . $uid2 . '.accordion__03 li:hover .accordion-header h5 {' . esc_attr($rcheader_hover_color) . ' } .m_accordion' . $uid2 . '.accordion__03 li.active .accordion-header h5 {' . esc_attr($rcheader_hover_color) . ' } .m_accordion' . $uid2 . '.accordion__03 .active .accordion-header::before {' . esc_attr($rcheader_hover_color) . '} .accordion__02 li.active .accordion-header::before { color: #fff; }';
    switch ($slcr_accordion_type) {
    case 'slcr_Accordion_Type_2':
        echo '<ul class="accordion m_accordion' . $uid2 . ' accordion__02 ' . esc_attr($rmultitab) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '  >'.$prepareContent.'</ul>';
        break;

    case 'slcr_Accordion_Type_3':
        echo '<ul class="accordion m_accordion' . $uid2 . ' accordion__03 ' . esc_attr($rmultitab) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . ' >'.$prepareContent.'</ul>';
        break;

    default:
        echo '<ul class="accordion m_accordion' . $uid2 . ' ' . esc_attr($rmultitab) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class) . '" ' . implode(' ', $wrapper_attributes) . ' >'.$prepareContent.'</ul>';
        break;
    } 
    $name="inline_slcr";
    $value=$slcr_acco_css_last;
    do_action( 'wp_enqueue_scripts',$value,$name); 
}
elseif (isset($tab_main_type) && $tab_main_type == "slcr_tab") {

    // ********************************//
    // GOOGLE FONTS PRIVATE FUNCTIONS //
    // ********************************//
    // Build the string of values in an Array 
    function getFontsData($fontsString)
    {
        // Font data Extraction
        $googleFontsParam = new Vc_Google_Fonts();
        $fieldSettings = array();
        $fontsData = strlen($fontsString) > 0 ? $googleFontsParam->_vc_google_fonts_parse_attributes($fieldSettings, $fontsString) : '';
        return $fontsData;
    }
    // Build the inline style starting from the data
    function googleFontsStyles($fontsData)
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
    function enqueueGoogleFonts($fontsData)
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


    // **********************************google font for a title *****************************************
    if ($title_use_theme_fonts == "Yes") {
        // Build the data array
        $title_font_data = getFontsData($title_google_font_select);
        // Build the inline style
        $title_font_inline_style = googleFontsStyles($title_font_data);
        // Enqueue the right font
        enqueueGoogleFonts($title_font_data);
    }
    else {
        $title_font_inline_style = "";
    }
    // get   title text transform value
    if ($title_text_transform == "Default") {
        $rtitle_text_transform = "";
    }
    else {
        $rtitle_text_transform = esc_attr($title_text_transform);
    }
    // condition for  title text size value
    if ($title_font_size == "") {
        $rtitle_font_size = "";
    }
    else {
         $title_font_size=apply_filters( 'slcr_value_parameter_filter', $title_font_size);
        $rtitle_font_size = 'font-size: ' . esc_attr($title_font_size) . ';';
    }
    // condition for   title text color value
    if ($title_font_color == "") {
        $rtitle_font_color = "";
    }
    else {
        $rtitle_font_color = 'color: ' . esc_attr($title_font_color) . ';';
    }
    // condition for   title text padding top  bottom value
    if ($title_padding_top == "") {
        $rtitle_padding_top = "";
    }
    else {
         $title_padding_top=apply_filters( 'slcr_value_parameter_filter', $title_padding_top);
        $rtitle_padding_top = 'padding-top: ' . esc_attr($title_padding_top) . '; padding-bottom: ' . esc_attr($title_padding_top) . ';';
    }
    // condition for   title text padding left right value
    if ($title_padding_left == "") {
        $rtitle_padding_left = "";
    }
    else {
        $title_padding_left=apply_filters( 'slcr_value_parameter_filter', $title_padding_left);
        $rtitle_padding_left = 'padding-left: ' . esc_attr($title_padding_left) . '; padding-right: ' . esc_attr($title_padding_left) . ';';
    }
    // condition for   title text transform  value
    if ($rtitle_text_transform == "") {
        $r2title_text_transform = "";
    }
    else {
        $r2title_text_transform = 'text-transform: ' . esc_attr($rtitle_text_transform) . ';';
    }
    if ($tab_style == "tabbed_vertical") {
        $rtab_style = "tabbed_vertical";
    }
    else {
        $rtab_style = "";
    }
    $rtab_style_tabbed_sperator = "false";
    if ($tab_style_tabbed_sperator == "Yes") {
        $rtab_style_tabbed_sperator = "true";
    }
    $rtab_style_tabbed_justify = "false";
    if ($tab_style_tabbed_justify == "Yes") {
        $rtab_style_tabbed_justify = "true";
    }
    $rtab_head_style_border = "";
    $rtab_head_style_border_color="";
    $rtab_head_style_border_radius="";
    $rtab_head_style_bg_color="";
    if ($tab_head_style_border_type == "Yes") {
        if ($tab_head_style_top_border == "") {
            $rtab_head_style_top_border = "";
        }
        else {
            $tab_head_style_top_border=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_top_border);
            $rtab_head_style_top_border = ' border-top: ' . esc_attr($tab_head_style_top_border) . '; border-top-style: solid;';
        }
        if ($tab_head_style_bottom_border == "") {
            $rtab_head_style_bottom_border = "";
        }
        else {
            $tab_head_style_bottom_border=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_bottom_border);
            $rtab_head_style_bottom_border = ' border-bottom: ' . esc_attr($tab_head_style_bottom_border) . '; border-bottom-style: solid;';
        }
        if ($tab_head_style_left_border == "") {
            $rtab_head_style_left_border = "";
        }
        else {
            $tab_head_style_left_border=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_left_border);
            $rtab_head_style_left_border = ' border-left: ' . esc_attr($tab_head_style_left_border) . '; border-left-style: solid;';
        }
        if ($tab_head_style_right_border == "") {
            $rtab_head_style_right_border = "";
        }
        else {
            $tab_head_style_right_border=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_right_border);
            $rtab_head_style_right_border = ' border-right: ' . esc_attr($tab_head_style_right_border) . '; border-right-style: solid;';
        }
        if ($tab_head_style_border_color == "") {
            $rtab_head_style_border_color = "";
        }
        else {
            $rtab_head_style_border_color = ' border-color: ' . esc_attr($tab_head_style_border_color) . '; ';
        }
        if ($tab_head_style_border_radius == "") {
            $rtab_head_style_border_radius = " ";
        }
        else {
            $tab_head_style_border_radius=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_border_radius);
            $rtab_head_style_border_radius = ' border-radius: ' . esc_attr($tab_head_style_border_radius) . '; ';
        }
        if ($tab_head_style_bg_color == "") {
            $rtab_head_style_bg_color = "";
        }
        else {
            $rtab_head_style_bg_color = ' background-color: ' . esc_attr($tab_head_style_bg_color) . '; ';
        }
        $rtab_head_style_border = $rtab_head_style_top_border . '' . $rtab_head_style_bottom_border . '' . $rtab_head_style_left_border . '' . $rtab_head_style_right_border;
    }
    else {
        $rtab_head_style_border = ' ';
    }
    if ($tab_style_color == "") {
        $rtab_style_color = "";
    }
    else {
        $rtab_style_color = ' background-color: ' . esc_attr($tab_style_color) . '; ';
    }
    if ($tab_style_border_type == "Yes") {
        if ($tab_style_top_border == "") {
            $rtab_style_top_border = "";
        }
        else {
            $tab_style_top_border=apply_filters( 'slcr_value_parameter_filter', $tab_style_top_border);
            $rtab_style_top_border = ' border-top: ' . esc_attr($tab_style_top_border) . '; border-top-style: solid;';
        }
        if ($tab_style_bottom_border == "") {
            $rtab_style_bottom_border = "";
        }
        else {
            $tab_style_bottom_border=apply_filters( 'slcr_value_parameter_filter', $tab_style_bottom_border);
            $rtab_style_bottom_border = ' border-bottom: ' . esc_attr($tab_style_bottom_border) . '; border-bottom-style: solid;';
        }
        if ($tab_style_left_border == "") {
            $rtab_style_left_border = "";
        }
        else {
            $tab_style_left_border=apply_filters( 'slcr_value_parameter_filter', $tab_style_left_border);
            $rtab_style_left_border = ' border-left: ' . esc_attr($tab_style_left_border) . '; border-left-style: solid;';
        }
        if ($tab_style_right_border == "") {
            $rtab_style_right_border = "";
        }
        else {
            $tab_style_right_border=apply_filters( 'slcr_value_parameter_filter', $tab_style_right_border);
            $rtab_style_right_border = ' border-right: ' . esc_attr($tab_style_right_border) . '; border-right-style: solid;';
        }
        $rtab_style_border = $rtab_style_top_border . ' ' . $rtab_style_bottom_border . ' ' . $rtab_style_left_border . ' ' . $rtab_style_right_border;
    }
    else {
        $rtab_style_border = ' ';
    }
    if ($tab_style_border_color == "") {
        $rtab_style_border_color = "";
    }
    else {
        $rtab_style_border_color = ' border-color: ' . esc_attr($tab_style_border_color) . '; ';
    }
    if ($tab_style_border_radius == "") {
        $rtab_style_border_radius = " ";
    }
    else {
        $tab_style_border_radius=apply_filters( 'slcr_value_parameter_filter', $tab_style_border_radius);
        $rtab_style_border_radius = ' border-radius: ' . esc_attr($tab_style_border_radius) . '; ';
    }
    // hover setting condition
    if ($hover_tab_style_border_color == "") {
        $rhover_tab_style_border_color = "";
    }
    else {
        $rhover_tab_style_border_color = ' border-color: ' . esc_attr($hover_tab_style_border_color) . '; ';
    }
    if ($hover_title_font_color == "") {
        $hover_title_font_color = "";
    }
    else {
        $hover_title_font_color = ' color: ' . esc_attr($hover_title_font_color) . ';';
    }
    if ($hover_tab_style_color == "") {
        $rhover_tab_style_color = "";
    }
    else {
        $rhover_tab_style_color = ' background-color: ' . esc_attr($hover_tab_style_color) . '; ';
    }
    // active setting condition
    if ($active_tab_style_border_color == "") {
        $ractive_tab_style_border_color = "";
    }
    else {
        $ractive_tab_style_border_color = ' border-color: ' . esc_attr($active_tab_style_border_color) . '; ';
    }
    if ($active_title_font_color == "") {
        $ractive_title_font_color = "";
    }
    else {
        $ractive_title_font_color = ' color: ' . esc_attr($active_title_font_color) . ';';
    }
    if ($active_tab_style_color == "") {
        $ractive_tab_style_color = "";
    }
    else {
        $ractive_tab_style_color = ' background-color: ' . esc_attr($active_tab_style_color) . '; ';
    }
    if ($icon_style_color == "") {
        $ricon_style_color = "";
    }
    else {
        $ricon_style_color = ' color: ' . esc_attr($icon_style_color) . ';';
    }
    if ($active_icon_style_color == "") {
        $ractive_icon_style_color = "";
    }
    else {
        $ractive_icon_style_color = ' color: ' . esc_attr($active_icon_style_color) . ';';
    }
    if ($hover_icon_style_color == "") {
        $rhover_icon_style_color = "";
    }
    else {
        $rhover_icon_style_color = ' color: ' . esc_attr($hover_icon_style_color) . ';';
    }
    // condition for  icon icon size value
    if ($tab_style_icon_size == "") {
        $tab_style_icon_size = " font-size: 30px;";
    }
    else {
        $tab_style_icon_size=apply_filters( 'slcr_value_parameter_filter', $tab_style_icon_size);
        $tab_style_icon_size = ' font-size: ' . esc_attr($tab_style_icon_size) . ';';
    }
    // condition for   icon text padding left right value
    if ($tab_style_icon_padding_left == "") {
        $rtab_style_icon_padding_left = "";
    }
    else {
        $tab_style_icon_padding_left=apply_filters( 'slcr_value_parameter_filter', $tab_style_icon_padding_left);
        $rtab_style_icon_padding_left = ' padding-left: ' . esc_attr($tab_style_icon_padding_left) . ';';
    }
    if ($tab_style_icon_padding_right == "") {
        $rtab_style_icon_padding_right = "";
    }
    else {
        $tab_style_icon_padding_right=apply_filters( 'slcr_value_parameter_filter', $tab_style_icon_padding_right);
        $rtab_style_icon_padding_right = ' padding-right: ' . esc_attr($tab_style_icon_padding_right) . ';';
    }
    if ($tab_head_style_seprator_value == "") {
        $rtab_head_style_seprator_value = " margin-right: 0px ;";
    }
    else {
        $tab_head_style_seprator_value=apply_filters( 'slcr_value_parameter_filter', $tab_head_style_seprator_value);
        $rtab_head_style_seprator_value = ' margin-right: ' . esc_attr($tab_head_style_seprator_value) . ';';
    }
    $uid = uniqid();
    if ($tab_style_border_rounded_tab_radius == "") {
        $rtab_style_border_rounded_tab_radius = "";
    }
    else {
        $tab_style_border_rounded_tab_radius=apply_filters( 'slcr_value_parameter_filter', $tab_style_border_rounded_tab_radius);
        $rtab_style_border_rounded_tab_radius = '.tabbed_section.tab_' . $uid . ' .tabs li:first-child {
            border-top-left-radius: '.esc_attr($tab_style_border_rounded_tab_radius).';
            border-bottom-left-radius: '.esc_attr($tab_style_border_rounded_tab_radius).';
        }
        .tabbed_section.tab_' . $uid . ' .tabs li:last-child {
            border-top-right-radius: '.esc_attr($tab_style_border_rounded_tab_radius).';
            border-bottom-right-radius: '.esc_attr($tab_style_border_rounded_tab_radius).';
        }
        @media (max-width: 767px) {
            .tabbed_section.tab_' . $uid . ' .tabs li:first-child,
            .tabbed_section.tab_' . $uid . ' .tabs li:last-child {
                border-radius: 0 !important;
            }
        }';
    }

    $slcr_tab_custom_css_last = '@media (max-width: 767px) {.tabbed_1.tab_' . $uid .'  .tabs li {margin-right: 0 !important;} } .tabbed_1.tab_' . $uid . ' .tabs {' . $rtab_head_style_border . '' . $rtab_head_style_border_color . '' . $rtab_head_style_border_radius . '' . $rtab_head_style_bg_color . '} .tabbed_section.tab_' . $uid . ' .tabs li { float: none; ' . $rtitle_font_size . '' . $rtitle_font_color . '' . $rtitle_padding_top . '' . $rtitle_padding_left . '' . $r2title_text_transform . '' . $title_font_inline_style . '' . $rtab_style_color . '' . $rtab_style_border . '' . $rtab_style_border_color . '' . $rtab_style_border_radius . ' ' . $rtab_head_style_seprator_value . ' display: inline-block; vertical-align: middle; cursor: pointer; overflow: hidden; position: relative; transition: all ease-in .3s; -webkit-transition: all ease-in .3s; } .tabbed_section.tab_' . $uid . ' .tabs i { ' . $tab_style_icon_size . '' . $rtab_style_icon_padding_left . '' . $rtab_style_icon_padding_right . '' . $ricon_style_color . 'margin-bottom: 10px; transition: all ease-in .3s; -webkit-transition: all ease-in .3s; }  .tabbed_section.tab_' . $uid . ' .tabs li:hover>i{' . $rhover_icon_style_color . ' } .tabbed_section.tab_' . $uid . ' .tabs li.active>i {' . $ractive_icon_style_color . ' } .tabbed_section.tab_' . $uid . ' .tabs li:hover {' . $rhover_tab_style_border_color . '' . $hover_title_font_color . '' . $rhover_tab_style_color . '} .tabbed_section.tab_' . $uid . ' .tabs li.active  {' . $ractive_tab_style_border_color . '' . $ractive_title_font_color . '' . $ractive_tab_style_color . ' } '.$rtab_style_border_rounded_tab_radius;

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
    // $output .= $this->getTemplateVariable( 'title' );
    $dvdfdf = $this->getTemplateVariable('tabs-list-top');
    echo ' 
                <div class="tabbed_section tabbed_1  tab_' . $uid . ' ' . esc_attr($rtab_style) . ' border_bottom  ' . esc_attr($rel_class) . ' ' . esc_attr($css_class) . '  " ' . $rel_id . '  data-tabbed-type="type-1" data-tabbed-justify="' . esc_attr($rtab_style_tabbed_justify) . '" data-tab-align="' . esc_attr($tab_align) . '" data-tab-text="' . esc_attr($tab_text_align) . '" data-tab-sperator="' . esc_attr($rtab_style_tabbed_sperator) . '">
                    <ul class="tabs"> ';
    //  **************************************************coustmise data of vc tab **************************************************//
    $links = array();
    $dom = new DOMDocument();
    $dom->loadHTML($dvdfdf);
    $tags = $dom->getElementsByTagName('a');
    foreach($tags as $tag) {
        $tmp_doc = new DOMDocument();
        $tmp_doc->appendChild($tmp_doc->importNode($tag, true));
        $links[] = array(
            'value' => str_replace('#', '', $tag->getAttribute('href')) ,
            'text' => $tag->nodeValue,
            'html' => $tmp_doc->saveHTML() ,
        );
    }
    $icon = array();
    $i = 0;
    foreach($links as $result) {
        $result['text'];
        $result['value'];
        $htmldata = $result['html'];
        $htmldata = str_replace('data-vc-tabs data-vc-container=".vc_tta"', '', $htmldata);
        if (mb_detect_encoding($result['text'], "auto")=="UTF-8") { 
           $result['text'] = utf8_decode($result['text']);
        } else { 
           $result['text'] = $result['text'];
        }
        $realhtml = $result['text'];
        if (mb_strpos($htmldata, "vc_tta-icon") !== false) {
            $pieces = explode("vc_tta-icon", $htmldata);
            $rpieces = explode('">', $pieces[1]);
            if (isset($rpieces[0])) {
                $realhtml = '<i class="' . $icon_style . ' ' . $rpieces[0] . '"></i>' . $result['text'];
            }
        }
        $htmldata = str_replace('vc_tta-icon', '', $htmldata);
        $htmldata = str_replace('vc_tta-title-text', '', $htmldata);
        if ($i == 0) {
            echo '<li class="active '.esc_attr($title_font_weights_class).'" rel="' . $result["value"] . '"> ' . $realhtml . '</li>';
        }
        else {
            echo '<li class=" '.$title_font_weights_class.'" rel="' . $result["value"] . '"> ' . $realhtml . '</li>';
        }
        $i++;
        // $icon = explode("<i class= ", $result['html']);
    }
    $csdsds = str_replace('class="vc_tta-panel"', 'class="tabbed_content"', $prepareContent);
    $csdsds = str_replace('class="vc_tta-panel vc_active"', 'class="tabbed_content"', $csdsds);
    $csdsds = str_replace('data-vc-content=".vc_tta-panel-body"', ' ', $csdsds);
    $csdsds = str_replace('vc_tta-panel-heading"', 'vc_tta-panel-heading" style=" display: none;"', $csdsds);
    //$csdsds=  str_replace('tabbed_content','_content',$csdsds);
    echo '</ul><div class="tab_container">'.$csdsds.'</div></div>'; 
    $name="inline_slcr";
    $value=$slcr_tab_custom_css_last;
    do_action( 'wp_enqueue_scripts',$value,$name);
}
else {
    
    $output = $this->getTemplateVariable('title');
    $output.= ' <div class="' . esc_attr($css_class) . '"> ';
    $output.= $this->getTemplateVariable('tabs-list-top');
    $output.= $this->getTemplateVariable('tabs-list-left');
    $output.= ' <div class="vc_tta-panels-container"> ';
    $output.= $this->getTemplateVariable('pagination-top');
    $output.= '         <div class="vc_tta-panels">';
    $output.= $prepareContent;
    $output.= '         </div> ';
    $output.= $this->getTemplateVariable('pagination-bottom');
    $output.= ' </div> ';
    $output.= $this->getTemplateVariable('tabs-list-bottom');
    $output.= $this->getTemplateVariable('tabs-list-right');
    $output.= ' </div> ';
    echo '<div ' . $this->getWrapperAttributes() . '>'.$output.'</div>';
} 