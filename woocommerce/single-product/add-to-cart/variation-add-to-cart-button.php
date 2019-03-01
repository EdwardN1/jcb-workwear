<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$sizeguide = get_field( 'a_sizing_guide', $product->get_id() );
if ( $sizeguide ) {
	?>
    <div class="toprempad-1">
        <ul class="accordion size-guide" data-accordion data-allow-all-closed="true">
            <li class="accordion-item" data-accordion-item>
                <!-- Accordion tab title -->
                <a href="#" class="accordion-title"
                   style="border: none; background-color: #f2f2f2; font-size: 15px; color: #666666;">
					<?php the_field( 'guide_description', $sizeguide->ID ); ?>
                </a>

                <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                <div class="accordion-content" data-tab-content>
					<?php
					$sizetable = get_field( 'table', $sizeguide->ID );
					if ( $sizetable ) {
						echo '<table>';
						if ( $sizetable['header'] ) {
							echo '<thead><tr>';
							echo '';
							foreach ( $sizetable['header'] as $th ) {
								echo '<th class="text-center">';
								echo $th['c'];
								echo '</th>';
							}
							echo '</tr>';
							echo '</thead>';
						}

						echo '<tbody>';
						foreach ( $sizetable['body'] as $tr ) {
							echo '<tr>';
							foreach ( $tr as $td ) {
								echo '<td class="text-center">' . $td['c'] . '</td>';
							}
							echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
					}
					?>
                </div>
            </li>
            <!-- ... -->
        </ul>
    </div>
	<?php
}
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	?>
    <div class="grid-x toppad-24">
        <div class="custom-quantity large-3 medium-3 small-6">
			<?php
			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
				// WPCS: CSRF ok, input var ok.
			) );

			?>

			<?php
			do_action( 'woocommerce_after_add_to_cart_quantity' );
			?>
        </div>
        <div class="large-9 medium-9 small-6 toppad-26 leftrempad-1">
            <button type="submit"
                    class="single_add_to_cart_button button alt"
                    style="width: 100%;"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        </div>
    </div>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

    <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>"/>
    <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>"/>
    <input type="hidden" name="variation_id" class="variation_id" value="0"/>
</div>
