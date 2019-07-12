<?php
/**
 * Created by PhpStorm.
 * User: Edward Nickerson
 * Date: 28/02/2019
 * Time: 13:29
 */
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'jcb_variation_types', 10, 2 );

function jcb_variation_types( $html, $args ) {
	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
	$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
	$class                 = $args['class'];
	$show_option_none      = $args['show_option_none'] ? true : false;
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

	if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[ $attribute ];
	}

    if($attribute=='pa_boot-colours'||$attribute=='pa_clothing-colours') {
	    $args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
		    'options'          => false,
		    'attribute'        => false,
		    'product'          => false,
		    'selected'         => false,
		    'name'             => '',
		    'id'               => '',
		    'class'            => '',
		    'show_option_none' => __('Choose an option', 'woocommerce'),
	    ));

	    if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
		    $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
		    $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']);
	    }

	    $options               = $args['options'];
	    $product               = $args['product'];
	    $attribute             = $args['attribute'];
	    $name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
	    $id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
	    $class                 = $args['class'];
	    $show_option_none      = (bool)$args['show_option_none'];
	    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

	    if(empty($options) && !empty($product) && !empty($attribute)) {
		    $attributes = $product->get_variation_attributes();
		    $options    = $attributes[$attribute];
	    }

	    $radios = '<div class="variation-radios">';
	    $styles = '<style>';

	    if(!empty($options)) {
		    if($product && taxonomy_exists($attribute)) {
			    $terms = wc_get_product_terms($product->get_id(), $attribute, array(
				    'fields' => 'all',
			    ));

			    foreach($terms as $term) {
			        $color_picker = get_field('color_picker',$term);
			        $this_style_class = 'clicker-'.$attribute.'-'.$term->slug;
			        $styles .= '.variation-radios label span.'.$this_style_class.':before {'.'background-color: '.$color_picker.'} ';
				    if(in_array($term->slug, $options, true)) {
					    $radios .= '<label><input type="radio" data-imageID="1" name="'.esc_attr($name).'" value="'.esc_attr($term->slug).'" '.checked(sanitize_title($args['selected']), $term->slug, false).'><span class="'.$this_style_class.'">'.esc_html(apply_filters('woocommerce_variation_option_name', $term->name)).'</span></label>';
				    }
			    }
		    } else {
			    foreach($options as $option) {
				    $checked    = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'], sanitize_title($option), false) : checked($args['selected'], $option, false);
				    $radios    .= '<label><input type="radio" name="'.esc_attr($name).'" value="'.esc_attr($option).'" id="'.sanitize_title($option).'" '.$checked.'><span class="backdrop"></span><span>'.esc_html(apply_filters('woocommerce_variation_option_name', $option)).'</span></label>';
			    }
		    }
	    }

	    $styles .= '</style>';

	    $radios .= '</div>';

	    //$html = '<div>'.$html.'</div>'.$styles.$radios;
	    $html = '<div style="display: none;">'.$html.'</div>'.$styles.$radios;
    } /*else {

	    $html = '<div class="custom-select"><select id="' . esc_attr( $id ) . '" class="' . esc_attr( $class ) . '" name="' . esc_attr( $name ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-show_option_none="' . ( $show_option_none ? 'yes' : 'no' ) . '">';


	    if($attribute=='pa_boot-sizes'||$attribute=='pa_clothing-colours') {
		    $html .= '<option value="">CHOOSE SIZE</option>';
        } else {
		    $html .= '<option value="">' . esc_html( $show_option_none_text ) . '</option>';
        }


	    if ( ! empty( $options ) ) {
		    if ( $product && taxonomy_exists( $attribute ) ) {
			    // Get terms if this is a taxonomy - ordered. We need the names too.
			    $terms = wc_get_product_terms( $product->get_id(), $attribute, array(
				    'fields' => 'all',
			    ) );

			    foreach ( $terms as $term ) {
				    if ( in_array( $term->slug, $options, true ) ) {
					    $html .= '<option value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '</option>';
				    }
			    }
		    } else {
			    foreach ( $options as $option ) {
				    // This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
				    $selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
				    $html     .= '<option value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</option>';
			    }
		    }
	    }

	    $html .= '</select></div>';
    }*/
     return $html;
}


