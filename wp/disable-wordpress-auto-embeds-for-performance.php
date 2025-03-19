<?php
/**
 * Disables WordPress auto embeds to improve performance.
 */
class WOWWP_Disable_Auto_Embeds {
    public function __construct() {
        add_action('init', [$this, 'disable_embeds']);
    }

    public function disable_embeds() {
        remove_action('wp_head', 'wp_oembed_add_host_js');
        remove_action('wp_enqueue_scripts', 'wp_oembed_add_host_js');
        remove_filter('the_content', 'wp_oembed_autoembed');
    }
}
new WOWWP_Disable_Auto_Embeds();
