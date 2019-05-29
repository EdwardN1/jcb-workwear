<?php
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
    global $product;
    if ( $product->is_type( 'variable' ) ) {
        $text = $product->is_purchasable() ? __( 'Buy Now', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
    }
    return $text;
}, 10 );