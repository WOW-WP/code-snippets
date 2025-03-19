<?php
/**
 * Displays the price per unit for variable products in WooCommerce.
 */
class WOWWP_Variable_Product_Unit_Price {
    public function __construct() {
        add_filter('woocommerce_get_price_html', [$this, 'display_price_per_unit'], 10, 2);
    }

    public function display_price_per_unit($price, $product) {
        if ($product->is_type('variable')) {
            $unit = 'per unit'; // Change unit as needed
            return $price . ' <small>(' . $unit . ')</small>';
        }
        return $price;
    }
}
new WOWWP_Variable_Product_Unit_Price();
