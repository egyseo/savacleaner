<?php
/** 
 * The SlashCreative initiate the theme engine  
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
 * Handle initiate the theme engine.
 */
class Slcr_Theme {
 	
 	/**
	 * Hold an instance of Slcr_Theme class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Theme instance.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 * @return Slcr_Theme - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Theme();
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
 
		add_action( 'after_setup_theme', array( $this, 'slcr_includes' ),10);
		add_action( 'after_setup_theme', array( $this, 'slcr_setup_theme' ),5); 

	}

	/**
	 * Slcr Theme Setup
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_setup_theme() {
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support("title-tag"); 
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.WordPress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.WordPress.org/themes/functionality/post-formats/
		 */
		add_theme_support('post-formats', array('link', 'video', 'audio'));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
		/*
		 *  Gutenberg Support 
		 */
		add_theme_support( 'align-wide' ); 
		/*
		 *  woocommerce support 
		 */ 
		add_theme_support( 'woocommerce' ); 

		/*
		 *  Support Feed Links
		 */
		add_theme_support( 'automatic-feed-links' );

		// Adjust the content-width.
		$GLOBALS['content_width'] = apply_filters( 'content_width', 600 );

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */  
		 
		load_theme_textdomain( 'moppers', WP_LANG_DIR . 'themes/' ); // From Wp-Content
        load_theme_textdomain( 'moppers', get_stylesheet_directory()  . '/languages' ); // From Child Theme
        load_theme_textdomain( 'moppers', SLCR_THEME_DIR . 'languages' ); // From Parent Theme

		/*
		 * Set Next Previous Link .
		 */
		$defaults = array(
		        'before'           => '<p>' . __( 'Pages:','moppers' ),
		        'after'            => '</p>',
		        'link_before'      => '',
		        'link_after'       => '',
		        'next_or_number'   => 'number',
		        'separator'        => ' ',
		        'nextpagelink'     => __( 'Next page','moppers'),
		        'previouspagelink' => __( 'Previous page','moppers' ),
		        'pagelink'         => '%',
		        'echo'             => 1
		    );

		wp_link_pages( $defaults );

	}

	/**
	 * includes files
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_includes() {

		//load redux data files
		if ( class_exists( 'ReduxFramework' )) {
		    include_once( SLCR_FRAMEWORK_DIR . 'redux/slcr-config.php' );
		} else {
			include_once( SLCR_FRAMEWORK_DIR . 'slcr-base.php' );    
		}
		if (class_exists('Vc_Manager')) { 
			include_once( SLCR_FRAMEWORK_DIR . 'slcr-vc.php' ); 
		} 
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-enqueue.php' );  
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-acf.php' ); 
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-plugins.php' );
		if ( class_exists( 'WooCommerce' )) {
		    include_once( SLCR_FRAMEWORK_DIR . 'slcr-woo.php' );
		}   
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-custom-menu.php' );
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-widgets.php' );
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-demo-extended.php' );
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-actions-filters.php' );
		include_once( SLCR_FRAMEWORK_DIR . 'slcr-helper.php' );
	}
 
}

 

/**
 * Main instance of Slcr_Theme.
 *
 * Returns the main instance of Slcr_Theme to prevent the need to use globals.
 *
 * @return Slcr_Theme 
 * @since 1.0.0 
 */
function slcr_inst() {
	return Slcr_Theme::slcr_instance();
}
slcr_inst(); // init it