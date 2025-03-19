<?php
/**
 * Limits payment methods based on product categories in WooCommerce.
 */
class WOWWP_Limit_Payment_By_Category {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'restrict_payment_methods']);
    }

    public function restrict_payment_methods($gateways) {
        foreach (WC()->cart->get_cart() as $cart_item) {
            $product = wc_get_product($cart_item['product_id']);
            if (has_term('restricted-category', 'product_cat', $product->get_id())) {
                unset($gateways['cod']); // Disable Cash on Delivery
            }
        }
        return $gateways;
    }
}
new WOWWP_Limit_Payment_By_Category();
