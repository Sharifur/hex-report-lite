<?php

namespace HexReport\App\Controllers;

use HexReport\App\Core\Lib\SingleTon;
use Kathamo\Framework\Lib\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class AdminMenuController extends BaseController
{
	use SingleTon;

	/**
	 * @package hexreport
	 * @author WpHex
	 * @method register
	 * @return mixed
	 * @since 1.0.0
	 * Register all hooks for adding menus in the dashboard area.
	 */
	public function register()
	{
		add_action( 'plugins_loaded', [ $this, 'show_hexreport_plugin_menu' ] );
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @method show_hexreport_plugin_menu
	 * @return mixed
	 * @since 1.0.0
	 * Checks whether 'Woocommerce' plugin is active or not and based on that the 'HexReport' menu is then displayed.
	 */
	public function show_hexreport_plugin_menu()
	{
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			add_action( 'admin_menu', [ $this, 'add_hexreport_menu' ] );
		}
	}

	/**
	 * @package hexreport
	 * @author WpHex
	 * @method add_hexreport_menu
	 * @return mixed
	 * @since 1.0.0
	 * Add a menu named 'HexReport' in the admin dashboard area.
	 */
	public function add_hexreport_menu()
	{
		add_menu_page(
			esc_html__( 'HexReport', 'hexreport' ),
			esc_html__( 'HexReport', 'hexreport' ),
			'manage_options',
			'hexreport-page',
			[ $this, 'render_hexreport' ],
			'dashicons-chart-area',
			40
		);
	}

	public function render_hexreport()
	{
		$this->render( '/admin/admin-menu.php' );
	}
}
