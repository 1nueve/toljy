<?php
/**
 * Output theme settings custom CSS into your header
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


add_action('wp_head', 'wpex_custom_css');
function wpex_custom_css() {
	
	global $data;
	$custom_css ='';
	
	/**background**/
	if( !empty( $data['custom_bg'] ) && $data['custom_bg'] !== get_template_directory_uri(). '/images/bg/0.png' ) {
		$custom_css .= 'body{ background-image: url('. $data['custom_bg'] .'); }';
	}
	
	/**custom css field**/
	if( !empty(  $data['custom_css'] ) ) {
		$custom_css .= $data['custom_css'];
	}
	
	/**echo all css**/
	$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css . "\n</style>";
	if( !empty($custom_css) ) { echo $css_output;}
	
} //end wpex_custom_css()
?>