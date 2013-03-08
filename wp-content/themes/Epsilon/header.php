<?php
/**
 * Header.php is generally used on all the pages of your site and is called somewhere near the top
 * of your template files. It's a very important file that should never be deleted.
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
global $data; // Get theme options to use throught the theme templates
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<?php wpex_hook_head_top(); ?>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <?php if( $data['disable_responsive'] !== '1') { ?>
    <!-- Mobile Specific
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <?php } ?>
    
    <!-- Title Tag
    ================================================== -->
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
    
    <?php if( $data['custom_favicon'] ) { ?>
    <!-- Favicon
    ================================================== -->
    <link rel="icon" type="image/png" href="<?php echo $data['custom_favicon']; ?>" />
    <?php } ?>
    
    <!-- IE dependent stylesheets
    ================================================== -->
    <!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" />
    <![endif]-->
    
    <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/awesome_font_ie7.css" media="screen" />
    <![endif]-->
    
    <!-- Load HTML5 dependancies for IE
    ================================================== -->
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lte IE 7]>
        <script src="js/IE8.js" type="text/javascript"></script><![endif]-->
    <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" media="all" href="css/ie6.css"/>
    <![endif]-->
    
    
    <!-- WP Head
    ================================================== -->
    <?php wp_head(); // Very important WordPress core hook. If you delete this bad things WILL happen. ?>
    <?php if( !empty($data['tracking_head'] ) ) echo $data['tracking_head']; ?>
    <?php wpex_hook_head_bottom(); ?>
    
</head><!-- /end head -->


<!-- Begin Body
================================================== -->
<body <?php body_class(); ?>>

<div id="wrap" class="clearfix">

	<div id="header-wrap">
    	<?php wpex_hook_header_before(); ?>
        	<div id="pre-header">
            	<?php
				// Show Phone number
                if( $data['header_phone_number'] ) echo '<div id="phone"><span class="wpex-icon-phone"></span>'. $data['header_phone_number'] .'</div>';
				
				//Show email
                if( $data['header_email'] ) echo '<div id="mail"><span class="wpex-icon-envelope"></span><a href="mailto:'. $data['header_email'] .'">'. $data['header_email'] .'</a></div>'; ?>
            </div><!-- /pre-header -->
        <header id="header" class="clearfix">
       		<?php wpex_hook_header_top(); ?>
                <div id="logo">
                    <?php
                    // Show custom image logo if defined in the admin
                    if( $data['custom_logo'] ) { ?>
                        <a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo $data['custom_logo']; ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
                    <?php }
                    // No custom img logo - show text logo
                        else { ?>
                         <h2><a href="<?php echo home_url(); ?>/" title="<?php get_bloginfo( 'name' ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h2>
                    <?php } ?>
                </div><!-- /logo -->
				<nav id="navigation" class="clearfix">
						<?php wp_nav_menu( array(
                            'theme_location' => 'main_menu',
                            'sort_column' => 'menu_order',
                            'menu_class' => 'sf-menu',
                            'fallback_cb' => false
                        )); ?>
            	</nav><!-- /navigation -->
    		<?php wpex_hook_header_bottom(); ?>
        </header><!-- /header -->
        <?php wpex_hook_header_after(); ?>
    </div><!-- /header-wrap -->
    
    <?php wpex_hook_content_before(); ?>
    <div id="main-content" class="clearfix">
    <?php wpex_hook_content_top(); ?>