<?php
/**
 * Display a message for products on backorder.
 * Users can customize the message.
 */
class WOWWP_Backorder_Message {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'display_backorder_message'], 20);
    }

    public function display_backorder_message() {
        global $product;
        if ($product->is_on_backorder()) {
            echo '<p class="backorder-message">' . __('This product is on backorder and will be shipped later.', 'woocommerce') . '</p>';
        }
    }
}

new WOWWP_Backorder_Message();