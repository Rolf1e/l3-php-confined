<?php


namespace App\Controller;

use App\Service\ChampionService;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController
{

    /**
     * @Route("/champion-list")
     */
    public function getChampionList(ChampionService $championService)
    {
        return $championService->getChampionList();
    }
}