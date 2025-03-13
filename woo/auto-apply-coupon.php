<?php
    // This script automatically applies a coupon at checkout.
    // Customize the $coupon_code variable to set your desired coupon code.
    class WOWWP_Auto_Apply_Coupon {
        public function __construct() {
            add_action('woocommerce_before_cart', [$this, 'apply_coupon_at_checkout']);
        }

        public function apply_coupon_at_checkout() {
            $coupon_code = 'YOUR_COUPON_CODE'; // Replace with your coupon code
            if (!WC()->cart->has_discount($coupon_code)) {
                WC()->cart->apply_coupon($coupon_code);
            }
        }
    }

    new WOWWP_Auto_Apply_Coupon();
    