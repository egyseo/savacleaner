<?php
/** 
 * The SlashCreative Header Page
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
global $slcr_redux;
?>
<!doctype html>
<html <?php language_attributes();?> class="">
    <head>
        <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="<?php bloginfo('charset');?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- META ENDS -->  
        <?php  
        // If a Site Icon hasn't been set or if the `has_site_icon` function doesn't exist (ie older than WordPress 4.3) 
        if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {  ?>   
            <!-- FAVICONS -->
            <?php
            global $slcr_redux;
            if (!empty($slcr_redux['general_settings_fav_icon_main']['url'])) { ?>
                <link rel="icon" href="<?php echo esc_url($slcr_redux['general_settings_fav_icon_main']['url']); ?>">
                <?php
            } else {
                $picture   = esc_attr(get_option('site_logo_img')); 
                if (!empty($picture)) { ?>
                    <link rel="icons" href="<?php echo esc_url($picture); ?>">
            <?php }
            }
            if (!empty($slcr_redux['general_settings_fav_icon_144']['url'])) { ?>
                <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($slcr_redux['general_settings_fav_icon_144']['url']); ?>">
            <?php }
            if (!empty($slcr_redux['general_settings_fav_icon_114']['url'])) {?>
                <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url($slcr_redux['general_settings_fav_icon_114']['url']); ?>">
            <?php }
            if (!empty($slcr_redux['general_settings_fav_icon_72']['url'])) { ?>
                <link rel="apple-touch-icon-precomposed " href="<?php echo esc_url($slcr_redux['general_settings_fav_icon_72']['url']); ?>">
            <?php }
        }
        ?>
        <!-- STYLESHEETS -->
        
        <?php
        $body_add_class = ""; 
        if ($slcr_redux['general_settings_functionality_fade_exit_animation'] == "1") {
            $body_add_class .= "animsition"; 
        }
        if ($slcr_redux['general_settings_main_body_border'] == "1") {
            $body_add_class .= " border__enabled";
        }
        if ($slcr_redux['general_settings_functionality_scroll_to_div_animation'] == "1") {
            $body_add_class .= " smooth__links";
        }
        if ($slcr_redux['header-navigation-settings-typography-type-mobile'] == "modern") {
            if($slcr_redux['header-navigation-settings-layout-type']== "third" || $slcr_redux['header-navigation-settings-layout-type']=="fourth"){
                  
            }else {
                $body_add_class .= "  nav__modern"; 
            }
            
        }       
        if ($slcr_redux['blog-settings-blog-single-biohs-slcr'] == 1) {
             
        }else {
            $body_add_class .= " blog_bio_hidden";
        }
        global $wp_query;
        $acf_page_id =$wp_query->get_queried_object_id(); 
        global $wp;
        $current_page_url_acf = home_url( $wp->request ); 
        include_once( SLCR_FRAMEWORK_DIR . 'front/slcr-front.php' );  
        wp_head(); 
        ?> 
    </head>
    <?php  
    include_once locate_template('template-parts/main/head.php'); ?>