<?php
/** 
 * The SlashCreative Vc Element  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.0.0
 */

if( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
 
 /**
 * Vc Element  
 */
 class Slcr_Core_Vc {
 	
 	/**
	 * Hold an instance of Slcr_Core_Vc class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null; 
	 
	/**
	 *  Main Slcr_Core_Vc instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Core_Vc - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Core_Vc();
        }

        return self::$instance;
    }

	/**
	 * Constructor.
	 *
	 * @access private 
	 */
	private function __construct() {

		$this->slcr_core_init_hooks();
	}

	/**
	 * @access private
	 * @since 1.0.0
	 * @param string $option_name name of notice. 
	 * @return  void
	 */
	private function slcr_core_init_hooks() {
		add_action('vc_before_init', array( $this, 'slcr_core_vc_before_init' ), 11);
		add_action('vc_after_init', array( $this, 'slcr_core_vc_lean_map' ), 11); 
		add_action('vc_after_init', array( $this, 'slcr_core_vc_set_template' ), 11); 

		//add new google fonts
    	add_filter('vc_google_fonts_get_fonts_filter', array( $this, 'slcr_core_add_new_vc_fonts' ) );
	}

	/**
	 * Vc Element  Set Shortcodes Templates
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_core_vc_before_init() { 
         vc_set_shortcodes_templates_dir( SLCR_CORE_VC_ELEMENT_DIR . 'shortcodes');
	}

	/**
	 * Vc Element  Set Shortcodes Templates
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_core_vc_lean_map() { 
		/**
         * Override Default vc functionality
         * Add extra features in default elements
         */
        if (function_exists('vc_remove_param'))
        { 
            vc_remove_param('vc_column', 'css_animation');
            vc_remove_param('vc_column', 'el_id');
            vc_remove_param('vc_column', 'el_class');
            vc_remove_param('vc_column', 'css');
            vc_remove_param('vc_column', 'offset');
            vc_remove_param('vc_column', 'width');
            vc_remove_param('vc_row', 'full_width');
            vc_remove_param('vc_row', 'gap');
            vc_remove_param('vc_row', 'full_height');
            vc_remove_param('vc_row', 'columns_placement');
            vc_remove_param('vc_row', 'equal_height');
            vc_remove_param('vc_row', 'content_placement');
            vc_remove_param('vc_row', 'video_bg');
            vc_remove_param('vc_row', 'video_bg_url');
            vc_remove_param('vc_row', 'video_bg_parallax');
            vc_remove_param('vc_row', 'parallax');
            vc_remove_param('vc_row', 'parallax_image');
            vc_remove_param('vc_row', 'parallax_speed_video');
            vc_remove_param('vc_row', 'parallax_speed_bg');
            vc_remove_param('vc_row', 'el_id');
            vc_remove_param('vc_row', 'css_animation');
            vc_remove_param('vc_row', 'disable_element');
            vc_remove_param('vc_row', 'el_class');
            vc_remove_param('vc_row', 'css');    
        } 
        // Add New parameter in vc
        vc_add_shortcode_param('radio_image_box' ,array( $this, 'slcr_core_radio_image_settings_field' ));

        // Override vc_map for some elements
        vc_lean_map('vc_tta_tabs', null, SLCR_CORE_VC_ELEMENT_DIR . 'vc-map/slcr-core-map-vc-tabs.php');
        vc_lean_map('vc_tta_accordion', null, SLCR_CORE_VC_ELEMENT_DIR . 'vc-map/slcr-core-map-vc-accordion.php');
        vc_lean_map('vc_btn', null, SLCR_CORE_VC_ELEMENT_DIR . 'vc-map/slcr-core-map-vc-btn.php');
        vc_lean_map('vc_custom_heading', null, SLCR_CORE_VC_ELEMENT_DIR . 'vc-map/slcr-core-map-vc-custom-heading.php');
        vc_lean_map('vc_icon', null, SLCR_CORE_VC_ELEMENT_DIR . 'vc-map/slcr-core-map-vc-icon.php');     
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'vc-map/slcr-core-map-vc-column.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'vc-map/slcr-core-map-vc-row.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'vc-map/slcr-core-map-vc-single-image.php' ); 

        vc_lean_map('slcr_team', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-team-member.php');       
        vc_lean_map('team_member_item', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-team-members-item.php');        
        vc_lean_map('slcr_testimonial', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-testimonial.php');        
        vc_lean_map('testimonials', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-testimonials-item.php');        
        vc_lean_map('slcr_box', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-box.php');        
        vc_lean_map('slcr_carousel', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-carousel.php');        
        vc_lean_map('slcr_icon', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-icon-boxes.php');        
        vc_lean_map('slcr_icon_text', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-icon-text.php'); 
        vc_lean_map('slcr_price', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-price-list.php');               
        vc_lean_map('slcr_price_item', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-price-list-item.php');
        vc_lean_map('pricing_table', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-pricing-table.php');
        vc_lean_map('slcr_counter', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-counter.php');
        vc_lean_map('slcr_image_hotspot', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-image-hotspot.php');
        vc_lean_map('slcr_hotspot', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-hotspot.php');
        vc_lean_map('slcr_image_comparison', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-image-comparison.php');
        vc_lean_map('slcr_progress_bars', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-progress-bars.php');
        vc_lean_map('slcr_instagram_feed', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-insta-feed.php');
        vc_lean_map('slcr_typed_text', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-typed-text.php');
        vc_lean_map('slcr_text_links', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-text-links.php');
        vc_lean_map('slcr_dropcap', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-dropcap.php');
        vc_lean_map('slcr_alert', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-alert.php');
        vc_lean_map('slcr_notifications', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-notifications.php');
        vc_lean_map('slcr_radial', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-radial.php');
        vc_lean_map('slcr_text_reveal', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-text-reveal.php');
        vc_lean_map('slcr_video_modal', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-video-modals.php');
        vc_lean_map('slcr_accordion_data', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-accordion-data.php');
        vc_lean_map('slcr_blog_grid', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-blog-grid.php');
        vc_lean_map('slcr_google_map', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-google-map.php');
        vc_lean_map('slcr_service_box', null, SLCR_CORE_VC_ELEMENT_DIR . 'sc-map/slcr-core-service-box.php');    
	}

    /**
     * Vc Element  Set New Templates
     * Add extra features in vc elements
     * @access public
     * @since 1.0.0  
     * @return  void
     */
    public function slcr_core_vc_set_template() {  
        
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-team-member.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-team-members-item.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-testimonial.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-testimonials-item.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-box.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-carousel.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-icon-boxes.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-icon-text.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-price-list.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-price-list-item.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-pricing-table.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-counter.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-image-hotspot.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-hotspot.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-image-comparison.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-progress-bars.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-insta-feed.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-typed-text.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-text-links.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-dropcap.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-alert.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-notifications.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-radial.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-text-reveal.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-video-modals.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-accordion-data.php' );    
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-blog-grid.php' );  
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-google-map.php' );
        include_once( SLCR_CORE_VC_ELEMENT_DIR.'slcr-core-service-box.php' );
        
    }

    /**
	 * Add New Google Fonts 
	 * @access public
	 * @since 1.0.0  
	 * @return  Mix
	 */
    public function slcr_core_add_new_vc_fonts( $fonts_list ) {
        $poppins->font_family = 'Poppins';
        $poppins->font_types = '100 light regular:100:normal,100 light italic:100:italic,300 light regular:300:normal,300 light italic:300:italic,400 regular:400:normal,400 italic:400:italic,500 bold regular:500:normal,500 bold italic:500:italic,700 bold regular:700:normal,700 bold italic:700:italic,900 bold regular:900:normal,900 bold italic:900:italic';
        $poppins->font_styles = 'regular';
        $poppins->font_family_description = esc_html_e( 'Select font family','sc-core' );
        $poppins->font_style_description = esc_html_e( 'Select font styling','sc-core' );
        $fonts_list[] = $poppins;
        return $fonts_list;
    }

    /**
     * create image radio button param in visual composer
     * Add extra features in vc Row element
     * @access public
     * @since 1.0.0  
     * @return  mix
     * @param  array     $settings 
     * @param  string    $value   
     */
    public function slcr_core_radio_image_settings_field($settings, $value) {
            $dependency = '';
            $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
            $type = isset($settings['type']) ? $settings['type'] : '';
            $options = isset($settings['options']) ? $settings['options'] : ''; 
            $class = isset($settings['class']) ? $settings['class'] : ''; 
            $uni = uniqid();
            $output = '';
            $output = '<input id="radio_image_setting_val_'.$uni.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . ' '.$value.' vc_ug_gradient" name="' . $param_name . '"  style="display:none"  value="'.$value.'" '.$dependency.'/>';
            $output .= '<div class="slcr-radio-image-box" data-uniqid="'.$uni.'">'; 
                foreach($options as $key => $img_url)
                {
                    if($value == $key){
                        $checked = 'checked';
                    }
                    else{
                        $checked = ''; 
                    }
                    $output .= '<label class="vc_column vc_col-sm-6 selection">
                        <input type="radio" name="radio_image_'.$uni.'" '.$checked.' class="radio_pattern_image" value="'.$key.'" />
                        <img src="'.$img_url.'" class="pattern-background" alt="slcr row shapes" />
                    </label>';
                }
            $output .= '</div>'; 
            $output .= '<script type="text/javascript">
                jQuery(".radio_pattern_image").change(function(){
                    var radio_id = jQuery(this).parent().parent().data("uniqid");
                    var val = jQuery(this).val();
                    jQuery("#radio_image_setting_val_"+radio_id).val(val);
                });
            </script>';
            return $output;
    }
}

 

/**
 * Main instance of Slcr_Core_Vc.
 *
 * Returns the main instance of Slcr_Core_Vc to prevent the need to use globals.
 *
 * @return Slcr_Core_Vc 
 * @since 1.0.0 
 */
function slcr_core_vc() {
	return Slcr_Core_Vc::slcr_instance();
}
slcr_core_vc(); // init it 
