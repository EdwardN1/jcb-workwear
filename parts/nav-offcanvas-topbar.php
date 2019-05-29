<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar dark-grey-background" id="top-bar-menu">

    <div class="show-for-large dark-grey-background white heebo ExtraBold fontsize-xxlarge-22 fontsize-xlarge-20 fontsize-medium-16 caps addtolinks spaceevenly"
         style="width: 100%;">
		<?php if ( is_front_page() ): ?>
            <div class="grid-container leftpad-0 rightpad-0">
				<?php joints_top_nav(); ?>
            </div>
		<?php else: ?>
            <div class="grid-container">
				<?php joints_top_nav(); ?>
            </div>
		<?php endif; ?>
    </div>
    <div class="hide-for-large dark-grey-background" style="width: 100%;">
        <div class="grid-x">
            <div class="cell small-10 medium-10 large-10">
                <?php
                $logo    = get_field( 'logo', 'option' );
                $logoURL = $logo['url'];
                ?>
                <a href="/" class="show-for-small-only"><img src="<?php echo $logoURL; ?>"></a>
            </div>
            <div class="cell small-2 medium-2 large-2">
                <a data-toggle="off-canvas" class="burger-icon" style="display: block; margin-right: 0 !important; margin-left: auto !important;"><span class="menu-icon-bar"></span><span class="menu-icon-bar"></span><span class="menu-icon-bar"></span></a>
                <a href="/cart/" class="show-for-small-only" style="display: block; padding-top: 1em; margin-right: 0 !important; margin-left: auto !important; text-align: right;"><span class="cart-icon"><?php echo WC()->cart->get_cart_contents_count(); ?></span></a>
            </div>
        </div>
    </div>
</div>