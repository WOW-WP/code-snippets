<?php
    // This script adds a custom logo to the WordPress login page.
    // Customize the $custom_logo_url to point to your custom logo image URL.
    class WOWWP_Custom_Login_Logo {
        public function __construct() {
            add_action('login_enqueue_scripts', [$this, 'add_custom_logo']);
        }

        public function add_custom_logo() {
            echo '<style>
                body.login #login h1 a {
                    background-image: url('YOUR_CUSTOM_LOGO_URL'); /* Replace with your custom logo URL */
                    background-size: contain;
                    width: 320px; /* Adjust width as needed */
                    height: 80px; /* Adjust height as needed */
                }
            </style>';
        }
    }

    new WOWWP_Custom_Login_Logo();
    