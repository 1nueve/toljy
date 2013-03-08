<?php
/**
 * This file is used for the layout/design of your single portfolio posts
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
 
get_header(); // Loads the header.php template

if (have_posts()) : while (have_posts()) : the_post();

// Get portfolio categories
$wpex_portfolio_cats = get_the_term_list( get_the_ID(), 'portfolio_cats' );

// Get resize and show featured image : refer to functions/img_defaults.php for default values
$wpex_port_single_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'port_post_width' ), wpex_img( 'port_post_height' ), wpex_img( 'port_post_crop' ) );

//get post image attachments
$wpex_port_single_attachments = get_posts(
	array(
		'orderby' => 'menu_order',
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'post_mime_type' => 'image',
		'post_status' => null,
		'posts_per_page' => -1
	)
); ?>

<div id="page-heading">
    <h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->

<article id="single-portfolio-post" class="clearfix">     
    <div id="single-portfolio-media" class="fitvids">
        <?php
        /*--------------------------------------*/
        /* Single Featured Image Post Style
        /*--------------------------------------*/
        if( get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == 'Featured Image' || get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == '' ) {	
    
            //show featured image if defined
            if( $wpex_port_single_img ) {
            ?>
                <div class="post-thumbnail">
                    <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' ); ?>" title="<?php the_title(); ?>" class="prettyphoto-link"><img src="<?php echo $wpex_port_single_img; ?>" alt="<?php echo the_title(); ?>" /></a>
                </div><!-- /post-thumbnail -->
                <?php wpex_post_feat_img_caption(); ?>
            <?php } 
            }
			
			
        /*--------------------------------------*/
        /* Slider Post Style
        /*--------------------------------------*/
        elseif ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == 'Image Slider' ) {
        ?>
            <div class="flexslider-container">
                <div id="slider-<?php get_the_ID(); ?>" class="flexslider">
                    <ul class="slides slider-loading">
                        <?php
                        //loop through attachments
                        foreach ( $wpex_port_single_attachments as $wpex_port_single_attachment ) :
                        
                        // Get and crop featured image
                        $wpex_port_single_img = aq_resize( wp_get_attachment_url( $wpex_port_single_attachment->ID,'full' ),  wpex_img( 'port_post_width' ), wpex_img( 'port_post_height' ), wpex_img( 'port_post_crop' ) );
                        
                        //include image in slider/gallery
                        if( get_post_meta($wpex_port_single_attachment->ID, 'be_rotator_include', true) !== '1' ) {
                        ?>
                        <li class="slide">
                            <a href="<?php echo wp_get_attachment_url( $wpex_port_single_attachment->ID,'full' ); ?>" title="<?php the_title(); ?>" rel="prettyPhoto[portfolio_gallery]"><img src="<?php echo $wpex_port_single_img; ?>" alt="<?php echo the_title(); ?>" /></a>
                            <?php if ( $wpex_port_single_attachment->post_content !== '' ) { ?>
                                <p class="single-portfolio-image-description"><?php echo $wpex_port_single_attachment->post_content; ?></p><!-- /single-portfolio-description -->
                            <?php } ?>
                        </li>
                        <?php } endforeach; ?>
                    </ul><!-- /slides -->
                </div><!-- /flexslider -->
            </div><!-- /flexslider-container -->
			<?php }
			
			
			/*--------------------------------------*/
			/* Stacked Images Post Style
			/*--------------------------------------*/
			elseif ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == 'Stacked Images' ) {
				
				// Loop through attachments
				foreach ( $wpex_port_single_attachments as $wpex_port_single_attachment ) :
				
				// Get resize & crop the featured image
				$wpex_port_single_img = aq_resize( wp_get_attachment_url( $wpex_port_single_attachment->ID,'full' ),  wpex_img( 'port_post_width' ), wpex_img( 'port_post_height' ), wpex_img( 'port_post_crop' ) );
			
				// Check if this image should be included
				if( get_post_meta($wpex_port_single_attachment->ID, 'be_rotator_include', true) != '1') {
				?>
				<div class="single-portfolio-stacked-image">
					<a href="<?php echo wp_get_attachment_url( $wpex_port_single_attachment->ID,'full' ); ?>" title="<?php the_title(); ?>" rel="prettyPhoto[portfolio_gallery]"><img src="<?php echo $wpex_port_single_img; ?>" alt="<?php echo the_title(); ?>" /></a>
					<?php if ( $wpex_port_single_attachment->post_content !== '' ) { ?>
					<p class="single-portfolio-image-description"><?php echo $wpex_port_single_attachment->post_content; ?></p><!-- /single-portfolio-description -->
					<?php } ?>
				</div><!-- /single-portfolio-stacked-image -->
				<?php } endforeach;
			}
			
			
			/*--------------------------------------*/
			/* Video Post Style
			/*--------------------------------------*/
			elseif ( get_post_meta( get_the_ID(), 'wpex_portfolio_post_style', true ) == 'Video' ) {
				echo wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_portfolio_post_video', true ) );
			}
        ?>  
    </div><!-- /single-portfolio-media --> 
    
    <?php if(!empty($post->post_content)) { ?>
        <div id="single-portfolio-info" class="entry container clearfix">
        	
            <?php if( get_post_meta( get_the_ID(), 'wpex_portfolio_client', true ) || get_post_meta( get_the_ID(), 'wpex_portfolio_date', true ) || get_post_meta( get_the_ID(), 'wpex_portfolio_url', true ) ) { ?>
                <ul id="single-portfolio-meta">
                    <?php if( get_post_meta( get_the_ID(), 'wpex_portfolio_client', true ) ) echo '<li><span class="wpex-icon-user"></span>'.get_post_meta( get_the_ID(), 'wpex_portfolio_client', true ).'</li>'; ?>
                    <?php if( get_post_meta( get_the_ID(), 'wpex_portfolio_date', true ) ) echo '<li><span class="wpex-icon-calendar"></span>'.get_post_meta( get_the_ID(), 'wpex_portfolio_date', true ).'</li>'; ?>
                    <?php if( get_post_meta( get_the_ID(), 'wpex_portfolio_url', true ) ) echo '<li><span class="wpex-icon-link"></span><a href="'.get_post_meta( get_the_ID(), 'wpex_portfolio_url', true ).'" title="'.get_post_meta( get_the_ID(), 'wpex_portfolio_client', true ).'" target="_blank">'.get_post_meta( get_the_ID(), 'wpex_portfolio_url', true ).'</a></li>'; ?>
                </ul><!--single-portfolio-meta-->
            <?php } ?>
            
            <?php if( get_post_meta( get_the_id(), 'wpex_portfolio_post_subtitle', true ) !== '' ) { ?>
            	<h2 id="project-details-title"><span><?php echo get_post_meta( get_the_id(), 'wpex_portfolio_post_subtitle', true ); ?></span></h2>
            <?php } ?>
            
			<?php the_content(); ?>
        </div><!-- /single-portfolio-info -->
    <?php } ?>
    
