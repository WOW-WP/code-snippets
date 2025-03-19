<?php
/**
 * Prevents search engines from indexing specific pages.
 * Customize the pages inside should_noindex().
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
        return is_page(['thank-you', 'checkout', 'cart']);
    }
}
new WOWWP_NoIndex_Pages();
