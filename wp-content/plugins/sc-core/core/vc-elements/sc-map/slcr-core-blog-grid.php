<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.1.0
 *
 * Element Description: VC Blog Grid Mapping
 */
if (!defined('ABSPATH')) {
    die('-1');
}
// Map the block with vc_map()
return array(
    'name'                    => esc_html__('Blog Grid','sc-core'),
    'base'                    => 'slcr_blog_grid',
    'show_settings_on_create' => true, 
    'description'             => esc_html__('Creates blog grid on any page.','sc-core'),
    'category'                => esc_html__('SC Elements','sc-core'),
    'icon'                    => SLCR_CORE_VC_ELEMENT_ICON_URI . 'blog-grid.png',
    'params'                  => array(
        array(
            'type'        => 'textfield',
            'class'       => 'count-class',
            'heading'     => esc_html__('Number of posts','sc-core'),
            'description' => esc_html__('Enter the number of posts you want to show.','sc-core'),
            'param_name'  => 'blog_show_no_posts',
            'value'       => esc_html__('4','sc-core'),
            'admin_label' => false,
            'weight'      => 0,
            'group'       => esc_html__('General','sc-core'),
        ),
        array(
            'type'        => 'textfield',
            'class'       => 'count-class',
            'heading'     => esc_html__('Filter Specific Categories','sc-core'),
            'description' => esc_html__('Enter the blog category name which you want to filter. Example -(art)','sc-core'),
            'param_name'  => 'blog_filter_specific_categorie_real',
            'value'       => '',
            'admin_label' => false,
            'weight'      => 0,
            'group'       => esc_html__('General','sc-core'),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('Select Blog type','sc-core'),
            'param_name'  => 'blog_show_blog_type',
            'class'       => 'Title_Text_Transform',
            'description' => esc_html__('Set Blog type (which show on this Blog Element). for other settings go to main admin Blog setting element.','sc-core'),
            'group'       => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value'       => array(
                'Vertical Cards'   => 'type_1',
                'Horizontal Cards' => 'type_2',
            ),
            'save_always' => true,
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('Columns Count','sc-core'),
            'param_name'  => 'blog_show_columns_count_type_2',
            'class'       => 'Title_Text_Transform',
            'admin_label' => false,
            'description' => esc_html__('Set blog columns count for items.','sc-core'),
            'group'       => esc_html__('General','sc-core'),
            'value'       => array(
                '2 Items per Row' => '2',
                '1 Item per Row'  => '1',
            ),
            'save_always' => true,
            'dependency'  => array(
                'element' => 'blog_show_blog_type',
                'value'   => 'type_2',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('Columns Count','sc-core'),
            'param_name'  => 'blog_show_columns_count_type_1',
            'class'       => 'Title_Text_Transform',
            'description' => esc_html__('Set blog columns count for items.','sc-core'),
            'group'       => esc_html__('General','sc-core'),
            'admin_label' => false,
            'value'       => array(
                '3 Items per Row' => '3',
                '2 Items per Row' => '2',
                '1 Item per Row'  => '1',
            ),
            'save_always' => true,
            'dependency'  => array(
                'element' => 'blog_show_blog_type',
                'value'   => 'type_1',
            ),
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__('Post Orderby','sc-core'),
            'param_name'  => 'blog_show_order_by',
            'class'       => 'Title_Text_Transform',
            'admin_label' => false,
            'description' => esc_html__('Set Post Order By.','sc-core'),
            'group'       => esc_html__('General','sc-core'),
            'value'       => array(
                "Date"                   => "date",
                "Order by post ID"       => "ID",
                "Author"                 => "author",
                "Title"                  => "title",
                "Last modified date"     => "modified",
                "Post\/page parent ID"   => "parent",
                "Number of comments"     => "comment_count",
                "Menu order\/Page Order" => "menu_order",
                "Meta value"             => "meta_value",
                "Meta value number"      => "meta_value_num",
                "Random order"           => "rand",
            ),
            'save_always' => true,
        ), 
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
            'group'       => esc_html__('General','sc-core'),
        ) ,
    ),
);