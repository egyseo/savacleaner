<?php
/** 
 * The SlashCreative Single Post Page
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
get_header(); ?>
<main class="blog__post"> 
	<?php 
	get_template_part('template-parts/single-post/single-post');
	?>
</main>
<?php
get_footer();
