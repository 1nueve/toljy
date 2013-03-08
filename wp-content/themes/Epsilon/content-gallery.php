<?php
/**
 * This file is used for your gallery post entry
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */  
?>

<article <?php post_class('blog-entry fitvids clearfix'); ?>>  
	<script type="text/javascript">
        jQuery(document).ready(function($){
            $('#slider-<?php get_the_ID(); ?>').imagesLoaded( function() {
                $("#slider-<?php get_the_ID(); ?>").flexslider({
					animation: 'slide',
                    slideshow: true,
                    controlNav: false,
                   	prevText: '<span class="wpex-icon-chevron-left"></span>',
					nextText: '<span class="wpex-icon-chevron-right"></span>',
                    smoothHeight: true,
                    start: function(slider) {
                        slider.container.click(function(e) {
                            if( !slider.animating ) {
                                slider.flexAnimate( slider.getTarget('next') );
                            }
                        
                        });
                    }
                });
            });
        });
    </script>
	<div class="blog-entry-slider">
		<div class="flexslider-container">
            <div id="slider-<?php get_the_ID(); ?>" class="flexslider">
                <ul class="slides">
                    <?php
					// Get Attachments
					$wpex_single_gallery_attachments = get_posts(
					array(
						'orderby' => 'menu_order',
						'post_type' => 'attachment',
						'post_parent' => get_the_ID(),
						'post_mime_type' => 'image',
						'post_status' => null,
						'posts_per_page' => -1
					)
				); 
                    // Loop through attachments
                    foreach ( $wpex_single_gallery_attachments as $wpex_single_gallery_attachment ) :
					
                    // Include image in slider/gallery
                    if( get_post_meta($wpex_single_gallery_attachment->ID, 'be_rotator_include', true) !== '1' ) {
                    ?>
                    <li class="slide"><img src="<?php echo aq_resize( wp_get_attachment_url( $wpex_single_gallery_attachment->ID, 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></li>
                    <?php } endforeach; ?>
                </ul><!-- /slides -->
            </div><!-- /flexslider -->
		</div><!-- /flexslider-container -->
	</div><!-- /blog-entry-thumbnail -->
    <div class="entry-text clearfix">
		<header>
            <span class="date"><?php the_time('m.d.Y'); ?></span>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<?php
        // If not empty who the post excerpt
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
                // If post excerpt empty trim the content to 20 words
               echo wp_trim_words(get_the_content(), 20); } ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="entry-read-more"><?php _e('Read More','wpex'); ?> &rarr;</a>
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->