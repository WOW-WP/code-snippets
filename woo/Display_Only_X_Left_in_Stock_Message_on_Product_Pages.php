<?php
/**
 * Displays "Only X left in stock" message on product pages.
 */
class WOWWP_Stock_Alert {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'show_stock_message'], 15);
    }

    public function show_stock_message() {
        global $product;
        if ($product->is_in_stock() && $product->get_stock_quantity() <= 10) { // Change threshold as needed
            echo '<p class="stock-alert">Hurry! Only ' . esc_html($product->get_stock_quantity()) . ' left in stock.</p>';
        }
    }
}
new WOWWP_Stock_Alert();
