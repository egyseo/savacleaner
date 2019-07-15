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
 * Element Description: VC Slcr Instagram Feed Data Mapping
 */
if (!defined('ABSPATH')) {
    die('-1');
}  
// Map the block with vc_map()
return array(
    'name' => esc_html__('Instagram Feed','sc-core') ,
    'base' => 'slcr_instagram_feed',
    'show_settings_on_create' => true,
    // 'is_container' => true,
    'description' => esc_html__('Fetch instagram posts from your account.','sc-core') ,
    'category' => esc_html__('SC Elements','sc-core') ,
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'insta-feed.png',
    'params' => array( 
        array(
            'type' => 'textfield',
            'holder' => 'Access Token',
            'class' => 'count-class',
            'heading' => esc_html__('Instagram Access Token','sc-core') ,
            'description' => esc_html__('Enter an Instagram Accesstoken you want to use ','sc-core') ,
            'param_name' => 'instagram_token',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'type' => 'textfield',
            'holder' => 'post count',
            'class' => 'count-class',
            'heading' => esc_html__('Post Count','sc-core') ,
            'description' => esc_html__('Number of posts you want to fetch from Instagram.','sc-core') ,
            'param_name' => 'instagram_post_count',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) , 
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Grid Size','sc-core') ,
            'param_name' => 'instagram_grid',
            'class' => 'instagram_grid',
            'description' => esc_html__('Number of posts to show per line.','sc-core') ,
            'group' => esc_html__('General','sc-core'),
            'value' => array( 
                esc_html__('1','sc-core') => '1',
                esc_html__('2','sc-core') => '2',
                esc_html__('3','sc-core') => '3',
                esc_html__('4','sc-core') => '4',
                esc_html__('5','sc-core') => '5',
                esc_html__('6','sc-core') => '6',
                esc_html__('7','sc-core') => '7',
                esc_html__('8','sc-core') => '8', 
            ) ,
            'std'         => '5',
            'save_always' => true,
            'admin_label' => false, 
        ) ,
        array(
            'type' => 'checkbox',
            'class' => ' ',
            'heading' => esc_html__('Grid Gap','sc-core') ,
            'param_name' => 'instagram_grid_gap',
            'value' => array(
                'Yes' => 'Yes',
            ) ,
            'description' => esc_html__('Enable this option to add a gap in the grid.','sc-core') ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') ,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.','sc-core') ,
            'admin_label' => false,
            'group' => esc_html__('General','sc-core'),
        ) ,
    ) ,
);