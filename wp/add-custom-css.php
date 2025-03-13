<?php
class WOWWP_Custom_CSS {

    // Define custom CSS styles to be added to the site
    private $custom_css = "
        body {
            background-color: #f0f0f0;
        }
        .site-header {
            color: #333;
        }
        .footer {
            font-size: 14px;
            color: #666;
        }
    ";

    public function __construct() {
        // Hook into the wp_head action to add custom CSS in the <head> section
        add_action('wp_head', [$this, 'add_custom_css']);
    }

    /**
     * Add custom CSS to the site's head section.
     */
    public function add_custom_css() {
        echo '<style type="text/css">' . esc_html($this->custom_css) . '</style>';
    }
}

// Initialize the class
new WOWWP_Custom_CSS();
?>
