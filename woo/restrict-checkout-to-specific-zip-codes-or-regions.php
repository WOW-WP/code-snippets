<?php
// Restricts checkout to specific zip codes or regions. Customize the allowed zip codes.
class WOWWP_Restrict_Checkout_Zip_Codes {
    public function __construct() {
        add_action('woocommerce_after_checkout_validation', [$this, 'restrict_checkout'], 10, 2);
    }
    public function restrict_checkout($data, $errors) {
        $allowed_zip_codes = ['12345', '67890']; // Example zip codes
        if (!in_array($data['billing_postcode'], $allowed_zip_codes)) {
            $errors->add('validation', 'Sorry, we do not deliver to your zip code.');
        }
    }
}
new WOWWP_Restrict_Checkout_Zip_Codes();