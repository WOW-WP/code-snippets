<?php
// Changes the placeholder text in checkout fields. Customize the placeholder texts.
class WOWWP_Change_Checkout_Placeholders {
    public function __construct() {
        add_filter('woocommerce_checkout_fields', [$this, 'change_placeholders']);
    }
    public function change_placeholders($fields) {
        $fields['billing']['billing_first_name']['placeholder'] = 'Your First Name';
        $fields['billing']['billing_last_name']['placeholder'] = 'Your Last Name';
        return $fields;
    }
}
new WOWWP_Change_Checkout_Placeholders();