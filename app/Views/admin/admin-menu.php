<?php if ( ! defined( 'ABSPATH' ) ) exit; // exit if access directly ?>
<div id="vite-react-sample"></div>

<?php

$completed_orders = wc_get_orders( [
	'status' => 'completed'
] );

$total_order_count = 0;
$payment_method_counts = [];
$shipping_method_counts = [];

foreach ( $completed_orders as $single_order ) {
	if ( $single_order instanceof WC_Order ) {
		$payment_method = $single_order->get_payment_method();
		$shipping_method = $single_order->get_shipping_method();

		// Increment the count for this payment method
		if ( ! empty( $payment_method ) ) {
			if ( !isset( $payment_method_counts[$payment_method] ) ) {
				$payment_method_counts[$payment_method] = 1;
			} else {
				$payment_method_counts[$payment_method]++;
			}
		}

		// Increment the count for shipping method
		if ( ! empty( $shipping_method ) ) {
			if ( ! isset( $shipping_method_counts[$shipping_method] ) ) {
				$shipping_method_counts[$shipping_method] = 1;
			} else {
				$shipping_method_counts[$shipping_method]++;
			}
		}
	}

	if ( $single_order->get_status() === 'completed' && ! $single_order->get_parent_id() ) {
		$total_order_count++;
	}

}
$direct_bank_transfer_ration = 0;
$direct_bank_transfer_ration = ! empty( $payment_method_counts['bacs'] ) ? $payment_method_counts['bacs'] / $total_order_count * 100 : 0;

$check_payment_ration = 0;
$check_payment_ration = ! empty( $payment_method_counts['cheque'] ) ? $payment_method_counts['cheque'] / $total_order_count * 100 : 0 ;

$cash_on_delivery_ration = 0;
$cash_on_delivery_ration = ! empty( $payment_method_counts['cod'] ) ? $payment_method_counts['cod'] / $total_order_count * 100 : 0;

$local_pickup_ratio = 0;
$local_pickup_ratio = ! empty( $shipping_method_counts['Local pickup'] ) ? $shipping_method_counts['Local pickup'] / $total_order_count * 100 : 0;
var_dump($local_pickup_ratio);

$flat_rate_ratio = 0;
$flat_rate_ratio = ! empty( $shipping_method_counts['Flat rate'] ) ? $shipping_method_counts['Flat rate'] / $total_order_count * 100 : 0;
var_dump($flat_rate_ratio);

$free_shipping_ratio = 0;
$free_shipping_ratio = ! empty( $shipping_method_counts['Free shipping'] ) ? $shipping_method_counts['Free shipping'] / $total_order_count * 100 : 0;
var_dump($free_shipping_ratio);


var_dump($shipping_method_counts);

//$direct_bank_transfer_ration = 0 != $total_order_count ? $payment_method_counts['bacs'] / $total_order_count * 100 : 0;
//$check_payment_ration = 0 != $total_order_count ? $payment_method_counts['cheque'] / $total_order_count * 100 : 0;
//$cash_on_delivery_ration = 0 != $total_order_count ? $payment_method_counts['cod'] / $total_order_count * 100 : 0;
//
//$local_pickup_ratio = 0 != $total_order_count ? $shipping_method_counts['Local pickup'] / $total_order_count * 100 : 0;
//$flat_rate_ratio = 0 != $total_order_count ? $shipping_method_counts['Flat rate'] / $total_order_count * 100 : 0;
//$free_shipping_ratio = 0 != $total_order_count ? $shipping_method_counts['Free shipping'] / $total_order_count * 100 : 0;
//
//echo $direct_bank_transfer_ration;






