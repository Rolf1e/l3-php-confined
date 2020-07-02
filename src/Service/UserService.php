<?php


namespace App\Service;

use App\Infra\Rest\UserInfosRestClient;

class UserService
{
	private $userRestClient;

	public function __construct()
	{
		$this->userRestClient = new UserInfosRestClient();
	}

	public function getUserInfos($username) 
	{
		return $this->userRestClient->getUserInfos($username);
	}

}

