<?php
// This script replaces "Add to Cart" with "Buy Now", redirects users directly to checkout, 
// removes the "added to cart" message, and ensures only one product is in the cart per purchase.

class WOWWP_Replace_Add_To_Cart_With_Buy_Now {
    public function __construct() {
        add_filter('woocommerce_product_single_add_to_cart_text', [$this, 'change_button_text']);
        add_filter('woocommerce_product_add_to_cart_text', [$this, 'change_button_text']);
        add_filter('woocommerce_add_to_cart_redirect', [$this, 'redirect_to_checkout']);
        add_filter('woocommerce_loop_add_to_cart_link', [$this, 'replace_loop_add_to_cart_button'], 10, 2);
        add_filter('wc_add_to_cart_message_html', [$this, 'remove_add_to_cart_message'], 10, 2);
        add_action('woocommerce_before_cart', [$this, 'reset_cart_before_buy_now']);
    }

    // Change the "Add to Cart" button text to "Buy Now"
    public function change_button_text() {
        return __('Buy Now', 'woocommerce');
    }

    // Redirect to the checkout page after clicking "Buy Now"
    public function redirect_to_checkout($url) {
        return wc_get_checkout_url();
    }

    // Modify the button on the shop page to redirect to checkout with a single product
    public function replace_loop_add_to_cart_button($button, $product) {
        $checkout_url = wc_get_checkout_url();
        return '<a href="' . esc_url($checkout_url . '?buy-now=' . $product->get_id()) . '" 
            class="button buy-now">' . __('Buy Now', 'woocommerce') . '</a>';
    }

    // Remove the "has been added to your cart" message
    public function remove_add_to_cart_message($message, $products) {
        return '';
    }

    // Reset the cart before adding a new product (Buy Now)
    public function reset_cart_before_buy_now() {
        if (isset($_GET['buy-now'])) {
            WC()->cart->empty_cart(); // Clear the cart
            $product_id = intval($_GET['buy-now']);
            WC()->cart->add_to_cart($product_id); // Add the new product
            wp_safe_redirect(wc_get_checkout_url()); // Redirect to checkout
            exit;
        }
    }
}

new WOWWP_Replace_Add_To_Cart_With_Buy_Now();
