<?php 
/** 
 * The SlashCreative Redux Page Header Settings section set  
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

// START Page Header Settings Fields
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Page Header','moppers'),
    'id'               => 'page_header',
    'desc'             => esc_html__('Customize the golbal page header.','moppers'),
    'customizer_width' => '400px',
    'icon'             => 'icons-monitor',
    'fields'           => array(
        array(
            'id'       => 'page-header-settings-header-height',
            'type'     => 'text',
            'title'    => esc_html__('Header Height','moppers'),
            'subtitle' => esc_html__('Change the height of page header.','moppers'),
            'desc'     => '',
            'default'  => '250',
        ),
        array(
            'id'       => 'page-header-settings-breadcrumb-show',
            'type'     => 'switch',
            'title'    => esc_html__('Breadcrumbs','moppers'),
            'subtitle' => esc_html__('Enable or disable breadcrumb.','moppers'),
            'default'  => true,
        ),
        array(
            'id'       => 'page-header-settings-background-type',
            'type'     => 'select',
            'title'    => esc_html__('Background Type','moppers'),
            'subtitle' => esc_html__('Select a background type for page header.','moppers'),
            'options'  => array(
                'color'    => 'Color',
                'image'    => 'Image',
                'gradient' => 'Gradient',
            ),
            'default'  => 'color',
        ),
        array(
            'id'       => 'page-header-settings-breadcrumb-image-url',
            'type'     => 'media',
            'title'    => esc_html__('Background Image','moppers'),
            'subtitle' => esc_html__('Upload an image to show on  page header.','moppers'),
            'desc'     => esc_html__('This is the default header image. To use different image, upload feature image on each page.','moppers'),
            'required' => array('page-header-settings-background-type', '=', 'image'),
        ),
        array(
            'id'       => 'page-header-settings-background-color',
            'type'     => 'color',
            'title'    => esc_html__('Background Color','moppers'),
            'subtitle' => esc_html__('Pick a color for background of the page header.','moppers'),
            'required' => array('page-header-settings-background-type', '=', 'color'),
            'default'  => '#f7f7f7',
        ),
        array(
            'id'       => 'page-header-settings-background-gradient',
            'type'     => 'text',
            'title'    => esc_html__('Gradient Code','moppers'),
            'subtitle' => __('Enter the gradient CSS here. ','moppers').'<br /><br /> <strong>'.__('Example - ','moppers').'</strong>'.__(' linear-gradient( 135deg, #CE9FFC 10%, #7367F0 100%)','moppers'),
            'desc'     => '',
            'required' => array('page-header-settings-background-type', '=', 'gradient'),
        ),
        array(
            'id'       => 'page-header-settings-breadcrumb-image-overlay',
            'type'     => 'color',
            'title'    => esc_html__('Overlay Color','moppers'),
            'subtitle' => esc_html__('Change the image overlay color.','moppers'),
            'required' => array('page-header-settings-background-type', '=', 'image'),
        ),
        array(
            'id'       => 'page-header-settings-overlay-opacity',
            'type'     => 'text',
            'title'    => esc_html__('Overlay Opacity','moppers'),
            'subtitle' => esc_html__('Enter the overlay opacity from 1 to 10.','moppers'),
            'required' => array('page-header-settings-background-type', '=', 'image'),
            'desc'     => '',
            'default'  => '5',
        ),
        array(
            'id'       => 'page-header-settings-content-color',
            'type'     => 'select',
            'title'    => esc_html__('Content Scheme','moppers'),
            'subtitle' => esc_html__('Select a content Type.','moppers'),
            'options'  => array(
                'light'  => 'Dark',
                'dark' => 'Light',
            ),
            'default'  => 'dark',
        ),
        array(
            'id'       => 'page-header-settings-content-vertical',
            'type'     => 'select',
            'title'    => esc_html__('Content Position - Vertical','moppers'),
            'subtitle' => esc_html__('Select a postion to display header content.','moppers'),
            'options'  => array(
                'top'    => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
            ),
            'default'  => 'middle',
        ),
        array(
            'id'       => 'page-header-settings-content-horizontal',
            'type'     => 'select',
            'title'    => esc_html__('Content Position - Horizontal','moppers'),
            'subtitle' => esc_html__('Select a postion to display header content.','moppers'),
            'options'  => array(
                'left'   => 'Left',
                'right'  => 'Right',
                'center' => 'Center',
            ),
            'default'  => 'left',
        ),
        array(
            'id'       => 'page-header-settings-title-typography',
            'type'     => 'typography',
            'title'    => esc_html__('Header Title Typography','moppers'),
            'subtitle' => esc_html__('Specify font properties for the Header Title.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'page-header-settings-description-typography',
            'type'     => 'typography',
            'title'    => esc_html__('Header Description Typography','moppers'),
            'subtitle' => esc_html__('Specify font properties for the Header Description.','moppers'),
            'google'   => true,
        ),
        array(
            'id'       => 'page-header-settings-breadcrumb-color',
            'type'     => 'color',
            'title'    => esc_html__('Breadcrumbs Color','moppers'),
            'subtitle' => esc_html__('Change the text color of breadcrumbs.','moppers'),
        ),
        array(
            'id'       => 'page-header-settings-breadcrumb-color-hover',
            'type'     => 'color',
            'title'    => esc_html__('Breadcrumbs Color - Hover','moppers'),
            'subtitle' => esc_html__('Change the text color of breadcrumbs on hover.','moppers'),
        ),
    ),
));
