<?php
/**
 * Redirects customers to a custom thank-you page after checkout.
 */
class WOWWP_Custom_Thank_You {
    public function __construct() {
        add_action('woocommerce_thankyou', [$this, 'redirect_after_purchase']);
    }

    public function redirect_after_purchase($order_id) {
        wp_redirect(home_url('/thank-you'));
        exit;
    }
}
new WOWWP_Custom_Thank_You();
