<?php
/**
 * Plugin Name: Sort Iconic Orders
 * Plugin URI: https://apgproduction.com
 * Description: Sorts Iconic delivery and collection orders by collection and delivery time.
 * Version: 0.1
 * Author: Anthony Garthwaite
 * Author URI: https://apgproduction.com
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter('woocommerce_rest_orders_prepare_object_query', function(array $args, \WP_REST_Request $request) {
    $orderby = $request->get_param('orderbydelivery');

    if (isset($orderby) && $orderby === 'true') {
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        $args['meta_key'] = 'jckwds_timestamp';
    }
    return $args;

}, 10, 2);