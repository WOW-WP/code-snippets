<?php
/**
 * Adds a "Featured" badge to WooCommerce featured products.
 */
class WOWWP_Featured_Product_Badge {
    public function __construct() {
        add_action('woocommerce_before_shop_loop_item_title', [$this, 'add_featured_badge'], 10);
    }

    public function add_featured_badge() {
        global $product;
        if ($product->is_featured()) {
            echo '<span class="featured-badge">Featured</span>';
        }
    }
}
new WOWWP_Featured_Product_Badge();
