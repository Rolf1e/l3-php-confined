<?php


namespace App\Infra\Rest;

use App\Infra\Dto\Champion;
use Symfony\Component\HttpClient\HttpClient;

class ChampionRestClient extends RestClient
{

    private $url;

    public function __construct()
    {
        parent::__construct(HttpClient::create());
        //The guy who made that json clearly doesnt want us to code in good objects oriented ! #PHPDevs
        $this->url = 'https://ddragon.leagueoflegends.com/';
    }

    public function getChampionList()
    {
        $response = $this->httpClient->request('GET', $this->url . 'cdn/10.10.3208608/data/en_US/champion.json');
        $json_decode = json_decode(json_encode($response->toArray()['data']), true, 512, JSON_OBJECT_AS_ARRAY);

        return $this->getChampionFromArray($json_decode);
    }

    //http://ddragon.leagueoflegends.com/cdn/10.10.3208608/img/champion/Ahri.png
    private function getChampionFromArray($championArray)
    {
        $championList = array();
        foreach ($championArray as $champion) {
            array_push($championList, new Champion(
                $champion['version'],
                $champion['id'],
                $champion['key'],
                $champion['name'],
                $champion['title'],
                $champion['blurb'],
                $champion['info'],
                $this->url . 'cdn/' . $champion['version'] . '/img/champion/' . $champion['image']['full'],
                $champion['tags'],
                $champion['partype'],
                $champion['stats']
            ));
        }
//        dd($championList);
        return $championList;
    }


}