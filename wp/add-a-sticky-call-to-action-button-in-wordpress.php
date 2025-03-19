<?php
// Adds a sticky call-to-action button in WordPress. Customize the button text and link.
class WOWWP_Sticky_CTA_Button {
    public function __construct() {
        add_action('wp_footer', [$this, 'add_sticky_cta_button']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_custom_styles']);
    }
    public function add_sticky_cta_button() {
        echo '<a href="' . esc_url(home_url('/contact')) . '" class="sticky-cta-button">Contact Us</a>';
    }
    public function enqueue_custom_styles() {
        wp_add_inline_style('theme-styles', '.sticky-cta-button { position: fixed; bottom: 20px; right: 20px; background-color: #ff0000; color: #ffffff; padding: 10px 20px; border-radius: 5px; text-decoration: none; }');
    }
}
new WOWWP_Sticky_CTA_Button();