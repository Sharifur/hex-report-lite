<div id="vite-react-sample"></div>

<?php
use CodesVault\Howdyqb\DB;


//
//// Query completed orders
//$args = array(
//    'post_type' => 'shop_order',
//    'posts_per_page' => -1,
//    'post_status' => 'wc-completed', // Filter by completed orders
//);
//
//$completed_orders = get_posts($args);
//
//$total_order_count = count($completed_orders); // Total order count
//
//$payment_method_counts = array();
//$shipping_method_counts = array();
//
//foreach ($completed_orders as $order) {
//    // Get the payment method for each completed order
//    $order_id = $order->ID;
//    $order = wc_get_order($order_id);
//    $payment_method = $order->get_payment_method();
//
//    // Get the shipping method for each completed order
//    $shipping_method = $order->get_shipping_method();
//
//    // Increment the count for payment method
//    if (!empty($payment_method)) {
//        if (!isset($payment_method_counts[$payment_method])) {
//            $payment_method_counts[$payment_method] = 1;
//        } else {
//            $payment_method_counts[$payment_method]++;
//        }
//    }
//
//    // Increment the count for shipping method
//    if (!empty($shipping_method)) {
//        if (!isset($shipping_method_counts[$shipping_method])) {
//			$shipping_method = strtolower($shipping_method);
//			$shipping_method = str_replace(' ', '_', $shipping_method);
//            $shipping_method_counts[$shipping_method] = 1;
//        } else {
//            $shipping_method_counts[$shipping_method]++;
//        }
//    }
//}
//
//var_dump($shipping_method_counts);



//$args = array(
//	'post_type' => 'shop_order',
//	'posts_per_page' => -1,
//	'post_status' => 'wc-completed', // Filter by completed orders
//);
//
//$completed_orders = get_posts( $args );
//
//$total_order_count = count( $completed_orders ); // Total order count
//
//$payment_method_counts = array();
//$shipping_method_counts = array();
//
//foreach ( $completed_orders as $order ) {
//	// Get the payment method for each completed order
//	$order_id = $order->ID;
//	$order = wc_get_order( $order_id );
//	$payment_method = $order->get_payment_method();
//
//	// Get the shipping method for each completed order
//	$shipping_method = $order->get_shipping_method();
//
//	// Increment the count for this payment method
//	if ( !empty( $payment_method ) ) {
//		if ( !isset( $payment_method_counts[$payment_method] ) ) {
//			$payment_method_counts[$payment_method] = 1;
//		} else {
//			$payment_method_counts[$payment_method]++;
//		}
//	}
//
//	// Increment the count for shipping method
//	if ( !empty($shipping_method) ) {
//		if (!isset($shipping_method_counts[$shipping_method])) {
//
//			$shipping_method_counts[$shipping_method] = 1;
//		} else {
//			$shipping_method_counts[$shipping_method]++;
//		}
//	}
//}
//
//$direct_bank_transfer_ration = $payment_method_counts['bacs'] / $total_order_count * 100;
//$check_payment_ration = $payment_method_counts['cheque'] / $total_order_count * 100;
//$cash_on_delivery_ration = $payment_method_counts['cod'] / $total_order_count * 100;
//var_dump($shipping_method_counts);
//echo '<br>';
//var_dump($total_order_count);
//echo '<br>';
//echo $local_pickup_ratio = $shipping_method_counts['local_pickup'] / $total_order_count * 100;
//echo $flat_rate_ratio = $shipping_method_counts['flat_rate'] / $total_order_count * 100;
//echo $free_shipping_ratio = $shipping_method_counts['free_shipping'] / $total_order_count * 100;

