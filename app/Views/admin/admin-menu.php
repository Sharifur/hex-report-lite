<?php if ( ! defined( 'ABSPATH' ) ) exit; // exit if access directly ?>
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


//// Define the query parameters to fetch completed orders
//$args = array(
//	'post_type' => 'shop_order',
//	'post_status' => 'wc-completed', // Filter for completed orders
//	'posts_per_page' => -1, // Fetch all orders
//);
//
//// Get completed orders
//$orders = new WP_Query($args);
//
//// Initialize an empty array to store category counts
//$category_counts = array();
//
//// Loop through the completed orders
//if ($orders->have_posts()) {
//	while ($orders->have_posts()) {
//		$orders->the_post();
//
//		// Get order items
//		$order = wc_get_order(get_the_ID());
//		$items = $order->get_items();
//
//		foreach ($items as $item) {
//			// Get product categories for each item
//			$product_id = $item->get_product_id();
//			$product = wc_get_product($product_id);
//			$categories = $product->get_category_ids();
//
//			foreach ($categories as $category_id) {
//				// Increment category count
//				if (isset($category_counts[$category_id])) {
//					$category_counts[$category_id]++;
//				} else {
//					$category_counts[$category_id] = 1;
//				}
//			}
//		}
//	}
//}
//
//// Sort categories by count in descending order
//arsort($category_counts);
//
//// Display all categories and their counts (for debugging purposes)
//echo '<pre>';
//print_r($category_counts);
//echo '</pre>';
//
//// Restore the global $post variable
//wp_reset_postdata();


//// Define the query parameters to fetch completed orders
//$args = array(
//	'post_type' => 'shop_order',
//	'post_status' => 'wc-completed', // Filter for completed orders
//	'posts_per_page' => -1, // Fetch all orders
//);
//
//// Get completed orders
//$orders = new WP_Query($args);
//
//// Initialize an empty array to store category counts
//$category_counts = array();
//$total_order_count = 0;
//
//// Loop through the completed orders
//if ($orders->have_posts()) {
//	while ($orders->have_posts()) {
//		$orders->the_post();
//
//		$total_order_count++;
//
//		// Get order items
//		$order = wc_get_order(get_the_ID());
//		$items = $order->get_items();
//
//		foreach ($items as $item) {
//			// Get product categories for each item
//			$product_id = $item->get_product_id();
//			$product = wc_get_product($product_id);
//			$categories = $product->get_category_ids();
//
//			foreach ($categories as $category_id) {
//				// Increment category count
//				if (isset($category_counts[$category_id])) {
//					$category_counts[$category_id]['count']++;
//				} else {
//					$category_counts[$category_id] = array(
//						'name' => get_term($category_id, 'product_cat')->name,
//						'count' => 1
//					);
//				}
//			}
//		}
//	}
//}
//
//// Sort categories by count in descending order
//arsort($category_counts);
//
//// Display the top 6 selling categories
//$top_categories = array_slice($category_counts, 0, 6);
//
//echo '<h2>Top 6 Selling Categories:</h2>';
//echo '<ul>';
//foreach ($top_categories as $category_id => $data) {
//	echo '<li>' . $data['name'] . ': ' . $data['count'] . ' items sold</li>';
//}
//echo '</ul>';
//
//echo '</br>';
//echo 'total order: '. $total_order_count;
//
//// Restore the global $post variable
//wp_reset_postdata();
//echo '<pre>';
//var_dump($top_categories);
//
//echo '</pre>';


// Define a function to get the top-selling products with their individual sales counts
//function get_top_selling_products_with_individual_sales_count($limit = 10)
//{
//	global $wpdb;
//
//	// Query for the top-selling products using WooCommerce functions
//	$args = array(
//		'post_type' => 'product',
//		'post_status' => 'publish',
//		'posts_per_page' => $limit,
//		'orderby' => 'meta_value_num',
//		'meta_key' => 'total_sales', // WooCommerce tracks sales as custom post meta
//		'order' => 'DESC',
//	);
//
//	$top_selling_products = new WP_Query($args);
//
//	// Initialize an array to store product data with sales counts
//	$products_with_sales_count = array();
//
//	if (!empty($top_selling_products->posts)) {
//		foreach ($top_selling_products->posts as $product) {
//			$product_id = $product->ID;
//
//			// Retrieve the sales count for each product
//			$sales_count = get_post_meta($product_id, 'total_sales', true);
//
//			// Store product data with sales count
//			$products_with_sales_count[] = array(
//				'product' => $product,
//				'sales_count' => $sales_count,
//			);
//		}
//	}
//
//	return $products_with_sales_count;
//}
//
//// Usage: Retrieve and display top-selling products with their individual sales counts
//$top_selling_products_with_sales_count = get_top_selling_products_with_individual_sales_count();
//
//if (!empty($top_selling_products_with_sales_count)) {
//	echo '<ul>';
//	foreach ($top_selling_products_with_sales_count as $product_data) {
//		$product = $product_data['product'];
//		$sales_count = $product_data['sales_count'];
//
//		echo '<li>' . get_the_title($product->ID) . ' (Sales Count: ' . $sales_count . ')</li>';
//	}
//	echo '</ul>';
//} else {
//	echo 'No top-selling products found.';
//}


//// Include WooCommerce functions if not already included
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Store monthly top-selling products data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_top_selling_products[$formatted_month] = $top_selling_products;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//
//	// Now you have monthly data for the top two selling products in the $monthly_top_selling_products array
//	// You can process and display this data as needed
//	print_r($monthly_top_selling_products);
//} else {
//	echo 'WooCommerce is not installed.';
//}

