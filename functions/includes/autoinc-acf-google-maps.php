<?php
/*// *******************  ACF Google Maps function ****************** //*/


function joints_acf_google_map_api($api)
{

	$api['key'] = '';

	return $api;

}

add_filter('acf/fields/google_map/api', 'joints_acf_google_map_api');