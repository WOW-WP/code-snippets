<?php
/**
 * Displays a custom notice for first-time WooCommerce customers.
 */
class WOWWP_First_Time_Customer_Notice {
    public function __construct() {
        add_action('woocommerce_before_checkout_form', [$this, 'show_notice']);
    }

    public function show_notice() {
        if (!get_user_meta(get_current_user_id(), '_has_purchased', true)) {
            echo '<div class="woocommerce-message">Welcome! Enjoy a 10% discount on your first order.</div>';
        }
    }
}
new WOWWP_First_Time_Customer_Notice();
