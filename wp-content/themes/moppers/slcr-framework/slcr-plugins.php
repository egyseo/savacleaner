<?php
/** 
 * The SlashCreative Plugin Settings 
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
 * Handle Plugin Settings 
 */
 class Slcr_Plugin {
 	
 	/**
	 * Hold an instance of Slcr_Plugin class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Plugin instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Plugin - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Plugin();
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
	 * @param string $option_name name of notice. 
	 * @return  void
	 */
	private function slcr_init_hooks() {
		 /**
		 * Include the TGM_Plugin_Activation class. 
		 */
		include_once( SLCR_FRAMEWORK_DIR . 'extensions/plugin-activation/class-tgm-plugin-activation.php' );
		add_action( 'tgmpa_register', array( $this, 'slcr_register_required_plugins' ), 40 ); 
		$this->slcr_redirect_tgmpa_plugins();

	}

	/**
	 * Register Required Plugins
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_register_required_plugins() {
 		$plugins = array(
			// include a plugin from the WordPress Plugin Repository
			array(
		        'name'              => esc_html__('Slash Creative Core','moppers'),
		        'slug'              => 'sc-core', 
		        'source'            => SLCR_FRAMEWORK_DIR . 'plugins/sc-core.zip',
		        'version'           => '1.1.0',
		        'required'          => true,
	    	),
			array(
				'name' 		=> esc_html__('Woocommerce','moppers'),
				'slug' 		=> 'woocommerce',
				'required' 	=> false,
			),
			array(
				'name' 		=> esc_html__('Contact Form 7','moppers'),
				'slug' 		=> 'contact-form-7',
				'required' 	=> false,
			),
			array(
				'name' 		=> esc_html__('Autoptimize','moppers'),
				'slug' 		=> 'autoptimize',
				'required' 	=> false,
			),
			array(
	            'name'               => esc_html__('WPBakery Visual Composer','moppers'),
	            'slug'               => 'js_composer',
	            'source'             => SLCR_FRAMEWORK_DIR . 'plugins/js_composer.zip',
	            'required'           => true,
	            'version'            => '6.0.3', 
	        ),
			array(
	            'name'          	=> esc_html__('Advanced Custom Fields Pro','moppers'), 
	            'slug'          	=> 'advanced-custom-fields-pro', 
	            'source'            => SLCR_FRAMEWORK_DIR . 'plugins/advanced-custom-fields-pro.zip', 
	            'required'          => true, 
	            'version'           => '5.8.0', 
	        ), 
		); 
		$config = array(
			'id'           => 'tgmpa',                 
			'default_path' => '',                      
			'menu'         => 'tgmpa-install-plugins', 
			'parent_slug'  => 'themes.php',            
			'capability'   => 'edit_theme_options',   
			'has_notices'  => true,                    
			'dismissable'  => true,                    
			'dismiss_msg'  => '',                     
			'is_automatic' => false,                   
			'message'      => '',                     
		);
		 
		tgmpa( $plugins, $config );
	}

	/**
	 * After Activation Redirect To Tgmpa Plugins Page
	 * @access protected
	 * @since 1.0.0  
	 * @return  void
	 */
	protected function slcr_redirect_tgmpa_plugins() {
		global $pagenow;
		if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) {
		    if (!class_exists('WooCommerce')) {
		        wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins"));
		    }
		    elseif (!class_exists('acf')) {
		        wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins"));
		    }
		    elseif (!class_exists('Vc_Manager')) {
		        wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins"));
		    }
		    elseif (!class_exists('RevSlider')) {
		        wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins"));
		    }
		    elseif (!class_exists('slash_creative_theme_functions')) {
		        wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins"));
		    }
		}  
		if (is_admin() && 'themes.php' == $pagenow && isset($_GET['tgmpa-activate'])) { 
		    if($_GET['page']=="tgmpa-install-plugins" && $_GET['plugin']=="sc-core" && $_GET['tgmpa-activate']=="activate-plugin"){
		        function slcr_redux_admin_notice() {
		            echo '<div id="message" class="updated slcr_sc_admin_notice" data-rurl-redux="'.admin_url("admin.php?page=slash-creative-options&tab=0").'"><p>'.esc_html__('Slash Creative Core is activated click here to custmize website','moppers').' <a href="'.admin_url("admin.php?page=slash-creative-options&tab=0").'">'.esc_html__('Click here','moppers').'</a>.</p></div>'; 
		        }
		        add_action( 'admin_notices', 'slcr_redux_admin_notice' );
		    }
		} 
	}
}

 

/**
 * Main instance of Slcr_Plugin.
 *
 * Returns the main instance of Slcr_Plugin to prevent the need to use globals.
 *
 * @return Slcr_Plugin 
 * @since 1.0.0 
 */
function slcr_plugin() {
	return Slcr_Plugin::slcr_instance();
}
slcr_plugin(); // init it