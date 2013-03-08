<?php
/**
 * Homepage FlexSlider display
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


global $data; //get theme options

// Get slides array
$wpex_home_slides = $data['home_slider'];
if($wpex_home_slides) { ?>  
<div id="home-slider">
    <div class="flexslider-container">
        <div class="flexslider">
            <ul class="slides slider-loading fitvids">
                <?php
                //begin loop
                foreach ($wpex_home_slides as $wpex_home_slide) :
                ?>
                    <li class="slide">
                    <?php if ( $wpex_home_slide['video'] == '' ) { ?>
						<?php if( $wpex_home_slide['link'] !== '' ) { ?>
                            <a href="<?php echo $wpex_home_slide['link']; ?>" title="<?php the_title(); ?>"><img src="<?php echo $wpex_home_slide['url']; ?>" alt="<?php $wpex_home_slide['title']; ?>" /></a>
                        <?php } else { ?>
                            <img src="<?php echo $wpex_home_slide['url']; ?>" alt="<?php $wpex_home_slide['title']; ?>" />
                        <?php } ?>
							<?php if( $wpex_home_slide['title'] !== '' || $wpex_home_slide['description'] !== '' ) { ?>
                                <div class="flex-caption">
                                    <?php if( $wpex_home_slide['title'] !== '' ) { echo '<h2>' . $wpex_home_slide['title'] .'</h2>'; } ?>
                                    <?php if( $wpex_home_slide['description'] !== '' ) { echo '<p>' . $wpex_home_slide['description'] .'</p>'; } ?>
                                </div>
                            <?php } ?>
                    <?php } else { echo wp_oembed_get( $wpex_home_slide['video'] ); } ?>
                    </li>
                <?php endforeach; ?>
            </ul><!-- /slides -->
        </div><!--/flexslider -->
    </div><!--/flexslider-container -->
</div><!--/home-slider -->

<?php } wp_reset_postdata(); ?>