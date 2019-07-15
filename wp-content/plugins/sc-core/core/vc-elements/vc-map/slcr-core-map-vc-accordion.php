<?php
/** 
 * The SlashCreative VC Element 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.0.0
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}
return array(
    'name' => esc_html__('Accordion','sc-core') ,
    'base' => 'vc_tta_accordion',
    'icon' => 'icon-wpb-ui-accordion',
    'is_container' => true,
    'show_settings_on_create' => false,
    'as_parent' => array(
        'only' => 'vc_tta_section',
    ) ,
    'category' => esc_html__('Content','sc-core') ,
    'description' => esc_html__('Collapsible content panels','sc-core') ,
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Accordion Type','sc-core') ,
            'description' => esc_html__('Select accordion  Type.','sc-core') ,
            'param_name' => 'accordion_type',
            'admin_label' => false,
            // partly compatible with btn2, need to be converted shape+style from btn2 and btn1
            'value' => array(
                esc_html__('Default vc','sc-core') => 'Default',
                esc_html__('Moppers Accordion','sc-core') => 'slcr',
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'heading' => __('Select SC Accordion Type','sc-core') ,
            'param_name' => 'slcr_accordion_type',
            'class' => 'title-class', 
            'value' => array(
                esc_html__('SC Accordion 1','sc-core') => 'slcr_Accordion_Type_1',
                esc_html__('SC Accordion 2','sc-core') => 'slcr_Accordion_Type_2',
                esc_html__('SC Accordion 3','sc-core') => 'slcr_Accordion_Type_3',
            ) ,
            'save_always' => true,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
            'description' => esc_html__('Select SC Accordion type. Other input fields will automatically open and close according to your selection.','sc-core')
        ) ,
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('multi tab open','sc-core') ,
            'param_name' => 'multitab',
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'slcr'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Header Border Radius','sc-core') ,
            'description' => esc_html__('Enter custom border radius for Accordion Header or leave empty for default Theme Styles.','sc-core') ,
            'param_name' => 'cheader_border_radius',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Custom Settings','sc-core'),
            'dependency' => array(
                'element' => 'slcr_accordion_type',
                'value' => array(
                    'slcr_Accordion_Type_1',
                    'slcr_Accordion_Type_2'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'textfield',
            'class' => 'title-class',
            'heading' => esc_html__('Header Border Width','sc-core') ,
            'description' => esc_html__('Change the width of border for Accordion Header or leave empty for default Theme Styles.','sc-core') ,
            'param_name' => 'cheader_border_size',
            'value' => '' ,
            'admin_label' => false,
            'weight' => 0,
            'group' => esc_html__('Custom Settings','sc-core'),
            'dependency' => array(
                'element' => 'slcr_accordion_type',
                'value' => array(
                    'slcr_Accordion_Type_1',
                    'slcr_Accordion_Type_2'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Border Color','sc-core') ,
            'param_name' => 'cheader_border_color',
            'admin_label' => false,
            'description' => esc_html__('Select the border color for Accordion Header or leave empty for default Theme Styles.','sc-core') ,
            'dependency' => array(
                'element' => 'slcr_accordion_type',
                'value' => array(
                    'slcr_Accordion_Type_1',
                    'slcr_Accordion_Type_2',
                    'slcr_Accordion_Type_3'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Header Background Color','sc-core') ,
            'param_name' => 'cheader_bg_color',
            'admin_label' => false,
            'description' => esc_html__('Change the background color for Accordion Header.','sc-core') ,
            'dependency' => array(
                'element' => 'slcr_accordion_type',
                'value' => array( 
                    'slcr_Accordion_Type_2'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'colorpicker',
            'class' => 'title-class',
            'heading' => esc_html__('Text Color on Active','sc-core') ,
            'param_name' => 'cheader_hover_color',
            'admin_label' => false,
            'description' => esc_html__('Change the text color of Accordion Header when the tab is active.','sc-core') ,
            'dependency' => array(
                'element' => 'slcr_accordion_type',
                'value' => array(
                    'slcr_Accordion_Type_2',
                    'slcr_Accordion_Type_3'
                ) ,
            ) ,
            'group' => esc_html__('Custom Settings','sc-core'),
        ) ,
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            'admin_label' => false,
            'heading' => esc_html__('Widget title','sc-core') ,
            'description' => esc_html__('Enter text used as widget title (Note: located above content element).','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'style',
            'value' => array(
                esc_html__('Classic','sc-core') => 'classic',
                esc_html__('Modern','sc-core') => 'modern',
                esc_html__('Flat','sc-core') => 'flat',
                esc_html__('Outline','sc-core') => 'outline',
            ) ,
            'heading' => esc_html__('Style','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Select accordion display style.','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'shape',
            'value' => array(
                esc_html__('Rounded','sc-core') => 'rounded',
                esc_html__('Square','sc-core') => 'square',
                esc_html__('Round','sc-core') => 'round',
            ) ,
            'heading' => esc_html__('Shape','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Select accordion shape.','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'color',
            'value' => vc_get_shared('colors-dashed') ,
            'std' => 'grey',
            'heading' => esc_html__('Color','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Select accordion color.','sc-core') ,
            'param_holder_class' => 'vc_colored-dropdown',
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'param_name' => 'no_fill',
            'heading' => esc_html__('Do not fill content area?','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Do not fill content area with color.','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'spacing',
            'value' => array(
                esc_html__('None','sc-core') => '',
                esc_html__('1px','sc-core') => '1',
                esc_html__('2px','sc-core') => '2',
                esc_html__('3px','sc-core') => '3',
                esc_html__('4px','sc-core') => '4',
                esc_html__('5px','sc-core') => '5',
                esc_html__('10px','sc-core') => '10',
                esc_html__('15px','sc-core') => '15',
                esc_html__('20px','sc-core') => '20',
                esc_html__('25px','sc-core') => '25',
                esc_html__('30px','sc-core') => '30',
                esc_html__('35px','sc-core') => '35',
            ) ,
            'heading' => esc_html__('Spacing','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Select accordion spacing.','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'gap',
            'value' => array(
                esc_html__('None','sc-core') => '',
                esc_html__('1px','sc-core') => '1',
                esc_html__('2px','sc-core') => '2',
                esc_html__('3px','sc-core') => '3',
                esc_html__('4px','sc-core') => '4',
                esc_html__('5px','sc-core') => '5',
                esc_html__('10px','sc-core') => '10',
                esc_html__('15px','sc-core') => '15',
                esc_html__('20px','sc-core') => '20',
                esc_html__('25px','sc-core') => '25',
                esc_html__('30px','sc-core') => '30',
                esc_html__('35px','sc-core') => '35',
            ) ,
            'heading' => esc_html__('Gap','sc-core') ,
            'description' => esc_html__('Select accordion gap.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'c_align',
            'value' => array(
                esc_html__('Left','sc-core') => 'left',
                esc_html__('Right','sc-core') => 'right',
                esc_html__('Center','sc-core') => 'center',
            ) ,
            'heading' => esc_html__('Alignment','sc-core') ,
            'description' => esc_html__('Select accordion section title alignment.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'autoplay',
            'value' => array(
                esc_html__('None','sc-core') => 'none',
                esc_html__('1','sc-core') => '1',
                esc_html__('2','sc-core') => '2',
                esc_html__('3','sc-core') => '3',
                esc_html__('4','sc-core') => '4',
                esc_html__('5','sc-core') => '5',
                esc_html__('10','sc-core') => '10',
                esc_html__('20','sc-core') => '20',
                esc_html__('30','sc-core') => '30',
                esc_html__('40','sc-core') => '40',
                esc_html__('50','sc-core') => '50',
                esc_html__('60','sc-core') => '60',
            ) ,
            'std' => 'none',
            'heading' => esc_html__('Autoplay','sc-core') ,
            'description' => esc_html__('Select auto rotate for accordion in seconds (Note: disabled by default).','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'checkbox',
            'param_name' => 'collapsible_all',
            'heading' => esc_html__('Allow collapse all?','sc-core') ,
            'description' => esc_html__('Allow collapse all accordion sections.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        // Control Icons
        array(
            'type' => 'dropdown',
            'param_name' => 'c_icon',
            'value' => array(
                esc_html__('None','sc-core') => '',
                esc_html__('Chevron','sc-core') => 'chevron',
                esc_html__('Plus','sc-core') => 'plus',
                esc_html__('Triangle','sc-core') => 'triangle',
            ) ,
            'std' => 'plus',
            'heading' => esc_html__('Icon','sc-core') ,
            'description' => esc_html__('Select accordion navigation icon.','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'dropdown',
            'param_name' => 'c_position',
            'value' => array(
                esc_html__('Left','sc-core') => 'left',
                esc_html__('Right','sc-core') => 'right',
            ) ,
            'dependency' => array(
                'element' => 'c_icon',
                'not_empty' => true,
            ) ,
            'heading' => esc_html__('Position','sc-core') ,
            'admin_label' => false,
            'description' => esc_html__('Select accordion navigation icon position.','sc-core') ,
        ) ,
        // Control Icons END
        array(
            'type' => 'textfield',
            'param_name' => 'active_section',
            'heading' => esc_html__('Active section','sc-core') ,
            'value' => 1,
            'description' => esc_html__('Enter active section number (Note: to have all sections closed on initial load enter non-existing number).','sc-core') ,
            'admin_label' => false,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'animation_style',
            'heading' => esc_html__('CSS Animation','sc-core') ,
            'param_name' => 'css_animation',
            'admin_label' => false,
            'value' => '',
            'settings' => array(
                'type' => 'in',
                'custom' => array(
                    'label' => 'Default',
                    'value' => array(
                        esc_html__('Top to bottom','sc-core') => 'top-to-bottom',
                        esc_html__('Bottom to top','sc-core') => 'bottom-to-top',
                        esc_html__('Left to right','sc-core') => 'left-to-right',
                        esc_html__('Right to left','sc-core') => 'right-to-left',
                        esc_html__('Appear from center','sc-core') => 'appear',
                        esc_html__('Right','sc-core') => 'right',
                    ) ,
                ) ,
            ) ,
            'description' => __('Select type of animation for element to be animated when it \"enters\" the browsers viewport (Note: works only in modern browsers).','sc-core') ,
            'dependency' => array(
                'element' => 'accordion_type',
                'value' => array(
                    'Default'
                ) ,
            ) ,
        ) ,
        array(
            'type' => 'el_id',
            'heading' => esc_html__('Element ID','sc-core') ,
            'param_name' => 'el_id',
            'admin_label' => false,
            'description' => sprintf(__('Enter element ID (Note: make sure it is unique and valid according to ','sc-core').'<a href="%s" target="_blank">'.__('w3c specification','sc-core').'</a>).' , 'http://www.w3schools.com/tags/att_global_id.asp') , 
        ) ,
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra class name','sc-core') ,
            'param_name' => 'el_class',
            'admin_label' => false,
            'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','sc-core') , 
        ) ,
        array(
            'type' => 'css_editor',
            'heading' => esc_html__('CSS box','sc-core') ,
            'param_name' => 'css',
            'admin_label' => false,
            'group' => esc_html__('Design Options','sc-core') , 
        ) ,
    ) ,
    'js_view' => 'VcBackendTtaAccordionView',
    'custom_markup' => '
        <div class="vc_tta-container" data-vc-action="collapseAll">
            <div class="vc_general vc_tta vc_tta-accordion vc_tta-color-backend-accordion-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-o-shape-group vc_tta-controls-align-left vc_tta-gap-2">
                <div class="vc_tta-panels vc_clearfix {{container-class}}">
                    {{ content }}
                    <div class="vc_tta-panel vc_tta-section-append">
                        <div class="vc_tta-panel-heading">
                            <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left">
                                <a href="javascript:;" aria-expanded="false" class="vc_tta-backend-add-control">
                                <span class="vc_tta-title-text">' . esc_html__('Add Section','sc-core') . '</span>
                                <i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ',
    'default_content' => '[vc_tta_section title="' . sprintf('%s %d', esc_html__('Section','sc-core') , 1) . '"][/vc_tta_section][vc_tta_section title="' . sprintf('%s %d', esc_html__('Section','sc-core') , 2) . '"][/vc_tta_section]',
);