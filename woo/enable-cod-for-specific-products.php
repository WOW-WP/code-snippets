<?php
// This script enables Cash on Delivery (COD) payment method for specific products only.
// Customize the product IDs in the array.

class WOWWP_Enable_COD_For_Specific_Products {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'enable_cod_for_specific_products']);
    }

    public function enable_cod_for_specific_products($gateways) {
        if (is_admin() || !is_user_logged_in()) return $gateways;

        $allowed_product_ids = [123, 456]; // Example: Product IDs that allow COD
        $cart = WC()->cart->get_cart();

        $allow_cod = false;
        foreach ($cart as $cart_item) {
            if (in_array($cart_item['product_id'], $allowed_product_ids)) {
                $allow_cod = true;
                break;
            }
        }

        if (!$allow_cod && isset($gateways['cod'])) {
            unset($gateways['cod']);
        }

        return $gateways;
    }
}

new WOWWP_Enable_COD_For_Specific_Products();