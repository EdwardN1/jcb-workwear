<div class="black-background toprempad-3 bottomrempad-1">
    <div class="grid-container">
        <div class="grid-x">
            <div class="large-3 medium-3 small-3 cell">
                <?php
                $logo = get_field('logo', 'option');
                $logoURL = $logo['url'];
                ?>
                <a href="/"><img src="<?php echo $logoURL; ?>"></a>
            </div>
            <div class="large-4 medium-1 small-1 cell">&nbsp;</div>
            <div class="large-5 medium-8 small-8 cell">
                <div class="grid-x toppad-7">
                    <div class="large-10 medium-10 small-10 heebo heading ExtraBold caps white cell fontsize-24">call us
                        on <?php the_field('telephone_number', 'option'); ?></div>
                    <div class="large-2 medium-2 small-2 heebo heading ExtraBold small caps orange text-right cell"><a
                                href="/cart/"><span
                                    class="cart-icon"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
                    </div>
                </div>
                <div class="grid-container full toprempad-1">
                    <div class="grid-x">
                        <div class="large-7 small-7 medium-7 cell leftpad-8">
                            <?php get_search_form(); ?>
                        </div>
                        <div class="social large-5 medium-5 small-5 cell">
                            <div class="grid-x">
                                <div class="large-3 small-3 medium-3 cell text-right leftpad-3 rightpad-3">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>