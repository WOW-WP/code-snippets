<?php
/**
 * Customizes the WooCommerce order confirmation email.
 */
class WOWWP_Custom_Order_Email {
    public function __construct() {
        add_filter('woocommerce_email_order_details', [$this, 'modify_order_email'], 10, 4);
    }

    public function modify_order_email($order, $sent_to_admin, $plain_text, $email) {
        echo '<p>Thank you for your purchase! We appreciate your support.</p>';
    }
}
new WOWWP_Custom_Order_Email();
