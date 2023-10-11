<?php
/**
 * @package hexreport
 *
 * Plugin Name: HexReport
 * Plugin URI: https://wordpress.org/plugins/hexreport
 * Description: Get extensive report of WooCommerce store.
 * Version: 1.0.0
 * Author: WpHex
 * Requires at least: 5.4
 * Tested up to: 6.2.2
 * Requires PHP: 7.1
 * WC requires at least: 6.0
 * WC tested up to: 7.8.2
 * Author URI: https://wphex.com/
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: hexreport
 * Domain Path: /languages
 */

use HexReport\App\Core\Core;

if ( ! defined( 'ABSPATH' ) ) die();

define( 'HEXREPORT_FILE', __FILE__ );

require_once __DIR__ . '/configs/bootstrap.php';

if ( file_exists( HEXREPORT_DIR_PATH . '/vendor/autoload.php' ) ) {
	require_once HEXREPORT_DIR_PATH . '/vendor/autoload.php';
}

Core::getInstance();
