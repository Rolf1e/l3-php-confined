<?php 

namespace App\Infra\Rest;

use Symfony\Component\HttpClient\HttpClient;
use App\Infra\Dto\Summoner;
use App\Infra\Dto\LeagueEntry;
use App\Infra\Exception\UserDoesnotExistException;

class UserInfosRestClient extends RestClient 
{
	public function __construct()
	{
		parent::__construct(HttpClient::create());
	}
	
	
	public function getUserInfos($username)
	{
		$summoner = $this->getUserEncryptedId($username);
		$response = $this->httpClient->request('GET', BASE_URL . HTTPS_SUMMONER_INFOS . $summoner->getId() .'?api_key=' . API_KEY);
		if(200 != $response->getStatusCode()) {
			throw new UserDoesnotExistException($username);
		}
		return $this->serializer->deserialize($response->getContent(), 'App\Infra\Dto\LeagueEntry[]', 'json');

	}	

	private function getUserEncryptedId($username)
	{
		$response = $this->httpClient->request('GET', BASE_URL . HTTPS_SUMMONER_ENCRYPTED . $username . '?api_key=' . API_KEY);
		if (200 != $response->getStatusCode()) {
			throw new UserDoesnotExistException($username);	
		}
		return $this->serializer->deserialize($response->getContent(), Summoner::class, 'json');
	}
}

