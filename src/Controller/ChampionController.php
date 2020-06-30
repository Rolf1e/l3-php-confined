<?php

namespace App\Controller;

use App\Service\ChampionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ChampionController extends AbstractController
{

    private $championService;


    public function __construct(ChampionService $championService)
    {
        $this->championService = $championService;
    }

    /**
     * @Route("/champion-list")
     */
    public function getChampionList()
    {
        return $this->render(
            'Champions/champions-vue.html.twig',
            ['champions' => $this->championService->getChampionList()]);
    }
}
