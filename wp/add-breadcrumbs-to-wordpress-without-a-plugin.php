<?php
/**
 * Displays simple breadcrumbs. Call WOWWP_Breadcrumbs::display() in templates.
 */
class WOWWP_Breadcrumbs {
    public static function display() {
        echo '<nav class="breadcrumbs"><a href="' . home_url() . '">Home</a> &raquo; ' . get_the_title() . '</nav>';
    }
}
