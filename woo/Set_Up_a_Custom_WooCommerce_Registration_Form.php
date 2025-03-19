<?php
/**
 * Creates a custom WooCommerce registration form.
 */
class WOWWP_Custom_Registration_Form {
    public function __construct() {
        add_action('woocommerce_register_form_start', [$this, 'add_extra_fields']);
        add_action('woocommerce_created_customer', [$this, 'save_extra_fields']);
    }

    public function add_extra_fields() {
        echo '<p class="form-row form-row-wide"><label for="phone_number">Phone Number</label>';
        echo '<input type="text" name="phone_number" id="phone_number"></p>';
    }

    public function save_extra_fields($customer_id) {
        if (!empty($_POST['phone_number'])) {
            update_user_meta($customer_id, 'phone_number', sanitize_text_field($_POST['phone_number']));
        }
    }
}
new WOWWP_Custom_Registration_Form();
