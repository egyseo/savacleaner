<?php
/** 
 * The SlashCreative Comment Settings 
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
 * Handle Slcr comment  
 */
 class Slcr_Comment {
 	
 	/**
	 * Hold an instance of Slcr_Comment class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null;  

	/**
	 *  Main Slcr_Comment instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Comment - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Comment();
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
	 * @access  private
	 * @since   1.0.0
	 * @param   string $option_name name of notice. 
	 * @return  void
	 */
	private function slcr_init_hooks() { 
		 /**
	     * Filter  Use For Move Comment Field to Bottom
	     */
	    add_filter( 'comment_form_fields', array( $this, 'slcr_move_comment_field_to_bottom' ) , 15   );

	    /**
	     * Filter  Use For Move Cookies Field to Bottom 
	     */
	    add_filter( 'comment_form_fields', array( $this, 'slcr_move_cookies_field_to_bottom' ) , 15  ); 

	     /**
         * Action  Use For Add Heading After Form
         */
        add_action( 'comment_form_logged_in_after', array( $this, 'slcr_comment_after' ) , 15 );  

	}



    /**
     *  Action  Use For Add Heading After Form  
     * @access  public
     * @since   1.0.0  
     * @return  void
     */
    public function slcr_comment_after() {
        if ( class_exists( 'WooCommerce' )) {
            if ( !is_product() ){
                echo '
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h5 class="font-700 mb-30 sub-heading single">' . esc_html__('Write a comment','moppers') . '</h5>
                    </div>
                ';
            }
        }
    }
   
    /**
     * Filter  Use For Move Comment Field to Bottom 
     * @access  public
     * @since   1.0.0  
     * @param   string $fields  
     * @return  mix
     */ 
    public function slcr_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }

    /**
     * Filter  Use For Move Cookies Field to Bottom 
     * @access  public
     * @since   1.0.0  
     * @param   string $fields  
     * @return  mix
     */ 
    public function slcr_move_cookies_field_to_bottom( $fields ) {
        if(isset($fields['cookies'])){
           $comment_field = $fields['cookies'];
            unset( $fields['cookies'] );
            $fields['cookies'] = $comment_field;
            return $fields; 
        }
    }

}

 

/**
 * Main instance of Slcr_Comment.
 *
 * Returns the main instance of Slcr_Comment to prevent the need to use globals.
 *
 * @return Slcr_Comment 
 * @since 1.0.0 
 */
function slcr_comment_filter() {
	return Slcr_Comment::slcr_instance();
}
slcr_comment_filter(); // init it