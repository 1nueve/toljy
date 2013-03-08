<?php
/**
 * This file contains some useful shortcodes for this theme.
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/*-----------------------------------------------------------------------------------*/
/* Google Maps Shortcode
/*-----------------------------------------------------------------------------------*/
if (! function_exists( 'wpex_shortcode_googlemaps' ) ) :
	function wpex_shortcode_googlemaps($atts, $content = null) {
		
		extract(shortcode_atts(array(
				"title" => '',
				"location" => '',
				"width" => '', //leave width blank for responsive designs
				"height" => '300',
				"zoom" => 8,
				"align" => '',
		), $atts));
		
		wp_enqueue_script('googlemap');
		wp_enqueue_script('googlemap_api');
		
		
		$output = '<div id="map_canvas_'.rand(1, 100).'" class="googlemap" style="height:'.$height.'px;width:100%">';
			$output .= (!empty($title)) ? '<input class="title" type="hidden" value="'.$title.'" />' : '';
			$output .= '<input class="location" type="hidden" value="'.$location.'" />';
			$output .= '<input class="zoom" type="hidden" value="'.$zoom.'" />';
			$output .= '<div class="map_canvas"></div>';
		$output .= '</div>';
		
		return $output;
	   
	}
	add_shortcode("googlemap", "wpex_shortcode_googlemaps");
endif;
?>