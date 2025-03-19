<?php
/**
 * Removes the "Order Again" button from the WooCommerce My Account page.
 */
class WOWWP_Remove_Order_Again_Button {
    public function __construct() {
        add_filter('woocommerce_order_again_button', '__return_false');
    }
}
new WOWWP_Remove_Order_Again_Button();
