<?php
// This script changes the default sender name and email for WooCommerce emails.
// Customize the sender name and email address in the return values.
class WOWWP_Change_Email_Sender {
    public function __construct() {
        add_filter('woocommerce_email_from_name', [$this, 'change_email_sender_name']);
        add_filter('woocommerce_email_from_address', [$this, 'change_email_sender_address']);
    }
    public function change_email_sender_name($name) {
        return 'Your Store Name'; // Change to your store name
    }
    public function change_email_sender_address($email) {
        return 'yourstore@example.com'; // Change to your desired email address
    }
}
new WOWWP_Change_Email_Sender();
