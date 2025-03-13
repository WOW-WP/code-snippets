<?php

/**
 * If you have free shipping for all your products in your store and 
 * you have already shown that to your customers, 
 * you may want to remove the Free Shipping row from the email sent 
 * to customers after purchase. 
 */

 /**
  * Remove the shipping row from woocommerce_get_order_item_totals array 
**/ 
function ymcode_remove_shipping_details_from_woocommerce_email($total_rows, $obj, $tax_display)
{
	if ( isset($total_rows['shipping']) )
	{
		unset($total_rows['shipping']);
	}

	return $total_rows;
}

add_filter( 'woocommerce_get_order_item_totals', 
            'ymcode_remove_shipping_details_from_woocommerce_email', 10, 3 );

