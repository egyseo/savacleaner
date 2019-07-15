<?php
/** 
 * The SlashCreative Archive Page
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
// Do not allow directly accessing this file. 
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
} 
get_header();
get_template_part('template-parts/archive');
get_footer();
