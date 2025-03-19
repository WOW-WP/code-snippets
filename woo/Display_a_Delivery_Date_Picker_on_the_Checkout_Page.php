<?php
/**
 * Adds a delivery date picker field to the WooCommerce checkout page.
 */
class WOWWP_Delivery_Date_Picker {
    public function __construct() {
        add_action('woocommerce_after_order_notes', [$this, 'add_delivery_date_field']);
        add_action('woocommerce_checkout_update_order_meta', [$this, 'save_delivery_date']);
        add_action('woocommerce_admin_order_data_after_billing_address', [$this, 'display_delivery_date']);
    }

    public function add_delivery_date_field($checkout) {
        echo '<p class="form-row form-row-wide"><label for="delivery_date">Delivery Date</label>';
        echo '<input type="date" name="delivery_date" id="delivery_date"></p>';
    }

    public function save_delivery_date($order_id) {
        if (!empty($_POST['delivery_date'])) {
            update_post_meta($order_id, '_delivery_date', sanitize_text_field($_POST['delivery_date']));
        }
    }

    public function display_delivery_date($order) {
        $delivery_date = get_post_meta($order->get_id(), '_delivery_date', true);
        if ($delivery_date) {
            echo '<p><strong>Delivery Date:</strong> ' . esc_html($delivery_date) . '</p>';
        }
    }
}
new WOWWP_Delivery_Date_Picker();
