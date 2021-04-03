<?php

namespace App\Controller;

use App\Entity\UserInfo;
use App\Form\UserInfoType;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserInfoController extends AbstractController
{
    
    /**
    * @Route("/dashboard/postform", name="post.form", methods={"GET", "POST"})
    */

    public function renderForm() : Response
    {
        $form = $this->createForm(UserInfoType::class);

        $view = $this->renderView('user_info/form.html.twig', [
            'form' => $form->createView(),
        ]);
        return $this->json([
            'form' => $view,
            'title' => 'Create a new post'
        ]);
    }
    /**
     * @Route("/dashboard/storePost", name="post.store", methods={"GET", "POST"})
     * @param Request $request
     */
    public function storePost(Request $request) : Response
    {
        $newForm = new UserInfo();
        $form = $this->createForm(UserInfoType::class, $newForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            return $this->json($form);
         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newForm);
            $entityManager->flush();
    
            $this->addFlash(
                'success',
                "Mis à jour"
            );
        }

    }
    /**
     * @Route("/dashboard", name="user_info", methods={"GET", "POST"})
     */
    public function index(): Response
    {
        return $this->render('user_info/form.html.twig');
    }
}
