<?php
/**
 * Template Name: Blog
 *
 *
 * This template file will show all your recent blog posts
 * @package PhotoPro WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template
if (have_posts()) : while (have_posts()) : the_post();

// Set Blog Style
global $data;
$wpex_blog_entry_style = 'blog-isotope';
if( $data['blog_style'] == 'Simple' ) $wpex_blog_entry_style = 'simple-blog container sidebar-bg';
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>
</header><!-- /page-heading -->


<div id="blog-wrap" class="<?php echo $wpex_blog_entry_style; ?> clearfix">

	<?php if( $data['blog_style'] == 'Simple' ) echo '<div id="post">'; ?>
    
		<?php
        // Query regular posts and paginate
            query_posts(
                array(
                    'post_type'=> 'post',
                    'paged'=>$paged
                )
            );
        
        // If posts are found get the loop-entry.php file which contains the layout/stylign for post entries
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part( 'content', get_post_format() );   
            endwhile;        	
        endif; ?>
        
	<?php if( $data['blog_style'] == 'Simple' ) { echo '</div>'; get_sidebar(); } ?>
    
</div><!-- /post -->

<?php
wpex_pagination(); // Paginate your posts
wp_reset_query(); // Reset the query to avoid any conflicts later on
endwhile; endif;
get_footer(); //get template footer ?>