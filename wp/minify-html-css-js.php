<?php
    // This script minifies HTML output for better performance.
    // No customization required unless modifying the regex pattern.
    class WOWWP_Minify_HTML_CSS_JS {
        public function __construct() {
            add_action('get_header', [$this, 'start_buffer']);
            add_action('wp_footer', [$this, 'end_buffer']);
        }
        public function start_buffer() { ob_start([$this, 'minify_output']); }
        public function end_buffer() { ob_end_flush(); }
        public function minify_output($buffer) {
            return preg_replace(['/\s{2,}/', '/>\s</'], [' ', '><'], $buffer);
        }
    }
    new WOWWP_Minify_HTML_CSS_JS();
    