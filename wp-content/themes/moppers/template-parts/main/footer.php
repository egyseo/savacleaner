<?php
/** 
 * The SlashCreative Footer Template
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
} 
global $slcr_redux; 
$acf_page_footer_custom_logo = get_field('acf_page_footer_custom_logo', $acf_page_id); 
$footer_logo_real="";
if ( !empty($acf_page_footer_custom_logo) ){ 
    $acf_page_footer_custom_logo_alt="logo";
    if(!empty($acf_page_footer_custom_logo['alt'])){
        $acf_page_footer_custom_logo_alt=$acf_page_footer_custom_logo['alt']; 
    }
    $footer_logo_real='  <div class="footer__logo">
            <img src="'.esc_url($acf_page_footer_custom_logo['url']).'" alt="'.esc_attr( $acf_page_footer_custom_logo_alt ).'" />
          </div> ';
}else {
    if (!empty($slcr_redux['footer-settings_logo']['url'])) { 
        $footer_logo_url = $slcr_redux['footer-settings_logo']['url'];
        $footer_logo_url_alt="logo";
        if(!empty($slcr_redux['footer-settings_logo']['alt'])){
            $footer_logo_url_alt=$slcr_redux['footer-settings_logo']['alt']; 
        } 
        $footer_logo_real='  <div class="footer__logo">
            <img src="'.esc_url($footer_logo_url).'" alt="'.esc_attr( $footer_logo_url_alt ).'" />
        </div> ';
    }else {   
        $footer_logo_real='  <div class="footer__logo">
            <img src="'.esc_url(SLCR_THEME_IMAGE_URI . 'icons/slcr-logo-footer.svg').'" alt="'.esc_attr__( 'logo', 'moppers' ).'" />
        </div> ';
    }
} 
 
function main_content($racf_page_id){
    global $slcr_redux;
    global $wp_query;
    $acf_page_id = $racf_page_id;  
    $acf_page_footer_custom_logo = get_field('acf_page_footer_custom_logo', $acf_page_id); 
    $footer_logo_real="";
    if ( !empty($acf_page_footer_custom_logo) ){  
        $acf_page_footer_custom_logo_alt="logo";
        if(!empty($acf_page_footer_custom_logo['alt'])){
            $acf_page_footer_custom_logo_alt=$acf_page_footer_custom_logo['alt']; 
        }
        $footer_logo_real='  <div class="footer__logo">
            <img src="'.esc_url($acf_page_footer_custom_logo['url']).'" alt="'.esc_attr( $acf_page_footer_custom_logo_alt ).'" />
        </div> ';
        $allowed_html = slcr_helper()->slcr_allowed_html();
        echo wp_kses($footer_logo_real, $allowed_html); 
    }else {
        if (!empty($slcr_redux['footer-settings_logo']['url'])) { 
            $footer_logo_url = $slcr_redux['footer-settings_logo']['url']; 
            $footer_logo_url_alt="logo";
            if(!empty($slcr_redux['footer-settings_logo']['alt'])){
                $footer_logo_url_alt=$slcr_redux['footer-settings_logo']['alt']; 
            } 
            $footer_logo_real='  <div class="footer__logo">
                <img src="'.esc_url($footer_logo_url).'" alt="'.esc_attr( $footer_logo_url_alt ).'" />
              </div> ';
            $allowed_html = slcr_helper()->slcr_allowed_html();
            echo wp_kses($footer_logo_real, $allowed_html);
        }else {  
            $footer_logo_real='  <div class="footer__logo">
                <img src="'.esc_url(SLCR_THEME_IMAGE_URI . 'icons/slcr-logo-footer.svg').'" alt="'.esc_attr__( 'logo', 'moppers' ).'" />
            </div> ';
            $allowed_html = slcr_helper()->slcr_allowed_html();
            echo wp_kses($footer_logo_real, $allowed_html);
        }
   }
    if (!empty($slcr_redux['footer-settings-copyright-text'])) {
        ?>
        <div class="footer__desc">
            <p><?php
                $allowed_html = slcr_helper()->slcr_allowed_html();
                echo wp_kses($slcr_redux['footer-settings-copyright-text'], $allowed_html); ?>
            </p>
        </div>
        <?php
    }
    $footer_meta_social_position_2 = $slcr_redux['footer-settings-layout-footer-social-position'];
    if($footer_meta_social_position_2 == "default"){
      slcr_helper()->slcr_footer_social();
    }
} 


 
$acf_page_footer_background_type = get_field('acf_page_footer_background_type', $acf_page_id); 
$acf_page_footer_background_image = get_field('acf_page_footer_background_image', $acf_page_id);   
if($slcr_redux['footer-settings-footer-backgroud-type'] == "color" || $acf_page_footer_background_type  == "color" ) { 
    $footer_meta_copyright_image_overlay = "0"; 
} 
$acf_page_footer_background_image_overlay_opacity = get_field('acf_page_footer_background_image_overlay_opacity', $acf_page_id); 
if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){
    $footer_meta_copyright_image_overlay=$acf_page_footer_background_image_overlay_opacity;
} 
$acf_page_footer_background_color_scheme_real=$slcr_redux['footer-settings-footer-background-color-scheme'];
$acf_page_footer_background_color_scheme = get_field('acf_page_footer_background_color_scheme', $acf_page_id); 
if ( $acf_page_footer_background_color_scheme == "dark" || $acf_page_footer_background_color_scheme == "light" ){
    $acf_page_footer_background_color_scheme_real=$acf_page_footer_background_color_scheme;
}
if($footer_settings_type=="grid"){
    ?>

    <footer class="footer__cont slcr-sidebar <?php echo esc_attr($col_real);  echo " ".esc_attr($footer_type_wider_real); ?> " data-footer-layout="first" data-widget-align="<?php echo esc_attr($slcr_redux['footer-settings-layout-widget-align']); ?>"  data-social-location="<?php echo esc_attr($footer_meta_social_position); ?>" <?php 
        if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){  
             echo 'style="background-image: url('.esc_url($acf_page_footer_background_image).');"';
        }else {
            if(!empty($slcr_redux['footer-settings-footer-background-image']['url']) && $slcr_redux['footer-settings-footer-backgroud-type'] == "image") {  
                $slcr_acf_page_footer_background_image_real=$slcr_redux['footer-settings-footer-background-image']['url'];
                echo 'style="background-image: url('.esc_url($slcr_acf_page_footer_background_image_real).');"'; 
            } 
        } ?> data-bg-overlay="<?php echo esc_attr($footer_meta_copyright_image_overlay); ?>" data-footer-scheme="<?php echo esc_attr($acf_page_footer_background_color_scheme_real); ?>">
        <div class="footer__main">
            <div class="container no-padding">
                <div class="widget__area<?php if ($real_footer_wider == "1") {echo ' wider ';}?>">
                    <div class="widget__wrap">
                        <?php if($real_footer_meta_position=="1"){
                            main_content($acf_page_id);
                        }
                        if (is_active_sidebar('custom-side-bar-1')): ?>
                          <?php dynamic_sidebar('custom-side-bar-1');?>
                        <?php endif;?>
                    </div>
                </div>
                <?php
                if ($footer_layout != "1_col") {?>
                    <div class="widget__area<?php if ($real_footer_wider == "2") {echo ' wider ';}?>">
                        <div class="widget__wrap">
                              <?php if($real_footer_meta_position=="2"){
                                    main_content($acf_page_id);
                                }
                                if (is_active_sidebar('custom-side-bar-2')): ?>
                                  <?php dynamic_sidebar('custom-side-bar-2');?>
                                <?php endif;?>
                        </div>
                    </div>
                <?php }
                if ($footer_layout == "3_col" || $footer_layout == "4_col" || $footer_layout == "5_col") {?>
                    <div class="widget__area<?php if ($real_footer_wider == "3") {echo ' wider ';}?>">
                        <div class="widget__wrap">
                            <?php if($real_footer_meta_position=="3"){
                                main_content($acf_page_id);
                            }
                            if (is_active_sidebar('custom-side-bar-3')): ?>
                                <?php dynamic_sidebar('custom-side-bar-3');?>
                            <?php endif;?>
                        </div>
                    </div>
                <?php }
                if ($footer_layout == "4_col" || $footer_layout == "5_col") {?>
                    <div class="widget__area<?php if ($real_footer_wider == "4") {echo ' wider ';}?>">
                        <div class="widget__wrap">
                            <?php if($real_footer_meta_position=="4"){
                                main_content($acf_page_id);
                            }
                            if (is_active_sidebar('custom-side-bar-4')): ?>
                                <?php dynamic_sidebar('custom-side-bar-4');?>
                            <?php endif;?>
                        </div>
                    </div>
                <?php }
                if ($footer_layout == "5_col") {?>
                    <div class="widget__area<?php if ($real_footer_wider == "5") {echo ' wider ';}?>">
                        <div class="widget__wrap">
                            <?php if($real_footer_meta_position=="5"){
                                main_content($acf_page_id);
                            }
                            if (is_active_sidebar('custom-side-bar-5')): ?>
                                <?php dynamic_sidebar('custom-side-bar-5');?>
                            <?php endif;?>
                        </div>
                    </div>
                <?php }?>
            </div> 
        </div>
        <?php 
         if($footer_meta_copyright_text_on_off== 0 ){?>
            <div class="footer__bottom">
                <div class="container">
                    <div class="copyright__text" >
                        <?php if($footer_meta_copyright_text_default=="1") {  }else {
                                ?> © <?php echo date("Y"); ?> - <?php bloginfo( 'name' );  
                        } 
                        if(isset($slcr_redux['footer-settings-copyright-down-text'])){
                            $allowed_html = slcr_helper()->slcr_allowed_html();
                            echo " ".wp_kses($slcr_redux['footer-settings-copyright-down-text'], $allowed_html); 
                        }  ?>
                    </div>
                    <?php if($footer_meta_social_position == "bottom"){
                    slcr_helper()->slcr_footer_social();
                    } ?>
                </div>
            </div>
        <?php }?> 
    </footer><!-- FOOTER JAVASCRIPTS -->
    <?php
}elseif($footer_settings_type=="2"){ ?>
    <footer class="footer__cont  <?php echo esc_attr($slcr_redux['footer-settings-layout-content-align']); ?>" data-footer-layout="second" data-footer-scheme="<?php echo esc_attr($acf_page_footer_background_color_scheme_real); ?>"   data-social-location="<?php echo esc_attr($footer_meta_social_position); ?>"   <?php 
        if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){  
             echo 'style="background-image: url('.esc_url($acf_page_footer_background_image).');"';
        }else {
            if(!empty($slcr_redux['footer-settings-footer-background-image']['url']) && $slcr_redux['footer-settings-footer-backgroud-type'] == "image") {  
                $slcr_acf_page_footer_background_image_real=$slcr_redux['footer-settings-footer-background-image']['url'];
                echo 'style="background-image: url('.esc_url($slcr_acf_page_footer_background_image_real).');"'; 
            } 
        }  ?> data-bg-overlay="<?php echo esc_attr($footer_meta_copyright_image_overlay); ?>" >
        <div class="footer__main">
            <div class="container no-padding">
                <div class="widget__area">
                    <?php if (is_active_sidebar('custom-side-bar-1')){ ?>
                        <?php dynamic_sidebar('custom-side-bar-1');?>
                    <?php } ?> 
                    <?php
                    global $slcr_redux;
                    if ($slcr_redux['footer-settings-copyright-text'] != "") {
                          ?>
                        <div class="footer__desc">
                            <p><?php 
                                $allowed_html = slcr_helper()->slcr_allowed_html();
                                echo wp_kses($slcr_redux['footer-settings-copyright-text'], $allowed_html); ?>
                            </p>
                        </div>
                        <?php

                    }  
                    slcr_helper()->slcr_footer_social(); 
                    ?> 
                </div>
            </div>
        </div>
                <?php 
         if($footer_meta_copyright_text_on_off== 0 ){?>
                <div class="footer__bottom">
                    <div class="container">
                        <?php
                        $allowed_html = slcr_helper()->slcr_allowed_html();
                        echo wp_kses($footer_logo_real, $allowed_html);
                        ?> 
                        <div class="copyright__text" >
                            <?php if($footer_meta_copyright_text_default=="1") {  }else { ?> © <?php echo date("Y"); ?> - <?php bloginfo( 'name' );  }
                            if(isset($slcr_redux['footer-settings-copyright-down-text'])){
                                $allowed_html = slcr_helper()->slcr_allowed_html();
                                echo " ".wp_kses($slcr_redux['footer-settings-copyright-down-text'], $allowed_html);  
                            } ?>
                        </div> 
                    </div>
                </div>
        <?php }?>
    </footer><!-- FOOTER JAVASCRIPTS -->

<?php }elseif($footer_settings_type=="3"){ ?>
   <footer class="footer__cont" data-footer-layout="third" data-footer-scheme="<?php echo esc_attr($acf_page_footer_background_color_scheme_real); ?>"  data-widget-align="<?php echo esc_attr($slcr_redux['footer-settings-layout-widget-align']); ?>"  data-social-location="<?php echo esc_attr($footer_meta_social_position); ?>" <?php 
        if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){  
             echo 'style="background-image: url('.esc_url($acf_page_footer_background_image).');"';
        }else {
            if(!empty($slcr_redux['footer-settings-footer-background-image']['url']) && $slcr_redux['footer-settings-footer-backgroud-type'] == "image") {  
                $slcr_acf_page_footer_background_image_real=$slcr_redux['footer-settings-footer-background-image']['url'];
                echo 'style="background-image: url('.esc_url($slcr_acf_page_footer_background_image_real).');"'; 
            } 
        }  ?> data-bg-overlay="<?php echo esc_attr($footer_meta_copyright_image_overlay); ?>">
            <div class="footer__main">
                <div class="container no-padding">
                    <div class="widget__area">
                        <?php if (is_active_sidebar('custom-side-bar-1')): ?>
                            <?php dynamic_sidebar('custom-side-bar-1');?>
                        <?php endif;?> 
                    </div>
                    <div class="widget__area">
                        <?php
                        $allowed_html = slcr_helper()->slcr_allowed_html();
                        echo wp_kses($footer_logo_real, $allowed_html); 
                        global $slcr_redux;
                        if ($slcr_redux['footer-settings-copyright-text'] != "") {
                            ?>
                            <div class="footer__desc">
                                <p><?php 
                                    $allowed_html = slcr_helper()->slcr_allowed_html();
                                    echo wp_kses($slcr_redux['footer-settings-copyright-text'], $allowed_html); ?>
                                </p>
                            </div>
                            <?php 
                        }
                        ?> 
                    </div>
                    <div class="widget__area">
                        <?php 
                          slcr_helper()->slcr_footer_social(); 
                         ?> 
                    </div>
                </div>
            </div>
            <?php 
        if($footer_meta_copyright_text_on_off== 0 ){?>
            <div class="footer__bottom">
                <div class="container">
                    <div class="copyright__text" >
                        <?php if($footer_meta_copyright_text_default=="1") {  }else {
                        ?> © <?php echo date("Y"); ?> - <?php bloginfo( 'name' );  } 
                        if(isset($slcr_redux['footer-settings-copyright-down-text'])){
                            $allowed_html = slcr_helper()->slcr_allowed_html();
                            echo " ".wp_kses($slcr_redux['footer-settings-copyright-down-text'], $allowed_html); 
                        } ?>
                    </div> 
                </div>
            </div>
        <?php }?>
    </footer>
<?php }elseif($footer_settings_type=="4"){ ?>
   <footer class="footer__cont" data-footer-layout="fourth" data-footer-scheme="<?php echo esc_attr($acf_page_footer_background_color_scheme_real); ?>" data-widget-align="<?php echo esc_attr($slcr_redux['footer-settings-layout-widget-align']); ?>"  data-social-location="<?php echo esc_attr($footer_meta_social_position); ?>"    <?php 
        if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){  
             echo 'style="background-image: url('.esc_url($acf_page_footer_background_image).');"';
        }else {
            if(!empty($slcr_redux['footer-settings-footer-background-image']['url']) && $slcr_redux['footer-settings-footer-backgroud-type'] == "image") {  
                $slcr_acf_page_footer_background_image_real=$slcr_redux['footer-settings-footer-background-image']['url'];
                echo 'style="background-image: url('.esc_url($slcr_acf_page_footer_background_image_real).');"'; 
            } 
        }  ?> data-bg-overlay="<?php echo esc_attr($footer_meta_copyright_image_overlay); ?>">
        <div class="footer__main">
            <div class="container no-padding">
                <div class="widget__area">
                    <?php
                    $allowed_html = slcr_helper()->slcr_allowed_html();
                    echo wp_kses($footer_logo_real, $allowed_html);
                    ?>
                    <?php
                    global $slcr_redux;
                    if ($slcr_redux['footer-settings-copyright-text'] != "") {
                    ?>
                        <div class="footer__desc">
                            <p><?php 
                                $allowed_html = slcr_helper()->slcr_allowed_html();
                                echo wp_kses($slcr_redux['footer-settings-copyright-text'], $allowed_html); ?>        
                            </p>
                        </div>
                    <?php 
                    }
                    ?> 
                </div>
                <div class="widget__area">
                   <?php if (is_active_sidebar('custom-side-bar-1')){  dynamic_sidebar('custom-side-bar-1');  }?> 
                </div>
                <div class="widget__area">
                    <?php 
                      slcr_helper()->slcr_footer_social(); 
                     ?> 
                </div>
            </div>
        </div>
            <?php 
        if($footer_meta_copyright_text_on_off== 0 ){?>
            <div class="footer__bottom">
                <div class="container">
                    <div class="copyright__text" >
                        <?php if($footer_meta_copyright_text_default=="1") {  }else {
                        ?> © <?php echo date("Y"); ?> - <?php bloginfo( 'name' );  } 
                        if(isset($slcr_redux['footer-settings-copyright-down-text'])){
                            $allowed_html = slcr_helper()->slcr_allowed_html();
                            echo " ".wp_kses($slcr_redux['footer-settings-copyright-down-text'], $allowed_html); 
                        } ?>
                    </div> 
                </div>
            </div>
        <?php }?>
    </footer>
 <?php }elseif($footer_settings_type=="5"){ ?>
    <footer class="footer__cont" data-footer-layout="fifth" data-footer-scheme="<?php echo esc_attr($acf_page_footer_background_color_scheme_real); ?>"   data-widget-align="<?php echo esc_attr($slcr_redux['footer-settings-layout-widget-align']); ?>"  data-social-location="<?php echo esc_attr($footer_meta_social_position); ?>"    <?php 
        if ( !empty($acf_page_footer_background_image) && $acf_page_footer_background_type == "image" ){  
             echo 'style="background-image: url('.esc_url($acf_page_footer_background_image).');"';
        }else {
            if(!empty($slcr_redux['footer-settings-footer-background-image']['url']) && $slcr_redux['footer-settings-footer-backgroud-type'] == "image") {  
                $slcr_acf_page_footer_background_image_real=$slcr_redux['footer-settings-footer-background-image']['url'];
                echo 'style="background-image: url('.esc_url($slcr_acf_page_footer_background_image_real).');"'; 
            } 
        }  ?> data-bg-overlay="<?php echo esc_attr($footer_meta_copyright_image_overlay); ?>">
            <div class="footer__main">
                <div class="container no-padding">
                    <div class="widget__area">
                        <?php
                          $allowed_html = slcr_helper()->slcr_allowed_html();
                          echo wp_kses($footer_logo_real, $allowed_html); ?>
                        <?php
                        global $slcr_redux;
                        if ($slcr_redux['footer-settings-copyright-text'] != "") {
                              ?>
                            <div class="footer__desc">
                                <p><?php 
                                    $allowed_html = slcr_helper()->slcr_allowed_html();
                                    echo wp_kses($slcr_redux['footer-settings-copyright-text'], $allowed_html); ?>
                                </p>
                            </div>
                        <?php } ?> 
                    </div>
                    <div class="widget__area">
                        <?php 
                          slcr_helper()->slcr_footer_social(); 
                         ?>
                    </div>
                </div>
            </div>
            <?php 
        if($footer_meta_copyright_text_on_off== 0 ){?>
            <div class="footer__bottom">
                <div class="container">
                    <div class="widget__area">
                        <?php if (is_active_sidebar('custom-side-bar-1')){  dynamic_sidebar('custom-side-bar-1');  }?> 
                    </div>
                    <div class="copyright__text" >
                        <?php if($footer_meta_copyright_text_default=="1") {  }else {
                        ?> © <?php echo date("Y"); ?> - <?php bloginfo( 'name' );  } 
                        if(isset($slcr_redux['footer-settings-copyright-down-text'])){
                            $allowed_html = slcr_helper()->slcr_allowed_html();
                            echo " ".wp_kses($slcr_redux['footer-settings-copyright-down-text'], $allowed_html);  
                        } ?>
                    </div> 
                </div>
            </div>
        <?php }?>
    </footer>
<?php } 
    $get_result =apply_filters( 'slcr_cookies_verify_filter', 'footer'); 
    $rget_result=array();
    if (isset($_COOKIE["PrivacyConsent"])){   
        $rget_result = explode(',', $_COOKIE["PrivacyConsent"]); 
    }
    
    if (in_array('Default', $rget_result)) { 
    } else {
        if(!empty($slcr_redux["general_settings_privacy_bar"])){
            ?>
            <div class="privacy__bar">
                <div class="privacy__wrap">
                    <div class="container">
                        <div class="privacy__text"><?php echo esc_html($slcr_redux["general_settings_privacy_bar_text"]); ?></div>
                        <div class="privacy__text"><?php $allowed_html = slcr_helper()->slcr_allowed_html(); echo wp_kses($slcr_redux['general_settings_privacy_bar_desc'], $allowed_html); ?></div>
                        <div class="privacy__button">
                            <button class="privacy__agree" type="button" id="slcr_cookies_verify_footer_bar" data-privacy_consent="<?php echo esc_attr($get_result); ?>" data-days_ex="<?php echo esc_attr($slcr_redux['general_settings_privacy_cookie_days']); ?>"><?php echo esc_html($slcr_redux["general_settings_privacy_bar_button_text"]); ?></button>
                        </div>
                    </div>
                </div>
                
            </div>  
        <?php                        
        }
    }
    
wp_footer();
?>
</body> 
</html>