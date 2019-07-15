<?php
/** 
 * The SlashCreative Home Page
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
get_header();  
$img              = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
$featured_img_url = $img[0]; 
global $slcr_redux; 
if(empty($featured_img_url)){
    if(isset($slcr_redux['page-header-settings-breadcrumb-image-url']['url'])){
        $featured_img_url=esc_attr( $slcr_redux['page-header-settings-breadcrumb-image-url']['url']);        
    }

}

$page_header_settings_header_height            = apply_filters( 'slcr_value_parameter_filter', $slcr_redux['page-header-settings-header-height']);
$page_header_settings_breadcrumb_show          = $slcr_redux['page-header-settings-breadcrumb-show'];
$page_header_settings_background_type          = $slcr_redux['page-header-settings-background-type']; 
$page_header_settings_overlay_opacity          = $slcr_redux['page-header-settings-overlay-opacity'];

$page_header_settings_content_color            = $slcr_redux['page-header-settings-content-color']; 
$page_header_settings_content_vertical         = $slcr_redux['page-header-settings-content-vertical'];
$page_header_settings_content_horizontal       = $slcr_redux['page-header-settings-content-horizontal']; 

if (get_field('acf_page_header_options_height_87656465', get_option('page_for_posts') )!=""){ 
    $page_header_settings_header_height_real=esc_attr(get_field('acf_page_header_options_height_87656465', get_option('page_for_posts') ));
    $page_header_settings_header_height_real=apply_filters( 'slcr_value_parameter_filter', $page_header_settings_header_height_real);
}else { 
    if($page_header_settings_header_height!=""){
        $page_header_settings_header_height_real=esc_attr($page_header_settings_header_height).'';
    }else {
        $page_header_settings_header_height_real='500px';
    }
}
if (get_field('acf_page_header_options_breadcrumb_87656465', get_option('page_for_posts')) == "inherit" || !class_exists('acf')){ 
    if($page_header_settings_breadcrumb_show == 1 ){
        $page_header_settings_breadcrumb_show_real="on";
    }else {
        $page_header_settings_breadcrumb_show_real="off";
    } 
}else { 
    
    $page_header_settings_breadcrumb_show_real=esc_attr(get_field('acf_page_header_options_breadcrumb_87656465', get_option('page_for_posts'))); 
} 
$page_header_settings_background_type_real = "";
$page_header_settings_overlay_opacity_real="";
if (get_field('acf_page_header_options_background_type_87656465', get_option('page_for_posts')) == "inherit"  || !class_exists('acf')){ 
     
    if($page_header_settings_background_type == "image"){ 
        $page_header_settings_background_type_real ='background-image: url('.esc_attr($featured_img_url).');';
        $page_header_settings_overlay_opacity_real = esc_attr($page_header_settings_overlay_opacity);
    }elseif($page_header_settings_background_type == "color"){ 
        $page_header_settings_background_color          = $slcr_redux['page-header-settings-background-color'];
        $page_header_settings_background_type_real ='background-color: '.esc_attr($page_header_settings_background_color).';';
    }elseif($page_header_settings_background_type == "gradient"){ 

        $page_header_settings_background_gradient          = $slcr_redux['page-header-settings-background-gradient'];
        $page_header_settings_background_type_real ='background: '.esc_attr($page_header_settings_background_gradient).';';
    }

}elseif(get_field('acf_page_header_options_background_type_87656465', get_option('page_for_posts')) == "image"){ 
    $page_header_settings_background_type_real ='background-image: url('.esc_url($featured_img_url).');';
    if(get_field('acf_page_header_options_overlay_87656465', get_option('page_for_posts'))==""){
        $page_header_settings_overlay_opacity_real = '5';
    }else {
       $page_header_settings_overlay_opacity_real = esc_attr(get_field('acf_page_header_options_overlay_87656465', get_option('page_for_posts'))); 
    }
    
}elseif(get_field('acf_page_header_options_background_type_87656465', get_option('page_for_posts')) == "color"){ 
     $page_header_settings_background_type_real ='background-color: '.esc_attr(get_field('acf_page_header_options_backgroundcolor_87656465', get_option('page_for_posts'))).';';
}elseif(get_field('acf_page_header_options_background_type_87656465', get_option('page_for_posts')) == "gradient"){ 
     $page_header_settings_background_type_real ='background: '.esc_attr(get_field('acf_page_header_options_overlay_gradient_87656465', get_option('page_for_posts'))).';';
}

if (get_field('acf_page_header_options_content_87656465', get_option('page_for_posts'))=="default"){ 
    if($page_header_settings_content_color=="light"){
        $page_header_settings_content_color_real='light';
    }else {
        $page_header_settings_content_color_real='dark';
    }
    
}else { 
    $page_header_settings_content_color_real=esc_attr(get_field('acf_page_header_options_content_87656465', get_option('page_for_posts')));
}

$page_header_settings_content_vertical_real="";
$page_header_settings_content_horizontal_real="";
if (get_field('acf_page_header_options_content_vertical_87656465', get_option('page_for_posts')) == "default"){ 
     $page_header_settings_content_vertical_real = esc_attr($page_header_settings_content_vertical); 
    
}else { 
    
     $page_header_settings_content_vertical_real = esc_attr(get_field('acf_page_header_options_content_vertical_87656465', get_option('page_for_posts')));
}

if (get_field('acf_page_header_options_content_horizontal_87656465', get_option('page_for_posts')) == "default"){ 
    $page_header_settings_content_horizontal_real = esc_attr($page_header_settings_content_horizontal);
}else { 
    
    $page_header_settings_content_horizontal_real=esc_attr(get_field('acf_page_header_options_content_horizontal_87656465', get_option('page_for_posts')));
}

if (get_field('acf_page_header_options_show_87656465', get_option('page_for_posts'))=="off" || !isset($slcr_redux)){ 

}else {  
    $blog_page_id = get_option( 'page_for_posts' );
    if ($blog_page_id==0){   
        $uid2 = uniqid();
        $slcr_custom_heading_css = '.slcr_custom_heading_' . $uid2 . '{  '.esc_attr($page_header_settings_background_type_real).' height: '.esc_attr($page_header_settings_header_height_real).' ; }';
        $name="inline_slcr";
        $value=$slcr_custom_heading_css;
        do_action( 'wp_enqueue_scripts',$value,$name); ?>
        <!-- HEADER ENDS -->
        <section class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="page__header home__header content-<?php echo esc_attr($page_header_settings_content_color_real); ?> slcr_custom_heading_<?php  echo esc_attr($uid2);?>"  data-header-vertical-align="<?php echo esc_attr('middle'); ?>"   data-header-content-align="<?php echo  esc_attr('left'); ?>"  <?php if($page_header_settings_overlay_opacity_real !=""){echo 'data-bg-overlay="'.$page_header_settings_overlay_opacity_real.'"';} ?> >
                    <div class="content">
                        <div class="container">
                            <div class="inner">
                                <?php if (get_field('acf_page_header_options_title_87656465', get_option('page_for_posts'))){?>
                                    <h1><?php $rpageheader_options_title=get_field('acf_page_header_options_title_87656465', get_option('page_for_posts')); echo esc_html($rpageheader_options_title);?></h1>
                                 <?php }else {?>
                                    <h1><?php echo esc_html('Blog'); ?></h1>
                                <?php } ?>  
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        }
    else { 
        $uid2 = uniqid();
        $slcr_custom_heading_css = '.slcr_custom_heading_' . $uid2 . '{  '.esc_attr($page_header_settings_background_type_real).' height: '.esc_attr($page_header_settings_header_height_real).' ; }';
        $name="inline_slcr";
        $value=$slcr_custom_heading_css;
        do_action( 'wp_enqueue_scripts',$value,$name); ?>
        <!-- HEADER ENDS -->
        <section class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="page__header content-<?php echo esc_attr($page_header_settings_content_color_real); ?> slcr_custom_heading_<?php  echo esc_attr($uid2);?>"  data-header-vertical-align="<?php echo esc_attr($page_header_settings_content_vertical_real); ?>"   data-header-content-align="<?php echo  esc_attr($page_header_settings_content_horizontal_real); ?>"  <?php if($page_header_settings_overlay_opacity_real !=""){echo 'data-bg-overlay="'.$page_header_settings_overlay_opacity_real.'"';} ?> >
                    <div class="content">
                        <div class="container">
                            <div class="inner">
                                <?php if (get_field('acf_page_header_options_title_87656465', get_option('page_for_posts'))){?>
                                    <h1><?php $rpageheader_options_title=get_field('acf_page_header_options_title_87656465', get_option('page_for_posts')); echo esc_html($rpageheader_options_title);?></h1>
                                 <?php }else {?>
                                    <h1><?php $page_title =  get_the_title( get_option('page_for_posts', true) ); echo esc_html($page_title); ?></h1>
                                <?php } ?> 
                                <?php if (get_field('acf_page_header_options_description_87656465', get_option('page_for_posts'))){ ?>
                                    <p><?php $rpage_header_options_description=get_field('acf_page_header_options_description_87656465', get_option('page_for_posts')); echo esc_html($rpage_header_options_description);?></p>
                                <?php }  
                                if($page_header_settings_breadcrumb_show_real == "on"){ ?>
                                    <ul class="breadcrumbs">
                                        <li><a href="<?php echo esc_url(get_home_url()); ?>"><?php echo esc_html__('Home','moppers'); ?></a></li>
                                        <li><a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php $rget_the_title =get_the_title( get_option('page_for_posts', true) ); echo esc_html($rget_the_title); ?></a>
                                        </li> 
                                    </ul>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php  } 
}  ?>
<main class="main__content">
    <?php get_template_part('template-parts/blog-type');?>
</main>
<?php get_footer();?>