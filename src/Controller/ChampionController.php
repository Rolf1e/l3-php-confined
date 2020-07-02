<?php

namespace App\Controller;

use App\Service\ChampionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

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
    public function getChampionList(PaginatorInterface $paginator, Request $request)
    {
	$userData = $paginator->paginate(
		$this->championService->getChampionList(),
		$request->query->getInt('page', 1),
		9
	);
        return $this->render(
            'Champions/champions-vue.html.twig',
            ['champions' => $userData]);
    }
}
