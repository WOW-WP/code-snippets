<?php
    // This script blocks XML-RPC to prevent brute force attacks.
    // No customization needed unless specific XML-RPC functions should remain accessible.
    class WOWWP_Block_XMLRPC {
        public function __construct() {
            add_filter('xmlrpc_enabled', '__return_false');
            add_action('init', [$this, 'block_xmlrpc_requests']);
        }
        public function block_xmlrpc_requests() {
            if (defined('XMLRPC_REQUEST') && XMLRPC_REQUEST) {
                wp_die('XML-RPC is disabled.', 'Forbidden', ['response' => 403]);
            }
        }
    }
    new WOWWP_Block_XMLRPC();
    