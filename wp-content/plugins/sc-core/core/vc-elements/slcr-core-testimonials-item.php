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
 * Element Description: Slcr Testimonial Item
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
// Element Class
class Slcr_Testimonials_Item extends WPBakeryShortCode
{
    // Element Init
    function __construct()
    { 
        add_shortcode('testimonials', array(
            $this,
            'testimonials_element_html'
        ));
    }
    // Element HTML Testimonials
    public function testimonials_element_html($atts, $content = null)

    {
        // Params extraction
        extract(shortcode_atts(array(
            'testimonials_type' => '',
            'avatar' => '',
            'avatar_border_radius' => '',
            'avatar_image_switch' => '',
            'company_logo' => '',
            'company_logo_border_radius' => '',
            'name' => '', 
            'client_name_font_size' => '',
            'client_name_text_transform' => '',
            'client_name_padding_top' => '',
            'client_name_padding_left' => '',
            'client_name_use_theme_fonts' => '',
            'client_name_google_font_select' => '',
            'client_name_font_color' => '',
            'desc' => '', 
            'description_font_size' => '',
            'description_text_transform' => '',
            'description_padding_top' => '',
            'description_padding_left' => '',
            'description_use_theme_fonts' => '',
            'description_google_font_select' => '',
            'description_font_color' => '',
            'tagline' => '', 
            'tagline_font_size' => '',
            'tagline_text_transform' => '',
            'tagline_padding_top' => '',
            'tagline_padding_left' => '',
            'tagline_use_theme_fonts' => '',
            'tagline_google_font_select' => '',
            'tagline_font_color' => '',
            'comment' => '', 
            'comment_font_size' => '',
            'comment_text_transform' => '',
            'comment_padding_top' => '',
            'comment_padding_left' => '',
            'comment_use_theme_fonts' => '',
            'comment_google_font_select' => '',
            'comment_font_color' => '', 
            'content_font_size' => '',
            'content_text_transform' => '',
            'content_padding_top' => '',
            'content_padding_left' => '',
            'content_use_theme_fonts' => '',
            'content_google_font_select' => '',
            'content_font_color' => '',
            'client_rating' => '',
            'star_size' => '',
            'star_color' => '',
            'verified_twitter_account' => '',
            'twitter_account_icon' => '',
            'el_id' => '',
            'el_class' => '',
            'css' => '',
            'slcr_img_link_template' => '',
        ) , $atts));
        // get Avatar image url
        $uid2 = uniqid();
        $inline_name="inline_slcr";

        $avatar_url = wp_get_attachment_image_src($avatar, "full");
        $wrapper_attributes = array();
        if (!empty($el_id)) {
            $wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
        }
        if (!empty($el_class)) {
        $el_class =  $el_class;
        }
        // condition for   avatar border radius   value
        if ($avatar_border_radius == "") {
            $ravatar_border_radius = "";
        }
        else {
            $avatar_border_radius=apply_filters( 'slcr_value_parameter_filter', $avatar_border_radius);
            $ravatar_border_radius = 'border-radius: ' . $avatar_border_radius . ' !important;';
        }
        // get company logo image url
        $company_logo_url = wp_get_attachment_image_src($company_logo, "full");
        // condition for   company logo border radius   value
        if ($company_logo_border_radius == "") {
            $rcompany_logo_border_radius = "";
        }
        else {
            $company_logo_border_radius=apply_filters( 'slcr_value_parameter_filter', $company_logo_border_radius);
            $rcompany_logo_border_radius = 'border-radius: ' . $company_logo_border_radius . ' !important;';
        }
        // get custom css value
        $css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ') , $this->settings['init'], $atts);
        // **********************************google font for a client name  *****************************************
       
        if ($client_name_use_theme_fonts == "Yes") {
            // Build the data array
            $client_name_font_data = $this->getFontsData($client_name_google_font_select);
            // Build the inline style
            $client_name_font_inline_style = $this->googleFontsStyles($client_name_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($client_name_font_data);
        }
        else {
            $client_name_font_inline_style = "";
        }
        // get   client name  text transform value
        if ($client_name_text_transform == "Default") {
            $rclient_name_text_transform = "";
        }
        else {
            $rclient_name_text_transform = $client_name_text_transform;
        }
        // condition for  client_name text size value
        if ($client_name_font_size == "") {
            $rclient_name_font_size = "";
        }
        else {
            $client_name_font_size=apply_filters( 'slcr_value_parameter_filter', $client_name_font_size);
            $rclient_name_font_size = " font-size: " . $client_name_font_size . " !important;";
        }
        // condition for   client_name text color value
        if ($client_name_font_color == "") {
            $rclient_name_font_color = "";
        }
        else {
            $rclient_name_font_color = " color: " . $client_name_font_color . " !important;";
        }
        // condition for   client_name text padding top  bottom value
        if ($client_name_padding_top == "") {
            $rclient_name_padding_top = "";
        }
        else {
            $client_name_padding_top=apply_filters( 'slcr_value_parameter_filter', $client_name_padding_top);
            $rclient_name_padding_top = " padding-top: " . $client_name_padding_top . " !important; padding-bottom: " . $client_name_padding_top . " !important;";
        }
        // condition for   client_name text padding left right value
        if ($client_name_padding_left == "") {
            $rclient_name_padding_left = "";
        }
        else {
            $client_name_padding_left=apply_filters( 'slcr_value_parameter_filter', $client_name_padding_left);
            $rclient_name_padding_left = " padding-left: " . $client_name_padding_left . " !important; padding-right: " . $client_name_padding_left . " !important;";
        }
        // condition for   client_name text transform  value
        if ($rclient_name_text_transform == "") {
            $r2client_name_text_transform = "";
        }
        else {
            $r2client_name_text_transform = " text-transform: " . $rclient_name_text_transform . " !important;";
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
            $rcontent_font_size = " font-size: " . $content_font_size . " !important;";
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
            $rcontent_padding_top = " padding-top: " . $content_padding_top . " !important; padding-bottom: " . $content_padding_top . " !important;";
        }
        // condition for   content text padding left right value
        if ($content_padding_left == "") {
            $rcontent_padding_left = "";
        }
        else {
            $content_padding_left=apply_filters( 'slcr_value_parameter_filter', $content_padding_left);
            $rcontent_padding_left = " padding-left: " . $content_padding_left . " !important; padding-right: " . $content_padding_left . " !important;";
        }
        // condition for   content text transform  value
        if ($rcontent_text_transform == "") {
            $r2content_text_transform = "";
        }
        else {
            $r2content_text_transform = " text-transform: " . $rcontent_text_transform . " !important;";
        }

        // **********************************google font for a tagline *****************************************
        if ($tagline_use_theme_fonts == "Yes") {
            // Build the data array
            $tagline_font_data = $this->getFontsData($tagline_google_font_select);
            // Build the inline style
            $tagline_font_inline_style = $this->googleFontsStyles($tagline_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($tagline_font_data);
        }
        else {
            $tagline_font_inline_style = "";
        }
        // get   tagline text transform value
        if ($tagline_text_transform == "Default") {
            $rtagline_text_transform = "";
        }
        else {
            $rtagline_text_transform = $tagline_text_transform;
        }
        // condition for   tagline text size value
        if ($tagline_font_size == "") {
            $rtagline_font_size = "";
        }
        else {
            $tagline_font_size=apply_filters( 'slcr_value_parameter_filter', $tagline_font_size);
            $rtagline_font_size = " font-size: " . $tagline_font_size . " !important;";
        }
        // condition for   tagline text color value
        if ($tagline_font_color == "") {
            $rtagline_font_color = "";
        }
        else {
            $rtagline_font_color = " color: " . $tagline_font_color . " !important;";
        }
        // condition for   tagline text padding top bottom value
        if ($tagline_padding_top == "") {
            $rtagline_padding_top = "";
        }
        else {
            $tagline_padding_top=apply_filters( 'slcr_value_parameter_filter', $tagline_padding_top);
            $rtagline_padding_top = " padding-top: " . $tagline_padding_top . " !important; padding-bottom: " . $tagline_padding_top . " !important;";
        }
        // condition for   tagline text padding left right value
        if ($tagline_padding_left == "") {
            $rtagline_padding_left = "";
        }
        else {
            $tagline_padding_left=apply_filters( 'slcr_value_parameter_filter', $tagline_padding_left);
            $rtagline_padding_left = " padding-left: " . $tagline_padding_left . " !important; padding-right: " . $tagline_padding_left . " !important;";
        }
        // condition for   tagline text  transform  value
        if ($rtagline_text_transform == "") {
            $r2tagline_text_transform = "";
        }
        else {
            $r2tagline_text_transform = " text-transform: " . $rtagline_text_transform . ";";
        }
        // **********************************google font for a comment *****************************************
        if ($comment_use_theme_fonts == "Yes") {
            // Build the data array
            $comment_font_data = $this->getFontsData($comment_google_font_select);
            // Build the inline style
            $comment_font_inline_style = $this->googleFontsStyles($comment_font_data);
            // Enqueue the right font
            $this->enqueueGoogleFonts($comment_font_data);
        }
        else {
            $comment_font_inline_style = "";
        }
        // get   comment text transform value
        if ($comment_text_transform == "Default") {
            $rcomment_text_transform = "";
        }
        else {
            $rcomment_text_transform = $comment_text_transform;
        }
        // condition for   comment text size value
        if ($comment_font_size == "") {
            $rcomment_font_size = "";
        }
        else {
            $comment_font_size=apply_filters( 'slcr_value_parameter_filter', $comment_font_size);
            $rcomment_font_size = " font-size: " . $comment_font_size . " !important;";
        }
        // condition for   comment text color value
        if ($comment_font_color == "") {
            $rcomment_font_color = "";
        }
        else {
            $rcomment_font_color = " color: " . $comment_font_color . " !important;";
        }
        // condition for   comment text padding top bottom value
        if ($comment_padding_top == "") {
            $rcomment_padding_top = "";
        }
        else {
            $comment_padding_top=apply_filters( 'slcr_value_parameter_filter', $comment_padding_top);
            $rcomment_padding_top = " padding-top: " . $comment_padding_top . " !important; padding-bottom: " . $comment_padding_top . " !important;";
        }
        // condition for   comment text padding left right value
        if ($comment_padding_left == "") {
            $rcomment_padding_left = "";
        }
        else {
            $comment_padding_left=apply_filters( 'slcr_value_parameter_filter', $comment_padding_left);
            $rcomment_padding_left = " padding-left: " . $comment_padding_left . " !important; padding-right: " . $comment_padding_left . " !important;";
        }
        // condition for   comment text  transform  value
        if ($rcomment_text_transform == "") {
            $r2comment_text_transform = "";
        }
        else {
            $r2comment_text_transform = " text-transform: " . $rcomment_text_transform . " !important;";
        }
        // **********************************google font for a description *****************************************
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
            $rdescription_font_size = " font-size: " . $description_font_size . " !important;";
        }
        // condition for   description text  color  value
        if ($description_font_color == "") {
            $rdescription_font_color = "";
        }
        else {
            $rdescription_font_color = "  color: " . $description_font_color . " !important;";
        }
        // condition for   description text  padding top bottom  value
        if ($description_padding_top == "") {
            $rdescription_padding_top = "";
        }
        else {
            $description_padding_top=apply_filters( 'slcr_value_parameter_filter', $description_padding_top);
            $rdescription_padding_top = " padding-top: " . $description_padding_top . " !important; padding-bottom: " . $description_padding_top . " !important;";
        }
        // condition for   description text  padding left right  value
        if ($description_padding_left == "") {
            $rdescription_padding_left = "";
        }
        else {
            $description_padding_left=apply_filters( 'slcr_value_parameter_filter', $description_padding_left);
            $rdescription_padding_left = " padding-left: " . $description_padding_left . " !important; padding-right: " . $description_padding_left . " !important;";
        }
        // condition for   description text  transform   value
        if ($rdescription_text_transform == "") {
            $r2description_text_transform = "";
        }
        else {
            $r2description_text_transform = " text-transform: " . $rdescription_text_transform . " !important;";
        }
        // condition for   client rating star color value
        if ($star_color == "") {
            $rstar_color = "";
        }
        else {
            $rstar_color = " color: " . $star_color . " !important;";
        }
        // condition for   client rating star Size value
        switch ($star_size) {
        case "medium":
            $rstar_size = " font-size: 1.2em !important;";
            break;

        case "large":
            $rstar_size = " font-size: 1.4em !important;";
            break;

        default:
            $rstar_size = " font-size: 1em !important;";
            break;
        }
        $star_css = $rstar_color . ' ' . $rstar_size ;
        $rclient_rating = "";
        if(empty($avatar_url[0])){
            if (!empty($slcr_img_link_template)) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) { 
                    $avatar_url[0] = $slcr_img_link_template; 
                } 
            }
        }
        if(empty($company_logo_url[0])){
            if (!empty($slcr_img_link_template)) {
                if (filter_var($slcr_img_link_template, FILTER_VALIDATE_URL)) {  
                    $company_logo_url[0] = $slcr_img_link_template;
                } 
            }
        } 
        // condition for   Testimonials type to give html structure according to that
        switch ($testimonials_type) {
        case 'Testimonials_Type_2':
            $ravatar_url=""; 
            if(!empty($avatar_url[0])){
                $slcr_testimonials_img__css = '.slcr_testimonials_img_' . $uid2 . ' { ' . esc_attr($ravatar_border_radius) . ' }';
                $value=$slcr_testimonials_img__css;
                do_action( 'wp_enqueue_scripts',$value,$inline_name);
                $ravatar_url='<img src="' . esc_url($avatar_url[0]) . '" class="avatar slcr_testimonials_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'"/>';
            }
            $slcr_testimonials_css = '.slcr_testimonials_' . $uid2 . ' h4 { ' . esc_attr($rtagline_font_size) . '' . esc_attr($rtagline_font_color) . '' . esc_attr($rtagline_padding_top) . '' . esc_attr($rtagline_padding_left) . '' . esc_attr($r2tagline_text_transform) . ' ' . esc_attr($tagline_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' p { ' . esc_attr($rcomment_font_size) . '' . esc_attr($rcomment_font_color) . '' . esc_attr($rcomment_padding_top) . '' . esc_attr($rcomment_padding_left) . '' . esc_attr($r2comment_text_transform) . ' ' . esc_attr($comment_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h5 { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h6 { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = '
                <blockquote class="testimonial__02 text-center' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_testimonials_' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                    '.$ravatar_url.'
                    <h4>' . $tagline . '</h4>
                    <p class="gap-30">' . esc_html($comment) . '</p>
                    <h5 class="color-secondary gap-30 mb-0">' . esc_html($name) . ' </h5>
                    <h6 class="color-secondary gap-0">' . esc_html($desc) . '</h6>
                </blockquote>';
            break;

        case 'Testimonials_Type_3': 
            $rcompany_logo_url=""; 
            if(!empty($company_logo_url[0])){
                $uid2 = uniqid();
                $slcr_testimonials_logo_border_radius = '.slcr_testimonials_logo_border_radius_' . $uid2 . ' { ' . esc_attr($rcompany_logo_border_radius) . '}';
                $namer3="inline_slcr";
                $value=$slcr_testimonials_logo_border_radius;
                do_action( 'wp_enqueue_scripts',$value,$namer3);
                $rcompany_logo_url='<img src="' . esc_url($company_logo_url[0]) . '" class="client slcr_testimonials_logo_border_radius_' . $uid2 . '" alt="'. esc_attr__('Client','sc-core').'"/>';
            }
            $slcr_testimonials_css = ' .slcr_testimonials_' . $uid2 . ' p { ' . esc_attr($rcomment_font_size) . '' . esc_attr($rcomment_font_color) . '' . esc_attr($rcomment_padding_top) . '' . esc_attr($rcomment_padding_left) . '' . esc_attr($r2comment_text_transform) . ' ' . esc_attr($comment_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h5 { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h6 { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = '
                <!-- TESTIMONIAL -->
                <blockquote class="testimonial__03' . esc_attr($css_class) . ' '. esc_attr($el_class). ' slcr_testimonials_' . $uid2 . '" ' . implode(' ', $wrapper_attributes) . '>
                   '.$rcompany_logo_url.'
                   <p class="gap-30">' . esc_html($comment) . '</p>
                   <h5 class="gap-40 mb-0">' . esc_html($name) . '</h5>
                   <h6 class="color-secondary gap-0 mb-0 font-500">' . esc_html($desc) . '</h6>
                </blockquote> ';
            break;

        case 'Testimonials_Type_4':
            if ($verified_twitter_account == "Yes") {
                $rverified_twitter_account = '<i class="verified icon_check_alt"></i>';
            }
            else {
                $rverified_twitter_account = '';
            }
            if ($twitter_account_icon == "Yes") {
                $rtwitter_account_icon = '<div class="twitter-logo"><i class="socicon-twitter"></i></div>';
            }
            else {
                $rtwitter_account_icon = '';
            }
            $ravatar_url=""; 
            if(!empty($avatar_url[0])){
                $slcr_testimonials_img__css = '.slcr_testimonials_img_' . $uid2 . ' { ' . esc_attr($ravatar_border_radius) . ' }';
                $value=$slcr_testimonials_img__css;
                do_action( 'wp_enqueue_scripts',$value,$inline_name);
                $ravatar_url='<img src="' . esc_url($avatar_url[0]) . '" class="full_image avatar slcr_testimonials_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'">';
            }
            $slcr_testimonials_css = ' .slcr_testimonials_' . $uid2 . ' h5 { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h6 { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' } .slcr_testimonials_content_' . $uid2 . ' { ' . esc_attr($rcontent_font_size) . '' . esc_attr($rcontent_font_color) . '' . esc_attr($rcontent_padding_top) . '' . esc_attr($rcontent_padding_left) . '' . esc_attr($r2content_text_transform) . '' . esc_attr($content_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $allowed_html = slcr_helper()->slcr_allowed_html();
            $html = ' 
                <!-- TESTIMONIAL -->
                <blockquote class="testimonial__04 ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="meta">
                        <!-- AVATAR -->
                        <div class="col-md-2 col-xs-2  col-sm-2 hidden-xs">
                            <div class="row">
                                <!-- IMAGE -->
                                '.$ravatar_url.'
                            </div>
                        </div>
                        <!-- USER META -->
                        <div class="col-md-10 col-xs-12 col-sm-10">
                            <div class="row">
                                <div class="info slcr_testimonials_' . $uid2 . '">
                                    <h5 class="gap-0 mb-0">' . esc_html($name) . '' . $rverified_twitter_account . '</h5>
                                    <h6 class="font-reset color-secondary gap-0 mb-0">' . esc_html($desc) . '</h6>
                                </div>
                            </div>
                        </div>
                        <!-- TWITTER ICON -->
                        '.$rtwitter_account_icon.'
                    </div>
                    <!-- TWEET CONTENT -->
                    <div class="tweet slcr_testimonials_content_' . $uid2 . '">
                        ' . wp_kses($content, $allowed_html) . '
                    </div>
                </blockquote>';
            break;

        case 'Testimonials_Type_5': 
            $ravatar_url=""; 
            if(!empty($avatar_url[0])){
                $slcr_testimonials_img__css = '.slcr_testimonials_img_' . $uid2 . ' { ' . esc_attr($ravatar_border_radius) . ' }';
                $value=$slcr_testimonials_img__css;
                do_action( 'wp_enqueue_scripts',$value,$inline_name);
                $ravatar_url='<img src="' . esc_url($avatar_url[0]) . '" class="avatar-image slcr_testimonials_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'"/>';
            }
            $slcr_testimonials_css = ' .slcr_testimonials_comment_' . $uid2 . ' { ' . esc_attr($rcomment_font_size) . '' . esc_attr($rcomment_font_color) . '' . esc_attr($rcomment_padding_top) . '' . esc_attr($rcomment_padding_left) . '' . esc_attr($r2comment_text_transform) . ' ' . esc_attr($comment_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h5 { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h6 { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
                <!-- TESTIMONIAL -->
                <blockquote class="test__05-wrap grid-item-masonry">
                    <div class="testimonial__05 ' . esc_attr($css_class) . ' '. esc_attr($el_class). ' " ' . implode(' ', $wrapper_attributes) . '>
                        <p class="mb-20 slcr_testimonials_comment_' . $uid2 . '">' . esc_html($comment) . '</p>
                        <div class="meta-info">
                            <!-- AVATAR -->
                            <div class="avatar">
                                '.$ravatar_url.'
                            </div>
                            <!-- META -->
                            <div class="meta">
                                <div class="cont slcr_testimonials_' . $uid2 . '">
                                    <h5 class="gap-0 mb-0 font-500">' . esc_html($name) . '</h5>
                                    <h6 class="color-secondary gap-0 mb-0">' . esc_html($desc) . '</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </blockquote> ';
            break;

        case 'Testimonials_Type_6': 
            $ravatar_url=""; 
            if(!empty($avatar_url[0])){
                $slcr_testimonials_img__css = '.slcr_testimonials_img_' . $uid2 . ' { ' . esc_attr($ravatar_border_radius) . ' }';
                $value=$slcr_testimonials_img__css;
                do_action( 'wp_enqueue_scripts',$value,$inline_name);
                $ravatar_url='<img class="wow fadeInUp slcr_testimonials_img_' . $uid2 . '" data-wow-delay=".3s" src="' . esc_url($avatar_url[0]) . '" alt="'. esc_attr__('Image','sc-core').'"/>';
            }
            $slcr_testimonials_css = ' .slcr_testimonials_comment_' . $uid2 . ' { ' . esc_attr($rcomment_font_size) . '' . esc_attr($rcomment_font_color) . '' . esc_attr($rcomment_padding_top) . '' . esc_attr($rcomment_padding_left) . '' . esc_attr($r2comment_text_transform) . ' ' . esc_attr($comment_font_inline_style) . ' } .slcr_testimonials_name_' . $uid2 . ' { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_desc_' . $uid2 . ' { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = ' 
               <!-- TESTIMONIAL -->
               <blockquote class="testimonial__06 switch-' . esc_attr($avatar_image_switch) . ' ' . esc_attr($css_class) . ' '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                   <div class="row">
                       <div class="container">
                           <!-- AVATAR -->
                           <div class="col-md-5 col-sm-6 col-xs-12">
                               '.$ravatar_url.'
                           </div>
                           <!-- CONTENT -->
                           <div class="col-md-6 col-sm-6 text-left padding_sm_bottom">
                               <div class="row">
                                   <h3 class="font-300 text slcr_testimonials_comment_' . $uid2 . '">' . esc_html($comment) . '</h3>
                                   <h5 class="line-reset mb-0 gap-30 text-inline slcr_testimonials_name_' . $uid2 . '">' . esc_html($name) . ' - </h5>
                                   <h5 class="line-reset mb-0 gap-30 text-inline slcr_testimonials_desc_' . $uid2 . '">' . esc_html($desc) . '</h5>
                               </div>
                           </div>
                       </div>
                   </div>
               </blockquote>';
            break;

        default: 
             $uid2 = uniqid();
            $slcr_testimonials_client_rating_last = '.slcr_testimonials_client_rating_' . $uid2 . ' { ' . esc_attr($star_css) . '}';
            $namerd="inline_slcr";
            $value=$slcr_testimonials_client_rating_last;
            do_action( 'wp_enqueue_scripts',$value,$namerd);
            $x = $client_rating;
            while ($x > 0) {
                $rclient_rating.= '
                                    <li><i class="icon_star slcr_testimonials_client_rating_' . $uid2 . '" ></i></li>';
                $x--;
            }
            $slcr_testimonials_css = ' .slcr_testimonials_' . $uid2 . ' p { ' . esc_attr($rcomment_font_size) . '' . esc_attr($rcomment_font_color) . '' . esc_attr($rcomment_padding_top) . '' . esc_attr($rcomment_padding_left) . '' . esc_attr($r2comment_text_transform) . ' ' . esc_attr($comment_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h4 { ' . esc_attr($rclient_name_font_size) . '' . esc_attr($rclient_name_font_color) . '' . esc_attr($rclient_name_padding_top) . '' . esc_attr($rclient_name_padding_left) . '' . esc_attr($r2client_name_text_transform) . ' ' . esc_attr($client_name_font_inline_style) . ' } .slcr_testimonials_' . $uid2 . ' h5 { ' . esc_attr($rdescription_font_size) . '' . esc_attr($rdescription_font_color) . '' . esc_attr($rdescription_padding_top) . '' . esc_attr($rdescription_padding_left) . '' . esc_attr($r2description_text_transform) . ' ' . esc_attr($description_font_inline_style) . ' }';
            $value=$slcr_testimonials_css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $image_html="";
            if(!empty($avatar_url[0])){
                $image_html = '<div class="avatar"> <img src="' . esc_url($avatar_url[0]) . '" class="user-avatar slcr_testimonials_img_' . $uid2 . '" alt="'. esc_attr__('Avatar','sc-core').'" /></div>';
            }
            $slcr_testimonials_img__css = '.slcr_testimonials_img_' . $uid2 . ' { ' . esc_attr($ravatar_border_radius) . ' }';
            $value=$slcr_testimonials_img__css;
            do_action( 'wp_enqueue_scripts',$value,$inline_name);
            $html = '                         
                <!-- TESTIMONIAL -->
                <blockquote class="testimonial__01 '. esc_attr($el_class). '" ' . implode(' ', $wrapper_attributes) . '>
                    <div class="test-item  ' . esc_attr($css_class) . ' slcr_testimonials_' . $uid2 . '">
                        ' . $image_html . '
                        <div class="user-info">
                            <h4 class="gap-0 mb-0">' . esc_html($name) . '</h4>
                            <h5 class="color-secondary gap-0">' . esc_html($desc) . '</h5>
                        </div>
                        <p class="gap-30">' . esc_html($comment) . '</p>
                        <!-- RATING -->
                        <div class="rating">
                            <ul>
                                ' . $rclient_rating . '
                            </ul>
                        </div>
                    </div>
                </blockquote>';
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
        if(isset($fontStyles[1])){
            $styles[] = 'font-weight:' . $fontStyles[1];   
        }
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
new Slcr_Testimonials_Item();
?>