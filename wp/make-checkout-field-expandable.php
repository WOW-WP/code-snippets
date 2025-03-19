<?php
/**
 * Make checkout fields expandable for a cleaner layout.
 */
class WOWWP_Expandable_Checkout_Fields {
    public function __construct() {
        add_action('woocommerce_after_checkout_form', [$this, 'enqueue_scripts']);
        add_action('woocommerce_checkout_before_customer_details', [$this, 'start_expandable_section']);
        add_action('woocommerce_checkout_after_customer_details', [$this, 'end_expandable_section']);
    }

    public function enqueue_scripts() {
        wp_enqueue_script('expandable-checkout-fields', plugin_dir_url(__FILE__) . 'expandable-checkout-fields.js', ['jquery'], null, true);
    }

    public function start_expandable_section() {
        echo '<div class="expandable-checkout-fields">';
    }

    public function end_expandable_section() {
        echo '</div>';
    }
}

new WOWWP_Expandable_Checkout_Fields();