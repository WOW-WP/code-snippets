<?php
/**
 * Displays a custom thank you message for first-time WooCommerce buyers.
 */
class WOWWP_First_Time_Thank_You {
    public function __construct() {
        add_action('woocommerce_thankyou', [$this, 'show_custom_message']);
    }

    public function show_custom_message($order_id) {
        $customer = wp_get_current_user();
        if (!$customer->has_purchased) {
            echo '<p class="woocommerce-message">Thank you for your first purchase! We appreciate your support.</p>';
            update_user_meta($customer->ID, 'has_purchased', true);
        }
    }
}
new WOWWP_First_Time_Thank_You();
