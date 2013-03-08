<?php
/**
 * Homepage Portfolio Section
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
global $data;
 
//get homepage portfolio cat option
if ( $data['home_portfolio_cat'] !== '' && $data['home_portfolio_cat'] !== 'All' ) {
	$wpex_home_tax_query = array(
			array(
				  'taxonomy' => 'portfolio_cats',
				  'field' => 'id',
				  'terms' => $data['home_portfolio_cat']
				  )
			);
} else { $wpex_home_tax_query = NULL; }

//get post type ==> portfolio
global $post;
$args = array(
	'post_type' =>'portfolio',
	'numberposts' => $data['home_portfolio_count'],
	'tax_query' => $wpex_home_tax_query,
	'suppress_filters' => false //WPML support
);
$portfolio_posts = get_posts($args);

//show portfolio section if posts exist
if($portfolio_posts) { ?>
	
<div id="home-portfolio">
	<h2 class="title"><?php if( $data['home_portfolio_title'] !=='' ) { echo $data['home_portfolio_title']; } else { _e('Featured Work','wpex'); } ?></h2>
	<div id="portfolio-wrap">
		<div id="portfolio-filter-content" class="portfolio-isotope clearfix">
			<?php
			// If there are posts load the loop-portfolio.php file
			// which contains the layout for single portfolio posts for each post in the loop
			foreach($portfolio_posts as $post) : setup_postdata($post);
				get_template_part('content','portfolio');
			endforeach; ?>
		</div><!-- /portfolio-isotope -->
	</div><!-- /portfolio-wrap -->
</div><!-- /home-portfolio -->

<?php } ?>

<?php wp_reset_postdata(); // Reset the postdata in order to prevent any loop conflicts later on ?>