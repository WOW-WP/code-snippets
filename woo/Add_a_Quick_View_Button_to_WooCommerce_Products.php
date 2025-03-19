<?php
/**
 * Adds a quick view button to WooCommerce product listings.
 */
class WOWWP_Quick_View {
    public function __construct() {
        add_action('woocommerce_after_shop_loop_item', [$this, 'add_quick_view_button'], 15);
    }

    public function add_quick_view_button() {
        global $product;
        echo '<a href="' . esc_url(get_permalink($product->get_id())) . '" class="button quick-view">Quick View</a>';
    }
}
new WOWWP_Quick_View();
