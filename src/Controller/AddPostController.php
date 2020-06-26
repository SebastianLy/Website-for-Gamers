<?php
# Autor: Sebastian Łyszkowski
namespace App\Controller;

use App\Entity\News;
use App\Form\AddPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AddPostController extends AbstractController
{

    public function index(Request $request)
    {
        $news = new News();
        $news->setDate();
        $name = $this->getUser()->getName();
        $news->setAuthor($name);
        $form = $this->createForm(AddPostType::class, $news);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $news=$form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($news);
            $entityManager->flush();
            return $this->render('add_post/success.html.twig', ['post_title'=> $news->getTitle()]);
        }
        return $this->render('add_post/index.html.twig', ['form'=>$form->createView()]);
    }
}
