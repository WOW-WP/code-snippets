<?php
    // This script optimizes the WordPress database for better performance.
    // Customize the frequency of database optimization.
    class WOWWP_Optimize_WordPress_Database {
        public function __construct() {
            add_action('wp_scheduled_delete', [$this, 'optimize_database']);
        }
        public function optimize_database() {
            global $wpdb;
            $wpdb->query('OPTIMIZE TABLE ' . $wpdb->posts);
            $wpdb->query('OPTIMIZE TABLE ' . $wpdb->postmeta);
            $wpdb->query('OPTIMIZE TABLE ' . $wpdb->comments);
        }
    }
    new WOWWP_Optimize_WordPress_Database();
    