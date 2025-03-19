<?php
/**
 * Disables cart functionality for digital products.
 */
class WOWWP_Disable_Cart_Digital {
    public function __construct() {
        add_filter('woocommerce_is_purchasable', [$this, 'disable_for_digital'], 10, 2);
    }

    public function disable_for_digital($purchasable, $product) {
        return !$product->is_virtual();
    }
}
new WOWWP_Disable_Cart_Digital();