//
//// Include WooCommerce functions if not already included
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Create an array to store monthly data
//	$monthly_data = array();
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_data[$formatted_month] = $top_selling_products;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//
//	// Reverse the order of the monthly data array to display from January to December
//	$monthly_data = array_reverse($monthly_data, true);
//
//	// Now you have monthly data for the top two selling products in the $monthly_data array
//	// You can process and display this data as needed
//	print_r($monthly_data);
//} else {
//	echo 'WooCommerce is not installed.';
//}


// Include WooCommerce functions if not already included
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Create an array to store monthly data
//	$monthly_data = array();
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Check if there are top-selling products for this month before adding to the array
//		if (!empty($top_selling_products)) {
//			// Store monthly data in the array
//			$formatted_month = date('F Y', $current_month);
//			$monthly_data[$formatted_month] = $top_selling_products;
//		}
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//
//	// Reverse the order of the monthly data array to display from January to December
//	$monthly_data = array_reverse($monthly_data, true);
//
//	// Now you have monthly data for the top two selling products in the $monthly_data array
//	// You can process and display this data as needed
//	print_r($monthly_data);
//} else {
//	echo 'WooCommerce is not installed.';
//}


//// Include WooCommerce functions if not already included
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Create an array to store monthly data
//	$monthly_data = array();
//
//	// Initialize an array for all months in the year
//	$all_months = array(
//		'January', 'February', 'March', 'April', 'May', 'June',
//		'July', 'August', 'September', 'October', 'November', 'December'
//	);
//
//	// Iterate over all months and initialize them with empty data
//	foreach ($all_months as $month_name) {
//		$formatted_month = $month_name . ' ' . date('Y', $current_month);
//		$monthly_data[$formatted_month] = array();
//	}
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_data[$formatted_month] = $top_selling_products;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//
//	// Now you have monthly data for the top two selling products in the $monthly_data array
//	// You can process and display this data as needed
//	echo '<pre>';
//	print_r($monthly_data);
//	echo '</pre>';
//} else {
//	echo 'WooCommerce is not installed.';
//}


//// Define the year for which you want to retrieve sales data
//$year = date('Y'); // Current year
//
//// Initialize an array to store the top-selling product for each month
//$top_selling_products = array();
//
//// Loop through each month of the year (from January to December)
//for ($month = 1; $month <= 12; $month++) {
//	// Calculate the start and end dates for the current month
//	$start_date = date('Y-m-01', strtotime("$year-$month-01"));
//	$end_date = date('Y-m-t', strtotime("$year-$month-01"));
//
//	// Query WooCommerce orders for the current month
//	$orders = wc_get_orders(array(
//		'date_query' => array(
//			'after' => $start_date,
//			'before' => $end_date,
//		),
//		'status' => 'completed', // Change this as needed
//	));
//
//	// Initialize variables to track the top-selling product
//	$top_product_name = '';
//	$top_product_quantity = 0;
//
//	// Loop through each order and calculate sales for each product
//	foreach ($orders as $order) {
//		foreach ($order->get_items() as $item_id => $item_data) {
//			$product_name = $item_data->get_name();
//			$product_quantity = $item_data->get_quantity();
//
//			// Update the top-selling product if necessary
//			if ($product_quantity > $top_product_quantity) {
//				$top_product_name = $product_name;
//				$top_product_quantity = $product_quantity;
//			}
//		}
//	}
//
//	// Store the top-selling product for the current month
//	$top_selling_products[date('F', strtotime("$year-$month-01"))] = $top_product_name;
//}
//
//// Output the top-selling product for each month
//foreach ($top_selling_products as $month => $product_name) {
//	echo "<h2>Top Selling Product in $month:</h2>";
//	echo "<p>$product_name</p>";
//}


//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Create an array to store monthly data
//	$monthly_data = array();
//
//	// Initialize an array for all months in the year
//	$all_months = array(
//		'January', 'February', 'March', 'April', 'May', 'June',
//		'July', 'August', 'September', 'October', 'November', 'December'
//	);
//
//	// Iterate over all months and initialize them with empty data
//	foreach ($all_months as $month_name) {
//		$formatted_month = $month_name . ' ' . date('Y', $current_month);
//		$monthly_data[$formatted_month] = array();
//	}
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_data[$formatted_month] = $top_selling_products;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//
//	echo '<pre>';
//	print_r($monthly_data);
//	echo '</pre>';
//}


//// Define the year for which you want to retrieve sales data
//$year = date('Y'); // Current year
//
//// Initialize variables to track the top-selling product data
//$top_product_name = '';
//$top_product_monthly_sales = array();
//
//// Loop through each month of the year (from January to December)
//for ($month = 1; $month <= 12; $month++) {
//	// Calculate the start and end dates for the current month
//	$start_date = date('Y-m-01', strtotime("$year-$month-01"));
//	$end_date = date('Y-m-t', strtotime("$year-$month-01"));
//
//	// Query WooCommerce orders for the current month
//	$orders = wc_get_orders(array(
//		'date_query' => array(
//			'after' => $start_date,
//			'before' => $end_date,
//		),
//		'status' => 'completed', // Change this as needed
//	));
//
//	// Initialize variables to track the sales count for the current month
//	$sales_count = 0;
//
//	// Loop through each order and calculate sales for each product
//	foreach ($orders as $order) {
//		foreach ($order->get_items() as $item_id => $item_data) {
//			$product_name = $item_data->get_name();
//			$product_quantity = $item_data->get_quantity();
//
//			// Check if the current product has higher sales in the current month
//			if ($product_quantity > $sales_count) {
//				$sales_count = $product_quantity;
//				$top_product_name = $product_name;
//			}
//		}
//	}
//
//	// Store the sales count for the top-selling product for the current month
//	$top_product_monthly_sales[date('F', strtotime("$year-$month-01"))] = $sales_count;
//}
//
//// Output the name of the top-selling product
//echo "Top Selling Product of the Year ($year): $top_product_name<br>";
//
//// Output the monthly sales count for the top-selling product
//echo "Monthly Sales Count for the Top Selling Product:<br>";
//foreach ($top_product_monthly_sales as $month => $sales_count) {
//	echo "$month: $sales_count<br>";
//}

