<?php
namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
	private $userService;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}


	/**
	 * @Route("", name = "research")
	 */
	public function form(Request $request)
	{
		$form = $this->createFormBuilder()
	       ->add('user', TextType::class)
	       ->getForm();

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$data = $form->getData();
			return $this->redirectToRoute('summoner', ['username' => $data['user']]);
		}

		return $this->render(
			'User/search-vue.html.twig',
			[
				'form' => $form->createView(),
			]
		);
	}

	/**
	 * @Route("/summoner/{username}", name="summoner")
	 */
	public function infos($username) 
	{
		return $this->render(
			'User/user-vue.html.twig',
			['user' => $this->userInfos($username)]
		);
	}


	private function userInfos($username) 
	{
		try {
			return $this->userService->getUserInfos($username);	
		} catch (UserDoesnotExistException $e)
		{
			return $e->errorMessage();		
		}
	}
}
