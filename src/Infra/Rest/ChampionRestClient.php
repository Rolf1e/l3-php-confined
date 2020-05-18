<?php


namespace App\Infra\Rest;


use Symfony\Component\HttpClient\HttpClient;

class ChampionRestClient extends RestClient
{

    private $url;

    public function __construct()
    {
        parent::__construct(HttpClient::create());
        $this->url = 'https://ddragon.leagueoflegends.com/';
    }

    public function getChampionList()
    {

        $response = $this->httpClient->request('GET', $this->url . 'cdn/10.10.3208608/data/en_US/champion.json');

        dd($response);
        return $response->getContent();
    }


}