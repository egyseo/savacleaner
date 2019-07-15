<?php
/** 
 * The SlashCreative Header Template
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}?>
<body <?php body_class(esc_attr($body_add_class));?> data-ajax-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
        <?php  
        $header_navigation_top_bar              = $slcr_redux['header-navigation-settings-layout-top-bar'];
        $header_navigation_container            = $slcr_redux['header-navigation-settings-layout-container'];
        $header_navigation_layout               = $slcr_redux['header-navigation-settings-layout-type'];
        $header_navigation_layout_side_bar      = $slcr_redux['header-navigation-settings-layout-third-sidebar-type'];
        $header_navigation_sticky_header_shadow = $slcr_redux['header_navigation_sticky_header_shadow']; 
        $acf_page_header_custom_logo            = get_field('acf_page_header_custom_logo', $acf_page_id);
        $acf_page_header_header_sticky_shadow   = get_field('acf_page_header_header_sticky_shadow', $acf_page_id); 
        if ($acf_page_header_header_sticky_shadow == "shadow__sm" || $acf_page_header_header_sticky_shadow == "shadow__md" || $acf_page_header_header_sticky_shadow == "shadow__lg" || $acf_page_header_header_sticky_shadow == "shadow__none") {
            $header_navigation_sticky_header_shadow = $acf_page_header_header_sticky_shadow;
        } 
        $header_logo_real  = "";
        $image_url_acf_logo = "";
        if (!empty($acf_page_header_custom_logo)) {
            $image_url_acf_logo = $acf_page_header_custom_logo['url'];
            $acf_page_header_custom_logo_alt="logo";
            if(!empty($acf_page_header_custom_logo['alt'])){
                $acf_page_header_custom_logo_alt=$acf_page_header_custom_logo['alt'];
            }
            $header_logo_real   = '<img src="' . esc_url($image_url_acf_logo) . '" alt="'.esc_attr($acf_page_header_custom_logo_alt ).'" class="main__logo " /> ';
        } else {
            if (!empty($slcr_redux['header_navigation_logo']['url'])) {    
                $image_url_acf_logo = $slcr_redux['header_navigation_logo']['url'];
                $image_url_acf_logo_alt="logo";
                if(!empty($slcr_redux['header_navigation_logo']['alt'])){
                    $image_url_acf_logo_alt=$slcr_redux['header_navigation_logo']['alt']; 
                } 
                $header_logo_real   = '<img src="' . esc_url($image_url_acf_logo) . '" alt="'.esc_attr($image_url_acf_logo_alt ).'" class="main__logo " /> ';
            } else {
                $image_url_acf_logo = SLCR_THEME_IMAGE_URI . 'icons/slcr-logo-simple.svg';
                $header_logo_real   = '<img src="' . esc_url($image_url_acf_logo) . '" alt="'.esc_attr__( 'logo', 'moppers' ).'" class="main__logo " /> ';
            }
        }
        $acf_page_header_sticky_custom_logo = get_field('acf_page_header_sticky_custom_logo', $acf_page_id);
        $header_sticky_logo_real            = "";
        if (!empty($acf_page_header_sticky_custom_logo)) {
            $image_url_acf_sticky_logo = $acf_page_header_sticky_custom_logo;
            $acf_page_header_sticky_custom_logo_alt="sticky__logo";
            if(!empty($acf_page_header_sticky_custom_logo['alt'])){
                $acf_page_header_sticky_custom_logo_alt=$acf_page_header_sticky_custom_logo['alt'];
            }
            $header_sticky_logo_real   = '<img src="' . esc_url($image_url_acf_sticky_logo['url']) . '" alt="'.esc_attr($acf_page_header_sticky_custom_logo_alt ).'" class="sticky__logo " /> ';
        } else {
            if (!empty($slcr_redux['header_navigation_sticky_logo']['url'])) {
                $image_url_acf_sticky_logo = $slcr_redux['header_navigation_sticky_logo']['url'];
                $image_url_acf_sticky_logo_alt="logo";
                if(!empty($slcr_redux['header_navigation_sticky_logo']['alt'])){
                    $image_url_acf_sticky_logo_alt=$slcr_redux['header_navigation_sticky_logo']['alt']; 
                } 
                $header_sticky_logo_real   = '<img src="' . esc_url($image_url_acf_sticky_logo) . '" alt="'.esc_attr($image_url_acf_sticky_logo_alt ).'" class="sticky__logo " /> ';
            } else { 
                $header_sticky_logo_real = '<img src="' . esc_url($image_url_acf_logo) . '" alt="'.esc_attr__( 'logo', 'moppers' ).'" class="sticky__logo " /> ';
            }
        }

        $acf_page_header_header_sticky      = get_field('acf_page_header_header_sticky', $acf_page_id);
        $acf_page_header_header_sticky_real = "";
        if ($acf_page_header_header_sticky == "true" || $acf_page_header_header_sticky == "none") {
            $acf_page_header_header_sticky_real = $acf_page_header_header_sticky;
        } else {
            if ($slcr_redux['header_navigation_sticky_header'] == 1) {
                $acf_page_header_header_sticky_real = "true";
            } else {
                $acf_page_header_header_sticky_real = "none";
            }
        }

        $acf_page_header_header_sticky_mobile      = get_field('acf_page_header_header_sticky_mobile', $acf_page_id);
        $acf_page_header_header_sticky_mobile_real = "";
        if ($acf_page_header_header_sticky_mobile == "true" || $acf_page_header_header_sticky_mobile == "none") {
            $acf_page_header_header_sticky_mobile_real = $acf_page_header_header_sticky_mobile;
        } else {
            if ($slcr_redux['header_navigation_sticky_header_mobile'] == 1) {
                $acf_page_header_header_sticky_mobile_real = "true";
            } else {
                $acf_page_header_header_sticky_mobile_real = "none";
            }
        }

        $acf_page_header_header_fixed      = get_field('acf_page_header_header_fixed', $acf_page_id);
        $acf_page_header_header_fixed_real = "";
        if ($acf_page_header_header_fixed == "fixed" || $acf_page_header_header_fixed == "none") {
            $acf_page_header_header_fixed_real = $acf_page_header_header_fixed;
        } else {
            if ($slcr_redux['header_navigation_fixed_header'] == 1) {
                $acf_page_header_header_fixed_real = "fixed";
            } else {
                $acf_page_header_header_fixed_real = "none";
            }
        }

        $acf_page_header_header_fixed_mobile      = get_field('acf_page_header_header_fixed_mobile', $acf_page_id);
        $acf_page_header_header_fixed_mobile_real = "";
        if ($acf_page_header_header_fixed_mobile == "fixed" || $acf_page_header_header_fixed_mobile == "none") {
            $acf_page_header_header_fixed_mobile_real = $acf_page_header_header_fixed_mobile;
        } else {
            if ($slcr_redux['header_navigation_fixed_header_mobile'] == 1) {
                $acf_page_header_header_fixed_mobile_real = "fixed";
            } else {
                $acf_page_header_header_fixed_mobile_real = "none";
            }
        }

        $acf_page_header_header_shadow      = get_field('acf_page_header_header_shadow', $acf_page_id);
        $acf_page_header_header_shadow_real = "";
        if ($acf_page_header_header_shadow == "small" || $acf_page_header_header_shadow == "medium" || $acf_page_header_header_shadow == "large" || $acf_page_header_header_shadow == "none") {
            $acf_page_header_header_shadow_real = $acf_page_header_header_shadow;
        } else {
            $acf_page_header_header_shadow_real = $slcr_redux['header_navigation_header_shadow'];
        }

        $acf_page_header_header_scheme      = get_field('acf_page_header_header_scheme', $acf_page_id);
        $acf_page_header_header_scheme_real = "";
        if ($acf_page_header_header_scheme == "dark" || $acf_page_header_header_scheme == "light") {
            $acf_page_header_header_scheme_real = $acf_page_header_header_scheme;
        } else {
            $acf_page_header_header_scheme_real = $slcr_redux['header_navigation_header_scheme'];
        }

        $acf_page_header_header_sticky_scheme      = get_field('acf_page_header_header_sticky_scheme', $acf_page_id);
        $acf_page_header_header_sticky_scheme_real = "";
        if ($acf_page_header_header_sticky_scheme == "dark" || $acf_page_header_header_sticky_scheme == "light") {
            $acf_page_header_header_sticky_scheme_real = $acf_page_header_header_sticky_scheme;
        } else {
            $acf_page_header_header_sticky_scheme_real = $slcr_redux['header_navigation_sticky_header_scheme'];
        }
        
        if ($slcr_redux['general_settings_functionality_preloader'] == 1) { ?>
        <div class="load__wrapper" data-preloader-position="<?php echo esc_attr($slcr_redux['general_settings_functionality_preloader_position']); ?>">
            <?php if ($slcr_redux['general_settings_functionality_preloader_type'] == "image") {
                if ($slcr_redux['general_settings_functionality_preloader_image']['url']) { ?>
                    <img src="<?php echo esc_url($slcr_redux['general_settings_functionality_preloader_image']['url']); ?>" class="preloader__image" alt="<?php echo esc_attr__( 'preloader', 'moppers' ); ?>" />
                <?php } else { ?>
                    <svg class="loading__page" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"></circle>
                    </svg>
                <?php }
            } else { ?>
                <svg class="loading__page" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"></circle>
                </svg>
            <?php } ?>
        </div>
        <?php } 
        if ($slcr_redux['general_settings_functionality_back_to_top'] == 1) {
            if ($slcr_redux['general_settings_functionality_back_to_top_mobile'] == 0) {?>
                <a href="#0" class="back__top hidden-xs hidden-sm"  ><i class="arrow_carrot-up"></i></a>
            <?php } else {?>
                <a href="#0" class="back__top" ><i class="arrow_carrot-up"></i></a>
            <?php }
        }
        $reheader_navigation_settings_typography_type_mobile=$slcr_redux['header-navigation-settings-typography-type-mobile'];
        if ($slcr_redux['header-navigation-settings-typography-type-mobile'] == "modern") {
            if($slcr_redux['header-navigation-settings-layout-type']== "third" || $slcr_redux['header-navigation-settings-layout-type']=="fourth"){
                 $reheader_navigation_settings_typography_type_mobile="simple"; 
            }else {
                $reheader_navigation_settings_typography_type_mobile=$slcr_redux['header-navigation-settings-typography-type-mobile'];
            }
            
        } else {
            $reheader_navigation_settings_typography_type_mobile=$slcr_redux['header-navigation-settings-typography-type-mobile'];
        }
        if ($slcr_redux['general_settings_main_body_border'] == "1") { ?>
            <div class="main__border"></div>
        <?php }?>
        <header class="header__nav <?php echo esc_attr($header_navigation_sticky_header_shadow); ?>" data-nav-layout="<?php echo esc_attr($header_navigation_layout); ?>" data-menu-align="right" <?php if ($header_navigation_container == true) {?> data-nav-container="true"<?php } else {?> data-nav-container="false"<?php }?>  data-mobile-nav="<?php echo esc_attr($reheader_navigation_settings_typography_type_mobile); ?>" data-sidebar-direction="right-to-left" data-header-scheme="<?php echo esc_attr($acf_page_header_header_scheme_real); ?>" data-sticky-scheme="<?php echo esc_attr($acf_page_header_header_sticky_scheme_real); ?>" data-header-shadow="<?php echo esc_attr($acf_page_header_header_shadow_real); ?>" data-hover-border="<?php echo esc_attr($slcr_redux['header_navigation_hover_border']); ?>"  data-header-fixed="<?php echo esc_attr($acf_page_header_header_fixed_real); ?>" data-mobile-fixed="<?php echo esc_attr($acf_page_header_header_fixed_mobile_real); ?>" data-sticky-scroll="<?php echo esc_attr($acf_page_header_header_sticky_real); ?>" data-mobile-scroll="<?php echo esc_attr($acf_page_header_header_sticky_mobile_real); ?>">
            <?php if ($header_navigation_layout != "fifth") {  
                if ($header_navigation_top_bar == true) { ?>
                    <div class="header__secondary hidden-xs hidden-sm">
                        <div class="wrap">
                            <?php if ($header_navigation_container == true) {?>
                                <div class="container"> 
                            <?php }?> 
                                    <div class="secondary__content">
                                        <div class="top__nav_section hidden-xs">
                                            <div class="inner__wrap text__block">
                                                <div class="top__content">
                                                    <?php if (!empty($slcr_redux['header-navigation-settings-layout-top-bar-text'])) {
                                                        $allowed_html = slcr_helper()->slcr_allowed_html();
                                                        echo wp_kses($slcr_redux['header-navigation-settings-layout-top-bar-text'], $allowed_html);
                                                    }?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="top__nav_section right">
                                             <div class="secondary__toggle res__menu pull-right visible-xs visible-sm">
                                                <i class="icon_menu"></i>
                                            </div> 
                                            <div class="inner__wrap">
                                                <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                    <ul class="secondary__social">
                                                        <?php slcr_helper()->slcr_social_media_url(); ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php if ($header_navigation_container == true) {?>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
                <div class="header__primary ">
                    <div class="wrap">
                        <?php if ($header_navigation_container == true) {?>
                            <div class="container"> 
                        <?php }?>
                                <!-- SITE LOGO -->
                                <div class="nav__logo">
                                    <a href="<?php echo get_home_url(); ?>">
                                        <?php 
                                        $allowed_html = slcr_helper()->slcr_allowed_html();
                                        echo wp_kses($header_logo_real, $allowed_html);
                                        echo wp_kses($header_sticky_logo_real, $allowed_html);  ?>
                                        <!-- LOGO FOR LIGHT HEADER -->
                                    </a>
                                </div>
                                <?php if ($header_navigation_layout == "third") {
                                    $header_navigation_top_bar = $slcr_redux['header-navigation-settings-layout-top-bar'];
                                        if ($header_navigation_top_bar == true) {
                                        } else { ?>
                                            <div class="nav__content pull-left">
                                                <div class="nav__module">
                                                    <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                        <ul class="nav__social-links">
                                                            <?php slcr_helper()->slcr_social_media_url(); ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php }
                                }?>
                                <!-- RIGHT ITEMS -->
                                <div class="nav__content">
                                    <?php if(slcr_helper()->slcr_check_menu_location()!="1") {
                                            if (has_nav_menu('secondary-menu')) { ?>
                                            <div class="nav__second">
                                                <nav class="hidden-xs hidden-sm">
                                                    <ul class="nav__list">
                                                        <?php
                                                        wp_nav_menu(array('theme_location' => 'secondary-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Slcr_Nav_Primary()));
                                                            ?>
                                                    </ul>
                                                </nav>
                                            </div>
                                        <?php }  
                                    }
                                    if ($header_navigation_layout != "third") {
                                        $header_navigation_top_bar = $slcr_redux['header-navigation-settings-layout-top-bar'];
                                        if ($header_navigation_top_bar == true) {

                                        } else { ?> 
                                            <div class="nav__module">
                                                <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                    <ul class="nav__social-links">
                                                        <?php slcr_helper()->slcr_social_media_url(); ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php }
                                    }
                                    global $woocommerce;
                                    if ($woocommerce && !empty($slcr_redux['woocommerce-settings-type-2-cart-icon']) && !is_cart()) {
                                        global $woocommerce;
                                        $cart_url = wc_get_cart_url(); ?>
                                        <!-- SHOPPING CART -->
                                        <div class="nav__module">
                                            <div class="nav__cart">
                                                <a class="cart-contents" href="<?php echo esc_url($cart_url);?>" title="<?php echo esc_attr__('View your shopping cart','moppers');?>">
                                                    <i class="svg__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve" class="svg__size">
                                                           <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3   c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1   C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462   H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41   c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" class="svg__fill"/>
                                                        </svg>
                                                        <span class="cart__value"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
                                                    </i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php }
                                    if (!empty($slcr_redux['header-navigation-settings-layout-search']) || !isset($slcr_redux)) {?>
                                        <!-- SEARCH -->
                                        <div class="nav__module">
                                            <div class="nav__search">
                                                <i class="svg__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512" class="svg__size">
                                                       <g>
                                                           <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" class="svg__fill"/>
                                                       </g>
                                                    </svg>
                                                </i>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- MOBILE SIDEBAR TOGGLE -->
                                    <div class="nav__module mob__ham">
                                        <div class="mob__toggle">
                                            <i class="svg__icon">
                                                <svg class="svg__ham" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="60px" height="60px">
                                                    <path class="svg__fill" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 3 7 A 1.0001 1.0001 0 1 0 3 9 L 27 9 A 1.0001 1.0001 0 1 0 27 7 L 3 7 z M 3 14 A 1.0001 1.0001 0 1 0 3 16 L 27 16 A 1.0001 1.0001 0 1 0 27 14 L 3 14 z M 3 21 A 1.0001 1.0001 0 1 0 3 23 L 27 23 A 1.0001 1.0001 0 1 0 27 21 L 3 21 z"/>
                                                </svg>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <!-- MAIN NAVIGATION -->
                                <?php $header_navigation_main_menu_position = $slcr_redux['header-navigation-settings-layout-type-first-position'];?>
                                <div class="nav__main text-<?php if ($header_navigation_layout == "first") {echo esc_attr($header_navigation_main_menu_position);} else {echo "center";}?> ">
                                    <nav class="nav__container hidden-xs hidden-sm">
                                        <ul class="nav__list">
                                            <?php if (has_nav_menu('main-menu')) {
                                                wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Slcr_Nav_Primary()));
                                            } ?>
                                        </ul>
                                    </nav>
                                </div>
                            <?php if ($header_navigation_container == true) {?>
                             </div>
                            <?php }?>
                    </div>
                </div>
                <div class="modern__trigger hidden-md hidden-lg">
                    <div class="nav__mobile_mod">
                        <div class="nav__background"></div>
                    </div>
                    <div class="mob__trigger">
                        <div class="ham__menu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <div id="search" class="header__search">
                    <div class="search__wrap">
                        <div class="container search__cont">
                            <form  role="search" method="get" id="searchform_page"  action="<?php echo esc_url(home_url('/')); ?>">
                                <i class="search__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512" class="svg__size">
                                       <g>
                                           <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" class="svg__fill"/>
                                       </g>
                                    </svg>
                                </i>
                                <span class="search__title"><?php echo esc_html__('What are you looking for?','moppers'); ?></span>
                                <input type="text" class="search__input" placeholder="<?php echo esc_attr__('Search','moppers');?>" value="<?php echo get_search_query(); ?>" name="s" id="s_page" />
                                <?php global $slcr_redux;
                                $general_settings_functionality_search_resulte_type = $slcr_redux['general_settings_functionality_search_resulte_type'];
                                    if ($general_settings_functionality_search_resulte_type == "product") {
                                        ?>
                                       <input type="hidden" class="search__input" value="<?php echo esc_attr__('product','moppers');?>" name="post_type" id="main_input" />
                                        <?php
                                    } elseif ($general_settings_functionality_search_resulte_type == "default") {?>
                                       <input type="hidden" class="search__input" value="<?php echo esc_attr__('main','moppers');?>" name="main" id="main_input" />
                                       <?php
                                    } ?>
                            </form>
                            <div class="search__close_btn"><i class="icon_close"></i></div>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR -->
                <aside class="nav__mobile <?php if ($header_navigation_layout == "third" || $header_navigation_layout == "fourth") {echo esc_attr($header_navigation_layout_side_bar);}?> ">
                    <div class="nav__close">
                        <i class="icon_close"></i>
                    </div>
                    <div class="nav__section">
                        <!-- MODULE -->
                        <div class="nav__module_side">
                            <!-- Level 1 -->
                            <ul class="nav__mobile_list">
                                <?php if (has_nav_menu('main-menu')) {
                                    wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Mobile_Slcr_Nav_Primary()));
                                }
                                if(slcr_helper()->slcr_check_menu_location()!="1") {
                                    if (has_nav_menu('secondary-menu')) {
                                        wp_nav_menu(array('theme_location' => 'secondary-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Mobile_Slcr_Nav_Primary()));
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- MODULE -->
                        <div class="nav__module_side sec__links">
                            <div class="text__mob_side"><?php if (!empty($slcr_redux['header-navigation-settings-layout-top-bar-text'])) { $allowed_html = slcr_helper()->slcr_allowed_html();
                                    echo wp_kses($slcr_redux['header-navigation-settings-layout-top-bar-text'], $allowed_html); } ?>
                            </div>
                        </div> 
                        <!-- MODULE -->
                        <div class="nav__module_side social">
                            <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                <ul class="social__side_mob">
                                    <?php slcr_helper()->slcr_social_media_url(); ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </aside>
                <?php global $woocommerce;
                if ($woocommerce && !empty($slcr_redux['woocommerce-settings-type-2-cart-icon']) && !is_cart()) { ?>
                    <aside class="cart__sidebar woocommerce" data-cart-value="<?php echo WC()->cart->get_cart_contents_count(); ?>">
                        <div class="wrapper">
                            <div class="cart__close"><i class="icon_close"></i></div>
                                <div class="cart__module">
                                    <h3 class="cart__title"><?php echo esc_html__('Shopping Cart','moppers'); ?></h3>
                                </div>
                                <div class="cart__module empty">
                                    <i class="icon_bag_alt"></i>
                                    <h5><?php echo esc_html__('Your cart is empty','moppers'); ?></h5>
                                    <p><?php echo esc_html__('Looks like there are no items in your shopping cart','moppers'); ?></p>
                                </div>
                                <div id="cart-ajax-sidebar" class="cart__module has-items">
                                        <?php global $woocommerce;
                                        $items = $woocommerce->cart->get_cart();
                                        foreach ($items as $item => $values) {
                                            $_product = wc_get_product($values['data']->get_id());
                                            //product image
                                            $getProductDetail = wc_get_product($values['product_id']);
                                            ?>
                                            <a href="<?php the_permalink($values['product_id'])?>" class="sidebar__product">
                                                <?php echo '<div class="product__image">'.$getProductDetail->get_image().'</div>';?>
                                                <div class="product__meta">
                                                    <h4><?php echo esc_html($_product->get_title()); ?></h4>
                                                    <?php $currency = get_woocommerce_currency_symbol();
                                                    $price = get_post_meta($values['product_id'], '_price', true);?>
                                                    <span class="product__price"><span class="quantity"><?php echo esc_html($values['quantity']); ?> x </span> <?php echo esc_html($currency . "" . $price); ?></span> 
                                                </div>
                                            </a>
                                        <?php } ?>
                                    <div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">
                                        <?php do_action('woocommerce_before_cart_totals');?>
                                        <h2><?php echo esc_html__('Cart totals','moppers');?></h2>
                                        <table class="shop_table shop_table_responsive">
                                            <tr class="cart-subtotal">
                                              <th><?php echo esc_html__('Subtotal','moppers');?></th>
                                              <td data-title="<?php esc_attr_e('Subtotal','moppers');?>"><?php wc_cart_totals_subtotal_html();?></td>
                                            </tr>
                                            <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
                                                <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                                                    <th><?php wc_cart_totals_coupon_label($coupon);?></th>
                                                    <td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon);?></td>
                                                </tr>
                                            <?php endforeach;?>
                                            <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

                                                <?php do_action('woocommerce_cart_totals_before_shipping');?>

                                                <?php wc_cart_totals_shipping_html();?>

                                                <?php do_action('woocommerce_cart_totals_after_shipping');?>

                                            <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')): ?>

                                                <tr class="shipping">
                                                    <th><?php echo esc_html__('Shipping','moppers');?></th>
                                                    <td data-title="<?php esc_attr_e('Shipping','moppers');?>"><?php woocommerce_shipping_calculator();?></td>
                                                </tr>

                                            <?php endif;?>

                                            <?php foreach (WC()->cart->get_fees() as $fee): ?>
                                              <tr class="fee">
                                                <th><?php echo esc_html($fee->name); ?></th>
                                                <td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee);?></td>
                                              </tr>
                                            <?php endforeach;?>

                                            <?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart):
                                                $taxable_address = WC()->customer->get_taxable_address();
                                                $estimated_text  = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()
                                                ? sprintf(' <small>' . esc_html__('(estimated for %s)','moppers') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]])
                                                : '';

                                                if ('itemized' === get_option('woocommerce_tax_total_display')): ?>
                                                    <?php foreach (WC()->cart->get_tax_totals() as $code => $tax): ?>
                                                      <tr class="tax-rate tax-rate-<?php echo sanitize_title($code); ?>">
                                                        <th><?php echo esc_html($tax->label) . $estimated_text; ?></th>
                                                        <td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
                                                      </tr>
                                                    <?php endforeach;?>
                                                <?php else: ?>
                                                    <tr class="tax-total">
                                                      <th><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?></th>
                                                      <td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html();?></td>
                                                    </tr>
                                                <?php endif;?>
                                            <?php endif;?>

                                            <?php do_action('woocommerce_cart_totals_before_order_total');?>

                                            <tr class="order-total">
                                              <th><?php echo esc_html__('Total','moppers');?></th>
                                              <td data-title="<?php esc_attr_e('Total','moppers');?>"><?php wc_cart_totals_order_total_html();?></td>
                                            </tr>

                                            <?php do_action('woocommerce_cart_totals_after_order_total');?>

                                        </table>

                                        <div class="wc-proceed-to-checkout">
                                            <?php do_action('woocommerce_proceed_to_checkout');?>
                                        </div>

                                        <?php do_action('woocommerce_after_cart_totals');?>

                                    </div>

                                    <a href="<?php echo wc_get_cart_url(); ?>" class="button wc-forward"><?php echo esc_html__('View cart','moppers')?></a>

                                </div> 
                        </div>
                    </aside>
                <?php }?>
            <?php } else {
                //type fifth else condition
                if ($header_navigation_top_bar == true) { ?>
                    <div class="header__secondary hidden-xs hidden-sm">
                        <div class="wrap">
                            <?php
                            if ($header_navigation_container == true) {?>
                                <div class="container"> 
                                    <?php }?>
                                        <div class="secondary__content">
                                            <div class="top__nav_section hidden-xs">
                                                <div class="inner__wrap text__block">
                                                    <div class="top__content"><?php if (!empty($slcr_redux['header-navigation-settings-layout-top-bar-text'])) {
                                                        $allowed_html = slcr_helper()->slcr_allowed_html();
                                                        echo wp_kses($slcr_redux['header-navigation-settings-layout-top-bar-text'], $allowed_html);}?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="top__nav_section right">
                                                <div class="secondary__toggle res__menu pull-right visible-xs visible-sm">
                                                    <i class="icon_menu"></i>
                                                </div> 
                                                <div class="inner__wrap">
                                                    <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                        <ul class="secondary__social">
                                                            <?php slcr_helper()->slcr_social_media_url(); ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php if ($header_navigation_container == true) {?> 
                                </div>
                            <?php }?>
                        </div>
                    </div>
                <?php }?>
                <div class="header__primary">
                    <div class="wrap">
                        <?php if ($header_navigation_container == true) {?>
                            <div class="container"> 
                                <?php }?>
                                     <!-- MAIN NAVIGATION -->
                                    <?php $header_navigation_main_menu_position = $slcr_redux['header-navigation-settings-layout-type-first-position'];?>
                                    <div class="nav__main text-<?php if ($header_navigation_layout == "first") {echo esc_attr($header_navigation_main_menu_position);} else {echo "center";}?> ">
                                       <nav class="nav__container hidden-xs hidden-sm">
                                            <ul class="nav__list">
                                                <?php
                                                if (has_nav_menu('main-menu')) {
                                                        wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Slcr_Nav_Primary()));
                                                    } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- SITE LOGO -->
                                    <div class="nav__logo">
                                        <a href="<?php echo get_home_url(); ?>">
                                            <?php 
                                            $allowed_html = slcr_helper()->slcr_allowed_html();
                                            echo wp_kses($header_logo_real, $allowed_html);
                                            echo wp_kses($header_sticky_logo_real, $allowed_html);  
                                            ?>
                                            <!-- LOGO FOR LIGHT HEADER -->
                                        </a>
                                    </div>
                                    <?php
                                    if ($header_navigation_layout == "third") {
                                        $header_navigation_top_bar = $slcr_redux['header-navigation-settings-layout-top-bar'];
                                        if ($header_navigation_top_bar == true) {

                                        } else { ?>
                                            <div class="nav__content pull-left">
                                                <div class="nav__module">
                                                    <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                        <ul class="nav__social-links">
                                                            <?php slcr_helper()->slcr_social_media_url(); ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php }
                                    }?> 
                                    <!-- RIGHT ITEMS -->
                                    <div class="nav__content">
                                        <?php if(slcr_helper()->slcr_check_menu_location()!="1") {
                                                if (has_nav_menu('secondary-menu')) { ?>
                                                <div class="nav__second">
                                                    <nav class="hidden-xs hidden-sm">
                                                        <ul class="nav__list">
                                                            <?php  wp_nav_menu(array('theme_location' => 'secondary-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Slcr_Nav_Primary())); ?>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            <?php }
                                            } 
                                        if ($header_navigation_layout != "third") {
                                                $header_navigation_top_bar = $slcr_redux['header-navigation-settings-layout-top-bar'];
                                                if ($header_navigation_top_bar == true) {

                                                } else { ?>
                                                    <div class="nav__module">
                                                        <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                                            <ul class="nav__social-links">
                                                                <?php slcr_helper()->slcr_social_media_url(); ?>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                <?php }
                                        }
                                        global $woocommerce;
                                        if ($woocommerce && !empty($slcr_redux['woocommerce-settings-type-2-cart-icon']) && !is_cart()) { ?>
                                            <!-- SHOPPING CART -->
                                            <div class="nav__module">
                                                <div class="nav__cart">
                                                    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php esc_attr__('View your shopping cart','moppers');?>">
                                                        <i class="svg__icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve" class="svg__size">
                                                               <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3   c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1   C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462   H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41   c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z" class="svg__fill"/>
                                                            </svg>
                                                            <span class="cart__value"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?>
                                                            </span>
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php }
                                        if (!empty($slcr_redux['header-navigation-settings-layout-search']) || !isset($slcr_redux)) {?>
                                            <!-- SEARCH -->
                                            <div class="nav__module">
                                                <div class="nav__search">
                                                    <i class="svg__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512" class="svg__size">
                                                           <g>
                                                               <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" class="svg__fill"/>
                                                           </g>
                                                        </svg>
                                                    </i>
                                                </div>
                                            </div>
                                        <?php }?>
                                        <!-- MOBILE SIDEBAR TOGGLE -->
                                        <div class="nav__module mob__ham">
                                            <div class="mob__toggle">
                                                <i class="svg__icon">
                                                    <svg class="svg__ham" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="60px" height="60px">
                                                        <path class="svg__fill" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 3 7 A 1.0001 1.0001 0 1 0 3 9 L 27 9 A 1.0001 1.0001 0 1 0 27 7 L 3 7 z M 3 14 A 1.0001 1.0001 0 1 0 3 16 L 27 16 A 1.0001 1.0001 0 1 0 27 14 L 3 14 z M 3 21 A 1.0001 1.0001 0 1 0 3 23 L 27 23 A 1.0001 1.0001 0 1 0 27 21 L 3 21 z"/>
                                                    </svg>
                                                </i>
                                            </div>
                                        </div>
                                    </div> 
                                <?php if ($header_navigation_container == true) {?> 
                            </div>
                        <?php }?>
                    </div>
                </div>
                <div class="modern__trigger hidden-md hidden-lg">
                    <div class="nav__mobile_mod">
                        <div class="nav__background"></div>
                    </div>
                    <div class="mob__trigger">
                        <div class="ham__menu">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <!-- SEARCH -->
                <div id="search" class="header__search">
                    <div class="search__wrap">
                        <div class="container search__cont">
                            <form  role="search" method="get" id="searchform_page_2"  action="<?php echo esc_url(home_url('/')); ?>">
                                <i class="search__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512" class="svg__size">
                                       <g>
                                           <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" class="svg__fill"/>
                                       </g>
                                    </svg>
                                </i>
                                <span class="search__title"><?php echo esc_html__('What are you looking for?','moppers'); ?></span>
                                <input type="text" class="search__input" placeholder="<?php echo esc_attr__('Search','moppers')?>" value="<?php echo get_search_query(); ?>" name="s" id="s_page" />
                                <input type="hidden" class="search__input" value="main" name="main" id="main_input" />
                            </form>
                            <div class="search__close_btn"><i class="icon_close"></i></div>
                        </div>
                    </div>
                </div>
                <!-- SIDEBAR -->
                <aside class="nav__mobile <?php if ($header_navigation_layout == "third" || $header_navigation_layout == "fourth") {echo esc_attr($header_navigation_layout_side_bar);}?> ">
                    <div class="nav__close">
                        <i class="icon_close"></i>
                    </div>
                    <div class="nav__section">
                        <!-- MODULE -->
                        <div class="nav__module_side">
                            <!-- Level 1 -->
                            <ul class="nav__mobile_list">
                                <?php
                                if (has_nav_menu('main-menu')) {
                                        wp_nav_menu(array('theme_location' => 'main-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Mobile_Slcr_Nav_Primary()));
                                    }
                                if(slcr_helper()->slcr_check_menu_location()!="1") {
                                    if (has_nav_menu('secondary-menu')) {
                                        wp_nav_menu(array('theme_location' => 'secondary-menu', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Mobile_Slcr_Nav_Primary()));
                                    }
                                }
                                    ?>
                            </ul>
                        </div>
                        <!-- MODULE -->
                        <div class="nav__module_side sec__links">
                             <div class="text__mob_side"><?php if (!empty($slcr_redux['header-navigation-settings-layout-top-bar-text'])) {
                                $allowed_html = slcr_helper()->slcr_allowed_html();
                                echo wp_kses($slcr_redux['header-navigation-settings-layout-top-bar-text'], $allowed_html);  }?></div>
                        </div> 
                        <!-- MODULE -->
                        <div class="nav__module_side social">
                            <?php if(slcr_helper()->slcr_social_media_url_check()=="1"){ ?>
                                <ul class="social__side_mob">
                                    <?php slcr_helper()->slcr_social_media_url(); ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </aside>
                <?php global $woocommerce;  
                if ($woocommerce && !empty($slcr_redux['woocommerce-settings-type-2-cart-icon']) && !is_cart()) { ?>
                    <aside class="cart__sidebar woocommerce" data-cart-value="<?php echo WC()->cart->get_cart_contents_count(); ?>">
                        <div class="wrapper">
                            <div class="cart__close"><i class="icon_close"></i></div>
                            <div class="cart__module">
                                <h3 class="cart__title"><?php echo esc_html__('Shopping Cart','moppers'); ?></h3>
                            </div>
                            <div class="cart__module empty">
                                <i class="icon_bag_alt"></i>
                                <h5><?php echo esc_html__('Your cart is empty','moppers'); ?></h5>
                                <p><?php echo esc_html__('Looks like there are no items in your shopping cart','moppers'); ?></p>
                            </div>
                            <div id="cart-ajax-sidebar" class="cart__module has-items">
                                 <?php
                                $items = $woocommerce->cart->get_cart();
                                foreach ($items as $item => $values) {
                                    $_product = wc_get_product($values['data']->get_id());
                                    //product image
                                    $getProductDetail = wc_get_product($values['product_id']);
                                    ?>
                                    <a href="<?php the_permalink($values['product_id'])?>" class="sidebar__product">
                                        <?php echo '<div class="product__image">'.$getProductDetail->get_image().'</div>'; ?>
                                        <div class="product__meta">
                                            <h4><?php echo esc_html($_product->get_title()); ?></h4>
                                            <?php $currency = get_woocommerce_currency_symbol();
                                            $price = get_post_meta($values['product_id'], '_price', true); ?>
                                            <span class="product__price"><span class="quantity"><?php echo esc_html($values['quantity']); ?> x </span> <?php echo esc_html($currency . "" . $price); ?>
                                        </div>
                                    </a>
                                <?php } ?>
                                <div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">
                                    <?php do_action('woocommerce_before_cart_totals');?>
                                    <h2><?php echo esc_html__('Cart totals','moppers');?></h2>
                                    <table class="shop_table shop_table_responsive">
                                        <tr class="cart-subtotal">
                                          <th><?php echo esc_html__('Subtotal','moppers');?></th>
                                          <td data-title="<?php esc_attr_e('Subtotal','moppers');?>"><?php wc_cart_totals_subtotal_html();?></td>
                                        </tr>
                                        <?php foreach (WC()->cart->get_coupons() as $code => $coupon): ?>
                                            <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                                                <th><?php wc_cart_totals_coupon_label($coupon);?></th>
                                                <td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon);?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()): ?>

                                                <?php do_action('woocommerce_cart_totals_before_shipping');?>

                                                <?php wc_cart_totals_shipping_html();?>

                                                <?php do_action('woocommerce_cart_totals_after_shipping');?>

                                        <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')): ?>

                                            <tr class="shipping">
                                                <th><?php echo esc_html__('Shipping','moppers');?></th>
                                                <td data-title="<?php esc_attr_e('Shipping','moppers');?>"><?php woocommerce_shipping_calculator();?></td>
                                            </tr>
                                        <?php endif;?>
                                        <?php foreach (WC()->cart->get_fees() as $fee): ?>
                                            <tr class="fee">
                                                <th><?php echo esc_html($fee->name); ?></th>
                                                <td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee);?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php if (wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart):
                                            $taxable_address = WC()->customer->get_taxable_address();
                                            $estimated_text  = WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()
                                            ? sprintf(' <small>' . __('(estimated for %s)','moppers') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]])
                                            : '';
                                            if ('itemized' === get_option('woocommerce_tax_total_display')): ?>
                                            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax): ?>
                                              <tr class="tax-rate tax-rate-<?php echo sanitize_title($code); ?>">
                                                <th><?php echo esc_html($tax->label) . $estimated_text; ?></th>
                                                <td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
                                              </tr>
                                            <?php endforeach;?>
                                            <?php else: ?>
                                                <tr class="tax-total">
                                                    <th><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; ?></th>
                                                    <td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html();?></td>
                                                </tr>
                                            <?php endif;?>
                                        <?php endif;?>
                                        <?php do_action('woocommerce_cart_totals_before_order_total');?>
                                        <tr class="order-total">
                                            <th><?php echo esc_html__('Total','moppers');?></th>
                                            <td data-title="<?php esc_attr_e('Total','moppers');?>"><?php wc_cart_totals_order_total_html();?></td>
                                        </tr>
                                        <?php do_action('woocommerce_cart_totals_after_order_total');?>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <?php do_action('woocommerce_proceed_to_checkout');?>
                                    </div>
                                    <?php do_action('woocommerce_after_cart_totals');?>
                                </div>
                                <a href="<?php echo wc_get_cart_url(); ?>" class="button wc-forward"><?php echo esc_html__('View cart','moppers')?></a>
                            </div> 
                        </div> 
                    </aside>
                <?php } ?>
            <?php } ?>
        </header>
        <?php if(!empty($slcr_redux["general_settings_privacy_consent"]) || !empty($slcr_redux["general_settings_privacy_bar"])){?>
            <div id="privacy-popup-youtube" class="privacy__popup mfp-hide">
                <button title="<?php echo esc_attr__( 'Close (Esc)', 'moppers' ); ?>" type="button" class="modal-dismiss">×</button>
                <div class="privacy__placeholder">
                    <i class="privacy__icon socicon-youtube"></i>
                    <?php echo esc_html__('This content is blocked due to privacy reasons, you need to allow the use of cookies.','moppers'); ?>
                    <button type="button" class="privacy__agree slcr_cookies_verify_video" data-privacy_consent="youtube" data-days_ex="'.$slcr_redux['general_settings_privacy_cookie_days'].'"><?php echo esc_html__('I Agree','moppers'); ?></button>
                </div>
            </div>
            <div id="privacy-popup-vimeo" class="privacy__popup mfp-hide">
                <button title="<?php echo esc_attr__( 'Close (Esc)', 'moppers' ); ?>" type="button" class="modal-dismiss">×</button>
                <div class="privacy__placeholder">
                    <i class="privacy__icon socicon-vimeo"></i>
                    <?php echo esc_html__('This content is blocked due to privacy reasons, you need to allow the use of cookies.','moppers'); ?>
                    <button type="button" class="privacy__agree slcr_cookies_verify_video" data-privacy_consent="vimeo" data-days_ex="'.$slcr_redux['general_settings_privacy_cookie_days'].'"><?php echo esc_html__('I Agree','moppers'); ?></button>
                </div>
            </div> 
        <?php } ?>
    <!-- HEADER ENDS -->
 