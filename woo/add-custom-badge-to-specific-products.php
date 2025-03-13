<?php
// Adds a custom badge to specific products. Customize the product IDs and badge text.
class WOWWP_Add_Custom_Badge {
    public function __construct() {
        add_action('woocommerce_before_shop_loop_item_title', [$this, 'add_custom_badge']);
    }
    public function add_custom_badge() {
        global $product;
        $product_ids = [1, 2, 3]; // Example product IDs
        $badge_text = 'Special Offer';
        if (in_array($product->get_id(), $product_ids)) {
            echo '<span class="custom-badge">' . esc_html($badge_text) . '</span>';
        }
    }
}
new WOWWP_Add_Custom_Badge();