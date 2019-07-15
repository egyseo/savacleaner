<?php
/** 
 * The SlashCreative Acf Settings 
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
 * Handle Acf Settings 
 */
 class Slcr_Acf {
 	
 	/**
	 * Hold an instance of Slcr_Acf class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Acf instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Acf - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Acf();
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
		define('ACF_LITE', true); 
		if (function_exists("register_field_group")) {
			$this->slcr_acf_group();
		}
	}

	/**
	 * Register ACF Fields Group
	 * @access private
	 * @since 1.0.0  
	 * @return  void
	 */
	private function slcr_acf_group() {
 		include_once( SLCR_ACF_GROUP_DIR.'slcr-post-settings.php' ); 
 		include_once( SLCR_ACF_GROUP_DIR.'slcr-page-header.php' ); 
 		include_once( SLCR_ACF_GROUP_DIR.'slcr-page-options.php' ); 
 		include_once( SLCR_ACF_GROUP_DIR.'slcr-header-navigation.php' ); 
 		include_once( SLCR_ACF_GROUP_DIR.'slcr-footer-options.php' ); 
	}
 
}

 

/**
 * Main instance of Slcr_Acf.
 *
 * Returns the main instance of Slcr_Acf to prevent the need to use globals.
 *
 * @return Slcr_Acf 
 * @since 1.0.0 
 */
function slcr_acf() {
	return Slcr_Acf::slcr_instance();
}
slcr_acf(); // init it