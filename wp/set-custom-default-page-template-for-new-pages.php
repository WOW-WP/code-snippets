<?php
/**
 * Sets a custom default page template for new pages.
 */
class WOWWP_Default_Page_Template {
    public function __construct() {
        add_filter('default_page_template_title', [$this, 'set_default_template']);
    }

    public function set_default_template($template) {
        return 'custom-template.php';
    }
}
new WOWWP_Default_Page_Template();
