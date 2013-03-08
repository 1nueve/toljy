<?php
/**
 * Setup Custom Editor columns
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

//portfolio
add_filter("manage_edit-portfolio_columns", "edit_portfolio_columns" );
add_action("manage_posts_custom_column", "custom_portfolio_columns");

function edit_portfolio_columns($portfolio_columns){
        $portfolio_columns = array(
                "cb" => "<input type ='checkbox' />",
                "title" => "Title",
				"portfolio_category" => __('Category','wpex'),
				// "portfolio_tags" => __('Tags','wpex'),
                "portfolio_image" => __('Featured Image','wpex'),
				"date" => "Date",
        );
        return $portfolio_columns;
}

function custom_portfolio_columns($portfolio_column){
        global $post;
        switch ($portfolio_column)
        {
				case "portfolio_category":
					echo get_the_term_list( get_the_ID(), 'portfolio_cats', ' ', ' , ', ' ');
				break;
				
				/*
				case "portfolio_tags":
					echo get_the_term_list( get_the_ID(), 'portfolio_tags', ' ', ' , ', ' ');
				break;
				*/
				
                case "portfolio_image":
						if(has_post_thumbnail()) {
						 //get atachment url
						 $img_url = wp_get_attachment_url(get_post_thumbnail_id(),'full'); //get full URL to image
						 //resize & crop the featured image
						 $featured_image = $featured_image = aq_resize( $img_url, 80, 80, true );
						echo '<img src="'. $featured_image .'" />';
						} else { echo '-'; }
				break;
        }

}
?>