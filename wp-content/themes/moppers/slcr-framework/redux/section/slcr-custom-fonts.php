<?php 
/** 
 * The SlashCreative Redux Custom fonts Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Custom fonts Settings Fields
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom fonts','moppers'),
    'desc'   => esc_html__('Create a custom font kit and add to theme options fonts library.','moppers'),
    'icon'   => 'icons-add',
    'fields' => array(
        array(
            'type'        => 'custom_font',
            'id'          => 'custom_font',
            'validate'    => 'font_load',
            'title'       => esc_html__('Create Custom Font Face','moppers'),
            'subtitle'    => __('Use Webfont Generator ','moppers').'<a href="https://www.fontsquirrel.com/tools/webfont-generator" target="_blank">'.__('here','moppers').'</a> '.__('and create a font-face.zip file to upload here. ','moppers').'<br/><br/> '.__('Check all steps in detail in ','moppers').'<a href="https://slashcreative.co/docs/moppers" target="_blank">'.__('Documentation','moppers').'</a>',
            'placeholder' => array(
                'title'       => esc_html__('This is a title','moppers'),
                'description' => esc_html__('Description Here','moppers'),
                'url'         => esc_html__('Give us a link!','moppers'),
            ),
        ),
    ),
));