<?php
/** 
 * The SlashCreative Single Page
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
?>
<div class="col-md-12 col-sm-12 col-xs-12 allow-gutenberg">
    <div class="container">
        <?php
        if (have_posts()):
            while (have_posts()): the_post();{
                    the_content(); 
                }
            endwhile;
        endif;
        ?>
    </div>
</div>
<!-- BlOG CONTAINER ENDS -->
<?php slcr_front()->slcr_comment_form(); 
get_footer();
?>