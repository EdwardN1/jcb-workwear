<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$featuredImage = get_the_post_thumbnail_url( $product->get_id(), 'medium' );

$attachment_ids = $product->get_gallery_image_ids();

if ( $featuredImage ) {
	$pImages[] = $featuredImage;
}

foreach ( $attachment_ids as $attachment_id ):
	$pImages[] = wp_get_attachment_image_url( $attachment_id, 'medium' );
endforeach;

if ( $pImages ) :
	?>
    <div id="product-slider-main" data-slick-slider-main>
		<?php
		foreach ( $pImages as $pImage ):
			?>
            <div class="product-main-slide" style="background-image: url(<?php echo $pImage; ?>)">

            </div>
		<?php
		endforeach;
		?>
    </div>
    <div id="product-slider-nav" class="slider-nav" data-slick-slider-nav>
		<?php
		foreach ( $pImages as $pImage ):
			?>
            <div class="rightpad-6">
                <div class="inner-image bordered" style="background-image: url(<?php echo $pImage; ?>)"></div>
            </div>
		<?php
		endforeach;
		?>
    </div>
<?php
endif;