//
//// Get the current year
//$current_year = date('Y');
//
//// Initialize an array to store monthly sales counts
//$monthly_sales = array();
//
//// Query to get the top-selling product of the current year
//$args = array(
//	'post_type' => 'product',
//	'posts_per_page' => 1,
//	'meta_key' => 'total_sales',
//	'orderby' => 'meta_value_num',
//	'order' => 'DESC',
//	'date_query' => array(
//		array(
//			'year' => $current_year,
//		),
//	),
//);
//
//$top_selling_product = new WP_Query($args);
//
//if ($top_selling_product->have_posts()) :
//	while ($top_selling_product->have_posts()) : $top_selling_product->the_post();
//
//		// Get the product name and total sales count
//		$product_name = get_the_title();
//		$total_sales = get_post_meta(get_the_ID(), 'total_sales', true);
//
//		// Loop through each month and get the monthly sales count
//		for ($month = 1; $month <= 12; $month++) {
//			$month_start = mktime(0, 0, 0, $month, 1, $current_year);
//			$month_end = mktime(23, 59, 59, $month, date('t', $month_start), $current_year);
//
//			$args = array(
//				'post_type' => 'product',
//				'posts_per_page' => -1,
//				'date_query' => array(
//					array(
//						'after' => date('Y-m-d H:i:s', $month_start),
//						'before' => date('Y-m-d H:i:s', $month_end),
//					),
//				),
//			);
//
//			$sales_query = new WP_Query($args);
//			$monthly_sales[$month] = 0;
//
//			if ($sales_query->have_posts()) {
//				while ($sales_query->have_posts()) : $sales_query->the_post();
//					$product_sales = get_post_meta(get_the_ID(), 'total_sales', true);
//					$monthly_sales[$month] += $product_sales;
//				endwhile;
//				wp_reset_postdata();
//			}
//		}
//
//		// Display the results
//		echo "<h2>Top Selling Product: $product_name</h2>";
//		echo "<ul>";
//		foreach ($monthly_sales as $month => $sales) {
//			echo "<li>$current_year-$month: $sales sales</li>";
//		}
//		echo "</ul>";
//
//	endwhile;
//	wp_reset_postdata();
//endif;
//

//
//// Get the current year
//$current_year = date('Y');
//
//// Initialize an array to store monthly sales counts
//$monthly_sales = array();
//
//// Query to get the top-selling product of the current year
//$args = array(
//	'post_type' => 'product',
//	'posts_per_page' => 1,
////	'meta_key' => 'total_sales',
////	'orderby' => 'meta_value_num',
//	'order' => 'DESC',
//	'date_query' => array(
//		array(
//			'year' => $current_year,
//		),
//	),
//);
//
//$top_selling_product = new WP_Query($args);
//
//if ($top_selling_product->have_posts()) :
//	while ($top_selling_product->have_posts()) : $top_selling_product->the_post();
//
//		// Get the product name and total sales count
//		$product_name = get_the_title();
//		$total_sales = get_post_meta(get_the_ID(), 'total_sales', true);
//
//		// Loop through each month and get the monthly sales count
//		for ($month = 1; $month <= 12; $month++) {
//			$month_start = mktime(0, 0, 0, $month, 1, $current_year);
//			$month_end = mktime(23, 59, 59, $month, date('t', $month_start), $current_year);
//
//			$args = array(
//				'post_type' => 'product',
//				'posts_per_page' => -1,
//				'date_query' => array(
//					array(
//						'after' => date('Y-m-d H:i:s', $month_start),
//						'before' => date('Y-m-d H:i:s', $month_end),
//					),
//				),
//				'meta_query' => array(
//					array(
//						'key' => 'total_sales',
//						'value' => $total_sales,
//						'compare' => '=',
//					),
//				),
//			);
//
//			$sales_query = new WP_Query($args);
//			$monthly_sales[$month] = 0;
//
//			if ($sales_query->have_posts()) {
//				while ($sales_query->have_posts()) : $sales_query->the_post();
//					$monthly_sales[$month]++;
//				endwhile;
//				wp_reset_postdata();
//			}
//		}
//
//		// Display the results
//		echo "<h2>Top Selling Product: $product_name</h2>";
//		echo "<ul>";
//		foreach ($monthly_sales as $month => $sales) {
//			echo "<li>$current_year-$month: $sales sales</li>";
//		}
//		echo "</ul>";
//
//	endwhile;
//	wp_reset_postdata();
//endif;


//// Include WooCommerce functions if not already included
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling products data
//	$monthly_top_selling_products = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Create an array to store monthly data
//	$monthly_data = array();
//
//	// Initialize an array for all months in the year
//	$all_months = array(
//		'January', 'February', 'March', 'April', 'May', 'June',
//		'July', 'August', 'September', 'October', 'November', 'December'
//	);
//
//	// Iterate over all months and initialize them with empty data
//	foreach ($all_months as $month_name) {
//		$formatted_month = $month_name . ' ' . date('Y', $current_month);
//		$monthly_data[$formatted_month] = array();
//	}
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order ID
//			$order_id = $order->ID;
//
//			// Get order items
//			$order_items = wc_get_order($order_id)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top 2 selling products for the current month
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2, true);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_data[$formatted_month] = $top_selling_products;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//}
//
//print_r($monthly_data);

