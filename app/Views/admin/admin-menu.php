<div id="vite-react-sample"></div>

<?php
//// Initialize variables to store top-selling product data
//$top_product_id = 0;
//$top_product_quantity = 0;
//$top_product_price = 0;
//
//// Get all completed orders
//$orders = wc_get_orders(array(
//	'status' => 'completed',
//	'limit' => -1, // Retrieve all orders
//));
//
//// Loop through completed orders to calculate product quantities and prices
//foreach ($orders as $order) {
//	foreach ($order->get_items() as $item_id => $item) {
//		$product_id = $item->get_product_id();
//		$quantity = $item->get_quantity();
//		$product_price = $item->get_product()->get_price();
//
//		if (isset($product_quantities[$product_id])) {
//			// Increment the quantity and calculate total price if the product already exists in the array
//			$product_quantities[$product_id] += $quantity;
//			$product_prices[$product_id] += $quantity * $product_price;
//		} else {
//			// Add the product to the arrays if it doesn't exist
//			$product_quantities[$product_id] = $quantity;
//			$product_prices[$product_id] = $quantity * $product_price;
//		}
//	}
//}
//
//// Find the product with the highest quantity sold
//arsort($product_quantities); // Sort the products by quantity in descending order
//$top_product_id = key($product_quantities); // Get the product with the highest quantity
//
//// Load the product object and get its price
//$top_product = wc_get_product($top_product_id);
//$top_product_quantity = current($product_quantities);
//$top_product_price = $product_prices[$top_product_id];
//
//// Display the top-selling product name, quantity sold, and price
//echo 'Top-Selling Product: ' . $top_product->get_name() . '<br>';
//echo 'Quantity Sold: ' . $top_product_quantity . '<br>';
//echo 'Price: ' . wc_price($top_product_price);



//// Initialize arrays to store category quantities and total amounts
//$category_quantities = array();
//$category_total_amounts = array();
//
//// Get all completed orders
//$orders = wc_get_orders(array(
//	'status' => 'completed',
//	'limit' => -1, // Retrieve all orders
//));
//
//// Loop through completed orders to calculate product category quantities and total amounts
//foreach ($orders as $order) {
//	foreach ($order->get_items() as $item_id => $item) {
//		$product = $item->get_product();
//		$product_id = $product->get_id();
//		$product_price = $product->get_price();
//
//		// Get product categories
//		$categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
//
//		foreach ($categories as $category_id) {
//			if (isset($category_quantities[$category_id])) {
//				// Increment the quantity if the category already exists in the array
//				$category_quantities[$category_id] += $item->get_quantity();
//				$category_total_amounts[$category_id] += $item->get_quantity() * $product_price;
//			} else {
//				// Add the category to the array if it doesn't exist
//				$category_quantities[$category_id] = $item->get_quantity();
//				$category_total_amounts[$category_id] = $item->get_quantity() * $product_price;
//			}
//		}
//	}
//}
//
//// Find the category with the highest quantity sold
//arsort($category_quantities); // Sort the categories by quantity in descending order
//$top_category_id = key($category_quantities); // Get the category with the highest quantity
//
//// Load the top-selling category object
//$top_category = get_term($top_category_id, 'product_cat');
//
//// Display the top-selling category name, quantity sold, and total amount
//echo 'Top-Selling Category: ' . $top_category->name . '<br>';
//echo 'Quantity Sold: ' . current($category_quantities) . '<br>';
//echo 'Total Amount: ' . wc_price($category_total_amounts[$top_category_id]);



// Get the current year
//$current_year = date('Y');
//
//// Initialize an array to store monthly sales amounts for completed and refunded orders
//$monthly_completed_sales = array();
//
//// Loop through each month from January to December
//for ($month = 1; $month <= 12; $month++) {
//	// Get the first day and last day of the month
//	$first_day = "{$current_year}-" . str_pad($month, 2, '0', STR_PAD_LEFT) . '-01';
//	$last_day = date('Y-m-t', strtotime($first_day));
//
//	// Initialize the total sales amounts for the month (completed and refunded)
//	$total_completed_sales = 0;
//	$total_refunded_sales = 0;
//
//	// Get completed and refunded orders within the date range for the month
//	$completed_orders = wc_get_orders(array(
//		'status' => 'completed',
//		'date_query' => array(
//			'after' => $first_day,
//			'before' => $last_day,
//		),
//		'limit' => -1, // Retrieve all completed orders
//	));
//
//	// Calculate the total sales amounts for completed orders
//	foreach ($completed_orders as $order) {
//		$total_completed_sales += $order->get_total();
//	}
//
//	// Store the monthly sales amounts in the arrays
//	$monthly_completed_sales[date('F', strtotime($first_day))] = $total_completed_sales;
//}
//
//var_dump($monthly_completed_sales);

