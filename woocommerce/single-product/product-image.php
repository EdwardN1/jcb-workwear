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

function whatever($array, $key, $val)
{
    if($array) {foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;}

    return false;
}

//error_log('Hello');

$featuredImage = get_the_post_thumbnail_url($product->get_id(), 'medium');

if ( $product->is_type( 'variable' ) ) {
    $variations = $product->get_available_variations();
    foreach ($variations as $variation):
        $vImage = $variation['image'];
        $vImageURL = $vImage['url'];
        $vImageID = attachment_url_to_postid($vImageURL);
        $vImageURL = wp_get_attachment_image_url($vImageID, 'medium');
        $vImageAttribute = $variation["attributes"];
        $vImageAttributeColour = "none";
        if (isset($vImageAttribute["attribute_pa_clothing-colours"])) {
            $vImageAttributeColour = $vImageAttribute["attribute_pa_clothing-colours"];
        }
        if (isset($vImageAttribute["attribute_pa_boot-colours"])) {
            $vImageAttributeColour = $vImageAttribute["attribute_pa_boot-colours"];
        }
        if ($vImageID > 0) {
            if (!whatever($pImages, 'imageID', $vImageID)) {
                $imageA = array(
                    "imageID" => $vImageID,
                    "imageURL" => $vImageURL,
                    "source" => 'variation',
                    "colour" => $vImageAttributeColour
                );
                $pImages[] = $imageA;
            }
        }
        //echo "<script>console.log('" . json_encode($variation) . "');</script>";

    endforeach;
}

$attachment_ids = $product->get_gallery_image_ids();

if (!$pImages) {
    if ($featuredImage) {
        $imageA = array(
            "imageID" => get_post_thumbnail_id($product->get_id()),
            "imageURL" => $featuredImage,
            "source" => 'featured',
            "colour" => 'none'
        );
        $pImages[] = $imageA;
    }
}

foreach ($attachment_ids as $attachment_id):
    if (!whatever($pImages, 'imageID', $attachment_id)) {
        $imageA = array(
            "imageID" => $attachment_id,
            "imageURL" => wp_get_attachment_image_url($attachment_id, 'medium'),
            "source" => "gallery",
            "colour" => 'none'
        );
        $pImages[] = $imageA;
    }
endforeach;

if ($pImages) :
    ?>
    <div id="product-slider-main" data-slick-slider-main>
        <?php
        $slideIndex = 0;
        foreach ($pImages as $pImage):
            ?>
            <div class="product-main-slide" data-imageID="<?php echo $pImage["imageID"]; ?>"
                 data-source="<?php echo $pImage["source"]; ?>" data-colour="<?php echo $pImage["colour"]; ?>"
                 data-colour-index="<?php echo $slideIndex; ?>"
                 style="background-image: url(<?php echo $pImage["imageURL"]; ?>)">

            </div>
            <?php
            $slideIndex++;
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