//
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling product data for the current year
//	$monthly_top_selling_product = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Initialize an array for all months in the year
//	$all_months = array(
//		'January', 'February', 'March', 'April', 'May', 'June',
//		'July', 'August', 'September', 'October', 'November', 'December'
//	);
//
//	// Iterate over all months and initialize them with 0 sales for the top product
//	foreach ($all_months as $month_name) {
//		$formatted_month = $month_name . ' ' . date('Y', $current_month);
//		$monthly_top_selling_product[$formatted_month] = 0;
//	}
//
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order items
//			$order_items = wc_get_order($order->ID)->get_items();
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top selling product for the current month (only the first one)
//		$top_selling_product = reset($monthly_product_sales);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//		$monthly_top_selling_product[$formatted_month] = $top_selling_product;
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//}
//array_splice($monthly_top_selling_product, -3);
//
//print_r($monthly_top_selling_product);

//$secondTopProductName = '';
//if (class_exists('WooCommerce')) {
//	// Get the current date
//	$current_date = current_time('Y-m-d');
//
//	// Calculate the date 12 months ago from the current date
//	$twelve_months_ago = date('Y-m-d', strtotime('-12 months', strtotime($current_date)));
//
//	// Create an array to store monthly top-selling product data for the current year
//	$monthly_top_selling_product = array();
//
//	// Loop through each month within the last 12 months
//	$current_month = strtotime($current_date);
//	$start_date = strtotime($twelve_months_ago);
//
//	// Initialize an array for all months in the year
//	$all_months = array(
//		'January', 'February', 'March', 'April', 'May', 'June',
//		'July', 'August', 'September', 'October', 'November', 'December'
//	);
//
//	// Iterate over all months and initialize them with 0 sales for the top product
//	foreach ($all_months as $month_name) {
//		$formatted_month = $month_name . ' ' . date('Y', $current_month);
//		$monthly_top_selling_product[$formatted_month] = 0;
//	}
//	while ($current_month >= $start_date) {
//		$month_start_date = date('Y-m-01', $current_month);
//		$month_end_date = date('Y-m-t', $current_month);
//
//		// Get all completed orders for the current month
//		$args = array(
//			'post_type' => 'shop_order',
//			'post_status' => 'wc-completed',
//			'date_query' => array(
//				'after' => $month_start_date,
//				'before' => $month_end_date,
//			),
//			'posts_per_page' => -1,
//		);
//
//		$orders = get_posts($args);
//
//		// Create an array to store product sales counts for the current month
//		$monthly_product_sales = array();
//
//		foreach ($orders as $order) {
//			// Get order items
//			$order_items = wc_get_order($order->ID)->get_items();
//
//			var_dump(wc_get_order($order->ID)->get_product_name());
//
//			foreach ($order_items as $item) {
//				// Get product ID and quantity sold
//				$product_id = $item->get_product_id();
//				$quantity_sold = $item->get_quantity();
//
//				// Increment the product's sales count in the array
//				if (isset($monthly_product_sales[$product_id])) {
//					$monthly_product_sales[$product_id] += $quantity_sold;
//				} else {
//					$monthly_product_sales[$product_id] = $quantity_sold;
//				}
//			}
//		}
//
//		// Sort products by sales count in descending order for the current month
//		arsort($monthly_product_sales);
//
//		// Get the top selling products for the current month (only the first two)
//		$top_selling_products = array_slice($monthly_product_sales, 0, 2);
//
//		// Store monthly data in the array
//		$formatted_month = date('F Y', $current_month);
//
//		if (count($top_selling_products) >= 2) {
//			$monthly_top_selling_product[$formatted_month] = $top_selling_products[1]; // Get the second element
//
//			$secondTopProductID = $top_selling_products[1]; // Get the product ID of the second element
//			var_dump(get_the_ID($secondTopProductID));
//			$secondTopProduct = wc_get_product($secondTopProductID);
//			var_dump($secondTopProductID);
//			var_dump($secondTopProduct);
//			if ($secondTopProduct) {
//				$secondTopProductName = $secondTopProduct->get_name(); // Get the name of the second top-selling product
//				echo $secondTopProductName;
//			}
//		} else {
//			// Handle the case where there are not enough products to determine a second top-selling product
//			$monthly_top_selling_product[$formatted_month] = 0; // Or set a default value
//		}
//
//
//
//		// Move to the previous month
//		$current_month = strtotime('-1 month', $current_month);
//	}
//}
//array_splice($monthly_top_selling_product, -3);
//
//$final_data = [];
//
//foreach ( $monthly_top_selling_product as $value ) {
//	$final_data[] = $value;
//}
//
//echo '<pre>';
//print_r($final_data);
//echo'</pre>';
//
//
//
////
////$secondTopProduct = wc_get_product( $secondTopProductID );
////$secondTopProductName = $secondTopProduct->get_name();
//
//echo 'Second Top-Selling Product Name: ' . $secondTopProductName; // Output the name of the second top-selling product



//if (class_exists('WooCommerce')) {
//	$firstTopProductName  = '';
//	$secondTopProductName = '';
//
//	// Query to get the top-selling products
//	$args = array(
//		'post_type' => 'product',
//		'posts_per_page' => 2,
//		'orderby' => 'meta_value_num',
//		'meta_key' => 'total_sales',
//		'order' => 'DESC',
//	);
//
//	$topProducts = new WP_Query($args);
//	$arr = [];
//	while( $topProducts->have_posts() ) {
//		$topProducts->the_post();
//		$arr[] = get_the_title();
//	}
//
//	if ($topProducts->have_posts()) {
//		$topProducts->the_post();
//
//		// Get the name of the first best-selling product
//		$firstTopProductName = get_the_title();
//
//		// Skip the first product to get the second best-selling product
//		$topProducts->the_post();
//
//		// Get the name of the second best-selling product
//		$secondTopProductName = get_the_title();
//
//		wp_reset_postdata();
//	}
//}
////echo 'first best selling product name: ' . $firstTopProductName . '<br>';
////echo "Second Best Selling Product Name: " . $secondTopProductName;
//
//	echo $arr[0];
//echo '<br>';
//echo $arr[1];

