<?php
# Autor: Sebastian Łyszkowski

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
        $count = $entity_manager->getRepository(Game::class)->count(array($title));
        $pages = ceil($count/10);
        $games = $entity_manager->getRepository(Game::class)->findByTitle(array($title),0);

        return $this->render('search_game_page/searchgameresults.html.twig',
            array('games' => $games, 'count' => $count, 'pages' => $pages, 'title' => $title));
    }
    public function changePage()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $pagenumber = $_POST['pagenumber'];
        $title = $_POST['title'];
        $count = $entity_manager->getRepository(Game::class)->count(array($title));
        $pages = ceil($count/10);
        if($pagenumber == 1)
            $games = $entity_manager->getRepository(Game::class)->findByTitle(array($title), 0);
        else
            $games = $entity_manager->getRepository(Game::class)->findByTitle(array($title), $pagenumber*10-10);

        return $this->render('search_game_page/searchgameresults.html.twig',
            array('games' => $games, 'count' => $count, 'pages' => $pages, 'title' => $title));
    }
}
