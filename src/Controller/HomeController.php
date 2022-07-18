<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->findAll();
        //dd($articles);

        return $this->render('home/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/show/{id}', name: 'app_article')]
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->find($id);

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }


}
