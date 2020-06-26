<?php
# Autor: Sebastian Lyszkowski

namespace App\Controller;

use App\Entity\Game;
use App\Form\RateGameType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;

class RateGameController extends AbstractController
{
    public function index(Request $request)
    {
        $entity_manager = $this->getDoctrine()->getManager();
        if ($request->isMethod('GET')) {
            $id = $_GET['id'];
        }
        else
        {
            $id = $request->request->get('form')['id'];
        }
        $data = ['averageRating' => null, 'review' => null, 'id' => null];
        $form = $this->createFormBuilder($data)
            ->add('averageRating', ChoiceType::class, [
                'label' => 'OCENA',
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
            ])
            ->add('id', HiddenType::class, [
                'data' => $id,
            ])
            ->add('review', TextareaType::class, [
                'label'  => 'RECENZJA',
                'required'   => false
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary',
                    'style' => 'border-color:white'],
                'label' => 'OCEN'
            ])
            ->getForm();

        $game = $entity_manager->getRepository(Game::class)->findOneBy(array('id' => $id));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $review = $request->request->get('form')['review'];
            $rating = $request->request->get('form')['averageRating'];
            $game->setSumOfVotes($rating);
            if($review != '')
            {
                $game->setReview($review);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();
            return $this->render('rate_game_page/succesrategame.html.twig', [
                'game_name'=> $game->getTitle()
            ]);
        }
        return $this->render('rate_game_page/rategame.html.twig', [
            'id' => $game->getId(),
            'game_name'=> $game->getTitle(),
            'form'=>$form->createView()
        ]);
    }
}
