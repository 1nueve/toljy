<?php
/**
 * Footer.php outputs the code for your footer widgets, contains your footer hook and closing body/html tags
 * @package Epsilon WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
global $data; // Globals 
?>
<div class="clear"></div><!-- /clear any floats -->
<?php wpex_hook_content_bottom(); ?>
</div><!-- /main-content -->
<?php wpex_hook_content_after(); ?>
	<div id="footer-wrap">
    	<?php wpex_hook_footer_before(); ?>
        <footer id="footer">
        <?php wpex_hook_footer_top(); ?>
            <div id="footer-widgets" class="clearfix">
                <div class="footer-box">
                    <?php dynamic_sidebar('footer-one'); ?>
                </div><!-- /footer-box -->
                <div class="footer-box">
                    <?php dynamic_sidebar('footer-two'); ?>
                </div><!-- /footer-box -->
                <div class="footer-box remove-margin">
                    <?php dynamic_sidebar('footer-three'); ?>
                </div><!-- /footer-box -->
            </div><!-- /footer-widgets -->
            <?php wpex_hook_footer_bottom(); ?>
        </footer><!-- /footer -->
        <?php wpex_hook_footer_after(); ?>
    </div><!-- /footer-wrap -->
	<div id="copyright">&copy; <?php _e('Copyright','wpex'); ?> <?php the_date('Y'); ?> &middot; <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>
</div><!-- /wrap -->
<?php if( !empty($data['tracking_foot'] ) ) echo $data['tracking_foot']; ?>
<?php wp_footer(); // Footer hook, do not delete, ever ?>
</body>
</html>