<?php
/**
 * Displays the last purchased date for logged-in customers.
 */
class WOWWP_Last_Purchase_Date {
    public function __construct() {
        add_action('woocommerce_before_shop_loop', [$this, 'display_last_purchase_date']);
    }

    public function display_last_purchase_date() {
        if (is_user_logged_in()) {
            $orders = wc_get_orders(['customer_id' => get_current_user_id(), 'limit' => 1, 'orderby' => 'date', 'order' => 'DESC']);
            if (!empty($orders)) {
                $last_order = reset($orders);
                echo '<p>Last purchase: ' . esc_html(wc_format_datetime($last_order->get_date_created())) . '</p>';
            }
        }
    }
}
new WOWWP_Last_Purchase_Date();
