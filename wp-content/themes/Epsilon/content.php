<?php
/**
 * This file is used for your standard post entry
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
    // Get resize and show featured image : refer to functions/img_defaults.php for default values
    $wpex_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) );
    	if($wpex_entry_img) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $wpex_entry_img; ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
            <span class="date"><?php the_time('m.d.Y'); ?></span>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
		<?php
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
               echo wp_trim_words(get_the_content(), 20); } ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="entry-read-more"><?php _e('Read More','wpex'); ?> &rarr;</a>
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->