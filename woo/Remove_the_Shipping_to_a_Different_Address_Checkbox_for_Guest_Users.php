<?php
/**
 * Removes the "Ship to a Different Address" checkbox for guest users.
 */
class WOWWP_Remove_Shipping_Address_Checkbox {
    public function __construct() {
        add_filter('woocommerce_cart_needs_shipping_address', [$this, 'remove_checkbox']);
    }

    public function remove_checkbox($needs_address) {
        return is_user_logged_in() ? $needs_address : false;
    }
}
new WOWWP_Remove_Shipping_Address_Checkbox();
