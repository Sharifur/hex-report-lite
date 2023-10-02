<?php

namespace HexReport\App\Controllers;

use HexReport\App\Core\Lib\SingleTon;
use Kathamo\Framework\Lib\Controller;
use CodesVault\Howdyqb\DB;

class AjaxApiController extends Controller
{
	use SingleTon;

	private $base_url = 'hexreport/v1/';

	/**
	 * Register hooks callback
	 *
	 * @return void
	 */
	public function register() {
		add_action('wp_ajax_total_sales_amount', [$this, 'total_sales_amount']);
		add_action('wp_ajax_total_sales_amount_for_year', [$this, 'total_sales_amount_for_year']);
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method total_sales_amount
	 * @return void
	 * Get the equals of total sale amount of WooCommerce all products
	 */
	public function total_sales_amount() {
		$total_completed_sales = 0;
		$total_cancelled_sales = 0;
		$total_refunded_sales = 0;

		$product_prices = [];

		$category_quantities = array();
		$category_total_amounts = array();

		// Get all completed orders
		$orders = wc_get_orders( [
			'status' => [ 'completed', 'cancelled', 'refunded' ],
			'limit' => -1, // Retrieve all orders
		] );

		foreach ( $orders as $order ) {
			if ( $order->get_status() === 'completed' ) {
				$total_completed_sales += abs( $order->get_total() );
				foreach ($order->get_items() as $item_id => $item) {
					$product_id = $item->get_product_id();
					$quantity = $item->get_quantity();
					$product_price = $item->get_product()->get_price();

					// Get product categories
					$categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
					foreach ($categories as $category_id) {
						if (isset($category_quantities[$category_id])) {
							// Increment the quantity if the category already exists in the array
							$category_quantities[$category_id] += $item->get_quantity();
							$category_total_amounts[$category_id] += $item->get_quantity() * $product_price;
						} else {
							// Add the category to the array if it doesn't exist
							$category_quantities[$category_id] = $item->get_quantity();
							$category_total_amounts[$category_id] = $item->get_quantity() * $product_price;
						}
					}

					if (isset($product_quantities[$product_id])) {
						// Increment the quantity and calculate total price if the product already exists in the array
						$product_quantities[$product_id] += $quantity;
						$product_prices[$product_id] += $quantity * $product_price;
					} else {
						// Add the product to the arrays if it doesn't exist
						$product_quantities[$product_id] = $quantity;
						$product_prices[$product_id] = $quantity * $product_price;
					}
				}
			} elseif ( $order->get_status() === 'cancelled' ) {
				$total_cancelled_sales += $order->get_total();
			} elseif ( $order->get_status() === 'refunded' ) {
				$total_refunded_sales += $order->get_total();
			}
		}

		// Find the category with the highest quantity sold
		arsort($category_quantities); // Sort the categories by quantity in descending order
		$top_category_id = key($category_quantities); // Get the category with the highest quantity
		// Load the top-selling category object
		$top_category = get_term($top_category_id, 'product_cat');

		$top_selling_cat_name = $top_category->name;
		$top_selling_cat_amount = $category_total_amounts[$top_category_id];

		// Find the product with the highest quantity sold
		arsort($product_quantities); // Sort the products by quantity in descending order
		$top_product_id = key($product_quantities); // Get the product with the highest quantity

		// Load the product object and get its price
		$top_product = wc_get_product($top_product_id);
		$top_product_quantity = current($product_quantities);
		$top_product_price = $product_prices[$top_product_id];
		$top_selling_product_name = $top_product->get_name();


		$total_orders = $total_completed_sales + $total_cancelled_sales;

		$total_completed_sales = $total_completed_sales - $total_refunded_sales; // subtracting the refunded orders from completed orders.

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'totalSales' => __( $total_completed_sales ),
				'totalCancelledAmount' => __( $total_cancelled_sales ),
				'totalOrdersAmount' => __( $total_orders ),
				'totalRefundedAmount' => __( $total_refunded_sales ),
				'topSellingProductName' => __( $top_selling_product_name ),
				'topSellingProductPrice' => __( $top_product_price ),
				'topSellingCatName' => __( $top_selling_cat_name ),
				'topSellingCatPrice' => __( $top_selling_cat_amount ),

			], 200);
		} else {
			// Nonce verification failed, handle the error
			wp_send_json( [
				'error' => 'Nonce verification failed',
			], 403); // 403 Forbidden status code
		}
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method total_sales_amount_for_year
	 * @return void
	 * Get the total sales amount of 12 months from jan-dec
	 */
	public function total_sales_amount_for_year() {
		// Get the current year
		$current_year = date('Y');

		// Initialize an array to store monthly sales amounts for completed and refunded orders
		$monthly_completed_sales = array();

		// Loop through each month from January to December
		for ($month = 1; $month <= 12; $month++) {
			// Get the first day and last day of the month
			$first_day = "{$current_year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . '-01';
			$last_day = date('Y-m-t', strtotime($first_day));

			// Initialize the total sales amounts for the month (completed and refunded)
			$total_completed_sales = 0;
			$total_refunded_sales = 0;

			// Get completed and refunded orders within the date range for the month
			$completed_orders = wc_get_orders(array(
				'status' => 'completed',
				'date_query' => array(
					'after' => $first_day,
					'before' => $last_day,
				),
				'limit' => -1, // Retrieve all completed orders
			));

			// Calculate the total sales amounts for completed orders
			foreach ($completed_orders as $order) {
				$total_completed_sales += $order->get_total();
			}

			// Store the monthly sales amounts in the arrays
			$monthly_completed_sales[date('F', strtotime($first_day))] = $total_completed_sales;
		}

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'totalSalesOfYear' => __( $monthly_completed_sales ),

			], 200);
		} else {
			// Nonce verification failed, handle the error
			wp_send_json( [
				'error' => 'Nonce verification failed',
			], 403); // 403 Forbidden status code
		}
	}

	private function verify_nonce(){
		return isset( $_GET['nonce'] ) && !empty( $_GET['nonce'] ) && wp_verify_nonce( $_GET['nonce'],'hexReportData-react_nonce' ) == 1 ;
	}
}
