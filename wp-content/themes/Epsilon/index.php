<?php
/**
 * Index.php is the default template. This file is used when a more specific template can not be found to display your posts.
 * It is unlikely this template file will ever be used, but it's here to back you up just incase.
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) :

// Set Blog Style
global $data;
$wpex_blog_entry_style = 'blog-isotope';
if( $data['blog_style'] == 'Simple' ) $wpex_blog_entry_style = 'simple-blog container sidebar-bg';
?>

<div id="blog-wrap" class="<?php echo $wpex_blog_entry_style; ?> clearfix">

	<?php if( $data['blog_style'] == 'Simple' ) echo '<div id="post">'; ?>
    
		<?php
		while (have_posts()) : the_post();
			get_template_part( 'content', get_post_format() );   
		endwhile;        	
		?>
        
	<?php if( $data['blog_style'] == 'Simple' ) { echo '</div>'; get_sidebar(); } ?>
    
</div><!-- /post -->

<?php
wpex_pagination(); // Paginate your posts
endif;
get_footer(); //get template footer ?>