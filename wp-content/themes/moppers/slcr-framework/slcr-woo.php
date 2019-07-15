<?php
/** 
 * The SlashCreative Woocommerce Functionality
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
 * Handle Woocommerce Functionality.
 */
class Slcr_Woo {

    /**
     * Hold an instance of Slcr_Woo class.
     *
     * @since 1.0.0
     *
     * @access protected
     * @var string
     */
    protected static $instance = null;

    /**
     *  Main Slcr_Woo instance.
     *
     * @since 1.0.0
     *
     * @access public
     * @var string
     * @return Slcr_Woo - Main instance.
     */
    public static function slcr_instance() {

        if(null == self::$instance) {
            self::$instance = new Slcr_Woo();
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
        //Add Slider to Woocommerce Product
        add_action('after_setup_theme', array( $this, 'slcr_woocommerce_slider_add' ), 99); 

        //Change the position of add to cart 
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        
        // Add Woocommerce Product Second Image Shop Item
        add_action('woocommerce_before_shop_loop_item_title', array( $this, 'slcr_product_image' ), 10);
        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        
        //Change Breadcrumb Delimiter
        add_filter('woocommerce_breadcrumb_defaults', array( $this, 'slcr_change_breadcrumb_delimiter' ), 10);

        //Woocommerce shop loop columns
        add_filter('loop_shop_columns', array( $this, 'slcr_loop_columns' ), 10);

        /**
         * Shop Page Detect For Admin Use
         */
        global $pagenow;
        if (is_admin() && 'post.php' == $pagenow && isset($_GET['post']) && isset($_GET['action'])) {
            $page_id=$_GET['post'];
            if($_GET['action'] == "edit" && isset($woocommerce)){
                if(get_option( 'woocommerce_shop_page_id' )==$page_id  ){
                    // display custom admin notice
                    add_action('admin_notices', array( $this, 'slcr_woo_custom_admin_notice' ) ); 
                }  
            }
        }
    }

    /**
     * Add Slider to Woocommerce Product
     * @access public
     * @since 1.0.0 
     * @return  void
     */
    public function slcr_woocommerce_slider_add() {
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }

    /**
     * Add Slider to Woocommerce Product
     * @access public
     * @since 1.0.0 
     * @return  void
     */
    public function slcr_product_image() {
        global $slcr_redux;
        global $product;
        $woocommerce_settings_type_2_hover_image = $slcr_redux['woocommerce-settings-type-2-hover-image'];
        $woocommerce_settings_gallery_category_on_off = $slcr_redux['woocommerce-settings-gallery-category-on-off'];
        if ($woocommerce_settings_type_2_hover_image == 1) {
            $product_hover_alt_image = "1";
        } else {
            $product_hover_alt_image = "0";
        }
        ?>
        <div class="product-wrap">
            <?php
            global $post, $product;
            if ($product->is_on_sale()):
                echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . esc_html__('Sale!','moppers') . '</span>', $post, $product);
            endif;
            $product_second_image = null;
            if ($product_hover_alt_image == '1') {
                $product_attach_ids = $product->get_gallery_image_ids();
                if (isset($product_attach_ids[0])) {
                    $product_second_image = wp_get_attachment_image($product_attach_ids[0], 'shop_catalog', false, array('class' => 'product-hover-image'));
                }

            }
            echo '<div class="product-main-images">';
            echo '<a href="' . get_permalink() . '">';
            echo woocommerce_get_product_thumbnail() . $product_second_image;
            echo '</a>';
            echo '</div>';
            echo '<div class="product-meta">';
            echo '<a href="' . get_permalink() . '">';
            do_action('woocommerce_shop_loop_item_title');
            echo '</a>';
            //echo '<p class="price">', $product->get_price_html(), '</p>';
            $woocommerce_settings_layout_type = $slcr_redux['woocommerce-settings-layout-type'];
            if($woocommerce_settings_gallery_category_on_off==true){
                echo wc_get_product_category_list($product->get_id(), '&nbsp&nbsp&nbsp', '<span class="posted_in">' . _n('', '', count($product->get_category_ids()),'moppers') . ' ', '</span>');  
            }
            do_action('woocommerce_after_shop_loop_item_title');
            echo '<div class="product-add-to-cart">';
            woocommerce_template_loop_add_to_cart();
            echo '</div></div>';?>
        </div>
        <?php 
    }

    /**
     * Change Woocommerce Breadcrumb Delimiter
     * @access public
     * @since 1.0.0 
     * @return  mix
     */
    public function slcr_change_breadcrumb_delimiter($defaults)
    {
        // Change the breadcrumb delimeter from '/' to '>'
        $defaults['delimiter'] = ' <i class="bc__icon arrow_carrot-right"></i> ';
        return $defaults;
    }

    /**
     * Woocommerce shop loop columns
     * @access public
     * @since 1.0.0 
     * @return  mix
     */
    public function slcr_loop_columns() {
        global $slcr_redux;
        return esc_attr($slcr_redux['woocommerce-settings-grid-type']);  
    }

    /**
     * Filter Set Custom Wp Title According To Pages 
     * @access  public
     * @since   1.0.0  
     * @param   string $query 
     */
    public function slcr_woo_custom_admin_notice() { 
        ?>
        <div class="notice notice-info" id="has_shop_page_acf_3242">
            <p><?php esc_html__('Shop Page!','moppers'); ?></p>
        </div>
        <?php 
    }
}


/**
 * Main instance of Slcr_Woo.
 *
 * Returns the main instance of Slcr_Woo to prevent the need to use globals.
 *
 * @return Slcr_Woo 
 * @since 1.0.0 
 */
function slcr_woo() {
    return Slcr_Woo::slcr_instance();
}
slcr_woo();
