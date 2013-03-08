<?php
/*--------------------------------------*/
/*	Theme Options Front End
/*--------------------------------------*/
add_action('init','of_options');
if (!function_exists('of_options')) {
	function of_options() {
	
	
	// Portfolio Categories
	$portfolio_cats_args = array( 'hide_empty' => '1' );
	$portfolio_cats_terms = get_terms('portfolio_cats', $portfolio_cats_args);
	$portfolio_cats_tax = array( __("All", 'wpex') => __("All", 'wpex') );
	if($portfolio_cats_terms){
		foreach ( $portfolio_cats_terms as $portfolio_cats_term) {
			$portfolio_cats_tax[$portfolio_cats_term->term_id] = $portfolio_cats_term->name;
		}   
	}
	
	// Background Images Reader
	$bg_images_path = get_stylesheet_directory() .'/images/bg/'; // change this to where you store your bg images
	$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
	$bg_images = array();
	
	if ( is_dir($bg_images_path) ) {
		if ($bg_images_dir = opendir($bg_images_path) ) { 
			while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
				if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
					$bg_images[] = $bg_images_url . $bg_images_file;
				}
			}    
		}
	}
	
	// Blog Styles options
	$blog_styles = array(
		'Masonry' => 'Masonry',
		'Simple' => 'Simple'
	);
	
	
	/*-----------------------------------------------------------------------------------*/
	/* The Options Array */
	/*-----------------------------------------------------------------------------------*/
	
	// Set the Options Array
	global $of_options;
	$of_options = array();
	
	
	
	// General
	$of_options[] = array( "name" => __('General', 'wpex'),
					"type" => "heading");
					
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Branding','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Main Logo Upload', 'wpex'),
						"desc" => __('Upload your custom logo using the native media uploader, or define the URL directly', 'wpex'),
						"id" => "custom_logo",
						"std" => "",
						"type" => "media");
						
	$of_options[] = array( "name" => __('Custom Login Logo', 'wpex'),
						"desc" => __('Upload a custom logo for your Wordpress login screen.', 'wpex'),
						"id" => "custom_login_logo",
						"std" => "",
						"type" => "media");
						
	$of_options[] = array( "name" => __('Custom Login Logo Height', 'wpex'),
						"desc" => __('Enter the height of your custom logo to override the default WordPress image height (example: 200px). Width, must not be changed.', 'wpex'),
						"id" => "custom_login_logo_height",
						"std" => "",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Custom Favicon', 'wpex'),
						"desc" => __('Upload or past the URL for your custom favicon.', 'wpex'),
						"id" => "custom_favicon",
						"std" => "",
						"type" => "media");
						
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Header','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Phone Number', 'wpex'),
						"desc" => __('Enter your phone number for use in the header area.', 'wpex'),
						"id" => "header_phone_number",
						"std" => "1-800-444-444",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Email', 'wpex'),
						"desc" => __('Enter your email for use in the header.', 'wpex'),
						"id" => "header_email",
						"std" => "admin@domain.com",
						"type" => "text");
						
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Contact Page','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Contact Page Google Map Address', 'wpex'),
						"desc" => __('Enter an address for your contact page Google Map.', 'wpex'),
						"id" => "contact_googlemap",
						"std" => "13/2 Elizabeth Street Melbourne VIC 3000, Australia",
						"type" => "textarea");
						
	$of_options[] = array( "name" => __('Contact Page Google Map Title', 'wpex'),
						"desc" => __('Enter a title for your contact page Google Map.', 'wpex'),
						"id" => "contact_googlemap_title",
						"std" => "Envato Inc.",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Contact Page Google Map Height', 'wpex'),
						"desc" => __('Enter a height in for your Google Map.', 'wpex'),
						"id" => "contact_googlemap_height",
						"std" => "300",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Contact Page Google Map Zoom', 'wpex'),
						"desc" => __('Enter a zoom value for your Google Map. Default is 10', 'wpex'),
						"id" => "contact_googlemap_zoom",
						"std" => "10",
						"type" => "text");
	
	
	// Styling					
	$of_options[] = array( "name" => __('Styling', 'wpex'),
						"type" => "heading");
						
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('General','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Disable The Responsive Layout', 'wpex'),
						"desc" => __('Check this box to disable the responsive function.', 'wpex'),
						"id" => "disable_responsive",
						"std" => "",
						"type" => "checkbox");
						
	$of_options[] = array( "name" => "Background Images",
					"desc" => "Select a background pattern. You can add your own by dropping the images into your images/bg folder in the theme. Also, if you want to upload a custom background you can do so using WordPress\'s built-in function at Apperance->Background.",
					"id" => "custom_bg",
					"std" => $bg_images_url."02.png",
					"type" => "tiles",
					"options" => $bg_images,
);

	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Custom CSS','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Custom CSS', 'wpex'),
						"desc" => __('Quickly add some CSS to your theme by adding it to this block.', 'wpex'),
						"id" => "custom_css",
						"std" => "",
						"type" => "textarea");
	
	
	// Home
	$of_options[] = array( "name" => __('Home', 'wpex'),
						"type" => "heading");
	
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Slider','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Disable The Homepage Slider', 'wpex'),
						"desc" => __('Check this box to disable the homepage slider.', 'wpex'),
						"id" => "disable_home_slider",
						"std" => "",
						"type" => "checkbox");
											
	$of_options[] = array( "name" => "Slider 1: Image",
					"desc" => "Unlimited slider with drag and drop sortings.",
					"id" => "home_slider",
					"std" => "",
					"type" => "slider");
					
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Portfolio','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
					
	$of_options[] = array( "name" => __('Disable The Homepage Portfolio Section', 'wpex'),
						"desc" => __('Check this box to disable the homepage portfolio section.', 'wpex'),
						"id" => "disable_home_portfolio",
						"std" => "",
						"type" => "checkbox");
						
	$of_options[] = array( "name" => __('Custom Homepage Portfolio Section Title', 'wpex'),
						"desc" => __('Enter your title', 'wpex'),
						"id" => "home_portfolio_title",
						"std" => "",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Portfolio Section Category', 'wpex'),
						"desc" => __('If you do not want to show all the recent portfolio items, select a specific category below (select a parent category so the filter works, child categories will create the filter items).', 'wpex'),
						"id" => "home_portfolio_cat",
						"std" => "",
						"type" => "select",
						"options" => $portfolio_cats_tax);
					
	$of_options[] = array( "name" => __('Portfolio Items Count', 'wpex'),
						"desc" => __('How many portfolio items do you wish to show on the homepage?', 'wpex'),
						"id" => "home_portfolio_count",
						"std" => "12",
						"type" => "text");
						
	$of_options[] = array(
						"name" => "",
						"desc" => "",
						"id" => "",
						"std" => "<h3 style=\"margin: 0;\">".__('Testimonials','wpex')."</h3>",
						"icon" => false,
						"type" => "info");
						
	$of_options[] = array( "name" => __('Disable The Homepage Testimonials', 'wpex'),
						"desc" => __('Check this box to disable the homepage testimonials.', 'wpex'),
						"id" => "disable_home_testimonials",
						"std" => "",
						"type" => "checkbox");
						
	$of_options[] = array( "name" => __('Custom Homepage Testimonials Section Title', 'wpex'),
						"desc" => __('Enter your title', 'wpex'),
						"id" => "home_testimonials_title",
						"std" => "",
						"type" => "text");
						
	$of_options[] = array( "name" => "Testimonials",
					"desc" => "Easily add your testimonials.",
					"id" => "home_testimonials",
					"std" => "",
					"type" => "slider_testimonials");
	
	
	// Portfolio					
	$of_options[] = array( "name" => __('Portfolio', 'wpex'),
						"type" => "heading");
						
	$of_options[] = array( "name" => __('Portfolio Items Per Page', 'wpex'),
						"desc" => __('How many portfolio items do you wish to show on your portfolio templates and archives?<br /><br /><strong>Important:</strong> If the slug of your portfolio page is set to "portfolio" it can create conflicts with WordPress and cause 404 errors on paginated pages.', 'wpex'),
						"id" => "portfolio_pagination",
						"std" => "-1",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Portfolio Entry Image Height', 'wpex'),
						"desc" => __('Enter a custom height for your portfolio entry images.<br /><br />You can use 9999 to prevent any height cropping and create a masonry style portfolio grid. Images will keep their original proportions.', 'wpex'),
						"id" => "port_entry_img_height",
						"std" => "240",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Portfolio Post Image Height', 'wpex'),
						"desc" => __('Enter a custom height for your portfolio post images.<br /><br />You can use 9999 to prevent any height cropping.', 'wpex'),
						"id" => "port_post_img_height",
						"std" => "9999",
						"type" => "text");
						
	$of_options[] = array( "name" => __('Disable Portfolio Related Items', 'wpex'),
						"desc" => __('Check this box to disable the section that displays other portfolio items on single portfolio posts.', 'wpex'),
						"id" => "portfolio_more",
						"std" => "",
						"type" => "checkbox");			
	
	
	// Blog					
	$of_options[] = array( "name" => __('Blog', 'wpex'),
						"type" => "heading");
						
	$of_options[] = array( "name" => __('Blog Style', 'wpex'),
						"desc" => __('Select Your Blog Style.', 'wpex'),
						"id" => "blog_style",
						"std" => "Masonry",
						"type" => "select",
						"options" => $blog_styles);
						
	$of_options[] = array( "name" => __('Enable Author Bio Box On Blog Posts', 'wpex'),
						"desc" => __('Check this box to enable the author bio section on single blog posts.', 'wpex'),
						"id" => "single_author_bio",
						"std" => "1",
						"type" => "checkbox");
	
	
	// Social					
	if(function_exists('wpex_get_social')) {
		
		$of_options[] = array( "name" => __('Social', 'wpex'),
						"type" => "heading");
	
		$social_links = wpex_get_social();
		foreach($social_links as $social_link) {
			$of_options[] = array( "name" => ucfirst($social_link),
								"desc" => ' '. __('Enter your ','wpex') . $social_link . __(' url','wpex') .' <br />'. __('Include http:// at the front of the url.', 'wpex'),
								"id" => $social_link,
								"std" => "",
								"type" => "text");
		}
	}
	
	
	// Tracking					
	$of_options[] = array( "name" => __('Tracking', 'wpex'),
						"type" => "heading");
						
	$of_options[] = array( "name" => __('Tracking Code (Header)', 'wpex'),
						"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the header template of your theme.', 'wpex'),
						"id" => "tracking_head",
						"std" => "",
						"type" => "textarea");    
						
	$of_options[] = array( "name" => __('Tracking Code (Footer)', 'wpex'),
						"desc" => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.', 'wpex'),
						"id" => "tracking_foot",
						"std" => "",
						"type" => "textarea");
						
	// Backup Options
	$of_options[] = array( "name" => __('Backup', 'wpex'),
						"type" => "heading");
						
	$of_options[] = array( "name" => __('Backup and Restore Options', 'wpex'),
						"id" => "of_backup",
						"std" => "",
						"type" => "backup",
						"desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time.<br /><br />This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'wpex'),
						);
						
	$of_options[] = array( "name" => __('Transfer Theme Options Data', 'wpex'),
						"id" => "of_transfer",
						"std" => "",
						"type" => "transfer",
						"desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options.', 'wpex')
						);
											
		}
}
?>