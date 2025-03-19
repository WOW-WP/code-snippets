<?php
// Removes the quantity field from product pages.
class WOWWP_Remove_Quantity_Field {
    public function __construct() {
        add_action('woocommerce_before_add_to_cart_quantity', [$this, 'remove_quantity_field']);
    }
    public function remove_quantity_field() {
        remove_action('woocommerce_before_add_to_cart_quantity', 'woocommerce_quantity_input');
    }
}
new WOWWP_Remove_Quantity_Field();