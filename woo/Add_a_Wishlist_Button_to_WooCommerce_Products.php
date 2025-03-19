<?php
/**
 * Adds a simple wishlist button to WooCommerce products.
 */
class WOWWP_Wishlist_Button {
    public function __construct() {
        add_action('woocommerce_after_shop_loop_item', [$this, 'add_wishlist_button'], 20);
    }

    public function add_wishlist_button() {
        echo '<button class="wishlist-button" onclick="alert('Added to wishlist!');">❤️ Add to Wishlist</button>';
    }
}
new WOWWP_Wishlist_Button();
