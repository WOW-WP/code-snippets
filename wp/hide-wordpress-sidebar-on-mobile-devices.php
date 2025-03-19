<?php
// Hides the WordPress sidebar on mobile devices. Add custom CSS styles.
class WOWWP_Hide_Sidebar_Mobile {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_custom_styles']);
    }
    public function enqueue_custom_styles() {
        wp_add_inline_style('theme-styles', '@media (max-width: 768px) { #sidebar { display: none; } }');
    }
}
new WOWWP_Hide_Sidebar_Mobile();
