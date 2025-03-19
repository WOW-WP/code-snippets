<?php
/**
 * Removes the WooCommerce cart icon from the header.
 */
class WOWWP_Remove_Cart_Icon {
    public function __construct() {
        add_action('wp', [$this, 'remove_cart_icon']);
    }

    public function remove_cart_icon() {
        remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20);
        remove_action('storefront_header', 'storefront_header_cart', 60); // For Storefront theme
    }
}
new WOWWP_Remove_Cart_Icon();
