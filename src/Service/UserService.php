<?php


namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use App\Infra\Rest\UserInfosRestClient;
use App\Entity\User;
use App\Infra\Exception\UserBadPasswordException;
use Doctrine\ORM\EntityManagerInterface;

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

	public function createUser(EntityManagerInterface $entityManager, $username, $email, $password, $summoner) 
	{
		$user = new User();
		$user->setSummoner($summoner);
		$user->setUsername($username);
		$user->setEmail($email);
		$user->setPassword($password);


		$entityManager->persist($user);
		$entityManager->flush();

		return new Response('Persist user ' . $user->getId());
	}

	public function checkPassword(EntityManagerInterface $entityManager, $username, $password) {
		$repo = $entityManager->getRepository('App\Entity\User');
		$actual = $repo->findOneBy(array('username' => $username ));
		// we could encrypt password there
		if($actual === null) {
			throw new Exception();	
		}

		if($password == $actual->getPassword()) {
			return $this->getUserInfos($actual->getSummoner());
		}

		throw new UserBadPasswordException($username);
	}

}

