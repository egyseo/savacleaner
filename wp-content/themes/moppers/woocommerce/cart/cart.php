<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
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

defined( 'ABSPATH' ) || exit;
?>
<div class="col-md-12 col-sm-12 col-xs-12 cart-container">
    <div class="row">
        <?php
            wc_print_notices();

            do_action( 'woocommerce_before_cart' ); ?>

            <div class="col-md-7 col-xs-12">
                <div class="row">

                    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <?php do_action( 'woocommerce_before_cart_table' ); ?>

                        <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                            <thead>
                                <tr>
                                    <th class="product-name"><?php esc_html_e( 'Product','moppers' ); ?></th>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-price"><?php esc_html_e( 'Price','moppers' ); ?></th>
                                    <th class="product-quantity"><?php esc_html_e( 'Quantity','moppers' ); ?></th>
                                    <th class="product-subtotal"><?php esc_html_e( 'Total','moppers' ); ?></th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                        <?php
                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                              $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                              ?>
                              <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                  

                                  <td class="product-thumbnail">
                                  <?php
                                  $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                  if ( ! $product_permalink ) {
                                      echo wp_kses_post( $thumbnail );
                                  } else {
                                      printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), wp_kses_post( $thumbnail ) );
                                  }
                                  ?>
                                  </td>

                                  <td class="product-name" data-title="<?php esc_attr_e( 'Product','moppers' ); ?>">
                                  <?php
                                  if ( ! $product_permalink ) {
                                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                                  } else {
                                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                  }

                                  do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

                                  // Meta data.
                                  echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                                  // Backorder notification.
                                  if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                      echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder','moppers' ) . '</p>' ) );
                                  }
                                  ?>
                                  </td>
                                  <td class="product-remove">
                                      <?php
                                          // @codingStandardsIgnoreLine
                                          echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                              '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                              esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                              __( 'Remove this item','moppers' ),
                                              esc_attr( $product_id ),
                                              esc_attr( $_product->get_sku() )
                                          ), $cart_item_key );
                                      ?>
                                  </td>
                                  <td class="product-price" data-title="<?php esc_attr_e( 'Price','moppers' ); ?>">
                                      <?php
                                          echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                      ?>
                                  </td>

                                  <td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity','moppers' ); ?>">
                                  <?php
                                  if ( $_product->is_sold_individually() ) {
                                      $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                  } else {
                                      $product_quantity = woocommerce_quantity_input( array(
                                          'input_name'   => "cart[{$cart_item_key}][qty]",
                                          'input_value'  => $cart_item['quantity'],
                                          'max_value'    => $_product->get_max_purchase_quantity(),
                                          'min_value'    => '0',
                                          'product_name' => $_product->get_name(),
                                      ), $_product, false );
                                  }

                                  echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                  ?>
                                  </td>

                                  <td class="product-subtotal" data-title="<?php esc_attr_e( 'Total','moppers' ); ?>">
                                      <?php
                                          echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                                      ?>
                                  </td>
                              </tr>
                              <?php
                          }
                      }
                      ?>

                      <?php do_action( 'woocommerce_cart_contents' ); ?>
                  </tbody>
           
                      

                      <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                    </table>

                    <div class="actions cart__update text-right">
                               <input type="submit" class="button update-cart" name="update_cart" value="<?php esc_attr_e( 'Update cart','moppers' ); ?>" />
                              
                               <?php if ( wc_coupons_enabled() ) { ?>
                                  <div class="coupon">
                                      <h4 class="gap-0"><?php echo esc_html__('Have a Coupon?','moppers'); ?></h4>
                                      <p class="mb-30"><?php echo esc_html__('Apply your coupon codes here.','moppers'); ?></p>
                                     <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code','moppers' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply','moppers' ); ?>" />
                                     <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                  </div>
                               <?php } ?>
           
           
           
                              
           
                               <?php do_action( 'woocommerce_cart_actions' ); ?>
           
                               <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                            </div>
                 <tr>
                           
              <?php do_action( 'woocommerce_after_cart_table' ); ?>
          </form>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 col-md-offset-1">
          <div class="row">
 
              <div class="cart-collaterals">
 
                <?php woocommerce_cart_totals(); ?>
 
              </div>
          </div>
      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="row">
              <?php   
                  function woocommerce_cross_sell_display_slcr( $limit = 2, $columns = 2, $orderby = 'rand', $order = 'desc' ) {
                    global $woocommerce_loop;
 
                    if ( is_checkout() ) {
                       return;
                    }
                    // Get visible cross sells then sort them at random.
                    $cross_sells                 = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );
                    $woocommerce_loop['name']    = 'cross-sells';
                    $woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );
 
                    // Handle orderby and limit results.
                    $orderby     = apply_filters( 'woocommerce_cross_sells_orderby', $orderby );
                    $cross_sells = wc_products_array_orderby( $cross_sells, $orderby, $order );
                    $limit       = apply_filters( 'woocommerce_cross_sells_total', $limit );
                    $cross_sells = $limit > 0 ? array_slice( $cross_sells, 0, $limit ) : $cross_sells;
 
                    wc_get_template( 'cart/cross-sells.php', array(
                       'cross_sells'    => $cross_sells,
 
                       // Not used now, but used in previous version of up-sells.php.
                       'posts_per_page' => $limit,
                       'orderby'        => $orderby,
                       'columns'        => $columns,
                    ) );
                 }
                  woocommerce_cross_sell_display_slcr();
              ?>
          </div>
        </div>
      </div>
</div>
<?php do_action( 'woocommerce_after_cart' ); ?>
