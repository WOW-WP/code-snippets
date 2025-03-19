<?php
/**
 * Changes WooCommerce checkout button text.
 */
class WOWWP_Change_Checkout_Button {
    public function __construct() {
        add_filter('woocommerce_order_button_text', fn() => 'Place Your Order');
    }
}
new WOWWP_Change_Checkout_Button();
