<?php
/**
 * Adds a custom "Gift Message" field to WooCommerce checkout.
 */
class WOWWP_Gift_Message_Field {
    public function __construct() {
        add_action('woocommerce_after_order_notes', [$this, 'add_gift_message_field']);
        add_action('woocommerce_checkout_update_order_meta', [$this, 'save_gift_message']);
        add_action('woocommerce_admin_order_data_after_billing_address', [$this, 'display_gift_message']);
    }

    public function add_gift_message_field($checkout) {
        woocommerce_form_field('gift_message', [
            'type'        => 'textarea',
            'class'       => ['form-row-wide'],
            'label'       => __('Gift Message', 'woocommerce'),
            'placeholder' => __('Write your message here...'),
        ], $checkout->get_value('gift_message'));
    }

    public function save_gift_message($order_id) {
        if (!empty($_POST['gift_message'])) {
            update_post_meta($order_id, '_gift_message', sanitize_textarea_field($_POST['gift_message']));
        }
    }

    public function display_gift_message($order) {
        $gift_message = get_post_meta($order->get_id(), '_gift_message', true);
        if ($gift_message) {
            echo '<p><strong>Gift Message:</strong> ' . esc_html($gift_message) . '</p>';
        }
    }
}
new WOWWP_Gift_Message_Field();
