<?php
    class WOWWP_Hide_Menu_Items_By_Role {
        public function __construct() {
            add_filter('wp_get_nav_menu_items', [$this, 'filter_menu_items'], 10, 2);
        }
        public function filter_menu_items($items, $menu) {
            if (!current_user_can('administrator')) {
                foreach ($items as $key => $item) {
                    if ($item->title == 'Dashboard') {
                        unset($items[$key]);
                    }
                }
            }
            return $items;
        }
    }
    new WOWWP_Hide_Menu_Items_By_Role();
    