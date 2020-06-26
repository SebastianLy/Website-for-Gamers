<?php
# Autor: Marek Bobrowski
namespace App\Controller;

use App\Entity\User;
use App\Form\UserLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class LoginPageController extends AbstractController
{
    public function index(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserLoginType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
        }
        return $this->render('login_page/login.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
