<?php
/**
 * Enable social login for WooCommerce checkout.
 * Users can customize the social login providers.
 */
class WOWWP_Social_Login {
    public function __construct() {
        add_action('woocommerce_after_checkout_form', [$this, 'display_social_login_buttons']);
    }

    public function display_social_login_buttons() {
        echo '<div class="social-login-buttons">';
        echo '<a href="#" class="button social-login-facebook">' . __('Login with Facebook', 'woocommerce') . '</a>';
        echo '<a href="#" class="button social-login-google">' . __('Login with Google', 'woocommerce') . '</a>';
        echo '</div>';
    }
}

new WOWWP_Social_Login();