<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Api\NewsApi;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, HttpClientInterface $client): Response
    {
        $api_caller = new NewsApi($client);
        $php_object = json_decode($api_caller->get_authorisation_code());
        $articles = $php_object->articles;

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
