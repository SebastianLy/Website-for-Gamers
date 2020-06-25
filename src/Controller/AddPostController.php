<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AddPostController extends AbstractController
{

    public function index()
    {
        return $this->render('add_post/index.html.twig', [
            'controller_name' => 'AddPostController',
        ]);
    }
}
