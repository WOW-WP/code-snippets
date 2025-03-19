<?php
/**
 * Redirects image attachment pages to the parent post or homepage.
 */
class WOWWP_Remove_Attachment_Pages {
    public function __construct() {
        add_action('template_redirect', [$this, 'redirect_attachment_page']);
    }

    public function redirect_attachment_page() {
        if (is_attachment()) {
            wp_redirect(home_url());
            exit;
        }
    }
}
new WOWWP_Remove_Attachment_Pages();
