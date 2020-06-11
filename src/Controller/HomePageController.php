<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Game;

class HomePageController extends AbstractController
{

    public function index()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $games = $entity_manager->getRepository(Game::class)->findAll();
        return $this->render('home_page/top10.html.twig', array('games' => $games));
        //return new Response(readfile("index.html"));
    }
}
