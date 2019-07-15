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
 * Element Description: Slcr Team Mapping
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
 
return array(
    'name' => esc_html__('Team Members Loop','sc-core') ,
    'base' => 'slcr_team',
    'icon' => SLCR_CORE_VC_ELEMENT_ICON_URI . 'team.png',
    'class' => 'vc_icon_content_box',
    'as_parent' => array(
        'only' => 'team_member_item'
    ) ,

    // 'as_parent' => '',
    // /'content_element' => true,
    'controls' => 'full',
    'show_settings_on_create' => true,
    // 'is_container'    => true,
    'category' => esc_html__('SC Elements','sc-core') ,
    'description' => esc_html__('Add multiple team members in loop.','sc-core') ,
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Select Team Members Type','sc-core') ,
            'param_name' => 'team_members_type',
            'class' => 'title-class', 
            'value' => array(
                esc_html__('Team Members Type 1','sc-core') => 'Team_Members_Type_1',
                esc_html__('Team Members Type 2','sc-core') => 'Team_Members_Type_2',
                esc_html__('Team Members Type 3','sc-core') => 'Team_Members_Type_3',
                esc_html__('Team Members Type 4','sc-core') => 'Team_Members_Type_4',
                esc_html__('Team Members Type 5','sc-core') => 'Team_Members_Type_5',
                esc_html__('Team Members Type 6','sc-core') => 'Team_Members_Type_6',
                esc_html__('Team Members Type 7','sc-core') => 'Team_Members_Type_7',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'description' => esc_html__('Select Team Members Type . the blow input filed open accord to that selected type  ).','sc-core')
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','sc-core') ,
            'admin_label' => false,
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'group' => esc_html__('Design Options','sc-core') ,
            'admin_label' => false,
        ) ,
    ) ,
    'default_content' => '[team_member_item title="' . sprintf('%s %d', '' , 1) . '"][/team_member_item] ',
);
        
