<?php
/**
 * Template Name: Portfolio by Category
 *
 *
 * This portfolio template showcases your portfolio items listed by category.
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

//start page loop
if (have_posts()) : while (have_posts()) : the_post();
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>
</header><!-- /page-heading -->
 
 
<div id="portfolio-by-category-wrap" class="clearfix">

	<?php
    //show page content if not empty
    if( !empty( $post->post_content ) ) { ?>
        <div id="portfolio-description" class="clearfix">
            <?php the_content(); ?>
        </div><!-- /portfolio-description -->
    <?php } ?>

	<?php            
	//term loop
	$terms = get_terms('portfolio_cats','orderby=custom_sort&hide_empty=1&child_of='. get_post_meta( $post->ID, 'wpex_portfolio_page_category', true ) .'');
	foreach($terms as $term) {
	?>
	
    <div class="portfolio-by-category-title">
		<h2><a href="<?php echo get_term_link($term->slug, 'portfolio_cats'); ?>" class="all-port-cat-items"><span><?php echo $term->name; ?></span></a></h2>
    </div><!-- /portfolio-by-category-title -->

	<div class="portfolio-category clearfix">
	
		<?php
		//tax query
		$term_post_args = array(
			'post_type' => 'portfolio',
			'numberposts' => '-1',
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_cats',
					'terms' => $term->slug,
					'field' => 'slug'
					)
				)
		);
		$term_posts = get_posts($term_post_args);
		
		//start loop
		foreach ($term_posts as $post) : setup_postdata($post);
			get_template_part('content','portfolio');
		endforeach; ?>
	</div>
	<!-- /portfolio-category -->

<?php } wp_reset_postdata(); ?>

</div>
<!-- /portfolio-by-category-wrap -->

<?php
endwhile;
endif;
get_footer(); // Loads the footer.php file ?>