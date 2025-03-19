<?php
/**
 * Adds custom meta descriptions to WordPress pages.
 * Customize by modifying the get_meta_description function.
 */
class WOWWP_Meta_Description {
    public function __construct() {
        add_action('wp_head', [$this, 'add_meta_description']);
    }

    public function add_meta_description() {
        if (is_singular()) {
            echo '<meta name="description" content="' . esc_attr($this->get_meta_description()) . '">';
        }
    }

    private function get_meta_description() {
        return get_the_excerpt() ?: 'Default meta description for SEO.';
    }
}
new WOWWP_Meta_Description();
