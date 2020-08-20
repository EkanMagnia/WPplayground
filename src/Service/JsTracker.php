<?php


namespace GoPlugin\Service;


class JsTracker {

	public static function getTracker() {
		$optionService = new Option();
		$apiKey = $optionService->get();

		wp_enqueue_script('selgora-tracker', 'https://api.selgora.com/js/track/'.$apiKey.'.js' );
	}
}
