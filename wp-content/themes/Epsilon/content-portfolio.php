
<?php
/**
 * This file is used for your portfolio entries.
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
//get post terms
$terms = get_the_terms( get_the_ID(), 'portfolio_cats' ); ?>
<article class="portfolio-entry <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>">
	<?php if( has_post_thumbnail() ) {  ?>
		<a href="<?php the_permalink(); ?>" title="" class="portfolio-entry-img-link">
        	<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'port_entry_width' ), wpex_img( 'port_entry_height' ), wpex_img( 'port_entry_crop' ) ); ?>" alt="<?php the_title(); ?>" class="portfolio-entry-img" />
            <?php
			// Show video icons on video entries
			if( get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == 'Video' ) {
				echo '<div class="video-entry-overlay"><span class="wpex-icon-play"></span></div>';
			} ?>
            <div class="portfolio-entry-overlay">
                <h2><?php the_title(); ?></h2>
            </div><!--- /portfolio-entry-overlay -->
		</a>
	<?php } ?>
</article><!-- /portfolio-entry -->