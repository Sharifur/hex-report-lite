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



if (class_exists('WooCommerce')) {
	$firstTopProductName  = '';
	$secondTopProductName = '';

	// Query to get the top-selling products
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 2,
		'orderby' => 'meta_value_num',
		'meta_key' => 'total_sales',
		'order' => 'DESC',
	);

	$topProducts = new WP_Query($args);
	$arr = [];
	while( $topProducts->have_posts() ) {
		$topProducts->the_post();
		$arr[] = get_the_title();
	}

	if ($topProducts->have_posts()) {
		$topProducts->the_post();

		// Get the name of the first best-selling product
		$firstTopProductName = get_the_title();

		// Skip the first product to get the second best-selling product
		$topProducts->the_post();

		// Get the name of the second best-selling product
		$secondTopProductName = get_the_title();

		wp_reset_postdata();
	}
}
//echo 'first best selling product name: ' . $firstTopProductName . '<br>';
//echo "Second Best Selling Product Name: " . $secondTopProductName;

	echo $arr[0];
echo '<br>';
echo $arr[1];