//
//// Initialize arrays to store category names and sales count
//$category_names = array();
//$category_sales = array();
//
//// Set the number of categories to retrieve (top 10)
//$limit = 10;
//
//// Get completed orders
//$completed_orders = wc_get_orders(array(
//	'status' => 'completed',
//));
//
//// Iterate through completed orders
//foreach ($completed_orders as $order) {
//	$order_items = $order->get_items();
//
//	foreach ($order_items as $item) {
//		$product_id = $item->get_product_id();
//		$product = wc_get_product($product_id);
//		$product_categories = $product->get_category_ids();
//
//		foreach ($product_categories as $category_id) {
//			$category_name = get_term($category_id, 'product_cat')->name;
//
//			if (array_key_exists($category_name, $category_sales)) {
//				$category_sales[$category_name] += $item->get_quantity();
//			} else {
//				$category_sales[$category_name] = $item->get_quantity();
//			}
//		}
//	}
//}
//
//// Sort categories by sales count in descending order
//arsort($category_sales);
//
//// Limit to the top 10 categories
//$category_sales = array_slice($category_sales, 0, $limit, true);
//
//// Populate the arrays
//$category_names = array_keys($category_sales);
//$category_sales = array_values($category_sales);
//
//// Print or use the arrays as needed
//print_r($category_names);
//print_r($category_sales);

//
//// Define the query parameters to fetch completed orders
//$args = array(
//	'post_type' => 'shop_order',
//	'post_status' => 'wc-completed', // Filter for completed orders
//	'posts_per_page' => -1, // Fetch all orders
//);
//
//// Get completed orders
//$orders = new \WP_Query( $args );
//
//// Initialize an empty array to store category counts
//$category_counts = [];
//$total_order_count = 0;
//
//// Loop through the completed orders
//if ( $orders->have_posts() ) {
//	while ( $orders->have_posts() ) {
//		$orders->the_post();
//
//		$total_order_count++;
//
//		// Get order items
//		$order = wc_get_order(get_the_ID());
//		$items = $order->get_items();
//
//		foreach ( $items as $item ) {
//			// Get product categories for each item
//			$product_id = $item->get_product_id();
//			$product = wc_get_product($product_id);
//			$categories = $product->get_category_ids();
//
//			foreach ( $categories as $category_id ) {
//				// Increment category count
//				if ( isset( $category_counts[$category_id] ) ) {
//					$category_counts[$category_id]['count']++;
//				} else {
//					$category_counts[$category_id] = array(
//						'name' => get_term( $category_id, 'product_cat' )->name,
//						'count' => 1
//					);
//				}
//			}
//		}
//	}
//}
//
//// Sort categories by count in descending order
//arsort($category_counts);
//
//// Display the top 6 selling categories
//$top_categories = array_slice( $category_counts, 0, 6 );
//
//// Restore the global $post variable
//wp_reset_postdata();
//$new_array = array_column($top_categories,'name');
//echo '<pre>';
//var_dump($new_array);
//echo '</pre>';

//// Get completed orders
//$completed_orders = wc_get_orders(array(
//	'status' => 'wc-completed',
//));
//
//// Count the total number of completed orders
//$total_completed_orders = count($completed_orders);
//
//// Print the total number of completed orders
//echo "Total Completed Orders: " . $total_completed_orders;


//// Initialize arrays to store category names and sales count
//$category_names = array();
//$category_sales = array();
//$total_order_count = 0; // Initialize the order count
//
//// Set the number of categories to retrieve (top 10)
//$limit = 10;
//
//// Get completed orders
//$completed_orders = wc_get_orders(array(
//	'post_type' => 'shop_order',
//	'status' => 'completed',
//));
//
//// Iterate through completed orders
//foreach ($completed_orders as $order) {
//	$total_order_count++; // Increment the order count
//
//	$order_items = $order->get_items();
//
//	foreach ($order_items as $item) {
//		$product_id = $item->get_product_id();
//		$product = wc_get_product($product_id);
//		$product_categories = $product->get_category_ids();
//
//		foreach ($product_categories as $category_id) {
//			$category_name = get_term($category_id, 'product_cat')->name;
//
//			if (array_key_exists($category_name, $category_sales)) {
//				$category_sales[$category_name] += $item->get_quantity();
//			} else {
//				$category_sales[$category_name] = $item->get_quantity();
//			}
//		}
//	}
//}
//
//// Sort categories by sales count in descending order
//arsort($category_sales);
//
//// Limit to the top 10 categories
//$category_sales = array_slice($category_sales, 0, $limit, true);
//
//// Populate the arrays
//$category_names = array_keys($category_sales);
//$category_sales = array_values($category_sales);
//
//$category_sales_ratio = [];
//
//foreach ( $category_sales as $single_item ) {
//	$category_sales_ratio[] = $single_item / $total_order_count * 100;
//}
//var_dump($total_order_count);
//var_dump($category_sales_ratio);


