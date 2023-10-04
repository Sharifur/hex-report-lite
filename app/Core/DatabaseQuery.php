<?php
namespace HexReport\App\Core;

use HexReport\App\Core\Lib\SingleTon;

use CodesVault\Howdyqb\DB;

class DatabaseQuery
{
	use SingleTon;

	/**
	 * @package hexreport
	 * @author WpHex
	 * @method register
	 * @return mixed
	 * @since 1.0.0
	 * Add all the necessary hooks that are needed.
	 */
	public function register()
	{
		add_action( 'wp', [ $this, 'log_visitor_arrival_data' ] );
	}


	/**
	 * @package hexreport
	 * @author WpHex
	 * @since 1.0.0
	 * @method log_visitor_arrival_data
	 * @return void
	 * Get the total number of counts of user visits of the website
	 */
	public function log_visitor_arrival_data() {
		$current_month = date('F');

		$result =
			DB::select('visitor_log.'.$current_month)
				->distinct()
				->from('visitor_log visitor_log')
				->get();

		$current_count = ! empty( $result[0][$current_month] ) ? $result[0][$current_month] : 0;

		if ( is_user_logged_in() ) {
			return;
		} else {
			if ( $current_count === 0 ) {
				// Initialize the count if it doesn't exist
				$current_count = 1;
				DB::insert('visitor_log', [
					[
						$current_month => $current_count,
					]
				]);
			} else {
				// Increment the count
				$current_count++;
				DB::update('visitor_log', [
					$current_month => $current_count,
				] )
					->where('ID', '=', 1)
					->execute();
			}
		}
	}


}
