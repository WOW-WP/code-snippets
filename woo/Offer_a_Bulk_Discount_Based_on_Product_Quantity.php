<?php
/**
 * Applies a bulk discount based on the quantity of products in the cart.
 */
class WOWWP_Bulk_Discount {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_bulk_discount']);
    }

    public function apply_bulk_discount() {
        if (WC()->cart->get_cart_contents_count() >= 10) { // Change threshold as needed
            WC()->cart->add_fee(__('Bulk Discount', 'woocommerce'), -10); // Change discount amount
        }
    }
}
new WOWWP_Bulk_Discount();
