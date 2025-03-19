<?php
/**
 * Customizes the WooCommerce checkout page layout for better UX.
 */
class WOWWP_Custom_Checkout_Layout {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'add_checkout_styles']);
    }

    public function add_checkout_styles() {
        wp_add_inline_style('woocommerce-general', '
            .woocommerce-checkout { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }
            .woocommerce-checkout #customer_details { order: 1; }
            .woocommerce-checkout #order_review { order: 2; background: #f7f7f7; padding: 15px; border-radius: 5px; }
        ');
    }
}
new WOWWP_Custom_Checkout_Layout();
