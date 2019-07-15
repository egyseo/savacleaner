<?php
/** 
 * The SlashCreative Single Post Settings 
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
 * Handle Slcr Single Post 
 */
 class Slcr_Front {
 	
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
	 *  Main Slcr_Front instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Front - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Front();
        }

        return self::$instance;
    }

    /**
     * Function for Blog Post Header
	 * @access public
	 * @since 1.0.0  
	 * @return  void
     * @param   string $p_type 
	 */
    public function slcr_404_error($p_type) { 
    	$p_type=esc_attr($p_type); ?> 
		<main class="main__content">
		    <section class="col-md-12 col-sm-12 col-xs-12">
		        <div class="row">
		        	<div class="section__404">
			            <div class="container">
			            	<div class="col-md-6">
			            		<div class="icon__404">
									<svg height="511pt" viewBox="-49 1 511 511.9987" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m377.339844 162.285156c-4.414063-90.199218-78.96875-162.285156-170.242188-162.285156-91.277344 0-165.832031 72.085938-170.246094 162.285156-20.492187 2.917969-36.351562 20.40625-36.351562 41.691406v265.730469c0 23.320313 18.972656 42.292969 42.292969 42.292969h328.605469c23.320312 0 42.292968-18.972656 42.292968-42.292969v-265.726562c0-21.289063-15.859375-38.777344-36.351562-41.695313zm-170.242188-144.320312c81.183594 0 147.769532 63.683594 152.4375 143.71875h-18c-4.640625-70.117188-63.164062-125.753906-134.4375-125.753906-71.277344 0-129.800781 55.636718-134.441406 125.753906h-18c4.667969-80.035156 71.257812-143.71875 152.441406-143.71875zm-71.863281 143.71875h-44.453125c4.613281-60.195313 54.957031-107.789063 116.316406-107.789063 61.355469 0 111.699219 47.59375 116.316406 107.789063h-144.164062c-2.929688 0-5.675781 1.429687-7.359375 3.832031l-27.671875 39.53125v-34.382813c0-4.957031-4.023438-8.980468-8.984375-8.980468zm260.492187 308.023437c0 13.417969-10.910156 24.328125-24.328124 24.328125h-328.605469c-13.417969 0-24.328125-10.910156-24.328125-24.328125v-265.726562c0-13.417969 10.910156-24.332031 24.328125-24.332031h83.460937v53.894531c0 .621093.164063 1.199219.289063 1.789062.054687.269531.050781.550781.132812.816407.3125 1.023437.785157 1.96875 1.421875 2.8125.128906.171874.308594.285156.453125.445312.550781.632812 1.167969 1.195312 1.886719 1.652344.3125.195312.644531.328125.980469.488281.375.179687.707031.433594 1.117187.5625.324219.101563.65625.078125.984375.144531.210938.042969.382813.175782.601563.203125l51.328125 6.414063-38 31.667968c-3.757813 3.132813-4.320313 8.691407-1.261719 12.507813l35.929688 44.910156c1.773437 2.21875 4.382812 3.375 7.019531 3.375 1.96875 0 3.949219-.644531 5.605469-1.96875 3.875-3.097656 4.503906-8.75 1.402343-12.625l-30.429687-38.039062 47.128906-39.273438c2.75-2.289062 3.878906-5.992187 2.867188-9.425781-1.003907-3.433594-3.953126-5.941406-7.503907-6.386719l-57.066406-7.132812 32.785156-46.832031h187.472657c13.417968 0 24.328124 10.914062 24.328124 24.332031zm0 0"/><path d="m350.816406 372.773438c0 7.441406-6.035156 13.472656-13.476562 13.472656s-13.472656-6.03125-13.472656-13.472656c0-7.441407 6.03125-13.476563 13.472656-13.476563s13.476562 6.035156 13.476562 13.476563zm0 0"/><path d="m90.324219 372.773438c0 7.441406-6.03125 13.472656-13.472657 13.472656-7.441406 0-13.476562-6.03125-13.476562-13.472656 0-7.441407 6.035156-13.476563 13.476562-13.476563 7.441407 0 13.472657 6.035156 13.472657 13.476563zm0 0"/><path d="m206.5625 385.46875c-23.472656 0-45.519531 11.507812-58.96875 30.785156-2.84375 4.070313-1.847656 9.667969 2.222656 12.507813 4.074219 2.84375 9.664063 1.835937 12.503906-2.226563 10.09375-14.464844 26.632813-23.101562 44.238282-23.101562 17.925781 0 34.640625 8.886718 44.695312 23.773437 1.738282 2.566407 4.566406 3.949219 7.453125 3.949219 1.726563 0 3.476563-.5 5.019531-1.539062 4.109376-2.78125 5.191407-8.363282 2.414063-12.472657-13.40625-19.832031-35.675781-31.675781-59.578125-31.675781zm0 0"/></svg>
								</div>
			            	</div>
			                <div class="col-md-5">
		                        <h1 class="heading__404"><?php echo esc_html__('404','moppers'); ?></h1>
		                        <h3 class="font-700"><?php echo esc_html__("Something's Wrong","moppers"); ?></h3>
		                        <p class="text__404"><?php echo esc_html__('This page is missing or you assembled the link incorrectly.','moppers'); ?></p> 
		                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary font-700 btn--lg gap-30"><?php echo esc_html__('Go Back Home','moppers'); ?></a>
			                </div>
			            </div>
			        </div>
		        </div>
		    </section>
		</main> 
		<?php
    }	 

    /**
     * Function for Get Comments & Comment Form
	 * @access public
	 * @since 1.0.0  
	 * @return  void 
	 */
    public function slcr_comment_form() { 
    	if (comments_open()) {
	    	?>
	    	<section class="col-md-12 col-sm-12 col-xs-12 mb-70">
	    		<div class="row">
			    	<div class="container">   
				        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2"> 
				            <?php comments_template(); ?>
				        </div>
				    </div>
				</div>
		    </section> <?php
	    }
    }
}

 

/**
 * Main instance of Slcr_Front.
 *
 * Returns the main instance of Slcr_Front to prevent the need to use globals.
 *
 * @return Slcr_Front 
 * @since 1.0.0 
 */
function slcr_front() {
	return Slcr_Front::slcr_instance();
}
slcr_front(); // init it