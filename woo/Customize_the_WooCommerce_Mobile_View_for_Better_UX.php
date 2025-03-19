<?php
/**
 * Customizes the WooCommerce mobile view for better UX.
 */
class WOWWP_Custom_Mobile_View {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_mobile_styles']);
    }

    public function enqueue_mobile_styles() {
        wp_add_inline_style('woocommerce-general', '
            @media (max-width: 768px) {
                .woocommerce ul.products { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
                .woocommerce ul.products li.product { text-align: center; }
            }
        ');
    }
}
new WOWWP_Custom_Mobile_View();
