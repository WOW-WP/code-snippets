<?php
// This script adds an estimated delivery date on product pages.
// Customize the date format or range in the return statement.
class WOWWP_Estimated_Delivery_Date {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'display_delivery_date'], 20);
    }
    public function display_delivery_date() {
        echo '<p class="delivery-date">' . __('Estimated delivery: 3-5 business days', 'woocommerce') . '</p>';
    }
}
new WOWWP_Estimated_Delivery_Date();
