<?php
    // This script adds custom fields to WordPress user profiles.
    // Customize field names and values.
    class WOWWP_Add_Custom_User_Fields {
        public function __construct() {
            add_action('show_user_profile', [$this, 'display_custom_fields']);
            add_action('edit_user_profile', [$this, 'display_custom_fields']);
            add_action('personal_options_update', [$this, 'save_custom_fields']);
            add_action('edit_user_profile_update', [$this, 'save_custom_fields']);
        }
        public function display_custom_fields($user) {
            echo '<h3>Additional Information</h3><table class="form-table">
                    <tr><th><label for="custom_field">Custom Field</label></th>
                    <td><input type="text" name="custom_field" value="' . esc_attr(get_user_meta($user->ID, 'custom_field', true)) . '" class="regular-text"></td></tr></table>';
        }
        public function save_custom_fields($user_id) {
            if (!current_user_can('edit_user', $user_id)) return false;
            update_user_meta($user_id, 'custom_field', sanitize_text_field($_POST['custom_field']));
        }
    }
    new WOWWP_Add_Custom_User_Fields();
    