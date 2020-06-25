<?php

namespace App\Controller;

use App\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{

    public function index()
    {
        $entity_manager = $this->getDoctrine()->getManager();
        $news = $entity_manager->getRepository(News::class)->findAll();
        return $this->render('news/news.html.twig', array('news' => $news));
    }
}
