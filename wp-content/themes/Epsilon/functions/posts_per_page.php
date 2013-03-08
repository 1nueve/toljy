<?php
/**
 * Function used to control pagination on taxonomy pages
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

//get posts per page
$wpex_option_posts_per_page = get_option( 'posts_per_page' );

//add posts per page filter
add_action( 'init', 'wpex_modify_posts_per_page', 0);
function wpex_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'wpex_option_posts_per_page' );
}

//modify posts per page
function wpex_option_posts_per_page( $value ) {
	
	global $data;
	global $wpex_option_posts_per_page;
	
	//tax pagination
    if(is_tax('portfolio_cats')) {
		if ( $data['portfolio_pagination'] !=='' ) {
			return $data['portfolio_pagination'];
		} else { return '12'; }
	}
	else { return $wpex_option_posts_per_page; }
}

?>