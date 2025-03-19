<?php
/**
 * Applies an automatic discount for first-time customers.
 */
class WOWWP_First_Time_Discount {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_discount']);
    }

    public function apply_discount() {
        $customer = wp_get_current_user();
        if (!get_user_meta($customer->ID, 'first_purchase', true)) {
            WC()->cart->add_fee(__('First Purchase Discount', 'woocommerce'), -5); // Change discount amount
            update_user_meta($customer->ID, 'first_purchase', true);
        }
    }
}
new WOWWP_First_Time_Discount();
