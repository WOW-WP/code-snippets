<?php
/**
 * Removes the "Ship to a Different Address" option from WooCommerce checkout.
 */
class WOWWP_Remove_Shipping_Option {
    public function __construct() {
        add_filter('woocommerce_cart_needs_shipping_address', '__return_false');
    }
}
new WOWWP_Remove_Shipping_Option();
