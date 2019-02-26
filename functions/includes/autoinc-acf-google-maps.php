<?php
/*// *******************  ACF Google Maps function ****************** //*/


function joints_acf_google_map_api($api)
{

	$api['key'] = 'AIzaSyBj4Qpiibr495_xFtYamXIxUrvocOWKf0Q';

	return $api;

}

add_filter('acf/fields/google_map/api', 'joints_acf_google_map_api');