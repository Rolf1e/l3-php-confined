<?php
namespace App\Controller;

use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Request;
use App\Infra\Exception\UserDoesnotExistException;
use App\Infra\Exception\UserBadPasswordException;


class UserController extends AbstractController
{
	private $userService;
	private $registerForm;

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

	/**
	 * @Route("/register", name = "register")
	 */
	public function register(Request $request) {
		$registerForm = $this->createFormBuilder()
		       ->add('username', TextType::class)
		       ->add('summoner', TextType::class)
		       ->add('email', EmailType::class)
		       ->add('password', PasswordType::class)
		       ->getForm();

		$registerForm->handleRequest($request);
		if($registerForm->isSubmitted() && $registerForm->isValid()) {
			$data = $registerForm->getData();
			$entityManager = $this->getDoctrine()->getManager();
			$this->userService->createUser($entityManager, $data['username'], $data['email'], $data['password'], $data['summoner']);
			return $this->render(
				'form/registered-vue.html.twig',
				[
					'username' => $data['username']
				]
			);
		}

		return $this->render(
			'form/registerform-vue.html.twig',
			[
				'registerForm' => $registerForm->createView()
			]
		);
	}


	/**
	 * @Route("/login", name = "login")
	 */
	public function login(Request $request) {
		$loginForm = $this->createFormBuilder()
		    ->add('username')
		    ->add('password')
		    ->getForm();

		$loginForm->handleRequest($request);	

		if($loginForm->isSubmitted() && $loginForm->isValid()) {
			$data = $loginForm->getData();
			return $this->judgeLoginForm($data);
		}
		return $this->render(
			'User/user-vue.html.twig',
			[
				'loginForm' => $loginForm->createView()
			]
		);
	}


	/**
	 * @Route("", name = "research")
	 */
	public function form(Request $request)
	{
		$label = 'summoner';
		$form = $this->createFormBuilder()
	       ->add($label, TextType::class)
	       ->getForm();

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$data = $form->getData();
			return $this->redirectToRoute('summoner', ['username' => $data[$label]]);
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
	public function infos(Request $request, $username) 
	{	
		$registerForm = $this->createFormBuilder()
		       ->add('username', TextType::class)
		       ->add('summoner', TextType::class)
		       ->add('email', EmailType::class)
		       ->add('password', PasswordType::class)
		       ->getForm();

		$registerForm->handleRequest($request);
		if($registerForm->isSubmitted() && $registerForm->isValid()) {
			$data = $registerForm->getData();
			$entityManager = $this->getDoctrine()->getManager();
			$this->userService->createUser($entityManager, $data['username'], $data['email'], $data['password'], $data['summoner']);
		}

		try {
			return $this->render(
				'User/user-vue.html.twig',
				[
					'user' => $this->userInfos($username),
					'registerForm' => $registerForm->createView()
				]
			);

		} catch (UserDoesnotExistException $e) 
		{
			return $this->render( 
				'User/user-not-found-vue.html.twig',
				[
					'exception' => $e->errorMessage()
				]
			);		
		}
	}


	private function userInfos($username) 
	{
		return $this->userService->getUserInfos($username);	
	}

	private function judgeLoginForm($data) {
		$username = $data['username'];
		$password = $data['password'];

		try {
			$entityManager = $this->getDoctrine()->getManager();
			$user = $this->userService->checkPassword($entityManager, $username, $password);

			return $this->render(
				'User/user-vue.html.twig',
				[
					'user' => $user
				]
			);
		} catch (UserBadPasswordException $e) {
			return $this->render(
				'User/user-not-found-vue.html.twig',
				[
					'exception' => 'user ' . $username . 'is not found, maybe credentials are bad !'
				]
			);
		}
	}

}
