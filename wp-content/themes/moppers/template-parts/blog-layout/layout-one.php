<?php
/** 
 * The SlashCreative Blog Layout One Template
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
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

global $slcr_redux;
$blog_layout = $slcr_redux['blog-settings-blog-layout-type-one'];
$blog_thumbnail_size = "slcr_medium";
if (have_posts()):
    while (have_posts()):
        the_post();
        $post_id                             = get_the_ID();
        $acf_link_post_bolg_card_size_type_1 = get_field('acf_link_post_bolg_card_size_type_1', $post_id);
        if ($acf_link_post_bolg_card_size_type_1 == "large") {
            echo '<div class="col-md-12 col-sm-12 col-xs-12 blog__item">';
            $blog_thumbnail_size = "slcr_large";
        } elseif ($acf_link_post_bolg_card_size_type_1 == "small") {
            echo '<div class="col-md-4 col-sm-6 col-xs-12 blog__item">';
            $blog_thumbnail_size = "slcr_medium";
        } elseif ($acf_link_post_bolg_card_size_type_1 == "medium") {
            echo '<div class="col-md-6 col-sm-6 col-xs-12 blog__item">';
            $blog_thumbnail_size = "slcr_medium";
        } else {
            switch ($blog_layout) {
                case "1":
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 blog__item">';
                    $blog_thumbnail_size = "slcr_large";
                    break;
                case "3":
                    echo '<div class="col-md-4 col-sm-6 col-xs-12 blog__item">';
                    $blog_thumbnail_size = "slcr_medium";
                    break;
                case "4":
                    echo '<div class="col-md-12 col-sm-12 col-xs-12 blog__item">';
                    $blog_thumbnail_size = "slcr_large";
                    break;
                case "5":
                    echo '<div class="col-md-6 col-sm-6 col-xs-12 blog__item">';
                    $blog_thumbnail_size = "slcr_medium";
                    break;
                default:
                    echo '<div class="col-md-6 col-sm-6 col-xs-12 blog__item">';
                    $blog_thumbnail_size = "slcr_medium";
            }
        }
            $post_format;
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
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" class="primary-font" title="<?php echo esc_attr__( 'Posts by ', 'moppers' ); $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>" rel="<?php echo esc_attr__( 'author', 'moppers' ); ?>"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?>
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
    slcr_front()->slcr_404_error('Post');
endif;?>