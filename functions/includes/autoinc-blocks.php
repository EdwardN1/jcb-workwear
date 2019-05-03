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

/**
 * Image Slider Block
 */

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
		'icon'            => 'images-alt2',
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

/**
 * Detailed Category Columns
 */

add_action( 'acf/init', 'acfgbc_DetailedCategoryColumns' );
function acfgbc_DetailedCategoryColumns() {
	if ( ! function_exists( 'acf_register_block' ) ) {
		return;
	}
	acf_register_block( array(
		'name'            => 'acfgbcDetailedCategoryColumns',
		'title'           => __( 'Detailed Category Columns' ),
		'description'     => __( 'Detailed Category Columns' ),
		'render_callback' => 'acfgbc_DetailedCategoryColumns_rc',
		'category'        => 'jcbworkwear',
		'icon'            => 'tagcloud',
		'mode'            => 'preview',
		'supports'        => array( 'align' => false, 'multiple' => true, ),
		'keywords'        => array( 'Row', 'Common' ),
	) );
}
function acfgbc_DetailedCategoryColumns_rc( $block, $content = '', $is_preview = false ) {
	if ($is_preview) {
		include_once get_template_directory().'/parts/blocks/editor/styles.php';
	}
	include get_template_directory(). '/parts/blocks/DetailedCategoryColumns.php';
}
add_action( 'acf/init', 'acfgbc_HeadingwithSocialSharing' );
function acfgbc_HeadingwithSocialSharing() {
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }
    acf_register_block( array(
        'name'            => 'acfgbcHeadingwithSocialSharing',
        'title'           => __( 'Heading with Social Sharing' ),
        'description'     => __( 'Heading with Social Sharing' ),
        'render_callback' => 'acfgbc_HeadingwithSocialSharing_rc',
        'category'        => 'jcbworkwear',
        'icon'            => 'share',
        'mode'            => 'preview',
        'supports'        => array( 'align' => false, 'multiple' => true, ),
        'keywords'        => array( 'Row', 'Common' ),
    ) );
}
function acfgbc_HeadingwithSocialSharing_rc( $block, $content = '', $is_preview = false ) {
    if ($is_preview) {
        include_once get_template_directory().'/parts/blocks/editor/styles.php';
    }
    include get_template_directory(). '/parts/blocks/HeadingwithSocialSharing.php';
}
add_action( 'acf/init', 'acfgbc_ImageList' );
function acfgbc_ImageList() {
    if ( ! function_exists( 'acf_register_block' ) ) {
        return;
    }
    acf_register_block( array(
        'name'            => 'acfgbcImageList',
        'title'           => __( 'Image List' ),
        'description'     => __( 'Image List' ),
        'render_callback' => 'acfgbc_ImageList_rc',
        'category'        => 'jcbworkwear',
        'icon'            => 'list-view',
        'mode'            => 'preview',
        'supports'        => array( 'align' => false, 'multiple' => true, ),
        'keywords'        => array( 'Row', 'Common' ),
    ) );
}
function acfgbc_ImageList_rc( $block, $content = '', $is_preview = false ) {
    if ($is_preview) {
        include_once get_template_directory().'/parts/blocks/editor/styles.php';
    }
    include get_template_directory(). '/parts/blocks/ImageList.php';
}
