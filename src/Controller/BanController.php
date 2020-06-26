<?php
# Autor: Marek Bobrowski
namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BanController extends AbstractController
{
    public function ban(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $user = $entityManager->getRepository(User::class)->findOneBy(array('id' => $id));
        $user->setBanned(true);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('user_list_page/ban.html.twig', ['banned_user' => $user->getName()]);
    }

    public function unban(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $id = $request->request->get('id');
        $user = $entityManager->getRepository(User::class)->findOneBy(array('id' => $id));
        $user->setBanned(false);
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('user_list_page/unban.html.twig', ['unbanned_user' => $user->getName()]);
    }
}
