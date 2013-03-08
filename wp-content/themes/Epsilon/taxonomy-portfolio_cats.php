<?php
/**
 * This file is used for your Portfolio category pages
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template
if (have_posts()) :
?>

<header id="page-heading">
	<h1><?php $term = $wp_query->queried_object; echo $term->name; ?></h1>
</header><!-- /page-heading -->

<?php if( category_description() ) { ?>
<div id="portfolio-description">
	 <?php echo category_description( ); ?>
</div><!-- /portfolio-description -->
<?php } ?>
    
<div id="portfolio-template" class="ajax-wrap">
	
	<div id="portfolio-wrap">
		<div id="portfolio-filter-content" class="clearfix">
			<?php
            // If there are posts load the loop-portfolio.php file
            // which contains the layout for single portfolio posts for each post in the loop
            while (have_posts()) : the_post();
                get_template_part('content','portfolio');
            endwhile; ?>
		</div><!-- /portfolio-filter-content -->
        <?php
        wpex_pagination(); // Paginate your portfolio items ?>
    </div><!-- /portfolio-wrap -->
</div><!-- /portfolio-template -->

<?php
endif;
get_footer(); // Loads the footer.php file ?>