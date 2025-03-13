<?php
    class WOWWP_Make_Sticky_Header {
        public function __construct() {
            add_action('wp_head', [$this, 'add_sticky_css']);
        }
        public function add_sticky_css() {
            echo '<style> 
                #site-header { position: fixed; top: 0; width: 100%; z-index: 999; background: white; }
                body { padding-top: 60px; }
            </style>';
        }
    }
    new WOWWP_Make_Sticky_Header();
    