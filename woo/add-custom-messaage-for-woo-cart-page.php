<?php
// This script displays a custom message at the top of the WooCommerce cart page.
// Customize the message content as needed.
class WOWWP_Custom_Cart_Message {
    public function __construct() {
        add_action('woocommerce_before_cart', [$this, 'display_custom_message']);
    }
    public function display_custom_message() {
        echo '<p class="custom-cart-message">Free shipping on orders over $50!</p>'; // Modify message text
    }
}
new WOWWP_Custom_Cart_Message();
