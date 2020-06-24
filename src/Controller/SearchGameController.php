<?php
# Autor: Sebastian Lyszkowski

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchGameController extends AbstractController
{

    public function index()
    {
        return $this->render('search_game_page/searchgame.html.twig');
    }

    public function search()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $title = $_POST['title'];
        $games = $entity_manager->getRepository(Game::class)->findByTitle(array($title));
        $count = $entity_manager->getRepository(Game::class)->count(array($title));
        return $this->render('search_game_page/searchgameresults.html.twig', array('games' => $games, 'count' => $count));
    }
}
