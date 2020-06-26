<?php
# Autor: Marek Bobrowski
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BanController extends AbstractController
{
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $user = $entityManager->getRepository(User::class)->findOneBy(array('id' => $id));
        $user->setBanned(true);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('ban/ban.html.twig', ['banned_user' => $user->getName()]);
    }
}
