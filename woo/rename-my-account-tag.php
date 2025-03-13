<?php
// This script renames the "My Account" tabs in WooCommerce.
// Customize tab names by modifying the array keys.
class WOWWP_Rename_My_Account_Tabs {
    public function __construct() {
        add_filter('woocommerce_account_menu_items', [$this, 'rename_account_tabs']);
    }
    public function rename_account_tabs($items) {
        if (isset($items['dashboard'])) {
            $items['dashboard'] = __('Dashboard', 'woocommerce');
        }
        if (isset($items['orders'])) {
            $items['orders'] = __('My Orders', 'woocommerce');
        }
        return $items;
    }
}
new WOWWP_Rename_My_Account_Tabs();
