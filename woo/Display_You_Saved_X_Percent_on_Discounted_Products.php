<?php
/**
 * Displays the percentage saved on discounted products.
 */
class WOWWP_Savings_Display {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'show_savings'], 10, 2);
    }

    public function show_savings($price, $product) {
        if ($product->is_on_sale()) {
            $discount = round((($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100);
            return $price . ' <small>(You saved ' . $discount . '%)</small>';
        }
        return $price;
    }
}
new WOWWP_Savings_Display();
