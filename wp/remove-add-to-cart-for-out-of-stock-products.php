<?php
/**
 * Remove the "Add to Cart" button for out-of-stock products.
 */
class WOWWP_Remove_Add_To_Cart_Out_Of_Stock {
    public function __construct() {
        add_filter('woocommerce_is_purchasable', [$this, 'remove_add_to_cart_button'], 10, 2);
    }

    public function remove_add_to_cart_button($is_purchasable, $product) {
        if (!$product->is_in_stock()) {
            return false;
        }
        return $is_purchasable;
    }
}

new WOWWP_Remove_Add_To_Cart_Out_Of_Stock();