<?php

namespace HexReport\App\Core;

use HexReport\App\Core\Lib\SingleTon;

class AssetsManager
{
	use SingleTon;

	private $version = '';
	private $configs = [];

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method register
	 * @return void
	 * Register all hooks that are needed for file equation
	 */
	public function register()
	{
		$this->configs = hexreport_get_config();

		$this->before_register_assets();

		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method before_register_assets
	 * @return int
	 * Determine the plugin version
	 */
	private function before_register_assets()
	{
		if ( $this->configs['dev_mode'] ) {

			return $this->version = time();
		}

		$this->version = $this->configs['plugin_version'];
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method admin_scripts
	 * @return void
	 * Enqueue styles and scripts for the admin pages.
	 */
	public function admin_scripts()
	{
		//load css only on the plugin page
		$screen = get_current_screen();

		if ( $screen->base === "toplevel_page_hexreport-page" ) {
			wp_enqueue_script(
				hexreport_prefix( 'main' ),
				hexreport_url( "/dist/assets/index.js" ),
				['jquery','wp-element'],
				$this->version,
				true
			);

			wp_enqueue_style(
				hexreport_prefix( 'main' ),
				hexreport_url( "/dist/assets/index.css" ),
				[],
				$this->version,
				"all"
			);
		}

		$hexreportFilterAllText = [
			'today' => esc_html__( 'Today', 'hexreport' ),
			'thisMonth' => esc_html__( 'This Month', 'hexreport' ),
			'thisYear' => esc_html__( 'This Year', 'hexreport' ),
		];

		$hexreportDashboardAllText = [
			'dashboard' => esc_html__( 'Dashboard', 'hexreport' ),
			'totalSales' => esc_html__( 'Completed Orders', 'hexreport' ),
			'totalOrders' => esc_html__( 'Total Orders', 'hexreport' ),
			'cancelledOrders' => esc_html__( 'Cancelled Orders', 'hexreport' ),
			'cancelled' => esc_html__( 'Cancelled', 'hexreport' ),
			'failed' => esc_html__( 'Failed', 'hexreport' ),
			'topSellingProduct' => esc_html__( 'Top Selling Product: ', 'hexreport' ),
			'topSellingCatName' => esc_html__( 'Top Selling Category: ', 'hexreport' ),
			'refunded' => esc_html__( 'Refunded', 'hexreport' ),
			'sales' => esc_html__( 'Sales', 'hexreport' ),
			'visitors' => esc_html__( 'Visitors', 'hexreport' ),
			'orders' => esc_html__( 'Orders', 'hexreport' ),
			'daylyAverage' => esc_html__( 'Daily Average', 'hexreport' ),
			'janToApr' => esc_html__( 'Jan-Apr', 'hexreport' ),
			'mayToAug' => esc_html__( 'May-Aug', 'hexreport' ),
			'sepToDec' => esc_html__( 'Sep-Dec', 'hexreport' ),
			'directBankTranser' => esc_html__( 'Direct bank transfer', 'hexreport' ),
			'checkPayments' => esc_html__( 'Check payments', 'hexreport' ),
			'cashOnDelivery' => esc_html__( 'Cash on delivery', 'hexreport' ),
			'localPickup' => esc_html__( 'Local Pickup', 'hexreport' ),
			'flatRate' => esc_html__( 'Flat Rate', 'hexreport' ),
			'freeShipping' => esc_html__( 'Free Shipping', 'hexreport' ),
			'percentOfRatio' => esc_html__( '% of Ratio', 'hexreport' ),
			'needHelpText' => esc_html__( 'Need a Help ?', 'hexreport' ),
			'contactUsText' => esc_html__( 'Contact with Us', 'hexreport' ),
			'contactUsLink' => esc_url( 'https://xgenious.com' ),
		];

		$hexreportSidebarAllText = [
			'salesByChannel' => esc_html__( 'Sales by Channels', 'hexreport' ),
			'salesByProducts' => esc_html__( 'Sales by Products', 'hexreport' ),
			'salesByProductsTypes' => esc_html__( 'Sales by Product Types', 'hexreport' ),
			'salesByLocations' => esc_html__( 'Sales by Locations', 'hexreport' ),
		];

		wp_localize_script( hexreport_prefix('main' ), 'hexReportData', [
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'hexReportData-react_nonce' ),
			'translate_array' => [
				'today' => $hexreportFilterAllText['today'],
				'thisMonth' => $hexreportFilterAllText['thisMonth'],
				'thisYear' => $hexreportFilterAllText['thisYear'],

				'dashboard' => $hexreportDashboardAllText['dashboard'],
				'totalSales' => $hexreportDashboardAllText['totalSales'],
				'totalOrders' => $hexreportDashboardAllText['totalOrders'],
				'cancelledOrders' => $hexreportDashboardAllText['cancelledOrders'],
				'cancelled' => $hexreportDashboardAllText['cancelled'],
				'failed' => $hexreportDashboardAllText['failed'],
				'topSellingProduct' => $hexreportDashboardAllText['topSellingProduct'],
				'topSellingCatName' => $hexreportDashboardAllText['topSellingCatName'],
				'refunded' => $hexreportDashboardAllText['refunded'],
				'sales' => $hexreportDashboardAllText['sales'],
				'visitors' => $hexreportDashboardAllText['visitors'],
				'orders' => $hexreportDashboardAllText['orders'],
				'daylyAverage' => $hexreportDashboardAllText['daylyAverage'],
				'directBankTranser' => $hexreportDashboardAllText['directBankTranser'],
				'checkPayments' => $hexreportDashboardAllText['checkPayments'],
				'cashOnDelivery' => $hexreportDashboardAllText['cashOnDelivery'],
				'localPickup' => $hexreportDashboardAllText['localPickup'],
				'flatRate' => $hexreportDashboardAllText['flatRate'],
				'freeShipping' => $hexreportDashboardAllText['freeShipping'],
				'percentOfRatio' => $hexreportDashboardAllText['percentOfRatio'],
				'needHelpText' => $hexreportDashboardAllText['needHelpText'],
				'contactUsText' => $hexreportDashboardAllText['contactUsText'],
				'contactUsLink' => $hexreportDashboardAllText['contactUsLink'],

				'janToApr' => $hexreportDashboardAllText['janToApr'],
				'mayToAug' => $hexreportDashboardAllText['mayToAug'],
				'sepToDec' => $hexreportDashboardAllText['sepToDec'],
			]
		] );

		wp_set_script_translations( 'main', 'hexreport-lite', plugin_dir_path( __FILE__ ) . 'languages' );
	}
}
