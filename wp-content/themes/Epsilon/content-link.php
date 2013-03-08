<?php
/**
 * This file is used for your link post entry
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>  

<article <?php post_class('blog-entry clearfix'); ?>>  
	<?php
    // Show Featured Image
	if( has_post_thumbnail() ) {  ?>
	<div class="blog-entry-thumbnail">
		<a href="<?php echo get_post_meta(get_the_ID(), 'wpex_post_url', true); ?>" title="<?php the_title(); ?>" target="_blank"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
            <span class="date"><?php the_time('m.d.Y'); ?></span>
            <h2><a href="<?php echo get_post_meta(get_the_ID(), 'wpex_post_url', true); ?>" title="<?php the_title(); ?>" target="_blank"><?php the_title(); ?></a></h2>
        </header>
		<?php
        // If not empty who the post excerpt
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
                // If post excerpt empty trim the content to 20 words
               echo wp_trim_words(get_the_content(), 20); } ?>
        <a href="<?php echo get_post_meta(get_the_ID(), 'wpex_post_url', true); ?>" title="<?php the_title(); ?>" class="entry-read-more" target="_blank"><?php _e('Visit Site','wpex'); ?> &rarr;</a>
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->