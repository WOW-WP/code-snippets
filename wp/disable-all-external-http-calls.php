<?php
class WOWWP_Disable_External_HTTP_Requests {

    public function __construct() {
        // Disable all external HTTP requests by blocking the `http_request` filter
        add_filter('http_request_args', [$this, 'block_external_requests'], 10, 2);
    }

    /**
     * Block all external HTTP requests.
     *
     * @param array $args Arguments passed to the HTTP request.
     * @param string $url The URL being requested.
     * @return array The modified arguments, blocking external requests.
     */
    public function block_external_requests($args, $url) {
        // Check if the request is for an external URL (not localhost or the same domain)
        if (0 !== strpos($url, home_url()) && !preg_match('/^(https?:\/\/(localhost|127\.0\.0\.1))/', $url)) {
            // Block external HTTP requests by returning an error
            return new WP_Error('http_request_failed', 'External HTTP requests are blocked on this site.');
        }

        return $args;
    }
}

// Initialize the class
new WOWWP_Disable_External_HTTP_Requests();
?>
