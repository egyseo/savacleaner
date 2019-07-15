<?php
/** 
 * The SlashCreative Comments Page
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
if (comments_open()) {
    include_once( SLCR_FRAMEWORK_DIR . 'front/slcr-comment.php' ); 
}

                
$consent = empty( $commenter['comment_author_email'] ) ?  : ' checked="checked"';
$comments_count = wp_count_comments($post->ID);

//load comments_args file
include_once( SLCR_THEME_DIR .'template-parts/main/comment-form.php' );
?>
<?php
if (have_comments() && !post_password_required()): ?>
    <section class="blog-post-1_comments col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <!-- TITLE -->
            <h5 class="font-700 mb-40 sub-heading single"><?php
                echo esc_html($comments_count->approved); if($comments_count->approved >1){echo esc_html__(' Comments','moppers');}else{echo esc_html__(' Comment','moppers');}?></h5>
            <ul class="comments-list"> 
                <?php
                wp_list_comments('type=comment&callback=slcr_comment');?> 
            </ul>
            <!-- REPLY FORM ENDS -->
            <ol class="pingbacklist">
                <?php wp_list_comments('type=pingback'); ?>
            </ol>
            <ol class="trackbacklist">
                <?php wp_list_comments('type=trackback'); ?>
            </ol>
        </div>
    </section>
<!-- COMMENTS SECTION ENDS -->
<?php
    if( get_previous_comments_link() || get_next_comments_link()) { ?>
        <section class="comment-pagination col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <?php paginate_comments_links(); ?>
            </div>
        </section>
    <?php 
    }
 
endif; // end have_comments()

if (comments_open() && !post_password_required()):
?>

    <section class="col-md-12 col-sm-12 col-xs-12 comment-respond-cont no-padding">
        <div class="row">
            <?php comment_form($comments_args);?>
        </div>
    </section>

<?php
endif;
?> 