<?php
/**
 * Adds a noindex tag to prevent indexing of specific pages.
 * Modify the condition inside should_noindex function.
 */
class WOWWP_NoIndex_Pages {
    public function __construct() {
        add_action('wp_head', [$this, 'add_noindex_meta']);
    }

    public function add_noindex_meta() {
        if ($this->should_noindex()) {
            echo '<meta name="robots" content="noindex, nofollow">';
        }
    }

    private function should_noindex() {
        return is_page('thank-you') || is_page('checkout');
    }
}
new WOWWP_NoIndex_Pages();