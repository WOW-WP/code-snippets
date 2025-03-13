<?php
class Custom_Login_URL {
    
    // Set the custom login URL (change this to your desired URL)
    private $custom_login_url = 'https://yourdomain.com/custom-login'; 

    public function __construct() {
        add_action('init', [$this, 'change_login_url']);
        add_filter('login_url', [$this, 'custom_login_url'], 10, 3);
        add_action('login_form_login', [$this, 'redirect_login_to_custom_url']);
    }

    /**
     * Change the default WordPress login URL
     */
    public function change_login_url() {
        // If the request URL is the default login URL, redirect to custom URL
        if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'wp-login.php') !== false) {
            wp_redirect($this->custom_login_url);
            exit;
        }
    }

    /**
     * Change the URL to the custom login page
     */
    public function custom_login_url($url, $redirect, $force_reauth) {
        return $this->custom_login_url;
    }

    /**
     * Redirect users who are already logged in to the home page when visiting the custom login page
     */
    public function redirect_login_to_custom_url() {
        if (is_user_logged_in()) {
            wp_redirect(home_url());
            exit;
        }
    }
}

// Instantiate the class
new Custom_Login_URL();
