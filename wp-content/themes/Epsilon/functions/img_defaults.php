<?php
/**
 * Creates a function for your featured image sizes which can be altered via your child theme
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
if ( ! function_exists( 'wpex_img_heights' ) ) :
	function wpex_img($args){
		
		//get theme options
		global $data;
		$port_entry_img_height = ( $data['port_entry_img_height'] ) ? $data['port_entry_img_height'] : 240;
		$port_post_img_height = ( $data['port_post_img_height'] ) ? $data['port_post_img_height'] : 455;
		
		$port_entry_img_crop = ( $data['port_entry_img_height'] == '9999' ) ? false : true;
		$port_post_img_crop = ( $data['port_post_img_height'] == '9999' ) ? false : true;
		
		//blog entry
		if( $data['blog_style'] == 'Simple' ) {
			if( $args == 'blog_entry_width' ) return '670';
			if( $args == 'blog_entry_height' ) return '9999';
			if( $args == 'blog_entry_crop' ) return false;
		} else {
			if( $args == 'blog_entry_width' ) return '370';
			if( $args == 'blog_entry_height' ) return '9999';
			if( $args == 'blog_entry_crop' ) return false;
		}
		
		//blog post
		if( $args == 'blog_width' ) return '670';
		if( $args == 'blog_height' ) return '9999';
		if( $args == 'blog_crop' ) return false;
		
		//portfolio entries
		if( $args == 'port_entry_width' ) return '290';
		if( $args == 'port_entry_height' ) return $port_entry_img_height;
		if( $args == 'port_entry_crop' ) return $port_entry_img_crop;
		
		//portfolio posts
		if( $args == 'port_post_width' ) return '960';
		if( $args == 'port_post_height' ) return $port_post_img_height;
		if( $args == 'port_post_crop' ) return $port_post_img_crop;
		
	}
endif;
?>