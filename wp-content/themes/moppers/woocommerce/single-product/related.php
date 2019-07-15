<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
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

global $slcr_redux;
$woocommerce_settings_grid_type      = $slcr_redux['woocommerce-settings-grid-type'];
$woocommerce_settings_layout_type      = $slcr_redux['woocommerce-settings-layout-type']; 
$woocommerce_settings_type_1_text_align      = $slcr_redux['woocommerce-settings-type-1-text-align'];
$woocommerce_settings_sidebar_on_off    = $slcr_redux['woocommerce-settings-sidebar-on-off'];
$woocommerce_settings_sidebar_position    = $slcr_redux['woocommerce-settings-sidebar-position'];
$woocommerce_settings_type_2_hover_image    = $slcr_redux['woocommerce-settings-type-2-hover-image'];
$woocommerce_settings_archive_header_on_off    = $slcr_redux['woocommerce-settings-archive-header-on-off'];
$woocommerce_settings_archive_background_image_overlay    = $slcr_redux['woocommerce-settings-archive-background-image-overlay'];
$woocommerce_settings_type__hover_image ="";
if($woocommerce_settings_type_2_hover_image == 1){
	$woocommerce_settings_type__hover_image ="true";
}else {
	$woocommerce_settings_type__hover_image ="false";
}
if ( $related_products ) : ?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products','moppers' ); ?></h2>
		<ul class="products columns-4 relateds" data-product-type="<?php echo esc_attr($woocommerce_settings_layout_type);  ?>" data-card-text="<?php echo esc_attr($woocommerce_settings_type_1_text_align);  ?>" data-hover-multipal-image="<?php echo esc_attr($woocommerce_settings_type__hover_image);  ?>">


			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();
