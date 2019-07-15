<?php 
/** 
 * The SlashCreative Blog Single Page Layout Template
 *
 * @author     SlashCreative
 * @copyright  (c) Copyright by SlashCreative
 * @link       http://slashcreative.co
 * @package    Moppers
 * @subpackage Core
 * @since      1.0.0
 * 
 */
// Do not allow directly accessing this file.  
	if ( ! defined( 'ABSPATH' ) ) {
	    die( '-1' );
	}

include_once( SLCR_FRAMEWORK_DIR . 'front/slcr-single-post.php' ); 

if (have_posts()):
    while (have_posts()):
        the_post();   ?>
   		<!-- Blog Post Header -->
   		<?php echo slcr_single_post()->slcr_get_blog_post_header(); 
   		$slcr_if_blog_single_sidebar ="";
   		if(slcr_single_post()->blog_single_sidebar == 'false' ||  slcr_single_post()->blog_single_sidebar=='0' || empty(slcr_single_post()->blog_single_sidebar) ){  
   			$slcr_if_blog_single_sidebar = 'col-md-offset-2 allow-gutenberg '; }
   		else{
   			if(!is_active_sidebar('sidebar-blog-page-main')) { 

   				$slcr_if_blog_single_sidebar = 'col-md-offset-2 allow-gutenberg ';
   			}
   		}

   		?>
		<!-- Blog Content -->
		<section class="col-md-12 blog-content">
			<div class="row">
				<div class="container">
					<div class="row">
						<!-- Blog Post Content -->
						<section class="col-md-8 col-sm-12 <?php echo esc_attr( $slcr_if_blog_single_sidebar ); ?>col-xs-12">
							<div class="blog-post-content">
								<?php the_content();  
								slcr_helper()->slcr_post_pagination_bar();?>
							</div> 
							<!-- Tags and Sharing -->
							<?php slcr_single_post()->slcr_get_post_tags_sharing(); ?>
							<!-- Author Info -->
							<?php slcr_single_post()->slcr_get_post_author_info(); ?>
							<!-- Blog Pagination -->											
							<?php slcr_single_post()->slcr_blog_Pagination(); ?>
							<!-- Related Posts -->
							<?php slcr_single_post()->slcr_related_post();  
							    comments_template();
							?>
						</section> 
						<?php  
		                if(slcr_single_post()->blog_single_sidebar == "true" ||  slcr_single_post()->blog_single_sidebar=="1"){   
                            if (is_active_sidebar('sidebar-blog-page-main')){ ?>
                                <!-- Blog Sidebar -->
								<section class="col-md-4 col-sm-12 col-xs-12">
		                        	<aside class="woocommerce slcr-sidebar blog__sidebar">
		                               <?php dynamic_sidebar('sidebar-blog-page-main'); ?>
		                            </aside>
		                    	</section>
		                        <?php
		                    }  
		                }
		                ?>
					</div>
				</div>
			</div>
		</section>
        <?php
	endwhile;
else:
	slcr_front()->slcr_404_error('Post');
endif;?>

