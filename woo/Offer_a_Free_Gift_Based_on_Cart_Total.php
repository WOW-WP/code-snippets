<?php
/**
 * Automatically adds a free gift if cart total exceeds a threshold.
 */
class WOWWP_Free_Gift {
    public function __construct() {
        add_action('woocommerce_before_calculate_totals', [$this, 'add_free_gift']);
    }

    public function add_free_gift($cart) {
        if ($cart->get_cart_contents_total() > 100) { // Adjust threshold
            $gift_id = 123; // Change to the product ID of your gift
            if (!$this->is_gift_in_cart($cart, $gift_id)) {
                $cart->add_to_cart($gift_id);
            }
        }
    }

    private function is_gift_in_cart($cart, $gift_id) {
        foreach ($cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] == $gift_id) {
                return true;
            }
        }
        return false;
    }
}
new WOWWP_Free_Gift();
