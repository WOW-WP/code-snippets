<?php
/**
 * Changes the default WooCommerce product image hover effect.
 * Modify the CSS inside add_custom_styles function.
 */
class WOWWP_Product_Hover_Effect {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'add_custom_styles']);
    }

    public function add_custom_styles() {
        wp_add_inline_style('woocommerce-general', '
            .woocommerce ul.products li.product img { transition: transform 0.3s ease-in-out; }
            .woocommerce ul.products li.product:hover img { transform: scale(1.1); }
        ');
    }
}
new WOWWP_Product_Hover_Effect();
