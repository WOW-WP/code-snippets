<?php
/**
 * Automatically applies free shipping if a WooCommerce subscription is in the cart.
 */
class WOWWP_Free_Shipping_Subscriptions {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_free_shipping']);
    }

    public function apply_free_shipping() {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if (wc_get_product($cart_item['product_id'])->is_type('subscription')) {
                WC()->cart->add_fee('Free Shipping', 0);
                return;
            }
        }
    }
}
new WOWWP_Free_Shipping_Subscriptions();
