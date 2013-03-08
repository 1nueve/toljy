<?php
/**
 * Setup custom taxonomies
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
add_action( 'init', 'wpex_create_taxonomies' );
function wpex_create_taxonomies() {
	
	//portfolio tax taxonomy labels
	$wpex_portfolio_labels = array(
		'name' => __( 'Portfolio Categories', 'wpex' ),
		'singular_name' => __( 'Portfolio Category', 'wpex' ),
		'search_items' =>  __( 'Search Portfolio Categories', 'wpex' ),
		'all_items' => __( 'All Portfolio Categories', 'wpex' ),
		'parent_item' => __( 'Parent Portfolio Category', 'wpex' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'wpex' ),
		'edit_item' => __( 'Edit Portfolio Category', 'wpex' ),
		'update_item' => __( 'Update Portfolio Category', 'wpex' ),
		'add_new_item' => __( 'Add New Portfolio Category', 'wpex' ),
		'new_item_name' => __( 'New Portfolio Category Name', 'wpex' ),
		'choose_from_most_used'	=> __( 'Choose from the most used portfolio categories', 'wpex' )
	);
	
	
	//register portfolio cat tax
	register_taxonomy('portfolio_cats','portfolio',array(
		'hierarchical' => true,
		'labels' => apply_filters('wpex_portfolio_tax_labels', $wpex_portfolio_labels),
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
	
	
	/*** This Theme Doesn't Need Portfolio Tags.
	
	$wpex_portfolio_tag_labels = array(
		'name' => __( 'Portfolio Tags', 'wpex' ),
		'singular_name' => __( 'Portfolio Tags', 'wpex' ),
		'search_items' =>  __( 'Search Portfolio Tags', 'wpex' ),
		'all_items' => __( 'All Portfolio Tags', 'wpex' ),
		'edit_item' => __( 'Edit Portfolio Tag', 'wpex' ),
		'update_item' => __( 'Update Portfolio Tag', 'wpex' ),
		'add_new_item' => __( 'Add New Portfolio Tag', 'wpex' ),
		'new_item_name' => __( 'New Portfolio Tag Name', 'wpex' ),
		'choose_from_most_used'	=> __( 'Choose from the most used portfolio tags', 'wpex' )
	);
	register_taxonomy('portfolio_tags','portfolio',array(
		'hierarchical' => false,
		'labels' => apply_filters('wpex_portfolio_tags', $wpex_portfolio_tag_labels),
		'query_var' => true,
		'rewrite' => array( 'slug' => 'portfolio-category' ),
	));
	*/
	
}
?>