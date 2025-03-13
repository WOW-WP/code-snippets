<?php
    // This script changes the default user role after registration.
    // Customize the role by modifying the return value.
    class WOWWP_Change_Default_User_Role {
        public function __construct() {
            add_filter('pre_option_default_role', [$this, 'set_default_user_role']);
        }
        public function set_default_user_role($role) {
            return 'editor'; // Change to the desired role slug
        }
    }
    new WOWWP_Change_Default_User_Role();
    