//// Initialize arrays to store category names and sales count
//$product_names = array();
//$product_sales = array();
//$category_names = array();
//$category_sales = array();
//$total_order_count = 0; // Initialize the order count
//
//// Set the number of categories to retrieve (top 10)
//$limit = 10;
//
//// Get completed orders
//$completed_orders = wc_get_orders(array(
//	'status' => 'completed',
//));
//
//// Iterate through completed orders
//foreach ($completed_orders as $order) {
//	$total_order_count++; // Increment the order count
//
//	$order_items = $order->get_items();
//
//	foreach ($order_items as $item) {
//		$product_id = $item->get_product_id();
//		$product = wc_get_product($product_id);
//		$product_categories = $product->get_category_ids();
//		$product_name = $product->get_name(); // Get the product name
//
//		if (array_key_exists($product_name, $product_sales)) {
//			$product_sales[$product_name] += $item->get_quantity();
//		} else {
//			$product_sales[$product_name] = $item->get_quantity();
//		}
//
//		foreach ($product_categories as $category_id) {
//			$category_name = get_term($category_id, 'product_cat')->name;
//
//			if (array_key_exists($category_name, $category_sales)) {
//				$category_sales[$category_name] += $item->get_quantity();
//			} else {
//				$category_sales[$category_name] = $item->get_quantity();
//			}
//		}
//	}
//}
//
//// Sort products by sales count in descending order
//arsort($product_sales);
//
//// Limit to the top 10 products
//$product_sales = array_slice($product_sales, 0, $limit, true);
//
//// Populate the arrays
//$product_names = array_keys($product_sales);
//$product_sales = array_values($product_sales);
//
//// Sort categories by sales count in descending order
//arsort($category_sales);
//
//// Limit to the top 10 categories
//$category_sales = array_slice($category_sales, 0, $limit, true);
//
//// Populate the arrays
//$category_names = array_keys($category_sales);
//$category_sales = array_values($category_sales);
//
//$category_sales_ratio = [];
//
//foreach ( $category_sales as $single_item ) {
//	$category_sales_ratio[] = $single_item / $total_order_count * 100;
//}
//
//
//var_dump($product_names);
//
//var_dump($product_sales);



//// Get the top two selling product categories
//$top_categories = array();
//
//// Query to get product categories and their total sales
//$args = array(
//	'post_type' => 'product',
//	'posts_per_page' => -1,
//);
//
//$query = new WP_Query($args);
//
//if ($query->have_posts()) {
//	$category_sales = array();
//
//	while ($query->have_posts()) {
//		$query->the_post();
//		global $product;
//
//		// Get product categories for the current product
//		$product_categories = wp_get_post_terms(get_the_ID(), 'product_cat');
//
//		foreach ($product_categories as $category) {
//			$category_name = $category->name;
//
//			// Calculate total sales for the category
//			$total_sales = $product->get_total_sales();
//
//			// Update or initialize the total sales for the category
//			if (isset($category_sales[$category_name])) {
//				$category_sales[$category_name] += $total_sales;
//			} else {
//				$category_sales[$category_name] = $total_sales;
//			}
//		}
//	}
//
//	// Sort the categories by total sales in descending order
//	arsort($category_sales);
//
//	// Get the top two categories
//	$top_categories = array_slice(array_keys($category_sales), 0, 2);
//}
//
//// Restore the original post data
//wp_reset_postdata();


//// Replace with your WooCommerce API credentials and URL
//$months = array(
//	'01' => 'January',
//	'02' => 'February',
//	'03' => 'March',
//	'04' => 'April',
//	'05' => 'May',
//	'06' => 'June',
//	'07' => 'July',
//	'08' => 'August',
//	'09' => 'September',
//	'10' => 'October',
//	'11' => 'November',
//	'12' => 'December',
//);
//
//$top_categories_data = array();
//
//
//
//// Now $top_categories_data contains the top-selling category for each month
//
//// Get all completed sales information (orders) from WooCommerce
//$args = array(
//	'post_type'      => 'shop_order',
//	'post_status'    => 'wc-completed',
//	'posts_per_page' => -1,
//);
//
//$orders = new WP_Query($args);
//
//// Initialize an array to store category counts
//$category_counts = array();
//
//// Loop through the completed orders
//if ($orders->have_posts()) {
//	while ($orders->have_posts()) {
//		$orders->the_post();
//		$order = wc_get_order(get_the_ID());
//
//		// Iterate through order items to count categories
//		foreach ($order->get_items() as $item) {
//			$product = $item->get_product();
//			$categories = $product->get_category_ids();
//			foreach ($categories as $category_id) {
//				if (isset($category_counts[$category_id])) {
//					$category_counts[$category_id] += $item->get_quantity();
//				} else {
//					$category_counts[$category_id] = $item->get_quantity();
//				}
//			}
//		}
//	}
//}
//
//// Find the top two categories
//arsort($category_counts);
//$top_categories = array_slice($category_counts, 0, 2);
//
//// Initialize an array to store data for each month
//$monthly_data = array();
//
//foreach ($months as $month => $month_name) {
//	$monthly_data[$month_name] = array(
//		'category_1' => 0,
//		'category_2' => 0,
//	);
//}
//
//// Loop through the completed orders again to count sales for the top categories
//if ($orders->have_posts()) {
//	while ($orders->have_posts()) {
//		$orders->the_post();
//		$order = wc_get_order(get_the_ID());
//
//		$order_month = date('m', strtotime($order->get_date_created()));
//
//		foreach ($order->get_items() as $item) {
//			$product = $item->get_product();
//			$categories = $product->get_category_ids();
//			foreach ($categories as $category_id) {
//				if (in_array($category_id, array_keys($top_categories))) {
//					$monthly_data[$months[$order_month]]['category_' . array_search($category_id, array_keys($top_categories)) + 1] += $item->get_quantity();
//				}
//			}
//		}
//	}
//}
//
//// Reset the query
//wp_reset_postdata();
//
//// Now $monthly_data contains the total sales for the top two categories for each month
//
//print_r($monthly_data);


