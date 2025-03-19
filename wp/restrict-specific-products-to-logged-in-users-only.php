<?php
/**
 * Restrict specific products to logged-in users only.
 * Users can customize the product IDs.
 */
class WOWWP_Restrict_Products_Logged_In {
    public function __construct() {
        add_action('template_redirect', [$this, 'restrict_products']);
    }

    public function restrict_products() {
        if (!is_user_logged_in() && is_product()) {
            $restricted_product_ids = [123, 456]; // Customize the product IDs
            global $post;
            if (in_array($post->ID, $restricted_product_ids)) {
                wp_redirect(wp_login_url(get_permalink($post->ID)));
                exit;
            }
        }
    }
}

new WOWWP_Restrict_Products_Logged_In();