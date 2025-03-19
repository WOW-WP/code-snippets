<?php
/**
 * Allows customers to upload files during WooCommerce checkout.
 */
class WOWWP_File_Upload_Checkout {
    public function __construct() {
        add_action('woocommerce_after_order_notes', [$this, 'add_file_upload_field']);
        add_action('woocommerce_checkout_process', [$this, 'validate_file_upload']);
        add_action('woocommerce_checkout_update_order_meta', [$this, 'save_uploaded_file']);
    }

    public function add_file_upload_field($checkout) {
        echo '<p class="form-row form-row-wide"><label for="file_upload">Upload File</label>';
        echo '<input type="file" name="file_upload" id="file_upload" accept=".jpg,.png,.pdf"></p>';
    }

    public function validate_file_upload() {
        if (!empty($_FILES['file_upload']['name']) && $_FILES['file_upload']['error'] != 0) {
            wc_add_notice(__('File upload failed. Please try again.'), 'error');
        }
    }

    public function save_uploaded_file($order_id) {
        if (!empty($_FILES['file_upload']['name'])) {
            $upload = wp_upload_bits($_FILES['file_upload']['name'], null, file_get_contents($_FILES['file_upload']['tmp_name']));
            if (!$upload['error']) {
                update_post_meta($order_id, '_uploaded_file', $upload['url']);
            }
        }
    }
}
new WOWWP_File_Upload_Checkout();
