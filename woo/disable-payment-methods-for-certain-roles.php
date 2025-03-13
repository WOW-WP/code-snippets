<?php
// This script disables specific payment methods for certain user roles.
// Customize the roles and payment methods in the arrays.
class WOWWP_Disable_Payment_Methods_For_Roles {
    public function __construct() {
        add_filter('woocommerce_available_payment_gateways', [$this, 'restrict_payment_methods']);
    }
    public function restrict_payment_methods($gateways) {
        if (is_admin() || !is_user_logged_in()) return $gateways;
        $user = wp_get_current_user();
        $restricted_roles = ['subscriber'];
        $restricted_methods = ['cod']; // Example: Disable Cash on Delivery
        if (array_intersect($restricted_roles, $user->roles)) {
            foreach ($restricted_methods as $method) {
                if (isset($gateways[$method])) {
                    unset($gateways[$method]);
                }
            }
        }
        return $gateways;
    }
}
new WOWWP_Disable_Payment_Methods_For_Roles();
