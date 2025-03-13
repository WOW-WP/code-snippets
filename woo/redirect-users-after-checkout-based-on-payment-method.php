<?php
// This script redirects users to a custom page after checkout based on payment method.
// Customize the $redirect_urls array to set specific redirections per gateway.
class WOWWP_Redirect_After_Checkout {
    public function __construct() {
        add_filter('woocommerce_thankyou', [$this, 'redirect_after_checkout'], 10, 1);
    }
    public function redirect_after_checkout($order_id) {
        $order = wc_get_order($order_id);
        $payment_method = $order->get_payment_method();
        $redirect_urls = [
            'cod' => home_url('/thank-you-cod'), 
            'paypal' => home_url('/thank-you-paypal')
        ];
        if (isset($redirect_urls[$payment_method])) {
            wp_redirect($redirect_urls[$payment_method]);
            exit;
        }
    }
}
new WOWWP_Redirect_After_Checkout();
