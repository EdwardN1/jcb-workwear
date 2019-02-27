<?php
/**
 * Created by PhpStorm.
 * User: Edward Nickerson
 * Date: 16/12/2018
 * Time: 06:41
 */

add_filter( 'block_categories', function( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'jcbworkwear',
				'title' => __( 'JCB Workwear Blocks', 'jcbworkwearblocks' ),
			),
		)
	);
}, 10, 2 );
// Update CSS within in Admin
function admin_style() {
	$version=filemtime(get_template_directory().'/assets/styles/style.css');
	wp_enqueue_style('jcbworkwear-admin-styles', get_template_directory_uri().'/assets/styles/admin.css?v='.$version);
}
add_action('admin_enqueue_scripts', 'admin_style');

add_action( 'acf/init', 'acfgbc_ImageSlider' );
function acfgbc_ImageSlider() {
	if ( ! function_exists( 'acf_register_block' ) ) {
		return;
	}
	acf_register_block( array(
		'name'            => 'acfgbcImageSlider',
		'title'           => __( 'Image Slider' ),
		'description'     => __( 'Image Slider' ),
		'render_callback' => 'acfgbc_ImageSlider_rc',
		'category'        => 'jcbworkwear',
		'icon'            => 'tagcloud',
		'mode'            => 'preview',
		'supports'        => array( 'align' => false, 'multiple' => true, ),
		'keywords'        => array( 'Row', 'Common' ),
	) );
}
function acfgbc_ImageSlider_rc( $block, $content = '', $is_preview = false ) {
	if ($is_preview) {
		include_once get_template_directory().'/parts/blocks/editor/styles.php';
	}
	include get_template_directory(). '/parts/blocks/ImageSlider.php';
}