<?php
// This script displays the stock quantity on the WooCommerce product page.
// Customize display formatting as needed.
class WOWWP_Display_Stock_Quantity {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'show_stock_quantity'], 20);
    }
    public function show_stock_quantity() {
        global $product;
        if ($product->managing_stock() && $product->is_in_stock()) {
            echo '<p class="stock-quantity">' . sprintf(__('In stock: %s', 'woocommerce'), $product->get_stock_quantity()) . '</p>';
        }
    }
}
new WOWWP_Display_Stock_Quantity();
