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
 * Element Description: Memberset
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
// Element Class
class Slcr_Memberset extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('team_member_item', array(
            $this,
            'team_member_element_html'
        ));
    }
    // ************************   Team Member  element setting   ***************************/////
    // Element HTML Team Member
    public function team_member_element_html($atts)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'image' => '',
            'team_members_type' => '',
            'name' => '',
            'member_image_switch' => '',
            'member_border_radius' => '', 
            'member_font_size' => '',
            'member_text_transform' => '',
            'member_padding_top' => '',
            'member_padding_left' => '',
            'member_use_theme_fonts' => '',
            'member_google_font_select' => '',
            'member_font_color' => '',
            'job_position' => '', 
            'position_font_size' => '',
            'position_text_transform' => '',
            'position_padding_top' => '',
            'position_padding_left' => '',
            'position_use_theme_fonts' => '',
            'position_google_font_select' => '',
            'position_font_color' => '',
            'desc' => '', 
            'description_font_size' => '',
            'description_text_transform' => '',
            'description_padding_top' => '',
            'description_padding_left' => '',
            'description_use_theme_fonts' => '',
            'description_google_font_select' => '',
            'description_font_color' => '', 
            'social_link_color' => '',
            'social_icon_color' => '',
            'social_icon_font_size' => '',
            'social_link_1' => '',
            'social_link_2' => '',
            'social_link_3' => '',
            'social_link_4' => '',
            'social_link_5' => '',
            'social_link_6' => '',
            'social_link_text_1' => '',
            'social_link_text_2' => '',
            'social_link_text_3' => '',
            'social_link_text_4' => '',
            'social_link_text_5' => '',
            'social_link_text_6' => '',
            'social_link_icon_1' => '',
            'social_link_icon_2' => '',
            'social_link_icon_3' => '',
            'social_link_icon_4' => '',
            'social_link_icon_5' => '',
            'social_link_icon_6' => '', 
            'member_avatar_scale' => '',
            'link' => '',
            'el_class' => '',
            'css' => '',
            'slcr_img_link_template' => '',
        ) , $atts));
        $uid2 = uniqid();
        $inline_name="inline_slcr";
        // get image url
         if ($member_border_radius == "") {
            $member_border_radius = "";
        }
        else {
            $member_border_radius=apply_filters( 'slcr_value_parameter_filter', $member_border_radius); 
        }
        $img_url = wp_get_attachment_image_src($image, "full");
        if ('' !== $el_class) {
                $rel_class = ' ' . str_replace('.', '', $el_class);
        }
        else {
            $rel_class = ' ';
        }
         if ($social_icon_font_size == "") {
            $rsocial_icon_font_size = "";
        }
        else {
            $social_icon_font_size=apply_filters( 'slcr_value_parameter_filter', $social_icon_font_size);
            $rsocial_icon_font_size = "font-size: " . $social_icon_font_size . " !important;";
        } 
        if ($social_icon_color == "") {
            $rsocial_icon_color = "";
        }
        else {
            $rsocial_icon_color = "color: " . $social_icon_color . " !important;";
        }
        if ($social_icon_font_size == "" && $social_icon_color == "") {
            $ricon_css = "";
        }
        else {
            $ricon_css = $rsocial_icon_color .' '.$rsocial_icon_font_size;
        } 
        // get custom value of member link
        if (!empty($link)) {
            $link = vc_build_link($link);
            $rlink = ' href="' . esc_url($link['url']) . '"' . ($link['target'] ? ' target="' . esc_attr($link['target']) . '"' : '') . ($link['rel'] ? ' rel="' . esc_html($link['rel']) . '"' : '') . ($link['title'] ? ' title="' . esc_attr($link['title']) . '"' : '');
            $olink = '<a ' . $rlink . ' class="link"><i class="arrow_right"></i></a>';
        }
        else {
            $olink = "";
        }
        // get custom color for member link
        if (!empty($social_link_color)) {
            $srocial_link_color = 'color: ' . $social_link_color . ';';
        }
        else {
            $srocial_link_color = "";
        }
        // get social link   for Team Members Type 4
        if ($team_members_type == "Team_Members_Type_4") {
            $uid2 = uniqid();
            $slcr_team_members_social_link = '.slcr_team_members_social_link_' . $uid2 . ' { ' . esc_attr($srocial_link_color) . ' }';
            $name_inline_slcr="inline_slcr";
            $value=$slcr_team_members_social_link;
            do_action( 'wp_enqueue_scripts',$value,$name_inline_slcr);
            if (!empty($social_link_1)) {
                $social_link_1 = vc_build_link($social_link_1);
                $social_link_1_out = '<li><a href="' . esc_attr($social_link_1['url']) . '"' . ($social_link_1['target'] ? ' target="' . esc_attr($social_link_1['target']) . '"' : '') . ($social_link_1['rel'] ? ' rel="' . esc_attr($social_link_1['rel']) . '"' : '') . ($social_link_1['title'] ? ' title="' . esc_attr($social_link_1['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_1) . '</a></li>';
            }
            else {
                $social_link_1_out = "";
            }
            if (!empty($social_link_2)) {
                $social_link_2 = vc_build_link($social_link_2);
                $social_link_2_out = '<li><a href="' . esc_attr($social_link_2['url']) . '"' . ($social_link_2['target'] ? ' target="' . esc_attr($social_link_2['target']) . '"' : '') . ($social_link_2['rel'] ? ' rel="' . esc_attr($social_link_2['rel']) . '"' : '') . ($social_link_2['title'] ? ' title="' . esc_attr($social_link_2['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_2) . '</a></li>';
            }
            else {
                $social_link_2_out = "";
            }
            if (!empty($social_link_3)) {
                $social_link_3 = vc_build_link($social_link_3);
                $social_link_3_out = '<li><a href="' . esc_attr($social_link_3['url']) . '"' . ($social_link_3['target'] ? ' target="' . esc_attr($social_link_3['target']) . '"' : '') . ($social_link_3['rel'] ? ' rel="' . esc_attr($social_link_3['rel']) . '"' : '') . ($social_link_3['title'] ? ' title="' . esc_attr($social_link_3['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_3) . '</a></li>';
            }
            else {
                $social_link_3_out = "";
            }
            if (!empty($social_link_4)) {
                $social_link_4 = vc_build_link($social_link_4);
                $social_link_4_out = '<li><a href="' . esc_attr($social_link_4['url']) . '"' . ($social_link_4['target'] ? ' target="' . esc_attr($social_link_4['target']) . '"' : '') . ($social_link_4['rel'] ? ' rel="' . esc_attr($social_link_4['rel']) . '"' : '') . ($social_link_4['title'] ? ' title="' . esc_attr($social_link_4['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_4) . '</a></li>';
            }
            else {
                $social_link_4_out = "";
            }
            if (!empty($social_link_5)) {
                $social_link_5 = vc_build_link($social_link_5);
                $social_link_5_out = '<li><a href="' . esc_attr($social_link_5['url']) . '"' . ($social_link_5['target'] ? ' target="' . esc_attr($social_link_5['target']) . '"' : '') . ($social_link_5['rel'] ? ' rel="' . esc_attr($social_link_5['rel']) . '"' : '') . ($social_link_5['title'] ? ' title="' . esc_attr($social_link_5['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_5) . '</a></li>';
            }
            else {
                $social_link_5_out = "";
            }
            if (!empty($social_link_6)) {
                $social_link_6 = vc_build_link($social_link_6);
                $social_link_6_out = '<li><a href="' . esc_attr($social_link_6['url']) . '"' . ($social_link_6['target'] ? ' target="' . esc_attr($social_link_6['target']) . '"' : '') . ($social_link_6['rel'] ? ' rel="' . esc_attr($social_link_6['rel']) . '"' : '') . ($social_link_6['title'] ? ' title="' . esc_attr($social_link_6['title']) . '"' : '') . ' class="color-theme-main slcr_team_members_social_link_' . $uid2 . '">' . esc_html($social_link_text_6) . '</a></li>';
            }
            else {
                $social_link_6_out = "";
            }
        }
        // get social link   for Team Members Type 7
        else {
            $slcr_custom_teammembers_social_css = '.slcr_custom_teammembers_social_' . $uid2 . '{ '.$ricon_css.' }';
            $value=$slcr_custom_teammembers_social_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            if (!empty($social_link_1)) {
                $social_link_1 = vc_build_link($social_link_1);
                $social_link_1_out = '<li><a href="' . esc_attr($social_link_1['url']) . '"' . ($social_link_1['target'] ? ' target="' . esc_attr($social_link_1['target']) . '"' : '') . ($social_link_1['rel'] ? ' rel="' . esc_attr($social_link_1['rel']) . '"' : '') . ($social_link_1['title'] ? ' title="' . esc_attr($social_link_1['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_1) . '"></i></a></li>';
            }
            else {
                $social_link_1_out = "";
            }
            if (!empty($social_link_2)) {
                $social_link_2 = vc_build_link($social_link_2);
                $social_link_2_out = '<li><a href="' . esc_attr($social_link_2['url']) . '"' . ($social_link_2['target'] ? ' target="' . esc_attr($social_link_2['target']) . '"' : '') . ($social_link_2['rel'] ? ' rel="' . esc_attr($social_link_2['rel']) . '"' : '') . ($social_link_2['title'] ? ' title="' . esc_attr($social_link_2['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_2) . '"></i></a></li>';
            }
            else {
                $social_link_2_out = "";
            }
            if (!empty($social_link_3)) {
                $social_link_3 = vc_build_link($social_link_3);
                $social_link_3_out = '<li><a href="' . esc_attr($social_link_3['url']) . '"' . ($social_link_3['target'] ? ' target="' . esc_attr($social_link_3['target']) . '"' : '') . ($social_link_3['rel'] ? ' rel="' . esc_attr($social_link_3['rel']) . '"' : '') . ($social_link_3['title'] ? ' title="' . esc_attr($social_link_3['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_3) . '"></i></a></li>';
            }
            else {
                $social_link_3_out = "";
            }
            if (!empty($social_link_4)) {
                $social_link_4 = vc_build_link($social_link_4);
                $social_link_4_out = '<li><a href="' . esc_attr($social_link_4['url']) . '"' . ($social_link_4['target'] ? ' target="' . esc_attr($social_link_4['target']) . '"' : '') . ($social_link_4['rel'] ? ' rel="' . esc_attr($social_link_4['rel']) . '"' : '') . ($social_link_4['title'] ? ' title="' . esc_attr($social_link_4['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_4) . '"></i></a></li>';
            }
            else {
                $social_link_4_out = "";
            }
            if (!empty($social_link_5)) {
                $social_link_5 = vc_build_link($social_link_5);
                $social_link_5_out = '<li><a href="' . esc_attr($social_link_5['url']) . '"' . ($social_link_5['target'] ? ' target="' . esc_attr($social_link_5['target']) . '"' : '') . ($social_link_5['rel'] ? ' rel="' . esc_attr($social_link_5['rel']) . '"' : '') . ($social_link_5['title'] ? ' title="' . esc_attr($social_link_5['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_5) . '"></i></a></li>';
            }
            else {
                $social_link_5_out = "";
            }
            if (!empty($social_link_6)) {
                $social_link_6 = vc_build_link($social_link_6);
                $social_link_6_out = '<li><a href="' . esc_attr($social_link_6['url']) . '"' . ($social_link_6['target'] ? ' target="' . esc_attr($social_link_6['target']) . '"' : '') . ($social_link_6['rel'] ? ' rel="' . esc_attr($social_link_6['rel']) . '"' : '') . ($social_link_6['title'] ? ' title="' . esc_attr($social_link_6['title']) . '"' : '') . ' class="color-theme-main slcr_custom_teammembers_social_' . $uid2 . '"><i class="socicon-' . esc_html($social_link_icon_6) . '"></i></a></li>';
            }
            else {
                $social_link_6_out = "";
            }
        }

        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $this->settings['init'], $atts);
        // **********************************google font for a title *****************************************
        if ($member_use_theme_fonts == "Yes") {
            // Build the data array
            $member_font_data = $this->getFontsData($member_google_font_select);
            // Build the inline style
            $member_font_inline_style = $this->googleFontsStyles($member_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($member_font_data);
        }
        else {
            $member_font_inline_style = "";
        }
        // get   member text transform value
        if ($member_text_transform == "Default") {
            $rmember_text_transform = "";
        }
        else {
            $rmember_text_transform = $member_text_transform;
        }
        // condition for  member text size value
        if ($member_font_size == "") {
            $rmember_font_size = "";
        }
        else {
            $member_font_size=apply_filters( 'slcr_value_parameter_filter', $member_font_size);
            $rmember_font_size = " font-size: " . $member_font_size . ";";
        }
        // condition for   member text color value
        if ($member_font_color == "") {
            $rmember_font_color = "";
        }
        else {
            $rmember_font_color = " color: " . $member_font_color . " !important;";
        }
        // condition for   member text padding top  bottom value
        if ($member_padding_top == "") {
            $rmember_padding_top = "";
        }
        else {
            $member_padding_top=apply_filters( 'slcr_value_parameter_filter', $member_padding_top);
            $rmember_padding_top = " padding-top: " . $member_padding_top . "; padding-bottom: " . $member_padding_top . ";";
        }
        // condition for   member text padding left right value
        if ($member_padding_left == "") {
            $rmember_padding_left = "";
        }
        else {
            $member_padding_left=apply_filters( 'slcr_value_parameter_filter', $member_padding_left);
            $rmember_padding_left = " padding-left: " . $member_padding_left . "; padding-right: " . $member_padding_left . ";";
        }
        // condition for   member text transform  value
        if ($rmember_text_transform == "") {
            $r2member_text_transform = "";
        }
        else {
            $r2member_text_transform = " text-transform: " . $rmember_text_transform . ";";
        }
        // **********************************google font for a title *****************************************
        if ($position_use_theme_fonts == "Yes") {
            // Build the data array
            $position_font_data = $this->getFontsData($position_google_font_select);
            // Build the inline style
            $position_font_inline_style = $this->googleFontsStyles($position_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($position_font_data);
        }
        else {
            $position_font_inline_style = "";
        }
        // get   position text transform value
        if ($position_text_transform == "Default") {
            $rposition_text_transform = "";
        }
        else {
            $rposition_text_transform = $position_text_transform;
        }
        // condition for   position text size value
        if ($position_font_size == "") {
            $rposition_font_size = "";
        }
        else {
            $position_font_size=apply_filters( 'slcr_value_parameter_filter', $position_font_size);
            $rposition_font_size = " font-size: " . $position_font_size . ";";
        }
        // condition for   position text color value
        if ($position_font_color == "") {
            $rposition_font_color = "";
        }
        else {
            $rposition_font_color = " color: " . $position_font_color . " !important;";
        }
        // condition for   position text padding top bottom value
        if ($position_padding_top == "") {
            $rposition_padding_top = "";
        }
        else {
            $position_padding_top=apply_filters( 'slcr_value_parameter_filter', $position_padding_top);
            $rposition_padding_top = " padding-top: " . $position_padding_top . "; padding-bottom: " . $position_padding_top . ";";
        }
        // condition for   position text padding left right value
        if ($position_padding_left == "") {
            $rposition_padding_left = "";
        }
        else {
            $position_padding_left=apply_filters( 'slcr_value_parameter_filter', $position_padding_left);
            $rposition_padding_left = " padding-left: " . $position_padding_left . "; padding-right: " . $position_padding_left . ";";
        }
        // condition for   position text  transform  value
        if ($rposition_text_transform == "") {
            $r2position_text_transform = "";
        }
        else {
            $r2position_text_transform = " text-transform: " . $rposition_text_transform . ";";
        }
        // **********************************google font for a title *****************************************
        if ($description_use_theme_fonts == "Yes") {
            // Build the data array
            $description_font_data = $this->getFontsData($description_google_font_select);
            // Build the inline style
            $description_font_inline_style = $this->googleFontsStyles($description_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($description_font_data);
        }
        else {
            $description_font_inline_style = "";
        }
        // get   description text transform value
        if ($description_text_transform == "Default") {
            $rdescription_text_transform = "";
        }
        else {
            $rdescription_text_transform = $description_text_transform;
        }
        // condition for   description text  size  value
        if ($description_font_size == "") {
            $rdescription_font_size = "";
        }
        else {
            $description_font_size=apply_filters( 'slcr_value_parameter_filter', $description_font_size);
            $rdescription_font_size = " font-size: " . $description_font_size . ";";
        }
        // condition for   description text  color  value
        if ($description_font_color == "") {
            $rdescription_font_color = "";
        }
        else {
            $rdescription_font_color = " color: " . $description_font_color . " !important;";
        }
        // condition for   description text  padding top bottom  value
        if ($description_padding_top == "") {
            $rdescription_padding_top = "";
        }
        else {
            $description_padding_top=apply_filters( 'slcr_value_parameter_filter', $description_padding_top);
            $rdescription_padding_top = " padding-top: " . $description_padding_top . "; padding-bottom: " . $description_padding_top . ";";
        }
        // condition for   description text  padding left right  value
        if ($description_padding_left == "") {
            $rdescription_padding_left = "";
        }
        else {
            $description_padding_left=apply_filters( 'slcr_value_parameter_filter', $description_padding_left);
            $rdescription_padding_left = " padding-left: " . $description_padding_left . "; padding-right: " . $description_padding_left . ";";
        }
        // condition for   description text  transform   value
        if ($rdescription_text_transform == "") {
            $r2description_text_transform = "";
        }
        else {
            $r2description_text_transform = " text-transform: " . $rdescription_text_transform . ";";
        }

        if ($member_avatar_scale == "Yes") {
            $rmember_avatar_scale ="true";
        }
        else {
            $rmember_avatar_scale ="false";
        }
        if(empty($img_url[0])){
            if (!empty($slcr_img_link_template)) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $img_url[0] = $slcr_img_link_template; 
                } 
            } 
        }
        // condition for   team members type to give html structure according to that
        switch ($team_members_type) {
        case 'Team_Members_Type_2':  
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_' . $uid2 . ' .image_rounded { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' .text h5 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .text p { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } ';
            $value=$slcr_custom_teammembers_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                       <!-- MEMBER -->
                       <figure class="team__02' . esc_attr($rel_class) . '' . esc_attr($css_class) . ' slcr_custom_teammembers_' . $uid2 . '" data-avatar-scale="' . esc_attr($rmember_avatar_scale) . '" >
                           <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Member','sc-core').'" class="avatar full_image image_rounded" />
                           <div class="text">
                               <h5 class=" gap-10 mb-0">' . esc_html($name) . '</h5>
                               <p class="font-reset gap-0">' . esc_html($job_position) . '</p>
                               <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                           </div>
                        </figure>';
            break;

        case 'Team_Members_Type_3':  
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_' . $uid2 . ' .full_image { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' .overlay { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' .overlay .meta h4 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .overlay .meta h5 { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .overlay .meta p { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_custom_teammembers_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                       <!-- MEMBER -->
                        <figure class="team__03' . esc_attr($rel_class) . '' . esc_attr($css_class) . '">
                            <!-- IMAGE -->
                            <div class="image slcr_custom_teammembers_' . $uid2 . '">
                                <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Avatar','sc-core').'" class="full_image" />
                                <!-- META -->
                                <div class="overlay">
                                    <div class="meta">
                                        <h4 class="color-white mb-0">' . esc_html($name) . '</h4>
                                        <h5 class="font-reset color-white gap-0">' . esc_html($job_position) . '</h5>
                                        <p class="font-reset color-white gap-20 mb-0">' . esc_html($desc) . '</p>
                                        ' . $olink . '
                                    </div>
                                </div>
                            </div>
                        </figure>';
            break;

        case 'Team_Members_Type_4':
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_' . $uid2 . ' .image .full_image { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta h4 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta h5 { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta p { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_custom_teammembers_css; 
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                       <!-- MEMBER -->
                       <figure class="team__04' . esc_attr($rel_class) . '' . esc_attr($css_class) . ' slcr_custom_teammembers_' . $uid2 . '">
                           <!-- IMAGE -->
                           <div class="image">
                               <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Avatar','sc-core').'" class="full_image" />
                           </div>
                           <!-- META -->
                           <div class="meta">
                               <h4 class="mb-0">' . esc_html($name) . '</h4>
                               <h5 class="color-secondary">' . esc_html($job_position) . '</h5>
                               <p class="font-reset gap-20">' . esc_html($desc) . '</p>
                               <!-- SOCIAL LINKS -->
                               <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                           </div>
                       </figure>';
            break;

        case 'Team_Members_Type_5': 
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_img_' . $uid2 . ' { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' h5 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' p { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } ';
            $value=$slcr_custom_teammembers_css; 
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                       <!-- MEMBER -->
                       <figure class="team__05-wrap' . esc_attr($rel_class) . '' . esc_attr($css_class) . '">
                           <div class="team__05">
                               <!-- IMAGE -->
                               <div class="col-md-4 col-xs-4">
                                   <div class="row">
                                       <img src="' . esc_url($img_url[0]) . '" class="avatar full_image slcr_custom_teammembers_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'" />
                                   </div>
                               </div>
                               <!-- META -->
                               <div class="col-md-8 col-xs-8">
                                   <div class="row">
                                       <div class="meta slcr_custom_teammembers_' . $uid2 . '">
                                           <h5 class="gap-0 mb-0">' . esc_html($name) . '</h5>
                                           <p class="font-reset">' . esc_html($job_position) . '</p>
                                           <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </figure>';
            break;

        case 'Team_Members_Type_6':
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_img_' . $uid2 . ' { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' h5 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' p { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } ';
            $value=$slcr_custom_teammembers_css; 
            do_action( 'wp_enqueue_scripts',$value,$inline_name); 
            $html = ' 
                       <!-- MEMBER -->
                       <div class="team__06 text-center' . esc_attr($rel_class) . '' . esc_attr($css_class) . '" data-avatar-scale="' . $rmember_avatar_scale . '">
                           <!-- IMAGE -->
                           <div class="image">
                               <img src="' . esc_url($img_url[0]) . '" class="avatar full_image slcr_custom_teammembers_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'" />
                           </div>
                           <!-- META -->
                           <div class="meta slcr_custom_teammembers_' . $uid2 . '">
                               <h5 class="gap-0 mb-0">' . esc_html($name) . '</h5>
                               <p class="gap-0">' . esc_html($job_position) . '</p>
                               <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                           </div>
                       </div>
                       ';
            break;

        case 'Team_Members_Type_7': 
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_img_' . $uid2 . ' { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta h3 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . '' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta h5 { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' .meta p { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_custom_teammembers_css; 
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                       <!-- MEMBER -->
                       <figure class=" team__07 switch-' . esc_attr($member_image_switch) . '' . esc_attr($rel_class) . '' . esc_attr($css_class) . '">
                           <div class="row">
                               <!-- IMAGE -->
                               <div class="col-md-6 col-sm-6">
                                   <div class="image">
                                       <img src="' . esc_url($img_url[0]) . '" class="full_image image_rounded slcr_custom_teammembers_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'" />
                                   </div>
                               </div>
                               <!-- META -->
                               <div class="col-md-5 col-sm-6 slcr_custom_teammembers_' . $uid2 . '">
                                   <div class="meta">
                                       <h3 class="mb-0 gap-0">' . esc_html($name). '</h3>
                                       <h5 class="gap-0 color-secondary">' . esc_html($job_position) . '</h5>
                                       <p class="gap-20">' . esc_html($desc) . '</p>
                                       <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                                   </div>
                               </div>
                           </div>
                       </figure>';
            break;

        default: 
            $slcr_custom_teammembers_css = '.slcr_custom_teammembers_img_' . $uid2 . ' { border-radius: ' . esc_attr($member_border_radius) . ' } .slcr_custom_teammembers_' . $uid2 . ' h5 { ' . esc_attr($rmember_font_size) . '' . esc_attr($rmember_font_color) . '' . esc_attr($rmember_padding_top) . '' . esc_attr($rmember_padding_left) . '' . esc_attr($r2member_text_transform) . ' ' . esc_attr($member_font_inline_style) . ' } .slcr_custom_teammembers_' . $uid2 . ' p { ' . esc_attr($rposition_font_size) . '' . esc_attr($rposition_font_color) . '' . esc_attr($rposition_padding_top) . '' . esc_attr($rposition_padding_left) . '' . esc_attr($r2position_text_transform) . ' ' . esc_attr($position_font_inline_style). ' } ';
            $value=$slcr_custom_teammembers_css; 
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = '   
                        <!-- TEAM 01 -->
                        <figure class="team__01' . esc_attr($rel_class) . '' . esc_attr($css_class) . ' slcr_custom_teammembers_' . $uid2 . '" data-avatar-scale="' . esc_attr($rmember_avatar_scale) . '" >
                            <img src="' . esc_url($img_url[0]) . '" alt="'. esc_attr__('Member','sc-core').'" class="avatar full_image image_rounded slcr_custom_teammembers_img_' . $uid2 . '" />
                            <h5 class=" gap-20 mb-0">' . esc_html($name) . '</h5>
                            <p class="font-reset gap-0">' . esc_html($job_position) . '</p>
                            <ul>' . $social_link_1_out . '' . $social_link_2_out . '' . $social_link_3_out . '' . $social_link_4_out . '' . $social_link_5_out . '' . $social_link_6_out . '</ul>
                        </figure>';
            break;
        }
        return $html;
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
// Element Class Init
new Slcr_Memberset();
?>