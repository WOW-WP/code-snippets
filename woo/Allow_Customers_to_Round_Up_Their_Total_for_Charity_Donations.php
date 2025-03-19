<?php
/**
 * Allows customers to round up their total for charity donations.
 */
class WOWWP_Round_Up_Donation {
    public function __construct() {
        add_action('woocommerce_review_order_before_submit', [$this, 'add_donation_checkbox']);
        add_action('woocommerce_cart_calculate_fees', [$this, 'apply_donation']);
    }

    public function add_donation_checkbox() {
        echo '<p><label><input type="checkbox" name="round_up_donation"> Round up for charity</label></p>';
    }

    public function apply_donation() {
        if (isset($_POST['round_up_donation'])) {
            $round_up_amount = ceil(WC()->cart->total) - WC()->cart->total;
            WC()->cart->add_fee(__('Charity Donation', 'woocommerce'), $round_up_amount);
        }
    }
}
new WOWWP_Round_Up_Donation();
