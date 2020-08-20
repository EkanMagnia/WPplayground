<?php


namespace GoPlugin\Service;


use PHPMailer\PHPMailer\Exception;

class Option {

	const OPTION_KEY = 'selgora-api-key';

	public function addOrUpdate( $value ) {
		update_option( self::OPTION_KEY, $value );
	}

	public function get() {
		try {
			return get_option( self::OPTION_KEY );
		} catch ( Exception $exception ) {
			return '';
		}

	}
}
