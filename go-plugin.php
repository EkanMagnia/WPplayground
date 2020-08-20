<?php

/**
 * Plugin Name:       George Olah's Plugin
 * Description:       Test plugin
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            George Olah
 * Author URI:        https://linkedin.com/in/georgeolah
 */

use App\Service\Menu;

require __DIR__ . '/vendor/autoload.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'init', 'initGOPlugin' );

if (!function_exists('iniGOPlugin')) {
	function initGOPlugin() {

//		$menu = new Menu();
//		$menu->addItem();
	}
}

