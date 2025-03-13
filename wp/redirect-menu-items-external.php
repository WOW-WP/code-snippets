<?php
    class WOWWP_Redirect_Menu_Items {
        public function __construct() {
            add_filter('wp_get_nav_menu_items', [$this, 'redirect_menu_items'], 10, 3);
        }
        public function redirect_menu_items($items, $menu, $args) {
            foreach ($items as $item) {
                if ($item->title == 'Support') {
                    $item->url = 'https://external-site.com';
                }
            }
            return $items;
        }
    }
    new WOWWP_Redirect_Menu_Items();
    