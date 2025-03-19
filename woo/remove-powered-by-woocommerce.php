<?php
/**
 * Removes the "Powered by WooCommerce" footer text.
 */
class WOWWP_Remove_WooCommerce_Footer {
    public function __construct() {
        add_filter('woocommerce_credit_card_form_fields', [$this, 'remove_footer']);
    }

    public function remove_footer($fields) {
        return '';
    }
}
new WOWWP_Remove_WooCommerce_Footer();
