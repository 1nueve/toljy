<?php
/**
 * Homepage Testimonials
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


global $data; //get theme options

// Get slides array
$wpex_home_testimonials = $data['home_testimonials'];
if($wpex_home_testimonials) {

	// Load testimonials slider js
	wp_enqueue_script('testimonials', WPEX_JS_DIR .'/testimonials.js', array('jquery'), '1.0', true);	
	?>  
	<div id="home-testimonials">
			<h2 class="title"><?php if( $data['home_portfolio_title'] !=='' ) { echo $data['home_testimonials_title']; } else { _e('Testimonials','wpex'); } ?></h2>

        <div class="flexslider-container">
        	<div class="flexslider">
				<ul class="slides">
					<?php
                    //begin loop
                    $count=0;
                    foreach ($wpex_home_testimonials as $wpex_home_slide) :
                    $count++;
                    ?>
                    	<?php if( $count == '1' ) echo '<li class="slide">'; ?>
                            <article class="home-testimonial <?php if( $count == '3' ) echo 'remove-margin'; ?>">
                                <?php if( $wpex_home_slide['link'] !== '' ) { ?>
                                    <a href="<?php echo $wpex_home_slide['link']; ?>" title="<?php the_title(); ?>" class="thumb"><img src="<?php echo $wpex_home_slide['url']; ?>" alt="<?php $wpex_home_slide['title']; ?>" /></a>
                                <?php } else { ?>
                                    <div class="thumb"><img src="<?php echo $wpex_home_slide['url']; ?>" alt="<?php $wpex_home_slide['title']; ?>" /></div>
                                <?php } ?>
                                    <?php if( $wpex_home_slide['title'] !== '' || $wpex_home_slide['description'] !== '' ) { ?>
                                            <?php if( $wpex_home_slide['title'] !== '' ) { echo '<h2>' . $wpex_home_slide['title'] .'</h2>'; } ?>
                                            <?php if( $wpex_home_slide['description'] !== '' ) { echo '<p>' . $wpex_home_slide['description'] .'</p>'; } ?>
                                    <?php } ?>
                            </article><!--/home-testimonial -->
                    	<?php if( $count == '3' ) { echo '</li>'; $count=0; } ?>
                    <?php endforeach; ?>
				</ul><!-- /slides -->
        	</div><!--/flexslider -->
    	</div><!--/flexslider-container -->
	</div><!--/home-testimonials -->	
<?php } wp_reset_postdata(); ?>