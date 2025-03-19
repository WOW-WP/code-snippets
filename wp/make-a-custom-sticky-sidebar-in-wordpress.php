<?php
// Makes a custom sticky sidebar in WordPress. Customize the sidebar ID.
class WOWWP_Sticky_Sidebar {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_sticky_sidebar_script']);
    }
    public function enqueue_sticky_sidebar_script() {
        wp_enqueue_script('sticky-sidebar', 'https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js', ['jquery'], null, true);
        wp_add_inline_script('sticky-sidebar', 'jQuery(document).ready(function($) { new StickySidebar("#sidebar", {topSpacing: 20, bottomSpacing: 20}); });');
    }
}
new WOWWP_Sticky_Sidebar();