<?php
    // This script removes the "Dashboard" menu item for non-admins.
    // No customization needed unless allowing specific roles.
    class WOWWP_Remove_Dashboard_Menu {
        public function __construct() {
            add_action('admin_menu', [$this, 'remove_dashboard_for_non_admins']);
        }
        public function remove_dashboard_for_non_admins() {
            if (!current_user_can('administrator')) {
                remove_menu_page('index.php');
            }
        }
    }
    new WOWWP_Remove_Dashboard_Menu();
    