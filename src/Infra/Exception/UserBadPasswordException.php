<?php

namespace App\Infra\Exception;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserBadPasswordException extends Exception {

	private $username;

	public function __construct($username) {
		$this->username = $username;
	}

	public function errorMessage() {
		return 'Bas password for user ' . $this->username;
	}
}
