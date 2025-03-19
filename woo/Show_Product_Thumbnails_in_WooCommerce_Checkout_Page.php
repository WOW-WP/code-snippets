<?php
/**
 * Displays product thumbnails in the WooCommerce checkout page order summary.
 */
class WOWWP_Checkout_Product_Thumbnails {
    public function __construct() {
        add_filter('woocommerce_cart_item_name', [$this, 'add_product_thumbnail'], 10, 2);
    }

    public function add_product_thumbnail($name, $cart_item) {
        $thumbnail = get_the_post_thumbnail($cart_item['product_id'], 'thumbnail');
        return $thumbnail . ' ' . $name;
    }
}
new WOWWP_Checkout_Product_Thumbnails();
