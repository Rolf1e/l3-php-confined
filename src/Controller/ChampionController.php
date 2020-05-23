<?php


namespace App\Controller;

use App\Service\ChampionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{

    /**
     * @Route("/champion-list")
     */
    public function getChampionList(ChampionService $championService)
    {
        return $this->render(
            'Champions/champions-vue.html.twig',
            ['champions' => $championService->getChampionList()]);
    }
}