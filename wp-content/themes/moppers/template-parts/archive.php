<?php
/** 
 * The SlashCreative Archive Template
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
}
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
if (is_author()) {
    ?>
    <section class="archive__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="author__large">
                        <div class="avatar__large">
                            <?php echo get_avatar(get_the_author_meta('user_email'), $size = '150'); ?>
                        </div>
                        <div class="author__content">
                            <h3 class="font-600 gap-0 mb-0"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?></h3>
                            <p class="gap-0">@<?php echo esc_html(get_the_author_meta('display_name')); ?></p>
                            <div class="col-md-12 col-xs-12">
                                <div class="row">
                                    <div class="author__archive col-md-4 col-xs-6">
                                        <div class="row">
                                            <div class="heading__mini"><?php echo esc_html__('Posts','moppers'); ?></div>
                                            <div class="author__value"><?php esc_html(the_author_posts()); ?></div>
                                        </div>
                                    </div>
                                     <?php
                                    if (!empty(get_the_author_meta('user_url'))) { ?>
                                        <div class="author__archive col-md-6 col-xs-6">
                                            <div class="row">
                                                <div class="heading__mini"><?php echo esc_html__('Website','moppers')?></div>
                                                <div class="author__value"><a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank"><?php echo esc_html__('Visit','moppers'); ?></a></div>
                                            </div>
                                        </div>
                                        <?php
                                    }?>
                                </div>
                            </div>
                            <p class="mb-30"><?php  esc_html(the_author_meta('description')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} elseif (is_category()) {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="row">
                <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                    <div class="archive__cont">
                        <h4>Categories <i class="arrow_carrot-right"></i> <strong><?php echo esc_html(single_cat_title("", false)); ?></strong></h4>
                        <p><?php echo esc_html__('See','moppers'); ?> <?php echo esc_html($wp_query->found_posts); ?> <?php echo esc_html__('results','moppers'); ?></p>
                        <?php $categories = get_categories();
                        foreach ($categories as $category) {
                            echo '<a href="' . get_category_link($category->term_id) . '" class="blog__category">' . esc_html($category->name). '</a>'; 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} elseif (is_tag()) {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="archive__cont">
                        <h4><?php echo esc_html__('Tag','moppers'); ?> <i class="arrow_carrot-right"></i> <strong><?php echo esc_html(single_tag_title("", false)); ?></strong></h4>
                        <p><?php echo esc_html__('See','moppers'); ?> <?php echo esc_html($wp_query->found_posts); ?>  <?php echo esc_html__('results','moppers'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} elseif (is_year()) {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="archive__cont">
                        <h4><?php echo esc_html__('Date','moppers'); ?> <i class="arrow_carrot-right"></i> <strong><?php esc_html(the_modified_time(' Y'));?></strong></h4>
                        <p><?php echo esc_html__('See','moppers'); ?> <?php echo esc_html($wp_query->found_posts); ?>  <?php echo esc_html__('results','moppers'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} elseif (is_month()) {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="archive__cont">
                        <h4><?php echo esc_html__('Date','moppers'); ?> <i class="arrow_carrot-right"></i> <strong><?php esc_html( the_modified_time('F , Y')); ?></strong></h4>
                        <p><?php echo esc_html__('See','moppers'); ?> <?php echo esc_html($wp_query->found_posts); ?>  <?php echo esc_html__('results','moppers'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} elseif (is_year() || is_month() || is_day()) {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="archive__cont">
                        <h4><?php echo esc_html__('Date','moppers'); ?> <i class="arrow_carrot-right"></i> <strong><?php esc_html( the_modified_time('F , Y')); ?></strong></h4>
                        <p><?php echo esc_html__('See','moppers'); ?> <?php echo esc_html($wp_query->found_posts); ?>  <?php echo esc_html__('results','moppers'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
} else {
    ?>
    <section class="archive__header blog__header">
        <div class="container">
            <div class="col-md-8<?php echo esc_attr($blog_settings_blog_single_sidebar_archive_show);?>">
                <div class="row">
                    <div class="archive__cont">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
get_template_part('template-parts/blog-layout/archive-layout', 'page');
?>