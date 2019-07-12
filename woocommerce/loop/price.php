<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;
?>
<div style="padding-bottom: 1em;">
<?php if ( $price_html = $product->get_price_html() ) : ?>
    <?php
//error_log($product->get_name().' - '.$product->get_tax_status());
    if (strpos($price_html, 'inc VAT') == false) {

    }
    $tax_status = $product->get_tax_status();
    if($tax_status=='none')
        $price_html .= ' zero rated';
    ?>
	<span class="price"><?php echo $price_html; ?></span>
    <?php
else:?>

    <span class="price">&nbsp;</span>

<?php endif; ?>
</div>
