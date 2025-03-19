<?php
/**
 * Displays the last updated date instead of the publish date.
 */
class WOWWP_Last_Updated_Date {
    public function __construct() {
        add_filter('the_date', [$this, 'replace_with_modified_date'], 10, 1);
    }

    public function replace_with_modified_date($date) {
        return get_the_modified_date();
    }
}
new WOWWP_Last_Updated_Date();
