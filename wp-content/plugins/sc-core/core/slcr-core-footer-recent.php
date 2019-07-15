<?php
/** 
 * The SlashCreative Footer Recent Post Widgets 
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
 * Handle Slcr Footer Recent Widget 
 */
class Slcr_Core_Footer_Recent extends WP_Widget {

    /**
     * Constructor.
     *
     * @access public 
     */
    public function __construct() {
        $widget_ops = array('classname' => 'slcr_recent_posts', 'description' => __( 'Footer Recent Posts.','sc-core') );
        parent::__construct('slcr-recent-posts', __('SC Recent Posts','sc-core'), $widget_ops);
        $this->alt_option_name = 'slcr_recent_posts';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    /**
     * Slcr widget
     * @access public
     * @since 1.0.0
     * @param string $args $instance .  
     * @return  mix
     */ 
    public function widget($args, $instance) {
        $cache = array();
        if ( ! $this->is_preview() ) {
            $cache = wp_cache_get( 'slcr_widget_recent_posts', 'widget' );
        }

        if ( ! is_array( $cache ) ) {
            $cache = array();
        }

        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

        /** This filter is documented in wp-includes/default-widgets.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ){
            $number = 5;
        } 


        $slcr_recent = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'post_type'           => array('post',
            'ignore_sticky_posts' => true
        ) ) ) );

        if ($slcr_recent->have_posts()) :
        ?>
        <?php echo $args['before_widget']; ?>
        <?php if ( $title ) {
            echo $args['before_title'] . esc_attr($title) . $args['after_title'];
        } ?>
        <ul>
        <?php while ( $slcr_recent->have_posts() ) : $slcr_recent->the_post(); ?>
            <li>
                <div class="recent-post-image">
                    <?php if(has_post_thumbnail()) {?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail');  ?>" alt="<?php the_title(); ?>" height="75" width="80">
                    <?php }?>
                </div>
                <div class="recent-post-info">
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php get_the_title() ? esc_html( the_title() )  : esc_html(the_ID() ); ?></a>
                    </h4>
                    <span class="post-date"><?php echo get_the_date(); ?> / by  <?php echo get_the_author_link(); ?></span>
                </div>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo $args['after_widget']; ?>
        <?php

        wp_reset_postdata();

        endif;

        if ( ! $this->is_preview() ) {
            $cache[ $args['widget_id'] ] = ob_get_flush();
            wp_cache_set( 'slcr_widget_recent_posts', $cache, 'widget' );
        } else {
            ob_end_flush();
        }
    }

    /**
     * Update
     * @access public
     * @since 1.0.0
     * @param string $new_instance $old_instance .  
     * @return  mix
     */ 
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['slcr_recent_posts']) )
            delete_option('slcr_recent_posts');

        return $instance;
    }

    /**
     * flush widget cache
     * @access public
     * @since 1.0.0  
     * @return  mix
     */ 
    public function flush_widget_cache() {
        wp_cache_delete('slcr_widget_recent_posts', 'widget');
    }

    /**
     * form
     * @access public
     * @since 1.0.0
     * @param string $instance .  
     * @return  mix
     */ 
    public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5; 
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title); ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="3" /></p> 
        <?php
    }

}