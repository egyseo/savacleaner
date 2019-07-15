<?php
/** 
 * The SlashCreative Custom Menu Settings 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 */

if( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
 /**
 * Primary  menu walker code
 */ 
class Slcr_Nav_Primary extends Walker_Nav_menu {
    function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
        $indent = str_repeat("\t",$depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"submenu__dropdown child $submenu depth_$depth\">\n";
    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span 
        $button_class ="";
        //button styling
        $button_style = get_post_meta($item->ID, 'slcr-menu-item-button-style', true); 
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;                           
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = ' ';
        }                        
        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if($depth > 0){
            $class_names = ' class=" dropdown__item '.$button_class.' '.$class_names.'"';
        }else {
            $class_names = ' class=" nav__item  '.$button_class.' '.$class_names.'"';  
        }                            
        $id = apply_filters('nav_menu_item_id ', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';                            
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';                     
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : ''; 
        if (!empty($button_style)) {
            if($button_style == "Simple_button"){
                $attributes .=   ' class="btn button__nav_1"';
            }
            elseif($button_style == "Bordered_button"){
                $attributes .=   ' class="btn button__nav_2"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ); 
    }    
}
 /**
 * Mobile  menu walker code
 */  
class Mobile_Slcr_Nav_Primary extends Walker_Nav_menu {   
    function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
        $indent = str_repeat("\t",$depth);
        $submenu = ($depth > 0) ? ' ' : '';
        if($depth > 0){
             $output .= "\n$indent<ul class=\"nav__mobile_list  sub-menu child  $submenu depth_$depth\">\n";
        }elseif($depth == 0){
             $output .= "\n$indent<ul class=\"nav__mobile_list  sub-menu child  $submenu depth_$depth\">\n";
        }else {
             $output .= "\n$indent<ul class=\"nav__mobile_list   $submenu depth_$depth\">\n";
        }
       
    }  
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span 
        $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
        $li_attributes = '';
        $class_names = $value = '';                            
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;                            
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'mobile-menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = '';
        }                            
        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if($depth > 0){
            $class_names = ' class="nav__mobile_item "';
        }else {
            $class_names = ' class="nav__mobile_item  parent__menu "';  
        }                           
        $id = apply_filters('nav_menu_item_id ', 'mobile-menu-item-'.$item->ID, $item, $args);
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';                           
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>'; 
        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->title) . '"' : '';
        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : ''; 
        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
        $item_output .= $args->after;
        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  
    }   
}