<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchGameController extends AbstractController
{

    public function index()
    {
        return new Response(readfile("search.html"));
    }

    public function search()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $title = $_POST['title'];
        $games = $entity_manager->getRepository(Game::class)->findBy(array('title' => $title));
        return $this->render('search_game/searchgame.html.twig', array('games' => $games));
    }
}
