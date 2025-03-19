<?php
/**
 * Enables AJAX add to cart for simple products in WooCommerce.
 */
class WOWWP_AJAX_Add_To_Cart {
    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enable_ajax_add_to_cart']);
    }

    public function enable_ajax_add_to_cart() {
        wp_add_inline_script('woocommerce', 'jQuery(document).on("click", ".ajax_add_to_cart", function(e) { e.preventDefault(); var t = jQuery(this); jQuery.post(t.attr("href"), function(response) { jQuery(document.body).trigger("wc_fragments_refreshed"); }); });');
    }
}
new WOWWP_AJAX_Add_To_Cart();
