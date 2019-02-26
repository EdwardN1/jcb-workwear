<?php
// ******************* ACF Options Page ****************** //

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Options',
		'menu_slug' => 'options',
		'capability' => 'edit_posts',
		'redirect' => false
	));

	if ($current_user->user_email == 'edward@technicks.com') {
		acf_add_options_page(array(
			'page_title' => 'Super Settings',
			'menu_title' => 'Super Settings',
			'menu_slug' => 'super-settings',
			'capability' => 'edit_posts',
			'redirect' => false
		));
	}


}
