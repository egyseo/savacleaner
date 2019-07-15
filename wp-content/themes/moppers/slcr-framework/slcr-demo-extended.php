<?php
/** 
 * The SlashCreative Demo Extended Settings 
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
 * Handle Demo Extended Settings
 */
 class Slcr_Demo_Extended  {
 	
 	/**
	 * Hold an instance of Slcr_Demo_Extended class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Demo_Extended instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Demo_Extended - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Demo_Extended();
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
         * Change the path to the directory that contains demo data folders.
         */
        add_filter('wbc_importer_dir_path', array( $this, 'slcr_change_demo_directory_path'), 10 );

        /**
         * Way to set menu, import revolution slider, and set home page.
         */
        add_action('wbc_importer_after_content_import', array( $this, 'slcr_demo_active_extended'), 10, 2);


	}

    /**
     * Change the path to the directory that contains demo data folders.
     * @access public
     * @since 1.0.0
     * @param [string] $demo_directory_path
     * @return [string]
     */
    public function slcr_change_demo_directory_path( $demo_directory_path ) {
        $demo_directory_path = SLCR_FRAMEWORK_DIR .'redux/demo-data/';
        return $demo_directory_path;
    }

    /**
     * Way to set menu, import revolution slider, and set home page.
     * @access public
     * @since 1.0.0
     * @param [string] $demo_directory_path
     * @return [string]
     */
    public function slcr_demo_active_extended($demo_active_import, $demo_directory_path)
    {
        reset($demo_active_import);
        $current_key = key($demo_active_import);
        // if  Main demo import
        $wbc_menu_array = array('Main Demo');
        if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && in_array($demo_active_import[$current_key]['directory'], $wbc_menu_array)) {
            $main_menu      = get_term_by('name', 'Main Menu', 'nav_menu');
            $secondary_menu = get_term_by('name', 'Menu Buttons', 'nav_menu');
            if (isset($main_menu->term_id) && isset($secondary_menu->term_id)) {
                set_theme_mod('nav_menu_locations', array(
                    'main-menu'      => $main_menu->term_id,
                    'secondary-menu' => $secondary_menu->term_id,
                )
                );
            }
        }
        // array of Main demo homepages  and Blog page
        $wbc_home_pages = array(
            'Main Demo' => 'Home',
        );
        if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_home_pages)) {
            $page = get_page_by_title($wbc_home_pages[$demo_active_import[$current_key]['directory']]);
            if (isset($page->ID)) {
                update_option('page_on_front', $page->ID);
                update_option('show_on_front', 'page');
            }
        }
        $wbc_blog_pages = array(
            'Main Demo' => 'Blog',
        );
        if (isset($demo_active_import[$current_key]['directory']) && !empty($demo_active_import[$current_key]['directory']) && array_key_exists($demo_active_import[$current_key]['directory'], $wbc_blog_pages)) {
            $page = get_page_by_title($wbc_blog_pages[$demo_active_import[$current_key]['directory']]);
            if (isset($page->ID)) {
                update_option('page_for_posts', $page->ID);
            }
        } 
    } 
}

 

/**
 * Main instance of Slcr_Demo_Extended.
 *
 * Returns the main instance of Slcr_Demo_Extended to prevent the need to use globals.
 *
 * @return Slcr_Demo_Extended 
 * @since 1.0.0 
 */
function slcr_demo_extended() {
	return Slcr_Demo_Extended::slcr_instance();
}
slcr_demo_extended(); // init it