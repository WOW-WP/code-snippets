<?php
/**
 * Adds a "Buy Now" button next to the "Add to Cart" button.
 */
class WOWWP_Buy_Now_Button {
    public function __construct() {
        add_action('woocommerce_after_add_to_cart_button', [$this, 'add_buy_now_button']);
    }

    public function add_buy_now_button() {
        global $product;
        echo '<a href="' . esc_url(wc_get_checkout_url()) . '" class="button buy-now">Buy Now</a>';
    }
}
new WOWWP_Buy_Now_Button();
