<?php
/**
 * Redirects customers to a custom thank you page based on the purchased product.
 */
class WOWWP_Custom_Thank_You_Page {
    public function __construct() {
        add_filter('woocommerce_get_checkout_order_received_url', [$this, 'custom_thank_you_page'], 10, 2);
    }

    public function custom_thank_you_page($url, $order) {
        foreach ($order->get_items() as $item) {
            if ($item->get_product_id() == 123) { // Change to your product ID
                return home_url('/thank-you-special');
            }
        }
        return $url;
    }
}
new WOWWP_Custom_Thank_You_Page();
