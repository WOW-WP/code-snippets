<?php
/**
 * Adds a custom text field to WooCommerce checkout.
 */
class WOWWP_Custom_Checkout_Field {
    public function __construct() {
        add_action('woocommerce_after_order_notes', [$this, 'add_custom_field']);
    }

    public function add_custom_field($checkout) {
        woocommerce_form_field('custom_note', [
            'type' => 'text',
            'label' => 'Additional Note',
            'required' => false,
        ], $checkout->get_value('custom_note'));
    }
}
new WOWWP_Custom_Checkout_Field();
