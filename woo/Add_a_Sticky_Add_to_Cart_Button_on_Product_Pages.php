<?php
/**
 * Adds a sticky "Add to Cart" button on product pages.
 */
class WOWWP_Sticky_Add_To_Cart {
    public function __construct() {
        add_action('wp_footer', [$this, 'add_sticky_button']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }

    public function add_sticky_button() {
        if (is_product()) {
            global $product;
            echo '<div id="sticky-add-to-cart"><a href="' . esc_url($product->add_to_cart_url()) . '" class="button">Add to Cart</a></div>';
        }
    }

    public function enqueue_styles() {
        wp_add_inline_style('woocommerce-general', '
            #sticky-add-to-cart { position: fixed; bottom: 10px; left: 50%; transform: translateX(-50%); background: #0073aa; padding: 10px 20px; border-radius: 5px; }
            #sticky-add-to-cart a { color: #fff; text-decoration: none; }
        ');
    }
}
new WOWWP_Sticky_Add_To_Cart();
