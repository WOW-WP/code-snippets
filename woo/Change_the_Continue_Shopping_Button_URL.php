<?php
/**
 * Changes the "Continue Shopping" button URL in WooCommerce.
 * Modify the URL inside get_custom_url function.
 */
class WOWWP_Change_Continue_Shopping_URL {
    public function __construct() {
        add_filter('woocommerce_return_to_shop_redirect', [$this, 'custom_continue_shopping_url']);
    }

    public function custom_continue_shopping_url() {
        return home_url('/shop'); // Change this URL
    }
}
new WOWWP_Change_Continue_Shopping_URL();
