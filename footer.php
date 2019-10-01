<?php
/**
 * The template for displaying the footer.
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<div class="toppad-16 clearfix"></div>
<div class="grid-container catalogue">
    <div class="light-grey-background text-center heebo ExtraBold fontsize-22 caps black toppad-3">
        <a href="http://sites.ng15.co.uk/psf/jcb_ss_2019_flipbook/index.html" target="_blank" class="black">VIEW OUR LATEST CATALOGUE <span class="orange">&gt;&gt;</span></a></div>
</div>

<footer class="footer" role="contentinfo">

    <div class="inner-footer grid-x light-grey-background toprempad-1 bottomrempad-1">

        <div class="small-12 medium-12 large-12 cell">
            <div class="grid-container pad-left-0 padding-right-0 ">
                <nav role="navigation"
                     class="rambla fontsize-20 dark-grey addtolinks caps float-left">
                    <?php joints_footer_links(); ?>
                    <?php $footer_logo = get_field('footer_logo', 'option'); ?>
                    <?php $footer_logoURL = $footer_logo['url']; ?>
                    <?php $footer_logoALT = $footer_logo['alt']; ?>

                </nav>
                <div class="float-right toppad-8">
                    <img src="<?php echo $footer_logoURL; ?>" alt="<?php echo $footer_logoALT; ?>"/>
                </div>
            </div>
        </div>

        <!--<div class="small-12 medium-12 large-12 cell">
							<p class="source-org copyright">&copy; <?php /*echo date('Y'); */ ?> <?php /*bloginfo('name'); */ ?>.</p>
						</div>-->

    </div> <!-- end #inner-footer -->

</footer> <!-- end .footer -->

</div>  <!-- end .off-canvas-content -->

</div> <!-- end .off-canvas-wrapper -->

<?php wp_footer(); ?>

<?php
$google_analytics = get_field('google_analytics','option');
if($google_analytics) {
    echo $google_analytics;
}
?>

</body>

</html> <!-- end page -->