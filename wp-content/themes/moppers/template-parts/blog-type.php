<?php
/** 
 * The SlashCreative Blog Type Template
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="container padding_sm">
            <div class="row">
                <?php
                global $slcr_redux;
                $blog_type        = $slcr_redux['blog-settings-blog-layout'];
                $pagination_style = $slcr_redux['blog-settings-blog-pagination'];
                $blog_show_columns_count_type_1 = $slcr_redux['blog-settings-blog-layout-type-one'];
                $real_blog_layout = '';
                if(!isset($slcr_redux)){
                    $blog_type        = 'type_1';
                    $pagination_style        = 'num';
                    $blog_show_columns_count_type_1 = '5';
                    $real_blog_layout = '5';
                }
                if ($pagination_style == "num") {
                    if ($blog_type == "type_1") {
                        $blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
                        if(!empty($real_blog_layout)){
                            $blog_layout = $real_blog_layout;
                        }
                        switch ($blog_layout) {
                            case "1":
                                echo'<div class="blog__wrap">';
                                break;
                            case "3":
                                echo'<div class="blog__wrap">';
                                break;
                            case "4":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> ';
                                }
                                echo'<div class="blog__wrap">';
                                break;
                            case "5":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> ';
                                }
                                echo'<div class="blog__wrap">';
                                break;
                            default:
                                echo'<div class="blog__wrap">';
                                break;
                        } ?>
                        <div class="blog-grid-size blog__item" data-iso-blog="<?php echo esc_attr($blog_show_columns_count_type_1); ?>"></div>
                        <?php
                        get_template_part('template-parts/blog-layout/layout-one');
                        switch ($blog_layout) {
                            case "1":
                                echo'</div>';
                                break;
                            case "3":
                                echo'</div>';
                                break;
                            case "4":
                                echo'</div>';
                                break;
                            case "5":
                                echo'</div>';
                                break;
                            default:
                                echo'</div>';
                                break;
                        }
                    } else {
                        $blog_layout = $slcr_redux['blog-settings-blog-layout-type-two'];
                        switch ($blog_layout) {
                            case "1":
                                break;
                            case "3":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> ';
                                }
                                break;
                            default:
                                break;
                        } 
                        echo'<div class="blog__wrap">';?>
                        <div class="blog-grid-size blog__item" data-iso-blog="2"></div>
                        <?php 
                        get_template_part('template-parts/blog-layout/layout-two');
                        echo'</div>';
                    }
                    slcr_helper()->slcr_pagination_bar(); ?>        
                    <!-- BLOG PAGINATION -->
                    <?php
                } else {
                    if ($blog_type == "type_1") {
                        $blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
                        if(!empty($real_blog_layout)){
                            $blog_layout = $real_blog_layout;
                        }
                        switch ($blog_layout) {
                            case "1": 
                                break;
                            case "3": 
                                break;
                            case "4":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> ';
                                } 
                                break;
                            case "5":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> '; 
                                }
                                break;
                            default: 
                                break;
                        }
                    } else {
                        $blog_layout = $slcr_redux['blog-settings-blog-layout-type-two'];
                        switch ($blog_layout) {
                            case "1":
                                break;
                            case "3":
                                if (is_active_sidebar('sidebar-main')){
                                    echo '<div class="col-md-8 col-sm-12 col-xs-12 no-padding"> ';
                                }
                                break;
                            default:
                                break;
                        }
                    } 
                    $args = array(
                            'post_type'   => 'post',
                            'post_status' => 'publish',
                            'paged'       => 1,
                        );
                        $my_posts = new WP_Query($args);
                        if ($my_posts->have_posts()):
                        ?>
                        <div class="my-posts">
                            <?php
                            if ($blog_type == "type_1") {
                                $blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
                                if(!empty($real_blog_layout)){
                                    $blog_layout = $real_blog_layout;
                                }
                                switch ($blog_layout) {
                                    case "1":
                                        echo'<div class="blog__wrap">';
                                        break;
                                    case "3":
                                        echo'<div class="blog__wrap">';
                                        break;
                                    case "4": 
                                        echo'<div class="blog__wrap">';
                                        break;
                                    case "5": 
                                        echo'<div class="blog__wrap">';
                                        break;
                                    default:
                                        echo'<div class="blog__wrap">';
                                        break;
                                }
                                 ?>
                                <div class="blog-grid-size blog__item" data-iso-blog="<?php echo esc_attr($blog_show_columns_count_type_1); ?>"></div>
                                <?php
                            }else {
                                echo'<div class="blog__wrap">';?>
                                    <div class="blog-grid-size blog__item" data-iso-blog="2"></div>
                                    <?php
                            }
                            while ($my_posts->have_posts()):
                                    $my_posts->the_post()?>
                                        <?php
                                if ($blog_type == "type_1") {
                                        get_template_part('template-parts/blog-layout/ajax-layout-one');

                                    } else {
                                        get_template_part('template-parts/blog-layout/ajax-layout-two');
                                        
                                    }
                                    ?>
                                    <?php
                            endwhile;
                            if ($blog_type == "type_1") {
                                $blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
                                if(!empty($real_blog_layout)){
                                    $blog_layout = $real_blog_layout;
                                }
                                switch ($blog_layout) {
                                    case "1":
                                        echo'</div>';
                                        break;
                                    case "3":
                                        echo'</div>';
                                        break;
                                    case "4": 
                                        echo'</div>';
                                        break;
                                    case "5": 
                                        echo'</div>';
                                        break;
                                    default:
                                        echo'</div>';
                                        break;
                                }
                            }else {
                                echo'</div>';
                            } ?>
                        </div>
                    <?php
                    endif; 
                    global $wp_query;
                    $slcr_page_count = $wp_query->max_num_pages;
                    if($slcr_page_count > 1) {
                        if ($blog_type == "type_1") { ?>
                            <div class="pagination__blog pagination__load text-center blog_pagination_type_1" ><span class="blog__loadmore_type_1" data-blogajax-nopage="<?php echo esc_attr($slcr_page_count); ?>" data-blogajax-security="<?php echo wp_create_nonce("load_more_posts"); ?>" data-blogajax-url="<?php echo admin_url('admin-ajax.php'); ?>" data-blogajax-loadimage="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/icons/ajax-loader.svg"><?php echo esc_html__('Load More Posts','moppers'); ?></span><span class="loading__animation" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() );?>/images/icons/ajax-loader.svg);"></span></div> 
                            <?php
                        }else {
                            ?>
                            <div class="pagination__blog pagination__load text-center blog_pagination_type_1" ><span class="blog__loadmore_type_1" data-blogajax-nopage="<?php echo esc_attr($slcr_page_count); ?>" data-blogajax-security="<?php echo wp_create_nonce("load_more_posts"); ?>" data-blogajax-url="<?php echo admin_url('admin-ajax.php'); ?>" data-blogajax-loadimage="<?php echo esc_url( get_stylesheet_directory_uri() );?>/assets/images/icons/ajax-loader.svg"><?php echo esc_html__('Load More Posts','moppers'); ?></span><span class="loading__animation" style="background: url(<?php echo esc_url( get_stylesheet_directory_uri() );?>/images/icons/ajax-loader.svg);"></span></div> 
                            <?php
                        }
                    }

                }
                if ($blog_type == "type_1") {
                    $blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
                    if(!empty($real_blog_layout)){
                        $blog_layout = $real_blog_layout;
                    }
                    switch ($blog_layout) {
                        case "1": 
                            break;
                        case "3": 
                            break;
                        case "4": 
                            if (is_active_sidebar('sidebar-main')){
                                echo ' </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">';
                                get_sidebar();
                                echo '</div>';
                            }
                            break;
                        case "5": 
                            if (is_active_sidebar('sidebar-main')){
                                echo ' </div>
                                        <div class="col-md-4 col-sm-12 col-xs-12">';
                                get_sidebar();
                                echo '</div>';
                            }
                            break;
                        default: 
                            break;
                    }
                } else {
                    $blog_layout = $slcr_redux['blog-settings-blog-layout-type-two'];
                    switch ($blog_layout) {
                        case "1":
                            break;
                        case "3":
                            if (is_active_sidebar('sidebar-main')){
                                echo ' </div>
                                    <div class="col-md-4 col-sm-12 col-xs-12">';
                                get_sidebar();
                                echo '</div>';
                            }
                            break;
                        default:
                            break;
                    }
                }?>
            </div>
        </div>
    </div>
</div>