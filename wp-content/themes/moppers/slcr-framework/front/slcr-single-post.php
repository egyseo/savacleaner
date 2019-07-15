<?php
/** 
 * The SlashCreative Single Post Settings 
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
 * Handle Slcr Single Post 
 */
 class Slcr_Single_Post {
 	
 	/**
	 * Hold an instance of Slcr_Single_Post class.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 * @var string
	 */
	protected static $instance = null; 
	public $featured_image ;
	public $featured_image_type ;
	public $blog_single_sidebar ;
	public $featured_img_url;
    public $featured_img_url_small; 

	/**
	 *  Main Slcr_Single_Post instance.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @var string
	 * @return Slcr_Single_Post - Main instance.
	 */
	public static function slcr_instance() {
        if(null == self::$instance) {
            self::$instance = new Slcr_Single_Post();
        }

        return self::$instance;
    }

    /**
	 * Constructor.
	 *
	 * @access private 
	 */
	private function __construct() {
		$this->slcr_init_hooks();
	}

	/**
	 * @access private
	 * @since 1.0.0
	 * @param string $option_name name of notice. 
	 * @return  void
	 */
	private function slcr_init_hooks() { 
		global $slcr_redux;
        $this->featured_img_url    = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $this->featured_img_url_small    = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
        $acf_link_post_bolg_feature_image_2 = get_field('acf_link_post_bolg_feature_image_2');
        if($acf_link_post_bolg_feature_image_2=="default" || empty($acf_link_post_bolg_feature_image_2)){
            if(!isset($slcr_redux['blog-settings-blog-single-featured-image'])){
                $this->featured_image = "true";   
            }else{
                if($slcr_redux['blog-settings-blog-single-featured-image'] == false){ 
                    $this->featured_image = "false";  
                }else{
                    $this->featured_image = "true";  
                }
            } 
        }else {
            $this->featured_image = $acf_link_post_bolg_feature_image_2;
        }   
        $acf_link_post_bolg_feature_image_size_2 = get_field('acf_link_post_bolg_feature_image_size_2');
        if($acf_link_post_bolg_feature_image_size_2=="default" || $acf_link_post_bolg_feature_image_size_2==""){
            $this->featured_image_type = $slcr_redux['blog-settings-blog-single-featured-image-type'];
        }else { 
            $this->featured_image_type = $acf_link_post_bolg_feature_image_size_2;
        } 

        $acf_link_post_bolg_single_sidebar_34 = get_field('acf_link_post_bolg_single_sidebar_34');
        if($acf_link_post_bolg_single_sidebar_34=="default" || empty($acf_link_post_bolg_single_sidebar_34)){
            $this->blog_single_sidebar = $slcr_redux['blog-settings-blog-single-sidebar-show']; 
        }else {
            $this->blog_single_sidebar = $acf_link_post_bolg_single_sidebar_34;
        }  
        if(!isset($slcr_redux)){
            $this->blog_single_sidebar = '1'; 
        }   
	}

	/**
	 * Function for Related Post
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
	public function slcr_related_post() { 
		global $slcr_redux;
		$blog_related_post = $slcr_redux['blog-settings-blog-single-related-post'];
		if ($blog_related_post == true) {
			global $post;
            $orig_post = $post;
            $categories = get_the_category($post->ID);
            if ($categories) {
                $category_ids = array();
                foreach ($categories as $individual_category) {
                    $category_ids[] = $individual_category->term_id;
                } 
                $args = array(
                    'category__in'        => $category_ids,
                    'post__not_in'        => array(
                        $post->ID,
                    ),
                    'posts_per_page'      => 3, // Number of related posts that will be shown.
                    'ignore_sticky_posts' => 1,
                );
                $my_query = new wp_query($args);
                if ($my_query->have_posts()) { ?>
				    <!-- RELATED BLOG CONTENT ENDS -->
				    <div class="related-articles-sm"> 
						<div class="row">
								<?php
                        while ($my_query->have_posts()) {
                            $my_query->the_post();
                            ?>
							<div class="col-md-4 col-sm-6">
								<a href="<?php the_permalink();?>" class="article-card">
									<?php if(has_post_thumbnail()) { ?>
										<div class="article-image lazy" data-bg="url(<?php the_post_thumbnail_url('slcr_small');?>)"></div>
									<?php } ?>
									<div class="article-info">
										<h4 class="article-title"><?php echo esc_html(get_the_title());?></h4>
										<date class="article-date"><i class="icon_calendar"></i><?php echo esc_html__( ' Posted - ', 'moppers' );?><?php the_time(get_option('date_format'));?></date>
									</div>
								</a>
							</div>
							<?php
                        } ?>
						</div>
					</div>
				    <?php
                }
            }
            $post = $orig_post;
            wp_reset_query();
	               
		} 
    } 

    /**
	 * Function for Blog Pagination
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    public function slcr_blog_Pagination() { 
		$prev_post = get_previous_post();
		$next_post = get_next_post(); 
		if (!empty( $prev_post ) || !empty( $next_post )) { ?>
			<div class="blog-pagination">
				<?php
				if (!empty( $prev_post )) { ?>
					<!-- Previous Post -->
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="page-item prev">
						<span>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
								<path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111 C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587 c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
							</svg>
						</span>
						<span><?php get_previous_posts_link( "Prev" ); ?><?php echo esc_html__('Prev','moppers')?></span>
					</a>
					<?php 
				}
				if (!empty( $next_post )) { ?>
					<!-- Next Post -->
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="page-item next">
						<span><?php get_previous_posts_link( "Prev" ); ?><?php echo esc_html__('Next','moppers')?></span>
						<span>
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
								<path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111 C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587 c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
							</svg>
						</span>
					</a>
					<?php 
				} ?>
			</div>
		<?php } 
    }

    /**
	 * Function for Get Post Category
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    function slcr_get_post_category() {
    	$i = 1;
        foreach ((get_the_category()) as $category) {
            // Get the ID of a given category
            $category_id = get_cat_ID($category->cat_name);
            // Get the URL of this category
            $category_link = get_category_link($category_id);
            if ($i == 1) {
                echo '<a href="' . esc_url($category_link) . '" class="item">' . $category->cat_name . '</a>';
                $i++;
            } else {
                echo ' <a href="' . esc_url($category_link) . '" class="item"> ' . $category->cat_name . '</a>';
                $i++;
            }
        }
    }

    /**
	 * Function for Get Post Format Data
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    function slcr_get_post_format() { 
    	$post_format;
        if (has_post_format('video')) { 
            $acf_video_post_format_settings_link = get_field('acf_video_post_format_settings_link');
            if($acf_video_post_format_settings_link!=""){ 
                echo  '<div class="blog-post-type">
                    <a href="'.esc_attr($acf_video_post_format_settings_link).'" class="popup-youtube">
                    	<svg version="1.1" class="post-type-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
							<path d="M256,0C114.617,0,0,114.615,0,256s114.617,256,256,256s256-114.615,256-256S397.383,0,256,0z M344.48,269.57l-128,80 c-2.59,1.617-5.535,2.43-8.48,2.43c-2.668,0-5.34-0.664-7.758-2.008C195.156,347.172,192,341.82,192,336V176 c0-5.82,3.156-11.172,8.242-13.992c5.086-2.836,11.305-2.664,16.238,0.422l128,80c4.676,2.93,7.52,8.055,7.52,13.57 S349.156,266.641,344.48,269.57z"/>
						</svg>
                    </a>
                </div>';
            }
        } elseif (has_post_format('link')) {
            $acf_link_post_format_settings_link = get_field('acf_link_post_format_settings_link'); 
            if($acf_link_post_format_settings_link!=""){
                echo  '<div class="blog-post-type">
                    <a href="'.esc_attr($acf_link_post_format_settings_link).'" target="_blank">
                    	<svg version="1.1" class="post-type-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 44 44">
						  <path d="m22,0c-12.2,0-22,9.8-22,22s9.8,22 22,22 22-9.8 22-22-9.8-22-22-22zm-5.2,24.4l-1.4,1.4c-0.4,0.4-1,0.4-1.4,0l-2.5-2.5c-1.6-1.6-2.5-3.7-2.5-6 0-4.6 3.8-8.4 8.4-8.4 2.2,0 4.4,0.9 6,2.5l2.5,2.5c0.4,0.4 0.4,1 0,1.4l-1.4,1.4c-0.4,0.4-1,0.4-1.4,0l-2.5-2.5c-0.8-0.8-1.9-1.3-3.1-1.3-2.4,0-4.4,2-4.4,4.4 0,1.2 0.5,2.3 1.3,3.1l2.5,2.5c0.2,0.5 0.2,1.1-0.1,1.5zm.5-5.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l6.6,6.6c0.4,0.4 0.4,1 0,1.4l-1.4,1.4c-0.4,0.4-1,0.4-1.4,0l-6.6-6.6c-0.4-0.4-0.4-1 3.55271e-15-1.4zm9.3,16.3c-2.2,0-4.4-0.9-6-2.5l-2.5-2.5c-0.4-0.4-0.4-1 0-1.4l1.4-1.4c0.4-0.4 1-0.4 1.4,0l2.5,2.5c0.8,0.8 1.9,1.3 3.1,1.3 2.4,0 4.4-2 4.4-4.4 0-1.2-0.5-2.3-1.3-3.1l-2.5-2.5c-0.4-0.4-0.4-1 0-1.4l1.4-1.4c0.4-0.4 1-0.4 1.4,0l2.5,2.5c1.6,1.6 2.5,3.7 2.5,6 0.1,4.5-3.7,8.3-8.3,8.3z"/>
						</svg>
                    </a>
            	</div>'; 
            }
        } elseif (has_post_format('audio')) { 
            if ( has_post_thumbnail() ) {  
                echo  '<div class="blog-post-type">
					<svg version="1.1" class="post-type-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve">
						<path d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003 S232.835,0,149.996,0z M149.303,204.044h-0.002v-0.001c0,3.418-1.95,6.536-5.021,8.03c-1.24,0.602-2.578,0.903-3.909,0.903 c-1.961,0-3.903-0.648-5.506-1.901l-29.289-22.945c-1.354,0.335-2.767,0.537-4.235,0.537h-29.35 c-9.627,0-17.431-7.807-17.431-17.429v-50.837c0-9.625,7.804-17.431,17.431-17.431h29.352c1.707,0,3.348,0.257,4.912,0.711 l28.612-22.424c2.684-2.106,6.344-2.492,9.415-0.999c3.071,1.494,5.021,4.609,5.021,8.027V204.044z M178.616,167.361l-9.788-9.788 c2.256-3.084,3.608-6.87,3.608-10.979c0-4.536-1.631-8.699-4.331-11.936l9.713-9.713c5.177,5.745,8.362,13.323,8.362,21.649 M191.307,180.054c7.944-8.901,12.781-20.624,12.781-33.46 c0-13.264-5.166-25.334-13.585-34.334l9.716-9.716c10.903,11.495,17.613,26.997,17.613,44.049c0,16.625-6.37,31.792-16.793,43.188 L191.307,180.054z M224.385,212.84l-9.713-9.716c13.793-14.846,22.25-34.715,22.25-56.532c0-22.243-8.797-42.454-23.073-57.393 l9.716-9.713c16.762,17.429,27.098,41.075,27.098,67.106C250.664,172.201,240.663,195.502,224.385,212.84z"/>
					</svg>
                </div>';
            }
        }
    }

    /**
	 * Function for Get Post Author Info
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    public function slcr_get_post_author_info() { 
    	global $slcr_redux;
		$blog_author_info = $slcr_redux['blog-settings-blog-single-author-info'];
		if ($blog_author_info == true && !empty(get_the_author_meta('description'))) { ?>
			<!-- Author Info -->
			<div class="blog-author-info">
				<div class="col-md-10 col-sm-10 col-xs-12">
					<div class="row">
						<div class="author-card">
							<div class="author-avatar"> 
								<?php echo get_avatar(get_the_author_meta('user_email'), $size = ''); ?>
							</div>
							<div class="author-meta">
								<h4 class="font-600"> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" title="<?php echo esc_attr__( 'Posts by ', 'moppers' );  $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_attr( $get_result ); ?>" rel="<?php echo esc_attr__( 'author', 'moppers' ); ?>"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result); ?></a></h4>
								<p><?php  esc_html(the_author_meta('description')); ?></p>
								<?php
                                if (!empty(get_the_author_meta('user_url'))) {
                                        ?>
                                    <a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank" class="external-link"><?php echo esc_html__('Visit Website','moppers'); ?></a> 
                                    <?php
                                }?>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<?php 
		}
    }

    /**
     * Function for Get Tags and Sharing Data
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    public function slcr_get_post_tags_sharing() { 
    	global $slcr_redux;
		$social_link = $slcr_redux['blog-settings-blog-single-social-link']; 
		if(has_tag()) { ?>
			<!-- Tags and Sharing -->
			<div class="blog-post-tags">
				<?php if(has_tag()) { ?>
					<div class="blog-tags">
						<h5><?php echo esc_html__('Tags','moppers')?>:</h5>
						<ul>
							<?php the_tags( '<li>', '</li><li>', '</li>' ); ?> 
						</ul>
					</div>
				<?php } 
				if ( class_exists('Slcr_Core_Plugin')) {
					slcr_core_plugin()->slcr_core_get_post_sharing();
				}?>
			</div>
			<?php
		}
    }

    /**
     * Function for Blog Post Header
	 * @access public
	 * @since 1.0.0  
	 * @return  void
	 */
    public function slcr_get_blog_post_header() { 
    	global $slcr_redux; ?>
    	<section class="col-md-12 blog-featured">
			<div class="row">

				<?php  if($this->featured_image_type != "full_width"){  ?>
				<div class="container">
					<?php } ?>

					<div class="blog-header lazy<?php if($this->featured_image == "true"){  ?> image-true<?php } ?>" <?php if($this->featured_image == "true"){  ?> data-bg-overlay="7" data-bg="url(<?php echo esc_url($this->featured_img_url); ?>)"<?php } ?>>
					<?php if($this->featured_image == "true"){  ?>
						<!-- Hidden Image for SEO -->
						<img src="<?php echo esc_url($this->featured_img_url_small); ?>" class="hidden-feature-image" alt="<?php echo esc_attr(get_the_title());?>" />
					<?php }?>
					<?php  if($this->featured_image_type == "full_width"){  ?>
						<div class="container">
							<?php } ?>
			 				<div class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">
			 					<div class="row">
			 						<div class="post-information">
			 							<?php $this->slcr_get_post_format(); ?>
			 							<h1 class="blog-post-title"><?php echo esc_html(get_the_title());?></h1>
			 							<div class="post-meta">
			 								<ul class="post-meta-list">
			 									<li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>" class="item"><?php $id_a=get_the_author_meta('ID'); $get_result =apply_filters( 'slcr_author_meta_user_filter', $id_a); echo esc_html($get_result);?></a></li>
			 									<li><span class="item"><?php the_time(get_option('date_format'));?></span></li>
			 									<li><?php $this->slcr_get_post_category();?></li>
			 								</ul>
			 							</div>
			 						</div>
			 					</div>
			 				</div>
		 				<?php  if($this->featured_image_type == "full_width"){  ?>
						</div>
						<?php } ?>
		    		</div>
		    		<?php  if($this->featured_image_type != "full_width"){  ?>
				</div>
				<?php } ?>
		    </div>
		</section> 
    <?php
	}
}

 

/**
 * Main instance of Slcr_Single_Post.
 *
 * Returns the main instance of Slcr_Single_Post to prevent the need to use globals.
 *
 * @return Slcr_Single_Post 
 * @since 1.0.0 
 */
function slcr_single_post() {
	return Slcr_Single_Post::slcr_instance();
}
slcr_single_post(); // init it