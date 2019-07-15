<?php
/**
Template Name: Sidebar Left  
 */  
/** 
 * The SlashCreative Sidebar Left Page
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
get_template_part('custom-header', 'page');
global $wp_query;
$acf_page_id = $wp_query->get_queried_object_id();
?>
<main class="main__content">
	<div class="col-md-12 col-sm-12 col-xs-12 switch-right">
        <div class="row">
            <div class="container">
                <div class="col-md-<?php if (is_active_sidebar('sidebar-page-main')){echo esc_attr('8');}else{echo esc_attr('12'); } ?> col-sm-12 col-xs-12">
                    <div class="row"> 
                        <div class="container">
                            <?php
                            if (have_posts()):
                                while (have_posts()): the_post();{
                                    ?>
                                        <?php the_content();?>
                                        <?php
                                    }
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <?php if (is_active_sidebar('sidebar-page-main')){ ?>
                     <div class="col-md-4 col-sm-12 col-xs-12">
                     	<aside class="woocommerce slcr-sidebar">
                                <?php   
                                if (is_active_sidebar('sidebar-page-main')){
                		  			dynamic_sidebar('sidebar-page-main');
                      			} ?>
                      	</aside>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>
    <!-- BlOG CONTAINER ENDS -->
<?php slcr_front()->slcr_comment_form(); ?>
<?php
get_footer();
?>