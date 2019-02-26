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
				'slug' => 'jcbblocks',
				'title' => __( 'JCB Blocks', 'jcbblocks' ),
			),
		)
	);
}, 10, 2 );


// Update CSS within in Admin
function admin_style() {
	$version=filemtime(get_template_directory().'/assets/styles/style.css');
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/styles/admin.css?v='.$version);
}
add_action('admin_enqueue_scripts', 'admin_style');

