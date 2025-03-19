<?php
/**
 * Displays a custom message when the WooCommerce cart is empty.
 * Modify the message inside get_custom_empty_cart_message function.
 */
class WOWWP_Custom_Empty_Cart_Message {
    public function __construct() {
        add_action('woocommerce_cart_is_empty', [$this, 'show_custom_message']);
    }

    public function show_custom_message() {
        echo '<p class="custom-empty-cart-message">' . esc_html($this->get_custom_empty_cart_message()) . '</p>';
    }

    private function get_custom_empty_cart_message() {
        return 'Your cart is empty. Browse our store and add some products!';
    }
}
new WOWWP_Custom_Empty_Cart_Message();
