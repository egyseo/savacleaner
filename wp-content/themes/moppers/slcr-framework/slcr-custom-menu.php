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
 class Slcr_Custom_Menu {
 	
 	/**
	 * Hold an instance of Slcr_Custom_Menu class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Custom_Menu instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Custom_Menu - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Custom_Menu();
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
		add_action('init', array( $this, 'slcr_register_theme_menus' ), 8, 4); 

		// include menu calsses
		require_once( SLCR_FRAMEWORK_DIR . 'extensions/custom-menu/slcr-menu-classes.php' );
		//menu button style option
		require_once( SLCR_FRAMEWORK_DIR . 'extensions/custom-menu/menu-item-custom-fields.php');

		global $slcr_custom_menu_fields;
		/**
		 * Menu Button Style Option
		 */
		add_action('wp_nav_menu_item_custom_fields', array( $this, 'slcr_nav_button_style' ), 10, 4);
	    $slcr_custom_menu_fields = array(
	        'slcr-menu-item-button-style' => '',
	    );
	    /**
		 *  Button Style Update 
		 */
    	add_action('wp_update_nav_menu_item', array( $this, 'slcr_nav_button_style_update' ), 10, 3);
		
	}

	/**
	 * Register Theme Menu
	 * @access public
	 * @since 1.0.0 
	 * @return  void
	 */ 
	public function slcr_register_theme_menus()
    {
        register_nav_menus(
            array(
                'main-menu' => __('Main Menu','moppers'),
                'secondary-menu' => __('Secondary Menu ','moppers').'<br /> <small>'.__('Right Side Aligned Menu.','moppers').'<br>'.__('Main & Secondary Menu should not be same.','moppers').'</small>', 
            )
        );
    }

	/**
	 * Menu Button Style Option
	 * @access public
	 * @since 1.0.0
	 * @param string $output $item $depth $args .  
	 * @return  mix
	 */ 
	public function slcr_nav_button_style($output, $item, $depth, $args)
    {
        $item_id = $item->ID;
        $name    = "slcr-menu-item-button-style";
        $value   = get_post_meta($item_id, $name, true);
        ?>
        <p class="description description-wide"><?php echo esc_html__('Enable','moppers'); ?> <strong><?php echo esc_html__('CSS Classes','moppers'); ?></strong> <?php echo esc_html__('from the','moppers'); ?> <strong><?php echo esc_html__('Screen Options','moppers'); ?></strong> <?php echo esc_html__('on the top of the page to use following classes.','moppers'); ?> <br><br> <?php echo esc_html__('mega__dropdown col__4 for enabling Mega Menu.','moppers'); ?> <br> <?php echo esc_html__('hide__label for hiding label of Menu Item.','moppers'); ?> <br> <?php echo esc_html__('make__title to turn the label into Custom Title','moppers'); ?></p>
        <p class="description description-wide">
            <label for="<?php echo esc_attr($name) . "-" . esc_attr($item_id); ?>">
                <?php echo esc_html(__('Menu Item Style','moppers')); ?> <br />
                <select id="<?php echo esc_attr($name) . "-" . esc_attr($item_id); ?>" class="widefat edit-menu-item-target" name="<?php echo esc_attr($name . "[" . $item_id . "]"); ?>">
                    <option value="" <?php selected(esc_attr($value), '');?>><?php echo esc_html(__('Default','moppers')); ?> </option>
                    <option value="Simple_button" <?php selected(esc_attr($value), 'Simple_button');?>><?php echo esc_html(__('Simple button','moppers')); ?> </option>
                    <option value="Bordered_button" <?php selected(esc_attr($value), 'Bordered_button');?>><?php echo esc_html(__('Bordered button','moppers')); ?> </option>
                </select>
            </label>
        </p>
	    <?php 
	}

	/**
	 * Update Button Style 
	 * @access public
	 * @since 1.0.0
	 * @param string $menu_item_args. 
	 * @param int $menu_id $menu_item_db_id. 
	 * @return  mix
	 */ 
	public function slcr_nav_button_style_update($menu_id, $menu_item_db_id, $menu_item_args)
    {
        $current_screen = get_current_screen();

        //fix auto add new pages to top nav
        $on_post_type = ($current_screen && isset($current_screen->post_type) && !empty($current_screen->post_type)) ? true : false;

        global $slcr_custom_menu_fields;

        if (defined('DOING_AJAX') && DOING_AJAX || $on_post_type) {
            return;
        }
        if(!isset($_GET['import'])){
        	check_admin_referer('update-nav_menu', 'update-nav-menu-nonce');	
        }

        foreach ($slcr_custom_menu_fields as $key => $label) {
            if (!empty($_POST[$key][$menu_item_db_id])) {
                $value = sanitize_text_field($_POST[$key][$menu_item_db_id]);
            } else {
                $value = null;
            }
            if (!is_null($value)) {
                update_post_meta($menu_item_db_id, $key, $value);
            } else {
                delete_post_meta($menu_item_db_id, $key);
            }
        }
    }
}

/**
 * Main instance of Slcr_Custom_Menu.
 *
 * Returns the main instance of Slcr_Custom_Menu to prevent the need to use globals.
 *
 * @return Slcr_Custom_Menu 
 * @since 1.0.0 
 */
function slcr_custom_menu() {
	return Slcr_Custom_Menu::slcr_instance();
}
slcr_custom_menu(); // init it