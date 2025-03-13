<?php
    // This script creates a custom WordPress user role.
    // Customize the role name, display name, and capabilities inside the function.
    class WOWWP_Create_Custom_User_Role {
        public function __construct() {
            add_action('init', [$this, 'add_custom_user_role']);
        }
        public function add_custom_user_role() {
            add_role('custom_role', 'Custom Role', [
                'read' => true,
                'edit_posts' => false,
                'delete_posts' => false,
            ]);
        }
    }
    new WOWWP_Create_Custom_User_Role();
    