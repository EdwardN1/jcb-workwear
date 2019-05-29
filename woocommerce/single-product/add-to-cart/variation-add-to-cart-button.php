<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

global $product;
$sizeguide = get_field('a_sizing_guide', $product->get_id());
if ($sizeguide) {
    ?>
    <div class="toprempad-1">
        <ul class="accordion size-guide" data-accordion data-allow-all-closed="true">
            <li class="accordion-item" data-accordion-item>
                <!-- Accordion tab title -->
                <a href="#" class="accordion-title">
                    <?php the_field('guide_description', $sizeguide->ID); ?>
                </a>

                <!-- Accordion tab content: it would start in the open state due to using the `is-active` state class. -->
                <div class="accordion-content" data-tab-content>
                    <?php
                    $sizetable = get_field('table', $sizeguide->ID);
                    if ($sizetable) {
                        echo '<table>';
                        if ($sizetable['header']) {
                            echo '<thead><tr>';
                            echo '';
                            foreach ($sizetable['header'] as $th) {
                                echo '<th class="text-center">';
                                echo $th['c'];
                                echo '</th>';
                            }
                            echo '</tr>';
                            echo '</thead>';
                        }

                        echo '<tbody>';
                        foreach ($sizetable['body'] as $tr) {
                            echo '<tr>';
                            foreach ($tr as $td) {
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
    <div class="woocommerce-variation-add-to-cart variations_button toprempad-1">
        <?php do_action('woocommerce_before_add_to_cart_button'); ?>

        <?php
        do_action('woocommerce_before_add_to_cart_quantity');

        ?>
        <div class="grid-x toppad-24">
            <div class="custom-quantity large-3 medium-5 small-6">
                <?php
                woocommerce_quantity_input(array(
                    'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                    'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                    'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(),
                    // WPCS: CSRF ok, input var ok.
                ));

                ?>

                <?php
                do_action('woocommerce_after_add_to_cart_quantity');
                ?>
            </div>
            <div class="large-9 medium-7 small-6 toppad-26 leftrempad-1">
                <button type="submit"
                        class="single_add_to_cart_button button alt"
                        style="width: 100%;"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
            </div>
        </div>

        <?php do_action('woocommerce_after_add_to_cart_button'); ?>

        <input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>"/>
        <input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>"/>
        <input type="hidden" name="variation_id" class="variation_id" value="0"/>
    </div>
<?php if (have_rows('sharing_links', 'option')): ?>
    <div class="sharelinks grid-x toppad-8">
        <div class="large-2 medium-3 small-12 toppad-4">
            <span class="heebo ExtraBold fontsize-20">SHARE</span>
        </div>
        <?php while (have_rows('sharing_links', 'option')): the_row(); ?>

            <?php $icon = get_sub_field('icon');
            $iconURL = $icon['url'];
            ?>

            <div class="large-1 medium-1 small-1">
                <a href="<?php echo get_sub_field('link');
                the_permalink($product->get_id()); ?>" target="_blank"><img src="<?php echo $iconURL; ?>"
                                                                            style="max-width: 95%; width: 36px;"></a>
            </div>

        <?php endwhile; ?>
    </div>
<?php endif; ?>
<?php
$add_a_logo_option = get_field('add_a_logo_option' , $product->get_id());
if ($add_a_logo_option) {
    ?>
    <div class="add-a-logo toppad-16 text-center">
        <!--<img src="<?php /*echo get_template_directory_uri().'/assets/images/add-your-logo.png'; */?>">-->
        <a href="/customise-your-workwear/">WANT TO CUSTOMISE THIS ITEM?<br>
            Let us show you how >></a>

    </div>
    <?php
}
