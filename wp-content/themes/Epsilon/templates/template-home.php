<?php
/**
 * Template Name: Homepage
 *
 *
 * This template file contains the the default homepage structure for this theme
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template ?>

<div id="home-wrap" class="clearfix">

<?php if( get_bloginfo('description') ) { ?>
    <div id="home-tagline">
        <?php echo get_bloginfo('description'); ?> 
		<ul id="home-social" class="clearfix">
			<?php
			$wpex_social_links = wpex_get_social();
			//social loop
			foreach($wpex_social_links as $wpex_social_link) {
				if(!empty($data[$wpex_social_link])) {
					echo '<li><a href="'. $data[$wpex_social_link] .'" title="'. $wpex_social_link .'" target="_blank"><img src="'. get_template_directory_uri() .'/images/social/'.$wpex_social_link.'.png" alt="'. $wpex_social_link .'" /></a></li>';
			} }
			?>
		</ul><!-- /home-social -->
    </div><!--home-tagline -->
<?php } ?>

<?php
// Get homepage sections
if( $data['disable_home_slider'] !=='1') get_template_part( 'includes/home','slider'); // Show homepage slider
if( $data['disable_home_portfolio'] !=='1') get_template_part( 'includes/home','portfolio'); // Show homepage testimonials
if( $data['disable_home_testimonials'] !=='1') get_template_part( 'includes/home','testimonials'); // Show homepage testimonials ?>
    
</div><!-- /home-wrap -->

<?php
get_footer(); // Loads the footer.php file ?>