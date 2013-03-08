<?php
/**
 * This file is used for your video post entry
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */  
?>

<article <?php post_class('blog-entry fitvids clearfix'); ?>>  
	<div class="blog-entry-video">
		<?php
		// Show video based on meta option
		echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ); ?>
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