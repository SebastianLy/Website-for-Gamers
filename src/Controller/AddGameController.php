<?php
# Autor: Sebastian Lyszkowski

namespace App\Controller;

use App\Entity\Game;
use App\Form\AddGameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AddGameController extends AbstractController
{
    public function index(Request $request)
    {
        $game = new Game();
        $form = $this->createForm(AddGameType::class, $game);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $game=$form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->render('add_game_page/success.html.twig', [
                'game_name'=> $game->getTitle()
            ]);
        }
        return $this->render('add_game_page/addgame.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
