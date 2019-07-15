<?php 
/** 
 * The SlashCreative Redux Support  Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Social Support Settings Fields 
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Support','moppers'),
    'id'               => 'documentation-settings',
    'desc'             => esc_html__('Theme Documentation','moppers'),
    'customizer_width' => '400px',
    'icon'             => 'icons-lifebuoy',
    'class'            => 'documentation_slcr',
    'fields'     => array(
            array(
                'id'       => 'documentation_settings_docs',
                'type'     => 'texthtml',
                'title'    => esc_html__('SC Documentation','moppers'),
                'default'  => false,
                'subtitle' => '<h4>'.esc_html__('Click ','moppers').'<a href="https://slashcreative.co/docs/moppers">'.esc_html__('here','moppers').'</a>'.esc_html__(' to visit the Help Center.','moppers').'</h4> <br>'.esc_html__('Vsit SC Help Center for the detailed documentation about the theme and any kind of other customer support.','moppers'),
            ),
        ),
    )
);