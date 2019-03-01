<div class="black-background toprempad-3 bottomrempad-1">
    <div class="grid-container">
        <div class="grid-x">
            <div class="large-3 medium-3 small-3 cell">
				<?php
				$logo    = get_field( 'logo', 'option' );
				$logoURL = $logo['url'];
				?>
                <a href="/"><img src="<?php echo $logoURL; ?>"></a>
            </div>
            <div class="large-4 medium-1 small-1 cell">&nbsp;</div>
            <div class="large-5 medium-8 small-8 cell">
                <div class="grid-x toppad-7">
                    <div class="large-10 medium-10 small-10 heebo heading ExtraBold caps white cell fontsize-24">call us
                        on <?php the_field( 'telephone_number', 'option' ); ?></div>
                    <div class="large-2 medium-2 small-2 heebo heading ExtraBold small caps orange text-right cell"><span
                                class="cart-icon">2</span></div>
                </div>
                <div class="grid-container full toprempad-1">
                    <div class="grid-x">
                        <div class="large-8 small-8 medium-8 cell leftpad-8">
                            <?php get_search_form(); ?>
                        </div>
                        <div class="social large-4 medium-4 small-4 cell">
                            <div class="grid-x">
                                <div class="large-4 small-4 medium-4 cell text-right">
                                    <a href="<?php the_field( 'facebook_link', 'option' ); ?>"
                                       target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png"></a>
                                </div>
                                <div class="large-4 small-4 medium-4 cell text-right">
                                    <a href="<?php the_field( 'twitter_link', 'option' ); ?>"
                                       target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png"></a>
                                </div>
                                <div class="large-4 small-4 medium-4 cell text-right">
                                    <a href="<?php the_field( 'instagram_link', 'option' ); ?>" target="_blank"><img
                                                src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>