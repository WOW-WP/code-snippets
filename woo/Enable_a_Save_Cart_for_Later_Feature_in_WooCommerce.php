<?php
/**
 * Enables a "Save Cart for Later" feature in WooCommerce.
 */
class WOWWP_Save_Cart_For_Later {
    public function __construct() {
        add_action('woocommerce_cart_actions', [$this, 'add_save_cart_button']);
        add_action('init', [$this, 'handle_save_cart']);
    }

    public function add_save_cart_button() {
        echo '<button type="submit" name="save_cart" class="button">Save Cart for Later</button>';
    }

    public function handle_save_cart() {
        if (isset($_POST['save_cart'])) {
            setcookie('saved_cart', json_encode(WC()->cart->get_cart()), time() + 86400, '/');
            WC()->cart->empty_cart();
        }
    }
}
new WOWWP_Save_Cart_For_Later();
