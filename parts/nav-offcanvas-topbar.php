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
    <div class="top-bar-right float-right hide-for-large">
        <ul class="menu dark-grey-background">
            <!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
            <!--<li><a><?php /*_e( 'Menu', 'jointswp' ); */?></a>-->
                <a data-toggle="off-canvas" class="burger-icon"><span class="menu-icon-bar"></span><span class="menu-icon-bar"></span><span class="menu-icon-bar"></span></a>

            </li>
        </ul>
    </div>
</div>