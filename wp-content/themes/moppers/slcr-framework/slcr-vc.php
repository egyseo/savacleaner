<?php
/** 
 * The SlashCreative Vc Element  
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
 * Vc Element  
 */
 class Slcr_Vc {
 	
 	/**
	 * Hold an instance of Slcr_Vc class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null; 
	 
	/**
	 *  Main Slcr_Vc instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Vc - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Vc();
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
		//add icons packs	
		add_filter('init', array( $this, 'slcr_add_new_icon_set_to_iconbox' ), 40);
	}

	/**
	 * Add New Icon Set To Iconbox
	 * Add extra features in vc 
	 * @access public
	 * @since 1.0.0  
	 * @return  void 
	 */
	public function slcr_add_new_icon_set_to_iconbox() {  
			$icons_name = "flaticon";
		    $param = WPBMap::getParam( 'vc_icon', 'type' );
	        $param['value'][__( 'Custom Pack', 'moppers' )] = $icons_name;
	        vc_update_shortcode_param( 'vc_icon', $param ); 
	        // list of icons that add 
	        add_filter( 'vc_iconpicker-type-flaticon', array( $this, 'slcr_add_icon_array' ), 15 ); 
	        add_action( 'vc_base_register_front_css', array( $this, 'slcr_vc_iconpicker_base_register_css' ), 15 );
    		add_action( 'vc_base_register_admin_css', array( $this, 'slcr_vc_iconpicker_base_register_css' ), 15 );

    		add_action( 'vc_backend_editor_enqueue_js_css', array( $this, 'slcr_vc_iconpicker_editor_css' ), 15 );
    		add_action( 'vc_frontend_editor_enqueue_js_css', array( $this, 'slcr_vc_iconpicker_editor_css' ), 15 );
    }

    /**
	 *  update old Icons list
	 * @access public
	 * @since 1.0.0  
	 * @return  array
	 */
	public function slcr_add_icon_array($icons) {   
    	$array_list = array(
    		'Flaticon Icons' => array(
	            array('flaticon-001-wipes' => 'Wipes'),
	            array('flaticon-002-window' => 'Window'),
	            array('flaticon-003-wet-floor' => 'Wet floor'),  
	            array('flaticon-004-washing-machine' => 'Washing Machine'),
	            array('flaticon-005-washing-clothes' => 'Washing Clothes'),
	            array('flaticon-006-wash' => 'Wash'),
	            array('flaticon-007-vacuum-1' => 'Vacuum'),
	            array('flaticon-008-trash-can' => 'Trash Can'),
	            array('flaticon-009-towel' => 'Towel'),
	            array('flaticon-010-toothbrush' => 'Toothbrush'),
	            array('flaticon-011-paper-roll' => 'Paper Roll'),
	            array('flaticon-012-toilet' => 'Toilet'),
	            array('flaticon-013-sponge' => 'Sponge'),
	            array('flaticon-014-soap' => 'Soap'),
	            array('flaticon-015-plunger' => 'Plunger'),
	            array('flaticon-016-mop' => 'Mop'),
	            array('flaticon-017-iron' => 'Iron'),
	            array('flaticon-018-housekeeping' => 'House Keeping'),
	            array('flaticon-019-hose' => 'Hose'),
	            array('flaticon-020-hanger' => 'Hanger'),
	            array('flaticon-021-hand-wash' => 'Hand Wash'),
	            array('flaticon-022-vacuum' => 'Vacuum'),
	            array('flaticon-023-gloves' => 'Gloves'),
	            array('flaticon-024-dustpan' => 'Dustpan'),
	            array('flaticon-025-duster' => 'Duster'),
	            array('flaticon-026-dry' => 'Dry'),
	            array('flaticon-027-dishwasher' => 'Dish Washer'),
	            array('flaticon-028-detergent' => 'Detergent'),
	            array('flaticon-029-clothes' => 'Clothes'),
	            array('flaticon-030-cleaning-spray' => 'Cleaning Spray'),
	            array('flaticon-031-cleaning' => 'Cleaning'),
	            array('flaticon-032-cleaner' => 'Cleaner'),
	            array('flaticon-033-bucket' => 'Bucket'),
	            array('flaticon-034-brush' => 'Brush'),
	            array('flaticon-035-broom' => 'Broom'),
	            array('flaticon-036-bathtub' => 'Bathtub'),
	        ),
			'Wiping Icons' => array(
				array('icon-leaves' => 'Leaves'),
	            array('icon-washing-hand' => 'Washing Hand'),
	            array('icon-wiping-brush' => 'Wiping Brush'), 
	            array('icon-wiping-dustpan' => 'Wiping Dustpan'),
	            array('icon-wiping-dustpan-1' => 'Wipingicon Dustpan 1'),
	            array('icon-wiping-gloves-black-pair' => 'Gloves Black Pair'),
	            array('icon-wiping-iron' => 'Wiping Iron'),
	            array('icon-wiping-soap' => 'Wiping Soap'),
	            array('icon-wiping-sponge-tool' => 'Wiping Sponge Tool'),
	            array('icon-wiping-sprayer' => 'Wiping Sprayer'),
	            array('icon-wiping-sprayer-tool' => 'Wiping Sprayer Tool'),
	            array('icon-wiping-swipe-for-floors' => 'Wiping Swipe For Floors'),
	            array('icon-wiping-towel-on-a-hanger' => 'Wiping Towel On a Hanger'),
	            array('icon-wiping-trash-bag-with-recycle-symbol-of-arrows-triangle' => 'Wiping Trash Bag With Recycle Symbol Of Arrows Triangle'),
	            array('icon-wiping-trash-can' => 'Wiping Trash Can'),
	            array('icon-wiping-trash-container' => 'Wiping Trash Container'),
	            array('icon-wiping-tray-tool' => 'Wiping Tray Tool'),
	            array('icon-wiping-utensils-of-bathroom' => 'Wiping Utensils Of Bathroom'),
	            array('icon-wiping-vacuum-tool' => 'Wiping Vacuum Tool'),
	            array('icon-wiping-woman-head' => 'Wiping Woman Head'), 
	        ),
        );	 
	    return array_merge( $icons, $array_list ); 
	}

	/**
	 *  Register Backend and Frontend CSS Styles 
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_vc_iconpicker_base_register_css() {    
        wp_register_style('flaticon', SLCR_THEME_CSS_URI . 'flaticon' . SCDS . 'flaticon.css'); 
        wp_register_style('wiping', SLCR_THEME_CSS_URI . 'wiping' . SCDS . 'wiping.css'); 
	}

	/**
	 *  Enqueue Backend and Frontend CSS Styles 
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_vc_iconpicker_editor_css($font){   
        wp_enqueue_style('flaticon');
        wp_enqueue_style('wiping');
    }

    /**
	 *  Enqueue CSS in Frontend when it's used 
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_enqueue_font_css($font){   
			switch ( $font ) {
	            case 'flaticon' : 
	            	wp_enqueue_style('flaticon');
       				wp_enqueue_style('wiping');
       			break;
	        }
    }  
}

 

/**
 * Main instance of Slcr_Vc.
 *
 * Returns the main instance of Slcr_Vc to prevent the need to use globals.
 *
 * @return Slcr_Vc 
 * @since 1.0.0 
 */
function slcr_vc() {
	return Slcr_Vc::slcr_instance();
}
slcr_vc(); // init it 
