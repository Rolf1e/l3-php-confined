<?php


namespace App\Service;

use App\Infra\Rest\ChampionRestClient;

class ChampionService
{
    private $championRestClient;

    public function __construct()
    {
        $this->championRestClient = new ChampionRestClient();
    }

    public function getChampionList()
    {
        return $this->championRestClient->getChampionList();
    }
}
