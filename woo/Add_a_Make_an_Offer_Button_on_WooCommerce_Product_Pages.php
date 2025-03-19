<?php
/**
 * Adds a "Make an Offer" button to WooCommerce product pages.
 */
class WOWWP_Make_An_Offer {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'add_offer_button'], 30);
    }

    public function add_offer_button() {
        echo '<a href="mailto:sales@example.com" class="button">Make an Offer</a>'; // Change email
    }
}
new WOWWP_Make_An_Offer();
