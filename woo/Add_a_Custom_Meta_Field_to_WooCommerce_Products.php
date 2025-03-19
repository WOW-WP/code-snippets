<?php
/**
 * Adds a custom meta field to WooCommerce products.
 */
class WOWWP_Custom_Product_Meta {
    public function __construct() {
        add_action('woocommerce_product_options_general_product_data', [$this, 'add_custom_meta_field']);
        add_action('woocommerce_process_product_meta', [$this, 'save_custom_meta_field']);
    }

    public function add_custom_meta_field() {
        woocommerce_wp_text_input([
            'id' => '_custom_product_meta',
            'label' => 'Custom Product Meta',
            'desc_tip' => true,
            'description' => 'Enter custom product details.',
        ]);
    }

    public function save_custom_meta_field($post_id) {
        $custom_meta = $_POST['_custom_product_meta'] ?? '';
        update_post_meta($post_id, '_custom_product_meta', sanitize_text_field($custom_meta));
    }
}
new WOWWP_Custom_Product_Meta();
