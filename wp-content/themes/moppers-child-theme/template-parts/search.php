<?php
/** 
 * The SlashCreative Search Template
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
if (!defined('ABSPATH')) {
die('-1');
}
if (!is_search()) {
return;
}
$search_string = $s;
global $slcr_redux;
$blog_settings_blog_single_sidebar_archive_show= "";  
if(isset($slcr_redux['blog-settings-blog-single-sidebar-archive-show'])){
    if($slcr_redux['blog-settings-blog-single-sidebar-archive-show']=="1"){
       $blog_settings_blog_single_sidebar_archive_show= ""; 
    }else {
        $blog_settings_blog_single_sidebar_archive_show= " col-md-offset-2";
    }
}
else {
        $blog_settings_blog_single_sidebar_archive_show= " col-md-offset-2";
}

if(isset($_GET['main'])){
  $main_type = esc_attr($_GET['main']);  
}

?>
<main class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="container">
            <div class="row">
                <section class="archive__header blog__header">
                    <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                        <div class="archive__cont">
                            <h4><?php echo esc_html__('You Searched For ','moppers'); ?><strong>"<?php
                            echo esc_html("$s"); ?>"</strong></h4>
                            <p><?php echo esc_html__('See','moppers'); ?> <?php
                            echo esc_attr($wp_query->found_posts); ?>  <?php if($wp_query->found_posts > 1) { echo esc_html__('Results','moppers'); } else{ echo esc_html__('Result','moppers'); }  ?></p>
                        </div>
                    </div>
                </section>
                <section class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-<?php if (is_active_sidebar('sidebar-main')){echo esc_attr('8');}else{echo esc_attr('12'); } ?>  <?php if (isset($main_type)) {echo esc_attr("search__main");}?> col-xs-12<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show); ?> archive__posts">
                            <div class="row">
                                <div class="blog__wrap">
                                    <div class="blog-grid-size" data-iso-blog="2"></div>
                                <?php
                                if (have_posts()):
                                while (have_posts()):
                                the_post();
                                echo '<div class="col-md-6 col-sm-6 col-xs-12 blog__item">';
                                    $post_format;
                                    if (has_post_format('video')) {
                                        ?>
                                        <article class="blog__card-01 type__video <?php echo join(' ', get_post_class()); ?>">
                                            <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url('slcr_small');?>)">
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
                                                                <span class="post__meta"><?php the_time(get_option('date_format'));?></span>
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
                                            <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url('slcr_small');?>)">
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
                                                                <span class="post__meta"><?php the_time(get_option('date_format'));?></span>
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
                                            <a href="<?php the_permalink();?>" class="type__video bg-image lazy" data-bg="url(<?php the_post_thumbnail_url('slcr_small');?>)"> 
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
                                                                <span class="post__meta"><?php the_time(get_option('date_format'));?></span>
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
                                                ?>  <a href="<?php the_permalink();?>" class="featured__image bg-image lazy" data-bg="url(<?php the_post_thumbnail_url('slcr_small');?>)"></a><?php 
                                            } ?>
                                            <div class="meta__container">
                                                <div class="post__info">
                                                    <?php  $post_tyoe_slcr = get_post_type($post->ID);
                                                    if($post_tyoe_slcr=="page"){
                                                        echo'<span class="post__category">';
                                                        echo esc_html__('Page ','moppers');
                                                        echo '</span>';
                                                    } else { 
                                                        ?>
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
                                                            $mycontent = $post->post_content;
                                                             $word = str_word_count(strip_tags($mycontent));
                                                            $m = floor($word / 200); 
                                                            $est = $m . ' min read';
                                                            echo esc_html($est); ?>
                                                        </span>
                                                    <?php } ?>
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
                                                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" class="primary-font" title="<?php echo esc_attr__( 'Posts by ', 'moppers' ); $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_attr( $get_result ); ?>" rel="<?php echo esc_attr__( 'author', 'moppers' ); ?>"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>
                                                            </a>
                                                        </div>
                                                        <span class="post__meta"><?php the_time(get_option('date_format'));?> 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                        <?php
                                    } ?> 
                                </div>
                                <?php
                                endwhile;
                                else:
                                    //slcr_front()->slcr_404_error('Search');
                                endif;?>
                                    </div>
                                    <?php if (get_next_posts_link() || get_previous_posts_link()) {?>
                                        <!-- BLOG PAGINATION -->
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="pagination__blog">
                                                <nav class="pagination__nav">
                                                    <div class="pagination__links"> 
                                                        <div id="pagination">
                                                            <div class="prev"><?php previous_posts_link(esc_attr__('Previous Results'))?></div>
                                                            <div class="next"><?php next_posts_link(esc_attr__('More Results', ''))?></div>
                                                        </div>   
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    <?php }?>
                                </div>
                            </div>
                            <?php if(isset($slcr_redux['blog-settings-blog-single-sidebar-archive-show'])){
                                if($slcr_redux['blog-settings-blog-single-sidebar-archive-show']=="1"){  
                                    if (is_active_sidebar('sidebar-main')){?>
                                        <div class="col-md-4 col-sm-12 col-xs-12">
                                            <aside class="woocommerce slcr-sidebar">
                                                    <?php dynamic_sidebar('sidebar-main'); ?>
                                            </aside>
                                        </div>
                                        <?php 
                                    }
                                } 
                            } ?>
                        </div>
                    </section> 
            </div>
        </div>
    </div>
</main>