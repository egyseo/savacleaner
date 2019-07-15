<?php
/** 
 * The SlashCreative Search Form Main Page
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
?>
<h3 class="title"><?php echo esc_html__('Search','moppers')?></h3>
<div class="search">
	<form class="searchform form-group" role="search" method="get" id="searchform_main" action="<?php echo esc_url(home_url('/')); ?>">
		<div>
			<input type="text"  class="form-control" placeholder="<?php echo esc_attr__('Search','moppers')?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" id="s_main" />
			<button type="submit" id="searchsubmit" class="btn search_btn   "
			value="<?php echo esc_attr_x('Search', 'submit button','moppers'); ?>" /> <i class="icon_search"></i> </button>
		</div>
	</form>
</div>