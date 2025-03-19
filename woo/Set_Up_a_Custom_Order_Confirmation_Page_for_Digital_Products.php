<?php
/**
 * Redirects digital product orders to a custom order confirmation page.
 */
class WOWWP_Digital_Order_Confirmation {
    public function __construct() {
        add_filter('woocommerce_get_checkout_order_received_url', [$this, 'redirect_for_digital_orders'], 10, 2);
    }

    public function redirect_for_digital_orders($url, $order) {
        foreach ($order->get_items() as $item) {
            if (wc_get_product($item->get_product_id())->is_virtual()) {
                return home_url('/digital-thank-you'); // Change this to your custom page URL
            }
        }
        return $url;
    }
}
new WOWWP_Digital_Order_Confirmation();
