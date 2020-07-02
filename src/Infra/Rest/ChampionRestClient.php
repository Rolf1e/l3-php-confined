<?php


namespace App\Infra\Rest;

use App\Entity\Champion;
use Symfony\Component\HttpClient\HttpClient;

class ChampionRestClient extends RestClient
{


    private $freeChampions;

    public function __construct()
    {
        parent::__construct(HttpClient::create());
        $this->freeChampions = $this->resolveFreeChampion();
    }

    public function getChampionList()
    {
        //The guy who made that json clearly doesnt want us to code in good objects oriented ! #PHPDevs
        $url = HTTPS_DDRAGON_LEAGUEOFLEGENDS_COM;
        $response = $this->httpClient->request('GET', $url . HTTPS_DDRAGON_LEAGUEOFLEGENDS_COM_PART_2);
        $json_decode = json_decode(json_encode($response->toArray()['data']), true, 512, JSON_OBJECT_AS_ARRAY);

        return $this->getChampionFromArray($json_decode, $url);
    }

    //http://ddragon.leagueoflegends.com/cdn/10.10.3208608/img/champion/Ahri.png
    private function getChampionFromArray($championArray, $url)
    {
        $championList = array();
        foreach ($championArray as $champion) {
            $key = $champion['key'];
            array_push($championList, new Champion(
                $champion['version'],
                $champion['id'],
                $key,
                $champion['name'],
                $champion['title'],
                $champion['blurb'],
                $champion['info'],
                $url . 'cdn/' . $champion['version'] . '/img/champion/' . $champion['image']['full'],
                $champion['tags'],
                $champion['partype'],
                $champion['stats'],
                $this->isFreeChampions($key)
            ));
        }
        return $championList;
    }

    private function resolveFreeChampion()
    {
        $response = $this->httpClient->request('GET', FREE_CHAMPION_URL . '?api_key=' . API_KEY);
        return $response->toArray()['freeChampionIds'];
    }

    private function isFreeChampions($id): bool
    {
        return in_array($id, $this->freeChampions);
    }


}
