<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
    <div style="padding: .7rem 1rem;">
        <a href="tel:<?php the_field('telephone_number', 'option'); ?>">CALL US
            ON <?php the_field('telephone_number', 'option'); ?></a>
    </div>
    <div style="padding: .7rem 1rem;">
        <div class="grid-x">
            <div class="large-3 small-3 medium-3 cell rightpad-3">
                <a href="<?php the_field('blog_link', 'option'); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/blog.png"></a>
            </div>
            <div class="large-3 small-3 medium-3 cell text-right leftpad-3 rightpad-3">
                <a href="<?php the_field('facebook_link', 'option'); ?>"
                   target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.svg"></a>
            </div>
            <div class="large-3 small-3 medium-3 cell text-right leftpad-3 rightpad-3">
                <a href="<?php the_field('twitter_link', 'option'); ?>"
                   target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-icon.svg"></a>
            </div>
            <div class="large-3 small-3 medium-3 cell text-right leftpad-3 rightpad-3">
                <a href="<?php the_field('instagram_link', 'option'); ?>" target="_blank"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon.svg"></a>
            </div>
        </div>
    </div>
    <div style="padding: .7rem 1rem;">
        <?php get_search_form(); ?>
    </div>
    <?php joints_top_nav(); ?>

    <?php if (is_active_sidebar('offcanvas')) : ?>

        <?php dynamic_sidebar('offcanvas'); ?>

    <?php endif; ?>

</div>
