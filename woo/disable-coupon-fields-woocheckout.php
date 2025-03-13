<?php
// This script removes the coupon field from the WooCommerce checkout page.
// No customization is needed.
class WOWWP_Disable_Coupon_Fields {
    public function __construct() {
        add_filter('woocommerce_coupons_enabled', '__return_false');
    }
}
new WOWWP_Disable_Coupon_Fields();
