<?php
/**
 * Displays tiered pricing for wholesale buyers in WooCommerce.
 */
class WOWWP_Tiered_Pricing {
    public function __construct() {
        add_action('woocommerce_single_product_summary', [$this, 'display_tiered_pricing'], 25);
    }

    public function display_tiered_pricing() {
        echo '<ul class="tiered-pricing">
            <li>Buy 5+ for 10% off</li>
            <li>Buy 10+ for 20% off</li>
        </ul>';
    }
}
new WOWWP_Tiered_Pricing();
