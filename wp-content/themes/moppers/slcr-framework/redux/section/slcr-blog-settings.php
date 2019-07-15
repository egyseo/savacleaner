<?php
/** 
 * The SlashCreative Redux Blog Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Blog Settings Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Blog Settings','moppers'),
    'id'               => 'blog-settings',
    'desc'             => esc_html__('Blog pages and posts settings','moppers'),
    'customizer_width' => '400px',
    'icon'             => 'icons-feather',
));
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Blog General Settings','moppers'),
    'id'               => 'blog-settings-general',
    'desc'             => esc_html__('Blog pages and posts settings','moppers'),
    'customizer_width' => '400px',
    'subsection'       => true,
    'fields'           => array(
        array(
            'id'       => 'blog-settings-blog-layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog Cards Type','moppers'),
            'subtitle' => esc_html__('Select the type of blog cards.','moppers'),
            'desc'     => esc_html__('Default type is Type 1','moppers'),
            'options'  => array(
                'type_1' => array(
                    'alt' => 'Vertical Cards',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1.png',
                ),
                'type_2' => array(
                    'alt' => 'Horizontal Cards',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-2.png',
                ),
            ),
            'default'  => 'type_2',
        ),
        array(
            'id'       => 'blog-settings-blog-layout-type-one',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog Layout','moppers'),
            'subtitle' => esc_html__('Select a layout for your blog page.','moppers'),
            'desc'     => esc_html__('Default layout is 1 Column','moppers'),
            'options'  => array(
                '1' => array(
                    'alt' => '1 Column',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1-ic.png',
                ),
                '2' => array(
                    'alt' => '2 Column',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1-2c.png',
                ),
                '3' => array(
                    'alt' => '3 Column',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1-3c.png',
                ),
                '4' => array(
                    'alt' => '1 Column with sidebar',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1-1c-s.png',
                ),
                '5' => array(
                    'alt' => '2 Column with sidebar',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-1-2c-s.png',
                ),
            ),
            'required' => array('blog-settings-blog-layout', '=', 'type_1'),
            'default'  => '5',
        ),
        array(
            'id'       => 'blog-settings-blog-layout-type-two',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog Layout','moppers'),
            'subtitle' => esc_html__('Select a layout for your blog page.','moppers'),
            'desc'     => esc_html__('Default layout is 1 Column','moppers'),
            'options'  => array(
                '1' => array(
                    'alt' => '1 Column',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-2-1c.png',
                ),
                '2' => array(
                    'alt' => '2 Column',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-2-2c.png',
                ),
                '3' => array(
                    'alt' => '1 Column with sidebar',
                    'img' => SLCR_REDUX_IMAGE_URI . 'blog-2-1c-s.png',
                ),
            ),
            'required' => array('blog-settings-blog-layout', '=', 'type_2'),
            'default'  => '3',
        ),
        array(
            'id'       => 'blog-settings-blog-pagination',
            'type'     => 'select',
            'title'    => esc_html__('Blog Pagination','moppers'),
            'subtitle' => esc_html__('Select a pagination type for blog posts.','moppers'),
            'options'  => array(
                "num"  => "Simple Pagination",
                "ajax" => "Ajax Load",
            ),
            'default'  => 'num',
        ),
        array(
            'id'       => 'blog-settings-blog-single-featured-image',
            'type'     => 'switch',
            'title'    => esc_html__('Featured Image Visibility','moppers'),
            'subtitle' => esc_html__('Hide / Show feature image on blog post.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ),
        array(
            'id'       => 'blog-settings-blog-single-featured-image-type',
            'type'     => 'select',
            'title'    => esc_html__('Featured Image Type','moppers'),
            'required' => array('blog-settings-blog-single-featured-image', '=', true),
            'subtitle' => esc_html__('Select a type of feature image.','moppers'),
            'options'  => array(
                "full_width" => "Full Width",
                "container"  => "Contained",
            ),
            'default'  => 'full_width',
        ),
        array(
            'id'       => 'blog-settings-blog-single-sidebar-show',
            'type'     => 'switch',
            'title'    => esc_html__('Sidebar','moppers'),
            'subtitle' => esc_html__('Enable or disable the sidebar on single post page.','moppers'),
            'default'  => false, // 1 = on | 0 = off
        ),
        array(
            'id'       => 'blog-settings-blog-single-sidebar-archive-show',
            'type'     => 'switch',
            'title'    => esc_html__('Sidebar on Search & Archive','moppers'),
            'subtitle' => esc_html__('Enable or disable the sidebar on Search & Archive.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ),
        array(
            'id'       => 'blog-settings-blog-single-social-link',
            'type'     => 'switch',
            'title'    => esc_html__('Social Sharing','moppers'),
            'subtitle' => esc_html__('Enable / Disable social sharing icons on blog post.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ),
        array(
            'id'       => 'blog-settings-blog-single-author-info',
            'type'     => 'switch',
            'title'    => esc_html__('Author Info - Single Post','moppers'),
            'subtitle' => esc_html__('Hide / Show author info on single blog post.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ),
        array(
            'id'       => 'blog-settings-blog-single-related-post',
            'type'     => 'switch',
            'title'    => esc_html__('Related Post','moppers'),
            'subtitle' => esc_html__('Hide / Show related posts under blog post.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ), 
        array(
            'id'       => 'blog-settings-blog-single-biohs-slcr',
            'type'     => 'switch',
            'title'    => esc_html__('Author Info - Blog Cards','moppers'),
            'subtitle' => esc_html__('Hide or show author info on blog posts card.','moppers'),
            'default'  => true, // 1 = on | 0 = off
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title'            => esc_html__('Blog Typography','moppers'),
    'id'               => 'blog-settings-typography',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => esc_html__(' All Blog Typography settings ','moppers'),
    'fields'           => array(
        array(
            'id'       => 'blog-settings-typography-single-post',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Post Main Heading','moppers'),
            'subtitle' => esc_html__('Specify font properties for the single post main heading.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-single-post-blog-content',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Post Content Headings','moppers'),
            'subtitle' => __('Specify font properties for the all heading tags in blog post content. Example - H1, H2, H3, H4, H5 and H6 ','moppers').'<br/><br/> <strong>'.__('*Please do not change font size and line height here.','moppers').'</strong>',
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-single-post-blog-paragraph',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Post Content','moppers'),
            'subtitle' => esc_html__('Specify font properties for the remaining blog content. Example - Paragarphs, Links and Lists','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-blog-card-heading',
            'type'     => 'typography',
            'title'    => esc_html__('Blog  Card Heading','moppers'),
            'subtitle' => esc_html__('Specify font properties for headings in all types of blog cards.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-blog-card-category',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Card Category','moppers'),
            'subtitle' => esc_html__('Specify font properties for category in all types of blog cards.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-blog-card-author-name',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Card Author Name','moppers'),
            'subtitle' => esc_html__('Specify font properties for author name in all types of blog cards.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'blog-settings-typography-blog-card-author-description',
            'type'     => 'typography',
            'title'    => esc_html__('Blog Post Card Date','moppers'),
            'subtitle' => esc_html__('Specify font properties for post date in all types of blog cards.','moppers'),
            'google'   => true,
        ),

    ),
));
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Blog Colors','moppers'),
    'id'               => 'blog-settings-colors',
    'subsection'       => true,
    'customizer_width' => '450px',
    'desc'             => esc_html__(' All Blog Colors settings ','moppers'),
    'fields'           => array(
        array(
            'id'       => 'blog-settings-color-title-hover-color',
            'type'     => 'color',
            'title'    => esc_html__('Blog Card Title - Hover','moppers'),
            'subtitle' => esc_html__('Change the color of post title on hover.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-pagination-color',
            'type'     => 'color',
            'title'    => esc_html__('Blog Pagination','moppers'),
            'subtitle' => esc_html__('Pick a color for blog pagination text.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-loadmore-color',
            'type'     => 'color',
            'title'    => esc_html__('Ajax Load Button','moppers'),
            'subtitle' => esc_html__('Pick a color for ajax load more button.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-comment-author-color',
            'type'     => 'color',
            'title'    => esc_html__('Comment Author Name','moppers'),
            'subtitle' => esc_html__('Pick a Color for comment author name in the blog post.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-comment-date-color',
            'type'     => 'color',
            'title'    => esc_html__('Comment Date','moppers'),
            'subtitle' => esc_html__('Pick a Color for comment date in the blog post.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-comment-color',
            'type'     => 'color',
            'title'    => esc_html__('Comment Text','moppers'),
            'subtitle' => esc_html__('Pick a Color for comment text in the blog post.','moppers'),
        ),
        array(
            'id'       => 'blog-settings-color-blog-cart-header-color',
            'type'     => 'color',
            'title'    => esc_html__('Blog Card Heading','moppers'),
            'subtitle' => __('Pick a color for blog card heading. ','moppers').'<br/><br/> <strong>'.__('*This will effect post type - Video, Audio and Links on Vertical Layout. Default is white color.','moppers').'</strong>',
        ),

    ),
));