//$completed_orders = wc_get_orders( array(
//	'status' => 'completed',
//) );
//
//$product_categories = array();
//
//foreach ( $completed_orders as $order ) {
//	foreach ( $order->get_items() as $item_id => $item ) {
//		$product_id = $item->get_product_id();
//
//		// Get product categories as an array of term objects
//		$product_terms = wp_get_post_terms( $product_id, 'product_cat' );
//
//		// Extract category names and add them to the array
//		$category_names = wp_list_pluck( $product_terms, 'name' );
//
//		$product_categories[] = $category_names;
//	}
//}
//echo '<pre>';
//var_dump($product_categories);
//echo '</pre>';

// Now, $product_categories array contains the category names of products in completed orders.


//$completed_orders = wc_get_orders( array(
//	'status' => 'completed',
//) );
//
//$monthly_category_sales = array();
//
//foreach ( $completed_orders as $order ) {
//	$order_month = date('m', strtotime($order->get_date_created()));
//
//	foreach ( $order->get_items() as $item_id => $item ) {
//		$product_id = $item->get_product_id();
//
//		// Get product categories as an array of term objects
//		$product_terms = wp_get_post_terms( $product_id, 'product_cat' );
//
//		// Extract category names
//		$category_names = wp_list_pluck( $product_terms, 'name' );
//
//		// Add category sales data to the array
//		foreach ($category_names as $category_name) {
//			if (!isset($monthly_category_sales[$order_month][$category_name])) {
//				$monthly_category_sales[$order_month][$category_name] = 0;
//			}
//
//			$monthly_category_sales[$order_month][$category_name] += $item->get_quantity();
//		}
//	}
//}
//
//var_dump($monthly_category_sales);
//
//// Now, $monthly_category_sales contains the category sales for each month.


//$completed_orders = wc_get_orders( array(
//	'status' => 'completed',
//) );
//
//$order_completion_dates = array();
//
//foreach ( $completed_orders as $order ) {
//	$order_completion_date = $order->get_date_completed();
//	if ( $order_completion_date ) {
//		$order_completion_dates[] = $order_completion_date->format( 'Y-m-d H:i:s' );
//	}
//}
//
//var_dump($order_completion_dates);

// Now, $order_completion_dates array contains the completion date and time of each completed order.

//$completed_orders = wc_get_orders( array(
//	'status' => 'completed',
//) );
//
//$product_info = array();
//
//foreach ( $completed_orders as $order ) {
//	$order_completion_date = $order->get_date_completed();
//	$timestamp = strtotime( $order_completion_date->format( 'Y-m-d H:i:s' ) );
//
//	$month_name = date( "F", $timestamp );
//
//	if ( $order_completion_date ) {
//		foreach ( $order->get_items() as $item_id => $item ) {
//			$product_id = $item->get_product_id();
//			$product_name = $item->get_name();
//
//			// Get product categories as an array of term objects
//			$product_terms = wp_get_post_terms( $product_id, 'product_cat' );
//
//			// Extract category names
//			$category_names = wp_list_pluck( $product_terms, 'name' );
//
//			// Store product information
//			foreach ($category_names as $category_name) {
//				$product_info[] = array(
//					'product_name' => $product_name,
//					'category_name' => $category_name,
//					'completion_date' => $month_name,
//				);
//			}
//		}
//	}
//}
//
//echo '<pre>';
//var_dump($product_info);
//echo '</pre>';
// Now, $product_info array contains product name, category, and order completion date for each product in completed orders.

//$month_counts = array();
//
//foreach ($product_info as $product) {
//	$completion_date = $product['completion_date'];
//
//	if (array_key_exists($completion_date, $month_counts)) {
//		$month_counts[$completion_date]++;
//	} else {
//		$month_counts[$completion_date] = 1;
//	}
//}
//
//var_dump($month_counts);

//$completed_orders = wc_get_orders(array(
//	'status' => 'completed',
//));
//
//$product_info = array();
//
//foreach ($completed_orders as $order) {
//	$order_completion_date = $order->get_date_completed();
//	$timestamp = strtotime($order_completion_date->format('Y-m-d H:i:s'));
//
//	$month_name = date("F", $timestamp);
//
//	if ($order_completion_date) {
//		foreach ($order->get_items() as $item_id => $item) {
//			$product_id = $item->get_product_id();
//			$product_name = $item->get_name();
//
//			// Get product categories as an array of term objects
//			$product_terms = wp_get_post_terms($product_id, 'product_cat');
//
//			// Extract category names
//			$category_names = wp_list_pluck($product_terms, 'name');
//
//			// Store product information
//			foreach ($category_names as $category_name) {
//				$product_info[] = array(
//					'product_name' => $product_name,
//					'category_name' => $category_name,
//					'completion_date' => $month_name,
//				);
//			}
//		}
//	}
//}
////var_dump($product_info);
//
//// Count the occurrences of each month
//$month_counts = array();
//
//foreach ($product_info as $product) {
//	$completion_date = $product['completion_date'];
//
//	if (array_key_exists($completion_date, $month_counts)) {
//		$month_counts[$completion_date]++;
//	} else {
//		$month_counts[$completion_date] = 1;
//	}
//
//	// Get the top two most occurred categories
//	$category_counts = array();
//	foreach ($product_info as $product) {
//		$category_name = $product['category_name'];
//		if (array_key_exists($category_name, $category_counts)) {
//			$category_counts[$category_name]++;
//		} else {
//			$category_counts[$category_name] = 1;
//		}
//	}
//
//	arsort($category_counts);
//	$top_two_categories = array_slice($category_counts, 0, 2);
//}
//
//
//
//// Save the data for the top two categories
//$top_category_data = array();
//foreach ($top_two_categories as $category_name => $count) {
//	$top_category_data[$category_name] = array();
//}
//
//
//
//foreach ($product_info as $product) {
//	$category_name = $product['category_name'];
//	if (array_key_exists($category_name, $top_category_data)) {
//		$month = $product['completion_date'];
//		if (!isset($top_category_data[$category_name][$month])) {
//			$top_category_data[$category_name][$month] = 1;
//		} else {
//			$top_category_data[$category_name][$month]++;
//		}
//	}
//}
//
//// Now, $top_category_data contains the month-wise count of the top two most occurred categories.
//echo '<pre>';
//var_dump($top_category_data);
//echo '</pre>';



