<?php
/**
 * Sets local pickup as the default shipping method in WooCommerce.
 */
class WOWWP_Default_Local_Pickup {
    public function __construct() {
        add_filter('woocommerce_shipping_chosen_method', [$this, 'set_default_shipping'], 10, 2);
    }

    public function set_default_shipping($method, $available_methods) {
        return isset($available_methods['local_pickup']) ? 'local_pickup' : $method;
    }
}
new WOWWP_Default_Local_Pickup();
