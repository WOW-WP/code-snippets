<?php
/**
 * Redirects WooCommerce customers to a custom thank you page after purchase.
 * Change the URL inside the get_redirect_url function.
 */
class WOWWP_Redirect_After_Purchase {
    public function __construct() {
        add_action('woocommerce_thankyou', [$this, 'redirect_after_purchase']);
    }

    public function redirect_after_purchase($order_id) {
        if (!$order_id) return;
        wp_redirect($this->get_redirect_url());
        exit;
    }

    private function get_redirect_url() {
        return home_url('/thank-you');
    }
}
new WOWWP_Redirect_After_Purchase();
