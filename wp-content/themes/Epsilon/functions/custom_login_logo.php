<?php
/**
 * Function used to create a custom logo for your WP login screen
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
if ( ! function_exists( 'wpex_custom_login_logo' ) ) :
	function wpex_custom_login_logo() {
		global $data;
		if($data['custom_login_logo'] !='') {
			$custom_login_logo_css = '';
			$custom_login_logo_css .= '<style type="text/css">';
			$custom_login_logo_css .= '.login h1 a {';
			$custom_login_logo_css .= 'background-image:url('. $data['custom_login_logo'] .') !important;width: auto !important;background-size: auto !important;';
			if($data['custom_login_logo_height']) {
				$custom_login_logo_css .= 'height: '.$data['custom_login_logo_height'].' !important;';
			}
			$custom_login_logo_css .= '}</style>';
	
			echo $custom_login_logo_css;
		}
	}
	add_action('login_head', 'wpex_custom_login_logo');
endif;
?>