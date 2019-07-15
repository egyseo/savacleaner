<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

/** 
 * The SlashCreative WooCommerce 
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="col-md-12 col-sm-12">
    <div class="row">
        <div class="container">
            <div class="empty__cart">
                <i class="icon_bag_alt empty__car_icon"></i>
                <?php
                do_action( 'woocommerce_cart_is_empty' );
                if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                <p class="empty__desc"><?php echo esc_html__('There are currently no items in your cart, Please go back to shop and put some items in the cart.','moppers'); ?></p>
                <p class="return-to-shop">
                    <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                     <?php echo esc_html__( 'Return to shop','moppers' ) ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
