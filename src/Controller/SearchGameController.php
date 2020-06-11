<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchGameController extends AbstractController
{
    /**
     * @Route("/search/game", name="search_game")
     */
    public function index()
    {
        return new Response(readfile("search.html"));
    }
}
