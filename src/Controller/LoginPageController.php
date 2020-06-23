<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LoginPageController extends AbstractController
{
    public function index()
    {
        return new Response(readfile("login.html"));
    }
}
