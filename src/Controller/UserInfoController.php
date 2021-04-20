<?php

namespace App\Controller;


use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserInfoController extends AbstractController
{
    
    /**
    * @Route("/dashboard/postform", name="post.form", methods={"GET", "POST"})
    */

    public function renderForm() : Response
    {
        $form = $this->createForm(UserFormType::class);

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
    public function storePost(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $newForm = $this->getUser();
        $form = $this->createForm(UserFormType::class, $newForm);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            
           
            $entityManager->flush();
    
            $this->addFlash(
                'success animate__animated animate__fadeOut',
                "Mis à jour"
            
            );
            
        }
        return $this->redirectToRoute('dashboard');
    }
    /**
     * @Route("/dashboard", name="user_info", methods={"GET", "POST"})
     */
    public function index(): Response
    {
        return $this->render('user_info/form.html.twig');
    }
}
