<?php
/**
 * Adds basic schema markup for SEO.
 */
class WOWWP_Schema_Markup {
    public function __construct() {
        add_action('wp_head', [$this, 'add_schema_json']);
    }

    public function add_schema_json() {
        echo '<script type="application/ld+json">' . json_encode([
            '@context'  => 'https://schema.org',
            '@type'     => 'WebSite',
            'name'      => get_bloginfo('name'),
            'url'       => home_url(),
        ]) . '</script>';
    }
}
new WOWWP_Schema_Markup();