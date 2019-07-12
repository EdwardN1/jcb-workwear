<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

$tabCount = 0;
$tabsHeadings = '';
$tabsSections = '';
$productDescription = $product->get_description();
//$productShortDescription = $product->get_short_description();
$productShortDescription = '';

if ($productDescription != '') {
    $tabCount++;
    $tabsHeadings .= '<li class="tabs-title is-active"><a href="#panel' . $tabCount . '" aria-selected="true"><p>' . get_field('epim_description_tab_heading', 'option') . '</p></a></li>';
    $tabsSections .= '<div class="tabs-panel is-active" id="panel' . $tabCount . '">';
    $tabsSections .= '<div class="grid-x">';
    $tabsSections .= $productDescription;
    $tabsSections .= '</div></div>';
}

if ($productShortDescription != '') {
    $tabCount++;
    if ($tabCount == 1) {
        $tabsHeadings .= '<li class="tabs-title is-active"><a href="#panel' . $tabCount . '" aria-selected="true"><p>' . get_field('epim_short_description_tab_heading', 'option') . '</p></a></li>';
    } else {
        $tabsHeadings .= '<li class="tabs-title"><a href="#panel' . $tabCount . '"><p>' . get_field('epim_short_description_tab_heading', 'option') . '</p></a></li>';
    }
    if ($tabCount == 1) {
        $tabsSections .= '<div class="tabs-panel is-active" id="panel' . $tabCount . '">';
    } else {
        $tabsSections .= '<div class="tabs-panel" id="panel' . $tabCount . '">';
    }
    $tabsSections .= '<div class="grid-x">';
    $tabsSections .= $productShortDescription;
    $tabsSections .= '</div></div>';
}

if (have_rows('product_tabs', $product->get_id())):

    ?>

    <?php
    while (have_rows('product_tabs', $product->get_id())): the_row();
        $tabCount++;
        $tabheadingClass = '';
        if ($tabCount == 1) {
            $tabsHeadings .= '<li class="tabs-title is-active"><a href="#panel' . $tabCount . '" aria-selected="true"><p>' . get_sub_field('tab_heading') . '</p></a></li>';
        } else {
            $tabsHeadings .= '<li class="tabs-title"><a href="#panel' . $tabCount . '"><p>' . get_sub_field('tab_heading') . '</p></a></li>';
        }

        if ($tabCount == 1) {
            $tabsSections .= '<div class="tabs-panel is-active" id="panel' . $tabCount . '">';
        } else {
            $tabsSections .= '<div class="tabs-panel" id="panel' . $tabCount . '">';
        }
        $countColumns = count(get_sub_field('tab_columns'));
        if (have_rows('tab_columns')):

            $columnClass = '';
            if ($countColumns == 1) {
                ($columnClass = ' class="large-12 medium-12 small-12" data-columns="' . $countColumns . '"');
            }
            if ($countColumns == 2) {
                ($columnClass = ' class="large-6 medium-6 small-12 rightrempad-1" data-columns="' . $countColumns . '"');
            }
            if ($countColumns == 3) {
                ($columnClass = ' class="large-4 medium-4 small-12 rightrempad-1" data-columns="' . $countColumns . '"');
            }
            $tabsSections .= '<div class="grid-x">';
            while (have_rows('tab_columns')): the_row();
                $tab_column = get_sub_field('tab_column');
                $tabsSections .= '<div' . $columnClass . '>' . $tab_column . '</div>';
            endwhile;
            $tabsSections .= '</div>';
        endif;
        $tabsSections .= '</div>';
    endwhile;
endif;
if ($tabsHeadings != '') {
    ?>
    <div class="product-tabs">
        <ul class="tabs" data-tabs id="example-tabs">
            <?php echo $tabsHeadings; ?>
        </ul>

        <div class="tabs-content" data-tabs-content="example-tabs">
            <?php echo $tabsSections; ?>
        </div>
    </div>
    <?php
}
?>

<?php
$wcTagTerms = get_the_terms(get_the_ID(), 'product_tag');
if ($wcTagTerms && !is_wp_error($wcTagTerms)) :

    $tagCells = array();

    foreach ($wcTagTerms as $term) {
        $image = get_field('image', $term);
        $title = strtoupper($term->name).'&nbsp;: &nbsp;&nbsp;'.$term->description;
        $tagCells[] = '<div class="cell shrink"><img data-tooltip title="'.$title.'" class="top" data-click-open="true" alt="' . $term->name . '" src="' . $image['url'] . '" style="margin-right: 12px; border: none;"/></div>';
    }

    $on_draught = implode("", $tagCells);
    ?>

    <div class="grid-x grid-padding-y">
        <?php echo $on_draught; ?>
    </div>
<?php endif; ?>
