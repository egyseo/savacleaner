<?php
/** 
 * The SlashCreative Comment Form Template
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
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
} 
$fields = array(
    'title'  => '
        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- TITLE -->
            <h5 class="font-700 mb-30 sub-heading single">' . esc_html__('Write a comment','moppers') . '</h5>
        </div>
    ',
    'author' => '
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="' . esc_attr__('Name','moppers') . '*" class="form-control">
            </div>
        </div>',
    'email'  => '
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <input type="email" id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" placeholder="' . esc_attr__('Email','moppers') . '*" class="form-control">
            </div>
        </div>',
    'url'    => '
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . esc_attr__('Website','moppers') . '" class="form-control">
            </div>
        </div>',
    'cookies' => '
        <div class="col-md-12 col-sm-12 col-xs-12">
            <p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="' . esc_attr($consent) . '" />' .
                '<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.','moppers') . '</label>
            </p>
        </div>',

);
$comments_args = array(
    'id_form'              => 'commentform',
    'class_form'           => 'comment-form',
    'id_submit'            => 'submit',
    'class_submit'         => 'btn button',
    'name_submit'          => 'submit',
    'title_reply'          => '',
    'title_reply_to'       => esc_html__('Leave a Reply to %s','moppers'),
    'cancel_reply_link'    => esc_html__('Cancel','moppers'),
    'label_submit'         => esc_html__('Post Comment','moppers'),
    'format'               => 'xhtml',
    'fields'               => apply_filters('comment_form_default_fields', $fields),
    'comment_field'        => '
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . _x('Write your comment...', '','moppers') . '" class="form-control"></textarea>
            </div>
        </div>',
    'must_log_in'          => '<p class="must-log-in">' . sprintf(__('You must be ','moppers').'<a href="%s">'.__('logged in','moppers').'</a>'.__('to post a comment.','moppers'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
    'logged_in_as'         => '<p class="logged-in-as">' . sprintf(__('Signed in as ','moppers').'<strong>%2$s</strong></a>. <a href="%3$s" title="'.esc_attr__( 'Log out of this account', 'moppers' ).'">'.__('Sign out','moppers').'</a>', admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
    'comment_notes_before' => '',
);

function slcr_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;?>
    <li class="comment " <?php
        comment_class();?> id="li-comment-
        <?php
        comment_ID()?>">
        <div class="comment-cont" id="comment-<?php
            comment_ID();?>">

            <!-- AVATAR -->
            <div class="image">
                <?php
             echo get_avatar($comment, $size = '48'); ?>
            </div>

            <div class="author-meta">
                <h4><?php echo comment_author(); ?></h4><!-- REPLY -->
                <a href="#reply" class="reply"> <?php
                comment_reply_link(array_merge($args, array(
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                )))?></a>
                <!-- DATE -->
                <p class="date"><?php
                printf(__('%1$s at %2$s','moppers'), get_comment_date(), get_comment_time())?><?php
                edit_comment_link(esc_html__('(Edit)','moppers'), '  ', '')?>
                </p>
            </div>

            <div class="content">
                <!-- COMMENT -->
                 <?php
                comment_text()?> 
                <?php
                if ($comment->comment_approved == '0'): ?>
                    <div class="moderation"><?php
                        echo esc_html__('Your comment is awaiting moderation.','moppers')?>
                    </div>
                <?php
                endif;?>
            </div>

        </div>
    </li>
    <?php
    $the_comments_pagination;
}