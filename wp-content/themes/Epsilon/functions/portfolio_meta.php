<?php
/**
 * Create meta options for the portfolio post type
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
$prefix = 'wpex_';

$wpex_meta_box_portfolio_settings = array(
	'id' => 'wpex-portfolio-meta-box-slider',
	'title' =>  __('Portfolio Settings', 'wpexuagraphite'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
            'name' => __('Style', 'wpex'),
            'id' => $prefix . 'portfolio_post_style',
			'desc' => __('Select the entry style for this post.', 'wpex'),
			'default' => 'default',
            'type' => 'select',
            'options' => array( 'Featured Image', 'Image Slider', 'Video', 'Stacked Images', 'Plain' ),
			'std' => ''
        ),
		array(
            'name' => __('Video URL','wpex'),
            'desc' =>  __('Enter in a video URL that is compatible with WordPress\'s built-in oEmbed feature.', 'wpex') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpex') .'&rarr;',
            'id' => $prefix . 'portfolio_post_video',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Post Sub-Title','wpex'),
            'desc' =>  __('Enter your desired portfolio post sub-title.', 'wpex'),
            'id' => $prefix . 'portfolio_post_subtitle',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Client','wpex'),
            'desc' =>  __('Enter your client name.', 'wpex'),
            'id' => $prefix . 'portfolio_client',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('Date','wpex'),
            'desc' =>  __('Enter your date.', 'wpex'),
            'id' => $prefix . 'portfolio_date',
            'type' => 'text',
            'std' => ''
        ),
		array(
            'name' => __('URL','wpex'),
            'desc' =>  __('Enter your url. Don\'t forget the http:// at the front.'),
            'id' => $prefix . 'portfolio_url',
            'type' => 'text',
            'std' => ''
        ),
	),
);

/*-----------------------------------------------------------------------------------*/
// Display meta box in edit portfolio page
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'wpex_add_box_portfolio_settings');

function wpex_add_box_portfolio_settings() {
	global $wpex_meta_box_portfolio_settings;
	
	add_meta_box($wpex_meta_box_portfolio_settings['id'], $wpex_meta_box_portfolio_settings['title'], 'wpex_show_box_portfolio_settings', $wpex_meta_box_portfolio_settings['page'], $wpex_meta_box_portfolio_settings['context'], $wpex_meta_box_portfolio_settings['priority']);

}

/*-----------------------------------------------------------------------------------*/
//	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function wpex_show_box_portfolio_settings() {
	global $wpex_meta_box_portfolio_settings, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="wpex_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
 
	foreach ($wpex_meta_box_portfolio_settings['fields'] as $field) {
		
		// get current post meta data & set default value if empty
		$meta = get_post_meta($post->ID, $field['id'], true);
		
		if (empty ($meta)) {
			$meta = $field['std']; 
		}
		
		switch ($field['type']) {
 
			
			//If Select	
			case 'select':
			
				echo '<tr>',
				'<th style="width:50%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			
				echo'<select name="'.$field['id'].'">';
			
				foreach ($field['options'] as $option) {
					
					echo'<option';
					if ($meta == $option ) { 
						echo ' selected="selected"'; 
					}
					echo'>'. $option .'</option>';
				
				} 
				
				echo'</select>';
			
			break;
			
			//If Text		
			case 'text':
			
			echo '<tr style="border-top:1px solid #eeeeee;">',
				'<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
				'<td>';
			echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
			
			break;
			

		}

	}
 
	echo '</table>';
}
 
add_action('save_post', 'wpex_save_data_portfolio');

/*-----------------------------------------------------------------------------------*/
//	Save data when portfolio is edited
/*-----------------------------------------------------------------------------------*/
 
function wpex_save_data_portfolio($post_id) {
	global $wpex_meta_box_portfolio_settings;
	
	if(!isset($_POST['wpex_meta_box_nonce'])) $_POST['wpex_meta_box_nonce'] = "undefine";
 
	// verify nonce
	if (!wp_verify_nonce($_POST['wpex_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
	//Save fields
	foreach ($wpex_meta_box_portfolio_settings['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
 
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	}

}
?>