<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.1.0
 *
 * Element Description: VC Blog Grid
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Element Class
class Slcr_Blog_Grid_Data extends WPBakeryShortCode
{
    // Element Init
    public function __construct()
    { 
        add_shortcode('slcr_blog_grid', array(
            $this,
            'slcr_blog_grid_element_html',
        ));
    }
    // ************************   Team title  element setting   ***************************//////
    // Element HTML Team title
    public function slcr_blog_grid_element_html($atts)
    {
        extract(shortcode_atts(array(
            'blog_show_no_posts'             => '',
            'blog_show_blog_type'            => '',
            'blog_show_columns_count_type_1' => '',
            'blog_show_columns_count_type_2' => '',
            'blog_show_order_by'             => '',
            'blog_filter_specific_categorie_real' => '', 
            'el_class' => '',
        ), $atts));
        $rblog_show_columns_count_type_1="";
        $rblog_show_columns_count_type_2="";
        $blog_thumbnail_size = "slcr_medium";
        ob_start();
        if (!empty($el_class)) {
            $el_class =  $el_class;
        }  
        if ($blog_show_blog_type == "type_1") {
            $rblog_show_columns_count_type_1=12/$blog_show_columns_count_type_1;
            if($rblog_show_columns_count_type_1=="12"){ 
                $blog_thumbnail_size = "slcr_large";
            }
        }else {
            $rblog_show_columns_count_type_2=12/$blog_show_columns_count_type_2;  
        } 
        
        if ($blog_show_no_posts == "") {
            $blog_show_no_posts = "4";
        } 
        global $slcr_redux;
        $blog_related_post = true;
        if ($blog_related_post == true) {
            $args = array(
                'posts_per_page' => $blog_show_no_posts,
                'orderby'        => $blog_show_order_by,
                'category_name' => $blog_filter_specific_categorie_real,
            ); ?>
            <div class="blog__wrap">
                <?php 
                if ($blog_show_blog_type == "type_1") {
                    ?>
                    <div class="blog-grid-size blog__item" data-iso-blog="<?php echo esc_attr($blog_show_columns_count_type_1); ?>"></div>
                    <?php
                }else {
                    echo'<div class="blog-grid-size blog__item" data-iso-blog="2"></div>';
                } 

                $my_query = new wp_query($args);
                if ($my_query->have_posts()) {
                    while ($my_query->have_posts()) {
                        $my_query->the_post();
                        if ($blog_show_blog_type == "type_1") {
                            ?>
                            <!-- BlOG ITEM -->
                            <div class="vc_col-md-<?php echo  esc_attr($rblog_show_columns_count_type_1); ?> vc_col-sm-6 vc_col-xs-12 <?php echo   esc_attr($el_class); ?> blog__item" >
                                <?php $post_format;
                                if (has_post_format('video')) {
                                    ?>
                                    <article class="blog__card-01 type__video <?php echo join(' ', get_post_class()); ?>">
                                        <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url($blog_thumbnail_size);?>)">
                                            <div class="type__video-overlay">
                                                <div class="video__button"></div>
                                                    <div class="post__info">
                                                    <span class="post__category"><?php
                                                        $i = 1;
                                                            foreach ((get_the_category()) as $category) {
                                                                if ($i == 1) {
                                                                    echo  esc_html($category->cat_name);
                                                                    $i++;
                                                                } else {
                                                                    echo  esc_html(' , ' . $category->cat_name);
                                                                    $i++;
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                    <span class="time__count">
                                                        <?php 
                                                        $post_object = get_post(); 
                                                        $mycontent = $post_object->post_content;
                                                        $word = str_word_count(strip_tags($mycontent));
                                                        $m = floor($word / 200); 
                                                        $est = $m . ' min read';
                                                        echo  esc_html($est); ?>
                                                    </span>
                                                    <h3 class="post__title"><?php echo esc_html(get_the_title());?></h3>
                                                    <div class="author__info">
                                                        <div class="author__avatar">
                                                            <?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
                                                        </div>
                                                        <div class="author__bio">
                                                            <div class="author__title">
                                                                <span><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>
                                                                </span>
                                                            </div>
                                                            <span class="post__meta"><?php the_time('M j, Y');?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                    </article>
                                    <?php
                                } elseif (has_post_format('link')) {
                                    ?>
                                    <article class="blog__card-01 type__video <?php echo join(' ', get_post_class()); ?>">
                                        <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url($blog_thumbnail_size);?>)">
                                            <div class="type__video-overlay">
                                                <div class="post__info">
                                                    <div class="post__type_link"></div>
                                                    <span class="post__category"><?php
                                                        $i = 1;
                                                            foreach ((get_the_category()) as $category) {
                                                                if ($i == 1) {
                                                                    echo esc_html($category->cat_name);
                                                                    $i++;
                                                                } else {
                                                                    echo esc_html(' , ' . $category->cat_name);
                                                                    $i++;
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                    <span class="time__count">
                                                        <?php
                                                        $post_object = get_post(); 
                                                        $mycontent = $post_object->post_content;
                                                        $word = str_word_count(strip_tags($mycontent));
                                                        $m = floor($word / 200); 
                                                        $est = $m . ' min read';
                                                        echo esc_html($est); ?>
                                                    </span>
                                                    <h3 class="post__title"><?php echo esc_html(get_the_title());?></h3>
                                                    <div class="author__info">
                                                        <div class="author__avatar">
                                                            <?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
                                                        </div>
                                                        <div class="author__bio">
                                                            <div class="author__title">
                                                                <span><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?></span>
                                                            </div>
                                                            <span class="post__meta"><?php the_time('M j, Y');?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </article>
                                    <?php
                                } elseif (has_post_format('audio')) {
                                    ?>
                                    <article class="blog__card-01 type__video <?php echo join(' ', get_post_class()); ?>">
                                        <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url($blog_thumbnail_size);?>)"> 
                                            <div class="type__video-overlay">
                                                <div class="post__info">
                                                    <div class="post__type_audio"></div>
                                                    <span class="post__category"><?php
                                                        $i = 1;
                                                            foreach ((get_the_category()) as $category) {
                                                                if ($i == 1) {
                                                                    echo esc_html($category->cat_name);
                                                                    $i++;
                                                                } else {
                                                                    echo esc_html(' , ' . $category->cat_name);
                                                                    $i++;
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                    <span class="time__count">
                                                        <?php
                                                        $post_object = get_post(); 
                                                        $mycontent = $post_object->post_content;
                                                        $word = str_word_count(strip_tags($mycontent));
                                                        $m = floor($word / 200); 
                                                        $est = $m . ' min read';
                                                        echo esc_html($est); ?>
                                                    </span>
                                                    <h3 class="post__title"><?php echo esc_html(get_the_title());?></h3>
                                                    <div class="author__info">
                                                        <div class="author__avatar">
                                                            <?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
                                                        </div>
                                                        <div class="author__bio">
                                                            <div class="author__title">
                                                                <span><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?></span>
                                                            </div>
                                                            <span class="post__meta"><?php the_time('M j, Y');?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a> 
                                    </article>
                                    <?php
                                } else {
                                    ?>
                                    <article class="blog__card-01 <?php echo join(' ', get_post_class()); ?>">
                                       <?php if ( has_post_thumbnail() ) {  
                                            ?>  <a href="<?php the_permalink();?>" class="featured__image bg-image lazy" data-bg="url(<?php the_post_thumbnail_url($blog_thumbnail_size);?>)"></a><?php 
                                        } ?>
                                        <div class="meta__container">
                                            <div class="post__info">
                                                <span class="post__category"><?php
                                                    $i = 1;
                                                    foreach ((get_the_category()) as $category) {
                                                        if ($i == 1) {
                                                            echo esc_html($category->cat_name);
                                                            $i++;
                                                        } else {
                                                            echo esc_html(' , ' . $category->cat_name);
                                                            $i++;
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                                <span class="time__count">
                                                    <?php
                                                    $post_object = get_post(); 
                                                    $mycontent = $post_object->post_content;
                                                    $word = str_word_count(strip_tags($mycontent));
                                                    $m = floor($word / 200); 
                                                    $est = $m . ' min read';
                                                    echo esc_html($est); ?>
                                                </span>
                                                <a href="<?php the_permalink();?>" class="post__title">
                                                    <h3><?php echo esc_html(get_the_title());?></h3>
                                                </a>
                                            </div>
                                            <div class="author__info">
                                                <div class="author__avatar">
                                                    <?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
                                                </div>
                                                <div class="author__bio">
                                                    <div class="author__title">
                                                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" class="primary-font" title="<?php echo esc_attr__('Posts by ','sc-core'); $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_attr($get_result); ?>" rel="<?php echo esc_attr__('author','sc-core'); ?>"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>
                                                        </a>
                                                    </div>
                                                    <span class="post__meta"><?php the_time('M j, Y');?> 
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                } ?>
                            </div>
                            <?php 
                        } else { 
                            $rblog_show_columns_count_type_2_class="large";
                            if($rblog_show_columns_count_type_2=="6"){
                                $rblog_show_columns_count_type_2_class="medium";
                            } ?>
                            <!-- BlOG ITEM -->
                            <div class="vc_col-md-<?php echo esc_attr($rblog_show_columns_count_type_2); ?> blog__item vc_col-sm-6 vc_col-xs-12 <?php echo  esc_attr($el_class); ?> <?php echo esc_attr($rblog_show_columns_count_type_2_class); ?>">
                                <article class="blog__card-02<?php if(has_post_thumbnail()) {echo esc_attr( ' has-image' ); }?> <?php echo join(' ', get_post_class()); ?>">
                                    <div class="post__image">
                                        <?php if(has_post_thumbnail()) { ?>
                                            <img src="<?php the_post_thumbnail_url('slcr_medium');?>" alt="<?php echo esc_attr( get_the_title()); ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="meta__container">
                                        <div class="post__info">
                                            <span class="post__category"><?php
                                                $i = 1;
                                                    foreach ((get_the_category()) as $category) {
                                                        if ($i == 1) {
                                                            echo esc_html($category->cat_name);
                                                            $i++;
                                                        } else {
                                                            echo esc_html(' , ' . $category->cat_name);
                                                            $i++;
                                                        }
                                                    }
                                                ?>
                                            </span>
                                            <span class="time__count">
                                                <?php
                                                $post = get_post(); 
                                                $mycontent = $post->post_content;
                                                $word = str_word_count(strip_tags($mycontent));
                                                $m = floor($word / 200); 
                                                $est = $m . ' min read';
                                                echo esc_html($est); ?>
                                            </span>
                                            <a href="<?php the_permalink();?>" class="post__title">
                                                <h3><?php echo esc_html(get_the_title());?></h3>
                                            </a>  
                                            <p><?php the_excerpt(); ?></p> 
                                        </div>
                                        <div class="author__info">
                                            <div class="author__avatar">
                                                <?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
                                            </div>
                                            <div class="author__bio">
                                                <div class="author__title">
                                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" class="primary-font" title="<?php echo esc_attr__( 'Posts by ', 'moppers' ); $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>" rel="<?php echo esc_attr__( 'author', 'moppers' ); ?>"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>
                                                    </a>
                                                </div>
                                                <span class="post__meta"><?php the_time('M j, Y');?> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <?php
                        }  
                    }
                } ?>
            </div>
            <?php
        }
        wp_reset_query(); 
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
}
// Element Class Init
new Slcr_Blog_Grid_Data();
?>