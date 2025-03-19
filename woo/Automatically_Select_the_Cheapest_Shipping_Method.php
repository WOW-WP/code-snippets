<?php
/**
 * Automatically selects the cheapest available shipping method in WooCommerce.
 */
class WOWWP_Auto_Select_Cheapest_Shipping {
    public function __construct() {
        add_filter('woocommerce_shipping_chosen_method', [$this, 'set_cheapest_shipping'], 10, 2);
    }

    public function set_cheapest_shipping($method, $available_methods) {
        if (!empty($available_methods)) {
            $cheapest = array_reduce($available_methods, function($cheapest, $rate) {
                return (!$cheapest || $rate->cost < $cheapest->cost) ? $rate : $cheapest;
            });
            return $cheapest->id;
        }
        return $method;
    }
}
new WOWWP_Auto_Select_Cheapest_Shipping();
