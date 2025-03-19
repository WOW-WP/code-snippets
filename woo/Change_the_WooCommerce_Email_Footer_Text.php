<?php
/**
 * Customizes the WooCommerce email footer text.
 */
class WOWWP_Custom_Email_Footer {
    public function __construct() {
        add_filter('woocommerce_email_footer_text', [$this, 'change_email_footer']);
    }

    public function change_email_footer($text) {
        return 'Thank you for shopping with us!';
    }
}
new WOWWP_Custom_Email_Footer();
