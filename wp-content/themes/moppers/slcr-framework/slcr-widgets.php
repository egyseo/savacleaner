<?php
/** 
 * The SlashCreative Widgets Settings 
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
 * Handle Widgets Settings 
 */
 class Slcr_Widgets {
 	
 	/**
	 * Hold an instance of Slcr_Widgets class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Widgets instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Widgets - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Widgets();
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
		add_action('widgets_init', array( $this, 'slcr_widgets_init'), 10 );   
	}

	/**
	 * Slcr Widgets Init
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_widgets_init() {
		/**
		 * Slcr Register Sidebars 
		 */
 		register_sidebar(array(
            'name'          => esc_html__('SC Main Widget Area','moppers'),
            'id'            => 'sidebar-main',
            'class'         => 'sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar.','moppers'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Woocommerce Widget Area','moppers'),
            'id'            => 'sidebar-woocommerce-main',
            'class'         => 'sidebar',
            'description'   => esc_html__('Add widgets here to appear in your Woocommerce sidebar.','moppers'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Page Widget Area','moppers'),
            'id'            => 'sidebar-page-main',
            'class'         => 'sidebar',
            'description'   => esc_html__('Add widgets here to appear in your page  sidebar.','moppers'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(array(
            'name'          => esc_html__('Blog Page Widget Area','moppers'),
            'id'            => 'sidebar-blog-page-main',
            'class'         => 'sidebar',
            'description'   => esc_html__('Add widgets here to appear in your sidebar.','moppers'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title">',
            'after_title'   => '</h3>',
        ));
        register_sidebar(
            array(
                'name'          => esc_html__('Footer Widget 1','moppers'),
                'id'            => 'custom-side-bar-1',
                'description'   => esc_html__('Custom Sidebar','moppers'), 
                'before_widget' => '<div id="%1$s" class="widget-content widget %2$s">',
                'after_widget'  => '</div>', 
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__('Footer Widget 2','moppers'),
                'id'            => 'custom-side-bar-2',
                'description'   => esc_html__('Custom Sidebar','moppers'),
                'before_widget' => '<div id="%1$s" class="widget-content widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__('Footer Widget 3','moppers'),
                'id'            => 'custom-side-bar-3',
                'description'   => esc_html__('Custom Sidebar','moppers'),
                'before_widget' => '<div id="%1$s" class="widget-content widget %2$s">',
                'after_widget'  => '</div>', 
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__('Footer Widget 4','moppers'),
                'id'            => 'custom-side-bar-4',
                'description'   => esc_html__('Custom Sidebar','moppers'),
                'before_widget' => '<div id="%1$s" class="widget-content widget %2$s">',
                'after_widget'  => '</div>', 
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        register_sidebar(
            array(
                'name'          => esc_html__('Footer Widget 5','moppers'),
                'id'            => 'custom-side-bar-5',
                'description'   => esc_html__('Custom Sidebar','moppers'),
                'before_widget' => '<div id="%1$s" class="widget-content widget %2$s">',
                'after_widget'  => '</div>', 
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
	}
}

 

/**
 * Main instance of Slcr_Widgets.
 *
 * Returns the main instance of Slcr_Widgets to prevent the need to use globals.
 *
 * @return Slcr_Widgets 
 * @since 1.0.0 
 */
function slcr_widgets() {
	return Slcr_Widgets::slcr_instance();
}
slcr_widgets(); // init it