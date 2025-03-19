<?php
/**
 * Removes billing address fields when only digital products are in the cart.
 */
class WOWWP_Remove_Billing_Digital {
    public function __construct() {
        add_filter('woocommerce_checkout_fields', [$this, 'remove_billing_fields']);
    }

    public function remove_billing_fields($fields) {
        if ($this->only_digital_products()) {
            unset($fields['billing']['billing_address_1']);
            unset($fields['billing']['billing_address_2']);
            unset($fields['billing']['billing_city']);
            unset($fields['billing']['billing_postcode']);
        }
        return $fields;
    }

    private function only_digital_products() {
        foreach (WC()->cart->get_cart() as $cart_item) {
            if (!wc_get_product($cart_item['product_id'])->is_virtual()) {
                return false;
            }
        }
        return true;
    }
}
new WOWWP_Remove_Billing_Digital();
