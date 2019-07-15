<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
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
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">
    <ul>
        <li class="user__info">
            <div class="user__avatar">
                <?php $current_user = wp_get_current_user(); ?>
                <?php echo get_avatar( $current_user->user_email, 72, '', $current_user->display_name ); ?>
            </div>
            <div class="user__title">
               
                <h5 class="font-600">
                    <?php 
                        echo esc_html($current_user->user_firstname . ' ');
                        echo esc_html($current_user->user_lastname);
                    ?>
                </h5>
            </div>
        </li>
        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
        <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
            <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
                <i class=""></i><?php echo esc_html( $label ); ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
