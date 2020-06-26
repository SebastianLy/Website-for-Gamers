<?php
# Autor: Marek Bobrowski
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UnbanController extends AbstractController
{
    public function index(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $user = $entityManager->getRepository(User::class)->findOneBy(array('id' => $id));
        $user->setBanned(false);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('unban/unban.html.twig', ['unbanned_user' => $user->getName()]);
    }
}
