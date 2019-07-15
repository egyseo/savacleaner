<?php
/** 
 * The SlashCreative Footer Page
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
$footer_layout              = $slcr_redux['footer-settings-layout-type'];
$footer_type_wider          = $slcr_redux['footer-settings-layout-type-wider'];
$footer_type_wider_4_col    = $slcr_redux['footer-settings-layout-type-wider-4-col'];
$footer_type_wider_5_col    = $slcr_redux['footer-settings-layout-type-wider-5-col'];
$footer_meta_position_2_col = $slcr_redux['footer-settings-layout-footer-meta-position-2-col'];
$footer_meta_position_3_col = $slcr_redux['footer-settings-layout-footer-meta-position-3-col'];
$footer_meta_position_4_col = $slcr_redux['footer-settings-layout-footer-meta-position-4-col'];
$footer_meta_position_5_col = $slcr_redux['footer-settings-layout-footer-meta-position-5-col'];
$footer_meta_social_position = $slcr_redux['footer-settings-layout-footer-social-position'];
$footer_meta_copyright_text_on_off = $slcr_redux['footer-settings-copyright-text-on-off'];
$footer_meta_copyright_text_default = $slcr_redux['footer-settings-copyright-text-default'];
$footer_meta_copyright_image_overlay = $slcr_redux['footer-settings-background-image-overlay'];
$footer_settings_type = $slcr_redux['footer-settings-type'];
if(!isset($slcr_redux)){
    $footer_meta_copyright_text_on_off  = 0; 
    $footer_meta_copyright_text_default = 0;
    $footer_settings_type               = 2;
    $footer_meta_copyright_image_overlay = '0';
}
$real_footer_wider       = "0";
$real_footer_meta_position       = "0";
if ($footer_layout == "1_col") {
    $col_real = "col__1";
} elseif ($footer_layout == "2_col") {
    $col_real = "col__2";
} elseif ($footer_layout == "3_col") {
    $col_real = "col__3";
} elseif ($footer_layout == "4_col") {
    $col_real = "col__4";
} else {
    $col_real = "col__5";
}
$footer_type_wider_real = "";
if ($footer_type_wider != "none" || $footer_type_wider_4_col != "none" || $footer_type_wider_5_col != "none") {
    if ($footer_layout == "3_col") {
        if ($footer_type_wider == "3") {
            $real_footer_wider      = "3";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider == "2") {
            $real_footer_wider      = "2";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider == "1") {
            $real_footer_wider      = "1";
            $footer_type_wider_real = "col__alternate";
        }

        
    } elseif ($footer_layout == "4_col") {
        if ($footer_type_wider_4_col == "4") {
            $real_footer_wider      = "4";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_4_col == "3") {
            $real_footer_wider      = "3";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_4_col == "2") {
            $real_footer_wider      = "2";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_4_col == "1") {
            $real_footer_wider      = "1";
            $footer_type_wider_real = "col__alternate";
        } 
 
    } elseif ($footer_layout == "5_col") {
        if ($footer_type_wider_5_col == "5") {
            $real_footer_wider      = "5";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_5_col == "4") {
            $real_footer_wider      = "4";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_5_col == "3") {
            $real_footer_wider      = "3";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_5_col == "2") {
            $real_footer_wider      = "2";
            $footer_type_wider_real = "col__alternate";
        } elseif ($footer_type_wider_5_col == "1") {
            $real_footer_wider      = "1";
            $footer_type_wider_real = "col__alternate";
        } 
 
    }  
    else {
        $footer_type_wider_real = "";
        $real_footer_wider      = ""; 
    }
} else {
    $footer_type_wider_real = "";
    $real_footer_wider      = "";
}

      if ($footer_layout == "3_col") { 

        if ($footer_meta_position_3_col == "3") {
            $real_footer_meta_position      = "3"; 
        } elseif ($footer_meta_position_3_col == "2") {
            $real_footer_meta_position      = "2"; 
        } elseif ($footer_meta_position_3_col == "1"){
            $real_footer_meta_position      = "1"; 
        }
    } elseif ($footer_layout == "4_col") { 
        if ($footer_meta_position_4_col == "4") {
            $real_footer_meta_position      = "4"; 
        }elseif ($footer_meta_position_4_col == "3") {
            $real_footer_meta_position      = "3"; 
        } elseif ($footer_meta_position_4_col == "2") {
            $real_footer_meta_position      = "2"; 
        } elseif ($footer_meta_position_4_col == "1"){
            $real_footer_meta_position      = "1"; 
        }
    } elseif ($footer_layout == "5_col") { 
        if ($footer_meta_position_5_col == "5") {
            $real_footer_meta_position      = "5"; 
        }elseif ($footer_meta_position_5_col == "4") {
            $real_footer_meta_position      = "4"; 
        }elseif ($footer_meta_position_5_col == "3") {
            $real_footer_meta_position      = "3"; 
        } elseif ($footer_meta_position_5_col == "2") {
            $real_footer_meta_position      = "2"; 
        } elseif ($footer_meta_position_5_col == "1"){
            $real_footer_meta_position      = "1"; 
        }
    } elseif ($footer_layout == "2_col") {
      if ($footer_meta_position_2_col == "2") {
            $real_footer_meta_position      = "2"; 
        } elseif ($footer_meta_position_2_col == "1"){
            $real_footer_meta_position      = "1"; 
        }
 
    }
    elseif ($footer_layout == "1_col") { 
        $real_footer_meta_position      = "1"; 
    }
  
   global $wp_query;
    $acf_page_id =$wp_query->get_queried_object_id();  
    global $wp;
    $current_page_url_acf = home_url( $wp->request ); 
    global $slcr_redux; 
    include_once locate_template('template-parts/main/footer.php');
 