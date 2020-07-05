<?php

namespace App\Infra\Exception;
use Symfony\Component\Config\Definition\Exception\Exception;

class UserDoesnotExistException extends Exception {

	private $username;
	
	public function __construct($username)
	{
		$this->username = $username;
	}

	public function errorMessage() 
	{
		return 'Failed to find user ' . $this->username . ' in LoL APIs';
	}

}
