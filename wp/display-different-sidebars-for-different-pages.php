<?php
// Displays different sidebars for different pages. Customize the page IDs and sidebar IDs.
class WOWWP_Different_Sidebars {
    public function __construct() {
        add_action('widgets_init', [$this, 'register_custom_sidebars']);
        add_filter('sidebars_widgets', [$this, 'replace_sidebar']);
    }
    public function register_custom_sidebars() {
        register_sidebar([
            'name' => 'Custom Sidebar 1',
            'id' => 'custom-sidebar-1',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
        register_sidebar([
            'name' => 'Custom Sidebar 2',
            'id' => 'custom-sidebar-2',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
    }
    public function replace_sidebar($sidebars) {
        if (is_page(1)) { // Example page ID
            $sidebars['sidebar-1'] = $sidebars['custom-sidebar-1'];
        } elseif (is_page(2)) { // Example page ID
            $sidebars['sidebar-1'] = $sidebars['custom-sidebar-2'];
        }
        return $sidebars;
    }
}
new WOWWP_Different_Sidebars();