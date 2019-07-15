<?php
/**
 *  slcr WordPress Theme
 *
 **/
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.'); 
}  
    global $wp_query;
    $acf_page_id =$wp_query->get_queried_object_id(); 
    global $wp;
    $current_page_url_acf = home_url( $wp->request );
 
?>  
<style type="text/css">
    <?php global $slcr_redux;
    $realcss="";
    //blog single page typography
    global $slcr_redux; 
    $body_main_typography="";
    $p_main_typography="";
    $h_main_typography="";

    if (!empty($slcr_redux['general_settings_typography_body_main_typography_link']) && !empty($slcr_redux['general_settings_typography_body_main_typography_name'])) {
        $body_main_typography="font-family: ".slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_body_main_typography_name']).";";  
    }  
    if (!empty($slcr_redux['general_settings_typography_body_main_typography_name_p']) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_p']) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_switch_p'])) { 
        $p_main_typography="font-family: ".slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_body_main_typography_name_p']).";";     
    }else {
        $p_main_typography=$body_main_typography;
    } 
    if (!empty($slcr_redux['general_settings_typography_body_main_typography_name_h']) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_h']) && !empty($slcr_redux['general_settings_typography_body_main_typography_link_switch_h'])) {   
        $h_main_typography="font-family: ".slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_body_main_typography_name_h']).";"; 
    }else {
        $h_main_typography=$body_main_typography;
    }  
    $realcss.= 'body , .pagination__links, .secondary-font {
        '.$body_main_typography.'
    }
    h1, h2, h3, h4, h5, h6, .primary-font {
        '.$h_main_typography.'
    } 
    p {
        '.$p_main_typography.'
    } ';
    if (!empty($slcr_redux['general_settings_color_main_gradient_1'])) {
        $realcss.='
        .bg--gradient-1 { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).'; }
        .btn--gradient-1{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).'; }
        .progress--Gradient-1 { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).' !important; }
        .text--gradient-1 { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).' !important; -webkit-background-clip: text !important; -webkit-text-fill-color: transparent !important; }
        .icon--gradient-1 { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).' !important; -webkit-background-clip: text !important; -webkit-text-fill-color: transparent !important; }
        .btn--gradient-1.btn--ghost:before, .btn--gradient-1.btn--inverse:before, .btn--gradient-1.btn--inverse:after { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_1']).'; }
        ';  
    } 
    if (!empty($slcr_redux['general_settings_color_main_gradient_2'])) {
        $realcss.='.bg--gradient-2{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).';  }
        .btn--gradient-2{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).';  }
        .progress--Gradient-2{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).' !important; }
        .text--gradient-2{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).' !important; -webkit-background-clip: text !important; -webkit-text-fill-color: transparent !important; }
        .icon--gradient-2{ background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).' !important; -webkit-background-clip: text !important; -webkit-text-fill-color: transparent !important; } .btn--gradient-2.btn--ghost:before, .btn--gradient-2.btn--inverse:before, .btn--gradient-2.btn--inverse:after { background: '.esc_attr($slcr_redux['general_settings_color_main_gradient_2']).'; }
        .icon--gradient-1:before, .icon--gradient-2:before { display: initial !important; }';  
    } 
    ?>  
       
    <?php $realcss.= 'a, .text-link, .color-theme-main, .text_link, .article-card:hover .article-title { color: '; $realcss.= esc_attr($slcr_redux['general_settings_color_main_link_all_color']); $realcss.='; }
    a:hover, a:focus, a:active, .text-link:hover, .text_link:hover { color: '; $realcss.= esc_attr($slcr_redux['general_settings_color_main_link_all_color_hover']); $realcss.='; }
    [data-link-hover="border"]:hover .inner-link { border-bottom: 1px solid; border-color: '; $realcss.= esc_attr($slcr_redux['general_settings_color_main_link_all_color_hover']); $realcss.= '; }

    .btn--primary, .bg-primary, .btn--primary.btn--ghost:hover, .btn--primary.btn--fill:after, .badge-primary, .nav__content .cart__value, .nav__list .button__nav_1, .mob__trigger, .nav__mobile_mod .nav__background, .cart__sidebar .cart__module.footer a.account, .pagination-cont .page-numbers.current, .pagination__blog .page-numbers.current, .pagination__blog .post-page-numbers.current, .pagination__blog .next a, .pagination__blog .prev a, .slcr-sidebar .widget_tag_cloud a:hover, .slcr-sidebar .widget_product_tag_cloud a:hover, .slcr-sidebar #wp-calendar a:hover, .comment-respond .button, .pagination__blog .blog__loadmore_type_1, .meta__large .author__info .external__link:hover, .btn-site, .btn-app, .service__box:hover .service__arrow, .pricing__01 .pricing-badge, .pricing__02 .pricing-header, .pricing__03.featured, .pricing__05 .price-badge, .accordion__02 li.active .accordion-header, .testimonial__06 .quote, .image-comparison .handle, .image-comparison .handle:after, .progress .main-theme, .tabbed_2 .tabs li.active, .hotspot_point, [data-hover-target="box"]:hover .main__icon, [data-hover-target="icon"] .main__icon:hover, .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span, input[type=checkbox]:checked, input[type=radio]:checked, .sharing__list a:hover, .slcr-sidebar .widget_categories li:before, .slcr-sidebar .widget_recent_entries ul li:before, .product-categories li:before, .slcr-sidebar .widget_archive ul li:before, .post-password-form input[type="submit"], .wp-block-archives li a:before, .wp-block-categories li a:before, .page-numbers.current,.blog-content .blog-pagination .page-item{ '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        } 
        $realcss.=' }
        
    .btn--primary.btn--ghost, .btn--primary.btn--fill,.btn--primary.btn--inverse:hover, .nav__list .button__nav_2, .footer__social li a:hover, .blog__card-01 .author__title, .blog__card-02 .author__title, .pagination__toggle:hover, .slcr-sidebar ul li a:hover, .slcr-sidebar .widget_recent_entries ul li:before, .slcr-sidebar #recentcomments li:before, .slcr-sidebar .product-categories .cat-item:before, .slcr-sidebar .product-categories .cat-item.has-child a:hover, .slcr-sidebar .product-categories .cat-item.has-child .children li a:hover, .slcr-sidebar .product-categories .current-cat.cat-item a, .slcr-sidebar .product-categories .cat-item.has-child .children li.current-cat a, .back__top i, .blog__card-01 .post__title h3:hover, .blog__card-02 .post__title h3:hover, .slcr-sidebar .product-categories .cat-item .current-cat a, .blog__nav li .active, .pagination-cont:hover, .team__01:hover h5, .team__02:hover h5, .team__05:hover h5, .team__06:hover h5, .team__07 ul li a:hover, .team__01 ul li a:hover, .team__02 ul li a:hover, .team__05 ul li a:hover, .team__06 ul li a:hover, .service__box:hover h5, .pricing__01 .pricing-info, .pricing__01 .plan-features i, .pricing__02 .pricing-table i, .pricing__03 .price-tag, .pricing__04 .pricing-features .true-icon, .accordion__03 .accordion-header:hover h5, .accordion__03 li.active .accordion-header h5, .accordion__03 .active .accordion-header::before, .testimonial__01 ul li i, .page__header .content .breadcrumbs li a:hover, .main__icon, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .privacy__button .privacy__agree, .privacy__popup .privacy__agree, .slcr-sidebar .custom_menu li a:before, .slcr-sidebar .widget_nav_menu li a:before, .slcr-sidebar .widget_pages li a:before, .top-bar-content li .icon, .slcr-sidebar .widget_nav_menu .current-menu-item a, .wp-block-archives li a:hover, .wp-block-categories li a:hover, .wp-block-latest-posts li a:hover, .wp-block-latest-comments__comment-meta a:hover { 
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
            }
            $realcss.= ' 
         } 

        [data-header-scheme="light"] .nav__content .nav__social-links a:hover, .sticky[data-sticky-scheme="light"] .nav__content .nav__social-links a:hover {
        ';
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . "  !important;";
            }
            $realcss.= ' 
        }

    .service__box svg polygon { '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "fill:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        }
        $realcss.= ' 
    }

    .btn--primary.btn--ghost, .btn--primary.btn--fill, .btn--primary.btn--inverse, .btn--primary.btn--inverse:hover, .nav__list .button__nav_2, .cart__sidebar .cart__module.footer a.account, .slcr-sidebar .widget_tag_cloud a:hover, .slcr-sidebar .widget_product_tag_cloud a:hover, .blog__nav li .active, .blog__post blockquote, .meta__large .author__info .external__link, .service__box:hover .service__arrow, .accordion__02 li.active .accordion-header, .fancy-image__01:hover .content, .tabbed_1.border_top .tabs li.active, .tabbed_1.border_bottom .tabs li.active, .tabbed_1.border_left .tabs li.active, .tabbed_1.border_right .tabs li.active, .tabbed_1.border_all .tabs li.active, .hotspot_point:before, [data-hover-target="box"]:hover .main__icon, [data-hover-target="icon"] .main__icon:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, input[type=checkbox]:checked, input[type=radio]:checked, .sharing__list a:hover, .blog__card-01.sticky .meta__container, .blog__card-02.sticky .meta__container .pricing__04, .pricing-features .true-icon{ 
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "border-color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        }
        $realcss.= ' 
         }
    .pricing__04.featured {
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "border-bottom-color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        }
        $realcss.='  
    }

    .woocommerce .product-wrap a.added_to_cart,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .slcr-sidebar .woocommerce-product-search input[type="submit"] { 
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        }
        $realcss.='
    }
        
    .woocommerce .onsale { 
       '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "background-color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " !important;";
        }
        $realcss.=' 
    }   
    .cart__sidebar .sidebar__product:hover h4, .woocommerce a.remove { 
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " !important;";
        }
        $realcss.=' 
    }
        
    .woocommerce ul.products li.product .product-wrap .button:hover, .woocommerce ul.products li.product .product-wrap .button.added, .woocommerce ul.products[data-product-type="modern"] li.product .product-wrap:hover .woocommerce-loop-product__title, .woocommerce [data-product-type="modern"] #respond input#submit.added::after, .woocommerce [data-product-type="modern"] a.button.added::after, .woocommerce [data-product-type="modern"] button.button.added::after, .woocommerce [data-product-type="modern"] input.button.added::after, .woocommerce .price_slider_amount .button, .woocommerce .price_slider_amount .button:hover, .woocommerce .checkout.woocommerce-checkout .create-account span, .woocommerce .shop_table.woocommerce-checkout-review-order-table .cart_item .product-quantity, .woocommerce ul.order_details li strong, .woocommerce-account .u-column1.col-1.woocommerce-Address h3, .woocommerce-account .u-column2.col-2.woocommerce-Address h3, .woocommerce .woocommerce-breadcrumb a:hover, .woocommerce div.product p.stock, .woocommerce .star-rating span::before, .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a { 
        '; 
        if (!empty($slcr_redux['general_settings_color_main_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_color']) . " ;";
        }
        $realcss.='
    }
                
    /** MAIN TEXT COLOR **/
        
    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, .slcr-sidebar #calendar_wrap th, .slcr_recent_posts .recent-post-info a, .slcr-sidebar ul li a .cart__sidebar .sidebar__product .product__meta .quantity, .cart__sidebar .sidebar__product .product__meta .product__price, .pagination__blog .page-numbers, .comment-pagination a , .woocommerce.slcr-sidebar .quantity, .woocommerce .slcr-sidebar .quantity, .blog__nav li a, .blog__nav .blog__search, .pagination-cont .page-numbers, .pricing__01 .pricing-tag, .accordion-header::before, .accordion__03 .accordion-header::before, .price-list .item-price, .page__header .content .breadcrumbs li a, .page__header .content .breadcrumbs li:before, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product p.price del, .woocommerce div.product span.price del, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce .variations label, .woocommerce #reviews #comments h2, .woocommerce-review__author, .woocommerce ul.products[data-product-type="modern"] li.product .product-wrap .price, .woocommerce table.shop_table td.product-name a, .woocommerce .cart-empty, .woocommerce nav.woocommerce-pagination ul li a, .slcr-sidebar .widget_archive li a, .slcr-sidebar .widget_categories li a, .slcr-sidebar .widget_pages li a, .slcr-sidebar ul li a, .blog__card-01 .author__title a, .blog__card-02 .author__title a, .slcr-sidebar .searchform input, .pricing__04 .pricing-amount, .pricing__04 .pricing-symbol, .slcr-sidebar .widget_tag_cloud a, .slcr-sidebarr .widget_product_tag_cloud a, .nav__mobile_list .nav__mobile_item a, .top-bar-content li, .wp-block-archives li a, .wp-block-categories li a, .wp-block-latest-posts li a, .wp-block-latest-comments__comment-meta a, .pingbacklist .comment-author a, .trackbacklist .comment-author a { '; 
        if (!empty($slcr_redux['general_settings_color_main_text_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_text_color']) . " ;";
        }
        $realcss.= ' 
    }
    .woocommerce a.remove:hover { '; 
        if (!empty($slcr_redux['general_settings_color_main_text_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_main_text_color']) . " ;";
        }
        $realcss.= '
        background: none; border-radius: 0px; 
    }

    .blog-header.image-true .post-type-icon, .icon__404 svg path { '; 
        if (!empty($slcr_redux['general_settings_color_main_text_color'])) {
            $realcss.= "fill:" . esc_attr($slcr_redux['general_settings_color_main_text_color']) . " ;";
        }
        $realcss.= ' 
    }

    /** SECOND TEXT COLOR **/

    .second-text-color, .slcr-sidebar #wp-calendar caption, .slcr-sidebar li, .slcr_recent_posts .post-date, .slcr-sidebar #wp-calendar tr td, .blog-post-tags .blog-tags ul li a, .pricing__04 .plan-period, .slcr-sidebar .comment-author-link, .nav__module_side .social__side_mob li a, footer select {
        '; 
        if (!empty($slcr_redux['general_settings_color_second_text_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_second_text_color']) . " ;";
        }
        $realcss.='
    }

    /** THIRD TEXT COLOR **/

    .third-text-color, .blog-post-1_comments .comment .date, .related-articles-sm .article-date, #cancel-comment-reply-link, .blog__card-01 .time__count, .blog__card-01 .post__category, .blog__card-01 .post__meta, .blog__card-02 .post__category, .blog__card-02 .time__count, .blog__card-02 .post__meta, .pingbacklist time, .trackbacklist time {
        '; 
        if (!empty($slcr_redux['general_settings_color_third_text_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_third_text_color']) . " ;";
        }
        $realcss.='
    }


    body {';
        if (!empty($slcr_redux['general_settings_typography_body']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_body']['color']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_body']['font-style']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_body']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_body']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_body']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_body']['font-size']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_body']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_body']['line-height']) . ";";
        }
        $realcss.= '  
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale; ';
        if (!empty($slcr_redux['general_settings_color_main_background_color'])) {
         $realcss.=  'background: '.esc_attr($slcr_redux['general_settings_color_main_background_color']);
        } $realcss.= ';
        
    }';
    if (!empty($slcr_redux['general_settings_main_body_border_width'])) {
        $slcr_general_settings_main_body_border_width=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_main_body_border_width']);
        $realcss.= ' .border__enabled header {
            margin-top: '; $realcss.= esc_attr($slcr_general_settings_main_body_border_width); $realcss.= ';
        }
        .border__enabled footer {
            margin-bottom: '; $realcss.= esc_attr($slcr_general_settings_main_body_border_width); $realcss.= ';
        }';
        }
        $realcss.= ' @media (max-width: 767px) {
            .border__enabled header,
            .border__enabled footer {
                margin: 0;
            }
        }
        .main__border {';  if (!empty($slcr_redux['general_settings_color_main_border_color'])) {
            $realcss.= ' border-color: '.esc_attr($slcr_redux['general_settings_color_main_border_color']);
        } $realcss.= ';';  if (!empty($slcr_redux['general_settings_main_body_border_width'])) {
            $slcr_general_settings_main_body_border_width=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_main_body_border_width']);
            $realcss.=' border-width: '.esc_attr($slcr_general_settings_main_body_border_width).';';
    }  $realcss.= ' 
    }
    h1, .h1{ '; 
        if (!empty($slcr_redux['general_settings_typography_h1']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_h1']['color'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_h1']['font-style']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h1']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h1']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h1']['text-align']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h1']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h1']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h1']['line-height']) . ";";
        }
        $realcss.= ' 
    }
    h2, .h2{ '; 
        if (!empty($slcr_redux['general_settings_typography_h2']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_h2']['color']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_h2']['font-style']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h2']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h2']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h2']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h2']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h2']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h2']['line-height']) . ";";
        }
        $realcss.= '   
    }
    h3, .h3{ '; 
        if (!empty($slcr_redux['general_settings_typography_h3']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_h3']['color']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_h3']['font-style']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h3']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h3']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h3']['text-align']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h3']['font-size']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h3']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h3']['line-height']) . ";";
        }
        $realcss.= '  
    }
    h4, .h4{ '; 
        if (!empty($slcr_redux['general_settings_typography_h4']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_h4']['color'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['general_settings_typography_h4']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h4']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h4']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h4']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h4']['font-size']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h4']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h4']['line-height'] ). ";";
        }
        $realcss.= '  
    }
    h5, .h5{ '; 
        if (!empty($slcr_redux['general_settings_typography_h5']['color'])) {
            $realcss.= "color:" . esc_attr( $slcr_redux['general_settings_typography_h5']['color'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_h5']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h5']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h5']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h5']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h5']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h5']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h5']['line-height'] ). ";";
        }
        $realcss.= '  
    }
    h6, .h6{ '; 
        if (!empty($slcr_redux['general_settings_typography_h6']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['general_settings_typography_h6']['color']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_h6']['font-style']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_h6']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_h6']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_h6']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_h6']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_h6']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_h6']['line-height'] ). ";";
        }
        $realcss.= ' 
    }
    p { '; 
        if (!empty($slcr_redux['general_settings_typography_p_tag']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['color']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['general_settings_typography_p_tag']['font-family']) . ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['general_settings_typography_p_tag']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['general_settings_typography_p_tag']['line-height'] ). ";";
        }
        $realcss.= '  
    }
    .btn--secondary, .btn--secondary.btn--ghost:hover, .btn--secondary.btn--fill:after { '; 
        if (!empty($slcr_redux['general_settings_color_second_color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_second_color']) . " ;";
        } 
        $realcss.='
    }
    .btn--secondary.btn--ghost, .btn--secondary.btn--fill, .btn--secondary.btn--inverse:hover { '; 
        if (!empty($slcr_redux['general_settings_color_second_color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['general_settings_color_second_color']) . " ;";
        } 
        $realcss.='
    }
    .btn--secondary.btn--ghost, .btn--secondary.btn--fill, .btn--secondary.btn--inverse, .btn--secondary.btn--inverse:hover {  '; 
        if (!empty($slcr_redux['general_settings_color_second_color'])) {
            $realcss.= "border-color:" . esc_attr($slcr_redux['general_settings_color_second_color']) . " ;";
        } 
        $realcss.='
    }
    .post-information .blog-post-title { '; 
        if (!empty($slcr_redux['blog-settings-typography-single-post']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-single-post']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['font-size']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-single-post']['line-height']) . ";";
        }
        $realcss.= '
    }
    .blog__card-01 .post__title h3, .blog__card-01 .type__video .post__title, .blog__card-02 .post__title h3 { '; 
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['text-align']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-heading']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-heading']['line-height']) . " !important;";
        }
        $realcss.= '
    }
    @media (max-width: 767px) {
        .blog__card-01 .post__title h3 {
            margin-top: 20px;
            font-size: 21px !important;
            line-height: 28px !important;
        }
        .blog__card-02 .post__title h3 {
            margin-top: 10px;
            font-size: 22px !important;
            line-height: 27px !important;
        }
        .blog__card-02 .post__desc {
            font-size: 14px !important;
            line-height: 21px !important;
        }
    }
    @media (min-width: 767px) and (max-width: 992px) {
        .blog__card-02 .post__title h3 {
            font-size: 1.2em !important;
            line-height: 1.5em !important;
        }
        .blog__card-02 .post__desc {
            font-size: 15px !important;
            line-height: 24px !important;
        }
        .blog__card-01 .post__title h3 {
            font-size: 1.3em !important;
        }
    }
    .blog__card-01 .post__category, .blog__card-02 .post__category { '; 
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['font-size']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-category']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-category']['line-height']) . ";";
        }
        $realcss.= '
    }
    .blog__card-01 .author__title a, .blog__card-02 .author__title a , .type__video .author__title span { '; 
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-name']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['blog-settings-typography-blog-card-author-name']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-blog-card-author-name']['font-family'])  . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-name']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-name']['text-align']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['blog-settings-typography-blog-card-author-name']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-name']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-name']['line-height']) . ";";
        }
        $realcss.= '
    }
    .blog__card-01 .post__meta, .blog__card-02 .post__meta { '; 
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-description']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['blog-settings-typography-blog-card-author-description']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-blog-card-author-description']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['font-weight'])) {
            $realcss.= "font-weight:" .esc_attr( $slcr_redux['blog-settings-typography-blog-card-author-description']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-description']['text-align']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-blog-card-author-description']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-blog-card-author-description']['line-height'])) {
            $realcss.= "line-height:" .esc_attr( $slcr_redux['blog-settings-typography-blog-card-author-description']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .blog-post-1_comments .comment p { '; 
        if (!empty($slcr_redux['blog-settings-color-comment-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-color-comment-color']) . ";";
        }
        $realcss.= '
    }
    .blog-post-1_comments .comment .date { '; 
        if (!empty($slcr_redux['blog-settings-color-comment-date-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-color-comment-date-color']) . ";";
        }
        $realcss.= '
    }
    .blog-post-1_comments .comment h4 { '; 
        if (!empty($slcr_redux['blog-settings-color-comment-author-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-color-comment-author-color'] ). ";";
        }
        $realcss.= '
    }
    .pagination__blog .blog__loadmore, .pagination__blog .blog__loadmore_type_1 { ';
        $realcss.= '; '; 
        if (!empty($slcr_redux['blog-settings-color-loadmore-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['blog-settings-color-loadmore-color']) . ";";
        }
        $realcss.= '
    }
    .blog__card-01 .post__title h3:hover, .blog__card-02 .post__title h3:hover { '; 
        if (!empty($slcr_redux['blog-settings-color-title-hover-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-color-title-hover-color']) . ";";
        }
        $realcss.= '
    }
    .pagination__blog .page-numbers.current { '; 
        if (!empty($slcr_redux['blog-settings-color-pagination-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['blog-settings-color-pagination-color']) . ";";
        }
        $realcss.= '
    }
    .blog__card-01 .type__video .post__title { '; 
        if (!empty($slcr_redux['blog-settings-color-blog-cart-header-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-color-blog-cart-header-color']) . " !important;";
        }
        $realcss.= '
    }
    .blog__post .blog-post-content h1, .blog__post .blog-post-content h2, .blog__post .blog-post-content h3, .blog__post .blog-post-content h4, .blog__post .blog-post-content h5, .blog__post .blog-post-content h6 {
        '; 
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['color']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['text-align']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['font-size']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-content']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-content']['line-height']) . ";";
        }
        $realcss.= '
    }
    .blog__post .blog-post-content, .blog__post .blog-post-content p, .blog__post .blog-post-content a, .blog__post .blog-post-content ul, .blog__post .blog-post-content ol { '; 
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['color'] ). ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-style']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-family']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['text-align']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['font-size']) . ";";
        }
        if (!empty($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['blog-settings-typography-single-post-blog-paragraph']['line-height']) . ";";
        }
        $realcss.= '
        margin-bottom: 20px;
    }'; 
    $realcss.= '  
    .header__nav .sticky__logo,
    .header__nav .main__logo { ';
        if( class_exists('acf') ) {
           $acf_page_header_logo_height = get_field('acf_page_header_logo_height', $acf_page_id);  
        } 
        if (!empty($acf_page_header_logo_height)) {
            $acf_page_header_logo_height=apply_filters( 'slcr_value_parameter_filter', $acf_page_header_logo_height);
            $realcss.= "height:" . esc_attr($acf_page_header_logo_height) . ";";
        }else {
            if (!empty($slcr_redux['header_navigation_logo_height'])) {
                $header_navigation_logo_height_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_logo_height']);
                $realcss.= "height:" . esc_attr($header_navigation_logo_height_filter) . ";";
            }
        }
        $realcss.= '
    }
    .header__primary { ';
        if( class_exists('acf') ) {
           $acf_page_header_header_height = get_field('acf_page_header_header_height', $acf_page_id);  
         } 
         if (!empty($acf_page_header_header_height)) {
            $acf_page_header_header_height=apply_filters( 'slcr_value_parameter_filter', $acf_page_header_header_height);
            $realcss.= "min-height:" . esc_attr($acf_page_header_header_height) . " ;";
            $realcss.= "line-height:" . esc_attr($acf_page_header_header_height) . " ;";
        }else { 
            if (!empty($slcr_redux['header_navigation_height'])) {
                  $header_navigation_height_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height']); 
                $realcss.= "min-height:" . esc_attr($header_navigation_height_filter) . ";";
                $realcss.= "line-height:" . esc_attr($header_navigation_height_filter) . ";";
            }
        }
        if( class_exists('acf') ) {
            $acf_page_header_header_color = get_field('acf_page_header_header_color', $acf_page_id); 
        }
        if(!empty($acf_page_header_header_color)) {
            $realcss.= "background:" .esc_attr( $acf_page_header_header_color ). " ;"; 
        }else {
            if (!empty($slcr_redux['header_navigation_background_color']['rgba'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['header_navigation_background_color']['rgba'] ). " ;";
            }
        }
    $realcss.= '
    }
    .nav__list .submenu__dropdown { '; 
        if (!empty($slcr_redux['header_navigation_height'])) {
            $header_navigation_height_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height']);
            $realcss.= "top:" . esc_attr($header_navigation_height_filter) . ";";
        }
        $realcss.= '
    }
    .header__secondary { ';
        if (!empty($slcr_redux['header_navigation_top_bar_background_color']['rgba'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header_navigation_top_bar_background_color']['rgba']) . ";";  
        }
    $realcss.= '
    }
    @media (max-width: 767px) {
        .header__nav .sticky__logo,
        .header__nav .main__logo { '; 
            if( class_exists('acf') ) {
                $acf_page_header_logo_height_mobile = get_field('acf_page_header_logo_height_mobile', $acf_page_id);
            }    
            if (!empty($acf_page_header_logo_height_mobile)) {
                $acf_page_header_logo_height_mobile=apply_filters( 'slcr_value_parameter_filter', $acf_page_header_logo_height_mobile);
                $realcss.= "height:" . esc_attr($acf_page_header_logo_height_mobile) . " ;";
            }else {
                if (!empty($slcr_redux['header_navigation_logo_height_mobile'])) {
                    $header_navigation_logo_height_mobile_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_logo_height_mobile']);
                        $realcss.= "height:" . esc_attr($header_navigation_logo_height_mobile_filter ). " ;";
                }
            }
            $realcss.= '
        }
        .header__primary { '; 
            if( class_exists('acf') ) {
                $acf_page_header_header_height_mobile = get_field('acf_page_header_header_height_mobile', $acf_page_id);
            }
            if (!empty($acf_page_header_header_height_mobile)) {
                $acf_page_header_header_height_mobile=apply_filters( 'slcr_value_parameter_filter', $acf_page_header_header_height_mobile);
                $realcss.= "min-height:" . esc_attr($acf_page_header_header_height_mobile) . " !important;";
                $realcss.= "line-height:" . esc_attr($acf_page_header_header_height_mobile ). " !important;";
            }else {
                if (!empty($slcr_redux['header_navigation_height_mobile'])) {
                    $header_navigation_height_mobile_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height_mobile']);
                    $realcss.= "min-height:" . esc_attr($header_navigation_height_mobile_filter). " !important;";
                    $realcss.= "line-height:" . esc_attr($header_navigation_height_mobile_filter) . " !important;";
                }
            }
            $realcss.= '
        }
    }
    .nav__main .nav__list .nav__item { ';
        if (!empty($slcr_redux['header_navigation_nav_main_spacing'])) {
            $header_navigation_nav_main_spacing_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_nav_main_spacing']);
            $realcss.= 'margin-right: '.esc_attr($header_navigation_nav_main_spacing_filter).';';
        }
        $realcss.= '
    } 
    .nav__second .nav__list .nav__item { ';
        if (!empty($slcr_redux['header_navigation_nav_secondary_spacing'])) {
            $header_navigation_nav_secondary_spacing_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_nav_secondary_spacing']);
            $realcss.= 'margin-right: '.esc_attr($header_navigation_nav_secondary_spacing_filter).';';
        }
        $realcss.= '
    } 
    [data-header-scheme="light"] .nav__main .nav__list .nav__item a,
    .sticky[data-sticky-scheme="light"] .nav__main .nav__list .nav__item a,
    [data-header-scheme="dark"] .nav__main .nav__list .nav__item a,
    .sticky[data-sticky-scheme="dark"] .nav__main .nav__list .nav__item a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-main']['color']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-main']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-main']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-main']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-main']['text-align']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-main']['font-size']) . ";";
        }
        $realcss.= '  
            opacity: 1; 
    } 
    [data-header-scheme="dark"] .nav__main .nav__list .nav__item a,
    .sticky[data-sticky-scheme="dark"] .nav__main .nav__list .nav__item a {  
        color: #fff;
        opacity: .8;
    }
    [data-header-scheme="light"] .nav__second .nav__list .nav__item a,
    .sticky[data-sticky-scheme="light"] .nav__second .nav__list .nav__item a,
    [data-header-scheme="dark"] .nav__second .nav__list .nav__item a,
    .sticky[data-sticky-scheme="dark"] .nav__second .nav__list .nav__item a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['color']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-secondary']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-secondary']['font-size']) . ";";
        }
        $realcss.= '
        opacity: 1; 
    }
    [data-header-scheme="dark"] .nav__second .nav__list .nav__item a,
    .sticky[data-sticky-scheme="dark"] .nav__second .nav__list .nav__item a {  
        color: #fff;
        opacity: .8;
    } 
    .header__secondary .top__content { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['color']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-style']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-family']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-weight']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['text-align']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['font-size']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text']['line-height']) . ";";
        }
        $realcss.= '
    }
    [data-header-scheme="light"] .nav__main .nav__list .submenu__dropdown li a,
    [data-header-scheme="dark"] .nav__main .nav__list .submenu__dropdown li a,
    [data-header-scheme="light"] .nav__main .nav__list .submenu__dropdown li a:hover,
    [data-header-scheme="dark"] .nav__main .nav__list .submenu__dropdown li a:hover,
    [data-header-scheme="light"] .nav__second .nav__list .submenu__dropdown li a,
    [data-header-scheme="dark"] .nav__second .nav__list .submenu__dropdown li a ,
    [data-header-scheme="light"] .nav__second .nav__list .submenu__dropdown li a:hover,
    [data-header-scheme="dark"] .nav__second .nav__list .submenu__dropdown li a:hover,
    .sticky[data-sticky-scheme="light"] .nav__main .nav__list .submenu__dropdown li a,
    .sticky[data-sticky-scheme="dark"] .nav__main .nav__list .submenu__dropdown li a,
    .sticky[data-sticky-scheme="light"] .nav__second .nav__list .submenu__dropdown li a,
    .sticky[data-sticky-scheme="dark"] .nav__second .nav__list .submenu__dropdown li a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown']['color']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['header-navigation-settings-typography-dropdown']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-dropdown']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['font-weight'])) {
            $realcss.= "font-weight:" .esc_attr( $slcr_redux['header-navigation-settings-typography-dropdown']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['text-align'])) {
            $realcss.= "text-align:" .esc_attr( $slcr_redux['header-navigation-settings-typography-dropdown']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown']['font-size']) . ";";
        }
        $realcss.= '
        opacity: 1;
    }
    .nav__list .nav__item .submenu__dropdown .make__title .title__text,
    .nav__list .nav__item .submenu__dropdown .make__title .title__text:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-title']['color']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-style']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-weight']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-title']['text-align']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-title']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['header-navigation-settings-typography-dropdown-title']['font-size'] ). " !important;";
        }
        $realcss.= '
    }
    .nav__list .mega__dropdown .submenu__dropdown { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-mega-dropdown-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-mega-dropdown-color']) . ";";
        }
        $realcss.= '
    }
    .nav__list .submenu__dropdown { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-color']) . ";";
        }
        $realcss.= '
    }
    .nav__content .nav__social-links li { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-spacing'])) {
                $header_navigation_settings_typography_primary_icon_spacing_filters=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-primary-icon-spacing']);
            $realcss.= "padding: 0 " .esc_attr( $header_navigation_settings_typography_primary_icon_spacing_filters) . ";";
        }
        $realcss.= '
    }
    [data-header-scheme="light"] .nav__content .nav__social-links a,
    .sticky[data-sticky-scheme="light"] .nav__content .nav__social-links a, 
    [data-header-scheme="dark"] .nav__content .nav__social-links a,
    .sticky[data-sticky-scheme="dark"] .nav__content .nav__social-links a{ '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-font-size'])) {
                $header_navigation_settings_typography_primary_icon_font_size_filters=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-primary-icon-font-size']);
            $realcss.= "font-size:" . esc_attr($header_navigation_settings_typography_primary_icon_font_size_filters). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-color-social'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-primary-icon-color-social']) . " !important;";
        }
        $realcss.= '
    }
    [data-header-scheme="dark"] .nav__content .nav__social-links a, .sticky[data-sticky-scheme="dark"] .nav__content .nav__social-links a {
        color: #fff !important;
        opacity: .8;
    }
    .header__secondary .secondary__social li { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-spacing'])) {
                $header_navigation_settings_typography_primary_icon_spacing_filters=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-primary-icon-spacing']);
            $realcss.= "padding: 0 " . esc_attr($header_navigation_settings_typography_primary_icon_spacing_filters) . ";";
        }
        $realcss.= '
    }
    .header__secondary .secondary__social li a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-font-size'])) {
                $header_navigation_settings_typography_primary_icon_font_size_filters=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-primary-icon-font-size']);
            $realcss.= "font-size:" . esc_attr($header_navigation_settings_typography_primary_icon_font_size_filters) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-color-social'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-primary-icon-color-social'] ). " !important;";
        }
        $realcss.= '
    }
    .nav__mobile_list .nav__mobile_item a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['font-style'])) {
          $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['text-align']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-main-mobile']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-typography-main-mobile']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .sub-menu .nav__mobile_item a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['font-size']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-typography-dropdown-mobile']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .text__mob_side { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['color']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['text-align']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['font-size']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['line-height'])) {
            $realcss.= "line-height:" .esc_attr( $slcr_redux['header-navigation-settings-typography-top-bar-text-mobile']['line-height']) . ";";
        }
        $realcss.= '
    } 
    .nav__module_side .social__side_mob li { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-icon-spacing-mobile'])) {
            $header_navigation_settings_typography_top_bar_icon_spacing_mobile_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-top-bar-icon-spacing-mobile']);
            $realcss.= "margin-right:" . esc_attr($header_navigation_settings_typography_top_bar_icon_spacing_mobile_filter). ";";
        }
        $realcss.= '
    }
    .nav__module_side .social__side_mob li a { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-icon-font-size-mobile'])) {
            $header_navigation_settings_typography_top_bar_icon_font_size_mobile_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-typography-top-bar-icon-font-size-mobile']);
            $realcss.= "font-size:" . esc_attr($header_navigation_settings_typography_top_bar_icon_font_size_mobile_filter ). ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-typography-top-bar-icon-color-mobile'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-top-bar-icon-color-mobile']) . "  !important;";
        }
        $realcss.= '
    }
    .header__nav .nav__mobile { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-background-color-mobile'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-background-color-mobile'] ). ";";
        }
        $realcss.= '
    }
    .mob__trigger { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-background-color-mobile'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-background-color-mobile'] ). ";";
        }
        $realcss.= '
    }
    .nav__mobile_mod .nav__background  { ';
        if (!empty($slcr_redux['header-navigation-settings-typography-background-color-mobile'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-background-color-mobile'] ). ";";
        }
        $realcss.= '
    }
    [data-header-scheme="light"] .nav__main .nav__list .nav__item:hover .mouseover__call,
    [data-header-scheme="light"] .nav__second .nav__list .nav__item:hover .mouseover__call,
    [data-header-scheme="light"] .nav__main .nav__list .active.link__active .mouseover__call,
    [data-header-scheme="light"] .nav__main .nav__list .active.link__active .mouseover__call:hover,
    [data-header-scheme="light"] .nav__second .nav__list .active.link__active .mouseover__call,
    [data-header-scheme="light"] .nav__second .nav__list .active.link__active .mouseover__call:hover,
    .sticky[data-sticky-scheme="light"] .nav__main .nav__list .nav__item:hover .mouseover__call,
    .sticky[data-sticky-scheme="light"] .nav__second .nav__list .nav__item:hover .mouseover__call,
    .sticky[data-sticky-scheme="light"] .nav__main .nav__list .active.link__active .mouseover__call,
    .sticky[data-sticky-scheme="light"] .nav__main .nav__list .active.link__active .mouseover__call:hover,
    .sticky[data-sticky-scheme="light"] .nav__second .nav__list .active.link__active .mouseover__call,
    .sticky[data-sticky-scheme="light"] .nav__second .nav__list .active.link__active .mouseover__call:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-li-hover-color-main'])) {
            $realcss.= "color: " . esc_attr($slcr_redux['header-navigation-settings-li-hover-color-main'] ). ";
            opacity: 1;";
        }
        $realcss.= '
    }
    .ham__menu .line { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-close-color-mobile'])) {
            $realcss.= "background:" .esc_attr( $slcr_redux['header-navigation-settings-typography-close-color-mobile'] ). ";";
        }
        $realcss.= '
    }
    .nav__mobile .nav__close i { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-close-color-mobile'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-close-color-mobile'] ). ";";
        }
        $realcss.= '
    }
    .nav__list .mega__dropdown .submenu__dropdown.child .dropdown__item:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-mega-dropdown-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-mega-dropdown-color'] ). ";";
        }
        $realcss.= ' 
    }
    .nav__list .submenu__dropdown .dropdown__item:hover,
    .nav__list .submenu__dropdown .dropdown__item .active__dropdown-item { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-mega-dropdown-li-hover-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-mega-dropdown-li-hover-color'] ). ";
            border-radius: 5px;";
        }
        $realcss.= '
    }
    .make__title .submenu__dropdown .dropdown__item:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-mega-dropdown-li-hover-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-typography-mega-dropdown-li-hover-color'] ). " !important;
            border-radius: 5px;";
        }
        $realcss.= '
    }
    .sticky[data-sticky-scheme="light"] .nav__content .mob__toggle .svg__fill,
    [data-header-scheme="light"] .nav__content .mob__toggle .svg__fill { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-main-icon-color'])) {
            $realcss.= "fill:" . esc_attr($slcr_redux['header-navigation-settings-typography-primary-main-icon-color'] ). " !important;";
        }
        $realcss.= '
    }
    .sticky[data-sticky-scheme="light"] .nav__content .nav__search .svg__fill,
    .sticky[data-sticky-scheme="light"] .nav__content .nav__cart .svg__fill,
    [data-header-scheme="light"] .nav__content .nav__search .svg__fill,
    [data-header-scheme="light"] .nav__content .nav__cart .svg__fill { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-primary-icon-color'])) {
            $realcss.= "fill:" . esc_attr($slcr_redux['header-navigation-settings-typography-primary-icon-color'] ). " !important;";
        }
        $realcss.= '
    }
    
    [data-header-scheme="dark"] .nav__content .svg__fill,
    .sticky[data-sticky-scheme="dark"] .nav__content .svg__fill {
        fill: #fff !important;
        opacity: .8;
    }

    [data-header-scheme="dark"] .active__dropdown-item,
    [data-header-scheme="light"] .active__dropdown-item,
    .sticky[data-sticky-scheme="dark"] .active__dropdown-item,
    .sticky[data-sticky-scheme="light"] .active__dropdown-item,
    .nav__list .submenu__dropdown .dropdown__item .child__hover:hover,
    .nav__list .submenu__dropdown .white__hovered { '; 
        if (!empty($slcr_redux['header-navigation-settings-typography-mega-dropdown-text-hover-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-typography-mega-dropdown-text-hover-color'] ). "!important ;";
        }
        $realcss.= '
    }
    .nav__list .button__nav_1 { '; 
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['font-style'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['font-weight'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button-color'] ). " !important;";
        }
        if (isset($slcr_redux['header-navigation-settings-button-simple_button-border-radius']) && $slcr_redux['header-navigation-settings-button-simple_button-border-radius']!="") {
            $header_navigation_settings_button_simple_button_border_radius_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-simple_button-border-radius']);
            $realcss.= "border-radius:" . esc_attr($header_navigation_settings_button_simple_button_border_radius_filter). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button-top-padding'])) {
            $header_navigation_settings_button_simple_button_top_padding_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-simple_button-top-padding']);
            $realcss.= "padding-top:" .esc_attr( $header_navigation_settings_button_simple_button_top_padding_filter ). ";";
            $realcss.= "padding-bottom:" . esc_attr($header_navigation_settings_button_simple_button_top_padding_filter ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button-left-padding'])) {
            $header_navigation_settings_button_simple_button_left_padding_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-simple_button-left-padding']);
            $realcss.= "padding-left:" . esc_attr($header_navigation_settings_button_simple_button_left_padding_filter). ";";
            $realcss.= "padding-right:" . esc_attr($header_navigation_settings_button_simple_button_left_padding_filter) . ";";
        }
        $realcss.= '
    }
    .nav__list .button__nav_1:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-button-simple_button-text-color-hover'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button-text-color-hover'] ). " !important;";
        }
         if (!empty($slcr_redux['header-navigation-settings-button-simple_button-color-hover'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-button-simple_button-color-hover'] ). " !important;";
        }
        $realcss.= '
    }
    .nav__list .button__nav_2 { '; 
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['font-style']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['font-weight']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-color'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button-color'] ). " !important;";
        }
        if (isset($slcr_redux['header-navigation-settings-button-bordered_button-border-radius']) && $slcr_redux['header-navigation-settings-button-bordered_button-border-radius']!="") {
            $header_navigation_settings_button_bordered_button_border_radius_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-bordered_button-border-radius']);
            $realcss.= "border-radius:" . esc_attr($header_navigation_settings_button_bordered_button_border_radius_filter) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-top-padding'])) {
            $header_navigation_settings_button_bordered_button_top_padding_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-bordered_button-top-padding']);
            $realcss.= "padding-top:" . esc_attr($header_navigation_settings_button_bordered_button_top_padding_filter). ";";
            $realcss.= "padding-bottom:" . esc_attr($header_navigation_settings_button_bordered_button_top_padding_filter) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-left-padding'])) {
            $header_navigation_settings_button_bordered_button_left_padding_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header-navigation-settings-button-bordered_button-left-padding']);
            $realcss.= "padding-left:" .esc_attr( $header_navigation_settings_button_bordered_button_left_padding_filter). ";";
            $realcss.= "padding-right:" . esc_attr($header_navigation_settings_button_bordered_button_left_padding_filter) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-border-color'])) {
            $realcss.= "border-color:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button-border-color'] ). " !important;";
        }
        $realcss.= '
    }
    .nav__list .button__nav_2:hover { '; 
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-text-hover-color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button-text-hover-color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-color-hover'])) {
            $realcss.= "background:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button-color-hover'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-button-bordered_button-border-color-hover'])) {
            $realcss.= "border-color:" . esc_attr($slcr_redux['header-navigation-settings-button-bordered_button-border-color-hover'] ). " !important;";
        }
        $realcss.= '
    }
    .header__nav.sticky .header__primary { '; 
        if (!empty($slcr_redux['header_navigation_height_sticky_header'])) {
                $header_navigation_height_sticky_header_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height_sticky_header']);
            $realcss.= "min-height:" .esc_attr( $header_navigation_height_sticky_header_filter). ";";
        }
        if (!empty($slcr_redux['header_navigation_height_sticky_header'])) {
            $header_navigation_height_sticky_header_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height_sticky_header']);
            $realcss.= "line-height:" . esc_attr($header_navigation_height_sticky_header_filter). ";";
        }
        if( class_exists('acf') ) {
              $acf_page_header_header_color_sticky_header = get_field('acf_page_header_header_color_sticky_header', $acf_page_id); 
        }
        if( !empty($acf_page_header_header_color_sticky_header)) {
                $realcss.= "background:" .esc_attr( $acf_page_header_header_color_sticky_header ). " ;"; 
        }else {
            if (!empty($slcr_redux['header_navigation_background_color_sticky_header']['rgba'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['header_navigation_background_color_sticky_header']['rgba'] ). " ;";
            }
        }
        $realcss.= '
    }
    .sticky .nav__list .submenu__dropdown { '; 
        if (!empty($slcr_redux['header_navigation_height_sticky_header'])) {
            $header_navigation_height_sticky_header_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['header_navigation_height_sticky_header']);
            $realcss.= "top:" . esc_attr($header_navigation_height_sticky_header_filter) . ";";
        }
        $realcss.= '
    }
    .footer__bottom { '; 
        $acf_page_footer_background_type = ""; 
        if( class_exists('acf') ) {
          $acf_page_footer_background_type = get_field('acf_page_footer_background_type', $acf_page_id); 
        } 
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "color" && $acf_page_footer_background_type == "color" ) {
            $footer_settings_footer_background_image_background_color_copyright="";
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color-copyright'])) {
                $footer_settings_footer_background_image_background_color_copyright=$slcr_redux['footer-settings-footer-background-image-background-color-copyright'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color_copyright = get_field('acf_page_footer_background_color_copyright', $acf_page_id); 
            }    
            if ( !empty($acf_page_footer_background_color_copyright) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color_copyright=$acf_page_footer_background_color_copyright;
            }
            if (!empty($footer_settings_footer_background_image_background_color_copyright)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color_copyright) . " !important;";
            }
        }
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "image" && $acf_page_footer_background_type == "color" ) {
            $footer_settings_footer_background_image_background_color_copyright="";
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color-copyright'])) {
                $footer_settings_footer_background_image_background_color_copyright=$slcr_redux['footer-settings-footer-background-image-background-color-copyright'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color_copyright = get_field('acf_page_footer_background_color_copyright', $acf_page_id); 
            }    
            if ( !empty($acf_page_footer_background_color_copyright) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color_copyright=$acf_page_footer_background_color_copyright;
            }
            if (!empty($footer_settings_footer_background_image_background_color_copyright)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color_copyright) . " !important;";
            }
        }
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "color" && $acf_page_footer_background_type != "image" ) {
            $footer_settings_footer_background_image_background_color_copyright="";
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color-copyright'])) {
                $footer_settings_footer_background_image_background_color_copyright=$slcr_redux['footer-settings-footer-background-image-background-color-copyright'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color_copyright = get_field('acf_page_footer_background_color_copyright', $acf_page_id); 
            }    
            if ( !empty($acf_page_footer_background_color_copyright) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color_copyright=$acf_page_footer_background_color_copyright;
            }
            if (!empty($footer_settings_footer_background_image_background_color_copyright)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color_copyright) . " !important;";
            }
        } 
        if (!empty($slcr_redux['footer-settings-footer-main-footer-padding-small'])) {
            $footer_settings_footer_main_footer_padding_small_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['footer-settings-footer-main-footer-padding-small']);
            $realcss.= "padding:" . esc_attr($footer_settings_footer_main_footer_padding_small_filter) . " 0;";
        }
        $realcss.= '
    }
    .footer__main { '; 
        $acf_page_footer_background_type = "";
        if( class_exists('acf') ) {
            $acf_page_footer_background_type = get_field('acf_page_footer_background_type', $acf_page_id); 
        }
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "color" && $acf_page_footer_background_type == "color" ) {
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color'])) {
                $footer_settings_footer_background_image_background_color=$slcr_redux['footer-settings-footer-background-image-background-color'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color = get_field('acf_page_footer_background_color', $acf_page_id);  
            }
            if ( !empty($acf_page_footer_background_color) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color=$acf_page_footer_background_color;
            }
            if (!empty($footer_settings_footer_background_image_background_color)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color) . " !important;";
            }
        }
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "image" && $acf_page_footer_background_type == "color" ) {
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color'])) {
                $footer_settings_footer_background_image_background_color=$slcr_redux['footer-settings-footer-background-image-background-color'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color = get_field('acf_page_footer_background_color', $acf_page_id);  
            }
            if ( !empty($acf_page_footer_background_color) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color=$acf_page_footer_background_color;
            }
            if (!empty($footer_settings_footer_background_image_background_color)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color) . " !important;";
            }
        }
        if ($slcr_redux['footer-settings-footer-backgroud-type'] == "color" && $acf_page_footer_background_type != "image" ) {
            if (!empty($slcr_redux['footer-settings-footer-background-image-background-color'])) {
                $footer_settings_footer_background_image_background_color=$slcr_redux['footer-settings-footer-background-image-background-color'];
            }
            if( class_exists('acf') ) {
                $acf_page_footer_background_color = get_field('acf_page_footer_background_color', $acf_page_id);  
            }
            if ( !empty($acf_page_footer_background_color) && $acf_page_footer_background_type == "color"  ){
                $footer_settings_footer_background_image_background_color=$acf_page_footer_background_color;
            }
            if (!empty($footer_settings_footer_background_image_background_color)) {
                $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color) . " !important;";
            }
        }
        if (!empty($slcr_redux['footer-settings-footer-main-footer-padding'])) {
            $footer_settings_footer_main_footer_padding_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['footer-settings-footer-main-footer-padding']);
            $realcss.= "padding:" .esc_attr( $footer_settings_footer_main_footer_padding_filter ). " 0;";
        }
        $realcss.= '
    }'; 
    $acf_page_footer_background_type = "";
    if( class_exists('acf') ) {
        $acf_page_footer_background_type = get_field('acf_page_footer_background_type', $acf_page_id);   
    }
    if (!empty($slcr_redux['footer-settings-footer-background-image']['url']) || !empty($acf_page_footer_background_type)) {
        $realcss.= '[data-bg-overlay].footer__cont:before { '; 
        $footer_settings_footer_background_image_background_color_overlay="";
        if(isset($slcr_redux['footer-settings-footer-background-image-background-color-overlay'])){
            $footer_settings_footer_background_image_background_color_overlay=$slcr_redux['footer-settings-footer-background-image-background-color-overlay'];
        }
        if( class_exists('acf') ) {
            $acf_page_footer_background_image_overlay_opacity_color = get_field('acf_page_footer_background_image_overlay_opacity_color', $acf_page_id); 
        }         
        if ( !empty($acf_page_footer_background_image_overlay_opacity_color) && $acf_page_footer_background_type == "image" ){
          $footer_settings_footer_background_image_background_color_overlay=$acf_page_footer_background_image_overlay_opacity_color;
        }
        if (!empty($footer_settings_footer_background_image_background_color_overlay)) {
            $realcss.= "background-color:" . esc_attr($footer_settings_footer_background_image_background_color_overlay ). " !important;";
        }
        $realcss.= '}';
    }
    $realcss.= '.footer__cont .footer__social li a { '; 
    if (!empty($slcr_redux['footer-settings-footer-primary-icon-color'])) {
        $realcss.= "color:" .esc_attr( $slcr_redux['footer-settings-footer-primary-icon-color'] ). " !important ;";
    }
    if (!empty($slcr_redux['footer-settings-footer-primary-icon-font-size'])) {
        $footer_settings_footer_primary_icon_font_size_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['footer-settings-footer-primary-icon-font-size']);
        $realcss.= "font-size:" . esc_attr($footer_settings_footer_primary_icon_font_size_filter ). " !important;";
    }
    $realcss.= '
    }';
    $racf_footer_settings_logo_height="30px";
    if (!empty($slcr_redux['footer_settings_logo_height'])) {
        $racf_footer_settings_logo_height = apply_filters( 'slcr_value_parameter_filter',$slcr_redux['footer_settings_logo_height']); 
    }
    if( class_exists('acf') ) {
        $acf_footer_settings_logo_height = get_field('acf_page_footer_logo_height', $acf_page_id);
        $acf_footer_settings_logo_height = apply_filters( 'slcr_value_parameter_filter',$acf_footer_settings_logo_height); 
        if (!empty($acf_footer_settings_logo_height)) {
            $racf_footer_settings_logo_height = $acf_footer_settings_logo_height; 
        }
    }
    $realcss.= '
    .footer__logo img {;
        height:'.$racf_footer_settings_logo_height.';
    }
    .footer__cont .footer__social li { '; 
        if (!empty($slcr_redux['footer-settings-footer-primary-icon-spacing'])) {
            $footer_settings_footer_primary_icon_spacing_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['footer-settings-footer-primary-icon-spacing']);
            $realcss.= "margin-right:" . esc_attr($footer_settings_footer_primary_icon_spacing_filter ). " !important;";
        }
        $realcss.= '
    }
    .footer__cont .footer__social li a:hover {
        opacity: 1; '; 
        if (!empty($slcr_redux['footer-settings-footer-primary-icon-color-hover'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['footer-settings-footer-primary-icon-color-hover'] ). " !important ;";
        }
        $realcss.= '
    }
    .footer__desc p { '; 
        if (!empty($slcr_redux['header-navigation-settings-description']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-description']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-description']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-description']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-description']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-description']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-description']['font-size']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-description']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-description']['line-height'] ). ";";
        }
        $realcss.= '
    }
    [data-footer-layout="second"] .copyright__text { '; 
        if (!empty($slcr_redux['header-navigation-settings-copyright']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['color'] ). ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['font-style'] ). ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-copyright']['font-family']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['font-weight'])) {
            $realcss.= "font-weight:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['font-weight'] ). ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['text-align']) . ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-size'] ). ";";
        }
         if (!empty($slcr_redux['header-navigation-settings-copyright']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['line-height']) . ";";
        }
        $realcss.= '
    }
    [data-footer-layout="third"] .copyright__text { '; 
        if (!empty($slcr_redux['header-navigation-settings-copyright']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-copyright']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['text-align']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['line-height']) . ";";
        }
        $realcss.= '
    }
    [data-footer-layout="fourth"] .copyright__text { '; 
        if (!empty($slcr_redux['header-navigation-settings-copyright']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-copyright']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['font-size']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['line-height'] ). ";";
        }
        $realcss.= '
    }
    [data-footer-layout="fifth"] .copyright__text { '; 
        if (!empty($slcr_redux['header-navigation-settings-copyright']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['color'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-copyright']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['text-align'])) {
            $realcss.= "text-align:" .esc_attr( $slcr_redux['header-navigation-settings-copyright']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['line-height']) . ";";
        }
        $realcss.= '
    }
    .footer__cont .copyright__text { '; 
        if (!empty($slcr_redux['header-navigation-settings-copyright']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['color']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-style']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-copyright']['font-family']) . ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['header-navigation-settings-copyright']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-copyright']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .footer__cont .widget-title, .footer__cont .title { '; 
        if (!empty($slcr_redux['header-navigation-settings-title']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-title']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-title']['font-style'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-title']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-title']['font-weight'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['header-navigation-settings-title']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['header-navigation-settings-title']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-title']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-title']['line-height'] ). " !important;";
        }
        $realcss.= '
    }
    .footer__cont .widget__area a{ '; 
        if (!empty($slcr_redux['header-navigation-settings-link']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['header-navigation-settings-link']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['font-style'])) {
            $realcss.= "font-style:" .esc_attr( $slcr_redux['header-navigation-settings-link']['font-style'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-link']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-link']['font-weight']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['text-align'])) {
            $realcss.= "text-align:" .esc_attr( $slcr_redux['header-navigation-settings-link']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['header-navigation-settings-link']['font-size']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-link']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-link']['line-height']) . " !important;";
        }
        $realcss.= '
    }
    .footer__cont .page_item a, .footer__cont .cat-item a, .footer__cont .menu-item a { '; 
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['header-navigation-settings-menu-link']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-menu-link']['font-style']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-menu-link']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-menu-link']['font-weight']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['text-align'])) {
            $realcss.= "text-align:" .esc_attr( $slcr_redux['header-navigation-settings-menu-link']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['header-navigation-settings-menu-link']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-menu-link']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-menu-link']['line-height'] ). " !important;";
        }
        $realcss.= '
    }
    .textwidget p{ '; 
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['header-navigation-settings-widget-text']['color'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['header-navigation-settings-widget-text']['font-style']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['header-navigation-settings-widget-text']['font-family']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['header-navigation-settings-widget-text']['font-weight']) . " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['text-align'])) {
            $realcss.= "text-align:" .esc_attr( $slcr_redux['header-navigation-settings-widget-text']['text-align'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['header-navigation-settings-widget-text']['font-size'] ). " !important;";
        }
        if (!empty($slcr_redux['header-navigation-settings-widget-text']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['header-navigation-settings-widget-text']['line-height'] ). " !important;";
        }
        $realcss.= '
    } ';
    if (!empty($slcr_redux['page-header-settings-breadcrumb-image-overlay'])) {
        $page_header_settings_breadcrumb_image_overlay = $slcr_redux['page-header-settings-breadcrumb-image-overlay'];
    } 
    if( class_exists('acf') ) {
        if(!empty(get_field('acf_page_header_options_color_87656465', $acf_page_id))){
             $page_header_settings_breadcrumb_image_overlay = get_field('acf_page_header_options_color_87656465', $acf_page_id);   
        }   
    } 
    $realcss.= '.page__header[data-bg-overlay]:before {
        content: ""; ';
        if (!empty($page_header_settings_breadcrumb_image_overlay)) {
            $realcss.= ' background-color: '; $realcss.= esc_attr($page_header_settings_breadcrumb_image_overlay);
        }
        $realcss.= '; 
    }
    .page__header .content .inner h1 { '; 
        if (!empty($slcr_redux['page-header-settings-title-typography']['color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['page-header-settings-title-typography']['color'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['page-header-settings-title-typography']['font-style']) . ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['page-header-settings-title-typography']['font-family']) . ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['font-weight'])) {
            $realcss.= "font-weight:" . esc_attr($slcr_redux['page-header-settings-title-typography']['font-weight'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['page-header-settings-title-typography']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['font-size'])) {
            $realcss.= "font-size:" . esc_attr($slcr_redux['page-header-settings-title-typography']['font-size'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-title-typography']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['page-header-settings-title-typography']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .page__header .content .inner p { '; 
        if (!empty($slcr_redux['page-header-settings-description-typography']['color'])) {
            $realcss.= "color:" . esc_attr($slcr_redux['page-header-settings-description-typography']['color'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['font-style'])) {
            $realcss.= "font-style:" . esc_attr($slcr_redux['page-header-settings-description-typography']['font-style'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['font-family'])) {
            $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['page-header-settings-description-typography']['font-family']) . ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['font-weight'])) {
            $realcss.= "font-weight:" .esc_attr( $slcr_redux['page-header-settings-description-typography']['font-weight']) . ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['text-align'])) {
            $realcss.= "text-align:" . esc_attr($slcr_redux['page-header-settings-description-typography']['text-align'] ). ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['font-size'])) {
            $realcss.= "font-size:" .esc_attr( $slcr_redux['page-header-settings-description-typography']['font-size']) . ";";
        }
        if (!empty($slcr_redux['page-header-settings-description-typography']['line-height'])) {
            $realcss.= "line-height:" . esc_attr($slcr_redux['page-header-settings-description-typography']['line-height'] ). ";";
        }
        $realcss.= '
    }
    .page__header .content .breadcrumbs li a { '; 
        if (!empty($slcr_redux['page-header-settings-breadcrumb-color'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['page-header-settings-breadcrumb-color'] ). " ;";
        }
        $realcss.= '
    }
    .page__header .content .breadcrumbs li a:hover { '; 
        if (!empty($slcr_redux['page-header-settings-breadcrumb-color-hover'])) {
            $realcss.= "color:" .esc_attr( $slcr_redux['page-header-settings-breadcrumb-color-hover'] ). " ;";
        }
        $realcss.= '
    }';
    global $woocommerce;
    if ($woocommerce) {
        $realcss.= '
        .shop__archive_header h1 { '; 
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-header-title-typography']['color']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['font-style'])) {
                $realcss.= "font-style:" . esc_attr($slcr_redux['woocommerce-settings-header-title-typography']['font-style'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['woocommerce-settings-header-title-typography']['font-family']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['woocommerce-settings-header-title-typography']['font-weight'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['text-align'])) {
                $realcss.= "text-align:" .esc_attr( $slcr_redux['woocommerce-settings-header-title-typography']['text-align'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['font-size'])) {
                $realcss.= "font-size:" .esc_attr( $slcr_redux['woocommerce-settings-header-title-typography']['font-size'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-header-title-typography']['line-height'])) {
                $realcss.= "line-height:" .esc_attr( $slcr_redux['woocommerce-settings-header-title-typography']['line-height']) . ";";
            }
            $realcss.= '   
        }';
    }
    $realcss.= '
    @-webkit-keyframes color {
        0% { stroke: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_color_1']); $realcss.= '; }
        50% { stroke: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_color_2']); $realcss.= '; }
        100% { stroke: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_color_3']); $realcss.= '; }
    }
    @keyframes color {
        0% { stroke: '; $realcss.= esc_attr( $slcr_redux['general_settings_functionality_preloader_color_1']); $realcss.= '; }
        50% { stroke: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_color_2']); $realcss.= '; }
        100% { stroke: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_color_3']); $realcss.= '; }
    } ';
    if (!empty($slcr_redux['general_settings_functionality_preloader_background'])){
        $realcss.= '.load__wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: '; $realcss.= esc_attr($slcr_redux['general_settings_functionality_preloader_background']); $realcss.= ';
            z-index: 9999999999;
        }';  
    }
    $realcss.= 'main.main__content, .woo_main_content { 
        width: 100%; float: left; ';  
        $acf_page_options_heading_main_content_padding_top="";
        if( class_exists('acf') ) {
            $acf_page_options_heading_main_content_padding_top = get_field('acf_page_options_heading_main_content_padding_top', $acf_page_id);  
        }
        if ($acf_page_options_heading_main_content_padding_top==NULL){ 
            $slcr_general_settings_main_content_padding_top=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_main_content_padding_top']); 
            $realcss.= ' padding-top: '; $realcss.= esc_attr($slcr_general_settings_main_content_padding_top); $realcss.= '; '; 
        }else {
            $slcr_general_settings_main_content_padding_top=apply_filters( 'slcr_value_parameter_filter', $acf_page_options_heading_main_content_padding_top);
            $realcss.= ' padding-top: '; $realcss.= esc_attr($slcr_general_settings_main_content_padding_top); $realcss.= '; ';   
        }  
        $acf_page_options_heading_main_content_padding_bottom="";
        if( class_exists('acf') ) {
            $acf_page_options_heading_main_content_padding_bottom = get_field('acf_page_options_heading_main_content_padding_bottom', $acf_page_id);  
        }
        if ($acf_page_options_heading_main_content_padding_bottom==NULL){  
            $slcr_general_settings_main_content_padding_bottom=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_main_content_padding_bottom']); 
            $realcss.= ' padding-bottom: '; $realcss.= esc_attr($slcr_general_settings_main_content_padding_bottom); $realcss.= '; '; 
        }else { 
            $slcr_general_settings_main_content_padding_bottom=apply_filters( 'slcr_value_parameter_filter', $acf_page_options_heading_main_content_padding_bottom); 
            $realcss.= ' padding-bottom: '; $realcss.= esc_attr($slcr_general_settings_main_content_padding_bottom); $realcss.= '; '; 
        }  
        $realcss.= ' 
    } '; 
    if (!empty($slcr_redux['general_settings_main_content_width'])){
        $slcr_general_settings_main_content_width=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_main_content_width']);
            $realcss.= '
            @media (min-width: 1200px) { 
            .container {
                width: '; $realcss.= esc_attr($slcr_general_settings_main_content_width); $realcss.= ' !important;
            }
            }';
    }
    global $woocommerce;
    if ($woocommerce) {
        $realcss.= '
        .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover { '; 
            if (!empty($slcr_redux['general-settings-theme-button-color'])) {
                $realcss.= "background-color:" . esc_attr($slcr_redux['general-settings-theme-button-color'] ). " ;";
            }
            if (!empty($slcr_redux['general-settings-theme-button-text-color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general-settings-theme-button-text-color'] ). " ;";
            }
            $realcss.= 'opacity: .9;
        }
        .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { '; 
            if (!empty($slcr_redux['general-settings-theme-button-color'])) {
                $realcss.= "background-color:" .esc_attr( $slcr_redux['general-settings-theme-button-color']) . " ;";
            }
             if (!empty($slcr_redux['general-settings-theme-button-text-color'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['general-settings-theme-button-text-color'] ). " ;";
            }
            $realcss.= '
        }
        .woocommerce #content input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page #content input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover { ';  
            if (!empty($slcr_redux['woocommerce-settings-color-overall-color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['woocommerce-settings-color-overall-color'] ). ";";
            }else {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_main_color'] ). ";";   
            }
            if (!empty($slcr_redux['woocommerce-settings-color-overall-color-text'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-overall-color-text'] ). ";";
            }else {
                $realcss.= "color: #fff; ";
            }
            $realcss.= 'opacity: .9;
        }
        .woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce-page #respond input#submit.alt, .woocommerce-page a.button.alt, .woocommerce-page button.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-overall-color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['woocommerce-settings-color-overall-color'] ). ";";
            }else {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_main_color'] ). ";";   
            }
            if (!empty($slcr_redux['woocommerce-settings-color-overall-color-text'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-overall-color-text'] ). ";";
            }else {
                $realcss.= "color: #fff; ";
            }
            $realcss.= '
        }
        .woocommerce [data-product-type="modern"] .product-meta { '; 
            if (!empty($slcr_redux['woocommerce-settings-type-2-footer-color'])) {
                $realcss.= "background-color:" . esc_attr($slcr_redux['woocommerce-settings-type-2-footer-color'] ). " ;";
            }
            if (!empty($slcr_redux['woocommerce-settings-type-2-footer-color'])) {
                $realcss.= "border-color: " . esc_attr($slcr_redux['woocommerce-settings-type-2-footer-color'] ). " ;";
            }
            $realcss.= '
        }
        .shop__archive_header { '; 
            if (!empty($slcr_redux['woocommerce-settings-archive-height'])) {
                $realcss.= "padding:" . esc_attr(apply_filters( 'slcr_value_parameter_filter', $slcr_redux['woocommerce-settings-archive-height'] )). " 0  ;";
            }
            if ($slcr_redux['woocommerce-settings-archive-background-type'] == "image") {
                $realcss.= 'background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center; ';
            } elseif ($slcr_redux['woocommerce-settings-archive-background-type'] == "gradient") {
                $realcss.= 'background-image: '; $realcss.= esc_attr( $slcr_redux['woocommerce-settings-archive-background-gradient']);
                $realcss.= '; ';
            } else {
                if (!empty($slcr_redux['woocommerce-settings-archive-background-color'])) {
                    $realcss.= 'background: '.esc_attr( $slcr_redux['woocommerce-settings-archive-background-color']).';'; 
                }
            }
            $realcss.= '
        }
        .woocommerce ul.products li.product .product-wrap .woocommerce-loop-product__title { '; 
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-style'])) {
                $realcss.= "font-style:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-style']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-family']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-weight'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['text-align'])) {
                $realcss.= "text-align:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['text-align']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-size'])) {
                $realcss.= "font-size:" .esc_attr( $slcr_redux['woocommerce-settings-typography-product-title']['font-size'] ). " !important;";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['line-height'])) {
                $realcss.= "line-height:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['line-height']) . " !important;";
            }
            $realcss.= '
        }
        .woocommerce ul.products[data-product-type="modern"] li.product .product-wrap .woocommerce-loop-product__title { '; 
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-style'])) {
                $realcss.= "font-style:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-style']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-family']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['font-weight'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['text-align'])) {
                $realcss.= "text-align:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['text-align'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['font-size'])) {
                $realcss.= "font-size:" .esc_attr( $slcr_redux['woocommerce-settings-typography-product-title']['font-size']) . " !important;";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-product-title']['line-height'])) {
                $realcss.= "line-height:" . esc_attr($slcr_redux['woocommerce-settings-typography-product-title']['line-height']) . " !important;";
            }
            $realcss.= '
        }
        .woocommerce div.product .product_title { '; 
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['font-style'])) {
                $realcss.= "font-style:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['font-style']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['font-family']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['font-weight']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['text-align'])) {
                $realcss.= "text-align:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['text-align'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['font-size'])) {
                $realcss.= "font-size:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['font-size'] ). " !important;";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-title']['line-height'])) {
                $realcss.= "line-height:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-title']['line-height'] ). " !important;";
            }
            $realcss.= '
        }
        .woocommerce .woocommerce-product-details__short-description p { '; 
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['color'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['woocommerce-settings-typography-single-product-description']['color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['font-style'])) {
                $realcss.= "font-style:" .esc_attr( $slcr_redux['woocommerce-settings-typography-single-product-description']['font-style']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['woocommerce-settings-typography-single-product-description']['font-family']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-description']['font-weight'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['text-align'])) {
                $realcss.= "text-align:" .esc_attr( $slcr_redux['woocommerce-settings-typography-single-product-description']['text-align']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['font-size'])) {
                $realcss.= "font-size:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-description']['font-size'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-typography-single-product-description']['line-height'])) {
                $realcss.= "line-height:" . esc_attr($slcr_redux['woocommerce-settings-typography-single-product-description']['line-height']) . ";";
            }
            $realcss.= '
        }
        .single_add_to_cart_button { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-addtocart-color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['woocommerce-settings-color-addtocart-color'] ). " !important;";
            }
            if (!empty($slcr_redux['woocommerce-settings-color-addtocart-color-text'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-addtocart-color-text'] ). " !important;";
            }
            $realcss.= '
        }
        .woocommerce a.button.alt, .woocommerce a.button.alt:hover { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-proceedtocheckout-color'])) {
                $realcss.= "background:" .esc_attr( $slcr_redux['woocommerce-settings-color-proceedtocheckout-color']) . ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-color-proceedtocheckout-color-text'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-proceedtocheckout-color-text'] ). ";";
            }
            $realcss.= '
        } 
        .woocommerce-page #payment #place_order { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-placeorder-color'])) {
                $realcss.= "background:" .esc_attr( $slcr_redux['woocommerce-settings-color-placeorder-color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-color-placeorder-color-text'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['woocommerce-settings-color-placeorder-color-text']) . ";";
            }
            $realcss.= '
        }
        .woocommerce .login__cont .login .button, .woocommerce .login__cont .login .button:hover { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-login-color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['woocommerce-settings-color-login-color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-color-login-color-text'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['woocommerce-settings-color-login-color-text'] ). ";";
            }
            $realcss.= '
        }
        .woocommerce .login__cont .register .button, .woocommerce .login__cont .register .button:hover { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-register-color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['woocommerce-settings-color-register-color'] ). ";";
            }
            if (!empty($slcr_redux['woocommerce-settings-color-register-color-text'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['woocommerce-settings-color-register-color-text']) . ";";
            }
            $realcss.= '
        }
        .woocommerce div.product p.price { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-price-product-page-color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-price-product-page-color'] ). ";";
            }
            $realcss.= '
        }
        .woocommerce ul.products li.product .product-wrap .price { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-price-color'])) {
                $realcss.= "color:" .esc_attr( $slcr_redux['woocommerce-settings-color-price-color'] ). ";";
            }
            $realcss.= '
        }
        .woocommerce ul.products[data-product-type="modern"] li.product .product-wrap .price { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-price-color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-price-color'] ). ";";
            }
            $realcss.= '
        }
        .woocommerce .product-meta .posted_in a, .woocommerce .product-meta .posted_in a:hover { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-category-color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['woocommerce-settings-color-category-color']) . " !important ;";
            }
            $realcss.= '
        }
        .woocommerce ul.products[data-product-type="modern"] li.product .product-wrap:hover .woocommerce-loop-product__title { '; 
            if (!empty($slcr_redux['woocommerce-settings-color-hover-title-color'])) {
                $realcss.= "color:" . esc_attr( $slcr_redux['woocommerce-settings-color-hover-title-color']) . ";";
            }
            $realcss.= '
        }';
    }
    if ( class_exists('WPCF7') ) { 
        $realcss.= '
        .wpcf7 input {
            outline: none;
        }
        .wpcf7 input[type="text"],
        .wpcf7 input[type="email"],
        .wpcf7 input[type="url"],
        .wpcf7 input[type="tel"],
        .wpcf7 input[type="number"],
        .wpcf7 input[type="date"],
        .wpcf7 textarea,
        .wpcf7 select {
            background-color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_background_color']); $realcss.= ';
            color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_text_color']); $realcss.= ';
            width: 100%;
            font-weight: normal;
            border: 1px solid '; $realcss.= esc_attr($slcr_redux['form_styling_settings_border_color']); $realcss.= ';';
            if (isset($slcr_redux['form_styling_settings_text_border_radius']) && $slcr_redux['form_styling_settings_text_border_radius']!="") {
                $form_styling_settings_text_border_radius_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['form_styling_settings_text_border_radius']);
                $realcss.= 'border-radius: '; $realcss.= esc_attr($form_styling_settings_text_border_radius_filter); $realcss.= ';';
            }
            if (!empty($slcr_redux['form_styling_settings_height'])) {
                $form_styling_settings_height_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['form_styling_settings_height']);
                $realcss.= 'height: '; $realcss.= esc_attr($form_styling_settings_height_filter); $realcss.= ';
                line-height: '; $realcss.= esc_attr($form_styling_settings_height_filter); $realcss.= ';';
            }
            if (!empty($slcr_redux['form_styling_settings_text_margin_top'])) {
                $form_styling_settings_text_margin_top_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['form_styling_settings_text_margin_top']);
                $realcss.= 'margin-top: '; $realcss.= esc_attr($form_styling_settings_text_margin_top_filter); $realcss.= ';
                        margin-bottom: '; $realcss.= esc_attr($form_styling_settings_text_margin_top_filter); $realcss.= ';';
            }
            if (!empty($slcr_redux['form_styling_settings_text_size'])) {
                $form_styling_settings_text_size_filter=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['form_styling_settings_text_size']);
                $realcss.= 'font-size: '; $realcss.= esc_attr($form_styling_settings_text_size_filter); $realcss.= ';';
            }
            $realcss.= 'padding: 10px;
            transition: all ease .3s;
            -webkit-transition: all ease .3s;
        }
        .wpcf7 textarea {
            height: 200px;
        }
        .wpcf7 input[type="text"]:focus,
        .wpcf7 input[type="email"]:focus,
        .wpcf7 input[type="url"]:focus,
        .wpcf7 input[type="tel"]:focus,
        .wpcf7 input[type="number"]:focus,
        .wpcf7 input[type="date"]:focus,
        .wpcf7 textarea:focus,
        .wpcf7 select:focus {
            border-color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_border_color_focuse']); $realcss.= ';
        }
        .wpcf7 label {
            width: 100%;
            font-weight: 500;
            font-size: 14px;
        }
        span.wpcf7-not-valid-tip {
            font-size: 12px;
            line-height: normal;
        }
        .wpcf7 p {
            margin-bottom: 0;
        }
        .wpcf7 label {
            margin-right: 15px;
            margin-left: 0 !important; '; 
            if (!empty($slcr_redux['form_styling_settings_label_typography']['color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['color']) . ";";
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['font-style'])) {
                $realcss.= "font-style:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['font-style'] ). ";";
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['font-family'])) {
                $realcss.= "font-family:" . slcr_action_filters()->slcr_esc_attr($slcr_redux['form_styling_settings_label_typography']['font-family']) . ";";
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['font-weight'])) {
                $realcss.= "font-weight:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['font-weight'] ). ";";
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['text-align'])) {
                $realcss.= "text-align:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['text-align']) . ";";
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['font-size'])) {
                $realcss.= "font-size:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['font-size'] ). ";";
            }else {
                $realcss.= 'font-size: 15px;';
            }
            if (!empty($slcr_redux['form_styling_settings_label_typography']['line-height'])) {
                $realcss.= "line-height:" . esc_attr($slcr_redux['form_styling_settings_label_typography']['line-height'] ). ";";
            }
            $realcss.= ' 
        }
        .wpcf7 input[type="submit"] {
            padding: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_padding_top']); $realcss.= 'px '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_padding_left']); $realcss.= 'px;
            background: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_color']); $realcss.= ';
            border-width: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_border_width']); $realcss.= 'px;
            border-color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_border_color']); $realcss.= ';
            border-style: solid;
            border-radius: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_border_radius']); $realcss.= 'px;
            color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_text_color']); $realcss.= ';
            transition: all ease .3s;
            -webkit-transition: all ease .3s;
        }
        .wpcf7 input[type="submit"]:hover { ';
            if(!empty($slcr_redux['form_styling_settings_submit_button_color_hover'])){
                $realcss.= 'background: '.esc_attr($slcr_redux['form_styling_settings_submit_button_color_hover']).';';
            }
            $realcss.= 'border-color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_border_color_hover']); $realcss.= ';
            color: '; $realcss.= esc_attr($slcr_redux['form_styling_settings_submit_button_text_color_hover']); $realcss.= ';
            opacity: .9;
        }
        .preloader__image {
            height: '; 
            $slcr_general_settings_functionality_preloader_image_height=apply_filters( 'slcr_value_parameter_filter', $slcr_redux['general_settings_functionality_preloader_image_height']);
            $realcss.= esc_attr($slcr_general_settings_functionality_preloader_image_height); $realcss.= ' !important;
        }';
    }
    $realcss.= '
    .privacy__wrap { ';
        if (!empty($slcr_redux['general_settings_privacy_bar_bg_color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_privacy_bar_bg_color']) . ";";
            }  
    $realcss.= ' }
    .privacy__text { ';
        if (!empty($slcr_redux['general_settings_privacy_bar_text_color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general_settings_privacy_bar_text_color']) . ";";
            }  
    $realcss.= ' }
    .privacy__bar a { ';
        if (!empty($slcr_redux['general_settings_privacy_bar_link_color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general_settings_privacy_bar_link_color']) . ";";
            }  
    $realcss.= ' }
    .privacy__button .privacy__agree{ ';
        if (!empty($slcr_redux['general_settings_privacy_bar_button_bg_color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_privacy_bar_button_bg_color']) . ";";
                $realcss.= "border-color:" . esc_attr($slcr_redux['general_settings_privacy_bar_button_bg_color']) . ";";
            }   
    $realcss.= ' }
    .privacy__button .privacy__agree { '; 
        if (!empty($slcr_redux['general_settings_privacy_bar_button_text_color'])) {
                $realcss.= "color:" . esc_attr($slcr_redux['general_settings_privacy_bar_button_text_color']) . ";";
            }  
    $realcss.= ' }
    :-moz-selection { ';
        if (!empty($slcr_redux['general_settings_color_body_selection_color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_body_selection_color']) . ";";
            }
        $realcss.= '  
        color: #fff;
    }
    ::selection { ';
        if (!empty($slcr_redux['general_settings_color_body_selection_color'])) {
                $realcss.= "background:" . esc_attr($slcr_redux['general_settings_color_body_selection_color']) . ";";
            }
        $realcss.= ' 
        color: #fff;
    }
</style>'; 
function slcr_quick_minify( $css ) {

    $css = preg_replace( '/\s+/', ' ', $css );
    $css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
    $css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
    $css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
    $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
    $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
    return trim( $css ); 

}
echo slcr_quick_minify($realcss); 