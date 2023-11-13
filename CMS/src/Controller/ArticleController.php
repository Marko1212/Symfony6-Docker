<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController'
        ]);
    }

    #[Route('/show/{wildcard}', name: 'showarticle')]
    public function show_article($wildcard = null): Response
    {
        $comments = [
            ['title' => 'The cheetah is crazy', 'short_description' => 'Explore why cheetas go crazy'],
            ['title' => 'I lost the giraffe', 'short_description' => 'How we recovered the lost giraffe'],
            ['title' => 'Where is the elephant', 'short_description' => 'Finding the elephant in the room']
        ];
        /*         $comments = [
            'Explore why cheetas go crazy',
            'How we recovered the lost giraffe',
            'Finding the elephant in the room'
        ]; */
        return $this->render('article/show.html.twig', ['title' => ucwords(str_replace('-', ' ', $wildcard)), 'comments' => $comments]);
    }
}
