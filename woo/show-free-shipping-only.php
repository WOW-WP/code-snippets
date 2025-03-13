<?php
// This script hides other shipping methods when "Free Shipping" is available.
// No customization needed unless additional conditions are required.
class WOWWP_Restrict_Shipping_To_Free_Only {
    public function __construct() {
        add_filter('woocommerce_package_rates', [$this, 'limit_shipping_to_free_only'], 100);
    }
    public function limit_shipping_to_free_only($rates) {
        $free = [];
        foreach ($rates as $key => $rate) {
            if ('free_shipping' === $rate->method_id) {
                $free[$key] = $rate;
            }
        }
        return !empty($free) ? $free : $rates;
    }
}
new WOWWP_Restrict_Shipping_To_Free_Only();
