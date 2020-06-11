<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RegistrationPageController extends AbstractController
{
    public function index()
    {
        return new Response(readfile("register.html"));
    }
}
