<?php
/**
 * Customizes the WooCommerce default pagination style.
 */
class WOWWP_Custom_Pagination {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_custom_styles']);
    }

    public function enqueue_custom_styles() {
        wp_add_inline_style('woocommerce-general', '
            .woocommerce-pagination ul { display: flex; gap: 10px; justify-content: center; }
            .woocommerce-pagination ul li a { background: #0073aa; color: #fff; padding: 10px 15px; border-radius: 5px; }
        ');
    }
}
new WOWWP_Custom_Pagination();
