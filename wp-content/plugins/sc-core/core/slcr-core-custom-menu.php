<?php
/** 
 * The SlashCreative Custom Menu Widgets 
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    SC-CORE
 * @subpackage Core
 * @since      1.0.0
 */

if( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
 
 /**
 * Handle Slcr Custom Menu Widget 
 */
class Slcr_Core_Custom_Menu_Widget extends WP_Widget {

    public function __construct() {
        $widget_details = array(
            'classname'   => 'custom_menu',
            'description' => __( 'Select any of menu', 'sc-core' ),
        );

        parent::__construct('custom_menu', 'Custom Menu', $widget_details);

    }

    public function form($instance) {
        $title = '';
        if (!empty($instance['title'])) {
            $title = $instance['title'];
        }

        $select = '';
        if (!empty($instance['select'])) {
            $select = $instance['select'];
        }
        $custom_menus = array();

        $menus = get_terms('nav_menu', array('hide_empty' => false));
        if (is_array($menus) && !empty($menus)) {
            foreach ($menus as $single_menu) {
                if (is_object($single_menu) && isset($single_menu->name, $single_menu->term_id)) {
                    $custom_menus[$single_menu->name] = $single_menu->name;
                }
            }
        }
        $title_attr=$this->get_field_name('title');
        $select_attr=$this->get_field_name('select');
        ?>
        <p>
            <label for="<?php echo esc_attr($title_attr); ?>"><?php echo esc_html__('Title:','slcr');?></label>
            <input class="widefat" id="<?php echo esc_attr($title_attr); ?>" name="<?php echo esc_attr($title_attr); ?>" type="text" value="<?php echo esc_html($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($select_attr); ?>"><?php echo esc_html__('select:','slcr');?></label>
            <select class="widefat " id="<?php echo esc_attr($select_attr); ?>" name="<?php echo esc_attr($select_attr); ?>" value="<?php echo esc_attr($select_attr); ?>">
                <?php foreach ($custom_menus as $value) {
                    if ($select == $value) {
                        echo '<option value="' . esc_attr($value) . '" selected="selected">' . esc_html($value) . '</option>';
                    } else {
                        echo '<option value="' . esc_attr($value) . '">' . esc_html($value) . '</option>';
                    }

                }?>
            </select>
        </p>
        <div class='slcr-text'> 
        </div>
        <?php
    }

    public function update($new_instance, $old_instance) {
        return $new_instance;
    }

    public function widget($args, $instance) {

        $title  = $instance['title'];
        $select = $instance['select'];
        ?>
        <?php echo $args['before_widget']; 
        if(!empty($title)) { ?>
            <h3 class="title"><?php echo esc_html($title); ?></h3>
        <?php } ?>
        <ul class="second__mob_menu">
             <?php wp_page_menu(array('menu' => $select, 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
        <?php echo $args['after_widget']; ?>
        <?php
    }

}