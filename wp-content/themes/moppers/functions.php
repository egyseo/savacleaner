<?php
/**
 * The SlashCreative Themes
 *
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.WordPress.org/Child_Themes
 *
 * @link https://codex.WordPress.org/Theme_Development
 * @link https://codex.WordPress.org/Child_Themes
 *
 * Text Domain: 'moppers'
 * Domain Path: /languages/
 */
if( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Define constant
 */
if ( ! defined( 'SCDS' ) ) {
    define( 'SCDS', '/' );
}

$theme = wp_get_theme();

if ( ! empty( $theme['Template'] ) ) {
    $theme = wp_get_theme( $theme['Template'] );
}

define( 'SLCR_THEME_NAME', $theme['Name'] );
define( 'SLCR_THEME_VERSION', $theme['Version'] );
define( 'SLCR_THEME_DIR', get_template_directory() . SCDS );
define( 'SLCR_THEME_URI', get_template_directory_uri() . SCDS );
define( 'SLCR_THEME_IMAGE_URI', get_template_directory_uri() . SCDS . 'assets' . SCDS . 'images' . SCDS ); 
define( 'SLCR_THEME_IMAGE_DIR', get_template_directory() . SCDS . 'assets' . SCDS . 'images' . SCDS  );
define( 'SLCR_THEME_CSS_DIR', get_template_directory() . SCDS . 'assets' . SCDS . 'css' . SCDS );
define( 'SLCR_THEME_CSS_URI', get_template_directory_uri() . SCDS . 'assets' . SCDS . 'css' . SCDS );
define( 'SLCR_THEME_JS_DIR', get_template_directory() . SCDS . 'assets' . SCDS . 'js' . SCDS );
define( 'SLCR_THEME_JS_URI', get_template_directory_uri() . SCDS . 'assets' . SCDS . 'js' . SCDS );
define( 'SLCR_FRAMEWORK_DIR', get_template_directory() . SCDS . 'slcr-framework' . SCDS ); 
define( 'SLCR_FRAMEWORK_URI', get_template_directory_uri() . SCDS . 'slcr-framework' . SCDS ); 
define( 'SLCR_REDUX_IMAGE_URI', get_template_directory_uri() . SCDS . 'slcr-framework' . SCDS . 'redux' . SCDS . 'assets' . SCDS . 'img' . SCDS );  
define( 'SLCR_REDUX_SECTION_DIR', get_template_directory() . SCDS . 'slcr-framework' . SCDS . 'redux' . SCDS . 'section' . SCDS );  
define( 'SLCR_ACF_GROUP_DIR', get_template_directory() . SCDS . 'slcr-framework' . SCDS . 'acf' . SCDS );   
/**
 *  Starting The Engine / Load the SlashCreative Framework ----------------
 */   
include_once( SLCR_FRAMEWORK_DIR .'slcr-init.php' );

/**
 *  This Code For get_field Function Handles if ACF Plugin  not Activacted
 */  
if (!class_exists('acf')) {
    $slcr_acf_page = ""; 
    $slcr_acf_plugin = ""; 
    if(isset($_GET['plugin'])){
        $slcr_acf_plugin = $_GET['plugin']; 
    }
    if(isset($_GET['page'])){
        $slcr_acf_page = $_GET['page'];    
    }
    
    if ($slcr_acf_plugin == "advanced-custom-fields-pro/acf.php" || $slcr_acf_plugin == "advanced-custom-fields-pro" || $slcr_acf_page == "tgmpa-install-plugins") { 
    }elseif ($slcr_acf_plugin == "tgmpa-install-plugins") {

    }elseif ($slcr_acf_plugin == "advanced-custom-fields/acf.php" || $slcr_acf_plugin == "advanced-custom-fields" || $slcr_acf_page == "tgmpa-install-plugins") {

    } else {
        function get_field($field_key, $post_id = false, $format_value = true)
        {
            if (class_exists('acf')) {
                return get_field($field_key, $post_id, $format_value);
            } else {
                return "";
            }
        }
    }
}

/**
 *  This feature allows themes to add document title tag to HTML  compatibility for older versions
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
    function slcr_slug_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
    }
    add_action( 'wp_head', 'slcr_slug_render_title' );
}