<?php
/**
 * Requires phone number verification for Cash on Delivery orders.
 */
class WOWWP_COD_Phone_Verification {
    public function __construct() {
        add_action('woocommerce_checkout_process', [$this, 'validate_phone_for_cod']);
    }

    public function validate_phone_for_cod() {
        $payment_method = WC()->session->get('chosen_payment_method');
        if ($payment_method === 'cod' && empty($_POST['billing_phone'])) {
            wc_add_notice(__('Phone number is required for Cash on Delivery orders.', 'woocommerce'), 'error');
        }
    }
}
new WOWWP_COD_Phone_Verification();
