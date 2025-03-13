<?php
    // This script customizes the WooCommerce Thank You page.
    // Customize the content inside the function to display any custom message or details.
    class WOWWP_Customize_Thank_You_Page {
        public function __construct() {
            add_action('woocommerce_thankyou', [$this, 'custom_thank_you_message'], 10, 1);
        }

        public function custom_thank_you_message($order_id) {
            $order = wc_get_order($order_id);
            echo '<p>Thank you for your purchase! Your order number is ' . $order->get_order_number() . '.</p>';
            // You can add more custom content here
        }
    }

    new WOWWP_Customize_Thank_You_Page();
    