</article><!-- /post -->

<?php
/*--------------------------------------------------*/
/* Show Other Posts @ Random
/*--------------------------------------------------*/
if( $data['portfolio_more'] !== '1' ) {
	
	$wpex_port_cats = wp_get_post_terms($post->ID, 'portfolio_cats'); //get current posts categories
	
	if ($wpex_port_cats) {
		$wpex_related_cat = array( 'relation' => 'OR', array( 'taxonomy' => 'portfolio_cats', 'terms' => $wpex_port_cats[0]->term_id ) );
	} else { $wpex_related_cat = NULL; }
	
	//get post type ==> portfolio
	global $post;
	$more_portfolio_posts = get_posts(
		array(
			'exclude' => get_the_ID(),
			'orderby' => 'rand',
			'post_type' =>'portfolio',
			'numberposts' => '4',
			'suppress_filters' => false,
			'tax_query' => $wpex_related_cat
			)
		);
	
	//show portfolio section if posts exist
	if( $more_portfolio_posts ) { ?>
		<div id="single-portfolio-related" class="clearfix">
		<?php 
        foreach ($more_portfolio_posts as $post ) : setup_postdata( $post );
            //get the portfolio loop style
            get_template_part('content','portfolio');
        endforeach; ?>
		</div><!-- /single-portfolio-related -->
<?php wp_reset_postdata(); } } ?>
  
<?php
endwhile;
endif;
get_footer(); // Loads the footer.php file ?>