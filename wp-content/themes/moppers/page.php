<?php
/** 
 * The SlashCreative Page
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
global $wp_query;
$acf_page_id = $wp_query->get_queried_object_id();  

get_template_part('custom-header', 'page');
?>
<main class="main__content">
    <section class="col-md-12 col-sm-12 col-xs-12 allow-gutenberg">
        <div class="row"> 
            <div class="container">
                <?php
                if (have_posts()):
                    while (have_posts()): the_post();{  
                         the_content(); 
                         slcr_helper()->slcr_post_pagination_bar();
                        }
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
</main>
<!-- BlOG CONTAINER ENDS -->
<?php slcr_front()->slcr_comment_form(); ?>
<?php
get_footer();
?>