<?php
// Displays product categories on the shop page instead of products.
class WOWWP_Display_Categories_Shop_Page {
    public function __construct() {
        add_action('woocommerce_before_main_content', [$this, 'display_categories'], 5);
    }
    public function display_categories() {
        if (is_shop()) {
            echo do_shortcode('[product_categories]');
            remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
            remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
            remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
            remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
        }
    }
}
new WOWWP_Display_Categories_Shop_Page();