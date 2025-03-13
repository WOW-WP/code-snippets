<?php
// This script makes the phone field optional in the WooCommerce checkout.
// No customization needed unless additional fields should be modified.
class WOWWP_Optional_Phone_Field {
    public function __construct() {
        add_filter('woocommerce_billing_fields', [$this, 'make_phone_optional']);
    }
    public function make_phone_optional($fields) {
        $fields['billing_phone']['required'] = false;
        return $fields;
    }
}
new WOWWP_Optional_Phone_Field();
