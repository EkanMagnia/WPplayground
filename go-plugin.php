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

if ( ! function_exists( 'iniGOPlugin' ) ) {
	function initGOPlugin() {

		$optionService = new \GoPlugin\Service\Option();
		if ( empty( $optionService->get() ) ) {
			$optionService->addOrUpdate( 'test-3e43214b-32b9-41c5-b9e8-aa213c08aed6.js' );
		}

		function loadSelgoraTracker() {
			return \GoPlugin\Service\JsTracker::getTracker();
		}

		add_action( 'wp_footer', 'loadSelgoraTracker' );


		function capitalizePostTitle( $title ) {
			if ( is_singular() && in_the_loop() && is_main_query() ) {
				return strtoupper( $title );
			} else {
				return $title;
			}
		}

		add_filter( 'the_title', 'capitalizePostTitle', 10, 1 );

		//modify main query on homepage

		function modifyMainQuery( $query ) {
			if ( $query->is_home() && $query->is_main_query() ) {
				$query->query_vars['category_name']  = 'excluded';
				$query->query_vars['cat']            = - 4;
				$query->query_vars['posts_per_page'] = 20;
			}
		}

		add_action( 'pre_get_posts', 'modifyMainQuery' );

		//this should be in a template controller
		function customQuery() {
			$params = [
				'category_name'  => 'excluded',
				'posts_per_page' => 4
			];

			$query = new WP_Query( $params );
			if ( $query->has_posts() ) {
				while ( $query->have_posts() ) {

					$query->the_post();

					// do something with the post data
					
				}
			}
		}


	}
}

