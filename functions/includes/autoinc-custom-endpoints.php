<?php
add_action('rest_api_init', function () {
    register_rest_route( 'jcb/v1', 'tags-with-data/',array(
        'methods'  => 'GET',
        'callback' => 'get_latest_posts_by_category'
    ));
});
function get_latest_posts_by_category($request) {

    $posts = get_posts();

    $terms = get_terms( 'product_tag' );
    $term_array = array();
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $term_data = array();
            $term_data["term_id"] =  $term->term_id;
            $epim_reference = get_field('epim_reference',$term);
            $term_data["epim_reference"] = $epim_reference;
            if(!(empty($term_data))) {
                $term_array[] = $term_data;
            }
        }
    }

    if (empty($term_array)) {
        return new WP_Error( 'empty_category', 'there are no terms', array('status' => 404) );

    }

    $response = new WP_REST_Response($term_array);
    $response->set_status(200);

    return $response;
}