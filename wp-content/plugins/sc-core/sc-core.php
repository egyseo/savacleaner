<?php
/**
 * The Slash Creative Core Plugin
 *
 * Plugin Name:     Slash Creative Core
 * Plugin URI:      https://slashcreative.co/
 * Description:     Slash Creative Core Plugin for Slash Creative Themes.
 * Author:          SlashCreative 
 * Author URI:      https://themeforest.net/user/slashcreative
 * Version:         1.1.0  
 * Text Domain:     sc-core 
 * Provides:        SlashCreative
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
    die;
}

// Plugin Folder Path.
if ( ! defined( 'SC_CORE_PATH' ) ) {
    define( 'SC_CORE_PATH', wp_normalize_path( plugin_dir_path( __FILE__ ) ) );
    define( 'SLCR_CORE_VC_ELEMENT_DIR', wp_normalize_path( plugin_dir_path( __FILE__ ) ) .'core/vc-elements/');
	define( 'SLCR_CORE_VC_ELEMENT_ICON_URI', wp_normalize_path( plugin_dir_url( __FILE__ ) ) .'/core/vc-elements/image/'); 
}

if ( !class_exists('Slcr_Core_Plugin') ) { 

    class Slcr_Core_Plugin {

        /**
         * Hold an instance of Slcr_Core_Plugin class.
         *
         * @since 1.0.0
         *
         * @access protected
         * @var string
         */
        protected static $instance = null;

        /**
         *  Main Slcr_Core_Plugin instance.
         *
         * @since 1.0.0
         *
         * @access public
         * @var string
         * @return Slcr_Core_Plugin - Main instance.
         */
        public static function instance() {
            if(null == self::$instance) {
                self::$instance = new Slcr_Core_Plugin();
            }

            return self::$instance;
        }

        /**
         * Constructor.
         *
         * @access private 
         */
        private function __construct() {

            $this->init_hooks();
        }

        /**
         * @access private
         * @since 1.0.0
         * @param string $option_name name of notice. 
         * @return  void
         */
        private function init_hooks() {
            /**
             * Admin: Theme Options. 
             */
            include_once SC_CORE_PATH . '/ReduxCore/framework.php';

            /**
             * VC Elements 
             */
            if (class_exists('Vc_Manager')) { 
                include_once( SC_CORE_PATH . '/core/slcr-core-vc.php' ); 
            } 

            /**
             * Slcr Add New  Widgets
             */ 
            add_action( 'widgets_init', array( $this, 'slcr_core_new_widget_init' ) );

            /**
             * Redirect On Plugins Activation
             */
            global $pagenow; 
            if (is_admin() && 'plugins.php' == $pagenow ){ 
                add_action( 'activated_plugin', array( $this, 'slcr_core_activation_redirect') );
            }

            /**
             * Filter For Get contents
             */
            add_filter( 'slcr_function_contents_filter', array( $this, 'slcr_core_function_contents' ) , 0, 1 );  

            /**
             * Filter For Balance Tags
             */
            add_filter( 'slcr_force_balance_tags_filter', array( $this, 'slcr_core_force_balance_tags' ) , 0, 1 );

            /**
             * Filter For Decode Content Tags
             */
            add_filter( 'slcr_decode_content_tags_filter', array( $this, 'slcr_core_decode_content_tags' ) , 0, 1 );

            /**
             * Remove Type Tag From JS and CSS Enqueue
             */
            add_filter('style_loader_tag', array( $this, 'slcr_core_remove_type_attr' ), 10, 2);
            add_filter('script_loader_tag', array( $this, 'slcr_core_remove_type_attr' ), 10, 2);

            /**
             * Load Textdomain
             */
            add_action( 'plugins_loaded', array( $this, 'slcr_core_load_textdomain' ), 10, 2);

            /**
             *  This feature allows themes to output advance code in Header
             */ 
            add_action( 'wp_head', array( $this, 'slcr_core_output_advance_code' )  , 999 );


        } 

        /**
         *  This feature allows themes to output advance code in Header
         */   
        function slcr_core_output_advance_code() {
            if(isset($GLOBALS['slcr_redux'])) {
                global $slcr_redux;
                $rget_result=array();
                if (isset($_COOKIE["PrivacyConsent"])){   
                    $rget_result = explode(',', $_COOKIE["PrivacyConsent"]); 
                }
                if(!empty($slcr_redux["general_settings_privacy_bar"])){ 
                    if(!empty($slcr_redux["general_settings_privacy_bar_google_analytics"])){
                        if (in_array('Default', $rget_result)) { 
                            if (!empty($this->slcr_core_get_option( 'general_custom_google_analytics' ))) {
                                echo $this->slcr_core_get_option( 'general_custom_google_analytics' );
                            } 
                        } 
                    }else {
                        if (!empty($this->slcr_core_get_option( 'general_custom_google_analytics' ))) {
                            echo $this->slcr_core_get_option( 'general_custom_google_analytics' );
                        } 
                    }
                    if(!empty($slcr_redux["general_settings_privacy_bar_custom_script"])){
                        if (in_array('Default', $rget_result)) { 
                            if (!empty($this->slcr_core_get_option( 'general_custom_google_webmaster_other' ))) {
                                echo $this->slcr_core_get_option( 'general_custom_google_webmaster_other' );
                            }  
                        } 
                    }else {
                        if (!empty($this->slcr_core_get_option( 'general_custom_google_webmaster_other' ))) {
                            echo $this->slcr_core_get_option( 'general_custom_google_webmaster_other' );
                        }  
                    }  
                }else {
                    if (!empty($this->slcr_core_get_option( 'general_custom_google_analytics' ))) {
                        echo $this->slcr_core_get_option( 'general_custom_google_analytics' );
                    }
                    if (!empty($this->slcr_core_get_option( 'general_custom_google_webmaster_other' ))) {
                        echo $this->slcr_core_get_option( 'general_custom_google_webmaster_other' );
                    }  
                }

                global $slcr_redux;
                $custom_css="";
                if (!empty($this->slcr_core_get_option( 'general_custom_css_custom_css' ))) {
                    $custom_css .= $this->slcr_core_get_option( 'general_custom_css_custom_css' );
                } 
                $name="inline_slcr"; 
                $value=$custom_css;
                do_action( 'wp_enqueue_scripts',$value,$name);
            }
        }

        /**
         * [slcr_core_get_option description]
         * @access public
         * @since 1.0.0 
         * @method slcr_core_get_option
         * @param  [type]           $id [description]
         * @return [type]               [description]  
         */
        public function slcr_core_get_option( $id ) {
            if(isset($GLOBALS['slcr_redux'])) {
               $options = $GLOBALS['slcr_redux'];

                if( empty( $options ) || ! isset( $options[$id] ) ) {
                    return '';
                }

                return $options[$id]; 
            } else {
                return ''; 
            }
            
        }

        /**
         * Remove Type Tag From JS and CSS Enqueue
         * @access public
         * @since 1.0.0  
         * @return  void
         */
        public function slcr_core_load_textdomain() {
            load_plugin_textdomain( 'sc-core', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
        }

        /**
         * Remove Type Tag From JS and CSS Enqueue
         * @access public
         * @since 1.0.0  
         * @return  void
         */

        public function slcr_core_remove_type_attr($tag, $handle) {
            return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
        }

        /**
         * Action  Use To Redirect On Plugins Activation 
         * @access  public
         * @since   1.0.0  
         * @param   string $plugin 
         */
        public function slcr_core_activation_redirect( $plugin ) {
            if( $plugin == plugin_basename( __FILE__ ) ) {
                exit( wp_redirect( admin_url( 'admin.php?page=slash-creative-options' ) ) );
            }
        }

        /**
         * Filter For Get contents
         * @access  public
         * @since   1.0.0  
         * @param   string $content
         * @return  mix
         */
        public function slcr_core_function_contents($content) { 
            return file_get_contents( $content );
        }

        /**
         * Filter For Balance Tags
         * @access  public
         * @since   1.0.0  
         * @param   string $content
         * @return  mix
         */
        public function slcr_core_force_balance_tags($content) { 
            return force_balance_tags( $content );
        }

        /**
         * Filter For Decode Content Tags
         * @access  public
         * @since   1.0.0  
         * @param   string $content
         * @return  mix
         */
        public function slcr_core_decode_content_tags($content) { 
            return base64_decode( $content );
        }   
        /**
         * Slcr Add New  Widgets 
         * @access public
         * @since 1.0.0  
         * @return  void
         */
        public function slcr_core_new_widget_init() {
            // Include New Widget calss 
            include_once( SC_CORE_PATH . '/core/slcr-core-custom-menu.php' );
            include_once( SC_CORE_PATH . '/core/slcr-core-footer-recent.php' );
            register_widget('Slcr_Core_Custom_Menu_Widget');
            register_widget('Slcr_Core_Footer_Recent');
        }     

        /**
         * Function for Get Sharing Data
         * @access public
         * @since 1.0.0  
         * @return  void
         */
        public function slcr_core_get_post_sharing() { 
            global $slcr_redux;
            $social_link = $slcr_redux['blog-settings-blog-single-social-link']; 
            if(has_tag()) { ?>
                <!-- Sharing -->
                <?php 
                if($social_link == true){ ?>
                    <div class="social-sharing">
                        <h5><?php echo esc_html__('Share','slcr')?>:</h5>
                        <ul>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'Share on Facebook', 'sc-core' ); ?>"><i class="socicon-facebook"></i></a></li>
                            <li><a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&amp;text= <?php the_title();?>&amp;" title="<?php echo esc_attr__( 'Share on Tweet', 'sc-core' ); ?>"><i class="socicon-twitter"></i></a></li>
                            <li><a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'Share on Google Plus', 'sc-core' ); ?>"><i class="socicon-googleplus"></i></a></li>
                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'Share on Linkedin', 'sc-core' ); ?>"><i class="socicon-linkedin"></i></a></li>
                            <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="<?php echo esc_attr__( 'Pin it', 'sc-core' ); ?>"><i class="socicon-pinterest"></i></a></li>
                            <li><a href="mailto:?Subject=<?php the_title();?>&amp;Body=<?php the_title();?> <?php echo get_permalink(); ?>" title="<?php echo esc_attr__( 'Email to someone', 'sc-core' ); ?>"><i class="socicon-mail"></i></a></li> 
                        </ul>
                    </div>
                <?php }  
            }
        }
    }

    /**
     * Main instance of Slcr_Core_Plugin.
     *
     * Returns the main instance of Slcr_Core_Plugin to prevent the need to use globals.
     *
     * @return Slcr_Core_Plugin 
     * @since 1.0.0 
     */
    function slcr_core_plugin() {
        return Slcr_Core_Plugin::instance();
    }
    slcr_core_plugin(); // init it
} 


