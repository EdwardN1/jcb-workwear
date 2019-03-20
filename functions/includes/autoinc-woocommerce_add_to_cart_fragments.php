<?php
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {

	$fragments['span.cart-icon'] = '<span class="cart-icon">' . WC()->cart->get_cart_contents_count() . '</span>';

	return $fragments;

}