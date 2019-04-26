<?php
/**
 * Created by PhpStorm.
 * User: Edward Nickerson
 * Date: 23/04/2019
 * Time: 16:07
 */

add_filter('http_request_args', 'tc_allow_unsafe_urls', 20, 2);
function tc_allow_unsafe_urls($args,$url) {
    $key = '86.188.157.12:5000';
    if (strpos($url, $key) == false) {
        $args['reject_unsafe_urls'] = true;
    }
    else {
        $args['reject_unsafe_urls'] = false;
    }
    return $args;
}