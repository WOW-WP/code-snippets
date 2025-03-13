<?php
    // This script hides the admin bar for all users except admins.
    // No customization needed unless modifying role access.
    class WOWWP_Hide_Admin_Bar {
        public function __construct() {
            add_filter('show_admin_bar', [$this, 'disable_admin_bar']);
        }
        public function disable_admin_bar($show) {
            return current_user_can('administrator') ? $show : false;
        }
    }
    new WOWWP_Hide_Admin_Bar();
    