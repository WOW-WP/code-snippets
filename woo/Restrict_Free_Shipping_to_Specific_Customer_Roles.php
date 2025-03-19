<?php
/**
 * Restricts free shipping to specific customer roles in WooCommerce.
 */
class WOWWP_Restrict_Free_Shipping {
    public function __construct() {
        add_filter('woocommerce_shipping_free_shipping_is_available', [$this, 'restrict_free_shipping'], 10, 2);
    }

    public function restrict_free_shipping($is_available, $package) {
        if (!current_user_can('subscriber')) { // Change to desired role
            return false;
        }
        return $is_available;
    }
}
new WOWWP_Restrict_Free_Shipping();
