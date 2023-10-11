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
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method register
	 * @return void
	 * Register all hooks that are needed
	 */
	public function register()
	{
		add_action( 'wp_ajax_total_sales_amount', [ $this, 'total_sales_amount' ] );
		add_action( 'wp_ajax_total_sales_amount_for_year', [ $this, 'total_sales_amount_for_year' ] );
		add_action( 'wp_ajax_total_visitors_count_for_year', [ $this, 'total_visitors_count_for_year' ] );
		add_action( 'wp_ajax_total_completed_order_in_three_phases', [ $this, 'total_completed_order_in_three_phases' ] );
		add_action( 'wp_ajax_total_order_ratio', [ $this, 'total_order_ratio' ] );
		add_action( 'wp_ajax_count_payment_method_ratio', [ $this, 'count_payment_method_ratio' ] );
		add_action( 'wp_ajax_show_top_six_selling_categories', [ $this, 'show_top_six_selling_categories' ] );
		add_action( 'wp_ajax_show_top_selling_products', [ $this, 'show_top_selling_products' ] );
		add_action( 'wp_ajax_show_first_top_selling_product_monthly_data', [ $this, 'show_first_top_selling_product_monthly_data' ] );
		add_action( 'wp_ajax_get_second_top_product_monthly_data', [ $this, 'get_second_top_product_monthly_data' ] );
		add_action( 'wp_ajax_get_top_two_selling_product_name', [ $this, 'get_top_two_selling_product_name' ] );
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method total_sales_amount
	 * @return void
	 * Get the equals of total sale amount of WooCommerce all products
	 */
	public function total_sales_amount()
	{
		$total_completed_sales = 0;
		$total_cancelled_sales = 0;
		$total_refunded_sales = 0;

		$product_prices = [];

		$category_quantities = [];
		$category_total_amounts = [];

		// Get all completed orders
		$orders = wc_get_orders( [
			'status' => [ 'completed', 'cancelled', 'refunded' ],
			'limit' => -1, // Retrieve all orders
		] );

		foreach ( $orders as $order ) {
			if ( $order->get_status() === 'completed' ) {
				$total_completed_sales += abs( $order->get_total() );
				foreach ( $order->get_items() as $item_id => $item ) {
					$product_id = $item->get_product_id();
					$quantity = $item->get_quantity();
					$product_price = $item->get_product()->get_price();

					// Get product categories
					$categories = wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'ids' ) );
					foreach ( $categories as $category_id ) {
						if ( isset( $category_quantities[$category_id] ) ) {
							// Increment the quantity if the category already exists in the array
							$category_quantities[$category_id] += $item->get_quantity();
							$category_total_amounts[$category_id] += $item->get_quantity() * $product_price;
						} else {
							// Add the category to the array if it doesn't exist
							$category_quantities[$category_id] = $item->get_quantity();
							$category_total_amounts[$category_id] = $item->get_quantity() * $product_price;
						}
					}

					if ( isset( $product_quantities[$product_id] ) ) {
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
		arsort( $category_quantities ); // Sort the categories by quantity in descending order
		$top_category_id = key( $category_quantities ); // Get the category with the highest quantity
		// Load the top-selling category object
		$top_category = get_term( $top_category_id, 'product_cat' );

		$top_selling_cat_name = $top_category->name;
		$top_selling_cat_amount = $category_total_amounts[$top_category_id];

		// Find the product with the highest quantity sold
		arsort( $product_quantities ); // Sort the products by quantity in descending order
		$top_product_id = key( $product_quantities ); // Get the product with the highest quantity

		// Load the product object and get its price
		$top_product = wc_get_product( $top_product_id );
		$top_product_quantity = current( $product_quantities );
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
	public function total_sales_amount_for_year()
	{
		// Get the current year
		$current_year = date( 'Y' );

		// Initialize an array to store monthly sales amounts for completed orders
		$monthly_completed_sales = [];

		// Loop through each month from January to December
		for ( $month = 1; $month <= 12; $month++ ) {
			// Get the first day and last day of the month
			$first_day = "{$current_year}-" . str_pad( $month, 2, '0', STR_PAD_LEFT ) . '-01';
			$last_day = date( 'Y-m-t', strtotime( $first_day ) );

			// Initialize the total completed sales amount for the month
			$total_completed_sales = 0;

			// Get completed orders within the date range for the month
			$completed_orders = wc_get_orders( array(
				'status' => 'completed',
				'date_query' => array(
					'after' => $first_day,
					'before' => $last_day,
				),
				'limit' => -1, // Retrieve all completed orders
			) );

			// Calculate the total completed sales amount for completed orders
			foreach ( $completed_orders as $order ) {
				$total_completed_sales += $order->get_total();
			}

			// Get refunded orders within the date range for the month
			$refunded_orders = wc_get_orders( array(
				'status' => 'refunded',
				'date_query' => array(
					'after' => $first_day,
					'before' => $last_day,
				),
				'limit' => -1, // Retrieve all refunded orders
			) );

			// Subtract the refunded amount from the completed sales for the month
			foreach ( $refunded_orders as $order ) {
				$total_completed_sales += $order->get_total();
			}

			// Store the monthly sales amounts in the array
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

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method total_visitors_count_for_year
	 * @return void
	 * Get the total number of visitor counts of year starting from jan-dec
	 */
	public function total_visitors_count_for_year()
	{
		$result =
			DB::select('hexreport_visitor_log.January','hexreport_visitor_log.February','hexreport_visitor_log.March','hexreport_visitor_log.April','hexreport_visitor_log.May','hexreport_visitor_log.June','hexreport_visitor_log.July','hexreport_visitor_log.August','hexreport_visitor_log.September','hexreport_visitor_log.October','hexreport_visitor_log.November','hexreport_visitor_log.December')
				->distinct()
				->from('hexreport_visitor_log hexreport_visitor_log')
				->get();

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'totalVisitorsCount' => __( $result[0] ),

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
	 * @method total_completed_order_in_three_phases
	 * @return void
	 * Get the total number of completed order in three phases of a year. eg: jan-apr, may-aug, sep-dec
	 */
	public function total_completed_order_in_three_phases()
	{
		// Get the current year
		$current_year = date( 'Y' );
		global $post;

		// Define the date ranges
		$jan_apr_start = "{$current_year}-01-01";
		$jan_apr_end = "{$current_year}-04-30";
		$may_aug_start = "{$current_year}-05-01";
		$may_aug_end = "{$current_year}-08-31";
		$sep_dec_start = "{$current_year}-09-01";
		$sep_dec_end = "{$current_year}-12-31";

		// Initialize total amounts for each date range
		$total_amount_jan_apr = 0;
		$total_amount_may_aug = 0;
		$total_amount_sep_dec = 0;

		// WP_Query to fetch completed orders within the date ranges
		$args = array(
			'post_type' => 'shop_order',
			'post_status' => 'wc-completed',
			'posts_per_page' => -1,
			'date_query' => array(
				'relation' => 'OR',
				array(
					'after' => $jan_apr_start,
					'before' => $jan_apr_end,
				),
				array(
					'after' => $may_aug_start,
					'before' => $may_aug_end,
				),
				array(
					'after' => $sep_dec_start,
					'before' => $sep_dec_end,
				),
			),
		);

		$completed_orders_query = new \WP_Query( $args );

		// Loop through completed orders and calculate totals
		if ( $completed_orders_query->have_posts() ) {
			while ( $completed_orders_query->have_posts() ) {
				$completed_orders_query->the_post();
				$order = wc_get_order( $post->ID );
				$order_total = $order->get_total();

				if ( strtotime( $post->post_date ) >= strtotime( $jan_apr_start ) && strtotime( $post->post_date ) <= strtotime( $jan_apr_end ) ) {
					$total_amount_jan_apr += $order_total;
				} elseif ( strtotime( $post->post_date ) >= strtotime( $may_aug_start ) && strtotime( $post->post_date ) <= strtotime( $may_aug_end ) ) {
					$total_amount_may_aug += $order_total;
				} elseif ( strtotime( $post->post_date ) >= strtotime( $sep_dec_start ) && strtotime( $post->post_date ) <= strtotime( $sep_dec_end ) ) {
					$total_amount_sep_dec += $order_total;
				}
			}

			// Restore the global post data
			wp_reset_postdata();
		}

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'totalCompletedOredersFromJanToApr' => __( $total_amount_jan_apr ),
				'totalCompletedOredersFromMayToAug' => __( $total_amount_may_aug ),
				'totalCompletedOredersFromSepToDec' => __( $total_amount_sep_dec ),

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
	 * @method total_order_ratio
	 * @return void
	 * Get the total order ratio of 'cancelled', 'refunded', 'failed' orders.
	 */
	public function total_order_ratio() {
		// Get total orders for customer
		$total_args = array(
			'post_type' => 'shop_order',
			'return' => 'ids',
			'limit' => -1, // Retrieve all orders
		);

		$total_orders = count( wc_get_orders( $total_args ) ); // count the array of orders

		// Get CANCELLED orders for customer
		$cancelled_args = array(
			'post_status' => ['cancelled'],
			'post_type' => 'shop_order',
			'return' => 'ids',
			'limit' => -1, // Retrieve all orders
		);

		$cancelled_order_numbers = count( wc_get_orders( $cancelled_args ) ); // count the array of orders
		$cancelled_order_ratio = $cancelled_order_numbers / $total_orders * 100;

		// Get refunded orders for customer
		$refunded_args = array(
			'post_status' => ['refunded'],
			'post_type' => 'shop_order',
			'return' => 'ids',
			'limit' => -1, // Retrieve all orders
		);
		$refunded_order_numbers = count( wc_get_orders( ( $refunded_args ) ) );
		$refunded_order_ration = $refunded_order_numbers / $total_orders * 100;

		$failed_args = array(
			'post_status' => ['failed'],
			'post_type' => 'shop_order',
			'return' => 'ids',
			'limit' => -1, // Retrieve all orders
		);
		$failed_order_numbers = count( wc_get_orders( ( $failed_args ) ) );
		$failed_order_ration = $failed_order_numbers / $total_orders * 100;


		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'cancelledOrderRation' => __( $cancelled_order_ratio ),
				'refundedOrderRation' => __( $refunded_order_ration ),
				'failedOrderRation' => __( $failed_order_ration ),

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
	 * @method count_payment_method_ratio
	 * @return void
	 * Get the payment method ratio of all orders.
	 */
	public function count_payment_method_ratio()
	{
		// Query completed orders
		$args = array(
			'post_type' => 'shop_order',
			'posts_per_page' => -1,
			'post_status' => 'wc-completed', // Filter by completed orders
		);

		$completed_orders = get_posts( $args );

		$total_order_count = count( $completed_orders ); // Total order count

		$payment_method_counts = [];
		$shipping_method_counts = [];

		foreach ( $completed_orders as $order ) {
			// Get the payment method for each completed order
			$order_id = $order->ID;
			$order = wc_get_order( $order_id );
			$payment_method = $order->get_payment_method();

			// Get the shipping method for each completed order
			$shipping_method = $order->get_shipping_method();

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
				if ( !isset( $shipping_method_counts[$shipping_method] ) ) {
					$shipping_method_counts[$shipping_method] = 1;
				} else {
					$shipping_method_counts[$shipping_method]++;
				}
			}
		}

		$direct_bank_transfer_ration = $payment_method_counts['bacs'] / $total_order_count * 100;
		$check_payment_ration = $payment_method_counts['cheque'] / $total_order_count * 100;
		$cash_on_delivery_ration = $payment_method_counts['cod'] / $total_order_count * 100;

		$local_pickup_ratio = $shipping_method_counts['Local pickup'] / $total_order_count * 100;
		$flat_rate_ratio = $shipping_method_counts['Flat rate'] / $total_order_count * 100;
		$free_shipping_ratio = $shipping_method_counts['Free shipping'] / $total_order_count * 100;

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'bankTransferRation' => __( $direct_bank_transfer_ration ),
				'checkPaymentRatio' => __( $check_payment_ration ),
				'cashOnDeliveryRatio' => __( $cash_on_delivery_ration ),
				'localPickupRatio' => __( $local_pickup_ratio ),
				'flatRateRatio' => __( $flat_rate_ratio ),
				'freeShippingRatio' => __( $free_shipping_ratio ),
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
	 * @method show_top_six_selling_categories
	 * @return void
	 * Get the top six selling categories data.
	 */
	public function show_top_six_selling_categories()
	{
		// Define the query parameters to fetch completed orders
		$args = array(
			'post_type' => 'shop_order',
			'post_status' => 'wc-completed', // Filter for completed orders
			'posts_per_page' => -1, // Fetch all orders
		);

		// Get completed orders
		$orders = new \WP_Query( $args );

		// Initialize an empty array to store category counts
		$category_counts = [];
		$total_order_count = 0;

		// Loop through the completed orders
		if ( $orders->have_posts() ) {
			while ( $orders->have_posts() ) {
				$orders->the_post();

				$total_order_count++;

				// Get order items
				$order = wc_get_order(get_the_ID());
				$items = $order->get_items();

				foreach ( $items as $item ) {
					// Get product categories for each item
					$product_id = $item->get_product_id();
					$product = wc_get_product($product_id);
					$categories = $product->get_category_ids();

					foreach ( $categories as $category_id ) {
						// Increment category count
						if ( isset( $category_counts[$category_id] ) ) {
							$category_counts[$category_id]['count']++;
						} else {
							$category_counts[$category_id] = array(
								'name' => get_term( $category_id, 'product_cat' )->name,
								'count' => 1
							);
						}
					}
				}
			}
		}

		// Sort categories by count in descending order
		arsort($category_counts);

		// Display the top 6 selling categories
		$top_categories = array_slice( $category_counts, 0, 6 );

		// Restore the global $post variable
		wp_reset_postdata();

		$catOneSellingRatio = ! empty( $top_categories[0]['count'] ) ? $top_categories[0]['count'] / $total_order_count * 100 : 0;

		$catTwoSellingRatio = ! empty( $top_categories[1]['count'] ) ? $top_categories[1]['count'] / $total_order_count * 100 : 0;

		$catThreeSellingRatio = ! empty( $top_categories[2]['count'] ) ? $top_categories[2]['count'] / $total_order_count * 100 : 0;

		$catFourSellingRatio = ! empty( $top_categories[3]['count'] ) ? $top_categories[3]['count'] / $total_order_count * 100 : 0;

		$catFiveSellingRatio = ! empty( $top_categories[4]['count'] ) ? $top_categories[4]['count'] / $total_order_count * 100 : 0;

		$catSixSellingRatio = ! empty( $top_categories[5]['count'] ) ? $top_categories[5]['count'] / $total_order_count * 100 : 0;

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'topCatNameOne' => __( $top_categories[0]['name'] ),
				'topCatOneSellRatio' => __( $catOneSellingRatio ),
				'topCatNameTwo' => __( $top_categories[1]['name'] ),
				'topCatTwoSellRatio' => __( $catTwoSellingRatio ),
				'topCatNameThree' => __( $top_categories[2]['name'] ),
				'topCatThreeSellRatio' => __( $catThreeSellingRatio ),
				'topCatNameFour' => __( $top_categories[3]['name'] ),
				'topCatFourSellRatio' => __( $catFourSellingRatio ),
				'topCatNameFive' => __( $top_categories[4]['name'] ),
				'topCatFiveSellRatio' => __( $catFiveSellingRatio ),
				'topCatNameSix' => __( $top_categories[5]['name'] ),
				'topCatSixSellRatio' => __( $catSixSellingRatio ),
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
	 * @method show_top_selling_products
	 * @return void
	 * Get the top six selling products data.
	 */
	public function show_top_selling_products( $limit = 10 )
	{
		// Query for the top-selling products using WooCommerce functions
		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => $limit,
			'orderby' => 'meta_value_num',
			'meta_key' => 'total_sales', // WooCommerce tracks sales as custom post meta
			'order' => 'DESC',
		);

		$top_selling_products = new \WP_Query( $args );

		// Initialize an array to store product data with sales counts
		$products_with_sales_count = [];

		if ( ! empty( $top_selling_products->posts ) ) {
			foreach ( $top_selling_products->posts as $product ) {
				$product_id = $product->ID;

				// Retrieve the sales count for each product
				$sales_count = get_post_meta( $product_id, 'total_sales', true );

				// Store product data with sales count
				$products_with_sales_count[] = array(
					'product' => $product,
					'sales_count' => $sales_count,
				);
			}
		}

		$products_one_name = get_the_title( $products_with_sales_count[0]['product']->ID );
		$products_two_name = get_the_title( $products_with_sales_count[1]['product']->ID );
		$products_three_name = get_the_title( $products_with_sales_count[2]['product']->ID );
		$products_four_name = get_the_title( $products_with_sales_count[3]['product']->ID );
		$products_five_name = get_the_title( $products_with_sales_count[4]['product']->ID );
		$products_six_name = get_the_title( $products_with_sales_count[5]['product']->ID );

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'topProNameOne' => __( $products_one_name ),
				'topProNameTwo' => __( $products_two_name ),
				'topProNameThree' => __( $products_three_name ),
				'topProNameFour' => __( $products_four_name ),
				'topProNameFive' => __( $products_five_name ),
				'topProNameSix' => __( $products_six_name ),

				'topProCountOne' => __( $products_with_sales_count[0]['sales_count'] ),
				'topProCountTwo' => __( $products_with_sales_count[1]['sales_count'] ),
				'topProCountThree' => __( $products_with_sales_count[2]['sales_count'] ),
				'topProCountFour' => __( $products_with_sales_count[3]['sales_count'] ),
				'topProCountFive' => __( $products_with_sales_count[4]['sales_count'] ),
				'topProCountSix' => __( $products_with_sales_count[5]['sales_count'] ),
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
	 * @method show_first_top_selling_product_monthly_data
	 * @return void
	 * Get the first top-selling product monthly data.
	 */
	public function show_first_top_selling_product_monthly_data()
	{
		if ( class_exists( 'WooCommerce' ) ) {
			// Get the current date
			$current_date = current_time( 'Y-m-d' );

			// Calculate the date 12 months ago from the current date
			$twelve_months_ago = date( 'Y-m-d', strtotime('-12 months', strtotime( $current_date ) ) );

			// Create an array to store monthly top-selling product data for the current year
			$monthly_top_selling_product = [];

			// Loop through each month within the last 12 months
			$current_month = strtotime( $current_date );
			$start_date = strtotime( $twelve_months_ago );

			// Initialize an array for all months in the year
			$all_months = array(
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			);

			// Iterate over all months and initialize them with 0 sales for the top product
			foreach ( $all_months as $month_name ) {
				$formatted_month = $month_name . ' ' . date( 'Y', $current_month );
				$monthly_top_selling_product[$formatted_month] = 0;
			}

			while ( $current_month >= $start_date ) {
				$month_start_date = date('Y-m-01', $current_month);
				$month_end_date = date('Y-m-t', $current_month);

				// Get all completed orders for the current month
				$args = array(
					'post_type' => 'shop_order',
					'post_status' => 'wc-completed',
					'date_query' => array(
						'after' => $month_start_date,
						'before' => $month_end_date,
					),
					'posts_per_page' => -1,
				);

				$orders = get_posts( $args );

				// Create an array to store product sales counts for the current month
				$monthly_product_sales = [];

				foreach ( $orders as $order ) {
					// Get order items
					$order_items = wc_get_order( $order->ID )->get_items();

					foreach ( $order_items as $item ) {
						// Get product ID and quantity sold
						$product_id = $item->get_product_id();
						$quantity_sold = $item->get_quantity();

						// Increment the product's sales count in the array
						if ( isset( $monthly_product_sales[$product_id] ) ) {
							$monthly_product_sales[$product_id] += $quantity_sold;
						} else {
							$monthly_product_sales[$product_id] = $quantity_sold;
						}
					}
				}

				// Sort products by sales count in descending order for the current month
				arsort( $monthly_product_sales );

				// Get the top-selling product for the current month (only the first one)
				$top_selling_product = reset( $monthly_product_sales );

				// Store monthly data in the array
				$formatted_month = date( 'F Y', $current_month );
				$monthly_top_selling_product[$formatted_month] = $top_selling_product;

				// Move to the previous month
				$current_month = strtotime( '-1 month', $current_month );
			}
		}
		array_splice( $monthly_top_selling_product, -3 );

		$final_data = [];

		foreach ( $monthly_top_selling_product as $value ) {
			if ( empty( $value ) ) {
				$final_data[] = 0;
			}
			else {
				$final_data[] = $value;
			}
		}

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'firstTopSellingProductMonthlyData' => __( $final_data ),
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
	 * @method get_second_top_product_monthly_data
	 * @return void
	 * Get the second top-selling product monthly data.
	 */
	public function get_second_top_product_monthly_data()
	{
		if ( class_exists( 'WooCommerce' ) ) {
			// Get the current date
			$current_date = current_time('Y-m-d');

			// Calculate the date 12 months ago from the current date
			$twelve_months_ago = date( 'Y-m-d', strtotime( '-12 months', strtotime( $current_date ) ) );

			// Create an array to store monthly top-selling product data for the current year
			$monthly_top_selling_product = [];

			// Loop through each month within the last 12 months
			$current_month = strtotime( $current_date );
			$start_date = strtotime( $twelve_months_ago );

			// Initialize an array for all months in the year
			$all_months = array(
				'January', 'February', 'March', 'April', 'May', 'June',
				'July', 'August', 'September', 'October', 'November', 'December'
			);

			// Iterate over all months and initialize them with 0 sales for the top product
			foreach ( $all_months as $month_name ) {
				$formatted_month = $month_name . ' ' . date( 'Y', $current_month );
				$monthly_top_selling_product[$formatted_month] = 0;
			}

			while ( $current_month >= $start_date ) {
				$month_start_date = date( 'Y-m-01', $current_month );
				$month_end_date = date( 'Y-m-t', $current_month );

				// Get all completed orders for the current month
				$args = array(
					'post_type' => 'shop_order',
					'post_status' => 'wc-completed',
					'date_query' => array(
						'after' => $month_start_date,
						'before' => $month_end_date,
					),
					'posts_per_page' => -1,
				);

				$orders = get_posts( $args );

				// Create an array to store product sales counts for the current month
				$monthly_product_sales = [];

				foreach ( $orders as $order ) {
					// Get order items
					$order_items = wc_get_order( $order->ID )->get_items();

					foreach ( $order_items as $item ) {
						// Get product ID and quantity sold
						$product_id = $item->get_product_id();
						$quantity_sold = $item->get_quantity();

						// Increment the product's sales count in the array
						if ( isset( $monthly_product_sales[$product_id] ) ) {
							$monthly_product_sales[$product_id] += $quantity_sold;
						} else {
							$monthly_product_sales[$product_id] = $quantity_sold;
						}
					}
				}

				// Sort products by sales count in descending order for the current month
				arsort( $monthly_product_sales );

				// Get the top-selling products for the current month (only the first two)
				$top_selling_products = array_slice( $monthly_product_sales, 0, 2 );

				// Store monthly data in the array
				$formatted_month = date( 'F Y', $current_month );

				if ( count( $top_selling_products ) >= 2 ) {
					$monthly_top_selling_product[$formatted_month] = $top_selling_products[1]; // Get the second element
				} else {
					// Handle the case where there are not enough products to determine a second top-selling product
					$monthly_top_selling_product[$formatted_month] = 0; // Or set a default value
				}

				// Move to the previous month
				$current_month = strtotime( '-1 month', $current_month );
			}
		}
		array_splice( $monthly_top_selling_product, -3 );

		$final_data = [];

		foreach ( $monthly_top_selling_product as $value ) {
			$final_data[] = $value;
		}

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'secondTopSellingProductMonthlyData' => __( $final_data ),
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
	 * @method get_top_two_selling_product_name
	 * @return void
	 * Get the first and second best-selling product name;
	 */
	public function get_top_two_selling_product_name()
	{
		$arr = [];

		if ( class_exists( 'WooCommerce' ) ) {
			// Query to get the top-selling products
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 2,
				'orderby' => 'meta_value_num',
				'meta_key' => 'total_sales',
				'order' => 'DESC',
			);

			$topProducts = new \WP_Query($args);

			while( $topProducts->have_posts() ) {
				$topProducts->the_post();
				$arr[] = get_the_title();
			}
		}

		// Check the nonce and action
		if ( $this->verify_nonce() ) {
			// Nonce is valid, proceed with your code
			wp_send_json( [
				// Response data here
				'msg' => __('hello'),
				'type' => 'success',
				'firstTopSellingProductName' => __( $arr[0] ),
				'secondTopSellingProductName' => __( $arr[1] ),
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
	 * @method verify_nonce
	 * @return mixed
	 * Verify the nonce
	 */
	private function verify_nonce(){
		return isset( $_GET['nonce'] ) && !empty( $_GET['nonce'] ) && wp_verify_nonce( $_GET['nonce'],'hexReportData-react_nonce' ) == 1 ;
	}
}
