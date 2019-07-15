<?php 
/** 
 * The SlashCreative Acf Post Settings Group
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Post Settings Fields Group
register_field_group(array(
    'id'         => 'acf_link-post-format-settings',
    'key'        => 'group_acf_link-post-format-settings',
    'title'      => esc_html__('Post Type Link','moppers'),
    'fields'     => array(
        array(
            'key'           => 'field_acf_link-post-format-settings-link',
            'label'         => esc_html__('External Post Link','moppers'),
            'name'          => 'acf_link_post_format_settings_link',
            'type'          => 'text',
            'instructions'  => esc_html__('Paste any external link here to attach a "URL" to the blog post.','moppers'),
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
    ),
    'location'   => array(
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'post',
                'order_no' => 0,
                'group_no' => 0,
            ),
            array(
                'param'    => 'post_format',
                'operator' => '==',
                'value'    => 'link',
                'order_no' => 1,
                'group_no' => 0,
            ),
        ),
    ),
    'options'    => array(
        'position'       => 'normal',
        'layout'         => 'default', 
    ),
    'menu_order' => 100,
));
register_field_group(array(
    'id'         => 'acf_video-post-format-settings',
    'key'        => 'group_acf_video-post-format-settings',
    'title'      => esc_html__('Post Type Video','moppers'),
    'fields'     => array(
        array(
            'key'           => 'field_acf_video-post-format-settings-link',
            'label'         => esc_html__('Video URL','moppers'),
            'name'          => 'acf_video_post_format_settings_link',
            'type'          => 'text',
            'instructions'  => esc_html__('Simply paste any video URL from Youtube, Vimeo or any Self-Hosted Video to attach a video to the post.','moppers'),
            'default_value' => '',
            'placeholder'   => '',
            'prepend'       => '',
            'append'        => '',
            'formatting'    => 'html',
            'maxlength'     => '',
        ),
    ),
    'location'   => array(
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'post',
                'order_no' => 0,
                'group_no' => 0,
            ),
            array(
                'param'    => 'post_format',
                'operator' => '==',
                'value'    => 'video',
                'order_no' => 1,
                'group_no' => 0,
            ),
        ),
    ),
    'options'    => array(
        'position'       => 'normal',
        'layout'         => 'default', 
    ),
    'menu_order' => 200,
));

register_field_group(array(
    'id'         => 'acf_post-settings',
    'key'         => 'group_acf_post-settings',
    'title'      => esc_html__('Post Settings','moppers'),
    'fields'     => array(
        array(
            'key'   => 'acf_link-post-bolg-card-size-54be705f09c1f',
            'label' => esc_html__('Blog Card Layout','moppers'),
            'name'  => '',
            'type'  => 'tab',
        ),
        array(
            'key'           => 'acf_link-post-bolg-card-size-type-1-54be705f09c1f',
            'label'         => esc_html__('Blog Card Size - Type 1','moppers'),
            'name'          => 'acf_link_post_bolg_card_size_type_1',
            'type'          => 'select',
            'instructions'  => esc_html__('Change the blog card size for this specific type. This will effect only when Type 1 is selected in Theme Options.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Inherit from Theme Options','moppers'),
                'small'   => esc_html__('Small','moppers'),
                'medium'  => esc_html__('Medium','moppers'),
                'large'   => esc_html__('Large','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'acf_link-post-bolg-card-size-type-2-54be705f09c1f',
            'label'         => esc_html__('Blog Card Size - Type 2','moppers'),
            'name'          => 'acf_link_post_bolg_card_size_type_2',
            'type'          => 'select',
            'instructions'  => esc_html__('Change the blog card size for this specific type. This will effect only when Type 2 is selected in Theme Options.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Inherit from Theme Options','moppers'),
                'small'   => esc_html__('Small','moppers'),
                'large'   => esc_html__('Large','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'   => 'acf_link-post-bolg-SINGLRPAGE-54be705f09c1f',
            'label' => esc_html__('Blog Post Page','moppers'),
            'name'  => '',
            'type'  => 'tab',
        ),
        array(
            'key'           => 'acf_link-post-bolg-single-page-sidebar-54be705f09c1f',
            'label'         => esc_html__('Sidebar','moppers'),
            'name'          => 'acf_link_post_bolg_single_sidebar_34',
            'type'          => 'select',
            'instructions'  => esc_html__('Enable or disable the sidebar for this post.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Inherit from Theme Options','moppers'),
                'true'    => esc_html__('Enable','moppers'),
                'false'   => esc_html__('Disable','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'acf_link-post-bolg-single-page-feature-image-54be705f09c1f',
            'label'         => esc_html__('Feature Image Visibility','moppers'),
            'name'          => 'acf_link_post_bolg_feature_image_2',
            'type'          => 'select',
            'instructions'  => esc_html__('Use the option to hide or show feature image on the specific blog post.','moppers'),
            'choices'       => array(
                'default' => esc_html__('Inherit from Theme Options','moppers'),
                'true'    => esc_html__('On','moppers'),
                'false'   => esc_html__('Off','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
        array(
            'key'           => 'acf_link-post-bolg-single-page-feature-image-size-54be705f09c1f',
            'label'         => esc_html__('Feature Image Type','moppers'),
            'name'          => 'acf_link_post_bolg_feature_image_size_2',
            'type'          => 'select',
            'instructions'  => esc_html__('Change the layout of feature image on the specific blog post.','moppers'),
            'choices'       => array(
                'default'    => esc_html__('Inherit from Theme Options','moppers'),
                'full_width' => esc_html__('Full Width','moppers'),
                'container'  => esc_html__('Contained','moppers'),
            ),
            'default_value' => 'default',
            'allow_null'    => 0,
            'multiple'      => 0,
        ),
    ),
    'location'   => array(
        array(
            array(
                'param'    => 'post_type',
                'operator' => '==',
                'value'    => 'post',
                'order_no' => 0,
                'group_no' => 0,
            ),
        ),
    ),
    'options'    => array(
        'position'       => 'normal',
        'layout'         => 'default',
        'hide_on_screen' => array(
        ),
    ),
    'menu_order' => 1100,
));