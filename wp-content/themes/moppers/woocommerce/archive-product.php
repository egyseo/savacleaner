 <?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
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

$bg_image_url_woo="";
if(!empty($slcr_redux['woocommerce-settings-archive-background-image']['url'])){
	$bg_image_url_woo="background-image: url('".esc_attr( $slcr_redux['woocommerce-settings-archive-background-image']['url'])."');";	
}

if(is_product_category()){
	$cate = get_queried_object();
	$cateID = $cate->term_id; 
	$thumbnail_id = get_term_meta( $cateID, 'thumbnail_id', true );
	$image = wp_get_attachment_url( $thumbnail_id ); 
	if($image){ 
		$bg_image_url_woo="background-image: url('".esc_attr( $image)."');";
	} 
    
}

get_header(); 
 
	if($woocommerce_settings_archive_header_on_off == 1){  ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
          <div class="shop__archive_header" <?php if($slcr_redux['woocommerce-settings-archive-background-type']=="image"){ echo 'data-bg-overlay="'.esc_attr($woocommerce_settings_archive_background_image_overlay).'"'; echo ' style="'.$bg_image_url_woo.'"';}?> >
              <div class="container ">
                  <h1><?php woocommerce_page_title(); ?></h1>
              </div>
          </div>
      </div>
  	</div>  <?php } ?>
	<div class="col-md-12 col-sm-12 col-xs-12 woo_main_content">
		<div class="row">
			<div class="container">
             <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 switch-<?php echo esc_attr($woocommerce_settings_sidebar_position); ?>">      
				<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				do_action( 'woocommerce_before_main_content' );

				if($woocommerce_settings_sidebar_on_off==1){
							if (is_active_sidebar('sidebar-woocommerce-main')){
								echo '<div class="col-md-8 col-xs-12 col-sm-12">'; 
							} else {
								echo '<div class="col-md-12 col-xs-12 col-sm-12">';	
							}
						}else {
							echo '<div class="col-md-12 col-xs-12 col-sm-12">';
						}

				?>
		<div class="row">  
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					 
				<?php endif; ?>

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				if($woocommerce_settings_archive_header_on_off == 0 ){ 
					?>
					 <h1><?php woocommerce_page_title(); ?></h1>
			        <?php
			    }
				?> 
			<?php if ( have_posts() ) : ?>
			<ul class="products columns-<?php echo esc_attr($woocommerce_settings_grid_type); ?>" data-product-type="<?php echo esc_attr($woocommerce_settings_layout_type);  ?>" data-card-text="<?php echo esc_attr($woocommerce_settings_type_1_text_align);  ?>" data-hover-multipal-image="<?php echo esc_attr($woocommerce_settings_type__hover_image);  ?>">

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; 
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

 
        if($woocommerce_settings_sidebar_on_off==1){ 
        	if (is_active_sidebar('sidebar-woocommerce-main')){ ?>
	             <aside class="col-md-4 col-xs-12 col-sm-12 slcr-sidebar">
					<?php
						/**
						 * woocommerce_sidebar hook.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						//do_action( 'woocommerce_sidebar' );
				        dynamic_sidebar('sidebar-woocommerce-main');
				        
	                ?> 
	             </aside>
             <?php } 
         } ?>

              </div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
