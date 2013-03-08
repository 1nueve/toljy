<?php
/**
 * Register custom post types
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
add_action( 'init', 'wpex_create_post_types' );
function wpex_create_post_types() {
	
	//register portfolio post type
	register_post_type( 'portfolio', //careful editing the post type name you could lose your valuable content!
		array(
		  'labels' => array(
			'name' => __( 'Portfolio', 'wpex' ),
			'singular_name' => __( 'Portfolio', 'wpex' ),		
			'add_new' => _x( 'Add New', 'Portfolio Post', 'wpex' ),
			'add_new_item' => __( 'Add New Portfolio Post', 'wpex' ),
			'edit_item' => __( 'Edit Portfolio Post', 'wpex' ),
			'new_item' => __( 'New Portfolio Post', 'wpex' ),
			'view_item' => __( 'View Portfolio Post', 'wpex' ),
			'search_items' => __( 'Search Portfolio Posts', 'wpex' ),
			'not_found' =>  __( 'No Portfolio Posts found', 'wpex' ),
			'not_found_in_trash' => __( 'No Portfolio Posts found in Trash', 'wpex' ),
			'parent_item_colon' => ''
			
		  ),
		  'public' => true,
		  'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields' ),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'portfolio' ),
		   'menu_icon' => get_template_directory_uri() . '/images/admin/portfolio.png',
		)
	);
	
}
?>