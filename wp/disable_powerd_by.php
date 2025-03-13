<?php
class WOWWP_Remove_Powered_By {

    public function __construct() {
        add_filter('admin_footer_text', [$this, 'remove_powered_by_from_footer']);
        add_filter('update_footer', [$this, 'remove_powered_by_from_footer'], 11);
    }

    /**
     * Remove the "Powered by WordPress" from the footer.
     *
     * @param string $text
     * @return string
     */
    public function remove_powered_by_from_footer($text) {
        // Remove "Powered by WordPress" or any other default footer text.
        if (strpos($text, 'Powered by WordPress') !== false) {
            $text = ''; // Empty string to remove the footer text
        }
        return $text;
    }
}

// Initialize the class
new WOWWP_Remove_Powered_By();
