<?php
/**
 * Enables WooCommerce guest checkout by default.
 */
class WOWWP_Enable_Guest_Checkout {
    public function __construct() {
        add_filter('pre_option_woocommerce_enable_guest_checkout', '__return_yes');
    }
}
new WOWWP_Enable_Guest_Checkout();
