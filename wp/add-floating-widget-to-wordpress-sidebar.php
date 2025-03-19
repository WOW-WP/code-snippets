<?php
/**
 * Adds a floating widget to the WordPress sidebar.
 */
class WOWWP_Floating_Widget {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function enqueue_styles() {
        wp_add_inline_style('wp-block-library', '.floating-widget { position: fixed; bottom: 20px; right: 20px; width: 300px; background: #fff; padding: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }');
    }
}
new WOWWP_Floating_Widget();
