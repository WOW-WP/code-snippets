<?php
// Changes the number of widgets in the WordPress footer. Customize the number of widget areas.
class WOWWP_Footer_Widgets {
    public function __construct() {
        add_action('widgets_init', [$this, 'change_footer_widgets'], 11);
    }
    public function change_footer_widgets() {
        unregister_sidebar('sidebar-1');
        register_sidebar([
            'name' => 'Footer Widget Area',
            'id' => 'footer-1',
            'before_widget' => '<div class="footer-widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ]);
    }
}
new WOWWP_Footer_Widgets();