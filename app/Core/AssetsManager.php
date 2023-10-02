<?php

namespace HexReport\App\Core;

use HexReport\App\Core\Lib\SingleTon;

class AssetsManager
{
	use SingleTon;

	private $version = '';
	private $configs = [];

	public function register()
	{
		$this->configs = Hxc_get_config();

		$this->before_register_assets();
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'public_scripts' ] );
	}

	private function before_register_assets()
	{
		if ( $this->configs['dev_mode'] ) {
			return $this->version = time();
		}
		$this->version = $this->configs['plugin_version'];
	}

	public function admin_scripts()
	{
		$folder_prefix = '/dist';//; Hxc_get_config('dev_mode') ? '/dev' : '/dist';

		wp_enqueue_script(
			Hxc_prefix( 'admin' ),
			Hxc_asset_url( $folder_prefix."/admin.js" ),
			[ 'jquery','select2' ],
			$this->version,
			true
		);
		wp_enqueue_script(
			Hxc_prefix( 'flatpickr' ),
			Hxc_asset_url( "/dev/admin/js/flatpickr.js" ),
			[ 'jquery'],
			$this->version,
			true
		);

//		if ( '/dev' == $folder_prefix ) {
//			wp_enqueue_script(
//				Hxc_prefix( 'admin-js' ),
//				Hxc_asset_url( $folder_prefix."/admin.js" ),
//				[ 'jquery','select2' ],
//				$this->version,
//				true
//			);
//
//
			wp_enqueue_style(
				Hxc_prefix( 'main-style' ),
				Hxc_asset_url( "/../dist/assets/index.css" ),
				array(),
				$this->version,
				'all'
			);

			wp_enqueue_style(
				Hxc_prefix( 'admin' ),
				Hxc_asset_url( "/dev/admin/css/admin.css" ),
				array(),
				$this->version,
				'all'
			);

			wp_enqueue_style(
				Hxc_prefix( 'flatpickr' ),
				Hxc_asset_url( "/dev/admin/css/flatpickr.min.css" ),
				array(),
				$this->version,
				'all'
			);

		$folder_prefix = Hxc_get_config('dev_mode') ? '/dev' : '/dist';
		//todo filter so that this js only load on wooCommerce coupon create/edit/update page
		wp_enqueue_script(
			Hxc_prefix( 'admin-js' ),
			Hxc_asset_url( $folder_prefix."/admin/js/admin.js" ),
			['jquery','select2'],
			$this->version,
			true
		);

		wp_enqueue_script(
			Hxc_prefix( 'main' ),
			Hxc_url( "/dist/assets/index.js" ),

			['jquery','wp-element'],
			$this->version,
			true
		);
		wp_enqueue_style(
			Hxc_prefix( 'admin' ),
			Hxc_asset_url( "/dist/admin/css/admin.css" ),
			[],
			$this->version,
			"all"
		);

		$hexreportFilterAllText = [
			'today' => esc_html__( 'Today', 'hexreport' ),
			'thisMonth' => esc_html__( 'This Month', 'hexreport' ),
			'thisYear' => esc_html__( 'This Year', 'hexreport' ),
		];

		$hexreportDashboardAllText = [
			'dashboard' => esc_html__( 'Dashboard', 'hexreport' ),
			'totalSales' => esc_html__( 'Completed Orders', 'hexreport' ),
			'totalOrders' => esc_html__( 'Total Orders', 'hexreport' ),
			'totalCost' => esc_html__( 'Cancelled Orders', 'hexreport' ),
			'topSellingProduct' => esc_html__( 'Top Selling Product: ', 'hexreport' ),
			'topSellingCatName' => esc_html__( 'Top Selling Category: ', 'hexreport' ),
			'refunded' => esc_html__( 'Refunded', 'hexreport' ),
			'sales' => esc_html__( 'Sales', 'hexreport' ),
			'visitors' => esc_html__( 'Visitors', 'hexreport' ),
		];

		$hexreportSidebarAllText = [
			'salesByChannel' => esc_html__( 'Sales by Channels', 'hexreport' ),
			'salesByProducts' => esc_html__( 'Sales by Products', 'hexreport' ),
			'salesByProductsTypes' => esc_html__( 'Sales by Product Types', 'hexreport' ),
			'salesByLocations' => esc_html__( 'Sales by Locations', 'hexreport' ),
		];

		wp_localize_script(Hxc_prefix('main'), 'hexReportData', [
			'ajaxUrl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('hexReportData-react_nonce'),
			'translate_array' => [
				'today' => $hexreportFilterAllText['today'],
				'thisMonth' => $hexreportFilterAllText['thisMonth'],
				'thisYear' => $hexreportFilterAllText['thisYear'],

				'dashboard' => $hexreportDashboardAllText['dashboard'],
				'totalSales' => $hexreportDashboardAllText['totalSales'],
				'totalOrders' => $hexreportDashboardAllText['totalOrders'],
				'totalCost' => $hexreportDashboardAllText['totalCost'],
				'topSellingProduct' => $hexreportDashboardAllText['topSellingProduct'],
				'topSellingCatName' => $hexreportDashboardAllText['topSellingCatName'],
				'refunded' => $hexreportDashboardAllText['refunded'],
				'sales' => $hexreportDashboardAllText['sales'],
				'visitors' => $hexreportDashboardAllText['visitors'],

				'salesByChannel' => $hexreportSidebarAllText['salesByChannel'],
				'salesByProducts' => $hexreportSidebarAllText['salesByProducts'],
				'salesByProductsTypes' => $hexreportSidebarAllText['salesByProductsTypes'],
				'salesByLocations' => $hexreportSidebarAllText['salesByLocations'],
			]
		]);


		//load css only on the plugin page

		$screen = get_current_screen();
		if ($screen->base === "toplevel_page_hexcoupon-page"){
			wp_enqueue_style(
				Hxc_prefix( 'main' ),
				Hxc_url( "/dist/assets/index.css" ),
				[],
				$this->version,
				"all"
			);
		}

		 wp_set_script_translations( 'main', 'hexcoupon-lite', plugin_dir_path( __FILE__ ) . 'languages' );
	}

	public function public_scripts()
	{
		wp_enqueue_style(
			Hxc_prefix( 'public' ),
			Hxc_asset_url( "/dev/public/css/public.css" ),
			array(),
			$this->version,
			'all'
		);

		wp_enqueue_style(
			Hxc_prefix( 'public-css' ),
			Hxc_asset_url( "/dist/public.css" ),
			[],
			$this->version
		);

		wp_enqueue_script(
			Hxc_prefix( 'public-js' ),
			Hxc_asset_url( "/dist/public.js" ),
			[],
			$this->version,
			true
		);
	}
}
