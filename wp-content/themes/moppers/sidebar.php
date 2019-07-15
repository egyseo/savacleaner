<?php
/** 
 * The SlashCreative Sidebar Page
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
if (!is_active_sidebar('sidebar-main')) {
    return;
}
?>
<!-- SIDEBAR -->
<aside class="woocommerce slcr-sidebar">
	<?php dynamic_sidebar('sidebar-main');?>
</aside>
<!-- SIDEBAR ENDS -->