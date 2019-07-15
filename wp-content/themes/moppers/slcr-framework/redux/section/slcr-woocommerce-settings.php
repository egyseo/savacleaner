<?php 
/** 
 * The SlashCreative Redux  Woocommerce Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Woocommerce Settings Fields 
global $woocommerce;
if ($woocommerce) {
    Redux::setSection($opt_name, array(
        'title'            => esc_html__('WooCommerce','moppers'),
        'id'               => 'woocommerce-settings',
        'desc'             => esc_html__('All woocommerce Settings related options are listed here.','moppers'),
        'customizer_width' => '400px',
        'icon'             => 'icons-tag',
    ));

    Redux::setSection($opt_name, array(
        'title'            => esc_html__('WooCommerce Settings','moppers'),
        'id'               => 'woocommerce-settings-General',
        'desc'             => esc_html__('General shop layout related settings.','moppers'),
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'woocommerce-settings-grid-type',
                'type'     => 'image_select',
                'title'    => esc_html__('Shop Grid','moppers'),
                'subtitle' => esc_html__('Select a grid for your shop page.','moppers'),
                'desc'     => esc_html__('Default is 3 col.','moppers'),
                'options'  => array(
                    '2' => array(
                        'alt' => '2 coloumn',
                        'img' => SLCR_FRAMEWORK_URI . SCDS . 'redux/assets/img/port-2c.png',
                    ),
                    '3' => array(
                        'alt' => '3 coloumn',
                        'img' => SLCR_FRAMEWORK_URI . SCDS . 'redux/assets/img/port-3c.png',
                    ),
                    '4' => array(
                        'alt' => '4 coloumn',
                        'img' => SLCR_FRAMEWORK_URI . SCDS . 'redux/assets/img/port-4c.png',
                    ),
                ),
                'default'  => '3',
            ),
            array(
                'id'       => 'woocommerce-settings-sidebar-on-off',
                'type'     => 'switch',
                'title'    => esc_html__('Sidebar','moppers'),
                'subtitle' => esc_html__('Turn this option on to enable the sidebar on archive page.','moppers'),
                'default'  => false,
            ),
            array(
                'id'       => 'woocommerce-settings-sidebar-position',
                'type'     => 'select',
                'title'    => esc_html__('Sidebar Position ','moppers'),
                'subtitle' => esc_html__('Select a position for your sidebar.','moppers'),
                'options'  => array(
                    'left'  => 'Left',
                    'right' => 'Right',
                ),
                'default'  => 'left',
                'required' => array('woocommerce-settings-sidebar-on-off', '=', 1),
            ),
            array(
                'id'       => 'woocommerce-settings-layout-type',
                'type'     => 'image_select',
                'title'    => esc_html__('Product Card Type','moppers'),
                'subtitle' => esc_html__('Select a layout for your product card.','moppers'),
                'desc'     => esc_html__('Default type is Modern','moppers'),
                'options'  => array(
                    'modern'  => array(
                        'alt' => 'Modern',
                        'img' => SLCR_FRAMEWORK_URI . SCDS . 'redux/assets/img/product-modern.png',
                    ),
                    'minimal' => array(
                        'alt' => 'Minimal',
                        'img' => SLCR_FRAMEWORK_URI . SCDS . 'redux/assets/img/product-minimal.png',
                    ),
                ),
                'default'  => 'modern',
            ),
            array(
                'id'       => 'woocommerce-settings-type-2-footer-color',
                'type'     => 'color',
                'title'    => esc_html__('Footer Background','moppers'),
                'subtitle' => esc_html__('Change the background color of product card footer.','moppers'),
                'required' => array('woocommerce-settings-layout-type', '=', 'modern'),
            ),
            array(
                'id'       => 'woocommerce-settings-type-1-text-align',
                'type'     => 'select',
                'title'    => esc_html__('Card Text Align','moppers'),
                'subtitle' => esc_html__('Select a position to align the meta text under product card.','moppers'),
                'options'  => array(
                    'left'   => 'Left',
                    'right'  => 'Right',
                    'center' => 'Center',
                ),
                'default'  => 'left',
                'required' => array('woocommerce-settings-layout-type', '=', 'minimal'),
            ),
            array(
                'id'       => 'woocommerce-settings-gallery-category-on-off',
                'type'     => 'switch',
                'title'    => esc_html__('Gallery Product Category On / Off','moppers'),
                'subtitle' => esc_html__('Hide/Show Product Category .','moppers'),
                'default'  => true,
            ),
            array(
                'id'       => 'woocommerce-settings-type-2-hover-image',
                'type'     => 'switch',
                'title'    => esc_html__('Hover Image change','moppers'),
                'subtitle' => esc_html__('Enable multiple images on hover product card.','moppers'),
                'default'  => true,
            ),
            array(
                'id'      => 'woocommerce-settings-type-2-cart-icon',
                'type'    => 'switch',
                'title'   => esc_html__('Cart Icon in Header','moppers'),
                'default' => true,
            ),
        ),
    ));

    Redux::setSection($opt_name, array(
        'title'            => esc_html__('Shop Archive Header','moppers'),
        'id'               => 'woocommerce-settings-archive-header',
        'desc'             => esc_html__('Global page header for shop archive pages.','moppers'),
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'woocommerce-settings-archive-header-on-off',
                'type'     => 'switch',
                'title'    => esc_html__('Header Visiblity','moppers'),
                'subtitle' => esc_html__('Enable or disable header on shop archive page.','moppers'),
                'default'  => true,
            ),
            array(
                'id'       => 'woocommerce-settings-archive-height',
                'type'     => 'text',
                'title'    => esc_html__('Header Padding ','moppers'),
                'subtitle' => esc_html__('Change the padding of shop archive header.','moppers'),
                'desc'     => '',
                'required' => array('woocommerce-settings-archive-header-on-off', '=', 1),
            ),
            array(
                'id'       => 'woocommerce-settings-archive-background-type',
                'type'     => 'select',
                'title'    => esc_html__('Background Type ','moppers'),
                'subtitle' => esc_html__('Select a background type for shop archive header.','moppers'),
                'options'  => array(
                    'color'    => 'Color',
                    'image'    => 'Image',
                    'gradient' => 'Gradient',
                ),
                'default'  => 'color',
                'required' => array('woocommerce-settings-archive-header-on-off', '=', 1),
            ),
            array(
                'id'       => 'woocommerce-settings-archive-background-color',
                'type'     => 'color',
                'title'    => esc_html__('Background color','moppers'),
                'subtitle' => esc_html__('Pick a color for shop archive header.','moppers'),
                'required' => array('woocommerce-settings-archive-background-type', '=', 'color'),
            ),
            array(
                'id'       => 'woocommerce-settings-archive-background-image',
                'type'     => 'media',
                'title'    => esc_html__('Background Image','moppers'),
                'subtitle' => esc_html__('Upload an image to show on shop archive header.','moppers'),
                'desc'     => '',
                'required' => array('woocommerce-settings-archive-background-type', '=', 'image'),
            ),
            $fields = array(
                'id'            => 'woocommerce-settings-archive-background-image-overlay',
                'type'          => 'slider',
                'title'         => esc_html__('Background image overlay','moppers'),
                'subtitle'      => esc_html__('Change Background image overlay Opacity .','moppers'),
                "default"       => 5,
                "min"           => 0,
                "step"          => 1,
                "max"           => 10,
                'display_value' => 'label',
                'required'      => array('woocommerce-settings-archive-background-type', '=', 'image'),
            ),
            array(
                'id'       => 'woocommerce-settings-archive-background-gradient',
                'type'     => 'text',
                'title'    => esc_html__('Gradient Color','moppers'),
                'subtitle' => esc_html__('Enter gradient code CSS to use as header background.','moppers'),
                'desc'     => '',
                'required' => array('woocommerce-settings-archive-background-type', '=', 'gradient'),
            ),
            array(
                'id'       => 'woocommerce-settings-header-title-typography',
                'type'     => 'typography',
                'title'    => esc_html__('Header Title Typography','moppers'),
                'subtitle' => esc_html__('Specify font properties for the shop archive header title.','moppers'),
                'google'   => true,
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Typography','moppers'),
        'id'         => 'woocommerce-settings-typography',
        'desc'       => esc_html__('Custom typography for shop elements.','moppers'),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'woocommerce-settings-typography-product-title',
                'type'     => 'typography',
                'title'    => esc_html__('Product Title - Product Card','moppers'),
                'subtitle' => esc_html__('Specify font properties for the product title on product card.','moppers'),
                'google'   => true,
            ),
            array(
                'id'       => 'woocommerce-settings-typography-single-product-title',
                'type'     => 'typography',
                'title'    => esc_html__('Product Title - Single Product Page','moppers'),
                'subtitle' => esc_html__('Specify font properties for the product title on single product page.','moppers'),
                'google'   => true,
            ),
            array(
                'id'       => 'woocommerce-settings-typography-single-product-description',
                'type'     => 'typography',
                'title'    => esc_html__('Product Description - Single Product Page','moppers'),
                'subtitle' => esc_html__('Specify font properties for the product description on single product page.','moppers'),
                'google'   => true,
            ),
        ),
    ));
    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Custom Colors','moppers'),
        'id'         => 'woocommerce-settings-color',
        'desc'       => esc_html__('Custom colors for shop elements.','moppers'),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'woocommerce-settings-color-addtocart-color',
                'type'     => 'color',
                'title'    => esc_html__('Add to Cart Button - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of add to cart button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-addtocart-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Add to Cart Button - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of add to cart button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-proceedtocheckout-color',
                'type'     => 'color',
                'title'    => esc_html__('Proceed Checkout Button - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of proceed to checkout button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-proceedtocheckout-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Proceed Checkout Button - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of proceed to checkout button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-placeorder-color',
                'type'     => 'color',
                'title'    => esc_html__('Place Order Button - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of place order button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-placeorder-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Place Order Button - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of place order button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-login-color',
                'type'     => 'color',
                'title'    => esc_html__('Login Button - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of login button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-login-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Login Button - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of place order button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-register-color',
                'type'     => 'color',
                'title'    => esc_html__('Register Button - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of register button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-register-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Register Button - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of register button.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-overall-color',
                'type'     => 'color',
                'title'    => esc_html__('Overall Buttons - Background Color','moppers'),
                'subtitle' => esc_html__('Change background color of all shop buttons.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-overall-color-text',
                'type'     => 'color',
                'title'    => esc_html__('Overall Buttons - Text Color','moppers'),
                'subtitle' => esc_html__('Change text color of all shop buttons.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-price-product-page-color',
                'type'     => 'color',
                'title'    => esc_html__('Price Text Color - Product Page','moppers'),
                'subtitle' => esc_html__('Change the text color of price on single product page.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-price-color',
                'type'     => 'color',
                'title'    => esc_html__('Price Text Color - Product Card','moppers'),
                'subtitle' => esc_html__('Change the text color of price on product card.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-category-color',
                'type'     => 'color',
                'title'    => esc_html__('Category Color - Product Card','moppers'),
                'subtitle' => esc_html__('Change the text color of category on product card.','moppers'),
            ),
            array(
                'id'       => 'woocommerce-settings-color-hover-title-color',
                'type'     => 'color',
                'title'    => esc_html__('Product Title Hover Color - Modern Type','moppers'),
                'subtitle' => esc_html__('Change the product title color on product card hover.','moppers'),
                'required' => array('woocommerce-settings-layout-type', '=', 'modern'),
            ),

        ),
    ));

}