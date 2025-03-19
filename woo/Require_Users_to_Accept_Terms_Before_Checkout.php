<?php
/**
 * Requires users to accept terms before proceeding to checkout.
 */
class WOWWP_Require_Terms_Checkout {
    public function __construct() {
        add_action('woocommerce_checkout_process', [$this, 'validate_terms_acceptance']);
    }

    public function validate_terms_acceptance() {
        if (empty($_POST['terms_acceptance'])) {
            wc_add_notice(__('You must accept the terms and conditions to proceed.'), 'error');
        }
    }
}
new WOWWP_Require_Terms_Checkout();
