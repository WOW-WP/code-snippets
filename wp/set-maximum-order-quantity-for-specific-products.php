<?php
/**
 * Set a maximum order quantity for specific products.
 * Users can customize the product IDs and the maximum quantity.
 */
class WOWWP_Max_Order_Quantity {
    public function __construct() {
        add_action('woocommerce_before_calculate_totals', [$this, 'set_max_order_quantity']);
    }

    public function set_max_order_quantity($cart) {
        $max_quantity = 5; // Customize the maximum quantity
        $product_ids = [123, 456]; // Customize the product IDs

        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            if (in_array($cart_item['product_id'], $product_ids) && $cart_item['quantity'] > $max_quantity) {
                $cart_item['quantity'] = $max_quantity;
                wc_add_notice(sprintf(__('You can only purchase a maximum of %d of this product.', 'woocommerce'), $max_quantity), 'error');
            }
        }
    }
}

new WOWWP_Max_Order_Quantity();