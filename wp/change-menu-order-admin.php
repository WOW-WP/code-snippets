<?php
    class WOWWP_Change_Menu_Order_Admin {
        public function __construct() {
            add_filter('custom_menu_order', '__return_true');
            add_filter('menu_order', [$this, 'set_menu_order']);
        }
        public function set_menu_order($menu_order) {
            return ['index.php', 'edit.php', 'upload.php', 'edit.php?post_type=page'];
        }
    }
    new WOWWP_Change_Menu_Order_Admin();
    