<?php

namespace HexReport\App\Services;

use Kathamo\Framework\Lib\Service;
use HexReport\App\Core\Lib\SingleTon;

class CouponCategoryMenuService extends Service
{
	use SingleTon;

	public function getData()
	{
		$data = [
			'redirect_link' => 'edit-tags.php?taxonomy=shop_coupon_taxonomy&post_type=shop_coupon',
		];
		return $data;
	}
}