//==================================
//$completed_orders = wc_get_orders(array(
//	'status' => 'completed',
//));
//
//// Initialize arrays to store data
//$top_selling_category_data = array();
//$second_top_selling_category_data = array();
//
//// Initialize an array to count month-wise sales for categories
//$monthly_category_sales = array();
//
//foreach ($completed_orders as $order) {
//	foreach ($order->get_items() as $item) {
//		$product = $item->get_product();
//		$categories = wp_get_post_terms($product->get_id(), 'product_cat', array('fields' => 'names'));
//
//		foreach ($categories as $category) {
//			$month = date('F', strtotime($order->get_date_completed()->format('Y-m-d H:i:s')));
//
//			if (!isset($monthly_category_sales[$category][$month])) {
//				$monthly_category_sales[$category][$month] = 0;
//			}
//			$monthly_category_sales[$category][$month] += $item->get_quantity();
//		}
//	}
//}
//
//// Sort categories by total sales
//arsort($monthly_category_sales);
//
//// Get the top two selling categories
//$top_categories = array_keys($monthly_category_sales);
//$top_category_data = $monthly_category_sales[$top_categories[0]];
//$second_top_category_data = $monthly_category_sales[$top_categories[1]];
//
//// Create an array of month names
//$months = array(
//	'January', 'February', 'March', 'April', 'May', 'June',
//	'July', 'August', 'September', 'October', 'November', 'December'
//);
//
//// Create arrays for the top two selling categories
//foreach ($top_categories as $category) {
//	$top_selling_category_data[$category] = array();
//	$second_top_selling_category_data[$category] = array();
//
//	foreach ($months as $month) {
//		if (isset($top_category_data[$month])) {
//			$top_selling_category_data[$category][$month] = $top_category_data[$month];
//		} else {
//			$top_selling_category_data[$category][$month] = 0;
//		}
//
//		if (isset($second_top_category_data[$month])) {
//			$second_top_selling_category_data[$category][$month] = $second_top_category_data[$month];
//		} else {
//			$second_top_selling_category_data[$category][$month] = 0;
//		}
//	}
//}
//
//// Now, $top_selling_category_data contains the month-wise counts of the top-selling categories,
//// and $second_top_selling_category_data contains the month-wise counts of the second top-selling categories.
//
//echo '<pre>';
//var_dump($second_top_selling_category_data);
//echo '</pre>';
//
////echo '<pre>';
////var_dump($second_top_selling_category_data);
////echo '</pre>';
///

//	=====================================
$completed_orders = wc_get_orders(array(
	'status' => 'completed',
));

// Initialize arrays to store data for the top two categories
$top_selling_category_data = array();
$second_top_selling_category_data = array();

// Initialize an array to count month-wise sales for categories
$monthly_category_sales = array();

foreach ($completed_orders as $order) {
	foreach ($order->get_items() as $item) {
		$product = $item->get_product();
		$categories = wp_get_post_terms($product->get_id(), 'product_cat', array('fields' => 'names'));

		foreach ($categories as $category) {
			$month = date('F', strtotime($order->get_date_completed()->format('Y-m-d H:i:s')));

			if (!isset($monthly_category_sales[$category][$month])) {
				$monthly_category_sales[$category][$month] = 0;
			}
			$monthly_category_sales[$category][$month] += $item->get_quantity();
		}
	}
}

// Sort categories by total sales
arsort($monthly_category_sales);

// Get the top two selling categories
$top_categories = array_keys($monthly_category_sales);

if (isset($top_categories[0])) {
	$top_category_data = $monthly_category_sales[$top_categories[0]];
} else {
	$top_category_data = array();
}

if (isset($top_categories[1])) {
	$second_top_category_data = $monthly_category_sales[$top_categories[1]];
} else {
	$second_top_category_data = array();
}

// Create an array of month names
$months = array(
	'January', 'February', 'March', 'April', 'May', 'June',
	'July', 'August', 'September', 'October', 'November', 'December'
);

// Create arrays for the top two selling categories
foreach ($top_categories as $category) {
	if ($category === $top_categories[0]) {
		$top_selling_category_data[$category] = array();
		foreach ($months as $month) {
			if (isset($top_category_data[$month])) {
				$top_selling_category_data[$category][$month] = $top_category_data[$month];
			} else {
				$top_selling_category_data[$category][$month] = 0;
			}
		}
	} elseif ($category === $top_categories[1]) {
		$second_top_selling_category_data[$category] = array();
		foreach ($months as $month) {
			if (isset($second_top_category_data[$month])) {
				$second_top_selling_category_data[$category][$month] = $second_top_category_data[$month];
			} else {
				$second_top_selling_category_data[$category][$month] = 0;
			}
		}
	}
}

// Now, $top_selling_category_data contains data for the top-selling category, and
// $second_top_selling_category_data contains data for the second top-selling category.

//var_dump($top_selling_category_data);
//var_dump($second_top_selling_category_data);

$final_data_1 = [];
$final_data_2 = [];

foreach ( $top_selling_category_data as $key ) {
	foreach( $key as $sinlge_value ) {
		$final_data_1[] = $sinlge_value;
	}
}
var_dump($final_data_1);
foreach ( $second_top_selling_category_data as $key ) {
	foreach( $key as $sinlge_value ) {
		$final_data_2[] = $sinlge_value;
	}
}
