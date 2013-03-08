<?php
/**
 * Template Name: Contact
 *
 *
 * This template file contains the the default homepage structure for this theme
 * @package PhotoPro WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template 
if (have_posts()) : while (have_posts()) : the_post();
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>
</header>

<?php
// Show featured image
if( has_post_thumbnail( get_the_ID() ) ) {
	$wpex_header_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
	echo '<div id="page-featured-img"><img src="'. $wpex_header_img[0] .'" alt="'. get_the_title() .'" /></div>';
} ?>

<?php
// Show Google map if settings defined in the theme options
if ( $data['contact_googlemap'] ) {
	echo '<div id="contact-map"><div class="outerbox"><div class="innerbox">'. do_shortcode('[googlemap title="'.$data['contact_googlemap_title'].'" location="'.$data['contact_googlemap'].'" zoom="'.$data['contact_googlemap_zoom'].'" height='.$data['contact_googlemap_height'].']') .'</div></div></div>';
}
?>

<div id="single-page-content" class="contact-template sidebar-bg container clearfix">
    
    <div id="post">
            
        <article class="entry clearfix">
            <?php the_content(); // This is your main post content output ?>
        </article><!-- /entry -->
        
        <?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>

    </div><!-- /post -->
    
    <?php get_sidebar(); ?>

</div><!-- /centered -->
 
<?php
endwhile; endif;
get_footer(); // Loads the footer.php file ?>