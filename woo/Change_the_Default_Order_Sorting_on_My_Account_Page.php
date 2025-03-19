<?php
/**
 * Changes the default order sorting on WooCommerce My Account page.
 */
class WOWWP_Change_Order_Sorting {
    public function __construct() {
        add_filter('woocommerce_my_account_my_orders_query', [$this, 'modify_order_sorting']);
    }

    public function modify_order_sorting($args) {
        $args['orderby'] = 'date';
        $args['order'] = 'DESC'; // Change to 'ASC' for oldest first
        return $args;
    }
}
new WOWWP_Change_Order_Sorting();
