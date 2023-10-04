<div id="vite-react-sample"></div>

<?php
use CodesVault\Howdyqb\DB;


//
//// Get all completed orders
//$completed_orders = wc_get_orders(array(
//	'status' => 'completed',
//	'limit' => -1,
//));
//
////echo '<pre>';
////dd($completed_orders);
////echo '</pre>';
//
//// Initialize an array to store payment method counts
//$payment_method_counts = array();
//
//// Loop through completed orders
//foreach ($completed_orders as $order) {
//	if ($order->get_status('completed') ) {
//		echo $order->get_status('refunded') . ' ';
//		echo $payment_method = ! empty( $order->get_payment_method_title() ) ? $order->get_payment_method_title() : ''; // Use get_payment_method_title to get the payment method name
//
//	}
////	elseif( $order->get_status('completed') ) {
////		echo $payment_method = $order->get_payment_method_title(); // Use get_payment_method_title to get the payment method name
////	}
//echo $order->get_status('refunded');
//
////	// Check if the payment method exists in the array
////	if (isset($payment_method_counts[$payment_method])) {
////		// Increment the count
////		$payment_method_counts[$payment_method]++;
////	} else {
////		// Initialize the count
////		$payment_method_counts[$payment_method] = 1;
////	}
//}
////
////// Display the payment method counts
////foreach ($payment_method_counts as $method => $count) {
////	echo 'Payment Method: ' . $method . ' - Count: ' . $count . '<br>';
////}
//
//
$query   = new WC_Order_Query( array(
        'limit'      => 10,
        'orderby'    => 'date',
        'order'      => 'DESC',
        'return'     => 'ids',
    ) );
    $orders  = $query->get_orders();

    $completed_dates = array();
    foreach ( $orders as $order_id ) {
        $order                       = wc_get_order( $order_id );
        $completed_dates[ $order_id ]    = $order->get_date_completed();
    }
    echo '<pre>$completed_dates:-';
    print_r( $completed_dates );
    echo '</pre>';



