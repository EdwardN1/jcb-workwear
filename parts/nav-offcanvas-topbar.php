<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/off-canvas-menu/
 */
?>

<div class="top-bar dark-grey-background" id="top-bar-menu">

    <div class="show-for-medium dark-grey-background white heebo ExtraBold fontsize-22 caps addtolinks spaceevenly" style="width: 100%;">
        <div class="grid-container leftpad-0 rightpad-0">
			<?php joints_top_nav(); ?>
        </div>
    </div>
    <div class="top-bar-right float-right show-for-small-only">
        <ul class="menu dark-grey-background">
            <!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
            <li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
        </ul>
    </div>
</div>