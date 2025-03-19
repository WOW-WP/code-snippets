<?php
/**
 * Automatically applies a gift card balance as a discount at checkout.
 */
class WOWWP_Gift_Card_Auto_Apply {
    public function __construct() {
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_gift_card_balance']);
    }

    public function apply_gift_card_balance() {
        $gift_balance = 10; // Change this to dynamically fetch gift card balance
        if ($gift_balance > 0) {
            WC()->cart->add_fee(__('Gift Card Discount', 'woocommerce'), -$gift_balance);
        }
    }
}
new WOWWP_Gift_Card_Auto_Apply();
