<?php
/** 
 * The SlashCreative Helper Functionality
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
 * Handle Slcr Helper Functionality.
 */
class Slcr_Helper {

    /**
     * Hold an instance of Slcr_Helper class.
     *
     * @since 1.0.0
     *
     * @access protected
     * @var string
     */
    protected static $instance = null;

    protected static $slcr_format = '?paged=%#%';

    /**
     *  Main Slcr_Helper instance.
     *
     * @since 1.0.0
     *
     * @access public
     * @var string
     * @return Slcr_Helper - Main instance.
     */
    public static function slcr_instance() {

        if(null == self::$instance) {
            self::$instance = new Slcr_Helper();
        }

        if(empty(get_permalink()) && isset($_GET['page_id'])) { 
            self::$slcr_format = '&paged=%#%';
        }
        return self::$instance;
    }

    /**
     * List of allowed HTML elements
     * @access public
     * @since 1.0.0 
     * @return  string 
     */
    public function slcr_allowed_html() {
        $allowed_tags = array(
            'a' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
                'href'  => array(),
                'rel'   => array(),
                'title' => array(),
                'target' => array(),
            ), 
            'div' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
                'title' => array(),
                'bw-theme' => array(),
                'bw-cur' => array(),
            ),
            'ul' => array( 
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'li' => array( 
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h1' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h2' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h3' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h4' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h5' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'h6' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'br' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'i' => array( 
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ),
            'img' => array(
                'alt'    => array(),
                'class' => array(),
                'id' => array(),
                'style' => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ), 
            'p' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ), 
            'span' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
                'title' => array(),
                'style' => array(),
            ), 
            'strong' => array(
                'class' => array(),
                'id' => array(),
                'style' => array(),
            ), 
        );
        
        return $allowed_tags;
    }

    /**
     * Convert a normal HEX-color into it's RGB values
     * @access public
     * @since 1.0.0 
     * @return  string
     * @param   string $hex 
     */
    public function slcr_hex2rgb($hex){
        $hex = str_replace("#", "", $hex);
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    /**
     * Code Use For Pagination
     * @access public
     * @since 1.0.0 
     * @return  void 
     */
    public function slcr_pagination_bar()
    {
        global $wp_query;
        $total_pages = $wp_query->max_num_pages;
        if ($total_pages > 1) {
            $current_page  = max(1, get_query_var('paged'));
            $data_paginate = paginate_links(array(
                'base'      => get_pagenum_link(1) . '%_%',
                'format'    => self::$slcr_format,
                'current'   => $current_page,
                'total'     => $total_pages,
                'prev_text' => esc_html__('Previous','moppers'),
                'next_text' => esc_html__('Next','moppers'),
            ));
            echo '<div class="col-md-12 col-sm-12 col-xs-12 blog_pagination_type_1"><div class="pagination__blog"><nav class="pagination__nav"> <div class="pagination__links">'.$data_paginate.'</div></nav></div></div>';
        }
    }

    /**
     * Code Use For Post Pagination
     * @access public
     * @since 1.0.0 
     * @return  void 
     */
    public function slcr_post_pagination_bar()
    {
        wp_link_pages( array(
        'before'      => '<div class="col-md-12 col-sm-12 col-xs-12 blog_pagination_type_1"><div class="pagination__blog"><nav class="pagination__nav"> <div class="pagination__links">',
        'after'       => '</div></nav></div></div>',
        'link_before' => '',
        'link_after'  => '',
        ) );
    }

    /**
     * Code Use For Check Same Menu locations
     * @access public
     * @since 1.0.0 
     * @return  string 
     */
    public function slcr_check_menu_location()
    {
        $slcr_menu_locations = get_nav_menu_locations(); 
        if(count($slcr_menu_locations)>1) {
            if($slcr_menu_locations['main-menu'] == $slcr_menu_locations['secondary-menu']) { 
                return "1";
            } 
        }
    }


    /**
     * Check Any Social Link Exist
     * @access public
     * @since 1.0.0 
     * @return  boolean 
     */
    public function slcr_social_media_url_check() {
        global $slcr_redux;
        $twitter_url = esc_url($slcr_redux['twitter-url']);
        $google_plus_url = esc_url($slcr_redux['google-plus-url']);
        $vimeo_url = esc_url($slcr_redux['vimeo-url']);
        $dribbble_url = esc_url($slcr_redux['dribbble-url']);
        $pinterest_url = esc_url($slcr_redux['pinterest-url']);
        $youtube_url = esc_url($slcr_redux['youtube-url']);
        $tumblr_url = esc_url($slcr_redux['tumblr-url']);
        $linkedin_url = esc_url($slcr_redux['linkedin-url']);
        $rss_url = esc_url($slcr_redux['rss-url']);
        $behance_url = esc_url($slcr_redux['behance-url']);
        $flickr_url = esc_url($slcr_redux['flickr-url']);
        $spotify_url = esc_url($slcr_redux['spotify-url']);
        $instagram_url = esc_url($slcr_redux['instagram-url']);
        $github_url = esc_url($slcr_redux['github-url']);
        $stackexchange_url = esc_url($slcr_redux['stackexchange-url']);
        $soundcloud_url = esc_url($slcr_redux['soundcloud-url']);
        $vk_url = esc_url($slcr_redux['vk-url']);
        $vine_url = esc_url($slcr_redux['vine-url']);
        $houzz_url = esc_url($slcr_redux['houzz-url']);
        $yelp_url = esc_url($slcr_redux['yelp-url']);
        $email_url = esc_url($slcr_redux['email-url']);
        $phone_url = esc_url($slcr_redux['phone-url']);
        $facebook_url = esc_url($slcr_redux['facebook-url']);
        if ($facebook_url == true || $twitter_url == true || $google_plus_url == true || $vimeo_url == true || $dribbble_url == true || $pinterest_url == true || $youtube_url == true || $tumblr_url == true || $linkedin_url == true || $rss_url == true || $behance_url == true || $flickr_url == true || $spotify_url == true || $instagram_url == true || $github_url == true || $stackexchange_url == true || $soundcloud_url == true || $vk_url == true || $vine_url == true || $houzz_url == true || $yelp_url == true || $email_url == true || $phone_url == true) { 
            return "1";
        }else{ 
            return "0"; 
        } 
    }

    /**
     * Get Footer Get Social Media Template
     * @access public
     * @since 1.0.0 
     * @return  Mix 
     */
    function slcr_footer_social(){
      global $slcr_redux;
      ?>
       <ul class="footer__social">
            <?php $facebook_url = $slcr_redux['footer-facebook-url'];
            if ($facebook_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-facebook-url']); ?>" target="_blank"><i class="socicon-facebook"></i></a>
                </li>
            <?php 
            }
            $twitter_url = $slcr_redux['footer-twitter-url'];
            if ($twitter_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-twitter-url']); ?>" target="_blank"><i class="socicon-twitter"></i></a>
                </li>
            <?php 
            }
            $google_plus_url = $slcr_redux['footer-google-plus-url'];
            if ($google_plus_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-google-plus-url']); ?>" target="_blank"><i class="socicon-googleplus"></i></a>
                </li>
                <?php 
            }
            $vimeo_url = $slcr_redux['footer-vimeo-url'];
            if ($vimeo_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-vimeo-url']); ?>" target="_blank"><i class="socicon-vimeo"></i></a>
                </li>
                <?php 
            }
            $dribbble_url = $slcr_redux['footer-dribbble-url'];
            if ($dribbble_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-dribbble-url']); ?>" target="_blank"><i class="socicon-dribbble"></i></a>
                </li>
                <?php 
            }
            $pinterest_url = $slcr_redux['footer-pinterest-url'];
            if ($pinterest_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-pinterest-url']); ?>" target="_blank"><i class="socicon-pinterest"></i></a>
                </li>
                <?php 
            }
            $youtube_url = $slcr_redux['footer-youtube-url'];
            if ($youtube_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-youtube-url']); ?>" target="_blank"><i class="socicon-youtube"></i></a>
                </li>
                <?php 
            }
            $tumblr_url = $slcr_redux['footer-tumblr-url'];
            if ($tumblr_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-tumblr-url']); ?>" target="_blank"><i class="socicon-tumblr"></i></a>
                </li>
                <?php 
            }
            $linkedin_url = $slcr_redux['footer-linkedin-url'];
            if ($linkedin_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-linkedin-url']); ?>" target="_blank"><i class="socicon-linkedin"></i></a>
                </li>
                <?php 
            }
            $rss_url = $slcr_redux['footer-rss-url'];
            if ($rss_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-rss-url']); ?>" target="_blank"><i class="socicon-rss"></i></a>
                </li>
                <?php 
            }
            $behance_url = $slcr_redux['footer-behance-url'];
            if ($behance_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-behance-url']); ?>" target="_blank"><i class="socicon-behance"></i></a>
                </li>
                <?php
            }
            $flickr_url = $slcr_redux['footer-flickr-url'];
            if ($flickr_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-flickr-url']); ?>" target="_blank"><i class="socicon-flickr"></i></a>
                </li>
                <?php 
            }
            $spotify_url = $slcr_redux['footer-spotify-url'];
            if ($spotify_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-spotify-url']); ?>" target="_blank"><i class="socicon-spotify"></i></a>
                </li>
                <?php 
            }
            $instagram_url = $slcr_redux['footer-instagram-url'];
            if ($instagram_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-instagram-url']); ?>" target="_blank"><i class="socicon-instagram"></i></a>
                </li>
                <?php 
            }
            $github_url = $slcr_redux['footer-github-url'];
            if ($github_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-github-url']); ?>" target="_blank"><i class="socicon-github"></i></a>
                </li>
                <?php 
            }
            $stackexchange_url = $slcr_redux['footer-stackexchange-url'];
            if ($stackexchange_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-stackexchange-url']); ?>" target="_blank"><i class="socicon-stackexchange"></i></a>
                </li>
                <?php 
            }
            $soundcloud_url = $slcr_redux['footer-soundcloud-url'];
            if ($soundcloud_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-soundcloud-url']); ?>" target="_blank"><i class="socicon-soundcloud"></i></a>
                </li>
                <?php 
            }
            $vk_url = $slcr_redux['footer-vk-url'];
            if ($vk_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-vk-url']); ?>" target="_blank"><i class="socicon-vkontakte"></i></a>
                </li>
                <?php 
            }
            $vine_url = $slcr_redux['footer-vine-url'];
            if ($vine_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-vine-url']); ?>" target="_blank"><i class="socicon-vine"></i></a>
                </li>
                <?php 
            }
            $houzz_url = $slcr_redux['footer-houzz-url'];
            if ($houzz_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-houzz-url']); ?>" target="_blank"><i class="socicon-houzz"></i></a>
                </li>
                <?php 
            }
            $yelp_url = $slcr_redux['footer-yelp-url'];
            if ($yelp_url == true) {?>
                <li>
                    <a href="<?php echo esc_url($slcr_redux['social-media-yelp-url']); ?>" target="_blank"><i class="socicon-yelp"></i></a>
                </li>
                <?php 
            }
            $email_url = $slcr_redux['footer-email-url'];
            if ($email_url == true) {?>
                <li>
                    <a href="mailto:<?php echo esc_url($slcr_redux['social-media-email-url']); ?>"><i class="socicon-mail"></i></a>
                </li>
                <?php 
            }
            $phone_url = $slcr_redux['footer-phone-url'];
            if ($phone_url == true) {?>
                <li>
                    <a href="tel:<?php echo esc_url($slcr_redux['social-media-phone-url']); ?>"><i class="icon_phone"></i></a>
                </li>
                <?php 
            }
            ?>
        </ul>

        <?php
    }

    /**
     * Get Social Media Template
     * @access public
     * @since 1.0.0 
     * @return  Mix 
     */
    function slcr_social_media_url() {
        global $slcr_redux;
        $facebook_url = $slcr_redux['facebook-url'];
        if ($facebook_url == true) { ?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-facebook-url']); ?>" target="_blank"><i class="socicon-facebook"></i></a>
            </li>
        <?php }
        $twitter_url = $slcr_redux['twitter-url'];
        if ($twitter_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-twitter-url']); ?>" target="_blank"><i class="socicon-twitter"></i></a>
            </li>
        <?php }
        $google_plus_url = $slcr_redux['google-plus-url'];
        if ($google_plus_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-google-plus-url']); ?>" target="_blank"><i class="socicon-googleplus"></i></a>
            </li>
        <?php }
        $vimeo_url = $slcr_redux['vimeo-url'];
        if ($vimeo_url == true) {?>
             <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-vimeo-url']); ?>" target="_blank"><i class="socicon-vimeo"></i></a>
            </li>
        <?php }
        $dribbble_url = $slcr_redux['dribbble-url'];
        if ($dribbble_url == true) {?>
            <li>
               <a href="<?php echo esc_url($slcr_redux['social-media-dribbble-url']); ?>" target="_blank"><i class="socicon-dribbble"></i></a>
            </li>
        <?php }
        $pinterest_url = $slcr_redux['pinterest-url'];
        if ($pinterest_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-pinterest-url']); ?>" target="_blank"><i class="socicon-pinterest"></i></a>
            </li>
        <?php }
        $youtube_url = $slcr_redux['youtube-url'];
        if ($youtube_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-youtube-url']); ?>" target="_blank"><i class="socicon-youtube"></i></a>
            </li>
        <?php }
        $tumblr_url = $slcr_redux['tumblr-url'];
        if ($tumblr_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-tumblr-url']); ?>" target="_blank"><i class="socicon-tumblr"></i></a>
            </li>
        <?php }
        $linkedin_url = $slcr_redux['linkedin-url'];
        if ($linkedin_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-linkedin-url']); ?>" target="_blank"><i class="socicon-linkedin"></i></a>
            </li>
        <?php }
        $rss_url = $slcr_redux['rss-url'];
        if ($rss_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-rss-url']); ?>" target="_blank"><i class="socicon-rss"></i></a>
            </li>
        <?php }
        $behance_url = $slcr_redux['behance-url'];
        if ($behance_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-behance-url']); ?>" target="_blank"><i class="socicon-behance"></i></a>
            </li>
        <?php }
        $flickr_url = $slcr_redux['flickr-url'];
        if ($flickr_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-flickr-url']); ?>" target="_blank"><i class="socicon-flickr"></i></a>
            </li>
        <?php }
        $spotify_url = $slcr_redux['spotify-url'];
        if ($spotify_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-spotify-url']); ?>" target="_blank"><i class="socicon-spotify"></i></a>
            </li>
        <?php }
        $instagram_url = $slcr_redux['instagram-url'];
        if ($instagram_url == true) {?>
            <li>
               <a href="<?php echo esc_url($slcr_redux['social-media-instagram-url']); ?>" target="_blank"><i class="socicon-instagram"></i></a>
            </li>
        <?php }
        $github_url = $slcr_redux['github-url'];
        if ($github_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-github-url']); ?>" target="_blank"><i class="socicon-github"></i></a>
            </li>
        <?php }
        $stackexchange_url = $slcr_redux['stackexchange-url'];
        if ($stackexchange_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-stackexchange-url']); ?>" target="_blank"><i class="socicon-stackexchange"></i></a>
            </li>
        <?php }
        $soundcloud_url = $slcr_redux['soundcloud-url'];
        if ($soundcloud_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-soundcloud-url']); ?>" target="_blank"><i class="socicon-soundcloud"></i></a>
            </li>
        <?php }
        $vk_url = $slcr_redux['vk-url'];
        if ($vk_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-vk-url']); ?>" target="_blank"><i class="socicon-vkontakte"></i></a>
            </li>
        <?php }
        $vine_url = $slcr_redux['vine-url'];
        if ($vine_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-vine-url']); ?>" target="_blank"><i class="socicon-vine"></i></a>
            </li>
        <?php }
        $houzz_url = $slcr_redux['houzz-url'];
        if ($houzz_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-houzz-url']); ?>" target="_blank"><i class="socicon-houzz"></i></a>
            </li>
        <?php }
        $yelp_url = $slcr_redux['yelp-url'];
        if ($yelp_url == true) {?>
            <li>
                <a href="<?php echo esc_url($slcr_redux['social-media-yelp-url']); ?>" target="_blank"><i class="socicon-yelp"></i></a>
            </li>
        <?php }
        $email_url = $slcr_redux['email-url'];
        if ($email_url == true) {?>
            <li>
                <a href="mailto:<?php echo esc_url($slcr_redux['social-media-email-url']); ?>"><i class="socicon-mail"></i></a>
            </li>
        <?php }
        $phone_url = $slcr_redux['phone-url'];
        if ($phone_url == true) {?>
            <li>
                <a href="tel:<?php echo esc_url($slcr_redux['social-media-phone-url']); ?>"><i class="icon_phone"></i></a>
            </li>
        <?php } 
    }

     
}


/**
 * Main instance of Slcr_Helper.
 *
 * Returns the main instance of Slcr_Helper to prevent the need to use globals.
 *
 * @return Slcr_Helper 
 * @since 1.0.0 
 */
function slcr_helper() {
    return Slcr_Helper::slcr_instance();
}
slcr_helper();
