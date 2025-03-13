<?php
// This script registers a custom payment method in WooCommerce.
// Customize the title, description, and handling logic.
class WOWWP_Custom_Payment_Method {
    public function __construct() {
        add_filter('woocommerce_payment_gateways', [$this, 'add_custom_gateway']);
    }
    public function add_custom_gateway($gateways) {
        $gateways[] = 'WC_Custom_Gateway';
        return $gateways;
    }
}
class WC_Custom_Gateway extends WC_Payment_Gateway {
    public function __construct() {
        $this->id = 'custom_gateway';
        $this->title = 'Custom Payment';
        $this->description = 'Pay using our custom payment method.';
        $this->method_title = 'Custom Payment Gateway';
        $this->method_description = 'Allows payments using a custom method.';
        $this->supports = ['products'];
        $this->init_form_fields();
        $this->init_settings();
    }
    public function process_payment($order_id) {
        $order = wc_get_order($order_id);
        $order->update_status('on-hold');
        return ['result' => 'success', 'redirect' => $order->get_checkout_order_received_url()];
    }
}
new WOWWP_Custom_Payment_Method();
