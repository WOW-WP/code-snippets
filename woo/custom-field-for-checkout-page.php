<?php
// This script adds a custom field to the WooCommerce checkout page.
// Customize field label, placeholder, and meta key as needed.
class WOWWP_Add_Custom_Field_To_Checkout {
    public function __construct() {
        add_action('woocommerce_after_order_notes', [$this, 'display_custom_checkout_field']);
        add_action('woocommerce_checkout_update_order_meta', [$this, 'save_custom_checkout_field']);
    }
    public function display_custom_checkout_field($checkout) {
        echo '<div id="custom_checkout_field"><h2>' . __('Additional Info', 'woocommerce') . '</h2>';
        woocommerce_form_field('custom_field', [
            'type'        => 'text',
            'class'       => ['form-row-wide'],
            'label'       => __('Custom Field', 'woocommerce'),
            'placeholder' => __('Enter custom info here', 'woocommerce'),
        ], $checkout->get_value('custom_field'));
        echo '</div>';
    }
    public function save_custom_checkout_field($order_id) {
        if (!empty($_POST['custom_field'])) {
            update_post_meta($order_id, '_custom_field', sanitize_text_field($_POST['custom_field']));
        }
    }
}
new WOWWP_Add_Custom_Field_To_Checkout();
