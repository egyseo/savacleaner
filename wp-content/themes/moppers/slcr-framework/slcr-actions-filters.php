<?php
/** 
 * The SlashCreative Slcr Action & Filters 
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
 * Handle Slcr Action & Filters 
 */
 class Slcr_Action_Filters {
 	
 	/**
	 * Hold an instance of Slcr_Action_Filters class.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected static $instance = null;

	/**
	 *  Main Slcr_Action_Filters instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 * @return Slcr_Action_Filters - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Action_Filters();
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
	 	 * Required Actions for Theme
	 	 */
    	add_action( 'after_setup_theme', array( $this, 'slcr_image_size_add' ), 10 );

        /**
         * Ajax Action for Blog
         *
         */ 
        add_action('wp_ajax_slcr_posts_by_ajax', array( $this, 'slcr_load_posts_by_ajax_callback' ) );
        add_action('wp_ajax_nopriv_slcr_posts_by_ajax', array( $this, 'slcr_load_posts_by_ajax_callback' ) );

        /**
         * Ajax Action for Woo Cart
         *
         */ 
        add_action('wp_ajax_nopriv_slcr_ajax_cart', array( $this, 'slcr_ajax_cart' ) );
        add_action('wp_ajax_slcr_ajax_cart', array( $this, 'slcr_ajax_cart' ) );

        /**
         * Ajax Action for Woo Cart List
         *
         */ 
        add_action('wp_ajax_nopriv_slcr_ajax_cart_list', array( $this, 'slcr_ajax_cart_list' ) );
        add_action('wp_ajax_slcr_ajax_cart_list', array( $this, 'slcr_ajax_cart_list' ) );
    	/**
	 	 * Required Filter for Theme
	 	 */
    	add_filter( 'slcr_author_meta_user_filter' , array( $this, 'slcr_author_meta_user_hook' ), 0, 1 );
    	add_filter( 'pre_get_posts' , array( $this, 'slcr_search_filter' ) );

    	/**
	 	 * Filter value parameter for slcr value parameter
	 	 */
    	add_filter( 'slcr_value_parameter_filter', array( $this, 'slcr_value_parameter' ) , 10, 1 );

    	/**
	 	 * Filter value parameter function for slcr cookies verify hook 
	 	 */
    	add_filter( 'slcr_cookies_verify_filter', array( $this, 'slcr_cookies_verify_hook' ) , 0, 1 );

    	/**
	 	 * Set Custom Wp Title According To Pages
	 	 */
    	add_filter( 'wp_title', array( $this, 'slcr_set_page_title' ), 10, 2 );

    	/**
	 	 * Flter  Icon Class Return
	 	 */
    	add_filter( 'slcr_icon_class_return_filter', array( $this, 'slcr_icon_class_return' ), 10, 3 );
        
        /**
         * Filter  Use For Remove Empty P Tag 
         */
        add_filter('the_content', array( $this, 'slcr_remove_empty_p' ) , 20, 1);

        /**
         * Filter  Use To Set Menu Link Attributes
         */
        add_filter( 'nav_menu_link_attributes', array( $this, 'slcr_menu_attr_set' ) , 10, 3 );

        /**
         * Add a pingback url auto-discovery header for single posts, pages, or attachments.
         */
        add_action( 'wp_head', array( $this, 'slcr_pingback_header') );
	}

    /**
     * [slcr_esc_attr description]
     * @access public
     * @since 1.0.0 
     * @method slcr_esc_attr
     * @param  [type]           $sl_attr [description]
     * @return [type]               [description]  
     */
    public function slcr_esc_attr( $sl_attr ) {
 
        $options = preg_replace("/[^\'A-Za-z0-9 ,_-]/", "", $sl_attr);

        if( empty( $options ) ) {
            return '';
        }

        return $options;
    }

    /**
     * Add a pingback url auto-discovery header for single posts, pages, or attachments.
     */
    function slcr_pingback_header() {
        if ( is_singular() && pings_open() ) {
            echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
    }

    /**
     *  Filter  Use To Set Menu Link Attributes   
     * @access  public
     * @since   1.0.0  
     * @param   array $atts, $item, $args
     * @return  void
     */
    function slcr_menu_attr_set( $atts, $item, $args ) { 
         
        if(ctype_space($atts['title'])) {
           $atts['title'] = esc_attr( $item->title ); 
        }  
        return $atts;
    }

    /**
     *  Filter  Use For Remove Empty P Tag   
     * @access  public
     * @since   1.0.0  
     * @return  void
     */
    public function slcr_remove_empty_p( $content ) { 
        $content = apply_filters( 'slcr_force_balance_tags_filter', $content);
        $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
        $content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
        return $content;
    }

    /**
     * Ajax Action for Blog  
     * @access  public
     * @since   1.0.0  
     * @return  void
     */
    public function slcr_load_posts_by_ajax_callback() {
        check_ajax_referer('load_more_posts', 'security');
        $paged = $_POST['page'];
        $args  = array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'paged'       => $paged,
        );
        $my_posts = new WP_Query($args);
        if ($my_posts->have_posts()): 
            while ($my_posts->have_posts()): 
                $my_posts->the_post();
                global $slcr_redux;
                $blog_type = $slcr_redux['blog-settings-blog-layout'];
                if ($blog_type == "type_1") {
                    get_template_part('template-parts/blog-layout/ajax-layout-one');
                } else {
                    get_template_part('template-parts/blog-layout/ajax-layout-two');
                }
            endwhile; 
        endif;
        wp_die();
    }

    /**
     * Slcr Ajax Action for Woo Cart  
     * @access  public
     * @since   1.0.0  
     * @return  void
     */
    public function slcr_ajax_cart() { 
        echo WC()->cart->get_cart_contents_count();  
        die();  
    }

    /**
     * Slcr Ajax Action for Woo Cart List 
     * @access  public
     * @since   1.0.0  
     * @return  void
     */
    public function slcr_ajax_cart_list() {  
        global $woocommerce;
        $items = $woocommerce->cart->get_cart();
        foreach($items as $item => $values) { 
            $_product =  wc_get_product( $values['data']->get_id() );
            //product image
            $getProductDetail = wc_get_product( $values['product_id'] );
             ?>
            <a href="<?php the_permalink( $values['product_id']) ?>" class="sidebar__product">
                <?php echo '<div class="product__image">'.$getProductDetail->get_image().'</div>'; ?>
                <div class="product__meta">
                    <h4><?php echo esc_html($_product->get_title()); ?></h4>  
                    <?php $currency = get_woocommerce_currency_symbol();
                    $price = get_post_meta($values['product_id'] , '_price', true);  ?>
                    <span class="product__price"><span class="quantity"><?php echo esc_html($values['quantity']); ?> x </span> <?php echo  esc_html($currency."".$price); ?>
                </div>
            </a>
            <?php
        } 
        ?>
        <div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
            <?php do_action( 'woocommerce_before_cart_totals' ); ?>
            <h2><?php echo esc_html( 'Cart totals', 'moppers' ); ?></h2>
            <table  class="shop_table shop_table_responsive">
                <tr class="cart-subtotal">
                    <th><?php echo esc_html__( 'Subtotal', 'moppers' ); ?></th>
                    <td data-title="<?php esc_attr_e( 'Subtotal', 'moppers' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                </tr>
                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
                    <tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                        <th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
                        <td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : 
                    do_action( 'woocommerce_cart_totals_before_shipping' ); 
                    wc_cart_totals_shipping_html();
                    do_action( 'woocommerce_cart_totals_after_shipping' );  
                elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
                    <tr class="shipping">
                        <th><?php echo esc_html__( 'Shipping', 'moppers' ); ?></th>
                        <td data-title="<?php esc_attr_e( 'Shipping', 'moppers' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                    </tr>
                    <?php 
                endif; 
                foreach ( WC()->cart->get_fees() as $fee ) : ?>
                    <tr class="fee">
                        <th><?php echo esc_html( $fee->name); ?></th>
                        <td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
                    </tr>
                    <?php 
                endforeach; ?>
                <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) :
                    $taxable_address = WC()->customer->get_taxable_address();
                    $estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                      ? sprintf( ' <small>' . __( '(estimated for %s)', 'moppers' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] ) : '';
                    if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                        <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                            <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                                <th><?php echo esc_html( $tax->label) . $estimated_text; ?></th>
                                <td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                            </tr>
                        <?php endforeach;  
                    else : ?>
                        <tr class="tax-total">
                            <th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
                            <td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                        </tr>
                        <?php 
                    endif; 
                endif; ?>
                <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
                <tr class="order-total">
                    <th><?php echo esc_html__( 'Total', 'moppers' ); ?></th>
                    <td data-title="<?php esc_attr_e( 'Total', 'moppers' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                </tr>
                <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
            </table>
            <div class="wc-proceed-to-checkout">
                <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
            </div>
            <?php do_action( 'woocommerce_after_cart_totals' ); ?>

        </div>
        <a href="<?php echo wc_get_cart_url(); ?>" class="button wc-forward">View cart</a> 
        <?php
        die();  
    }
	/**
	 * Slcr Add Image Size 
	 * @access  public
	 * @since   1.0.0  
	 * @return  void
	 */
	public function slcr_image_size_add() {
        add_image_size( 'slcr_small', 500 ); 
        add_image_size( 'slcr_medium', 800 ); 
        add_image_size( 'slcr_large', 1000 );  
    }

    /**
	 * Slcr Author Meta User
	 * @access  public
	 * @since   1.0.0  
	 * @param   int $id_a
	 * @return  mix
	 */ 
    public function slcr_author_meta_user_hook($id_a) {  
        if ( empty( get_the_author_meta('first_name',$id_a) ) && empty( get_the_author_meta('last_name',$id_a) ) ) {  
            return ucfirst(get_the_author_meta('display_name',$id_a)); 
        }else { 
            return get_the_author_meta('first_name',$id_a) . " " . get_the_author_meta('last_name',$id_a); 
        }
    }

    /**
	 * Slcr Select a type of Search.
	 * Product or Blog or All .
	 * @access  public
	 * @since   1.0.0  
	 * @param   string $query
	 * @return  mix
	 */
    public function slcr_search_filter($query)
    {
        if (($query->is_search) && (!is_admin())) {
            if(isset($_GET['main'])){
                $main_type      = $_GET['main'];
            }
            if(isset($_GET['post_type'])){
                $main_post_type = $_GET['post_type'];  
            }

            if (isset($main_type)) {
                global $slcr_redux;
                $general_settings_functionality_search_resulte_type = $slcr_redux['general_settings_functionality_search_resulte_type'];
                if ($general_settings_functionality_search_resulte_type == "product") {
                    $query->set('post_type', 'product');
                } elseif ($general_settings_functionality_search_resulte_type == "blog") {
                    $query->set('post_type', 'post');
                } else {
                    $query->set('post_type', array('post', 'page'));
                }

            } elseif (isset($main_post_type) && $main_post_type == "product") {
                $query->set('post_type', 'product');
            } else {
                $query->set('post_type', 'post');
            }
        }
        return $query;
    }

    /**
	 * Filter value  for slcr value parameter
	 * @access  public
	 * @since   1.0.0  
	 * @param   string $value
	 * @return  mix
	 */
    public function slcr_value_parameter( $value) { 
        if (is_numeric($value)) {
            return $value = $value.'px';
        }
        else {
            return  $value;
        }
    }

    /**
	 * Filter value parameter function for slcr cookies verify hook 
	 * @access  public
	 * @since   1.0.0  
	 * @param   string $value
	 * @return  mix
	 */
    public function slcr_cookies_verify_hook( $value) { 
        $privacy_consent="";
        global $slcr_redux;  
        $time_ex=$slcr_redux["general_settings_privacy_cookie_days"]; 
        if($value=="footer"){ 
            if(!empty($slcr_redux["general_settings_privacy_bar"])){
                $privacy_consent='Default'; 
                if(!empty($slcr_redux["general_settings_privacy_consent"])){
                    if(!empty($slcr_redux["general_settings_privacy_consent_types_default"])){
                        $arrlength2 =  count($slcr_redux["general_settings_privacy_consent_types_default"]);
                        for($x = 0; $x < $arrlength2; $x++) {
                            $privacy_consent.=','.$slcr_redux["general_settings_privacy_consent_types_default"][$x]; 
                        } 
                    } 
                } 
            }  
            return  $privacy_consent; 
        }

        $privacy_check_youtube="0";
        $privacy_check_vimeo="0";
        $privacy_check_gmap="0";
        $privacy_check_insta="0";
        $rget_result=array();
        if (isset($_COOKIE["PrivacyConsent"])){   
            $rget_result = explode(',', $_COOKIE["PrivacyConsent"]); 
        }
        global $slcr_redux;   
            if (in_array('youtube', $rget_result)) { 
                $privacy_check_youtube="1";
            }   
            if (in_array('vimeo', $rget_result)) { 
                $privacy_check_vimeo="2";  
            } 
            if (in_array('gmap', $rget_result)) { 
                $privacy_check_gmap="2";  
            }
            if (in_array('insta', $rget_result)) { 
                $privacy_check_insta="2";  
            }      
        $privacy_consent_youtube="0";
        $privacy_consent_vimeo="0";
        $privacy_consent_gmap="0";
        $privacy_consent_insta="0";
        if(!empty($slcr_redux["general_settings_privacy_consent"])){
            if(!empty($slcr_redux["general_settings_privacy_consent_types_default"])){
                $arrlength2 =  count($slcr_redux["general_settings_privacy_consent_types_default"]);
                for($x = 0; $x < $arrlength2; $x++) { 
                    if($slcr_redux["general_settings_privacy_consent_types_default"][$x] == "youtube"){
                        $privacy_consent_youtube="1";  
                    }
                    if($slcr_redux["general_settings_privacy_consent_types_default"][$x] == "vimeo"){
                        $privacy_consent_vimeo="2";
                    }
                    if($slcr_redux["general_settings_privacy_consent_types_default"][$x] == "gmap"){
                        $privacy_consent_gmap="2";
                    }
                    if($slcr_redux["general_settings_privacy_consent_types_default"][$x] == "insta"){
                        $privacy_consent_insta="2";
                    }
                } 
            } 
        } 
        if(!empty($slcr_redux["general_settings_privacy_consent"])){ 
            if(!empty($slcr_redux["general_settings_privacy_consent_types"])){ 
                $arrlength2 =  count($slcr_redux["general_settings_privacy_consent_types"]);
                for($x = 0; $x < $arrlength2; $x++) {
                    if($slcr_redux["general_settings_privacy_consent_types"][$x] == "youtube"){
                        $privacy_consent_youtube="1";  
                    }
                    if($slcr_redux["general_settings_privacy_consent_types"][$x] == "vimeo"){
                        $privacy_consent_vimeo="2";
                    }
                    if($slcr_redux["general_settings_privacy_consent_types"][$x] == "gmap"){
                        $privacy_consent_gmap="2";
                    }
                    if($slcr_redux["general_settings_privacy_consent_types"][$x] == "insta"){
                        $privacy_consent_insta="2";
                    }
                }   
            } 
        } 
        if($value=="youtube"){ 
            if($privacy_check_youtube=="0" && $privacy_consent_youtube=="1"){
                return  $privacy_consent="youtube";
            } 
        }
        if($value=="vimeo"){ 
            if($privacy_check_vimeo=="0" && $privacy_consent_vimeo=="2"){
                return  $privacy_consent="vimeo";
            }   
        }
        if($value=="gmap"){ 
            if($privacy_check_gmap=="0" && $privacy_consent_gmap=="2"){
                return  $privacy_consent="gmap";
            }   
        } 
        if($value=="insta"){ 
            if($privacy_check_insta=="0" && $privacy_consent_insta=="2"){
                return  $privacy_consent="insta";
            }   
        }    
    }

    /**
	 * Filter Set Custom Wp Title According To Pages 
	 * @access  public
	 * @since   1.0.0  
	 * @param   string $title , $sep 
	 * @return  mix
	 */
    function slcr_set_page_title( $title, $sep ) {
        $rsep=$sep;
        $sep=' '.$sep.' ';
        global $paged, $page;
        global $wp;
        $current_page_url_acf = home_url( $wp->request );
        $current_page_url_acf_real="0";
        global $slcr_redux; 
        $current_page_url_acf;
        $slcr_slug_array=explode("/",$current_page_url_acf);
        global $woocommerce; 
        if ($woocommerce && is_shop()) { 
            $woocommerce_title = woocommerce_page_title(false);
            $title = $woocommerce_title.$sep.get_bloginfo( 'name', 'display'); 
        }else { 
            if(is_front_page()){ 
                is_front_page() ? $title = get_bloginfo( 'name', 'display').$sep.get_bloginfo('description', 'display') : $title = get_bloginfo( 'name', 'display').$sep. get_the_title( get_option('page_for_posts', true) ); 
            }
            elseif(is_home()){
                is_front_page() ? $title = get_bloginfo( 'name', 'display').$sep.get_bloginfo('description', 'display') : $title = get_bloginfo( 'name', 'display').$sep. get_the_title( get_option('page_for_posts', true) );
            }
            else { 
                if ( is_search() ){
                    $title = "Search ".esc_attr(get_search_query()).$sep.get_bloginfo( 'name', 'display');; 
                }elseif ( is_archive() ){
                    if (is_category('')) {   
                        $title = single_cat_title().$sep.get_bloginfo( 'name', 'display'); 
                    } elseif (is_author('')) {  
                        $author = get_userdata( get_query_var('author') );
                        $title = $author->display_name.$sep.get_bloginfo( 'name', 'display'); 
                    } elseif (is_day('')) {  
                        $title =  get_the_time(get_option('date_format')).$sep.get_bloginfo( 'name', 'display');   
                    } elseif (is_month('')) {  
                        $title =  get_the_time('F Y').$sep.get_bloginfo( 'name', 'display');  
                    } elseif (is_year('')) {  
                        $title =  get_the_time('Y').$sep.get_bloginfo( 'name', 'display');  
                    } elseif (is_tag('')) {  
                        $title =  single_tag_title('').$sep.get_bloginfo( 'name', 'display'); 
                    }  
                    else{
                        $title = "Archive".$sep.get_bloginfo( 'name', 'display');  
                    }
                }elseif(is_404()){
                    $title = "Page Not Found".$sep.get_bloginfo( 'name', 'display');
                }else{
                    $title = get_the_title().$sep.get_bloginfo( 'name', 'display'); 
                }  
               
            }
        } 
         
        return $title;
    }

    /**
	 * Filter  Use For Icon Class Return 
	 * @access  public
	 * @since   1.0.0  
	 * @param   string $fricon_class , $ficon_flaticon 
	 * @return  mix
	 */
    public function slcr_icon_class_return( $fricon_class , $fcitype , $ficon_flaticon) {  
        if (empty($fricon_class)) { 
            switch ($fcitype) {
            case 'fontawesome':
                $fricon_class = "fa fa-adjust";
                break;
            case 'openiconic':
                $fricon_class = "vc-oi vc-oi-dial";
                break;
            case 'typicons':
                $fricon_class = "typcn typcn-adjust-brightness";
                break;
            case 'entypo':
                $fricon_class = "entypo-icon entypo-icon-note";
                break;
            case 'linecons':
                $fricon_class = "vc_li vc_li-heart";
                break;
            case 'monosocial':
                $fricon_class = "vc-mono vc-mono-fivehundredpx";
                break;
            case 'material':
                $fricon_class = "vc-material vc-material-cake";
                break;
            case 'flaticon':  
                if(empty($ficon_flaticon)){
                    $fricon_class = esc_attr('flaticon-001-wipes');
                }else{
                    $fricon_class = esc_attr($ficon_flaticon);
                }
                wp_enqueue_style('flaticon');
                wp_enqueue_style('wiping');
                break;
            default:
                $fricon_class = "fa fa-adjust";
                break;
            }
            return $fricon_class; 
        }
    }

}

 

/**
 * Main instance of Slcr_Action_Filters.
 *
 * Returns the main instance of Slcr_Action_Filters to prevent the need to use globals.
 *
 * @return Slcr_Action_Filters 
 * @since 1.0.0 
 */
function slcr_action_filters() {
	return Slcr_Action_Filters::slcr_instance();
}
slcr_action_filters(); // init it