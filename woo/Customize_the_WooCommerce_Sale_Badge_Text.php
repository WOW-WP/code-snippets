<?php
/**
 * Customizes the sale badge text in WooCommerce.
 * Modify the sale text inside modify_sale_flash function.
 */
class WOWWP_Custom_Sale_Badge {
    public function __construct() {
        add_filter('woocommerce_sale_flash', [$this, 'modify_sale_flash'], 10, 3);
    }

    public function modify_sale_flash($html, $post, $product) {
        return '<span class="onsale">Limited Offer!</span>'; // Change text as needed
    }
}
new WOWWP_Custom_Sale_Badge();
