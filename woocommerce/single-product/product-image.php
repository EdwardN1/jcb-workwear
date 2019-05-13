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

defined('ABSPATH') || exit;

global $product;

$featuredImage = get_the_post_thumbnail_url($product->get_id(), 'medium');

$variations = $product->get_available_variations();

$attachment_ids = $product->get_gallery_image_ids();

if ($featuredImage) {
    $imageA = array(
        "imageID" => get_post_thumbnail_id( $product->get_id() ),
        "imageURL" => $featuredImage,
        "source" => 'featured'
    );
    $pImages[] = $imageA;
}

function whatever($array, $key, $val) {
    foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

foreach ($variations as $variation):
    $vImage = $variation['image'];
    $vImageURL = $vImage['url'];
    $vImageID = attachment_url_to_postid($vImageURL);
    $vImageURL = wp_get_attachment_image_url($vImageID, 'medium');
    if($vImageID > 0) {
        if(!whatever($pImages,'imageID',$vImageID)) {
            $imageA = array(
                "imageID" => $vImageID,
                "imageURL" => $vImageURL,
                "source" => 'variation'
            );
            $pImages[] = $imageA;
        }
    }
    //echo "<script>console.log('" . json_encode($variation['image']) . "');</script>";

endforeach;

foreach ($attachment_ids as $attachment_id):
    if(!whatever($pImages,'imageID',$attachment_id)) {
        $imageA = array(
            "imageID" => $attachment_id,
            "imageURL" => wp_get_attachment_image_url($attachment_id, 'medium'),
            "source" => "gallery"
        );
        $pImages[] = $imageA;
    }
endforeach;

if ($pImages) :
    ?>
    <div id="product-slider-main" data-slick-slider-main>
        <?php
        foreach ($pImages as $pImage):
            ?>
            <div class="product-main-slide" data-imageID="<?php echo $pImage["imageID"]; ?>" data-source="<?php echo $pImage["source"]; ?>"
                 style="background-image: url(<?php echo $pImage["imageURL"]; ?>)">

            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div id="product-slider-nav" class="slider-nav" data-slick-slider-nav>
        <?php
        foreach ($pImages as $pImage):
            ?>
            <div class="rightpad-6">
                <div class="inner-image bordered"
                     style="background-image: url(<?php echo $pImage["imageURL"]; ?>)"></div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
<?php
endif;
