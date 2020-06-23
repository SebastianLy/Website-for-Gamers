<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Game;

class HomePageController extends AbstractController
{

    public function index()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $games = $entity_manager->getRepository(Game::class)->findBy([], ['average_rating' => 'DESC'], 10);
        return $this->render('home_page/top10.html.twig', array('games' => $games));
    }
}
