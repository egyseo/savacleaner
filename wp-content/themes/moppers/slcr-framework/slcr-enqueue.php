<?php
/** 
 * The SlashCreative enqueue css & js
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

if( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
} 

 /**
 * Handle enqueue css & js.
 */
class Slcr_Enqueue {

    /**
     * Hold an instance of Slcr_Enqueue class.
     *
     * @since 1.0.0
     *
     * @access protected
     * @var string
     */
    protected static $instance = null;

    /**
     *  Main Slcr_Enqueue instance.
     *
     * @since 1.0.0
     *
     * @access public
     * @var string
     * @return Slcr_Enqueue - Main instance.
     */
    public static function slcr_instance() {

        if(null == self::$instance) {
            self::$instance = new Slcr_Enqueue();
        }

        return self::$instance;
    }

    /**
     * Constructor.
     *
     * @access private 
     */
    private function __construct() {

        $this->slcr_init_hooks();
    }

    /**
     * @access private
     * @since 1.0.0 
     * @return  void
     */
    private function slcr_init_hooks() {
        add_action('admin_enqueue_scripts', array( $this, 'slcr_load_admin_scripts' ), 10);
        add_action('wp_enqueue_scripts', array( $this, 'slcr_load_scripts' ), 10);
        add_action('wp_print_scripts', array( $this, 'slcr_theme_queue_js' ), 10); 
        /**
         * Print enqueue scripts in the header
         */
        add_action( 'wp_enqueue_scripts', array( $this, 'slcr_inline_style' ),100,2);

        /**
         * Print Custom Style in Head
         */
        add_action('wp_head', array( $this, 'slcr_custom_style_css' ), 50);

    }

    /**
     * Admin Enqueue Function
     * @access public
     * @since 1.0.0 
     * @return  void
     */
    public function slcr_load_admin_scripts() {
        wp_enqueue_style('slcr-admin-style', SLCR_THEME_CSS_URI .'slcr-admin-styles.css', array(), '', 'all');
        wp_enqueue_script('slcr-admin-scripts', SLCR_THEME_JS_URI .'slcr-admin-scripts.js', array('jquery'), '', true);
        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_script('media-upload');
        } 
    }

    /**
     * Front-end Enqueue Function
     * @access public
     * @since 1.0.0 
     * @return  void
     */ 
    public function slcr_load_scripts() { 
        wp_enqueue_style('bootstrap', SLCR_THEME_CSS_URI .'bootstrap-min.css', array(), '', 'all');
        wp_enqueue_style('slcr-style', SLCR_THEME_CSS_URI .'slcr-style.css', array(), '', 'all');
        wp_enqueue_style('slcr-app', SLCR_THEME_CSS_URI .'slcr-app.css', array(), '', 'all');
        global $woocommerce;
        if ($woocommerce) {
            wp_enqueue_style('slcr-shop', SLCR_THEME_CSS_URI .'slcr-shop.css', array(), '', 'all');
        }
        if( !class_exists('Slcr_Core_Plugin')) {
            wp_enqueue_style('slcr-base', SLCR_THEME_CSS_URI .'slcr-base-style.css', array(), '', 'all');
        }
        wp_enqueue_style('slcr-style-main', SLCR_THEME_URI .'style.css', array(), '', 'all');
        
        wp_enqueue_script('bootstrap', SLCR_THEME_JS_URI .'bootstrap.js', array('jquery'), '', true);
        wp_enqueue_script('isotope', SLCR_THEME_JS_URI .'isotope-pkgd-min.js', array('jquery'), '', true);
        wp_enqueue_script('wow', SLCR_THEME_JS_URI .'wow-min.js', array('jquery'), '', true);
        wp_enqueue_script('magnific-popup', SLCR_THEME_JS_URI .'magnific-popup.js', array('jquery'), '', true);
        wp_enqueue_script('spectragram', SLCR_THEME_JS_URI .'spectragram-min.js', array('jquery'), '', true);
        wp_enqueue_script('owl-carousel', SLCR_THEME_JS_URI .'owl-carousel-min.js', array('jquery'), '', true);
        wp_enqueue_script('tilt', SLCR_THEME_JS_URI .'tilt-jquery.js', array('jquery'), '', true); 
        wp_enqueue_script('imagesloaded');
        wp_enqueue_script('typed', SLCR_THEME_JS_URI .'typed-min.js', array('jquery'), '', true);
        wp_enqueue_script('slcr-map', SLCR_THEME_JS_URI .'slcr-map.js', array('jquery'), '', true);
        wp_enqueue_script('slcr-ajax', SLCR_THEME_JS_URI .'slcr-ajax.js', array('jquery'), '', true);
        wp_enqueue_script('waypoints', SLCR_THEME_JS_URI .'waypoints.js', array('jquery'), '', true);
        wp_enqueue_script('animsition', SLCR_THEME_JS_URI .'animsition.js', array('jquery'), '', true);
        wp_enqueue_script('lazyload', SLCR_THEME_JS_URI .'lazyload-min.js', array('jquery'), '', true);
        wp_enqueue_script('slcr-easy-pie-chart', SLCR_THEME_JS_URI .'easy-pie-chart.js', array('jquery'), '', true);
        wp_enqueue_script('slcr-main-script', SLCR_THEME_JS_URI .'slcr-main.js', array('jquery'), '', true);

        global $slcr_redux;
        if (!empty($slcr_redux['general_settings_typography_body_main_typography_link'])) {
            wp_enqueue_style('google-fonts-main', esc_attr($slcr_redux['general_settings_typography_body_main_typography_link']), false);
        }
        if (!empty($slcr_redux['general_settings_typography_body_main_typography_link_switch_p']) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_p'])) {
            wp_enqueue_style('google-font-p', esc_attr($slcr_redux['general_settings_typography_body_main_typography_link_p']), false);
        }
        if (!empty( $slcr_redux['general_settings_typography_body_main_typography_link_switch_h'] ) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_h'])) {
            wp_enqueue_style('google-font-h', esc_attr($slcr_redux['general_settings_typography_body_main_typography_link_h']), false);
        }  
    }

    /**
     * Front-end Enqueue custom style Function
     * @access public
     * @since 1.0.0 
     * @return  void
     */ 
    public function slcr_custom_style_css() {
        if ( class_exists( 'ReduxFramework' )) {
            include_once locate_template('assets/css/slcr-custom-style.php');
        }
    }

    /**
     * Front-end Enqueue Function
     * @access public
     * @since 1.0.0 
     * @return  void
     */ 
    public function slcr_theme_queue_js() {
        if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Front-end Enqueue Function
     * @access public
     * @since 1.0.0 
     * @return  void
     */ 
    public  function slcr_inline_style($realcss,$name= null) {  
        wp_register_style( $name, false );
        wp_enqueue_style( $name );
        wp_add_inline_style( $name, $realcss ); 

    }
}


/**
 * Main instance of Slcr_Enqueue.
 *
 * Returns the main instance of Slcr_Enqueue to prevent the need to use globals.
 *
 * @return Slcr_Enqueue 
 * @since 1.0.0 
 */
function slcr_enqueue() {
    return Slcr_Enqueue::slcr_instance();
}
slcr_enqueue();
