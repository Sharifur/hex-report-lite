<?php

/**
 * Configurations for the plugin
 *
 * @package hexcoupon
 */
return array(
	'plugin_prefix'		=> 'Hxc',
	'plugin_slug'		=> 'Hxc',
	'namaspace_root'	=> 'HexReport',
	'plugin_version'	=> '1.0.0',
	'plugin_name'		=> 'HexReport',
	'dev_mode'			=> true,
	'root_dir'			=> dirname(__DIR__),
	'middlewares'		=> [
		'auth'	=> HexReport\App\Controllers\Middleware\Auth::class,
	],
);
