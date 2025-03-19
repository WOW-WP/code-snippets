<?php
/**
 * Displays a "New Arrival" badge for recently added products.
 */
class WOWWP_New_Arrival_Badge {
    public function __construct() {
        add_action('woocommerce_before_shop_loop_item_title', [$this, 'add_new_badge'], 10);
    }

    public function add_new_badge() {
        global $product;
        $days_new = 14; // Change number of days as needed
        $date_created = strtotime($product->get_date_created());
        if ($date_created && (time() - $date_created) < ($days_new * DAY_IN_SECONDS)) {
            echo '<span class="new-badge">New Arrival</span>';
        }
    }
}
new WOWWP_New_Arrival_Badge();
